<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $userName = $_POST["userName"];
    $pword = $_POST["pword"];

    try {
        require_once("dbh.inc.php");
        require_once("config.inc.php");

        $user_check = ("SELECT userName, userPass FROM users WHERE userName LIKE '$userName';");

        // user check
        $statement = $pdo->prepare($user_check);

        $statement->execute();

        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (empty($results)) {
            header("Location: ../error_login.php");
        } else {
            foreach ($results as $row) {
                if (!password_verify($pword, $row['userPass'])) {
                    header("Location: ../error_login.php");
                } else {
                    // TODO:
                    // REDIRECT INTO LANDING PAGE OR PREVIOUS PAGE
                    $_SESSION['userName'] = $row['userName'];
                    header("Location: ../products.php");
                }
            }
        }

        $pdo = null;
        $statement = null;

        die();
    } catch (PDOException $e) {
        die("<h1>Something failed:</h1> " . $e->getMessage());
    }
} else {
    header("Location: ../login.php");
}
