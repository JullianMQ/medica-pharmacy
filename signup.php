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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/signup_login.css">
    <title>PureCure Pharmacy | Signup</title>
</head>
<body>
    <h1 class="d-grid justify-content-center mt-5">Signup</h1>

    <div class="container rounded border border-4 shadow-lg col-6">
        <form action="includes/signup.inc.php" method="POST" class="form">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <label for="username" class="form-label flex-fill mt-3">Enter your Username</label>
                    <input type="text" name="username" class="form-control flex-fill" placeholder="Username">
                </div>
                <div class="col-3"></div>
            </div>

            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <label for="pword" class="form-label flex-fill">Enter your password</label>
                    <input type="password" name="pword" class="form-control flex-fill" placeholder="Password">
                </div>
                <div class="col-3"></div>
            </div>

            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <label for="age" class="form-label">Enter your age</label>
                    <input type="number" name="age" class="form-control flex-fill" placeholder="Age">
                </div>
                <div class="col-3"></div>
            </div>

            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <label for="email" class="form-label">Enter your email</label>
                    <input type="email" name="email" class="form-control mb-4 flex-fill" placeholder="email@example.com">
                </div>
                <div class="col-3"></div>
            </div>

            <div class="row">
                <div class="col-5"></div>
                <input type="submit" class="btn btn-primary mb-3 col-2" value="Signup">
                <div class="col-5"></div>
            </div>
    </form>
    </div>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>