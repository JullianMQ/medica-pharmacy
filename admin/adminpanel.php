<?php
    include_once('../includes/config.inc.php');
    include_once('../includes/dbh.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/adminpanel.css">
    <link rel="stylesheet" type="text/css" href="css/header_footer.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Admin | Dashboard</title>
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
                            <a href="../login.php" class="user-icon">
                                <?php 
                                    echo $_SESSION['userName']; 
                                ?> 
                            </a>
                        </h3>
                </div>

                <nav>
                    <ul class="menu">
                        <li><a href="adminpanel.php" class="active">Dashboard</a></li>
                        <li><a href="addproduct.php">Products</a></li>
                        <li><a href="users.php" >Users</a></li>
                        <li><a href="../logout.php"><i class="fas fa-sign-out-alt" id="sign-out"></i></a></li>
                    </ul>
                    <div class="menu-btn">
                        <i class="fa fa-bars"></i>
                    </div>
                </nav>
        </nav>
        <main id="dashboard">
            <h1>Go to Products Page</h1>
            <h1>Go to Users Page</h1>
        </main>
    </div>
</body>
<script src="javascript/navbar.js"></script>
</html>