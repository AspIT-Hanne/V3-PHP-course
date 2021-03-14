<?php

    if(!isset($_SESSION))
    {
        session_start();
    }

    // Unset all properties and values that relate to this current session
    session_unset();
    // Destroy the current session
    session_destroy();
    // Empty the $_SESSION variable by setting it equal an empty array
    $_SESSION = [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log ud</title>
</head>
<body>
    <?php include "opgave13menu.php"; ?>

    <p>Du er nu logget ud.</p>
</body>
</html>