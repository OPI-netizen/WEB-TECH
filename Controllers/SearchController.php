<?php
include("../Models/alldb.php");
session_start();
$error = "";
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

?>