<?php
    // Forbind til database

    $db = new MySQLi("localhost", "brugernavn", "adgangskode", "database");
    
    if($db->connect_error) 
    {
        die("Connection to database failed: ". $db->connect_error);
    }

    $userErr = $pwErr = "";     // Variabler til fejlmeddelelser

    // Kontroller om inputfelter er tomme. Hvis de ikke var tomme, flyt input til $_SESSION

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["login-username"])) {
            $userErr = "Username is required";
        } else {
            $_SESSION["login-username"] = test_input($_POST["login-username"]);
        }
      
        if (empty($_POST["login-password"])) {
            $pwErr = "Password is required";
        } else {
            $_SESSION["login-password"] = test_input($_POST["login-password"]);
        }

        // Hvis der er input i både brugernavn og password, hent det indtastede brugernavn i databasen, hvis det findes. Ellers udskriv en fejlmeddelelse

        if (!empty($_POST["login-username"] && $_POST["login-password"]))
        {
            $username = "'" . $_POST["login-username"] . "'";
            $result = $db->query("SELECT * FROM edeausers WHERE Username = $username");

            if ($db->error)
            {
                echo $db->error;
            }
            else if ($result->num_rows == 0)
            {
                echo "Brugeren eksisterer ikke. <p>Ønsker du at <a href='createuser.php'>oprette en bruger?</a></p><br><br>";
            }
            else
            { 
                $row = $result->fetch_assoc();
                if ($row['Password'] == $_POST['login-password'])
                {
                    $_SESSION["login-submit"] = $_POST["login-submit"];
                    echo("<script>window.location.replace('index.php');</script>");
                    // header("Location: index.php");
                }
                else
                {
                    echo "Du har indtastet en forkert adgangskode!";
                }
            }
        }
    }

    function test_input($data) 
    {
        $data = trim($data);                // Fjern unødvendige karakterer fra input (linjeskift, tab,ekstra mellemrum)
        $data = stripslashes($data);        // Fjern backslashes fra input
        $data = htmlspecialchars($data);    // Ændrer HTML-karakterer til HTML entities (&lt; < &gt; >)
        return $data;
    }
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <p>
        <label for="login-username" class="loginform">Brugernavn: </label>
        <input type="text" name="login-username" placeholder="Brugernavn" class="logininput" value="<?php
                if(isset($_POST["login-username"]))
                {
                    echo trim($_POST["login-username"], "'");
                }
            ?>">
        <span class="error">* <?php echo $userErr;?></span>
    </p>
    
    <p>
        <label for="login-password" class="loginform">Adgangskode: </label>
        <input type="password" name="login-password" placeholder="Adgangskode" class="logininput">
        <span class="error">* <?php echo $pwErr;?></span>
    </p>
    
    <p>
        <input type="submit" name="login-submit" value="Login" class="submitbtn loginbtn">
    </p>
</form>