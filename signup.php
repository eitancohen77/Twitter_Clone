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
                <input type="text" id="nameField" placeholder="Enter your name">
                <input type="text" id="dobField" placeholder="Enter your date of birth">
                <input type="text" id="usernameField" placeholder="Enter your username" style="display: none;">
                <input type="password" id="passwordField" placeholder="Enter your password" style="display: none;">

                <button id="nextButton"><b>Next</b></button>

                <button id="submitButton" style="display: none;"><b>Sign Up</b></button>
            </div>

            <div id="signUpSection">
                <p style="margin: 0;">Have an account already?</p>
                <a style="margin-left: 2px;" href="/login.php">Log in</a>
            </div>
        </div>
    </div>

    <script>
        const createAccountButton = document.getElementById('createAccountButton');
        const nextButton = document.getElementById('nextButton');
        const submitButton = document.getElementById('submitButton');
        const additionalFields = document.getElementById('additionalFields');
        const usernameField = document.getElementById('usernameField');
        const passwordField = document.getElementById('passwordField');
        const nameField = document.getElementById('nameField');
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
            nameField.style.display = 'none'
            dobField.style.display = 'none'
        });
    </script>
</body>

</html>