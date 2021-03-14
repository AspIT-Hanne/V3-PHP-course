<?php
    session_start(); // Make sure $_SESSION is available and updated

    // Date-time exercises. Mainly for fun and to learn about this method
    $currentMonth = date("m"); 
    $currentMinute = date("i");
    $month = array("januar", "februar", "marts", "april", "maj", "juni", "juli", "august", "september", "oktober", "november", "december");
    $season = array("vinter", "forår", "sommer", "efterår");
    $seasonText = array("<br>Er dine skøjter helt up-to-date til sæsonens sidste konkurrencer?", 
        "<br>Skal du have nye skøjter klar til næste sæsons programmer?",
        "Off-ice træning er i fuld gang.<br> Vidste du, at vi også sælger in-line rulleskøjtehjul til at sætte under dine Edea støvler?",
        "Er du kommet godt i gang med sæsonen?<br> Er dine skøjter klar til de første konkurrencer?");

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
        
        
        <header>
            <img src="img/edea-home-of-champions.jpg">
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
                        // Count how many products were returned from database and put into array $productrow
                        $rowCount = count($productrow);
                        // Start counting from last element in table - 1, because array-indexes start at 0. So product no 5 in database would be on array index 4. End loop after three products to show the last three products in the database on the index page. If product no 5 is first product to show, then product no 3 is last product to show (show index 4, 3, and 2). Index of third product will always be rowcount - 3 (in this case 5 - 3), so we need to make sure it never counts any lower than this - which we achieve with $j > $rowCount - 4.
                        
                        for($j = $rowCount - 1; $j > $rowCount - 4; $j--)
                        {
                            // If there are multiple images for a product explode all the image names into array else move the one image name to index 0 of new array of images. This way we can display only the first image of the product on this page.
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
                            // echo all necessary HTML code to insert products. This will be looped and inserted as many time as looped.
                            // a href='showProduct.php?id={$productrow[$j]['ID']}' links to individual product page generated dynamically by the product-ID
                            "<article>
                                <img src='img/$productImages[0]'>
                                <h3>{$productrow[$j]['PName']}</h3>
                                <p>Antal stjerner: {$productrow[$j]['PStars']}</p>
                                <p>Beskrivelse:</p>
                                <p>{$productrow[$j]['PDesc']}</p>
                                <p>Pris: {$productrow[$j]['PPrice']},-</p>
                                <a href='showProduct.php?id={$productrow[$j]['PID']}' class='buybtn'>Køb nu!</a>
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