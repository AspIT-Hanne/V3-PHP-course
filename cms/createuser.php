<?php
    // Test if typed in passwords match
    function testpwmatch ($pw1, $pw2)
    {
        if ($pw1 == $pw2)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function test_input($data) {
        $data = trim($data);                // Strips data of unnecessary characters (newline, tab, extra spaces)
        $data = stripslashes($data);        // Strips data of backslashes
        $data = htmlspecialchars($data);    // Changes HTML-characters to HTML encoded entities (&lt; < &gt; >)
        return $data;
      }
    
    $db = new MySQLi("localhost", "halu", "1234", "v3cms");
    
    if($db->connect_error) 
    {
        die("Connection to database failed: ". $db->connect_error);
    }
    else
    {
        $userErr = $pwErr = $repeatPwErr = $emailErr = "";     // Variables to contain error-messages

        // Has user pressed submit button?
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            // Did user type a username?
            if (empty($_POST["newuser-username"])) 
            {
                $userErr = "Indtast venligst et brugernavn!";
            } 
            else 
            {
                // Transfer username to SESSION variable
                $_SESSION["newuser-username"] = test_input($_POST["newuser-username"]);
            }
        
            // Did user type a password?
            if (empty($_POST["newuser-password"])) {
                $pwErr = "Indtast venligst en adgangskode!";
            }
            else
            {
                // Transfer password to SESSION variable
                $_SESSION["newuser-password"] = test_input($_POST["newuser-password"]);   
            }

            // Did user type the repeat password?
            if (empty($_POST["newuser-passwordrepeat"])) 
            {
                $repeatPwErr = "Indtast venligst adgangskode igen!";
            } 
            else
            {
                // Do the two passwords match?
                if (testpwmatch($_POST["newuser-password"], $_POST["newuser-passwordrepeat"]))
                {
                    // Transfer repeated password to SESSION variable (is this even necessary?)
                    $_SESSION["newuser-passwordrepeat"] = test_input($_POST["newuser-passwordrepeat"]);
                }

                else
                {
                    $repeatPwErr = "De to indtastede adgangskoder er ikke ens, fjols!";
                }
            }

            // Did user type an email?
            if (empty($_POST["newuser-email"])) 
            {
                $emailErr = "Indtast venligst en mail-adresse!";
            } 
            else 
            {
                // Is the email a valid email format?
                if (!filter_var($_POST["newuser-email"], FILTER_VALIDATE_EMAIL))
                {
                    $emailErr = "Indtast venligst en korrekt mail-adresse, spasser. Tak!";
                }
                else
                {
                    // Transfer email to SESSION variable
                    $_SESSION["newuser-email"] = test_input($_POST["newuser-email"]);
                } 
            }

            // Check if username, password, passwordrepeat and email are not empty and check if the passwords match - then we can start the insert-procedure into the database
            // If I had put all above code into the else-statements then I wouldn't need this extra control. But so many nested else-statements are difficult to read which is why I chose this solution
            if (!empty($_POST["newuser-username"]) && !empty($_POST["newuser-password"]) && !empty($_POST["newuser-passwordrepeat"]) && !empty($_POST["newuser-email"]) && testpwmatch($_POST["newuser-password"], $_POST["newuser-passwordrepeat"]))
            {
                // Put apostrophes around username so it can be used in SELECT statement
                $username = "'" . $_POST["newuser-username"] . "'";
                // Check if there is already a user in database with the same username
                $result = $db->query("SELECT * FROM edeausers WHERE Username = $username");

                if ($db->error) // Did SQL query return an error?
                {
                    echo $db->error;
                }
                // If SQL query returns no rows this username is not in the database and new user can be inserted into database
                else if ($result->num_rows == 0)
                { 
                    if($db->query("INSERT INTO edeausers (Username, Password, Priviledge, Firstname, Lastname, Address, Postcode, Country, Email, Website) VALUE ('{$_POST['newuser-username']}', '{$_POST['newuser-password']}', '{$_POST['newuser-priviledge']}', '{$_POST['newuser-firstname']}', '{$_POST['newuser-lastname']}'
                    , '{$_POST['newuser-address']}', '{$_POST['newuser-postcode']}', '{$_POST['newuser-country']}', '{$_POST['newuser-email']}', '{$_POST['newuser-website']}')"))
                    {
                        // Redirect to landing page for new users
                        header("Location: newuser-landing.php");
                    }
                    else
                    {
                        echo "Brugeroprettelse lykkedes ikke";
                    }
                }
                else
                {
                    // Username already exists in database - redirect to error-message and login form
                    header("Location: alreadyuser.php");
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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Create new user</title>
</head>
<body>

    <?php 
        include "includes/topmenu.php";

        include "includes/sidemenu.php";
    ?>

    <div class="content">
        <main>
        <h1>Opret bruger</h1>
        <!-- Use htmlspecialchars to reload the page after push of submit-button. htmlspecialchars converts HTML-tags to eg &gt; &lt; so the code is more difficult to misuse -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <p>
                <label for="newuser-username">Brugernavn: </label>
                <input type="text" name="newuser-username" placeholder="Brugernavn" class="logininput">
                <span class="error">* <?php echo $userErr; // If user didn't type a username print errormessage ?></span>
            </p>
            
            <p>
                <label for="newuser-password">Adgangskode: </label>
                <input type="text" name="newuser-password" placeholder="Adgangskode" class="logininput">
                <span class="error">* <?php echo $pwErr; // If user didn't type a password print errormessage ?></span>
            </p>

            <p>
                <label for="newuser-passwordrepeat">Gentag adgangskode: </label>
                <input type="text" name="newuser-passwordrepeat" placeholder="Gentag adgangskode" class="logininput">
                <span class="error">* <?php echo $repeatPwErr; // If passwords didn't match print errormessage ?></span>
            </p>

            <p>
                <label for="newuser-priviledge">Bruger privilegie:</label>
                <select id="priviledge" name="newuser-priviledge" class="logininput">
                    <option value="User" selected>Bruger</option>
                    <option value="Moderator">Moderator</option>
                    <option value="Administrator">Administrator</option>                    
                </select>
            </p>

            <p>
                <label for="newuser-firstname">Fornavn: </label>
                <input type="text" name="newuser-firstname" placeholder="Fornavn" class="logininput">
            </p>
            
            <p>
                <label for="newuser-lastname">Efternavn: </label>
                <input type="text" name="newuser-lastname" placeholder="Efternavn" class="logininput">
            </p>

            <p>
                <label for="newuser-address">Adresse: </label>
                <input type="text" name="newuser-address" placeholder="Gade og nr." class="logininput">
            </p>

            <p>
                <label for="newuser-postcode">Postnummer: </label>
                <input type="text" name="newuser-postcode" placeholder="Postnummer" id="postcode" class="logininput">
            </p>
            
            <p>
                <label for="newuser-city">By: </label>
                <input type="text" name="newuser-city" placeholder="By" class="logininput" id="city">
            </p>

            <p>
                <label for="newuser-country">Land: </label>
                <input type="text" name="newuser-country" placeholder="Land" class="logininput">
            </p>
            
            <p>
                <label for="newuser-email">E-mail: </label>
                <input type="text" name="newuser-email" placeholder="E-mail adresse" class="logininput">
                <span class="error">* <?php echo $emailErr;?></span>
            </p>
            
            <p>
                <label for="newuser-website">Website: </label>
                <input type="text" name="newuser-website" placeholder="Indtast URL på din hjemmeside" class="logininput">
            </p>
            
            <p>
                <input type="submit" name="newuser-submit" value="Opret" class="submitbtn">
            </p>
        </form>

        </main>

        <?php include "includes/footer.php"; ?>
    </div>

    <script src="js/functions.js"></script>
        
</body>
</html>