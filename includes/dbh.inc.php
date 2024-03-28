<?php

$server = "mysql:host=localhost";
$db_userName = "root";
$db_pword = "";

try {
    $pdo = new PDO($server, $db_userName, $db_pword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // CHECK EXISTING DATABASE
    $dbname = "pharmacy";
    $users_table = "users";
    $query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?;";
    $statement = $pdo->prepare($query);
    $statement->execute([$dbname]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $pdo->exec("USE $dbname");

        // CHECK FOR EXISITING TABLE
        $table_check = "SELECT 1 FROM INFORMATION_SCHEMA.TABLES WHERE table_schema = ? AND table_name = ? LIMIT 1";
        $statement = $pdo->prepare($table_check);
        $statement->execute([$dbname, $users_table]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // get data here
        } else {
        // CREATE TABLES FOR users  
            echo "<h1>TABLE NOT FOUND<br></h1>";
            echo "<h1>CREATING ONE NOW, PLEASE REFRESH</h1>";
            $pdo->exec("CREATE TABLE $users_table 
                        (userID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                        userName VARCHAR(255) NOT NULL,
                        userPass VARCHAR(255) NOT NULL,
                        userEmail VARCHAR(255) NOT NULL,
                        regDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP);");
        }
        // START HERE: RENELL
        // TABLE FOR PRODUCTS PAGE, CHECK FOR EXISTING PRODUCTS TABLE -> MAKE ONE IF NULL
        // ADD INSERTION/DELETION OF PRODUCTS FILE in includes folder, MAKE SEPARATE PAGE for includes and the PAGE itself(the UI)
        // ASK MO NALANG LYRA IF SYA GAGAWA DUN SA PAGE OR KUNG IKAW NALANG

    } else {
        echo "<h1>DATABASE DOES NOT EXIST!</h1>";
        echo "<h1>CREATING ONE RIGHT NOW, PLEASE REFRESH THE PAGE</h1>";
        $pdo->exec("CREATE DATABASE $dbname");
    }

} catch (PDOException $e) {
    echo "<h1>Connection failed: </h1>" . $e->getMessage();
}
