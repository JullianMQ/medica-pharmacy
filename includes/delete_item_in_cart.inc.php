<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $table_name = 'cart_items';
    $cartItemID = $_POST['cart_item_id'];
    try {
        include_once('dbh.inc.php');
        include_once('config.inc.php');

        $delete_query = "DELETE FROM `cart_items` WHERE `cart_items`.`cart_item_id` = :cart_item_id";
        $stmt_delete = $pdo->prepare($delete_query);
        $stmt_delete->bindParam(":cart_item_id", $cartItemID);
        $stmt_delete->execute();

        header("Location: ../checkout.php");
    } catch (PDOException $e){
        die ("Error: " . $e->getMessage());
    }
    header("Location: ../checkout.php");
}