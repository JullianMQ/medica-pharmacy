<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productID = $_POST['productID'];
    $quantity = $_POST['quantity'];
    try {
        include_once('dbh.inc.php');
        include_once('config.inc.php');

        $update_query = ("UPDATE cart_items SET quantity = ? WHERE productID = ? AND userID = {$_SESSION['userID']}");
        $stmt_update = $pdo->prepare($update_query);
        $stmt_update->bindParam(":productID", $productID);
        $stmt_update->bindParam(":quantity", $quantity);
        $stmt_update->bindParam(":userID", $userID);

        // Bind parameters and execute the query
        $stmt_update->execute([$productId]);
        header("Location: ../checkout.php");
    } catch (PDOException $e){
        die ("Error: " . $e->getMessage());
    }
    header("Location: ../checkout.php");
}