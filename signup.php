<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header_footer.css">
    <link rel="stylesheet" href="css/signup_login.css?v=<?php echo time(); ?>" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css"
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Medica Pharmacy | Signup</title>
</head>

<body>

    <nav class="navbar">

		<div class="logo">
			<img src="images/logo.png" width="125px">
		</div>

		<nav>
			<ul class="menu">
				<li><a href="index.php" >Home</a></li>
				<li><a href="products.php">Products</a></li>
				<li><a href="about.php">About Us</a></li>
				<li><a href="contact.php">Contact Us</a></li>
				<li><a href="checkout.php"><i class="fas fa-shopping-cart"></i></a></li>
			</ul>
			<div class="menu-btn">
				<i class="fa fa-bars"></i>
			</div>
		</nav>
	</nav>
    <div class="container">
        <header class="title-header">Medica-Pharmacy</header>
        <form action="includes/signup.inc.php" method="POST" class="form">
            <div class="form-container">
                <h1 class="header-h1">Sign Up</h1>
                <label for="userName" class="form-label" id="username_check">Enter your username</label>
                <input type="text" name="userName" class="form-text" id="userName" required placeholder="Username">

                <label for="pword" class="form-label flex-fill">Enter your password</label>
                <input type="password" name="pword" class="form-text" required placeholder="Password">

                <label for="email" class="form-label" id="email_check" >Enter your email</label>
                <input type="email" name="email" id="email" class="form-text" required placeholder="email@example.com">
                <input type="submit" class="form-button" id="submitBtn" value="Signup">
            </div>
        </form>
    </div>

    <?php 
		include_once('includes/footer_inc.php')
	?>	
    <script>
        document.getElementById('userName').addEventListener('input', function() {
            let userName = this.value;

            fetch('includes/check_valid.inc.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'userName=' + userName
                })
                .then(response => response.text())
                .then(data => {
                    document.getElementById('username_check').textContent = data;
                    if (data.trim() === 'Enter your username') {
                        document.getElementById('submitBtn').disabled = false;
                    } else {
                        document.getElementById('submitBtn').disabled = true;
                    }
                })
                .catch(error => console.error('Error:', error));
        })
        document.getElementById('email').addEventListener('input', function() {
            let email = this.value;

            fetch('includes/check_valid.inc.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'email=' + email
                })
                .then(response => response.text())
                .then(data1 => {
                    document.getElementById('email_check').textContent = data1;
                    if (data1.trim() === 'Enter your email') {
                        document.getElementById('submitBtn').disabled = false;
                    } else {
                        document.getElementById('submitBtn').disabled = true;
                    }
                })
                .catch(error => console.error('Error:', error));
        })
    </script>
</body>

</html>
