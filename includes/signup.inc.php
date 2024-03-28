<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST["userName"];
    $pword = $_POST["pword"];
    $email = $_POST["email"];

    try {
        require_once("dbh.inc.php");

        // TODO: AJAX SHIT
        // CHECK userName FIRST IN DATABASE IF THERE'S ONE
        // $userName_check = ("SELECT userName FROM user;");

        $signup_query = ("INSERT INTO users (userName, userPass, userEmail) VALUES (:userName, :pword, :email);");

        //  prep query
        $statement = $pdo->prepare($signup_query);

        $options = [
            'cost' => 12
        ];

        // PASSWORD
        $hashedPword = password_hash($pword, PASSWORD_BCRYPT, $options);

        // EMAIL
        // $emailToHash = $emailToHash . $salt . $pepper;
        // $hashedEmail = hash("sha256", $emailToHash);

        // bind params
        $statement->bindParam(":userName", $userName);
        $statement->bindParam(":pword", $hashedPword);
        $statement->bindParam(":email", $email);

        // execute query 
        $statement->execute();

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
    header("Location: signup.php");
}
