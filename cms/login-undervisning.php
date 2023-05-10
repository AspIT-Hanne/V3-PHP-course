<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    // Connect to userdatabase

    $db = new MySQLi("localhost", "testhalu", "1234", "edea");
    
    if($db->connect_error) 
    {
        die("Connection to database failed: ". $db->connect_error);
    }
    else
    {
        $userErr = $pwErr = "";     // Variables to contain error-messages
    }
    

    

    // Check if input fields are empty. If they are not move form input to $_SESSION variable

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["login-username"])) {
            $userErr = "Indtast venligst dit brugernavn";
        } else {
            $_SESSION["login-username"] = test_input($_POST["login-username"]);
        }
      
        if (empty($_POST["login-password"])) {
            $pwErr = "Indtast venligst din adgangskode";
        } else {
            $_SESSION["login-password"] = test_input($_POST["login-password"]);
        }

        // If there is input in both username and password field connect to table to get username and password

        if (!empty($_POST["login-username"] && $_POST["login-password"]))
        {
            $username = "'" . $_POST["login-username"] . "'";
            $result = $db->query("SELECT * FROM users WHERE UUsername = $username");

            if ($db->error)
            {
                echo $db->error;
            }
            else if ($result->num_rows == 0)
            {
                $userErr = "Brugeren eksisterer ikke. Ønsker du at <a href='createuser.php'>oprette en bruger?</a>";
            }
            else
            { 
                $row = $result->fetch_assoc();
                if ($row['UPassword'] == $_POST['login-password'])
                {
                    $_SESSION["login-submit"] = $_POST["login-submit"];
                    header("Location: index.php");
                }
                else
                {
                    $pwErr = "Du har indtastet en forkert adgangskode!";
                }
            }
        }
    }

    function test_input($data) 
    {
        $data = trim($data);                // Strips data of unnecessary characters (newline, tab, extra spaces)
        $data = stripslashes($data);        // Strips data of backslashes
        $data = htmlspecialchars($data);    // Changes HTML-characters to HTML encoded entities (&lt; < &gt; >)
        return $data;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Login</title>
</head>
<body>

    <?php 
        include "includes/topmenu.php";

        include "includes/sidemenu.php";
    ?>

    <main class="content">
            <h1>Login!</h1>
            
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <p>
                    <label for="login-username" class="loginform">Brugernavn: </label>
                    <input type="text" name="login-username" placeholder="Brugernavn" class="logininput">
                    <span class="error">* <?php echo $userErr;?></span>
                </p>
                
                <p>
                    <label for="login-password" class="loginform">Adgangskode: </label>
                    <input type="text" name="login-password" placeholder="Adgangskode" class="logininput">
                    <span class="error">* <?php echo $pwErr;?></span>
                </p>
                
                <p>
                    <input type="submit" name="login-submit" value="Login" class="submitbtn loginbtn">
                </p>
            </form>

    </main>

    <?php include "includes/footer.php"; ?>
    
        
</body>
</html>