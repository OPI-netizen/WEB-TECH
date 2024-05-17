<?php
include('../Controllers/AInfoController.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Information</title>
    <style>
        body {
            background-color: rgb(208, 211, 212);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1,
        h2 {
            color: #f28500;
            text-align: center;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
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
        input[type="email"] {
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
    <h1>Welcome, Manager!</h1>

    <?php
        echo "<h2>Admin Information</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Full Name</th><th>Date of Birth</th><th>Gander</th><th>Phone Number</th><th>Email</th><th>Branch</th><th>NID</th><th>Action</th></tr>";

        if($result->num_rows > 0)
        {while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['ID'] . "</td>";
            echo "<td>" . $row['A_FullName'] . "</td>";
            echo "<td>" . $row['A_DOB'] . "</td>";
            echo "<td>" . $row['A_GANDER'] . "</td>";
            echo "<td>" . $row['A_PhoneNumber'] . "</td>";
            echo "<td>" . $row['A_Email'] . "</td>";
            echo "<td>" . $row['A_Branch'] . "</td>";
            echo "<td>" . $row['A_NationalID'] . "</td>";
            echo "<td><a href='?delete=" . $row['A_Email'] . "'>Delete</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No admin found.";
    }
    ?>

    <h2>Add New Admin</h2>
    <form method="post" action="">

        <input type="text" name="id" placeholder="Admin ID">
        <input type="text" name="a_fname" placeholder="Admin Full Name">
        <input type="date" name="a_dob" placeholder="Date of Birth">
        <label for="male">Male</label>
        <input type="radio" name="a_gander" value="male" id="male">
        <label for="female">Female</label>
        <input type="radio" name="a_gander" value="female" id="female">
        <input type="text" name="PN" placeholder="Admin Phone Number">
        <input type="email" name="a_email" placeholder="Admin Email">
        <input type="password" name="a_password" placeholder="Admin Password">


        <label for="motijheel">Motijheel</label>
        <input type="radio" name="a_branch" value="motijheel" id="motijheel">
        <label for="mohammadpur">Mohammadpur</label>
        <input type="radio" name="a_branch" value="mohammadpur" id="mohammadpur">
        <label for="mirpur">Mirpur</label>
        <input type="radio" name="a_branch" value="mirpur" id="mirpur">





        <input type="text" name="a_nid" placeholder="National ID">

        <input type="submit" value="Add Admin">
    </form>

    <a href="ManagerPage.php" style="position: absolute; top: 10px; right: 10px;"><b>Back to Manager Page</b></a>

</body>

</html>

<?php
$conn->close();
?>