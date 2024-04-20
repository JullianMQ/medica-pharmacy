<?php
  include_once('includes/config.inc.php');
  include_once('includes/dbh.inc.php');
  if (empty($_SESSION['userName'])) {
    header("Location: login.php");
  }
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Medica Pharmacy | Checkout Items </title>
  <link rel="stylesheet" href="css/checkoutstyles.css">
  <link rel="stylesheet" href="css/header_footer.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
  <nav class="navbar">
    <div class="logo">
      <img src="images/logo.png" width="125px">
    </div>

      <div class="user-profile">
        <i class="fa fa-regular fa-user"></i>
        <h3>
          <a href="login.php" class="user-icon">
            <?php
            if (empty($_SESSION['userName'])) {
              echo "Guest";
            } else {
              echo $_SESSION['userName'];
            }
            ?>
          </a>
        </h3>
      </div>

    <nav>
      <ul class="menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <li><a href="logout.php"><i class="fas fa-sign-out-alt" id="sign-out"></i></a></li>
        <li><a href="checkout.php" class="active"><i class="fas fa-shopping-cart"></i></a></li>
      </ul>

      <div class="menu-btn">
        <i class="fa fa-bars"></i>
      </div>
    </nav>
  </nav>
  <section class="sec">
    <div class="cartlist">
      <?php
        include_once('includes/view_cart_items.inc.php');
      ?>
    </div>
  </section>

  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

  <?php
  include_once('includes/footer_inc.php')
  ?>

</body>

</html>