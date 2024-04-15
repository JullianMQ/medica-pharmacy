<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        require_once("dbh.inc.php");
        if (isset($_POST['userName'])) {
            $userName = $_POST['userName'];
            $username_query = "SELECT * FROM users WHERE userName='$userName';";
            $statement = $pdo->prepare($username_query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            if (empty($result)) {
                echo "Enter your username";
            } else {
                echo "Username used";
            }
        }
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $email_query = "SELECT * FROM users WHERE userEmail='$email';";
            $statement = $pdo->prepare($email_query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            if (empty($result)) {
                echo "Enter your email";
            } else {
                echo "Email used";
            }
        }
    } catch (PDOException $e) {
        die("<h1>Something failed: </h1>" . $e->getMessage());
    }
}
