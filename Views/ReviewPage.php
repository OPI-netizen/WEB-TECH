<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Reviews</title>
  <style>
    
    body {
      font-family: Arial, sans-serif;
      background-color: #f7f7f7;
      margin: 0;
      padding: 20px;
    }
    h1 {
      text-align: center;
      color: #f28500;
    }
    p {
      background-color: #fff;
      border: 1px solid #ccc;
      padding: 10px;
      margin: 10px 0;
    }
    strong {
      color: #f28500;
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

  <h1>Reviews</h1>

  <a href="ManagerPage.php" style="position: absolute; top: 10px; right: 10px;"><b>Back to Manager Page</b></a>

  <?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "manager";
    $conn = new mysqli($servername, $username, $password, $dbname);

   
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

 
    $sql = "SELECT UserName, ReviewContent FROM review";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      
      while ($row = $result->fetch_assoc()) {
        echo "<p><strong>Name:</strong> " . $row["UserName"] . "<br><strong>Review:</strong> " . $row["ReviewContent"] . "</p>";
      }
    } else {
      echo "<p>No reviews yet.</p>";
    }
    $conn->close();
  ?>

</body>
</html>
