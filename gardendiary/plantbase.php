<?php

    include_once "includes/includes.php";


    $dbdata = $connection->query("SELECT * FROM planter");

    if($connection->error)
    {
        echo($connection->error);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet">
    <title>Gardendiary - plantbase</title>
</head>
<body class="container-xxl">
    <h1 class="display-2">Plantedatabase</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Billede</th>
                <th scope="col">Navn</th>
                <th scope="col">Type</th>
                <th scope="col">Botanisk Navn</th>
                <th scope="col">Beskrivelse</th>
                <th scope="col">Højde</th>
                <th scope="col">Sol/Skygge</th>
                <th scope="col">Forspiring</th>
                <th scope="col">Udplantning</th>
            </tr>
        </thead>
        <tbody>
        <?php

            while($eachplant = $dbdata->fetch_assoc())
            {
                if(strpos($eachplant['PSowMonthIn'], " "))
                {
                    $thisSowMonthIn = str_replace(" ", "<br>", $eachplant['PSowMonthIn']);
                }
                else
                {
                    $thisSowMonthIn = $eachplant['PSowMonthIn'];
                }
                
                if(strpos($eachplant['PSowMonthOut'], " "))
                {
                    $thisSowMonthOut = str_replace(" ", "<br>", $eachplant['PSowMonthOut']);
                }
                else
                {
                    $thisSowMonthOut = $eachplant['PSowMonthOut'];
                } 

                $shortdesc = substr($eachplant['PDesc'], 0, 500)."... (<a href='plant.php?id={$eachplant['PID']}'>læs mere</a>)";
                echo("<tr>".
                    "<td>{$eachplant['PID']}</td>".
                    "<td><img src='img/{$eachplant['PImage']}' class='w-100'></td>".
                    "<td>{$eachplant['PName']}</td>".
                    "<td>{$eachplant['PType']}</td>".
                    "<td>{$eachplant['PBotName']}</td>".
                    "<td>$shortdesc</td>".
                    "<td>{$eachplant['PHeight']}</td>".
                    "<td>{$eachplant['PLight']}</td>".
                    "<td>". newLine_blanks($eachplant['PSowMonthIn']) ."</td>".
                    "<td>". newLine_blanks($eachplant['PSowMonthOut']) ."</td>".
                "</tr>");
            }

        ?>
        </tbody>
    </table>
</body>
</html>