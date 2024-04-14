<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header_footer.css">
    <link rel="stylesheet" href="css/signup_login.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css"
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Medica Pharmacy | Login</title>
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
    <!-- Redirect into landing page/home page -->
    <div class="container">
        <header class="title-header">Medica-Pharmacy</header>
        <form action="../includes/login.inc.php" method="POST" class="form">
        <div class="form-container">
            <h1 class="header-h1">Log In</h1>
            <label for="userName" class="form-label">Enter your username</label>
            <input type="text" name="userName" placeholder="Username" class="form-text" id="userName" required onfocusout="check_user_input()">

            <label for="userName" class="form-label">Enter your Password</label>
            <input type="password" name="pword" placeholder="Password" required class="form-text">
            <!-- 
                ADD A WAY TO CREATE A Forgot Password HERE
                # OPTIONAL TODO:
                SHOPEE WAY: Click Forgot Password -> Enter email
                            -> Message email -> with link on how to reset
                            -> Redirect into page -> Page asks to input new password
                            -> It then updates the database to that password
            -->
            <small><small> <a href="#todo" target="_blank">Forgot Password? Click here</a> </small></small>

            <input type="submit" class="form-button" value="Log In">
        </div>
        </form>
    </div>
    
    <?php 
		include_once('../includes/footer_inc.php')
	?>	

</body>
</html>