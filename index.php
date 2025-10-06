<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V3.1 projekter</title>
</head>
<body>
    <h1>V3.1 projekter og opgaver</h1>

    <p><a href="EDEA">EDEA website</a></p>
    <p><a href="Eksamen">Eksamensopgaver</a></p>
    <p><a href="gardendiary">Garden Diary</a></p>
    <p><a href="NewYork-includes-classmanipulation">New York - includes og class manipulation</a></p>
</body>
</html><?php
 $navn ="Hanne";


?>


<?php
include 'head.php';
include 'navigation.php';
include 'footer.php';

?>
<body>
    <h1>Hello World <?php echo "Her kommer noget tekst"; ?></h1>

    <?php echo 'Mit navn er $navn'; ?>
</body>
</html>