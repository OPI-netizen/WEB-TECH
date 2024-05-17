<?php
include("../Models/alldb.php");
session_start();

$conn = getConnection(); 

if (!isset($_SESSION['loggedIn']) || empty($_SESSION['Email'])) {
    header("Location: ManagerLogin.php");
    exit();
}


if (isset($_GET['delete'])) {
    $deleteEmail = $_GET['delete'];
    $deleteSql = "DELETE FROM admininfo WHERE A_Email='$deleteEmail'";

    if ($conn->query($deleteSql) === TRUE) {
        echo "Admin deleted successfully.";
    } else {
        echo "Error deleting admin: " . $conn->error;
    }
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {

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

    if ($conn->query($insertSql) === TRUE) {
        echo "Admin added successfully.";
    } else {
        echo "Error adding admin: " . $conn->error;
    }
}

$result = displayManagers($conn, 'admininfo'); 

?>
