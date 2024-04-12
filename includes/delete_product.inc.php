<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $server = "mysql:host=localhost";
    $db_userName = "root";
    $db_pword = "";
    $db_name = "pharmacy"; // Database name
    $table_name = "products"; // Table name

    try {
        require_once("dbh.inc.php");
        // Establish a connection to the database
        $pdo = new PDO($server, $db_userName, $db_pword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if the database exists
        $pdo->exec("USE $db_name");

        // Prepare the SQL statement for deleting a product
        $delete_query = "DELETE FROM $table_name WHERE productID = ?";
        $stmt_delete = $pdo->prepare($delete_query);

        // Bind parameters and execute the query
        $productId = $_POST['productId'];
        $stmt_delete->execute([$productId]);

        // Redirect back to the product management page
        header("Location: ../admin_product_management.php");
    } catch (PDOException $e) {
        die ("Error: " . $e->getMessage());
    }
} else {
    // TODO: MIGHT DELETE WHEN USERS ACCOUNT IS MADE
    header("Location: ../admin_product_management.php");
}