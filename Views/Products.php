<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "manager";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function displayProducts($conn, $condition = "")
{
    $sql = "SELECT * FROM products";
    if (!empty($condition)) {
        $sql .= " WHERE $condition";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Product Information</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Product Code</th><th>Product Name</th><th>Size</th><th>Color</th><th>Price</th><th>Product Image</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['ProductCode'] . "</td>";
            echo "<td>" . $row['ProductName'] . "</td>";
            echo "<td>" . $row['Size'] . "</td>";
            echo "<td>" . $row['Color'] . "</td>";
            echo "<td>" . $row['Price'] . "</td>";
            echo "<td><img src='" . $row['ProductImage'] . "' height='100' width='100'></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No products found.";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Product Information - Buyer View</title>
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

        form {
            width: 50%;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
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
    <h1>Welcome, Buyer!</h1>

    <form method="post" action="">
        <input type="text" name="searchTerm" placeholder="Search by name, code, or color">
        <input type="submit" name="search" value="Search">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
        $searchTerm = $_POST['searchTerm'];

        if (!empty($searchTerm)) {
            $condition = "ProductName LIKE '%$searchTerm%' OR ProductCode LIKE '%$searchTerm%' OR Color LIKE '%$searchTerm%'";
            displayProducts($conn, $condition);
        } else {
            echo "Please enter a search term.";
        }
    } else {
        displayProducts($conn);
    }
    ?>

    <a href="HomePage.php" style="position: absolute; top: 10px; right: 10px;"><b>Back to Home</b></a>
</body>

</html>

<?php
$conn->close();
?>
