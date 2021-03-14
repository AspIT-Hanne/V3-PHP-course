<?php

    // This is just a test-page to make sure that you stay logged in or logged out when going to another page

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

<p>Velkommen til opgave 13 - side 2</p>

<p>Når du skifter til denne side skulle du stadig gerne være enten logget ind eller ud?</p>
    
</body>
</html>