<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin | Add Product/s</title>

   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="css/addproduct.css">

</head>
<body>
   
<div class="container">

   <div class="admin-product-form-container">

      <form action="addproduct.php" method="post" enctype="multipart/form-data">
         <h3>Add a New Product</h3>
         <input type="text" placeholder="Enter product name" name="productName" class="box" required>
         <input type="text" placeholder="Enter product description" name="productDesc" class="box" required>
         <input type="text" placeholder="Enter dosage" name="dosage" class="box" required>
         <input type="text" placeholder="Enter dosage form" name="dosageForm" class="box" required>
         <input type="number" placeholder="Enter product price" name="productPrice" class="box" required>
         <input type="number" placeholder="Enter product quantity" name="productQuantity" class="box" required>
         <select id="category" name="category_id" class="box"required>
            <option value="">Select Category</option>
            <option value="1">Pain Relief</option>
            <option value="2">Respiratory/Allergy</option>
            <option value="3">Eye and Ear Care</option>
            <option value="4">Foot and Leg Care</option>
            <option value="5">Oral Care</option>
            <option value="6">Digestion Care</option>
        </select>
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="imagePath" class="box">
         <input type="submit" class="btn" name="add_product" value="Add Product">
      </form>

   </div>

   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Product Image</th>
            <th>Product Name</th>
            <th> Description </th>
            <th> Dosage </th>
            <th> Dosage form </th>
            <th>Product Price</th>
            <th> Quantity </th>
            <th>Action</th>
         </tr>
         </thead>
         <tr>
            <td><img src="uploaded_img/product_image.jpg" height="100" alt="Product Image"></td>
            <td>Product Name</td>
            <td> Description </td>
            <td> Dosage </td>
            <td> Form </td>
            <td>100php</td>
            <td> 5 </td>
            <td>
               <a href="#" class="btn"> <i class="fas fa-edit"></i> Edit </a>
               <a href="#" class="btn"> <i class="fas fa-trash"></i> Delete </a>
            </td>
         </tr>
      </table>
   </div>

</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Database connection details
    $server = "mysql:host=localhost";
    $db_userName = "root";
    $db_pword = "";
    $db_name = "pharmacy"; // Database name
    $table_name = "products"; // Table name

    try {
        // Establish a connection to the database
        $pdo = new PDO($server, $db_userName, $db_pword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if the database exists
        $pdo->exec("USE $db_name");

        // Prepare the SQL statement for inserting a new product
        $insert_query = "INSERT INTO $table_name (productName, productDesc, dosage, dosageForm, productPrice, productQuantity, imagePath,category_id) VALUES (?, ?, ?, ?, ?, ?, ?,?)";
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
                header("Location: addproduct.php"); // Redirect back to the product management page
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "File is not an image.";
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
?>

</body>
</html>
