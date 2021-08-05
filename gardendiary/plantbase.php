<?php

    include_once "includes/includes.php";

    $dbconnection = new DbOperations();

    $allData = $dbconnection->getAllData("planter");
?>

<body class="container-xxl">
    <?php
        if(isset($_GET['delete']))
            {
                if($_GET['delete'] == "success")
                {
                ?>
                    <div class="alert alert-success alert-dismissible fade show position-absolute w-50" role="alert">
                        Planten blev slettet!
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php
                }
                else
                {?>
                    <div class="alert alert-danger alert-dismissible fade show position-absolute w-50" role="alert">
                        Noget gik galt. Planten er ikke slettet. Prøv igen eller kontakt en administrator!
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php
                }
            }
        ?>
    <header class="row">
        <h1 class="display-2 col-6 mb-5">Plantbase</h1>
        <a href="newplant.php" class="col-6 text-end text-black-50"><h4><i class="fas fa-plus"></i> Add new</h4></a>
    </header>

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

            foreach ($allData as $eachplant)
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