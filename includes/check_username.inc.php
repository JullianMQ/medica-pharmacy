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

            // free space
            $pdo = null;
            $statement = null;
        }
    } catch (PDOException $e) {
        die("<h1>Something failed: </h1>" . $e->getMessage());
    }
}
