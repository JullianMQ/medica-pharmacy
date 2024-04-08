<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST["userName"];
    $pword = $_POST["pword"];
    $email = $_POST["email"];

    try {
        require_once("dbh.inc.php");

        $signup_query = ("INSERT INTO users (userName, userPass, userEmail) VALUES (:userName, :pword, :email);");
        // second checker for username, incase they bypass button disable through inspect browser devtools
        $check_username = ("SELECT * FROM users WHERE userName = '$userName';");
        $check_user = $pdo->prepare($check_username);
        $check_user->execute();
        $result = $check_user->fetchAll(PDO::FETCH_ASSOC);

        if (empty($result)) {
            $options = [
                'cost' => 12
            ];

            //  prep query
            $statement = $pdo->prepare($signup_query);

            // PASSWORD
            $hashedPword = password_hash($pword, PASSWORD_BCRYPT, $options);

            // bind params
            $statement->bindParam(":userName", $userName);
            $statement->bindParam(":pword", $hashedPword);
            $statement->bindParam(":email", $email);

            // execute query 
            $statement->execute();
        } else {
            // if result is not empty then we deny their request to submit the data
            echo "Denied";
            header("Location: ../login.php");
        }

        // free space
        $pdo = null;
        $statement = null;

        // go to login form
        header("Location: ../login.php");

        // cut connection
        die();
    } catch (PDOException $e) {
        die("<h1>Something failed: </h1>" . $e->getMessage());
    }
} else {
    header("Location: ../signup.php");
}
