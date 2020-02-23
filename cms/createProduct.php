<?php

    $errormessage = "";
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $_SESSION += $_POST;
        $username = "'" . $_SESSION["login-username"] . "'";
        $db = new MySQLi("localhost", "halu", "1234", "v3cms");

        $imageDir = "C:\Users\halu\code\php\cms\img\\";
        //$prodImages = array();
        $imageErr[] = "";

        if(!empty($_FILES['newproduct-image']))
        {
            $prodImagesString = implode(" ", $_FILES['newproduct-image']['name']);
            
            for($i = 0; $i < count($_FILES['newproduct-image']['name']); $i++)
            {
                if($_FILES['newproduct-image']['error'][$i] == 0)
                {
                    $imageTmp = $_FILES['newproduct-image']['tmp_name'][$i];
                    $imageFileName = basename($_FILES['newproduct-image']['name'][$i]);
                    $imageFullPath = $imageDir . $imageFileName;
                    if(move_uploaded_file($imageTmp, $imageFullPath))
                    {
                        
                        $imageErr[$i] = 0;
                    }
                    else
                    {
                        $imageErr[$i] = "Billedet kunne ikke flyttes";
                    }
                }
                else
                {
                    $imageErr[$i] = "Fejl i upload af billedet:" . $_FILES['newproduct-image']['error'][$i];
                }
            }
        }
        else
        {
            $prodImagesString = "No_image_available.png";
        }

        
    
        if($db->connect_error) 
        {
            die("Connection to database failed: ". $db->connect_error);
        }
        else
        {
            $resultuser = $db->query("SELECT * FROM edeausers WHERE Username = $username");

            if ($db->error)
                {
                    echo $db->error;
                }
                else
                {
                    $row = $resultuser->fetch_assoc();

                    $newProductCreatedBy = $row['Username'];
                    $newProductCreatedDate = date('Y-m-d');

                    $prodSupports = array();

                    if(!empty($_POST['newproduct-supports']))
                    {
                        $prodSupportsString = implode(" ", $_POST['newproduct-supports']);
                    }

                    if($db->query("INSERT INTO products (ProdImage, ProdName, ProdStars, ProdShortDesc, ProdLongDesc, ProdStiff, ProdSupports, ProdPrice, ProdStock, ProdCreatedBy, ProdCreatedDate) VALUE ('{$prodImagesString}', '{$_POST['newproduct-name']}', '{$_POST['newproduct-stars']}', '{$_POST['newproduct-shortdesc']}', '{$_POST['newproduct-longdesc']}', '{$_POST['newproduct-stiff']}', '{$prodSupportsString}', '{$_POST['newproduct-price']}', '{$_POST['newproduct-stock']}', '{$newProductCreatedBy}', '{$newProductCreatedDate}')"))
                        {
                            $errormessage = "Produktoprettelse lykkedes.";
                        }
                        else
                        {
                            $errormessage = "Produktoprettelse lykkedes ikke: ".$db->error;
                        }
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

            <form method="post" enctype="multipart/form-data">
                <p>
                    <label for="newproduct-name">Produkt navn: </label>
                    <input type="text" name="newproduct-name" placeholder="Produktnavn">
                </p>

                <p>
                    <label for="newproduct-image">Klik for at uploade produkt billede</label>
                    <input type="file" name="newproduct-image[]" multiple>
                    <p>ctrl + klik for at markere og uploade flere billeder.</p>
                </p>

                <p>
                    <label for="newproduct-stars">Antal stjerner:</label>
                    <select name="newproduct-stars">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>  
                        <option value="5">5</option>  
                        <option value="6">6</option>                  
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
                    <select name="newproduct-supports[]" multiple size="4">
                        <option value="enkeltspring" selected>Enkeltspring</option>
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
        <h3>$_FILES:</h3>
        <pre><?php  
            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {
                print_r($_FILES);
            } 
            
            ?></pre>
        <h3>$_SESSION:</h3>
        <pre><?php print_r($_SESSION); ?></pre>
        <h3>$_POST:</h3>
        <pre><?php print_r($_POST); ?></pre>

        <?php include "includes/footer.php"; ?>

    </div>
    
</body>
</html>