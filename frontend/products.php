<?php
require_once("../includes/dbh.inc.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
    <link rel="stylesheet" href="css/productstyles.css">
	<link rel="stylesheet" href="css/navbar_inc.css">
	<link rel="stylesheet" href="css/header_footer.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css"
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
		integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
<body>
<nav class="navbar">

		<div class="logo">
			<img src="images/logo.png" width="125px">
		</div>

		<nav>
			<ul class="menu">
				<li><a href="home.php">Home</a></li>
				<li><a href="products.php" class="active">Products</a></li>
				<li><a href="about.php">About Us</a></li>
				<li><a href="contact.php">Contact Us</a></li>
				<li><a href="checkout.php"><i class="fas fa-shopping-cart"></i></a></li>
			</ul>
			<div class="menu-btn">
				<i class="fa fa-bars"></i>
			</div>
		</nav>
</nav>

        <section class="sec">
            <div class="products">
        <?php
        // Database connection and product retrieval logic
        try {
            // Establish a connection to the database
            $pdo = new PDO($server, $db_userName, $db_pword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Specify the database name
            $dbname = "pharmacy";

            // Use the specified database
            $pdo->exec("USE $dbname");

            // SELECT data from the product table
            $query = "SELECT * FROM products";
            $statement = $pdo->prepare($query);
            $statement->execute();

            // Fetch all rows from the result set
            $products = $statement->fetchAll(PDO::FETCH_ASSOC);

            // Output the retrieved data

            foreach ($products as $product) {
                // Construct the correct image path
                $imagePath = "images/" . basename($product['imagePath']);
                echo "
                <div class='card'>
                <div class='img'><img src='{$imagePath}' alt='{$product['productName']}'></div>
				<div class='desc'> {$product['productName']}</div>
				<div class='title'> {$product['productDesc']}</div>
				<div class='box'>
					<div class='price'>₱ {$product['productPrice']}</div>
                    <button class='btn'>Add to Cart</button>
				</div>
                </div>";
            }

        } catch (PDOException $e) {
            echo "<p>Connection failed: " . $e->getMessage() . "</p>";
        }
        ?>
    </section>
        </div>

    <?php 
		include_once('../includes/footer_inc.php')
	?>	
</body>
</html>
