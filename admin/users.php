<?php
    include_once('../includes/config.inc.php');
    include_once('../includes/dbh.inc.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | Users</title>
    <link rel="stylesheet" type="text/css" href="css/users.css">
    <link rel="stylesheet" type="text/css" href="css/header_footer.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
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
                    <li><a href="adminpanel.php">Dashboard</a></li>
                    <li><a href="addproduct.php">Products</a></li>
                    <li><a href="users.php" class="active">Users</a></li>
                    <li><a href="../logout.php"><i class="fas fa-sign-out-alt" id="sign-out"></i></a></li>
                </ul>
                <div class="menu-btn">
                    <i class="fa fa-bars"></i>
                </div>
            </nav>
    </nav>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Users</h1>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="img/search.png" alt="">
            </div>
            <div class="export__file">
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> User ID</th>
                        <th> User Name </th>
                        <th> Email </th>
                        <th> Date Registered </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include_once('../includes/view_users.inc.php');
                ?>
                </tbody>
            </table>
        </section>
    </main>
    </div>

</body>
<script src="javascript/users.js"></script>
<script src="javascript/navbar.js"></script>
</html>