<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup_login.css">
    <link rel="stylesheet" href="css/header_footer.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css"
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Login Error</title>
</head>

<body>

    <nav class="navbar">

        <div class="logo">
            <img src="images/logo.png" width="125px">
        </div>

        <nav>
            <ul class="menu">
                <li><a href="home.php" class="active">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="checkout.php"><i class="fas fa-shopping-cart"></i></a></li>
            </ul>
            <div class="menu-btn">
                <i class="fa fa-bars"></i>
            </div>
        </nav>
    </nav>
    <div class="container">
        <header>
            <h2 class="login-failed">Login Failed</h2>
        </header>
        <h2 class="error-message">There was an error validating your username and password.
            <br>Hit the back button or <a href="login.php">here to log-in again</a>
        </h2>
    </div>

    <?php
    include_once('../includes/footer_inc.php')
    ?>

</body>

</html>