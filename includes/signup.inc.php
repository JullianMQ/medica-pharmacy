<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST["username"];
    $pword = $_POST["pword"];
    $age = $_POST["age"];
    $email = $_POST["email"];

    try {
        require_once("dbh.inc.php");

        $signup_query = ("INSERT INTO users (userName, userPass, userAge, userEmail) VALUES (:userName, :pword, :age, :email);");

        //  prep query
        $statement = $pdo->prepare($signup_query);

        $options = [
            'cost' => 12
        ];

        // hash sensitive info
        // $salt = bin2hex(random_bytes(16));
        // $pepper = "413c6ee41b0b940dcce43209f8620ae2";
        // USERNAME
        // $userToHash = $userName . $salt . $pepper;
        // $hashedUser = hash("sha256", $userToHash);

        // PASSWORD
        // $hashedPword = password_hash($pword, PASSWORD_BCRYPT, $options);

        // EMAIL
        // $emailToHash = $emailToHash . $salt . $pepper;
        // $hashedEmail = hash("sha256", $emailToHash);

        // bind params
        $statement->bindParam(":userName", $userName);
        $statement->bindParam(":pword", $pword);
        $statement->bindParam(":age", $age);
        $statement->bindParam(":email", $email);

        // execute query 
        $statement->execute();

        // free space
        $pdo = null;
        $statement = null;

        // go to login form
        header("Location: login.php");

        // cut connection
        die();
    } catch (PDOException $e) {
        die("<h1>Something failed: </h1>" . $e->getMessage());
    }
} else {
    header("Location: signup.php");
}