<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    $i = 0;

    $db = new MySQLi("localhost", "halu", "1234", "v3cms");
        
        if($db->connect_error) 
        {
            die("Connection to database failed: ". $db->connect_error);
        }
        else
        {
            $result = $db->query("SELECT * FROM products");

            if($db->error)
            {
                echo $db->error;
            }
            else
            {
                if($result->num_rows < 6)
                {
                    $numberofproducts = $result->num_rows;
                }
                else
                {
                    $numberofproducts = 6;
                }

                while($row = $result->fetch_assoc())
                {
                    if($i < 6)
                    {
                        $products[] = $row;

                        $temppicstr = $products[$i]['PPic'];

                        if(strpos($temppicstr, ' '))
                        {
                            $temppic = explode(' ', $products[$i]['PPic']);
                            $products[$i]['PPic'] = $temppic[0];
                        }
                        else if(empty($products[$i]['PPic']))
                        {
                            $products[$i]['PPic'] = "imagecomingsoon.png";
                        }

                        $i++;
                    }
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
<body>
    <?php 
        include "includes/topmenu.php";

        include "includes/sidemenu.php";
    ?>
    
    <div class="content">

        <header class="
            <?php
                 if ($currentMonth < 7)
                 {
                     echo "spring";
                 }
                 else
                 {
                     echo "fall";
                 }
            ?>
        ">

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
                    for($j = 0; $j < $numberofproducts ; $j++)
                    {?>
                        <article>
                            <img src="img/<?php echo $products[$j]['PPic']; ?>" alt="Piano Edea skate">
                            <h3><?php echo $products[$j]['PName']; ?></h3>
                            <p>Antal stjerner: <?php echo $products[$j]['PStars']; ?></p>
                            <p>Beskrivelse:</p>
                            <p><?php echo $products[$j]['PDesc']; ?></p>
                            <p>Stivhed: <?php echo $products[$j]['PStiff']; ?></p>
                            <p>Understøtter: <?php echo $products[$j]['PSupp']; ?></p>
                            <p>Pris: <?php echo $products[$j]['PPrice']; ?>,-</p>
                            <button>Læs mere!</button>
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