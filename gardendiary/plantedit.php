<?php

    include_once "includes/includes.php";

    $plantID = $_GET['id'];

    $dbconnection = new DbOperations();

    $thisPlant = $dbconnection->getDataByID("planter", $plantID);

    // If there are more than one month in the field PSowMonthIn (there will be a space if this is the case)
    if(strpos($thisPlant['PSowMonthIn'], " "))
    {
        // Replace spaces with <br> and put in variable $thisSowMonthIn to get new line between each month
        $thisSowMonthIn = str_replace(" ", "<br>", $thisPlant['PSowMonthIn']);
    }
    else
    {
        // Otherwise just copy that one month to variable $thisSowMonthIn
        $thisSowMonthIn = $thisPlant['PSowMonthIn'];
    }
    
    // If there are more than one month in the field PSowMonthOut (there will be a space if this is the case)
    if(strpos($thisPlant['PSowMonthOut'], " "))
    {
        // Replace spaces with <br> and put in variable $thisSowMonthOut to get new line between each month
        $thisSowMonthOut = str_replace(" ", "<br>", $thisPlant['PSowMonthOut']);
    }
    else
    {
        // Otherwise just copy that one month to variable $thisSowMonthOut
        $thisSowMonthOut = $thisPlant['PSowMonthOut'];
    }     
?>

<body class="container-xxl">
    <!-- When pressing a button this page loads plant.php with the current plant ID and all data entered in fields is transfered to $_POST -->
    <form method="post" action="<?php echo("plant.php?id={$thisPlant['PID']}"); ?>">
        <div class="card">

            <div class="col card-header">
                <div class="position-absolute w-100 text-black-50 fst-italic">
                    <i class="far fa-edit"></i> Redigerer - klik på det, du ønsker at ændre...
                    <span class="ms-5 w-25">
                        <input type="submit" name="change" value="Gem" class="btn btn-success">
                    </span>
                    <span class="ms-5 w-25">
                        <input type="submit" name="cancel" value="Fortryd" class="btn btn-warning">
                    </span>
                    <span class="ms-5 w-25">
                        <input type="submit" name="delete" value="Slet plante" class="btn btn-danger">
                    </span>
                </div>
                
                <input type="text" name="PName" class="form-control-plaintext card-title display-2" value="<?php echo($thisPlant['PName']); ?>">
                <input type="text" name="PBotName" class="form-control-plaintext card-subtitle display-6" value="<?php echo($thisPlant['PBotName']); ?>">
            </div>

            <section class="row card-body">
                <article class="col-3">
                    <?php
                        echo("<img src='img/{$thisPlant['PImage']}' class='card-img w-100'>");
                    ?>
                </article>
                <article class="col">
                    <div class="row">
                        <div class="col-4">
                            <p class="fw-bold">Type</p>
                        </div>
                        <div class="col">
                            <input type="text" name="PType" class="form-control-plaintext card-subtitle" value="<?php echo($thisPlant['PType']); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="fw-bold">Højde</p>
                        </div>
                        <div class="col">
                            <input type="text" name="PHeight" class="form-control-plaintext card-subtitle" value="<?php echo($thisPlant['PHeight'] . " cm"); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="fw-bold">Såafstand</p>
                        </div>
                        <div class="col">
                            <input type="text" name="PSowDist" class="form-control-plaintext card-subtitle" value="<?php echo($thisPlant['PSowDist'] . " cm"); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="fw-bold">Rækkeafstand</p>
                        </div>
                        <div class="col">
                            <input type="text" name="PRowDist" class="form-control-plaintext card-subtitle" value="<?php echo($thisPlant['PRowDist'] . " cm"); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="fw-bold">Sådybde</p>
                        </div>
                        <div class="col">
                            <input type="text" name="PSowDepth" class="form-control-plaintext card-subtitle" value="<?php echo($thisPlant['PSowDepth'] . " cm"); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="fw-bold">Lysforhold</p>
                        </div>
                        <div class="col">
                            <input type="text" name="PLight" class="form-control-plaintext card-subtitle" value="<?php echo($thisPlant['PLight']); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="fw-bold">Forspiring</p>
                        </div>
                        <div class="col">
                            <input type="text" name="PSowMonthIn" class="form-control-plaintext card-subtitle" value="<?php echo($thisSowMonthIn); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="fw-bold">Udplantning/såning på friland</p>
                        </div>
                        <div class="col">
                            <input type="text" name="PSowMonthOut" class="form-control-plaintext card-subtitle" value="<?php echo($thisSowMonthOut); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="fw-bold">Spiring efter</p>
                        </div>
                        <div class="col">
                            ca. <input type="text" name="PGermDays" class="form-control-plaintext card-subtitle" value="<?php echo($thisPlant['PGermDays'] . " dage"); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="fw-bold">Moden til høst efter</p>
                        </div>
                        <div class="col">
                            ca. <input type="text" name="PMatureDays" class="form-control-plaintext card-subtitle" value="<?php echo($thisPlant['PMatureDays'] . " dage"); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="fw-bold">Beskrivelse</p>
                        </div>
                        <div class="col">
                            <textarea name="PDesc" class="form-control-plaintext card-subtitle"><?php echo($thisPlant['PDesc']); ?></textarea>
                        </div>
                    </div>
                </article>
            </section>
        </div>
    </form>
</body>
</html>