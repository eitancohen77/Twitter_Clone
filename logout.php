<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>

<?php
// Starting the session.
session_start();

// Unsetting all session variables.
session_unset();

// Destroying the session.
session_destroy();

// Redirecting the user to the login page or any other page.
header('Location: login.php');
exit();
?>

</body>

</html>