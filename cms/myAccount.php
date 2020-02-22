<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    $db = new MySQLi("localhost", "halu", "1234", "v3cms");
    
    if($db->connect_error) 
    {
        die("Connection to database failed: ". $db->connect_error);
    }
    else
    {
        if (isset($_SESSION['login-submit']))
            {
                $username = "'" . $_SESSION["login-username"] . "'";
                $result = $db->query("SELECT * FROM edeausers WHERE Username = $username");
                $row = $result->fetch_assoc();
            }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['regretuserchanges-submit']))
        {
            $fieldStatus = "disabled";
        }
        else
        {
            $fieldStatus = "";
        }       
    }
    else
    {
        $fieldStatus = "disabled";
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Nyt produkt</title>
</head>
<body>
    
    <?php 
        include "includes/topmenu.php";

        include "includes/sidemenu.php";
    ?>
    
    <div class="content">

        <main>
            <h1>Min side</h1>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <p>
                <label for="newuser-username">Brugernavn: </label>
                <input type="text" name="newuser-username" value="<?php echo $row['Username'];?>" class="logininput" <?php echo $fieldStatus; ?>>
            </p>

            <p>
                <label for="newuser-priviledge">Bruger privilegie:</label>
                <input type="text" name="newuser-priviledge" value="<?php echo $row['Priviledge'];?>" class="logininput" <?php echo $fieldStatus; ?>>
            </p>

            <p>
                <label for="newuser-firstname">Fornavn: </label>
                <input type="text" name="newuser-firstname" value="<?php echo $row['Firstname'];?>" class="logininput" <?php echo $fieldStatus; ?>>
            </p>
            
            <p>
                <label for="newuser-lastname">Efternavn: </label>
                <input type="text" name="newuser-lastname" value="<?php echo $row['Lastname'];?>" class="logininput" <?php echo $fieldStatus; ?>>
            </p>

            <p>
                <label for="newuser-address">Adresse: </label>
                <input type="text" name="newuser-address" value="<?php echo $row['Address'];?>" class="logininput" <?php echo $fieldStatus; ?>>
            </p>

            <p>
                <label for="newuser-postcode">Postnummer: </label>
                <input type="text" name="newuser-postcode" value="<?php echo $row['Postcode'];?>" class="logininput" <?php echo $fieldStatus; ?>>
            </p>

            <p>
                <label for="newuser-country">Land: </label>
                <input type="text" name="newuser-country" value="<?php echo $row['Country'];?>" class="logininput" <?php echo $fieldStatus; ?>>
            </p>
            
            <p>
                <label for="newuser-email">E-mail: </label>
                <input type="text" name="newuser-email" value="<?php echo $row['Email'];?>" class="logininput" <?php echo $fieldStatus; ?>>
            </p>
            
            <p>
                <label for="newuser-website">Website: </label>
                <input type="text" name="newuser-website" value="<?php echo $row['Website'];?>" class="logininput" <?php echo $fieldStatus; ?>>
            </p>
            
            <p>
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    if(isset($_POST['regretuserchanges-submit']))
                    {
                        echo "<input type='submit' name='edituser-submit' value='Rediger Bruger' class='submitbtn'>";
                    }
                    else
                    {
                        echo "<input type='submit' name='acceptuserchanges-submit' value='Bekræft ændringer' class='submitbtn'>";
                        echo "<input type='submit' name='regretuserchanges-submit' value='Fortryd ændringer' class='submitbtn'>";
                    }       
                }
                else
                {
                    echo "<input type='submit' name='edituser-submit' value='Rediger Bruger' class='submitbtn'>";
                }
                ?>

                <input type="submit" name="deleteuser-submit" value="Slet Bruger" class="submitbtn">
                
            </p>
        </form>

        </main>
    
        <?php include "includes/footer.php"; ?>
    </div>
</body>
</html>