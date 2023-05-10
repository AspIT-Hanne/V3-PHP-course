<?php

    if(isset($_POST))
    {
        echo '$_POST er oprettet! <br>';
        print_r($_POST);
    }

    if($_SERVER[REQUEST_METHOD] == POST)
    {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    }

    if(isset($_POST["submit"]))
    {
        echo '$_POST med index submit er oprettet! <br>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form test</title>
</head>
<body>
    <form method="POST">
        <p>
            <label for="fname">First name:</label>
            <input type="text" name="fname">
        </p>
        <p>
            <label for="sname">Last name:</label>
            <input type="text" name="sname">
        </p>
        <p>
            <label for="gender">Gender:</label>
            <select name="gender">
                <option value="male">Man</option>
                <option value="female">Woman</option>
                <option value="nonbinary">Non binary</option>
            </select>
        </p>
        <input type="submit" name="submit" value="trykpaamig">
    </form>
</body>
</html>