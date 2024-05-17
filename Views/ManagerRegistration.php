<?php 
include('../Controllers/RegistrationController.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registration Page</title>
    <style>
        body {
            background-color: rgb(208, 211, 212);
            font-family: Arial, sans-serif;
        }

        center {
            margin-top: 5%;
        }

        h1 {
            color: #f28500;
            font-size: 300%;
        }

        table {
            margin: 0 auto;
        }

        td {
            padding: 5px;
        }

        input[type="text"],
        input[type="date"],
        input[type="email"],
        input[type="password"],
        input[type="checkbox"] 
        input[type="radio"] {
            padding: 8px;
            width: 200px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #f28500;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #DE7C00;
        }

        hr {
            height: 3px;
            width: 20%;
            color: gray;
            background-color: #f28500;
        }

        a {
            color: #f28500;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        p {
            color: red;
            text-align: center;
        }
    </style>
</head>

<body>
    <center>
        <h1>Manager Registration</h1>
        <form method="post" onsubmit="return validateForm()">
            <table>
                <tr>
                    <td style="color: #f28500; font-size:150%;"><b>Fullname:</b></td>
                    <td><input type="text" name="fname" placeholder="Enter Fullname">
                        <span class="error-message" id="fullnameError"></span>
                    </td>
                </tr>
                <tr>
                    <td style="color: #f28500;font-size:150%;"><b>Date of Birth:</b></td>
                    <td><input type="date" name="dob">
                        <span class="error-message" id="dobError"></span>
                    </td>
                </tr>
                <tr>
                    <td style="color: #f28500;font-size:150%;"><b>Gender:</b></td>
                    <td>
                        <input type="checkbox" name="gender" value="Male"> Male
                        <input type="checkbox" name="gender" value="Female"> Female<br>
                       
                    </td>
                </tr>
                <tr>
                    <td style="color: #f28500;font-size:150%;"><b>Phone Number:</b></td>
                    <td><input type="text" name="PN" placeholder="Enter Phone Number">
                        <span class="error-message" id="phoneError"></span>
                    </td>
                </tr>
                <tr>
                    <td style="color: #f28500;font-size:150%;"><b>E-mail:</b></td>
                    <td><input type="email" name="eml" placeholder="Enter Email">
                        <span class="error-message" id="emailError"></span>
                    </td>
                </tr>
                <tr>
                    <td style="color: #f28500;font-size:150%;"><b>Password:</b></td>
                    <td><input type="password" name="pass" placeholder="Enter Password">
                        <span class="error-message" id="passwordError"></span>
                    </td>
                </tr>
                <tr>
                    <td style="color: #f28500;font-size:150%;"><b>Branch:</b></td>
                    <td>
                        <input type="radio" name="branch" value="Motijheel">Motijheel<br>
                        <input type="radio" name="branch" value="Mohammadpur">Mohammadpur<br>
                        <input type="radio" name="branch" value="Mirpur">Mirpur<br>
                        <span class="error-message" id="branchError"></span>
                    </td>
                </tr>
                <tr>
                    <td style="color: #f28500;font-size:150%;"><b>NID:</b></td>
                    <td><input type="text" name="nid" placeholder="Enter NID" maxlength="10">
                        <span class="error-message" id="nidError"></span>
                    </td>
                </tr>
            </table>
            <br>
            <input type="submit" value="Submit"><br><br>

            <hr>

            <p>Already have an Account?<strong><a href="ManagerLogin.php">Login Now!</a></strong></p>

        </form>
    </center>

    
</body>

</html>