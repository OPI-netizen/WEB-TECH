<?php
include('../Controllers/SearchController.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Search Product</title>
    <style>
        body {
            background-color: rgb(208, 211, 212);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #f28500;
            text-align: center;
        }

        h2 {
            color: #f28500;
            text-align: center;
        }

        form {
            width: 50%;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"] {
            padding: 8px;
            width: calc(100% - 16px);
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #f28500;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #DE7C00;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f28500;
            color: white;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #f28500;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>Welcome, Manager!</h1>

  
    <form method="post" action="">
        <input type="text" name="searchTerm" placeholder="Search by name, code, or color">
        <input type="submit" name="search" value="Search">
    </form>

   
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
        $searchTerm = $_POST['searchTerm'];

        if (!empty($searchTerm)) {
            searchProducts($conn, $searchTerm);
        } else {
            echo "Please enter a search term.";
        }
    }
    ?>


    <a href="ManagerPage.php" style="position: absolute; top: 10px; right: 10px;"><b>Back to Manager Page</b></a>
</body>

</html>
<?php
$conn->close();
?>