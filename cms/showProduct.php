<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $db = new MySQLi("localhost", "halu", "1234", "v3cms");

        if($db->connect_error) 
        {
            die("Connection to database failed: ". $db->connect_error);
        }
        else
        {
            $resultProd = $db->query("SELECT * FROM products WHERE ID = $id");
            $productRow = $resultProd->fetch_assoc();

            if(strpos($productRow['ProdSupports'], " "))
            {
                $productSupports = explode(" ", $productRow['ProdSupports']);
            }
            else
            {
                $productSupports[0] = $productRow['ProdSupports'];
            }

            if(strpos($productRow['ProdImage'], " "))
            {
                $productImages = explode(" ", $productRow['ProdImage']);
            }
            else
            {
                $productImages[0] = $productRow['ProdImage'];
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
<body>
    
    <?php 
        include "includes/topmenu.php";

        include "includes/sidemenu.php";
    ?>
    
    <div class="content">

        <main>
            <h1><?php echo $productRow['ProdName']; ?></h1>
            <div class="showProduct">
                <section class="leftColumn">
                    
                    <p><?php 
                        for ($i = 0; $i < count($productImages); $i++)
                        {
                            echo "<img src='img/{$productImages[$i]}'>"; 
                        }
                    ?>
                    </p>
                    <h2>Beskrivelse:</h2>
                    <p><?php echo $productRow['ProdLongDesc']; ?></p>
                </section>

                <section class="rightColumn">
                    <a href="#">Køb nu!</a>
                    <p><span>Antal stjerner: </span><?php echo $productRow['ProdStars']; ?></p>
                    <p><span>Støvle stivhed: </span><?php echo $productRow['ProdStiff']; ?></p>
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
                    <p><span>Pris: </span><?php echo $productRow['ProdPrice']; ?>,-</p>
                    <p><span>På lager: </span>
                        <?php 
                            if($productRow['ProdStock'] != 0)
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