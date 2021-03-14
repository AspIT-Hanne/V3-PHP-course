<?php

    include_once "includes/connection.php";
    include_once "includes/menu.php";
    include_once "includes/head.php";

    $plantID = $_GET['id'];

    $dbdata = $connection->query("SELECT * FROM planter WHERE PID = '$plantID'");

    if($connection->error)
    {
        echo($connection->error);
    }
    else
    {
        $thisplant = $dbdata->fetch_assoc();

        if(strpos($thisplant['PSowMonthIn'], " "))
        {
            $thisSowMonthIn = str_replace(" ", "<br>", $thisplant['PSowMonthIn']);
        }
        else
        {
            $thisSowMonthIn = $thisplant['PSowMonthIn'];
        }
        
        if(strpos($thisplant['PSowMonthOut'], " "))
        {
            $thisSowMonthOut = str_replace(" ", "<br>", $thisplant['PSowMonthOut']);
        }
        else
        {
            $thisSowMonthOut = $thisplant['PSowMonthOut'];
        }     
    }
?>

<body class="container-xxl">
    <form method="post" action="<?php echo($_SESSION['PHP_SELF']); ?>">
        <div class="card">

            <div class="col card-header">
                <div class="position-absolute w-100 text-black-50 fst-italic"><i class="far fa-edit"></i> Redigerer - klik på det, du ønsker at ændre...<span class="ms-5"><a href="plant.php?changed=1&id=<?php echo($thisplant['PID']); ?>" class="text-decoration-none text-success"><i class="far fa-save"></i> Klik for at gemme</a></span><span class="ms-5"><a href="plant.php?changed=0&id=<?php echo($thisplant['PID']); ?>" class="text-decoration-none text-danger"><i class="fas fa-undo"></i> Klik for at fortryde og gå tilbage</a></span></div>
                <input type="text" name="InPName" class="form-control-plaintext card-title display-2" value="<?php echo($thisplant['PName']); ?>">
                <input type="text" name="InPBotName" class="form-control-plaintext card-subtitle display-6" value="<?php echo($thisplant['PBotName']); ?>">
            </div>

            <section class="row card-body">
                <article class="col-3">
                    <?php
                        echo("<img src='img/{$thisplant['PImage']}' class='card-img w-100'>");
                    ?>
                </article>
                <article class="col">
                    <div class="row">
                        <div class="col-4">
                            <p class="fw-bold">Type</p>
                        </div>
                        <div class="col">
                            <input type="text" name="InPType" class="form-control-plaintext card-subtitle" value="<?php echo($thisplant['PType']); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="fw-bold">Højde</p>
                        </div>
                        <div class="col">
                            <input type="text" name="InPHeight" class="form-control-plaintext card-subtitle" value="<?php echo($thisplant['PHeight'] . " cm"); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="fw-bold">Såafstand</p>
                        </div>
                        <div class="col">
                            <input type="text" name="InPSowDist" class="form-control-plaintext card-subtitle" value="<?php echo($thisplant['PSowDist'] . " cm"); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="fw-bold">Rækkeafstand</p>
                        </div>
                        <div class="col">
                            <input type="text" name="InPRowDist" class="form-control-plaintext card-subtitle" value="<?php echo($thisplant['PRowDist'] . " cm"); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="fw-bold">Sådybde</p>
                        </div>
                        <div class="col">
                            <input type="text" name="InPSowDepth" class="form-control-plaintext card-subtitle" value="<?php echo($thisplant['PSowDepth'] . " cm"); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="fw-bold">Lysforhold</p>
                        </div>
                        <div class="col">
                            <input type="text" name="InPLight" class="form-control-plaintext card-subtitle" value="<?php echo($thisplant['PLight']); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="fw-bold">Forspiring</p>
                        </div>
                        <div class="col">
                            <input type="text" name="InPSowMonthIn" class="form-control-plaintext card-subtitle" value="<?php echo($thisSowMonthIn); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="fw-bold">Udplantning/såning på friland</p>
                        </div>
                        <div class="col">
                            <input type="text" name="InPSowMonthOut" class="form-control-plaintext card-subtitle" value="<?php echo($thisSowMonthOut); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="fw-bold">Spiring efter</p>
                        </div>
                        <div class="col">
                            ca. <input type="text" name="InPGermDays" class="form-control-plaintext card-subtitle" value="<?php echo($thisplant['PGermDays'] . " dage"); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="fw-bold">Moden til høst efter</p>
                        </div>
                        <div class="col">
                            ca. <input type="text" name="InPMatureDays" class="form-control-plaintext card-subtitle" value="<?php echo($thisplant['PMatureDays'] . " dage"); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="fw-bold">Beskrivelse</p>
                        </div>
                        <div class="col">
                            <textarea name="InPDesc" class="form-control-plaintext card-subtitle"><?php echo($thisplant['PDesc']); ?></textarea>
                        </div>
                    </div>
                </article>
            </section>
        </div>
    </form>
</body>
</html>