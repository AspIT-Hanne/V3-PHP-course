<?php

    include_once "includes/includes.php";

    function setValue($field)
    {
        if(empty($_POST[$field]))
        {
            return "NULL";
        }
        else
        {
            return $_POST[$field];
        }
    }

    $CWPropDate = "";
    $CWSowDate = "";
    $today = date("Y-m-d");

    if(isset($_GET['action']))
    {
        if($_GET['action'] == "newentry")
        {
            $postKeys = array_keys($_POST);

            foreach($postKeys as $thisfield)
            {
                $$thisfield = '"'.setValue($thisfield).'"';
            }
            
            if(isset($_POST['InProp']))
            {
                $InProp = 1;
                if(empty($_POST['InWPropDate']))
                {
                    $InWPropDate = "'{$today}'";
                }
                else
                {
                    $InWPropDate = "'{$_POST['InWPropDate']}'";
                }   
            }
            else
            {
                $InProp = 0;
                $InWPropDate = "NULL";

                if(!empty($_POST['InSowDate']))
                {
                    $InSowDate = "'{$_POST['InSowDate']}'";
                }
                elseif(!isset($_POST['InProp']))
                {
                    $InSowDate = "'{$today}'";
                }
            }

            if($connection->query( "INSERT INTO plantekalender (PID, CWPropagated, CWPropDate, CWRootDate, CSowDate, CFirstGermDate, CAllGermDate, CRePot1Date, CRePot2Date, CRePot3Date, CPlantOutDate, CTrellisDate, CFirstHarvestDate, CLastHarvestDate) VALUES ($inPlant, $InProp, $InWPropDate, $InWRootDate, $InSowDate, $InFirstGermDate, $InAllGermDate, $InRePot1Date, $InRePot2Date, $InRePot3Date, $InPlantOut, $InTrellis, $InFirstHarvest, $InLastHarvest)"))
            {

            }
            else
            {
                echo("Insert did not succeed!");
            }
        }
    }

    $sownplants = array();

    // Get all calendar entries that are not water propagations
    $dbdata1 = $connection->query("SELECT * FROM plantekalender WHERE CWPropDate IS NULL");
    // Get all calendar entries that are water propagations
    $dbdata2 = $connection->query("SELECT * FROM plantekalender WHERE CWPropDate IS NOT NULL");

    $noterdbdata = $connection->query("SELECT * FROM kalendernoter ORDER BY NDate DESC");

    // Put the two SQL-fetches into their own associative array
    while($currententry = $dbdata1->fetch_assoc())
    {   
        $sownplants[] = $currententry;
    }

    while($currententry2 = $dbdata2->fetch_assoc())
    {
        $propplants[] = $currententry2;
    }

    // Put the notes in their own associative array
    while($currentnote = $noterdbdata->fetch_assoc())
    {
        $allnotes[] = $currentnote;
    }

    // If something went wrong with the connection
    if($connection->error)
    {
        echo($connection->error);
    }

    // For all non-propagated plants move their sow date to propagation date to be able to sort all entries
    for($i = 0; $i < count($sownplants); $i++)
    {
        $sownplants[$i]['CWPropDate'] = $sownplants[$i]['CSowDate'];
    }

    // Merge the two associative arrays into one array
    $allplants = array_merge($sownplants, $propplants);

    // Sort all entries by propagation date
    usort($allplants, function ($item1, $item2) {
        return $item2['CWPropDate'] <=> $item1['CWPropDate'];
    });

    // Remove propagation date for those plants that aren't propagated but are sown
    for($i = 0; $i < count($allplants); $i++)
    {
        if(!$allplants[$i]['CWPropagated'])
        {
            $allplants[$i]['CWPropDate'] = NULL;
        }
    }
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

            foreach($allplants as $eachdiaryentry)
            {  
                $thisPID = $eachdiaryentry['PID'];
                $plantdbdata = $connection->query("SELECT * FROM planter WHERE PID = '$thisPID'");

                if($connection->error)
                {
                    echo($connection->error);
                }
                else
                {
                    $thisPlantInfo = $plantdbdata->fetch_assoc();
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
                
                    "<div id='collapse". $collapseCounter ."' class='accordion-collapse collapse'>".
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
                                        "</div>".
                                        "<div class='col-5 text-end '>".
                                            "<a href='#' class='text-black-50'><i class='fas fa-plus'></i> Add new</a>".
                                        "</div>".
                                    "</div>");
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