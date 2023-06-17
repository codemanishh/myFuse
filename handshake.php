<!DOCTYPE html>
<html>
<head>
  <title>Job Portal</title>
  <style>
    /* CSS styles */
    body {
      background-color: #F5F6FF;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    .navbar {
      background-color: #D3FB52;
      padding: 20px;
      display: flex;
      justify-content: space-between;
    }

    .navbar-logo {
      display: flex;
      align-items: center;
    }

    .navbar-logo img {
      height: 40px;
      margin-right: 10px;
    }

    .navbar-nav {
      display: flex;
      align-items: center;
    }

    .navbar-nav li {
      list-style-type: none;
      margin-right: 20px;
    }

    .navbar-nav li a.active {
        color: red;
    }

    .navbar-nav li a {
      color: #052323;
      text-decoration: none;
      font-weight: bold;
    }

    .navbar-nav .dropdown {
      position: relative;
    }

    .navbar-nav .dropdown-content {
      display: none;
      position: absolute;
      background-color: #F5F6FF;
      min-width: 150px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .navbar-nav .dropdown:hover .dropdown-content {
      display: block;
    }

    .navbar-nav .dropdown-content a {
      color: #052323;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .banner {
      background-image: url('assets/img/banner-sec1.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      height: 500px;
      display: flex;
      align-items: center;
      justify-content: center;
      /* color: #FFFFFF; */
      color: #D3FB8d;
      font-size: 24px;
      text-align: center;
    }

    .section {
      background-color: #FFFFFF;
      padding: 20px;
      text-align: center;
    }

    .section h2 {
      color: #052323;
    }

    .section img {
      width: 200px;
      height: 200px;
      margin: 20px;
    }

    .testimonial {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .testimonial img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      margin: 10px;
    }

    .partners {
      display: flex;
      justify-content: space-around;
      padding: 20px;
    }

    .partners img {
      width: 80px;
      height: 80px;
      margin: 10px;
    }

    .students {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      padding: 20px;
    }

    .students img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      margin: 5px;
    }
  </style>
</head>
<body>
  <div class="navbar">
    <div class="navbar-logo">
      <img src="assets/img/MyFuse.png" alt="Company Logo">
    </div>
    <ul class="navbar-nav">
      <li class="dropdown">
        <a href="#">Student</a>
        <div class="dropdown-content">
          <a href="login-candidates.php">Login</a>
          <a href="register-candidates.php">Signup</a>
        </div>
      </li>
      <li class="dropdown">
        <a href="#">Companies</a>
        <div class="dropdown-content">
          <a href="login-company.php">Login</a>
          <a href="register-company.php">Signup</a>
        </div>
      </li>
      <li class="dropdown">
        <a href="#">Admin</a>
        <div class="dropdown-content">
          <a href="admin/index.php">Login</a>
        </div>
      </li>
      <li><a href="aboutus.php">About Us</a></li>
      <li><a href="contact.php">Contact Us</a></li>
    </ul>
  </div>

  <div class="banner">
    <h1>Unlock Off Campus Opportunities</h1>
  </div>

  <div class="section">
    <h2>Section 2</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dapibus pharetra dui, sed suscipit justo pellentesque non. </p>
    <img src="section1.jpg" alt="Image 1">
    <img src="image2.jpg" alt="Image 2">
    <img src="image3.jpg" alt="Image 3">
  </div>

  <div class="section">
    <h2>Section 3</h2>
    <img src="phase1.jpg" alt="Phase 1">
    <img src="phase2.jpg" alt="Phase 2">
    <img src="phase3.jpg" alt="Phase 3">
    <img src="phase4.jpg" alt="Phase 4">
  </div>

  <div class="section">
    <h2>Section 4</h2>
    <div class="testimonial">
      <img src="testimonial1.jpg" alt="Testimonial 1">
      <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dapibus pharetra dui, sed suscipit justo pellentesque non."</p>
    </div>
    <div class="testimonial">
      <img src="testimonial2.jpg" alt="Testimonial 2">
      <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dapibus pharetra dui, sed suscipit justo pellentesque non."</p>
    </div>
    <div class="testimonial">
      <img src="testimonial3.jpg" alt="Testimonial 3">
      <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dapibus pharetra dui, sed suscipit justo pellentesque non."</p>
    </div>
  </div>

  <div class="section">
    <h2>Section 5</h2>
    <p>Trusted Partners:</p>
    <div class="partners">
      <img src="partner1.jpg" alt="Technology Partner">
      <img src="partner2.jpg" alt="Finance and Accounting Partner">
      <img src="partner3.jpg" alt="Sales and Business Development Partner">
      <img src="partner4.jpg" alt="Marketing Partner">
    </div>
  </div>

  <div class="section">
    <h2>Section 6</h2>
    <div class="students">
      <?php
        for ($i = 1; $i <= 20; $i++) {
          echo '<img src="student' . $i . '.jpg" alt="Student ' . $i . '">';
        }
      ?>
    </div>
  </div>

  <script> 
            $(".nav-item a").on("click", function() {
            $(".nav-item a").removeClass("active");
            $(this).addClass("active");
            });
    </script>
</body>
</html>
