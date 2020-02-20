<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }


if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $_SESSION += $_POST;
        $username = "'" . $_SESSION["login-username"] . "'";

        $db = new MySQLi("localhost", "halu", "1234", "v3cms");
    
        if($db->connect_error) 
        {
            die("Connection to database failed: ". $db->connect_error);
        }
        else
        {
            $result = $db->query("SELECT * FROM edeausers WHERE Username = $username");

            if ($db->error)
                {
                    echo $db->error;
                }
                else
                {
                    $row = $result->fetch_assoc();
                    $newProductCreatedBy = $row['Username'];
                    $newProductCreatedDate = date('d-m-Y');
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
    <title>Nyt produkt</title>
</head>
<body>
    
    <?php 
        include "includes/topmenu.php";

        include "includes/sidemenu.php";
    ?>
    
    <div class="content">

        <main>
            <h1>Produkt oprettet</h1>

            <pre><?php echo $newProductCreatedBy . " og " . $newProductCreatedDate; ?></pre>

        </main>
    
        <?php include "includes/footer.php"; ?>
    </div>
</body>
</html>