<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $server = "mysql:host=localhost";
    $db_userName = "root";
    $db_pword = "";
    $db_name = "pharmacy"; // Database name
    $table_name = "product"; // Table name

    try {
        require_once("dbh.inc.php");
        // Establish a connection to the database
        $pdo = new PDO($server, $db_userName, $db_pword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if the database exists
        $pdo->exec("USE $db_name");

        // Prepare the SQL statement for inserting a new product
        $insert_query = "INSERT INTO $table_name (productName, productDescription, productPrice, productQuantity, imagePath) VALUES (?, ?, ?, ?, ?)";
        $stmt_insert = $pdo->prepare($insert_query);

        // Bind parameters and execute the query
        $productName = $_POST['productName'];
        $productDescription = $_POST['productDescription'];
        $productPrice = $_POST['productPrice'];
        $productQuantity = $_POST['productQuantity'];
        $imagePath = $_POST['imagePath'];

        $stmt_insert->execute([$productName, $productDescription, $productPrice, $productQuantity, $imagePath]);

        // Redirect back to the product management page
        header("Location: ../admin_product_management.php");
    } catch (PDOException $e) {
        die ("Error: " . $e->getMessage());
    }
} else {
    // TODO: MIGHT DELETE WHEN USERS ACCOUNT IS MADE
    header("Location: ../admin_product_management.php");
}