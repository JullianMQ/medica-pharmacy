<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $table_name = 'cart_items';
    $cartItemID = $_POST['cart_item_id'];
    try {
        include_once('dbh.inc.php');
        include_once('config.inc.php');

        $get_quantity_from_cart = "SELECT * FROM $table_name";
        $cart_select = $pdo->prepare($get_quantity_from_cart);
        $cart_select->execute();
        $fetchCartItems = $cart_select->fetchAll(PDO::FETCH_ASSOC);
        foreach ($fetchCartItems as $cartItems) {
            $quantityToSubtract = $cartItems['quantity'];
            $cart_prodID = $cartItems['productID'];

            // get the quantity from products table to subtract against the cart items
            $getQuantity = "SELECT * FROM products WHERE productID = :productID";
            $stmt_select = $pdo->prepare($getQuantity);
            $stmt_select->bindParam(':productID', $cart_prodID);
            $stmt_select->execute();
            $db_products = $stmt_select->fetchAll(PDO::FETCH_ASSOC);

            foreach ($db_products as $product) {
                $productID = $product['productID'];
                $newQuantity = $product['productQuantity'] - $quantityToSubtract;

                // set products['productQuantity']-=cart_items['quantity']
                $update_query = "UPDATE products SET productQuantity = :newQuantity WHERE productID = :productID";
                $stmt_update = $pdo->prepare($update_query);
                $stmt_update->bindParam(':newQuantity', $newQuantity);
                $stmt_update->bindParam(':productID', $productID);
                $stmt_update->execute();
            }
        }

        // delete all from cart_items for user
        $delete_query = "DELETE FROM $table_name WHERE userID = :userID";
        $stmt_delete = $pdo->prepare($delete_query);
        $stmt_delete->bindParam(":userID", $_SESSION['userID']);
        $stmt_delete->execute();

        header("Location: ../checkout.php");
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
    header("Location: ../checkout.php");
}
