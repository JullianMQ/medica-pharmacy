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
    $products_table = "product";
    $categories_table = "categories";
    $query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?;";
    $statement = $pdo->prepare($query);
    $statement->execute([$dbname]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $pdo->exec("USE $dbname");

        // CHECK FOR EXISTING TABLES
        $table_check_users = "SELECT 1 FROM INFORMATION_SCHEMA.TABLES WHERE table_schema = ? AND table_name = ? LIMIT 1";
        $statement_users = $pdo->prepare($table_check_users);
        $statement_users->execute([$dbname, $users_table]);
        $result_users = $statement_users->fetch(PDO::FETCH_ASSOC);

        $table_check_products = "SELECT 1 FROM INFORMATION_SCHEMA.TABLES WHERE table_schema = ? AND table_name = ? LIMIT 1";
        $statement_products = $pdo->prepare($table_check_products);
        $statement_products->execute([$dbname, $products_table]);
        $result_products = $statement_products->fetch(PDO::FETCH_ASSOC);

        $table_check_categories = "SELECT 1 FROM INFORMATION_SCHEMA.TABLES WHERE table_schema = ? AND table_name = ? LIMIT 1";
        $statement_categories = $pdo->prepare($table_check_categories);
        $statement_categories->execute([$dbname, $categories_table]);
        $result_categories = $statement_categories->fetch(PDO::FETCH_ASSOC);
        
        if ($result_users) {
            // User table exists, no need to create
        } else {
            // CREATE TABLE FOR users
            echo "<h1>USERS TABLE NOT FOUND<br></h1>";
            echo "<h1>CREATING ONE NOW, PLEASE REFRESH</h1>";
            $pdo->exec("CREATE TABLE $users_table 
                        (userID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                        userName VARCHAR(255) NOT NULL,
                        userPass VARCHAR(255) NOT NULL,
                        userEmail VARCHAR(255) NOT NULL,
                        regDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP);");
        }
        
        if ($result_categories) {
            // Categories table exists, no need to create
            // Insert categories and descriptions here
            $existing_categories_query = "SELECT COUNT(*) AS count FROM $categories_table";
            $existing_categories_statement = $pdo->prepare($existing_categories_query);
            $existing_categories_statement->execute();
            $existing_categories_result = $existing_categories_statement->fetch(PDO::FETCH_ASSOC);
            if ($existing_categories_result['count'] == 0) {
                $pdo->exec("INSERT INTO $categories_table (categoryName, categoryDescription) VALUES 
                            ('Analgesics', 'Medications that alleviate pain without causing loss of consciousness, including nonsteroidal anti-inflammatory drugs (NSAIDs) and opioids.'),
                            ('Antibiotics', 'Drugs used to treat bacterial infections by inhibiting the growth of bacteria or killing them outright.'),
                            ('Antidepressants', 'Medications primarily used to treat depression, but also used for other mood disorders and conditions like anxiety.'),
                            ('Antihypertensives', 'Medications used to treat high blood pressure.'),
                            ('Proton Pump Inhibitors (PPIs)', 'Medications used to reduce stomach acid production, commonly prescribed for acid reflux and peptic ulcers.'),
                            ('Antidiabetic Agents', 'Medications used to manage blood sugar levels in individuals with diabetes.'),
                            ('Anti-inflammatory Agents', 'Drugs that reduce inflammation, often used to treat conditions such as arthritis and inflammatory bowel disease.'),
                            ('Anticoagulants/Antithrombotics', 'Medications used to prevent the formation of blood clots or to dissolve existing clots.'),
                            ('Anticonvulsants', 'Medications used to prevent or control seizures in individuals with epilepsy or other seizure disorders.'),
                            ('Antiemetics', 'Medications used to prevent or alleviate nausea and vomiting.');");
            }
        } else {
            // CREATE TABLE FOR categories  
            echo "<h1>CATEGORIES TABLE NOT FOUND<br></h1>";
            echo "<h1>CREATING ONE NOW, PLEASE REFRESH</h1>";
            $pdo->exec("CREATE TABLE $categories_table 
                        (categoryID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                         categoryName VARCHAR(255) NOT NULL,
                         categoryDescription VARCHAR(255) NOT NULL);");

            // Insert categories and descriptions after creating the table
            $pdo->exec("INSERT INTO $categories_table (categoryName, categoryDescription) VALUES 
                        ('Analgesics', 'Medications that alleviate pain without causing loss of consciousness, including nonsteroidal anti-inflammatory drugs (NSAIDs) and opioids.'),
                        ('Antibiotics', 'Drugs used to treat bacterial infections by inhibiting the growth of bacteria or killing them outright.'),
                        ('Antidepressants', 'Medications primarily used to treat depression, but also used for other mood disorders and conditions like anxiety.'),
                        ('Antihypertensives', 'Medications used to treat high blood pressure.'),
                        ('Proton Pump Inhibitors (PPIs)', 'Medications used to reduce stomach acid production, commonly prescribed for acid reflux and peptic ulcers.'),
                        ('Antidiabetic Agents', 'Medications used to manage blood sugar levels in individuals with diabetes.'),
                        ('Anti-inflammatory Agents', 'Drugs that reduce inflammation, often used to treat conditions such as arthritis and inflammatory bowel disease.'),
                        ('Anticoagulants/Antithrombotics', 'Medications used to prevent the formation of blood clots or to dissolve existing clots.'),
                        ('Anticonvulsants', 'Medications used to prevent or control seizures in individuals with epilepsy or other seizure disorders.'),
                        ('Antiemetics', 'Medications used to prevent or alleviate nausea and vomiting.');");
        }

        if ($result_products) {
            // Products table exists, no need to create
        } else {
            // CREATE TABLE FOR PRODUCTS  
            echo "<h1>PRODUCTS TABLE NOT FOUND<br></h1>";
            echo "<h1>CREATING ONE NOW, PLEASE REFRESH</h1>";
            $pdo->exec("CREATE TABLE $products_table 
                        (productID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                        productName VARCHAR(255) NOT NULL,
                        dosage INT(11) NOT NULL,
                        dosageForm VARCHAR(255) NOT NULL,
                        productPrice DECIMAL(10, 2) NOT NULL,
                        productQuantity INT NOT NULL,
                        productAddedDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        imagePath VARCHAR(255) NOT NULL,
                        categoryID INT,
                        FOREIGN KEY (categoryID) REFERENCES categories(categoryID)
                        );");
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
?>
