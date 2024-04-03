<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Product Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="number"], input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .product-list {
            list-style-type: none;
            padding: 0;
        }
        .product-list li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Admin Product Management</h1>
    
    <!-- Product Insertion Form -->
    <form action="includes/insert_product.inc.php" method="post" enctype="multipart/form-data">
        <h2>Add New Product</h2>
        <label for="productName">Product Name:</label>
        <input type="text" id="productName" name="productName" required>
        <label for="dosage">Dosage:</label>
        <input type="number" id="dosage" name="dosage" min="0" required>
        <label for="dosageForm">Dosage Form:</label>
        <input type="text" id="dosageForm" name="dosageForm" required>
        <label for="productPrice">Price:</label>
        <input type="number" id="productPrice" name="productPrice" step="0.01" min="0" required>
        <label for="productQuantity">Quantity:</label>
        <input type="number" id="productQuantity" name="productQuantity" min="0" required>
        <label for="imagePath">Select Image:</label>
        <input type="file" id="imagePath" name="imagePath" accept="image/*" required>
        <input type="submit" value="Add Product">
    </form>

    <!-- Product Deletion Form -->
    <form action="includes/delete_product.inc.php" method="post">
        <h2>Delete Product</h2>
        <label for="productId">Product ID:</label>
        <input type="number" id="productId" name="productId" min="1" required>
        <input type="submit" value="Delete Product">
    </form>

    <!-- Display Product List (if needed) -->
    <!--
    <h2>Product List</h2>
    <ul class="product-list">
        <?php
        // Display product list here if needed
        ?>
    </ul>
    -->

</body>
</html>
