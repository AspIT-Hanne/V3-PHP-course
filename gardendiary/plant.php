<?php

    include_once "includes/includes.php";

    $plantID = $_GET['id'];

    if(!isset($_GET['changed']))
    {
        $_GET['changed'] = 0;
    }

    $dbdata = $connection->query("SELECT * FROM planter WHERE PID = '$plantID'");

    if($connection->error)
    {
        echo($connection->error);
    }
    else
    {
        $thisplant = $dbdata->fetch_assoc();
    }
?>

<body class="container-xxl">
    <div class="card">

    <div class="card-header">
        <a href="plantedit.php?id=<?php echo($thisplant['PID']); ?>">
            <div class="position-absolute w-100 text-black-50 fst-italic">
            <i class="far fa-edit"></i>
             Rediger</div>
        </a>
        
        <?php
            if($_GET['changed'] == 1)
            {
                ?>
                <div class="alert alert-success alert-dismissible fade show position-absolute w-50" role="alert">
                    Ændringerne er opdateret
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php
            }
        ?>
        
        <h1 class="card-title display-2 form-control-plaintext"><?php echo($thisplant['PName']); ?></h1>
        
        <h2 class="card-subtitle display-6 form-control-plaintext"><?php echo($thisplant['PBotName']); ?></h2>

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
                    <p><?php echo($thisplant['PType']); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="fw-bold">Højde</p>
                </div>
                <div class="col">
                    <p><?php echo($thisplant['PHeight'] . " cm"); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="fw-bold">Såafstand</p>
                </div>
                <div class="col">
                    <p><?php echo($thisplant['PSowDist'] . " cm"); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="fw-bold">Rækkeafstand</p>
                </div>
                <div class="col">
                    <p><?php echo($thisplant['PRowDist'] . " cm"); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="fw-bold">Sådybde</p>
                </div>
                <div class="col">
                    <p><?php echo($thisplant['PSowDepth'] . " cm"); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="fw-bold">Lysforhold</p>
                </div>
                <div class="col">
                    <p><?php echo($thisplant['PLight']); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="fw-bold">Forspiring</p>
                </div>
                <div class="col">
                    <p><?php echo(newLine_blanks($thisplant['PSowMonthIn'])); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="fw-bold">Udplantning/såning på friland</p>
                </div>
                <div class="col">
                    <p><?php echo(newLine_blanks($thisplant['PSowMonthOut'])); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="fw-bold">Spiring efter</p>
                </div>
                <div class="col">
                    <p>ca. <?php echo($thisplant['PGermDays'] . " dage"); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="fw-bold">Moden til høst efter</p>
                </div>
                <div class="col">
                    <p>ca. <?php echo($thisplant['PMatureDays'] . " dage"); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="fw-bold">Beskrivelse</p>
                </div>
                <div class="col">
                    <p><?php echo($thisplant['PDesc']); ?></p>
                </div>
            </div>
        </article>
    </section>
    </div>
</body>
</html>