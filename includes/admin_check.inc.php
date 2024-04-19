<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $userName = $_POST["userName"];
    $pword = $_POST["pword"];

    try {
        require_once("dbh.inc.php");
        require_once("config.inc.php");
        
        // placeholder admin credentials
        if ($userName == "admin" && $pword == "admin") {
            header("Location: ../admin/index.php");
            $_SESSION['userName'] = $userName;
            $_SESSION['userID'] = 9999999;
        } else {
            // redirect into admin dashboard
            header("Location: ../admin/admin_error.php");
        }

        $pdo = null;
        $statement = null;

        die();
    } catch (PDOException $e) {
        die("<h1>Something failed:</h1> " . $e->getMessage());
    }
} else {
    header("Location: ../admin/index.php");
}