<?php
include('../Controllers/LoginController.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <style>
        body {
            background-color: rgb(208, 211, 212);
            font-family: Arial, sans-serif;
        }

        center {
            margin-top: 10%;
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
        input[type="password"] {
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

        p {
            color: red;
            text-align: center;
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
    </style>

</head>

<body>
    <center>
        <h1>Manager Login</h1>
        <form method="post" action="" onsubmit="return validateForm()" name="loginForm">

            <table>
                <tr>
                    <td style="color: #f28500; font-size:150%;"><b>E-mail:</b></td>
                    <td><input type="text" name="eml" placeholder="Enter Email"></td>
                </tr>
                <tr>
                    <td></td> 
                    <td><span id="emailError" style="color: red;"></span></td>
                </tr>

                <tr>
                    <td style="color: #f28500; font-size:150%;"><b>Password:</b></td>
                    <td><input type="password" name="pass" placeholder="Enter Password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><span id="passwordError" style="color: red;"></span></td>
                </tr>

            </table>
            <br>

            <input type="submit" name="submit" value="Login"><br><br>

            <?php if (!empty($error)) { ?>
                <p><?php echo $error; ?></p>
            <?php } ?>

            <hr>

            <a href="HomePage.php" style="position: absolute; top: 10px; right: 10px;"><b>Back to Home Page</b></a>

            <p>Don't have an Account?<strong><a href="ManagerRegistration.php">Register Now!</a></strong></p>

        </form>
    </center>
</body>

</html>