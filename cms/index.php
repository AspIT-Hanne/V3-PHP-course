<?php
    if(!isset($_SESSION))
    {
        session_start(); // Make sure $_SESSION is available and updated
    }

    // Date-time exercises. Mainly for fun and to learn about this method
    $currentMonth = date("m"); 
    $currentMinute = date("i");
    $month = array("januar", "februar", "marts", "april", "maj", "juni", "juli", "august", "september", "oktober", "november", "december");
    $season = array("vinter", "forår", "sommer", "efterår");
    $seasonText = array("<br>Er dine skøjter helt up-to-date til sæsonens sidste konkurrencer?", 
        "<br>Skal du have nye skøjter klar til næste sæsons programmer?",
        ". Off-ice træning er i fuld gang.<br> Vidste du, at vi også sælger in-line rulleskøjtehjul til at sætte under dine Edea støvler?",
        ". Er du kommet godt i gang med sæsonen?<br> Er dine skøjter klar til de første konkurrencer?");

    // Connect to database - returns MySQL object
    $db = new MySQLi("localhost", "halu_cms", "bbOFmqoDg,X-", "halu_v31cms");
    
    // If database connection fails
    if($db->connect_error) 
    {   
        // Kill current script and add error-message
        die("Connection to database failed: ". $db->connect_error);
    }
    else // If database connection succeeds
    {
        // Run SQL query - returns mySQLi-result object. Select all posts in table "products"
        $result = $db->query("SELECT * FROM products ORDER BY PID DESC LIMIT 3");
        
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
                // Transfer the row array to multidimensional associative array $products
                // First product will be on $products[0], second product on $products[1]
                $products[] = $row;
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
<body class="
    <?php if($currentMinute % 2 == 0) 
        {
            echo 'light';
        }
        else 
        {
            echo 'dark';
            } 
    ?> ">

    <?php 
        include "includes/topmenu.php";

        include "includes/sidemenu.php";
    
        
    ?>

    
    
    <div class="content">

        <header>
            <?php if ($currentMonth > 7)
            {
                echo "<img src='img/edea-home-of-champions.jpg'>";
            } 
            else
            {
                echo "<img src='img/edea-ice-skate-collection-2018.jpg'>";
            }?>

        <p class="neon">Det er <?php echo $month[floor($currentMonth) -1];?> og dermed 
            <?php 
                if($currentMonth == 12)
                {
                    echo $season[0] . $seasonText[0];
                }
                else
                {
                    echo $season[floor($currentMonth/3)] . $seasonText[floor($currentMonth/3)];
                }
                ?></p>
        </header>
        

        <main>
            <h1>Edea støvler - høj kvalitet til top præstationer!</h1>

            <section>
                <article>
                    <p>Kunstskøjteløbere har altid flyttet grænser, og de ønsker den nyeste teknologi til at hjælpe dem med dette. 
                    Edea's højt kvalificerede teknikere har fået feedback på, hvilke ønsker og krav skøjteløbere har til støvler. 
                    Dette, kombineret med den nyeste forskning, gør Edeas støvler både revolutionerende og af højeste kvalitet.</p>
                </article>
            </section>
            <section>
                <h2>Udvalgte produkter:</h2>
                <div class="products">
                    <?php
                        
                        // Count from 0 to number of products fetched from table
                        
                        for($i = 0; $i < count($products); $i++)
                        {
                            
                            if(empty($products[$i]['PPic']))
                            // If there is no picture
                            {
                                $prodImg = "imagecomingsoon.png";
                            }
                            else if (strpos($products[$i]['PPic'], " "))
                            // If there are more than one picture - then there is a space
                            {
                                $prodImg = explode(' ', $products[$i]['PPic'])[0];
                            }
                            else
                            // If there is exactly one picture
                            {
                                $prodImg = $products[$i]['PPic'];
                            }

                            
                
                            echo 
                            // echo all necessary HTML code to insert products. This will be looped and inserted as many time as looped.
                            // a href='showProduct.php?id={$productrow[$j]['ID']}' links to individual product page generated dynamically by the product-ID
                            "<article>
                                <img src='img/$prodImg'>
                                <h3>{$products[$i]['PName']}</h3>
                                <p>Antal stjerner: {$products[$i]['PStars']}</p>
                                <p>Beskrivelse:</p>
                                <p>{$products[$i]['PDesc']}</p>
                                <p>Pris: {$products[$i]['PPrice']},-</p>
                                <a href='showProduct.php?id={$products[$i]['PID']}' class='buybtn'>Køb nu!</a>
                            </article>";
                        }
                    ?>
                    
                </div>
            </section>
        </main>

        <?php include "includes/footer.php"; ?>

    </div>


</body>
</html>