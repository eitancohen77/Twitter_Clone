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

                // we redirect the user back into the page that way everytime he refreshes, it wont
                // activate the previous POST method and cause multiple tweets based off of refreshes
                header("Location: index.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete_tweet"])) {
        $tweet_id = $_POST["tweet_id"];
        $sql = "DELETE FROM tweets WHERE id = '$tweet_id'";

        if ($conn->query($sql) === TRUE) {
            echo "Tweet deleted successfully";
            header("Location: index.php");
            exit();
        } else {
            echo "Error deleting tweet: " . $conn->error;
        }
    }


    $get_tweets_query = "SELECT * FROM tweets";
    $results = $conn->query($get_tweets_query);

    echo "<ul>";
    while ($row = $results->fetch_assoc()) {
        $tweet_id = $row["id"];
        echo "<li>" . $row["tweet"] . "
            <form method='post' style='display: inline-block;'>
                <input type='hidden' name='tweet_id' value='$tweet_id'>
                <button type='submit' name='delete_tweet'>Delete Tweet</button>
            </form>
            </li>";
    }
    echo "<ul>";

    ?>


    <script src="app.js"></script>
</body>

</html>