<?php
    $welcomemsg = "";
?>


<nav>
    <ul>
        <li>
            <a href="opgave13.php">Forside</a>
        </li>
        <?php
            // If someone pressed the submit button and they logged in succesfully then there is something in $_SESSION on index "login-submit". This was set in opgave13login.php line 20
            if(isset($_SESSION["login-submit"]))
            {
                // print the HTML-code for a log-out menu item and put a welcome message in the $welcomemsg variable
                echo "<li><a href='opgave13logout.php'>Log ud</a></li>";
                $welcomemsg = "Velkommen, {$_SESSION['login-username']}";
            }
            else // If noone has pressed the submit button and logged in succesfully
            {
                // print the HTML-code for a log in menu item and remove any welcome message in the $welcomemsg variable
                echo "<li><a href='opgave13login.php'>Log ind</a></li>";
                $welcomemsg = "";
            }
        ?>
        <li>
            <a href="opgave13side2.php">En anden side</a>
        </li>
    </ul>
    <p style="float:right;"><?php echo $welcomemsg; ?></p>
</nav>