<?php
    $string = "the qick brown fox jumped over the lazy dog";

    $word = "brown";

    $email = "halu@aspit.dk";

    $pwstring ="1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz";

    function generatePw($length, $string)
    {
        return substr(str_shuffle($string), 0, $length);
    }

    function palindrome($testword)
    {
        if ($testword === strrev($testword))
        {
            return "$testword er et palindrom";
        }
        else
        {
            return "$testword er ikke et palindrom";
        }
    }
?>

<h2>Opgave 8</h2>

    <p><?php echo strtoupper($string); ?></p>

    <p><?php echo ucfirst($string); ?></p>

    <p><?php echo ucwords($string); ?></p>

    <p>
        <?php 
            if (strpos($string, $word))
            {
                echo "$word findes i strengen!";
            }
            else
            {
                echo "$word findes ikke i strengen!";
            }
        ?>
    </p>

    <p>
        <?php
            $exploded = explode("@", $email);

            echo $exploded[0];
        ?>
    </p>

    <p>Dit nye password er: <?php echo generatePw(8, $pwstring); ?></p>

    <p><?php echo palindrome("regninger"); ?></p>