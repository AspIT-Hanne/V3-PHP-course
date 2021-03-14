<?php

    include_once "includes/includes.php";

    $allPlants = array();

    $plantsdbresult = $connection->query("SELECT PID, PName, PBotName FROM planter");

    while($currentplant = $plantsdbresult->fetch_assoc())
    {
        $allPlants[] = $currentplant;
    }
    
?>

<body class="container-xxl">
    <h1 class="display-2 mb-5">Ny plante sået/stikling sat i vand</h1>
    <form method="post" action="diary.php?action=newentry" class="d-grid w-50">
        <div class="row mb-3">
            <label for="InPlant" class="form-label col-2">Plante</label>
            <select class="form-select col" name="inPlant">

                <?php
                    for($i = 0; $i < count($allPlants); $i++)
                    echo(
                        "<option value='{$allPlants[$i]['PID']}'>".
                        "{$allPlants[$i]['PName']} | {$allPlants[$i]['PBotName']}".
                        "</option>"
                    );
                ?>
            </select>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="InProp" type="checkbox">
            <label for="InProp" class="form-label">Stikling sat i vand?</label>
        </div>
        
        <div class="row">
            <div class="col">
                <p>
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#moreInfo" role="button">
                        Indtast flere oplysninger
                    </a>
                </p>
                <div class="collapse" id="moreInfo">
                <div class="row mb-3">
                        <label for="InWPropDate" class="form-label col-4">Fik rødder i vand d.</label>

                        <input type="date" name="InWPropDate" class="form-control col">
                    </div>
                    <div class="row mb-3">
                        <label for="InWRootDate" class="form-label col-4">Fik rødder i vand d.</label>

                        <input type="date" name="InWRootDate" class="form-control col">
                    </div>
                    <div class="row mb-3">
                        <label for="InSowDate" class="form-label col-4">Sået d.</label>

                        <input type="date" name="InSowDate" class="form-control col">
                    </div>
                    <div class="row mb-3">
                        <label for="InFirstGermDate" class="form-label col-4">Første spire synlig d.</label>

                        <input type="date" name="InFirstGermDate" class="form-control col">
                    </div>
                    <div class="row mb-3">
                        <label for="InAllGermDate" class="form-label col-4">Alle spirer oppe d.</label>

                        <input type="date" name="InAllGermDate" class="form-control col">
                    </div>
                    <div class="row mb-3">
                        <label for="InRePot1Date" class="form-label col-4">Ompottet første gang d.</label>

                        <input type="date" name="InRePot1Date" class="form-control col">
                    </div>
                    <div class="row mb-3">
                        <label for="InRePot2Date" class="form-label col-4">Ompottet anden gang d.</label>

                        <input type="date" name="InRePot2Date" class="form-control col">
                    </div>
                    <div class="row mb-3">
                        <label for="InRePot3Date" class="form-label col-4">Ompottet tredje gang d.</label>

                        <input type="date" name="InRePot3Date" class="form-control col">
                    </div>
                    <div class="row mb-3">
                        <label for="InPlantOut" class="form-label col-4">Udplantet d.</label>

                        <input type="date" name="InPlantOut" class="form-control col">
                    </div>
                    <div class="row mb-3">
                        <label for="InTrellis" class="form-label col-4">Tilknyttet espalier d.</label>

                        <input type="date" name="InTrellis" class="form-control col">
                    </div>
                    <div class="row mb-3">
                        <label for="InFirstHarvest" class="form-label col-4">Første høst d.</label>

                        <input type="date" name="InFirstHarvest" class="form-control col">
                    </div>
                    <div class="row mb-3">
                        <label for="InLastHarvest" class="form-label col-4">Sidste høst d.</label>

                        <input type="date" name="InLastHarvest" class="form-control col">
                    </div>
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-6"></div>
            <div class="col-6 text-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

</body>
</html>