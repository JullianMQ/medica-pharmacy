<?php
function checkIfLoggedIn()
{
    if (empty($_SESSION['userName'])) {
        header("Location: login.php");
    } else {
        echo "<input type='submit' class='btn' value='Add to Cart'></input>";
    }
}

try {
    // SELECT data from the product table
    $query = "SELECT * FROM products";
    $statement = $pdo->prepare($query);
    $statement->execute();

    // Fetch all rows from the result set
    $products = $statement->fetchAll(PDO::FETCH_ASSOC);
    // Database connection and product retrieval logic
    foreach ($products as $product) {
        // Construct the correct image path
        $db_quant = $product['productQuantity'];
        $db_prodID = $product['productID'];
        $db_prodPrice = $product['productPrice'];
        $imagePath = "images/" . basename($product['imagePath']);
        echo "
        <div class='card'>
            <div class='img'><img src='{$imagePath}' alt='{$product['productName']}'></div>
            <div class='desc'> {$product['productName']}</div>
            <div class='title'> {$product['productDesc']}</div>
            <div class='box'>
                <div class='qty-btn'>
                    <button id='decrement' onclick='decrement(quantity{$db_prodID})'>-</button>
                    <button id='increment' onclick='increment(quantity{$db_prodID}, {$db_quant})'>+</button>
                </div>
                <form action='includes/insert_cart.inc.php' method='post' class='form'>
                        <input type='number' class='quantity' id='quantity{$db_prodID}' name='quantity' value='1' min='1' max='$db_quant'>
                        <div class='price'> ₱ {$db_prodPrice} </div>
                        <input type='hidden' name='productID' value='{$db_prodID}'>          
                        ";
            checkIfLoggedIn();
            echo "  </form>     
                </div>    
        </div> ";
    }
    echo "
            <script>
                let quantity = document.getElementById('quantity{$db_prodID}');
                function increment(quantity, maxQuantity) {
                    if (parseInt(quantity.value) < maxQuantity) {
                        quantity.value = parseInt(quantity.value) + 1;
                    }
                }

                function decrement(quantity) {
                    if (parseInt(quantity.value) > 1) {
                        quantity.value = parseInt(quantity.value) - 1;
                    }
                }
            </script>
    ";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}