<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $productID = $_POST['productID'];
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
    try {
        require_once("dbh.inc.php");
        require_once("config.inc.php");

        // checks to see quantity in the products table to see if it is less than the quantity in the cart
        function checkQuantity($pdo, $productID, $quantity) {
            $check_quantity = "SELECT * FROM products WHERE productID = ?";
            $check_quantity_stmt = $pdo->prepare($check_quantity);
            $check_quantity_stmt->execute([$productID]); 

            $res = $check_quantity_stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($res as $key) {
                if ($key['productQuantity'] < $quantity) {
                    $quantity_to_add = $key['productQuantity'];
                } else {
                    $quantity_to_add = $quantity;
                }
                return $quantity_to_add;
            }
        }

        $check_query = "SELECT * FROM cart_items WHERE productID = ? AND userID = ?;";
        $stmt_check = $pdo->prepare($check_query);
        $stmt_check->execute([$productID, $_SESSION['userID']]);
        $existing_product = $stmt_check->fetch(PDO::FETCH_ASSOC);

        if ($existing_product) {
            $new_quantity = $existing_product['quantity'] + $quantity;
            // change the quantity in the cart
            $update_query = "UPDATE cart_items SET quantity = ? WHERE productID = ? AND userID = ?";
            $stmt_update = $pdo->prepare($update_query);
            $stmt_update->execute([$new_quantity, $productID, $_SESSION['userID']]);
        } else {
            $quantity_to_add = checkQuantity($pdo, $productID, $quantity);
            // Prepare and execute the insert statement
            $query = "INSERT INTO cart_items (userID, productID, quantity) VALUES (?, ?, ?)";
            $statement = $pdo->prepare($query);
            $statement->execute([$_SESSION['userID'], $productID, $quantity_to_add]);
        }

        header("Location: ../products.php"); // Redirect back to the products page
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    // Redirect if not a POST request
    header("Location: ../products.php");
}