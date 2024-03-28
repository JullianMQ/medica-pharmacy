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
    <link rel="stylesheet" href="css/signup_login.css?v=<?php echo time(); ?>"/>
    <title>PureCure Pharmacy | Signup</title>
</head>
<body>
    <div class="container">
        <header class="title-header">PureCure-Pharmacy</header>
        <form action="includes/signup.inc.php" method="POST" class="form">
            <div class="form-container">
                <h1 class="header-h1">Sign Up</h1>
                <label for="userName" class="form-label">Enter your username</label>
                <!-- <input type="text" name="userName" class="form-text" id="userName" required  placeholder="Username" onfocusout="checkUserFocus()"> -->
                <!-- TODO: UNCOMMENT FIRST INPUT AFTER CHECKUSERINPUT IS FINISHED -->
                <input type="text" name="userName" class="form-text" id="userName" required  placeholder="Username">

                <label for="pword" class="form-label flex-fill">Enter your password</label>
                <input type="password" name="pword" class="form-text" required  placeholder="Password">

                <label for="email" class="form-label">Enter your email</label>
                <input type="email" name="email" class="form-text"  required placeholder="email@example.com">
                <input type="submit" class="form-button" value="Signup">
            </div>
        </form>
    </div>
  
    <footer>
        <div class="custom-shape-divider-bottom-1711368160">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
                <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
                <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
            </svg>
        </div>
    </footer>
    <!-- <script src="javascript/check_input.js"> </script> -->
    <script>
        function sendDataToServer(data) {
            var xml_request = new XMLHttpRequest();

            xml_request.onload = function () {
                if (xml_request.status == 200) {
                    // ALERT USER IF THERE'S AN EXISTING USER WITH THE SAME USERNAME
                    alert("Username used!");
                }
            };

            xml_request.open("POST", "includes/signup.inc.php", true);
            xml_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xml_request.send("data=" + encodeURIComponent(data));
        }

        // Function to handle the focus out event
        function checkUserFocus() {
            let data = document.getElementById("userName").value;
            alert("Username used");
            sendDataToServer(data);
        }
    </script>
</body>
</html>