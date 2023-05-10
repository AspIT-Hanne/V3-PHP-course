<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    $i = 0;

    $db = new MySQLi("localhost", "brugernavn", "adgangskode", "database");
        
        if($db->connect_error) 
        {
            die("Connection to database failed: ". $db->connect_error);
        }
        else
        {
            $result = $db->query("SELECT * FROM products ORDER BY PID DESC LIMIT 3");

            if($db->error)
            {
                echo $db->error;
            }
            else
            {
                while($row = $result->fetch_assoc())
                {
                        $products[] = $row;

                        $temppicstr = $products[$i]['PPic'];

                        // Hvis der er flere billeder til produktet (der er et mellemrum)
                        if(strpos($temppicstr, ' '))
                        {
                            // Lav strengen med billederne om til et array og læg første billede ind i $products array
                            $temppic = explode(' ', $products[$i]['PPic']);
                            $products[$i]['PPic'] = $temppic[0];
                        }
                        // Hvis der ikke er uploadet et billede til produktet
                        else if(empty($products[$i]['PPic']))
                        {
                            // Indsæt et default billede
                            $products[$i]['PPic'] = "imagecomingsoon.png";
                        }

                        $i++;
                }
            }
        }


    $currentMonth = date("m");
    $currentMinute = date("i");
    $month = array("januar", "februar", "marts", "april", "maj", "juni", "juli", "august", "september", "oktober", "november", "december");
    $season = array("vinter", "forår", "sommer", "efterår");
    $seasonText = array(
        ". <br>Er dine skøjter helt up-to-date til sæsonens sidste konkurrencer?", 
        ". <br>Skal du have nye skøjter klar til næste sæsons programmer?",
        ". Off-ice træning er i fuld gang.<br> Vidste du, at vi også sælger in-line rulleskøjtehjul til at sætte under dine Edea støvler?",
        ". Er du kommet godt i gang med sæsonen?<br> Er dine skøjter klar til de første konkurrencer?");
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
            <img src="<?php
                    if ($currentMonth < 7)
                    {
                        echo "img/edea-ice-skate-collection-2018.jpg";
                    }
                    else
                    {
                        echo "img/edea-home-of-champions.jpg";
                    }
                ?>" alt="">

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
                ?>
            </p>
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
                    // For hvert produkt i $products arrayet
                    for($j = 0; $j < count($products) ; $j++)
                    {?>
                        <article>
                            <!-- Indsæt de hentede produkter i hver sin article -->
                            <img src="img/<?php echo $products[$j]['PPic']; ?>" alt="Edea skate">
                            <h3><?php echo $products[$j]['PName']; ?></h3>
                            <p>Antal stjerner: <?php echo $products[$j]['PStars']; ?></p>
                            <p>Beskrivelse:</p>
                            <p><?php echo $products[$j]['PDesc']; ?></p>
                            <p>Stivhed: <?php echo $products[$j]['PStiff']; ?></p>
                            <p>Understøtter: <?php echo $products[$j]['PSupp']; ?></p>
                            <p>Pris: <?php echo $products[$j]['PPrice']; ?>,-</p>
                            <button class='buybtn'><a href='showproduct.php?id=<?php echo $products[$j]['PID'];?>' >Køb nu!</a></button>
                        </article>
                    <?php
                    }
                    ?>

                </div>
            </section>
        </main>

        <?php include "includes/footer.php"; ?>

    </div class="content">



</body>
</html>