<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>

<nav class="side">
    <a href="index.php"><img src="img/edea-skates-logo.png" alt="Edea logo"></a>
    <ul>
        <li><a href="index.php">Forside</a></li>
        <li><a href="#">Shop</a></li>
        <li><a href="#">Garanti</a></li>
        <li><a href="#">Om os</a></li>
        <?php 
            if (isset($_SESSION['login-submit']))
            {
                echo "<li><a href='logout.php'>Log ud</a></li>";
                $db = new MySQLi("localhost", "halu", "1234", "v3cms");
    
                if($db->connect_error) 
                {
                    die("Connection to database failed: ". $db->connect_error);
                }

                $username = "'" . $_SESSION["login-username"] . "'";
                $result = $db->query("SELECT * FROM edeausers WHERE Username = $username");

                if ($db->error)
                {
                    echo $db->error;
                }
                else
                {
                    $row = $result->fetch_assoc();
                    if ($row['Priviledge'] == 'Administrator' || $row['Priviledge'] == 'Moderator')
                    {
                        echo "<li><a href='createProduct.php'>Opret produkt</a></li>";
                    }
                }
            }
            else
            {
                echo "<li><a href='login.php'>Login</a></li>";
                echo "<li><a href='createuser.php'>Opret bruger</a></li>";
            }
        ?>
    </ul>
</nav>