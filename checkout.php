<?php
  include_once('includes/config.inc.php');
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
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="contact.php" >Contact Us</a></li>
        <li><a href="checkout.php" class="active"><i class="fas fa-shopping-cart"></i></a></li>
      </ul>

      <div class="menu-btn">
        <i class="fa fa-bars"></i>
      </div>
    </nav>
  </nav>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const menuBtn = document.querySelector(".menu-btn");
      const menu = document.querySelector("#menu");
      const contactSection = document.querySelector(".container");

      menuBtn.addEventListener("click", function () {
        menu.classList.toggle("active");
        menuBtn.classList.toggle("active");
        contactSection.classList.toggle("active");
      });
    });

    const addCartHTML = () => {
      listCartHTML.innerHTML = '';
      if (carts.length > 0) {
        carts.foreach(cart => {
          let newCart = document.createElement('div');
          newCart.classList.add('item');
          newCart.innerHTML = 
          "<div class='img'><img src='{$imagePath}' alt='{$product['productName']}'></div>" +
				  "<div class='desc'> {$product['productName']}</div>" +
				  "<div class='title'> {$product['productDesc']}</div>" +
          "<div class='price'>₱ {$product['productPrice']}</div>"
        })
      }
    }
  </script>
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

	<?php 
		include_once('includes/footer_inc.php')
	?>	

</body>

</html>