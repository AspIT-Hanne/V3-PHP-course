<?php

    include_once "includes/includes.php";

    $CWPropDate = "";
    $CWSowDate = "";
    $today = date("Y-m-d");

    $dbconnection = new DbOperations();

    $allData = $dbconnection->getAllData("plantekalender");

    $allnotes = $dbconnection->getAllData("kalendernoter");
?>

<body class="container-xxl">
    <header class="row">
        <h1 class="display-2 col-6 mb-5">My plantdiary</h1>
        <a href="newdiaryentry.php" class="col-6 text-end text-black-50"><h4><i class="fas fa-plus"></i> Add new</h4></a>
    </header>
    <div class="accordion  w-100">
        <div class="accordion-button bg-light accordion-button-head">
            <span class='col-2 text-start'>Navn</span>
            <span class='col-1 text-start'>Type</span>
            <span class='col-3 text-start'>Botanisk Navn</span>
            <span class='col-1 text-start'>Klonet</span>
            <span class='col-1 text-start'>Fik rødder</span>
            <span class='col-1 text-start'>Sået</span>
            <span class='col-1 text-start'>Spiret</span>
            <span class='col-1 text-start'>Sået ud</span>
            <span class='col-1 text-start'>Første høst</span>
        </div>
    </div>
        <?php

            $collapseCounter = 1;

            foreach($allData as $eachdiaryentry)
            {  
                $thisPID = $eachdiaryentry['PID'];
                $thisPlantInfo = $dbconnection->getDataByID("planter", $thisPID);

                $show = "";

                if(isset($_GET['cid']) && $eachdiaryentry['CID'] == $_GET['cid'])
                {
                    $show = "show";
                }
                else
                {
                    $show = "";
                }

            
                echo("<div class='accordion w-100' id='accordionExample'>".
                        "<div class='accordion-item'>".
                            "<button class='accordion-button bg-success text-white' type='button' data-bs-toggle='collapse' data-bs-target='#collapse". $collapseCounter ."'>".
                                "<span class='col-2 text-start'>{$thisPlantInfo['PName']}</span>".
                                "<span class='col-1 text-start'>{$thisPlantInfo['PType']}</span>".
                                "<span class='col-3 text-start'>{$thisPlantInfo['PBotName']}</span>".
                                "<span class='col-1 text-start'>{$eachdiaryentry['CWPropDate']}</span>".
                                "<span class='col-1 text-start'>{$eachdiaryentry['CWRootDate']}</span>".
                                "<span class='col-1 text-start'>{$eachdiaryentry['CSowDate']}</span>".
                                "<span class='col-1 text-start'>{$eachdiaryentry['CFirstGermDate']}</span>".
                                "<span class='col-1 text-start'>{$eachdiaryentry['CPlantOutDate']}</span>".
                                "<span class='col-1 text-start'>{$eachdiaryentry['CFirstHarvestDate']}</span>".
                            "</button>".
                        "</div>".
                    "</div>".
                
                    "<div id='collapse". $collapseCounter ."' class='accordion-collapse collapse $show'>".
                        "<div class='accordion-body card'>".
                            "<div class='row card-body'>".
                                "<div class='col-3'>".
                                    "<img src='img/{$thisPlantInfo['PImage']}' class='card-img w-100'>".
                                "</div>".
                                "<div class='col'>".
                                    "<div class='row'>".
                                        "<div class='col-4'>".
                                            "<p class='fw-bold fs-4'>Planteinfo</p>".
                                        "</div>".
                                        "<div class='col-4'>".
                                            "<p class='fw-bold fs-4'>Egen plantedagbog</p>".
                                        "</div>".
                                    "</div>".
                                    "<div class='row'>".
                                        "<div class='col-2'>".
                                            "<p class='fw-bold'>Højde</p>".
                                        "</div>".
                                        "<div class='col-2'>".
                                            "<p>{$thisPlantInfo['PHeight']} cm</p>".
                                        "</div>".
                                        "<div class='col-3'>".
                                            "<p class='fw-bold'>Alle spirer oppe</p>".
                                        "</div>".
                                        "<div class='col-2'>".
                                            "<p>{$eachdiaryentry['CAllGermDate']}</p>".
                                        "</div>".
                                    "</div>".
                                    "<div class='row'>".
                                        "<div class='col-2'>".
                                            "<p class='fw-bold'>Såafstand</p>".
                                        "</div>".
                                        "<div class='col-2'>".
                                            "<p>{$thisPlantInfo['PSowDist']} cm</p>".
                                        "</div>".
                                        "<div class='col-3'>".
                                            "<p class='fw-bold'>Ompottet 1. gang</p>".
                                        "</div>".
                                        "<div class='col-2'>".
                                            "<p>{$eachdiaryentry['CRePot1Date']}</p>".
                                        "</div>".
                                    "</div>".
                                    "<div class='row'>".
                                        "<div class='col-2'>".
                                            "<p class='fw-bold'>Rækkeafstand</p>".
                                        "</div>".
                                        "<div class='col-2'>".
                                            "<p>{$thisPlantInfo['PRowDist']} cm</p>".
                                        "</div>".
                                        "<div class='col-3'>".
                                            "<p class='fw-bold'>Ompottet 2. gang</p>".
                                        "</div>".
                                        "<div class='col-2'>".
                                            "<p>{$eachdiaryentry['CRePot2Date']}</p>".
                                        "</div>".
                                    "</div>".
                                    "<div class='row'>".
                                        "<div class='col-2'>".
                                            "<p class='fw-bold'>Sådybde</p>".
                                        "</div>".
                                        "<div class='col-2'>".
                                            "<p>{$thisPlantInfo['PSowDepth']} cm</p>".
                                        "</div>".
                                        "<div class='col-3'>".
                                            "<p class='fw-bold'>Ompottet 3. gang</p>".
                                        "</div>".
                                        "<div class='col-2'>".
                                            "<p>{$eachdiaryentry['CRePot3Date']}</p>".
                                        "</div>".
                                    "</div>".
                                    "<div class='row'>".
                                        "<div class='col-2'>".
                                            "<p class='fw-bold'>Lysforhold</p>".
                                        "</div>".
                                        "<div class='col-2'>".
                                            "<p>{$thisPlantInfo['PLight']}</p>".
                                        "</div>".
                                        "<div class='col-3'>".
                                                "<p class='fw-bold'>Tilknyttet espalier</p>".
                                            "</div>".
                                        "<div class='col-2'>".
                                            "<p>{$eachdiaryentry['CTrellisDate']}</p>".
                                        "</div>".
                                    "</div>".
                                    "<div class='row'>".
                                        "<div class='col-4'>".
                                        "</div>".
                                        "<div class='col-3'>".
                                                "<p class='fw-bold'>Sidste høst</p>".
                                        "</div>".
                                        "<div class='col-2'>".
                                            "<p>{$eachdiaryentry['CLastHarvestDate']}</p>".
                                        "</div>".
                                    "</div>".
                                    "<div class='row'>".
                                        "<div class='col-4'>".
                                        "</div>".
                                        "<div class='col-3'>".
                                                "<p class='fw-bold'>Egne noter</p>".
                                        "</div>");
                                    if(isset($_GET['action']) && $_GET['action'] == 'addnewnote')
                                    {
                                        echo("<div class='col-5 text-end '>".
                                                
                                                "</div>".
                                            "</div>");
                                    }
                                    else
                                    {
                                        echo("<div class='col-5 text-end '>".
                                                "<a href='{$_SERVER['PHP_SELF']}?action=addnewnote&cid={$eachdiaryentry['CID']}' class='text-black-50'><i class='fas fa-plus'></i> Add new</a>".
                                                "</div>".
                                            "</div>");
                                    }
                                    if(isset($_GET['action']) && $_GET['action'] == 'addnewnote')
                                    {
                                    echo("<form method='POST' action='{$_SERVER['PHP_SELF']}?action=addednewnote&cid={$eachdiaryentry['CID']}''>".
                                            "<div class='row'>".    
                                                "<div class='col-4'>".
                                                "</div>".
                                                "<div class='col-3'>".
                                                    "<input type='date' name='InNDate' value='{$today}'>".
                                                "</div>".
                                                "<div class='col-5'>".
                                                    "<textarea name='InNNote' class='form-control' placeholder='Indtast note'></textarea>".
                                                "</div>".
                                            "</div>".
                                            "<div class='row'>".    
                                                "<div class='col-4'>".
                                                "</div>".
                                                "<div class='col-3'>".
                                                "</div>".
                                                "<div class='col-5'>".
                                                    "<input type='submit' name='InNoteSubmit' value='Gem' class='btn btn-primary'>".
                                                    "<a href='{$_SERVER['PHP_SELF']}'><button name='InNoteCancel' value='Annuller' class='btn btn-light'>Annuller</button></a>".
                                                "</div>".
                                            "</div>".
                                        "</form>");
                                    }
                                    for($i = 0; $i < count($allnotes); $i++)
                                    {
                                        if($allnotes[$i]['CID'] == $eachdiaryentry['CID']){
                                            echo(
                                                "<div class='row'>".
                                                    "<div class='col-4'>".
                                                    "</div>".
                                                    "<div class='col-3'>".
                                                        "<p>{$allnotes[$i]['NDate']}</p>".     
                                                    "</div>".
                                                    "<div class='col-5'>".
                                                        "<p>{$allnotes[$i]['NNote']}</p>".   
                                                    "</div>".
                                                "</div>"
                                            );
                                        }
                                    }
                            echo("</div>".
                            "</div>".
                        "</div>".
                    "</div>");

                $collapseCounter++;
                
            }

        ?>

    <?php

    ?>
    
</body>
</html>