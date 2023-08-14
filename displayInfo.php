<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login Information</title>
    <style>
        /* Add any CSS styling you want */
    </style>
</head>

<body>
    <h1>User Login Information</h1>
    <table>
        <tr>
            <th>Username</th>
            <th>Password</th>
            <!-- Add more column headers if needed -->
        </tr>
        <?php
        $query = "SELECT * FROM userLogin";
        $connection = mysqli_connect("localhost", "root", "12321", "twitterClone");
        if (!$connection) {
            die("Database connection failed: " . mysqli_connect_error());
        }
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            // Output more columns if needed
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>

<?php
// Close the database connection
mysqli_close($connection);
?>