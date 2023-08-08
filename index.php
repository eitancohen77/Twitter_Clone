<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>

<body>
    <form id="tweetForm" action="index.php" method="POST">
        <label for="tweetContent">Share whats on your mind: </label>
        <input type="text" name="tweet" id="tweetContent" required>
        <button type="submit">Tweet</button>
    </form>

    <div id="tweetsContainer"></div>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "12321";
    $db = "twitterClone";

    $conn = new mysqli($servername, $username, $password, $db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    echo "Connected successfully";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["tweet"])) {
            $tweet = $_POST["tweet"];
            $sql = "INSERT INTO tweets (tweet) VALUES ('$tweet')";

            if ($conn->query($sql) === TRUE) {
                echo "Tweet inserted successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }




    ?>


    <script src="app.js"></script>
</body>

</html>