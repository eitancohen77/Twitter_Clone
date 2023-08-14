<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="signup.css">
</head>

<body id="loginBackground">

    <div id="loginContainer">
        <div>
            <a href="/home.php">MAKE THIS AN IMAGE LATER</a>
            <h1>Join Twitter Today</h1>

            <!-- Step 1: Create account button -->
            <button class='styledButton' id="createAccountButton"><b>Create account</b></button>

            <div id="additionalFields" style="display: none;">
                <form name='signup' action="signup.php" method='POST'>

                    <input type="text" name='firstName' id="firstName" placeholder="Enter your first name">
                    <input type="text" name='lastName' id="lastName" placeholder="Enter your last name">
                    <input type="text" name='dob' id="dobField" placeholder="Enter your date of birth">
                    <input type="text" name='username' id="usernameField" placeholder="Enter your username" style="display: none;">
                    <input type="password" name='password' id="passwordField" placeholder="Enter your password" style="display: none;">

                    <div id="nextButton"><b>Next</b></div>

                    <button id="submitButton" style="display: none;"><b>Sign Up</b></button>
                </form>
            </div>

            <div id="signUpSection">
                <p style="margin: 0;">Have an account already?</p>
                <a style="margin-left: 2px;" href="/login.php">Log in</a>
            </div>

            <?php
            $conn = mysqli_connect("localhost", "root", "12321", "twitterClone");

            if (!$conn) {
                die("Database connection failed: " . mysqli_connect_error());
            }
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["signup"])) {
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $dob = $_POST['dob'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $sql = "INSERT INTO userInfo (firstName, lastName, dob) VALUES ('$firstName', '$lastName', '$dob');";
                $sql2 = "INSERT INTO userLogin (username, password) VALUES ('$username', '$password') ";

                if ($conn->query($sql) === TRUE) {
                    echo "Inserted into user Info";
                    if ($conn->query($sql2) === TRUE) {
                        echo "Inserted into user login";
                        /* header("Location: home.php"); */
                        exit();
                    } else {
                        echo "Error inserting into user login" . $conn->error;
                    }
                } else {
                    echo "Error deleting tweet: " . $conn->error;
                }
            }
            ?>
        </div>
    </div>

    <script>
        const createAccountButton = document.getElementById('createAccountButton');
        const nextButton = document.getElementById('nextButton');
        const submitButton = document.getElementById('submitButton');
        const additionalFields = document.getElementById('additionalFields');
        const usernameField = document.getElementById('usernameField');
        const passwordField = document.getElementById('passwordField');
        const firstNameField = document.getElementById('firstName');
        const lastNameField = document.getElementById('lastName');
        const dobField = document.getElementById('dobField');

        createAccountButton.addEventListener('click', () => {
            // Show additional fields and the next button
            additionalFields.style.display = 'block';
            nextButton.style.display = 'block';
            // Hide the create account button
            createAccountButton.style.display = 'none';
        });

        nextButton.addEventListener('click', () => {
            // Show username and password fields
            usernameField.style.display = 'block';
            passwordField.style.display = 'block';
            // Show the submit button
            submitButton.style.display = 'block';
            // Hide the next button
            nextButton.style.display = 'none';
            firstNameField.style.display = 'none'
            lastNameField.style.display = 'none'
            dobField.style.display = 'none'
        });
    </script>
</body>

</html>