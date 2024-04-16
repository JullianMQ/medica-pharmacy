<?php
	include_once('../includes/config.inc.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Medica Pharmacy | About Us </title>
	<link rel="stylesheet" href="css/header_footer.css">
	<link rel="stylesheet" href="css/about.css">
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
				<li><a href="home.php">Home</a></li>
				<li><a href="products.php">Products</a></li>
				<li><a href=" about.php" class="active">About Us</a></li>
				<li><a href="contact.php">Contact Us</a></li>
				<li><a href="checkout.php"><i class="fas fa-shopping-cart"></i></a></li>
			</ul>
			<div class="menu-btn">
				<i class="fa fa-bars"></i>
			</div>
		</nav>
	</nav>
	<div class="container">
		<div class="grid-row">
			<div class="card">
				<h1 class="heading">Mission</h1>
				<p class="content">To provide the best pharmaceutical and clinical in high quality, modern technology
					and the most reasonably priced cost for the patients of MEDICA facilities</p>
			</div>
			<div class="card">
				<h1 class="heading">Vision</h1>
				<p class="content">To provide the best pharmaceutical and clinical in high quality, modern technology
					and the most reasonably priced cost for the patients of MEDICA facilities</p>
			</div>
			<div class="card">
				<h1 class="heading">Core Values</h1>
				<ul class="listing">
					<li>Professionalism</li>
					<li>Quality</li>
					<li>Transparency</li>
					<li>Initiative and Productivity</li>
					<li>Complete Care</li>
					<li>Integration</li>
				</ul>
			</div>
		</div>
	</div>

	<?php 
		include_once('../includes/footer_inc.php')
	?>

</body>

</html>
