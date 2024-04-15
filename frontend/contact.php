<?php
  include_once('../includes/config.inc.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title> Medica Pharmacy | Contact Us </title>
  <link rel="stylesheet" href="css/contact.css">
	<link rel="stylesheet" href="css/header_footer.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>

<nav class="navbar">

		<div class="logo">
			<img src="images/logo.png" width="125px">
		</div>

		<nav>
			<ul class="menu">
				<li><a href="home.php">Home</a></li>
				<li><a href="products.php">Products</a></li>
				<li><a href="about.php">About Us</a></li>
				<li><a href="contact.php" class="active">Contact Us</a></li>
				<li><a href="checkout.php"><i class="fas fa-shopping-cart"></i></a></li>
			</ul>
			<div class="menu-btn">
				<i class="fa fa-bars"></i>
			</div>
		</nav>
</nav>

  <div class="container">
    <span class="big-circle"></span>
    <img src="images/shape.png" class="square" alt="" />
    <div class="form">
      <div class="contact-info">
        <h3 class="title">Contact Us</h3>
        <p class="text">
          Send us your queries through
        </p>

        <div class="info">
          <div class="information">
            <img src="images/location.png" class="icon" alt="" />
            <p>Sto. Rosario, Angeles, Pampanga</p>
          </div>
          <div class="information">
            <img src="images/email.png" class="icon" alt="" />
            <p>medicaofficial@gmail.com</p>
          </div>
          <div class="information">
            <img src="images/phone.png" class="icon" alt="" />
            <p>123-456-789-21</p>
          </div>
        </div>

        <div class="social-media">
          <p>Connect with us :</p>
          <div class="social-icons">
            <a href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="contact-form">
        <span class="circle one"></span>
        <span class="circle two"></span>
        <iframe class="googlemap"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3851.447720735891!2d120.58959474999999!3d15.133737049999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3396f24f0510aa79%3A0x47894455402613c3!2sSto.%20Rosario%2C%20Angeles%2C%20Pampanga!5e0!3m2!1sen!2sph!4v1713098701565!5m2!1sen!2sph"
          width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>

      </div>
    </div>
  </div>

  <script> const inputs = document.querySelectorAll(".input");

    function focusFunc() {
      let parent = this.parentNode;
      parent.classList.add("focus");
    }

    function blurFunc() {
      let parent = this.parentNode;
      if (this.value == "") {
        parent.classList.remove("focus");
      }
    }

    inputs.forEach((input) => {
      input.addEventListener("focus", focusFunc);
      input.addEventListener("blur", blurFunc);
    }); </script>

	<?php 
		include_once('../includes/footer_inc.php')
	?>	

</body>
</html>