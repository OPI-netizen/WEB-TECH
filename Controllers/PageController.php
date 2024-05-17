<?php
include("../Models/alldb.php");
session_start();
$error="";



if (!isset($_SESSION['loggedIn']) || empty($_SESSION['Email'])) {
    header("Location: ManagerLogin.php");
    exit();
}

if (isset($_GET['logout'])) 
{
    session_destroy(); 
    header("Location: ManagerLogin.php");
    exit();
}

?>