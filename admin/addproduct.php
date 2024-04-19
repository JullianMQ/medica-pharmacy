<?php
    include_once('../includes/config.inc.php');
    include_once('../includes/dbh.inc.php');
    if (!isset($_SESSION['userName'])) {
        header("Location: ../admin/admin_login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Add Product/s</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/addproduct.css">
    <link rel="stylesheet" href="css/header_footer.css">

</head>

<body>

    <div class="container">

        <nav class="navbar">
            <div class="logo">
                <img src="../images/logo.png" width="125px">
            </div>

            <div class="user-profile">
                <i class="fa fa-regular fa-user"></i>
                <h3>
                        <a href="admin_login.php" class="user-icon">
                        <?php
                        echo $_SESSION['userName'];
                        ?>
                    </a>
                </h3>
            </div>

            <nav>
                <ul class="menu">
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="addproduct.php" class="active">Products</a></li>
                    <li><a href="index.php">Users</a></li>
                    <li><a href="admin_logout.php"><i class="fas fa-sign-out-alt" id="sign-out"></i></a></li>
                </ul>
                <div class="menu-btn">
                    <i class="fa fa-bars"></i>
                </div>
            </nav>
        </nav>
        <div class="admin-product-form-container">

            <form action="../includes/insert_product.inc.php" method="post" enctype="multipart/form-data">
                <h3>Add a New Product</h3>
                <input type="text" placeholder="Enter product name" name="productName" class="box" required>
                <input type="text" placeholder="Enter product description" name="productDesc" class="box" required>
                <input type="text" placeholder="Enter dosage" name="dosage" class="box" required>
                <input type="text" placeholder="Enter dosage form" name="dosageForm" class="box" required>
                <input type="number" placeholder="Enter product price" name="productPrice" class="box" required>
                <input type="number" placeholder="Enter product quantity" name="productQuantity" class="box" required>
                <select id="category" name="category_id" class="box" required>
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
            <section class="sec">
                <div class="products">
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
                        <?php
                        // Database connection and product retrieval logic
                        try {
                            // SELECT data from the product table
                            $query = "SELECT * FROM products";
                            $statement = $pdo->prepare($query);
                            $statement->execute();

                            // Fetch all rows from the result set
                            $products = $statement->fetchAll(PDO::FETCH_ASSOC);

                            // Output the retrieved data

                            foreach ($products as $product) {
                                // Construct the correct image path
                                $imagePath = "../images/uploads/products/" . basename($product['imagePath']);
                                echo "
                                    <tr>
                                    <td><img src='{$imagePath}' height='100' alt='{$product['productName']}'></td>
                                    <td>{$product['productName']}</td>
                                    <td>{$product['productDesc']}</td>
                                    <td>{$product['dosage']}</td>
                                    <td>{$product['dosageForm']}</td>
                                    <td>{$product['productPrice']}</td>
                                    <td>{$product['productQuantity']}</td>
                                    <td><a href='#' class='btn'> <i class='fas fa-trash'></i> Delete </a></td>
                                    </td>
                                    </tr>";
                            }
                        } catch (PDOException $e) {
                            echo "<p>Connection failed: " . $e->getMessage() . "</p>";
                        }
                        ?>
                    </table>
                </div>
            </section>
        </div>

    </div>
    </div>

    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // Database connection details
        $table_name = "products"; // Table name

        try {
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
                    $stmt_insert->execute([$productName, $productDesc, $dosage, $dosageForm, $productPrice, $productQuantity, $imagePath, $category_id]);
                    /* header("Location: addproduct.php?query=success"); // Redirect back to the product management page */
                    $pdo = null;
                    $stmt_insert = null;
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

    <script src="javascript/navbar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdpn.io/cpe/boomboom/pen.js?key=pen.js-2e3ee716-3349-8656-638e-37e7358fa342" crossorigin=""></script>
    <script src="javascript/index.js"></script>

</body>

</html>