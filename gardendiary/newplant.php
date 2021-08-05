<?php

    include_once "includes/includes.php";

    // Create new databaseconnection object
    $dbconnection = new DbOperations();

    if(isset($_SESSION['alertMsg']))
    {
        $alertMsg = $_SESSION['alertMsg'];
    }

    if(isset($_POST['submit']))
    {
        if($_POST['submit'] == "Gem")
        {
            // Remove submit field from $_POST variable because $_POST is used to insert data into the table and "submit" is not a field in the table
            unset($_POST['submit']);
            
            // If creation of new plant with the data from $_POST succeeds
            if($dbconnection->insertData("planter", $_POST))
            {
                // Get the newest plant-ID (plant just created) to show that page when redirected
                $plantID = $dbconnection->getNewestID("planter");
                // Set message for alertbox
                $_SESSION['alertMsg'] = "Planten er oprettet!";
                // Redirect to plant.php page with ID of the newest plant. Change-argument is used to decide type of alert-message
                header("location: plant.php?id={$plantID}&change=success");
            }
            else
            {
                // Get the newest plant-ID (the last plant created) to show that page when redirected
                $plantID = $dbconnection->getNewestID("planter");
                // Set message for alertbox
                $_SESSION['alertMsg'] = "Noget gik galt, data er ikke opdateret. Prøv igen eller kontakt en administrator!";
                // Redirect to plant.php page with ID of the newest plant. Change-argument is used to decide type of alert-message
                header("location: plant.php?id={$plantID}&change=failure");
            }
        }
    }
    
?>

<body class="container-xxl">

<form method="post" action="<?php echo($_SERVER['PHP_SELF']); ?>">
        <div class="card">

            <div class="col card-header">
                <label for="InPName" class="form-form-label mb-3">Navn</label>
                <input type="text" name="PName" class="form-control">
                <label for="InPName" class="form-form-label mb-3">Botanisk navn</label>
                <input type="text" name="PBotName" class="form-control mb-3">
            </div>

            <section class="row card-body">
                <article class="col">
                    <div class="row mb-3">
                        <div class="col-4">
                            <p class="fw-bold">Type</p>
                        </div>
                        <div class="col">
                            <input type="text" name="PType" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <p class="fw-bold">Højde</p>
                        </div>
                        <div class="col">
                            <input type="text" name="PHeight" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <p class="fw-bold">Såafstand</p>
                        </div>
                        <div class="col">
                            <input type="text" name="PSowDist" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <p class="fw-bold">Rækkeafstand</p>
                        </div>
                        <div class="col">
                            <input type="text" name="PRowDist" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <p class="fw-bold">Sådybde</p>
                        </div>
                        <div class="col">
                            <input type="text" name="PSowDepth" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <p class="fw-bold">Lysforhold</p>
                        </div>
                        <div class="col">
                            <input type="text" name="PLight" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <p class="fw-bold">Forspiring</p>
                        </div>
                        <div class="col">
                            <input type="text" name="PSowMonthIn" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <p class="fw-bold">Udplantning/såning på friland</p>
                        </div>
                        <div class="col">
                            <input type="text" name="PSowMonthOut" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <p class="fw-bold">Spiring efter</p>
                        </div>
                        <div class="col row">
                            <p class="col-1">ca. </p>
                            <div class="col"><input type="text" name="PGermDays" class="form-control"></div>
                            <p class="col-2">dage</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <p class="fw-bold">Moden til høst efter</p>
                        </div>
                        <div class="col row">
                            <p class="col-1">ca. </p>
                            <div class="col"><input type="text" name="PMatureDays" class="form-control"></div>
                            <p class="col-2">dage</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <p class="fw-bold">Beskrivelse</p>
                        </div>
                        <div class="col">
                            <textarea name="PDesc" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                        </div>
                        <div class="col">
                            <input type="submit" class="btn btn-primary" name="submit" value="Gem">
                        </div>
                    </div>
                </article>
            </section>
        </div>
    </form>
</body>
</html>