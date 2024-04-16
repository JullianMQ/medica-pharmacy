<?php
    include_once('includes/config.inc.php');
    include_once('includes/dbh.inc.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medica Pharmacy | Products</title>
    <link rel="stylesheet" href="css/productstyles.css">
    <link rel="stylesheet" href="css/header_footer.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
<nav class="navbar">

    <div class="logo">
        <img src="images/logo.png" width="125px">
    </div>

    <div class="user-profile">
        <i class="fa fa-regular fa-user"></i>
        <h3> 
            <a href="login.php" class="user-icon">
                <?php 
                    if (empty($_SESSION['userName'])) {
                        echo "Guest";
                    } else {
                        echo $_SESSION['userName']; 
                    }
                ?> 
            </a>
        </h3>
    </div>

    <nav>
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="products.php" class="active">Products</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="checkout.php"><div class="cart-icon"><i class="fas fa-shopping-cart"></i><span>0</span></div></a></li>
        </ul>
        <div class="menu-btn">
            <i class="fa fa-bars"></i>
        </div>
    </nav>
</nav>

    <section class="sec">
        <div class="products">
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
                    $imagePath = "images/" . basename($product['imagePath']);
                    echo "
                    <div class='card'>
                    <div class='img'><img src='{$imagePath}' alt='{$product['productName']}'></div>
                    <div class='desc'> {$product['productName']}</div>
                    <div class='title'> {$product['productDesc']}</div>
                    <div class='price'>₱ {$product['productPrice']}</div>
                    <div class='box'>
                        <div class='qty-btn'>
                            <button class='dec-btn' name='decrease'>-</button>
                            <input type='number' class='qty-input' name='quantity' inputmode='numeric' value='1' min='1' max='{$product['productQuantity']}'>
                            <button class='inc-btn' name='increase'>+</button>
                        </div>
                        <button class='btn' name='{$product['productID']}'>ADD TO CART</button>
                    </div>
                    </div>";              
                }
    
            }catch (PDOException $e) {
                echo "<p>Connection failed: " . $e->getMessage() . "</p>";
            }
        ?>
        </div>
    </section> 
    <script>
        const btns = document.querySelectorAll(".btn");
        const cards = document.querySelectorAll(".card"); 
        //cart
        let listCartHTML = document.querySelector('.listCart');
        let iconCartSpan = document.querySelector('.cart-icon span');
        let carts = [];     
        const addToCart = (productId, quantity) => {
            let confirmProductInCart = carts.findIndex((value) => value.productID == productId);
            if (carts.length <= 0){
                carts = [{
                    productID: productId,
                    quantity: quantity
                }]
            } else if (confirmProductInCart < 0){
                carts.push({
                    productID: productId,
                    quantity: quantity
                })
            } else {
                carts[confirmProductInCart].quantity += quantity;
            }
            console.log(carts);
        }
        const addCartToHTML = () => {

        }

        btns.forEach(btn => {
            btn.addEventListener("click", function (event) {           
                const quantity = this.parentElement.querySelector('.qty-input').value;
                
                const productID = this.getAttribute('name');
                alert(productID + quantity);
                addToCart(productID, parseInt(quantity));
            });
        });

        cards.forEach(card => {
            card.addEventListener("click", function (event) {
                if (!event.target.closest('.box')) {
                    const productID = this.querySelector('.btn').getAttribute('name');
                    window.location.href = 'details.php?productID=' + productID;
                }
            });
        }); 

        document.addEventListener('click', function(event) {
            const input = event.target.parentElement.querySelector('.qty-input');
            let value = parseInt(input.value);
            let max = parseInt(input.getAttribute('max'));
            if (event.target.matches('.inc-btn')) {
                if (value < 1) {            //returns to 1 if the input is below 1
                    input.value = 1;
                } else if (value < max) {   //+1 
                    value++;
                    input.value = value;
                } else if (value > max) {   //returns to the available quantity when input exceeded
                    input.value = max;
                }
            } else if (event.target.matches('.dec-btn')) {                
                if (value > max) {          //returns to the available quantity when input exceeded
                    input.value = max;
                } else if (value > 1) {     //-1
                    value--;
                    input.value = value;
                } else if (value < 1) {     //returns to 1 if the input is below 1
                    input.value = 1;
                }
            }
        });
    </script>

    <?php
    include_once('includes/footer_inc.php')
    ?>
</body>
</html>
