<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body id="loginBackground">

    <div id="loginContainer">
        <div>
            <a href="/home.php">MAKE THIS AN IMAGE LATER</a>
            <h1>Sign in to Twitter</h1>
            <form name='login' action=" login.php" method="POST">
                <div id="loginInputInfo">
                    <input type="text" id='username' name="username" class="loginBox" placeholder="Phone, email, or username">
                    <input type="password" id='password' name="password" class="loginBox" placeholder="Password" style='display:none'>
                    <div id="nextButton"><b>Next</b></div>
                    <button id="submitButton" style="display: none;"><b>Log In</b></button>

                    <button id="forgetPassButton"><b>Forgot Password?</b></button>
                </div>
            </form>
            <div id="signUpSection">
                <p style="margin: 0;">Don't have an account?</p>
                <a style="margin-left: 2px;" href="signup.php">Sign up</a>
            </div>
        </div>
    </div>

    <?php
    session_start(); // Start or resume the session

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login"])) {
        $conn = mysqli_connect("localhost", "root", "12321", "twitterClone");
        if (!$conn) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        // Existing code for database connection and user verification

        if (password_verify($enteredPassword, $row['password'])) {
            // User is logged in
            // Store user information in session variables
            $_SESSION['user_id'] = $enteredUsername; // You can use user's ID instead of username if available
            $_SESSION['logged_in'] = true;

            echo '<script>
                    console.log("LOGGED IN");
                    window.location.href = "/home.php";
                </script>';
        } else {
            echo '<script>console.log("Incorrect password");</script>';
        }

        mysqli_close($conn); // Close the database connection
    } else {
        // The rest of your HTML code
    }
    ?>

    <script>
        const next = document.getElementById('nextButton')
        const username = document.getElementById('username')
        const password = document.getElementById('password')
        const submitButton = document.getElementById('submitButton')
        next.addEventListener('click', () => {
            username.style.display = 'none'
            password.style.display = 'block'
            next.style.display = 'none'
            submitButton.style.display = 'block'
        })
    </script>

</body>

</html>