<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "manager";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $review = mysqli_real_escape_string($conn, $_POST['review']);

  $sql = "INSERT INTO review (UserName, ReviewContent) VALUES ('$username', '$review')";

  if ($conn->query($sql) === TRUE) {
    echo "<p>Review submitted successfully!</p>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>



<!DOCTYPE html>
<html>


<head>

  <title>Opify.com</title>

  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-image: url('pexels-hilal-kaçmaz.JPG');
      background-size: cover;
      background-position: center;
      height: 100vh;
      display: flex;
      flex-direction: column;
      color: white;
      align-items: center;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
      width: 100%;
      box-sizing: border-box;
    }

    .logo {
      font-family: 'Cooper Black';
      font-style: italic;
      color: #f28500;
      font-size: 2.5rem;
      font-weight: bold;
      text-transform: uppercase;
      letter-spacing: 2px;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .slogan {
      font-family: 'Times New Roman';
      color: #f28500;
      font-size: 3.5rem;
      text-align: left;
      margin-left: 20px;
      margin-top: 200px;
    }

    .description {
      text-align: left;
      margin-top: 10px;
      margin-left: 20px;
      font-size: 1.5rem;
    }

    .options {
      display: flex;
    }

    .option {
      margin-right: 15px;
      margin-bottom: 350px;
      font-weight: bold;
      position: relative;
      cursor: pointer;
      color: #f28500;
    }

    .option:last-child {
      margin-right: 0;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #333;
      min-width: 120px;
      z-index: 1;
      padding: 10px;
      top: 100%;
      left: 0;
    }

    .option:hover .dropdown-content {
      display: block;
    }

    .dropdown-item {
      color: white;
      padding: 8px 10px;
      text-decoration: none;
      display: block;
    }

    .dropdown-item:hover {
      background-color: #555;
    }





    .about-us {
      padding: 25px;
      background-color: #f28500;
      color: white;
      text-align: center;
      margin-top: 300px;
    }

    .about-us h2 {
      margin-bottom: 20px;
    }

    .about-content {
      max-width: 700px;
      margin: 0 auto;
    }

    .about-content p {
      margin-bottom: 20px;
      text-align: center;
    }





    .customer-reviews {
      margin-top: 0px;
    }


    .reviews-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .review {
      width: 1469px;
      padding: 25px;
      background-color: #f28500;
    }

    .review-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 10px;
    }

    .review-content {
      font-style: italic;
    }

    .review-form {
      max-width: 500px;
      margin: 0 auto;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      font-weight: bold;
    }

    input[type="text"],
    input[type="number"],
    textarea {
      width: 100%;
      padding: 8px;
      border-radius: 4px;
      border: 1px solid #ccc;
      resize: vertical;
    }

    button[type="submit"] {
      padding: 10px 20px;
      background-color: #4caf50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>
</head>


<body>


  <div class="header">
    <div>
      <div class="logo">OPIFY</div>
      <div class="slogan">Elevating Fashion for All Walks of Life</div>
      <div class="description">
        Opify is your ultimate destination for fashion experiences.<br> Discover our handpicked collection for the perfect mix of<br>style, comfort, and elegance.Experience fashion reinvented, only at Opify.
      </div>
    </div>
    <div class="options">
      <div class="option">
        Sign In
        <div class="dropdown-content">
          <a href="#" class="dropdown-item" onclick="openSignIn('Buyer')">Buyer</a>
          <a href="#" class="dropdown-item" onclick="openSignIn('Seller')">Seller</a>
          <a href="#" class="dropdown-item" onclick="openSignIn('Admin')">Admin</a>
          <a href="http://localhost/Manager/Views/ManagerLogin.php" class="dropdown-item" onclick="openSignIn('Manager')">Manager</a>
        </div>
      </div>
      <div class="option" onclick="openProducts()">Products</div>

    </div>
  </div>




  <div class="about-us">
    <h2>About Us</h2>
    <div class="about-content">
      <p>
        At Opify, we're passionate about redefining fashion. Our journey began with a simple vision: to create a clothing brand that blends style, comfort, and elegance effortlessly.
      </p>
      <p>
        Driven by this ethos, we curate every piece in our collection with meticulous attention to detail, ensuring that each garment reflects our commitment to quality and craftsmanship. From chic essentials to statement pieces, Opify offers a range of apparel designed to elevate your wardrobe.
      </p>
      <p>
        We believe that fashion is not just about what you wear, but how it makes you feel. That's why, at Opify, we strive to empower individuals to express their unique style confidently.
      </p>
      <p>
        Welcome to a world where fashion meets sophistication. Explore Opify and discover a new standard of elegance tailored just for you.
      </p>
    </div>
  </div>


  <div class="customer-reviews">

    <div class="reviews-container">
      <div class="review">
        <div class="review-header">




        </div>

        <form id="review-form" class="review-form">
          <h3>Leave a Review</h3>
          <div class="form-group">
            <label for="username">Your Name:</label>
            <input type="text" id="username" name="username" required>
          </div>

          <div class="form-group">
            <label for="review">Your Review:</label>
            <textarea id="review" name="review" required></textarea>
          </div>
          <button type="submit">Submit Review</button>
        </form>
      </div>






      <script>
        function openProducts() {
          window.location.href = "Products.php";
        }

        document.getElementById('review-form').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const username = document.getElementById('username').value;
    const review = document.getElementById('review').value;


 
    const formData = new FormData();
    formData.append('username', username);
    formData.append('review', review);

    fetch('HomePage.php', {
      method: 'POST',
      body: formData,
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.text();
    })
    .then(data => {
      
      console.log(data); 


      document.getElementById('username').value = ''; 
      document.getElementById('review').value = ''; 
    })
    .catch(error => {
      console.error('There has been a problem with your fetch operation:', error);
    });
  });
      </script>

</body>

</html>