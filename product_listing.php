<?php
require_once("includes/dbh.inc.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px 0;
        }
        .product {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            width: 300px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .product h2 {
            margin-top: 0;
        }
        .product p {
            margin-bottom: 5px;
        }
        .product img {
            width: 100%;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Product Listing</h1>
    <div class="product-container">
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
            $query = "SELECT * FROM product";
            $statement = $pdo->prepare($query);
            $statement->execute();

            // Fetch all rows from the result set
            $products = $statement->fetchAll(PDO::FETCH_ASSOC);

            // Output the retrieved data
            foreach ($products as $product) {
                echo "<div class='product'>";
                // Construct the correct image path
                $imagePath = "images/uploads/" . basename($product['imagePath']);
                echo "<img src='{$imagePath}' alt='{$product['productName']}'>";
                echo "<h2>{$product['productName']}</h2>";
                echo "<p>Price: {$product['productPrice']}</p>";
                echo "<p>Quantity: {$product['productQuantity']}</p>";
                echo "<p>Dosage: {$product['dosage']}</p>";
                echo "<p>Dosage Form: {$product['dosageForm']}</p>";
                echo "<p>Added Date: {$product['productAddedDate']}</p>";
                echo "</div>";
            }

        } catch (PDOException $e) {
            echo "<p>Connection failed: " . $e->getMessage() . "</p>";
        }
        ?>
    </div>
</body>
</html>
