<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $productID = $_POST['productID'];
    $quantity = $_POST['quantity'];
    try {
        require_once("dbh.inc.php");
        require_once("config.inc.php");
        // logic for checking quantity
        $check_quantity = ("SELECT * FROM products WHERE productID = '$productID';");
        $check_quantity = $pdo->prepare($check_quantity);
        $check_quantity->execute();
        $res = $check_quantity->fetchAll(PDO::FETCH_ASSOC);

        foreach ($res as $key) {
            if ($key['productQuantity'] < $quantity) {
                // logic for inserting into cart
                $query = ("INSERT INTO cart_items (userID, productID, quantity) VALUES (:userID, :productID, :quantity);");
                $statement = $pdo->prepare($query);
                $statement->bindParam(":userID", $_SESSION['userID']);
                $statement->bindParam(":productID", $productID);
                $statement->bindParam(":quantity", $key['productQuantity']);
                $statement->execute();
            } else {
                // logic for inserting into cart
                $query = ("INSERT INTO cart_items (userID, productID, quantity) VALUES (:userID, :productID, :quantity);");
                $statement = $pdo->prepare($query);
                $statement->bindParam(":userID", $_SESSION['userID']);
                $statement->bindParam(":productID", $productID);
                $statement->bindParam(":quantity", $quantity);
                $statement->execute();
            } 

        }
        
        header("Location: ../products.php"); // Redirect back to the products page
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    // Redirect if not a POST request
    header("Location: ../products.php");
}