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
    <title>Opret nyt produkt</title>
</head>
<body>
    <?php 
        include "includes/topmenu.php";

        include "includes/sidemenu.php";
    ?>

    <div class="content">
        <main>
            <h1>Opret nyt produkt</h1>
            <form method="post" action="newProduct.php">
                <p>
                    <label for="newproduct-name">Produkt navn: </label>
                    <input type="text" name="newproduct-name" placeholder="Produktnavn">
                </p>

                <p>
                    <label for="newproduct-image">Klik for at uploade produkt billede</label>
                    <input type="file" name="newproduct-image">
                </p>

                <p>
                    <label for="newproduct-stars">Antal stjerner:</label>
                    <select name="newproduct-stars">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="3">4</option>  
                        <option value="3">5</option>  
                        <option value="3">6</option>                  
                    </select>
                </p>
                
                <p>
                    <label for="newproduct-longdesc">Lang beskrivelse: </label>
                    <input type="text" name="newproduct-longdesc" placeholder="Lang beskrivelse">
                </p>

                <p>
                    <label for="newproduct-shortdesc">Kort beskrivelse: </label>
                    <input type="text" name="newproduct-shortdesc" placeholder="Kort beskrivelse">
                </p>

                <p>
                    <label for="newproduct-stiff">Stivhed: </label>
                    <select name="newproduct-stiff">
                        <option value="48">48</option>
                        <option value="85">85</option>
                        <option value="90">90</option>
                        <option value="95">95</option>
                </select>
                </p>
                
                <p>
                    <label for="newproduct-supports">Understøtter (hold ctrl nede for at vælge flere): </label>
                    <select name="newproduct-supports" multiple size="4">
                        <option value="enkeltspring">Enkeltspring</option>
                        <option value="dobbeltspring">Dobbeltspring</option>
                        <option value="triplespring">Triplespring</option>
                        <option value="quadspring">Quadspring</option>
                    </select>
                </p>

                <p>
                    <label for="newproduct-price">Pris: </label>
                    <input type="text" name="newproduct-price" placeholder="Pris">
                </p>
                
                <p>
                    <label for="newproduct-stock">På lager: </label>
                    <input type="text" name="newproduct-stock" placeholder="Lagerbeholdning">
                </p>
                
                <p>
                    <input type="submit" name="newproduct-submit" value="Opret" class="submitbtn">
                </p>

            </form>
                    
        </main>

        <pre><?php print_r($_SESSION); ?></pre>

        <?php include "includes/footer.php"; ?>

    </div>
    
</body>
</html>