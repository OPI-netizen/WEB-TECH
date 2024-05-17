<?php
include("../Models/alldb.php");
session_start();
$error="";

$conn = getConnection();

if (isset($_POST['submit'])) {
    $error = '';

    if (empty($_POST['eml']) || empty($_POST['pass'])) {
        
    } else {
        $Email = $_POST["eml"];
        $PassWord = $_POST["pass"];

        $result = loginuser($conn, "managerinfo", $Email, $PassWord);

        if ($result->num_rows > 0) {
            $_SESSION['Email'] = $_POST['eml'];
            $_SESSION['PassWord'] = $_POST['pass'];
            $_SESSION['loggedIn'] = true;
            header("Location: ManagerPage.php");
            exit();
        } else {
            $error = "Email or Password is invalid";
        }
    }
}
?>

<script>
    function validateForm() {
        var email = document.forms["loginForm"]["eml"].value.trim();
        var password = document.forms["loginForm"]["pass"].value.trim();
        var emailError = document.getElementById("emailError");
        var passwordError = document.getElementById("passwordError");
        var isValid = true;

        emailError.textContent = ""; 
        passwordError.textContent = "";

        if (email === "") {
            emailError.textContent = "The Email field is required.";
            isValid = false;
        }

        if (password === "") {
            passwordError.textContent = "The Password field is required.";
            isValid = false;
        }

        return isValid;
    }
</script>
