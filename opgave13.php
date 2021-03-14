<?php

    // Check if session has been started. If it has then $_SESSION is already set. If not we need to start a session.

    if(!isset($_SESSION))
    {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opgave 13</title>
</head>
<body>

<?php include "opgave13menu.php"; ?>

<p>Velkommen til opgave 13 - forsiden</p>

<p>Her kan du se eksempler på inkluderede filer. Og du kan logge ind og logge ud!</p>
    
</body>
</html>