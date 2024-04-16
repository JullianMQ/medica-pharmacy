<?php
    include_once('../includes/config.inc.php');
    include_once('../includes/dbh.inc.php');
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

    </head>
    <body>

        <!-- overlay -->
        <body cz-shortcut-listen="true">
            <div id="sidebar-overlay" class="overlay w-100 vh-100 position-fixed d-none"></div>

            <!-- sidebar -->
            <div class="col-md-3 col-lg-2 px-0 position-fixed h-100 bg-white shadow-sm sidebar" id="sidebar">
                <h1 class="bi bi-bootstrap text-primary d-flex my-4 justify-content-center"></h1>
                <div class="list-group rounded-0">
                    <a href="adminpanel.php" class="list-group-item list-group-item-action active border-0 d-flex align-items-center">
                        <span class="bi bi-border-all"></span>
                        <span class="ml-2">Dashboard</span>
                    </a>
                    <a href="addproduct.php" class="list-group-item list-group-item-action border-0 align-items-center">
                        <span class="bi bi-box"></span>
                        <span class="ml-2">Products</span>
                    </a>
                    <a href="users.php" class="list-group-item list-group-item-action border-0 align-items-center">
                        <span class="bi bi-person"></span>
                        <span class="ml-2">Users</span>
                    </a>

                </div>
            </div>

            <div class="col-md-9 col-lg-10 ml-md-auto px-0 ms-md-auto">
                <!-- top nav -->
                <nav class="w-100 d-flex px-4 py-2 mb-4 shadow-sm">
                    <!-- close sidebar -->
                    <button class="btn py-0 d-lg-none" id="open-sidebar">
                        <span class="bi bi-list text-primary h3"></span>
                    </button>
                    <div class="dropdown ml-auto">
                        <button class="btn py-0 d-flex align-items-center" id="logout-dropdown" data-toggle="dropdown" aria-expanded="false">
                            <span class="bi bi-person text-primary h4"></span>
                            <span class="bi bi-chevron-down ml-1 mb-2 small"></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right border-0 shadow-sm" aria-labelledby="logout-dropdown">
                            <a class="dropdown-item" href="#">Logout</a>
                            <a class="dropdown-item" href="#">Settings</a>
                        </div>
                    </div>
                </nav>

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
                // Establish a connection to the database
                $pdo = new PDO($server, $db_userName, $db_pword);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Specify the database name
                $dbname = "pharmacy";

                // Use the specified database
                $pdo->exec("USE $dbname");

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
            <td>{$product['dosage']}</td>
            <td>{$product['productPrice']}</td>
            <td>{$product['productQuantity']}</td>
            <td>
               <a href='#' class='btn'> <i class='fas fa-edit'></i> Edit </a>
               <a href='#' class='btn'> <i class='fas fa-trash'></i> Delete </a>
            </td>
         </tr>
      </table>";              
                }
    
            }catch (PDOException $e) {
                echo "<p>Connection failed: " . $e->getMessage() . "</p>";
            }
        ?>
        </div>
   
      <!-- 
         
   </div>

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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
        <script src="https://cdpn.io/cpe/boomboom/pen.js?key=pen.js-2e3ee716-3349-8656-638e-37e7358fa342" crossorigin=""></script>
        <script src="javascript/adminpanel.js"></script>

        </body>
</html>
