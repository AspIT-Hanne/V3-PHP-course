<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>

<nav class="top">
    <ul>
        <li><a href="#"><img src="img/FacebookIcon-bw.png" alt="Facebook logo"></a></li>
        <li><a href="#"><img src="img/InstagramIcon-bw.png" alt="Instagram logo"></a></li>
        <li><a href="#"><img src="img/TwitterIcon-bw.png" alt="Twitter logo"></a></li>
        <li><a href="#"><img src="img/YoutubeIcon-bw.png" alt="YouTube logo"></a></li>
        <?php 
            if (isset($_SESSION['login-submit']))
            {
                echo "<li>Velkommen, {$_SESSION['login-username']}</li>";
            }
            else
            {
                echo "<li><a href='login.php'>Login</a></li>";
            }
        ?>
    </ul>
</nav>