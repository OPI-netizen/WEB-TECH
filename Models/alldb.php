<?php
require_once('db.php');


function loginuser($conn, $managerinfo, $Email, $PassWord)
{
    $conn = getConnection();
    $result = $conn->query("SELECT * FROM " . $managerinfo . " WHERE Email='" . $Email . "' AND PassWord='" . $PassWord . "'");
    return $result;
}


function insertUser($FullName,  $DOB, $GENDER, $PhoneNumber, $Email, $PassWord, $Branch, $NationalID, $conn)
{
    $sql = "INSERT INTO managerinfo (FullName, DOB, GENDER, PhoneNumber, Email, PassWord, Branch, NationalID) VALUES ('$FullName',  '$DOB', '$GENDER','$PhoneNumber', '$Email', '$PassWord','$Branch', '$NationalID')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


function displayManagers($conn, $managerinfo)
{
    $result = $conn->query("SELECT * FROM " . $managerinfo);
    return $result;
}


function displayAdmins($conn)
{
    $sql = "SELECT * FROM admininfo";
    $result = $conn->query($sql);

    return $result;
}

function deleteAdmin($conn, $deleteEmail)
{
    $deleteSql = "DELETE FROM admininfo WHERE A_Email='$deleteEmail'";
    return $conn->query($deleteSql);
}

function addAdmin($conn)
{
    $ID = $_POST['id'];
    $A_FullName = $_POST['a_fname'];
    $A_DOB = $_POST['a_dob'];
    $A_GANDER = $_POST['a_gander'];
    $A_PhoneNumber = $_POST['PN'];
    $A_Email = $_POST['a_email'];
    $A_Password = $_POST['a_password'];
    $A_Branch = $_POST['a_branch'];
    $A_NationalID = $_POST['a_nid'];

    $insertSql = "INSERT INTO admininfo (ID,A_FullName,  A_DOB, A_GANDER,A_PhoneNumber, A_Email, A_Password,A_Branch, A_NationalID) 
                  VALUES ('$ID','$A_FullName', '$A_DOB', '$A_GANDER','$A_PhoneNumber', '$A_Email', '$A_Password','$A_Branch', '$A_NationalID')";

    return $conn->query($insertSql);
}

function displayProducts($conn)
{
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Product Information</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Product Code</th><th>Product Name</th><th>Size</th><th>Color</th><th>Price</th><th>Product Image</th><th>Action</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['ProductCode'] . "</td>";
            echo "<td>" . $row['ProductName'] . "</td>";
            echo "<td>" . $row['Size'] . "</td>";
            echo "<td>" . $row['Color'] . "</td>";
            echo "<td>" . $row['Price'] . "</td>";
            echo "<td><img src='" . $row['ProductImage'] . "' height='100' width='100'></td>";
            echo "<td><a href='?delete=" . $row['ProductCode'] . "'>Delete</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No products found.";
    }
}

function searchProducts($conn, $searchTerm)
{
    $searchTerm = mysqli_real_escape_string($conn, $searchTerm); 

    $sql = "SELECT * FROM products WHERE ProductName LIKE '%$searchTerm%' OR ProductCode LIKE '%$searchTerm%' OR Color LIKE '%$searchTerm%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Search Results</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Product Code</th><th>Product Name</th><th>Size</th><th>Color</th><th>Price</th><th>Product Image</th><th>Action</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['ProductCode'] . "</td>";
            echo "<td>" . $row['ProductName'] . "</td>";
            echo "<td>" . $row['Size'] . "</td>";
            echo "<td>" . $row['Color'] . "</td>";
            echo "<td>" . $row['Price'] . "</td>";
            echo "<td><img src='" . $row['ProductImage'] . "' height='100' width='100'></td>";
            echo "<td><a href='?delete=" . $row['ProductCode'] . "'>Delete</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No matching products found.";
    }
}

?>

