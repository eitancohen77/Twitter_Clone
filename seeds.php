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

    $conn = new mysqli($servername, $username, $password);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";


    // First create the database
    $sql = "CREATE DATABASE twitterClone";
    if ($conn->query($sql) === TRUE) {
        echo "Database has been created";
    } else {
        echo "Errir creating database: " . $conn->error;
    }

    // Then create any table you want to add to the database

    ?>
</body>

</html>