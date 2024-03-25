<!DOCTYPE html>
<html lang="en">

    <!--COLORS: 
    BACKGROUND: #F1F9FF
    FONT: #000000
    CARD-FONT-COLOR: #FFFFFF

    CARD-BG-1: #095D7E
    CARD-BG-FOOT-1: #CCECEE
    BUTTON-BG-1: #095D7E

    CARD-BG-2: #14967F
    CARD-BG-FOOT-2: #E2FCD6
    BUTTON-BG-2: #14967F
    !-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup_login.css"/>
    <title>PureCure Pharmacy | Signup</title>
</head>
<body>
    <div class="container">
        <header class="title-header">PureCure-Pharmacy</header>
        <form action="includes/signup.inc.php" method="POST" class="form">
            <div class="form-container">
                <h1 class="header-h1">Sign Up</h1>
                <label for="username" class="">Enter your Username</label>
                <input type="text" name="username" class="form-text" placeholder="Username">

                <label for="pword" class="form-label flex-fill">Enter your password</label>
                <input type="password" name="pword" class="form-text" placeholder="Password">

                <label for="age" class="form-label">Enter your age</label>
                <input type="number" name="age" class="form-text" placeholder="Age">

                <label for="email" class="form-label">Enter your email</label>
                <input type="email" name="email" class="form-text" placeholder="email@example.com">
                <input type="submit" class="form-button" value="Signup">
            </div>
        </form>
    </div>
    <footer>
        <div class="custom-shape-divider-bottom-1711354436">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>
    </footer>

</body>
</html>