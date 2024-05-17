<?php
include("../Models/alldb.php");
session_start();
$error="";
$conn = getConnection();


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['loggedIn']) || empty($_SESSION['Email'])) {
    header("Location: ManagerLogin.php");
    exit();
}




if (isset($_GET['delete'])) {
    $deleteCode = $_GET['delete'];
    $deleteSql = "DELETE FROM products WHERE ProductCode='$deleteCode'";

    if ($conn->query($deleteSql) === TRUE) {
        echo "Product deleted successfully.";
    } else {
        echo "Error deleting product: " . $conn->error;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $ProductCode = $_POST['product_code'];
    $ProductName = $_POST['product_name'];
    $Size = $_POST['size'];
    $Color = $_POST['color'];
    $Price = $_POST['price'];

    
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["product_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["product_image"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

 
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

 
    if ($_FILES["product_image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG & PNG files are allowed.";
        $uploadOk = 0;
    }

  
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    
    } else {
        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $targetFile)) {
            

            
            $insertSql = "INSERT INTO products (ProductCode, ProductName, Size, Color, Price, ProductImage) 
                          VALUES ('$ProductCode', '$ProductName', '$Size', '$Color', '$Price', '$targetFile')";

            if ($conn->query($insertSql) === TRUE) {
                echo "Product added successfully.";
            } else {
                echo "Error adding product: " . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

