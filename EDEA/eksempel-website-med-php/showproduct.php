<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    // Hvis siden bliver loadet med et ID
    if(isset($_GET['id']))
    {
        // Læg id'et over i en variabel med ' ' omkring så det kan bruges til at hente produktet med det overførte ID
        $id = "'".$_GET['id']."'";

        $db = new MySQLi("localhost", "brugernavn", "adgangskode", "database");

        if($db->connect_error) 
        {
            die("Connection to database failed: ". $db->connect_error);
        }
        else
        {
            // Hent produktet med det relevante ID - man kunne godt teste for fejl her, men en fejl kan kun opstå, hvis folk forsøger at indtaste id'et manuelt. Så længe man kommer fra forsiden, kan der kun overføres ID'er, som allerede eksisterer fordi de er genereret af data fra databasen
            $resultProd = $db->query("SELECT * FROM products WHERE PID = $id");
            $productRow = $resultProd->fetch_assoc();

            // Hvis der står flere værdier i PSupp feltet (de overføres som streng), lægges de over i et array i stedet for
            if(strpos($productRow['PSupp'], " "))
            {
                $productSupports = explode(" ", $productRow['PSupp']);
            }
            else
            {
                $productSupports[0] = $productRow['PSupp'];
            }

            // Hvis der står flere værdier i PPic (billeder) feltet (de overføres som streng), lægges de over i et array i stedet for
            if(strpos($productRow['PPic'], " "))
            {
                $productImages = explode(" ", $productRow['PPic']);
            }
            elseif(empty($productRow['PPic']))
            {
                $productImages[0] = "imagecomingsoon.png";
            }
            else
            {
                $productImages[0] = $productRow['PPic'];
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Vis produkt</title>
</head>
<body class="light">
    
    <?php 
        include "includes/topmenu.php";

        include "includes/sidemenu.php";
    ?>
    
    <div class="content">

        <main>
            <h1><?php echo $productRow['PName']; ?></h1>
            <div class="showProduct">
                <section class="leftColumn">
                    <!-- Indsæt alle billeder - uanset hvor mange der er -->
                    <p><?php 
                        for ($i = 0; $i < count($productImages); $i++)
                        {
                            echo "<img src='img/{$productImages[$i]}'>"; 
                        }
                    ?>
                    </p>
                    <h2>Beskrivelse:</h2>
                    <p><?php echo $productRow['PDesc']; ?></p>
                </section>

                <section class="rightColumn">
                    <button class="buybtn"><a href="#">Køb nu!</a></button>
                    <p><span>Antal stjerner: </span><?php echo $productRow['PStars']; ?></p>
                    <p><span>Støvle stivhed: </span><?php echo $productRow['PStiff']; ?></p>
                    <p><span>Understøtter: </span><?php echo $productSupports[0]; ?></p>
                    <?php 
                        if(count($productSupports) > 1)
                        {
                            for($i = 1; $i < count($productSupports); $i++)
                            {
                                echo "<p><span>&nbsp; </span> $productSupports[$i]</p>";
                            }
                        }
                    ?>
                    <p><span>Pris: </span><?php echo $productRow['PPrice']; ?>,-</p>
                    <p><span>På lager: </span>
                        <?php 
                            if($productRow['PStock'] != 0)
                            {
                                echo "Ja";
                            }
                            else
                            {
                                echo "Nej";
                            }
                        ?>
                    </p>
                </section>
            </div>
        </main>
    
        <?php include "includes/footer.php"; ?>
    </div>
</body>
</html>