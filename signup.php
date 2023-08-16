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
            <img style='width: 80px; height: 80px;' src="images/twitterLogo.png" alt="">
            <h1>Join Twitter Today</h1>

            <button class='styledButton' id="createAccountButton"><b>Create account</b></button>

            <div id="additionalFields" style="display: none;">
                <form name='signup' action="signup.php" method='POST'>
                    <!-- I create a fake hidden input type which is caught whenever the POST 
                    is sent -->
                    <input type="hidden" name="signup" value="1">
                    <div id="personalInfo">
                        <input class='inputValue' type="text" name='firstName' id="firstName" placeholder="Enter your first name">
                        <input class='inputValue' type="text" name='lastName' id="lastName" placeholder="Enter your last name">
                        <input class='inputValue' type="text" name='dob' id="dobField" placeholder="Enter your date of birth">
                    </div>
                    <div id="loginInfo">
                        <input class='inputValue' type="text" name='username' id="usernameField" placeholder="Enter your username" style="display: none;">
                        <input class='inputValue' type="password" name='password' id="passwordField" placeholder="Enter your password" style="display: none;">
                    </div>

                    <button class="styledButton" type="button" id="nextButton"><b>Next</b></button>

                    <button class="styledButton" id="submitButton" style="display: none;"><b>Sign Up</b></button>
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
                $sql = "INSERT INTO userLogin (username, password) VALUES ('$username', '$password');";

                if ($conn->query($sql) === TRUE) {
                    echo "Inserted into user Login";
                    $getUserID = "SELECT id FROM userLogin WHERE username = '$username';";
                    $results = $conn->query($getUserID);
                    if ($results->num_rows > 0) {
                        $row = $results->fetch_assoc();
                        $user_id = $row["id"];
                        $sql2 = "INSERT INTO userInfo (firstName, lastName, dob, user_id) VALUES ('$firstName', '$lastName', '$dob', '$user_id');";
                        if ($conn->query($sql2) === TRUE) {
                            echo "Inserted into user Info";
                            header("Location: home.php");
                            exit();
                        } else {
                        }
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
            additionalFields.style.display = 'block';
            nextButton.style.display = 'block';
            createAccountButton.style.display = 'none';
        });

        nextButton.addEventListener('click', () => {
            usernameField.style.display = 'block';
            passwordField.style.display = 'block';
            submitButton.style.display = 'block';
            nextButton.style.display = 'none';
            firstNameField.style.display = 'none'
            lastNameField.style.display = 'none'
            dobField.style.display = 'none'
        });
    </script>
</body>

</html>