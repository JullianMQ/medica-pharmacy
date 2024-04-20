<?php
function checkIfLoggedIn()
{
    if (empty($_SESSION['userName'])) {
        header("Location: login.php");
    } else {
        // <form action='includes/delete_item_in_cart.inc.php' method='post' class='delete'>
        // </form>
        echo "
            <button class='bin' type='submit'><i class='fa fa-trash'></i></button>
        ";
    }
}

try {

    // SELECT data from the cart table
    $cart_query = "SELECT * FROM cart_items";
    $cart_stmt = $pdo->prepare($cart_query);
    $cart_stmt->execute();
    $cart_items = $cart_stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($cart_items as $item) {
        $cartItemID = $item['cart_item_id'];
        $cart_quant = $item['quantity'];
        $cart_content = $item['productID'];
        $query = "SELECT * FROM products WHERE productID = '$cart_content';";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $quantity = $item['quantity'];
        foreach ($products as $product) {
            $db_quant = $product['productQuantity'];
            $db_prodID = $product['productID'];
            $db_prodPrice = $product['productPrice'];
            $cart_item_total = $db_prodPrice * $cart_quant;
            $imagePath = "images/uploads/products/" . basename($product['imagePath']);
            echo "
        <div class='items'>
            <div class='img'><img src='{$imagePath}' alt='{$product['productName']}'></div>
            <div class='box'>
                <div class='desc'> {$product['productName']}</div>
                <div class='title'> {$product['productDesc']}</div>
                <button class='dec-btn' onclick='decrement(quantity{$db_prodID})'>-</button>
                <button class='inc-btn' onclick='increment(quantity{$db_prodID}, {$db_quant})'>+</button>
                <form action='includes/delete_item_in_cart.inc.php' method='post' id='form'>
                    <input type='number' class='qty-input' id='quantity{$db_prodID}' name='quantity' value='{$cart_quant}' min='1' max='$db_quant'>
                    <div class='price'> ₱ {$cart_item_total} </div>
                    <input type='hidden' name='productID' value='{$db_prodID}'>          
                    <input type='hidden' name='cart_item_id' value='{$cartItemID}'>          
        ";
            checkIfLoggedIn();
            echo "  </form>
            </div>
        </div>";
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
    }


    // JavaScript functions outside the loop
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
