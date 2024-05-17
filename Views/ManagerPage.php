<?php 
include('../Controllers/PageController.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manager Page</title>
    <style>
        body {
            background-color: rgb(208, 211, 212);
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #f28500;
            font-size: 300%;
            text-align: center;
        }

        a.button {
            display: block;
            width: 200px;
            margin: 10px auto;
            padding: 10px;
            text-align: center;
            background-color: #f28500;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        a.button:hover {
            background-color: #DE7C00;
        }
    </style>
</head>

<body>
    <h1>Welcome to Manager Page</h1>

    <a class="button" href="UpdateProfile.php">Update Profile</a>
    <a class="button" href="ManagerInfo.php">Manager Info</a>
    <a class="button" href="AdminInfo.php">Admin Info</a>
    <a class="button" href="ViewProduct.php">View Product</a>
    <a class="button" href="SearchProduct.php">Search Product</a>
    <a class="button" href="ReviewPage.php">Review</a>
    <a class="button" href="?logout=true">Log out</a> 

</body>

</html>
