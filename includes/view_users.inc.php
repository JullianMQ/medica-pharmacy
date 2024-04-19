<?php
try {
    // SELECT data from the product table
    $query = "SELECT userID,userName,userEmail,regDate FROM users";
    $statement = $pdo->prepare($query);
    $statement->execute();

    // Fetch all rows from the result set
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    // Database connection and product retrieval logic
    foreach ($users as $user) {
        // Construct the correct image path
        echo "
            <tr>
                <td>{$user['userID']}</td>
                <td> {$user['userName']}</td>
                <td>{$user['userEmail']}</td>
                <td>{$user['regDate']}</td>
            </tr>
        ";
    }
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
