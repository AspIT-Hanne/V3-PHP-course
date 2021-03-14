<?php

$db = new MySQLi("localhost", "halu", "1234", "starupuif");
    
if($db->connect_error) 
{
    die("Connection to database failed: ". $db->connect_error);
}
else // If database connection succeeds
{
    // Run SQL query - returns mySQLi-result object. Select all posts in table "products"
    $result = $db->query("SELECT * FROM users");
    
    // Test if SQL query failed
    if ($db->error)
    {
        echo $db->error;
    }
    else // If SQL query succeeded
    {
        // Take each post from database and transfer to associative array $row for as long as there are database posts
        while($row = $result->fetch_assoc())
        {
            // Transfer the row array to multidimensional associative array $productrow
            // First product will be on $productrow[0], second product on $productrow[1]
            $allUsers[] = $row;
        } 
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Starup UIF arrangements kalender. Opret nye arrangementer - tilmeld dig arrangementer. Et godt sted at starte et aktivt og interessant fritidsliv.">
    <title>Starup UIF arrangementer - vis bruger</title>
</head>
<body>
    <main>
        <section>
            <h1>Opret bruger</h1>

            <article>
                <select name="vaelgBruger">
                    <?php print_r($allUsers);
                        $i = 0;
                        foreach($allUsers as $user)
                        {
                            echo "<option value='{$allUsers[$i]['UEmail']}'>{$allUsers[$i]['UEmail']} | {$allUsers[$i]['UFirstname']} {$allUsers[$i]['ULastname']}</option>";
                            $i++;
                        }
                    ?>
                </select>
                
                <form method="post">
                    <p>
                        <label for="brugerMail">Email: </label>
                        <input type="email" name="brugerMail" readonly>
                    </p>
                    <p>
                        <label for="brugerPrivilegie">Privilegie:</label>
                        <select name="brugerPrivilegie" disabled> <!-- Kun Administratorer kan redigere -->
                            <option value="Administrator">Administrator</option>
                            <option value="Moderator">Moderator</option>
                            <option value="Bruger" selected>Bruger</option>
                        </select>
                    </p>
                    <p>
                        <label for="brugerFornavn">Fornavn: </label>
                        <input type="text" name="brugerFornavn" readonly>
                        <label for="brugerEfternavn">Efternavn: </label>
                        <input type="text" name="brugerEfternavn" readonly>
                    </p>
                    <p>
                        <label for="brugerAdresse">Adresse: </label>
                        <input type="text" name="brugerAdresse" readonly>
                    </p>
                    <p>
                        <label for="brugerPostnr">Postnummer: </label>
                        <input type="text" name="brugerPostnr" readonly>
                        <label for="brugerBy">By: </label>
                        <input type="text" name="brugerBy" readonly>
                    </p>
                    <p>
                        <label for="brugerTlfnr">Telefonnummer: </label>
                        <input type="text" name="brugerTlfnr" readonly>
                    </p>
                    

                    <input type="submit" value="Ret Bruger" name="retBrugerSubmit">
                    <input type="submit" value="Acceptér Ændringer" name="accRetBruger">
                    <input type="submit" value="Fortryd Ændringer" name="fortrRetBruger">
                    <input type="submit" value="Ret Brugerprivilegie" name="retPrivilegieSubmit">
                </form>

            </article>

        </section>
    </main>
</body>
</html>