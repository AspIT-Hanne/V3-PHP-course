<?php
    if(!isset($_SESSION)) // Make sure $_SESSION is available and updated
    { 
        session_start(); 
    }

    $image = "";

    // Connect to database - returns MySQL object
    $db = new MySQLi("localhost", "halu", "1234", "v3cms");
    
    // If database connection fails
    if($db->connect_error) 
    {   
        // Kill current script and add error-message
        die("Connection to database failed: ". $db->connect_error);
    }
    else // If database connection succeeds
    {
        // Run SQL query - returns mySQLi-result object. Select all posts in table "products"
        $result = $db->query("SELECT * FROM products");
        
        // Test if SQL query failed
        if ($db->error)
        {
            echo $db->error;
        }
        else // If SQL query succeeded
        {
            // Take each post from database and transfer to associative array $row for as long as there are database posts
            while($row = $result->fetch_assoc())
            {
                
                // Transfer the row array to multidimensional associative array $productrow
                // First product will be on $productrow[0], second product on $productrow[1]
                $productrow[] = $row;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Edea skates</title>
</head>
<body>

    <?php 
        include "includes/topmenu.php";

        include "includes/sidemenu.php";
    ?>

    
    
    <div class="content">

    <pre><?php print_r($productrow); ?></pre>

    <?php
    for($i = 0; $i < 6; $i++)
    {

        if(strpos($productrow[$i]['PPic'], " ")) // Hvis der er flere billeder af produktet
        {
            $image = explode(" ", $productrow[$i]['PPic']); // "Eksploder" alle billednavne ud i et array, som lægges over i arrayet $image
        }
        elseif(empty($productrow[$i]['PPic'])) // Hvis der ikke er noget billede af produktet, lægges "billede er på vej" standarden over på plads 0 i $image arrayet
        {
            $image[0] = "imagecomingsoon.png";
        }
        else // Hvis der er lige præcis et billede af produktet lægges det billednavn over på plads 0 i $image arrayet
        {
            $image[0] = $productrow[$i]['PPic'];
        }

        echo "
            <h2>{$productrow[$i]['PName']}</h2>";
            for($j = 0; $j < count($image); $j++) // Gennemløb $image arrayet så mange gange, som der er elementer i arrayet (count) og udskriv hvert billede - uanset om der er 0, 1 eller mange billeder
            {
                echo "<img src='img/{$image[$j]}'>";
            }
            

    }
    ?>

    </div>
</body>
</html>