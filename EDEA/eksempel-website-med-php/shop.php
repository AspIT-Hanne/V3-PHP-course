<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    // Forbind til database - returnerer et MySQLi objekt
    $db = new MySQLi("localhost", "brugernavn", "adgangskode", "database");

    // Hvis forbindelse til databasen fejler
    if($db->connect_error) 
    {   
        // Stop script og udskriv fejlmeddelelse
        die("Connection to database failed: ". $db->connect_error);
    }
    else // Hvis forbindelse til databasen lykkes
    {
        // Kør SQL Select query - returnerer et MySQLi-result objekt. Henter alle poster i "products" tabellen
        $result = $db->query("SELECT * FROM products");
        
        // Test om SQL query fejlede
        if ($db->error)
        {
            echo $db->error;
        }
        else // Hvis SQL query lykkedes
        {
            // Tag hver post fra tabellen og overfør til det associative array $row ligeså længe der er flere poster fra tabellen
            while($row = $result->fetch_assoc())
            {
                // Flyt $row arrayet til et multidimensionelt associative array $productrow
                // Det første produkt bliver $productrow[0], andet produkt bliver $productrow[1] osv
                $productrow[] = $row;
            }

            
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>EDEA skates</title>
</head>

<body class="light">

    <?php 
        include "includes/topmenu.php"; 
        include "includes/sidemenu.php";
    ?>
 
    <div class="content">
        <main>
            <h1>EDEA shop</h1>
            <section>
                <div class="products">
                <?php
                        // Tæl hvor mange produkter der blev returneret fra databasen og lagt over i arrayet $productrow
                        $rowCount = count($productrow);
                        // Start med at tælle fra det sidste element i tabellen - 1, fordi array index starter ved 0. Så produkt nummer 5 i tabellen ville ligge på index 4.
                        
                        for($j = $rowCount - 1; $j >= 0; $j--)
                        {
                            // Hvis der er flere billeder til et produkt omdannes strengen med billednavne til et array (med explode). Hvis du er kun er et billede, læg dette på index 0 i arrayet med billednavne. Hvis der ikke står noget i feltet med billedstien indsættes default billede.
                            if(strpos($productrow[$j]['PPic'], " "))
                            {
                                $productImages = explode(" ", $productrow[$j]['PPic']);
                            }
                            else if(empty($productrow[$j]['PPic']))
                            {
                                $productImages[0] = "imagecomingsoon.png";
                            }
                            else
                            {
                                $productImages[0] = $productrow[$j]['PPic'];
                            }

                            echo 
                            // echo den HTML der skal bruges til at indsætte produkter. Koden gentages i et loop.
                            // a href='showProduct.php?id={$productrow[$j]['ID']}' linker til de individuelle produktsider, som genereres dynamisk afhængigt af produktets ID
                            "<article>
                                <img src='img/$productImages[0]'>
                                <h3>{$productrow[$j]['PName']}</h3>
                                <p>Antal stjerner: {$productrow[$j]['PStars']}</p>
                                <p>Beskrivelse:</p>
                                <p>{$productrow[$j]['PDesc']}</p>
                                <p>Pris: {$productrow[$j]['PPrice']},-</p>
                                <a href='showproduct.php?id={$productrow[$j]['PID']}' class='buybtn'>Køb nu!</a>
                            </article>";
                        }

                    ?>
                </div class="products">
            </section>
        </main>

        <?php include "includes/footer.php"; ?>

    </div>

</body>
</html>