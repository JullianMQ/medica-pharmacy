<?php
	include_once('../includes/config.inc.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Medica Pharmacy | Home </title>
	<link rel="stylesheet" href="css/homestyles.css">
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

	<div class="row">

		<div class="col-2">
			<h1> Prescription for Wellness <br> Every Dose Counts. </h1>
			<p> Your neighborhood pharmacy, dedicated to providing expert care and quality <br> medications to support
				your health and well-being. </p>
			<a href="products.php" class="btn"> View Products </a>
		</div>

		<div class="col-2">
			<img src="images/fr.png">
		</div>

	</div>

	<!--collage-->
	<div class="featured">
		<div class="box">
			<div class="collage">
				<a href="products.php"> <img src="images/featured.png"> </a>
				<a href="products.php"><img src="images/pain.png"></a>
				<a href="products.php"><img src="images/oral.png"></a>
				<a href="products.php"><img src="images/respi.png"></a>
			</div>
		</div>
	</div>
	<!--feedbacks-->
	<div class="feedbacks-container">
		<div class="feedbacks">
			<div class="small-container">
				<div class="row2">
					<div class="col-3">
						<img src="images/lyra.jpg">
						<h4> Lyra Jemella Salvacion </h4>
						<i class="fa fa-quote-left"></i>
						<p>The ordering process on your website was seamless and user-friendly. I appreciated how easy
							it was to navigate and find the medications I needed.</p>
						<i class="fa fa-quote-right"></i>
						<div class="stars">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
					</div>
					<div class="col-3">
						<img src="images/julz.jpg">
						<h4> Jullian Quiambao </h4>
						<i class="fa fa-quote-left"></i>
						<p>The delivery of my prescription was prompt, and the packaging was secure. I was impressed
							with the efficiency of your shipping process.</p>
						<i class="fa fa-quote-right"></i>
						<div class="stars">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
					</div>
					<div class="col-3">
						<img src="images/ren.jpg">
						<h4> Renell Constantino </h4>
						<i class="fa fa-quote-left"></i>
						<p>I had a question about one of the medications I ordered, and your customer service team was
							quick to respond and provided helpful information. Great support!</p>
						<i class="fa fa-quote-right"></i>
						<div class="stars">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>

					</div>
					<div class="col-3">
						<img src="images/ces.jpg">
						<h4> Frances Tumampos </h4>
						<i class="fa fa-quote-left"></i>
						<p>I encountered an issue with my order, but your customer service team resolved it promptly and
							professionally. Thank you for your attention to customer satisfaction.</p>
						<i class="fa fa-quote-right"></i>
						<div class="stars">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<?php 
		include_once('../includes/footer_inc.php')
	?>	

</body>
</html>
