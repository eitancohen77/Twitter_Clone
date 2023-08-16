<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login Information</title>
</head>

<body>
    <!-- This page shows is used to display all the table information. In this case
    we are using the userlogin table as a demonstration -->
    <h1>User Login Information</h1>
    <table>
        <tr>
            <th>Username</th>
            <th>Password</th>
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
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>

<?php
mysqli_close($connection);
?>