<?php
require_once("includes/config.inc.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log In</title>
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>

        <h1>
            <?php echo $_SESSION['userName'];?>
        </h1>

        <button onclick="<?php session_unset(); ?>window.location.reload(true)">Log Out</button>
        <!-- Make a LOG IN BUTTON -->
  </body>
</html
