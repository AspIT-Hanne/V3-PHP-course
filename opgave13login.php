<?php

    if(!isset($_SESSION))
    {
        session_start();
    }


    $userErr = $pwErr = "";     // Variables to contain error-messages

    // Check if input fields are empty. If they are not move form input to $_SESSION variable
    // if (isset($_POST["login-submit"])) - you get the same result with this as the sentence in line 13. Line 13 uses the $_SERVER variable that contains an index called "REQUEST_METHOD". The default for this index is "GET" but if someone pressed a submit button in a form using the post-method then "REQUEST_METHOD" will be "POST". This is a good way of securing that someone has pressed a submit button.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // If user didn't enter anything into the form-field "login-username" (it is empty)
        if (empty($_POST["login-username"])) {
            // Insert an error string into the error-message variable
            $userErr = "Username is required";
        } 
        else // If user did enter something into the form-field "login-username" (it is not empty)
        {
            // Move the entered username from $_POST to $_SESSION
            $_SESSION["login-username"] = $_POST["login-username"];
            // If user also entered something into the password form-field
            if (!empty($_POST["login-password"]))
            {
                // If you entered both username and password move the value to the $_SESSION variable so you can use this as documentation from now on and then redirect the user to the frontpage
                $_SESSION["login-submit"] = $_POST["login-submit"];
                header("location: opgave13.php");
            }
        }
        // If user didn't enter anything into the password-field
        if (empty($_POST["login-password"])) {
            // Insert an error string into the error-message variable
            $pwErr = "Password is required";
        } 
        else // If user did enter something into the password-field
        {
            // Save entered password in $_SESSION variable. This is not really necessary since you will never need the password for anything
            $_SESSION["login-password"] = $_POST["login-password"];
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opgave 13</title>
</head>
<body>

<?php include "opgave13menu.php"; ?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <p>
        <label for="login-username" class="loginform">Brugernavn: </label>
        <input type="text" name="login-username" placeholder="Brugernavn" class="logininput" value="<?php
                if(isset($_POST["login-username"])) // If there is something in the field username it means that the user typed a wrong password and it's annoying to have to type your username again so we echo it so that the user doesn't have to type it again.
                {
                    echo $_POST["login-username"];
                }
            ?>">
        <span class="error">* <?php echo $userErr; // If there has been an error with the username it will be displayed here?></span>
    </p>
    
    <p>
        <label for="login-password" class="loginform">Adgangskode: </label>
        <input type="text" name="login-password" placeholder="Adgangskode" class="logininput">
        <span class="error">* <?php echo $pwErr; // If there has been an error with the password it will be displayed here?></span>
    </p>
    
    <p>
        <input type="submit" name="login-submit" value="Login" class="submitbtn loginbtn">
    </p>
</form>

<pre><?php // Printing $_SERVER and $_SESSION to see what they contain 
    print_r($_SERVER); ?></pre>
<pre><?php 
    if(isset($_SESSION))
        {
            print_r($_SESSION);
        }
    ?>
 </pre>
    
</body>
</html>