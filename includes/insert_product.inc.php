<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Database connection details
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

        // Prepare the SQL statement for inserting a new product
        $insert_query = "INSERT INTO $table_name (productName, productDesc, dosage, dosageForm, productPrice, productQuantity, imagePath, category_id ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_insert = $pdo->prepare($insert_query);

        // Bind parameters
        $productName = $_POST['productName'];
        $productDesc = $_POST['productDesc'];
        $dosage = $_POST['dosage'];
        $dosageForm = $_POST['dosageForm'];
        $productPrice = $_POST['productPrice'];
        $productQuantity = $_POST['productQuantity'];
        $category_id = $_POST['category_id'];


        // Handle image upload
        $targetDirectory = "../images/uploads/products/"; // Directory where the image will be stored

        // Check if the directory exists, if not, create it
        if (!is_dir($targetDirectory)) {
            // Create the directory with permission 0755
            mkdir($targetDirectory, 0755, true);
        }

        $targetFile = $targetDirectory . basename($_FILES["imagePath"]["name"]); // Path of the uploaded file
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION)); // Get the file extension

        // Check if the file is an actual image
        $check = getimagesize($_FILES["imagePath"]["tmp_name"]);
        if ($check !== false) {
            // Move uploaded file to the specified directory
            if (move_uploaded_file($_FILES["imagePath"]["tmp_name"], $targetFile)) {
                // File uploaded successfully, now insert data into database
                $imagePath = $targetFile;
                $stmt_insert->execute([$productName,$productDesc, $dosage, $dosageForm, $productPrice, $productQuantity,$imagePath, $category_id]);
                header("Location: ../admin/addproduct.php"); // Redirect back to the product management page
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "File is not an image.";
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    // Redirect if not a POST request
    header("Location: ../admin/addproduct.php");
}