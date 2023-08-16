<?php
session_start();

$loggedIn = false;

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    $loggedIn = true;
} else {
    $loggedIn = false;
}

$servername = "localhost";
$username = "root";
$password = "12321";
$db = "twitterClone";

$conn = new mysqli($servername, $username, $password, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="home.css">

</head>

<body>

    <?php if ($loggedIn) : ?>
        <div id="homeInfo">

            <div id="navbar">
                <div class="displayTag" id="homeTag">
                    <img src='images/twitterHome.png' id="homeImage"></img>
                    <div id="home"><b>Home</b></div>
                </div>
                <a style="text-decoration:none; color: inherit;" href="logout.php" class="displayTag" id="logoutTag">
                    <div class="image"></div>
                    <div id="logOut"><b>Log Out</b></div>
                </a>
            </div>

            <div id="mainInfo">

                <div class="tweetInformation">
                    <img class='userProfile' src="images/twitterProfile.jpeg" alt="">
                    <form id="tweetForm" name="tweetForm" action="home.php" method="POST">
                        <textarea type="text" name="tweet" id="tweetContent" placeholder="What is happening?!" required></textarea>
                        <button for="tweetForm" id='postButton' type="submit">Post</button>
                    </form>
                </div>

                <div id="tweetsContainer"></div>
                <?php
                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    if (isset($_POST["tweet"])) {
                        $tweet = $_POST["tweet"];
                        $user_id = $_SESSION['user_id'];
                        $sql = "INSERT INTO tweets (tweet, user_id) VALUES ('$tweet', '$user_id')";

                        if ($conn->query($sql) === TRUE) {
                            echo "Tweet inserted successfully";

                            // we redirect the user back into the page that way everytime he refreshes, it wont
                            // activate the previous POST method and cause multiple tweets based off of refreshes
                            header("Location: home.php");
                            exit();
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                }

                if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete_tweet"])) {
                    $tweet_id = $_POST["tweet_id"];
                    $loggedInUsername = $_SESSION['username'];
                    $tweetUsername = $_POST['username'];
                    if ($tweetUsername == $loggedInUsername) {
                        $sql = "DELETE FROM tweets WHERE id = '$tweet_id'";

                        if ($conn->query($sql) === TRUE) {
                            echo "Tweet deleted successfully";
                            header("Location: home.php");
                            exit();
                        } else {
                            echo "Error deleting tweet: " . $conn->error;
                        }
                    }
                }

                if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["edit_tweet"])) {
                    $tweet_id = $_POST["tweet_id"];
                    $sql = "DELETE FROM tweets WHERE id = '$tweet_id'";

                    if ($conn->query($sql) === TRUE) {
                        echo "Tweet deleted successfully";
                        header("Location: home.php");
                        exit();
                    } else {
                        echo "Error deleting tweet: " . $conn->error;
                    }
                }

                $get_tweets_query = "SELECT 
                tweets.id, 
                tweets.tweet,
                tweets.user_id, 
                userLogin.username,
                userInfo.firstname,
                userInfo.lastname 
                FROM userLogin 
                INNER JOIN tweets ON tweets.user_id = userLogin.id
                INNER JOIN userInfo on userInfo.user_id = userLogin.id";
                $results = $conn->query($get_tweets_query);

                $loggedInUsername = $_SESSION['username'];
                echo "<ul>";
                while ($row = $results->fetch_assoc()) {
                    $tweet_id = $row["id"];
                    $tweet_content = $row['tweet'];
                    $username = $row["username"];
                    $firstName = $row['firstname'];
                    $lastName = $row['lastname'];
                    echo "
                    <div class='postedTweets'>
                        <img class='userProfile' src='images/twitterProfile.jpeg'>
                        <div class='tweetDescription'>
                            <div class='userInfo'>
                                <div class='user_name'><b>$firstName $lastName</b></div>
                                <div style='margin-left: 5px; color:rgba(150, 150, 150);' class='username'>@$username</div>
                            </div>
                            <p style='margin: 0px; '>" . $tweet_content . "</p>";
                    if ($loggedInUsername === $username) {
                        echo "
                                <table>
                                    <tr>
                                        <td>
                                            <form method='post' style='display: inline-block;'>
                                                <input type='hidden' name='tweet_id' value='$tweet_id'>
                                                <input type='hidden' name='username' value='$username'>
                                                <div class='deleteSection'>
                                                    <img src='images/twitterDelete.png' class='deleteImage'>
                                                    <button class='deleteButton' type='submit' name='delete_tweet'>Delete</button>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            <form method='post' style='display: inline-block;'>
                                                <input type='hidden' name='tweet_id' value='$tweet_id'>
                                                <button class='editButton' type='submit' name='edit_tweet'>Edit Tweet</button>
                                            </form>
                                        </td>
                                    </tr>
                                </table>";
                    }
                    echo "</div>
                    </div>";
                };
                echo "<ul>";
                ?>
            </div>

            <div id="sideInfo">
                <div style='margin-left: 10px; font-size: 22px;'><b>Who to Follow</b></div>
                <?php
                $get_users_query = "SELECT userLogin.username, userInfo.firstname, userInfo.lastname FROM userLogin INNER JOIN userInfo ON userLogin.id = userInfo.user_id";
                $user_results = $conn->query($get_users_query);

                while ($user_row = $user_results->fetch_assoc()) {
                    echo "<div>";
                    $username = $user_row['username'];
                    $firstName = $user_row['firstname'];
                    $lastName = $user_row['lastname'];
                    if ($username !== $loggedInUsername) {
                        echo "
                        <div class='users'>
                            <img style='margin-left:10px; margin-top: 7px;' class='userProfile' src='images/twitterProfile.jpeg'>
                            <div class='userFinderInfo'>
                                <div><b>$firstName $lastName</b></div>
                                <div style='color: rgba(150, 150, 150);'>@$username</div>
                            </div>
                        </div>";
                    }
                    echo "<div>";
                }
                ?>
            </div>
        </div>

    <?php else :
        header("Location: /login.php");
        exit();
    ?>
    <?php endif; ?>

    <script src="app.js"></script>
</body>

</html>