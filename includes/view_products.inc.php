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
        $imagePath = "images/" . basename($product['imagePath']);
        echo "
        <div class='card'>
            <div class='img'><img src='{$imagePath}' alt='{$product['productName']}'></div>
            <div class='desc'> {$product['productName']}</div>
            <div class='title'> {$product['productDesc']}</div>
            <button id='increment' onclick='increment()'>+</button>
            <button id='decrement' onclick='decrement()'>-</button>
            <form action='includes/insert_cart.inc.php' method='post'>
                <div class='box'>
                    <div class='price'> ₱ {$product['productPrice']} </div>
                    <input type='hidden' name='productID' value='{$product['productID']}'>
                    <input type='number' id='quantity' name='quantity' value='1' min='1' max='{$product['productQuantity']}'>
                    ";
        checkIfLoggedIn();
        echo "      </div>
            </form>
        </div>

        <script>
            function increment() {
                var input = document.getElementById('quantity');
                if (parseInt(input.value) < {$product['productQuantity']}) {
                    input.value = parseInt(input.value) + 1;
                }
            }

            function decrement() {
                var input = document.getElementById('quantity');
                if (parseInt(input.value) > 1) {
                    input.value = parseInt(input.value) - 1;
                }
            }
        </script>
    ";
    }
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
