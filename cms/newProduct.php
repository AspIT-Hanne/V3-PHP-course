<?php
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
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Nyt produkt</title>
</head>
<body>
    
    <?php 
        include "includes/topmenu.php";

        include "includes/sidemenu.php";
    ?>
    
    <div class="content">

        <main>
            <h1>Produkt oprettet</h1>

        </main>
    
        <?php include "includes/footer.php"; ?>
    </div>
</body>
</html>