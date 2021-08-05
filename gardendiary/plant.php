<?php

    include_once "includes/includes.php";

    // Create new databaseconnection object
    $dbconnection = new DbOperations();

    // Get plantID from URL
    $plantID = $_GET['id'];

    // Retrieve information from database for this particular plant based on it's ID
    $thisPlant = $dbconnection->getDataByID("planter", $plantID);

    // Create/empty alertmessage variable
    $alertMsg = "";

    // If page is loaded and an alertmessage was saved in $_SESSION variable copy this message to alertmessage variable
    if(isset($_SESSION['alertMsg']))
    {
        $alertMsg = $_SESSION['alertMsg'];
    }

    // If page was loaded because user pressed "save" button to save changes to plant
    if(isset($_POST['change']))
    {
        // Remove all button-related data from $_POST variable because $_POST is used to insert data into the table and "change", "cancel" and "delete" are not fields in the table
        unset($_POST['change']);
        unset($_POST['cancel']);
        unset($_POST['delete']);

        // If update of data for this particular plant with the data entered in the form fields is a success
        if($dbconnection->updateData("planter", $plantID, $_POST))
        {
            // Set message for alertbox
            $_SESSION['alertMsg'] = "Ændringerne er gennemført!";
            // Reload plant.php page with ID of current plant (to make sure the newest changed data is displayed). Change-argument is used to decide type of alert-message
            header("location: plant.php?id={$plantID}&change=success");
        }
        else
        {
            // Set message for alertbox
            $_SESSION['alertMsg'] = "Noget gik galt, data er ikke opdateret. Prøv igen eller kontakt en administrator!";
            // Reload plant.php page with ID of current plant (to make sure the newest changed data is displayed). Change-argument is used to decide type of alert-message
            header("location: plant.php?id={$plantID}&change=failure");
        }
    }

    // If user pressed the delete button
    if(isset($_POST['delete']))
    {
        // If delete action on current plant is successful
        if($dbconnection->deleteData("planter", $plantID))
        {
            // Redirect to frontpage of plantbase with the argument delete success
            header("location: plantbase.php?delete=success");
        }
        else
        {
            // Redirect to frontpage of plantbase with the argument delete failure
            header("location: plantbase.php?delete=failure");
        }
    }
?>

<body class="container-xxl">
    <div class="card">

    <div class="card-header">
        <a href="plantedit.php?id=<?php echo($thisPlant['PID']); ?>">
            <div class="position-absolute w-100 text-black-50 fst-italic">
            <i class="far fa-edit"></i>
             Rediger</div>
        </a>
        
        <?php
            // If this page has been loaded because of a button push (either to create a new plant or change/update data on an existing plant)
            if(isset($_GET['change']))
            {
                // If the page was loaded with change=success in the URL
                if($_GET['change'] == "success")
                {
                    // Create success alertbox with alertmessage that has been copied from $_SESSION['alertMsg']
                ?>
                    <div class="alert alert-success alert-dismissible fade show position-absolute w-50" role="alert">
                        <?= $alertMsg; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
            <?php
                }
                else
                {
                    // Create failure/danger alertbox with alertmessage that has been copied from $_SESSION['alertMsg']
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show position-absolute w-50" role="alert">
                        <?= $alertMsg; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php
                }
            }
        ?>
        
        <h1 class="card-title display-2 form-control-plaintext"><?php echo($thisPlant['PName']); ?></h1>
        
        <h2 class="card-subtitle display-6 form-control-plaintext"><?php echo($thisPlant['PBotName']); ?></h2>

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
                    <p><?php echo($thisPlant['PType']); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="fw-bold">Højde</p>
                </div>
                <div class="col">
                    <p><?php echo($thisPlant['PHeight'] . " cm"); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="fw-bold">Såafstand</p>
                </div>
                <div class="col">
                    <p><?php echo($thisPlant['PSowDist'] . " cm"); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="fw-bold">Rækkeafstand</p>
                </div>
                <div class="col">
                    <p><?php echo($thisPlant['PRowDist'] . " cm"); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="fw-bold">Sådybde</p>
                </div>
                <div class="col">
                    <p><?php echo($thisPlant['PSowDepth'] . " cm"); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="fw-bold">Lysforhold</p>
                </div>
                <div class="col">
                    <p><?php echo($thisPlant['PLight']); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="fw-bold">Forspiring</p>
                </div>
                <div class="col">
                    <p><?php echo(newLine_blanks($thisPlant['PSowMonthIn'])); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="fw-bold">Udplantning/såning på friland</p>
                </div>
                <div class="col">
                    <p><?php echo(newLine_blanks($thisPlant['PSowMonthOut'])); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="fw-bold">Spiring efter</p>
                </div>
                <div class="col">
                    <p>ca. <?php echo($thisPlant['PGermDays'] . " dage"); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="fw-bold">Moden til høst efter</p>
                </div>
                <div class="col">
                    <p>ca. <?php echo($thisPlant['PMatureDays'] . " dage"); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="fw-bold">Beskrivelse</p>
                </div>
                <div class="col">
                    <p><?php echo($thisPlant['PDesc']); ?></p>
                </div>
            </div>
        </article>
    </section>
    </div>
</body>
</html>