<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $servername = "localhost";
    $username = "root";
    $password = "12321";
    $database = 'twitterClone';

    $conn = new mysqli($servername, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";


    // Create the database
    /* $sql = "CREATE DATABASE twitterClone";
    if ($conn->query($sql) === TRUE) {
        echo "Database has been created";
    } else {
        echo "Errir creating database: " . $conn->error;
    } */

    // Then create any table you want to add to the database

    // Create tweets table
    /* $sql = "CREATE TABLE tweets (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        tweet TEXT NOT NULL
        )";
    if ($conn->query($sql) === TRUE) {
        echo "Database has been created";
    } else {
        echo "Errir creating database: " . $conn->error;
    }  */

    //Create user login table
    /* $sql = "CREATE TABLE userLogin (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        password VARCHAR(30) NOT NULL
        )";
    if ($conn->query($sql) === TRUE) {
        echo "Database has been created";
    } else {
        echo "Errir creating database: " . $conn->error;
    } */

    // Create User information table
    /* $sql = "CREATE TABLE userInfo (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstName VARCHAR(30) NOT NULL,
        lastName VARCHAR(30) NOT NULL,
        dob DATE
        )";
    if ($conn->query($sql) === TRUE) {
        echo "Database has been created";
    } else {
        echo "Errir creating database: " . $conn->error;
    } */

    $sql = "ALTER TABLE tweets
    ADD FOREIGN KEY (user_id) REFERENCES userLogin(ID);";
    if ($conn->query($sql) === TRUE) {
        echo "Table has been altered";
    } else {
        echo "Errir creating database: " . $conn->error;
    }


    ?>
</body>

</html>