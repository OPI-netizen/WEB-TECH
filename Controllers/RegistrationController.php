<?php
include("../Models/alldb.php");
session_start();
$error="";
$conn = getConnection();



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $requiredFields = ['fname', 'dob', 'gender','PN', 'eml', 'pass','branch', 'nid'];
    $isValid = true;

    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            $isValid = false;
            break;
        }
    }



    if ($isValid) {
        $FullName = $_POST['fname'];
        
       
        $DOB = $_POST['dob'];
        $GANDER = $_POST['gender'];
        $PhoneNumber = $_POST['PN'];
        $Email = $_POST['eml'];
        $PassWord = $_POST['pass'];
        $Branch = $_POST['branch'];
        $NationalID = $_POST['nid'];

        insertUser($FullName, $DOB, $GANDER,$PhoneNumber, $Email, $PassWord,$Branch, $NationalID, $conn);
    } else {
        echo "Please fill in all the required fields.";
    }
}


?>

<script>
        function validateForm() {


            
    var fullName = document.getElementsByName("fname")[0].value.trim();
    var dob = document.getElementsByName("dob")[0].value.trim();
    var genderChecked = document.querySelectorAll('input[name="gender"]:checked').length > 0;
    var phoneNumber = document.getElementsByName("PN")[0].value.trim();
    var email = document.getElementsByName("eml")[0].value.trim();
    var password = document.getElementsByName("pass")[0].value.trim();
    var branch = document.querySelector('input[name="branch"]:checked');
    var nid = document.getElementsByName("nid")[0].value.trim();
          
        var isValid = true;

if (fullName === "") {
    displayValidationMessage("fullnameError", "Fullname cannot be empty");
    isValid = false;
}

if (dob === "") {
    displayValidationMessage("dobError", "Date of Birth cannot be empty");
    isValid = false;
}

if (!genderChecked) {
        displayValidationMessage("genderError", "Please select a gender");
        isValid = false;
    }

if (phoneNumber === "") {
    displayValidationMessage("phoneError", "Phone Number cannot be empty");
    isValid = false;
} else if (!isValidPhoneNumber(phoneNumber)) {
    displayValidationMessage("phoneError", "Invalid Phone Number");
    isValid = false;
}

if (email === "") {
    displayValidationMessage("emailError", "Email cannot be empty");
    isValid = false;
} else if (!isValidEmail(email)) {
    displayValidationMessage("emailError", "Invalid Email format");
    isValid = false;
}

if (password === "") {
    displayValidationMessage("passwordError", "Password cannot be empty");
    isValid = false;
} else if (password.length < 6) { 
    displayValidationMessage("passwordError", "Password must be at least 6 characters long");
    isValid = false;
}


if (branch === null) {
    displayValidationMessage("branchError", "Please select a Branch");
    isValid = false;
}

if (nid === "") {
    displayValidationMessage("nidError", "NID cannot be empty");
    isValid = false;
} else if (nid.length !== 10) {
    displayValidationMessage("nidError", "NID should be 10 characters long");
    isValid = false;
}

return isValid;
        }

        function displayValidationMessage(elementId, message) {
            var errorMessageElement = document.getElementById(elementId);
            errorMessageElement.textContent = message;
        }

        function resetValidationMessages() {
            var errorElements = document.querySelectorAll('.error-message');
            errorElements.forEach(function (element) {
                element.textContent = "";
            });
        }

        function isValidPhoneNumber(phone) {
            return /^\d{10}$/.test(phone);
        }

        function isValidEmail(email) {
            return /\S+@\S+\.\S+/.test(email);
        }
    </script>