<?php
include("../Models/alldb.php");
session_start();

if (!isset($_SESSION['loggedIn']) || empty($_SESSION['Email'])) {
    header("Location: ManagerLogin.php");
    exit();
}

$conn = getConnection(); 

$result = displayManagers($conn, 'managerinfo'); 
?>
