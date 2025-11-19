<?php
    require_once 'include/head.php';

    if(isset($_GET['recipID'])) {
        $ID = $_GET['recipID'];
    }

    $sql = "SELECT * FROM recipe WHERE recipID = :recipID";
    $recstmt = $dbcon->prepare($sql);
    $recstmt->bindParam(':recipID', $ID);
    $recstmt->execute();

    if($recstmt->rowCount() != 0) {
        $recipe = $recstmt->fetch();

        $sql = "SELECT * FROM ingredients WHERE recipID = :recipID";
        $ingrstmt = $dbcon->prepare($sql);
        $ingrstmt->bindParam(':recipID', $ID);
        $ingrstmt->execute();
        if($ingrstmt->rowCount() != 0) {
            $ingredients = $ingrstmt->fetchAll();
        }
        else {
            $ingredients = [];
        }

        $sql = "SELECT * FROM instructions WHERE recipID = :recipID";
        $instrstmt = $dbcon->prepare($sql);
        $instrstmt->bindParam(':recipID', $ID);
        $instrstmt->execute();
        if($instrstmt->rowCount() != 0) {
            $instructions = $instrstmt->fetchAll();
        }
        else {
            $instructions = [];
        }
    }
    else {
        echo "Opskriften blev ikke fundet.";
        exit();
    }
   

    

?>
  <body class="min-vh-100 bg-light d-flex flex-column">
    <?php include 'include/header.php'; ?>

    <main class="container my-5 shadow-sm p-4 bg-white rounded flex-grow-1">
        <h2 class="mb-4"><?php echo htmlspecialchars($recipe['recipName']); ?></h2>

        <section class="row">
            <article class="col-md-8 p-0 px-md-3 mb-3 mb-md-0">
                <img src="img/<?php echo htmlspecialchars($recipe['recipImg']); ?>" class="img-fluid rounded" alt="<?php echo htmlspecialchars($recipe['recipName']); ?>">
            </article>
            <article class="col-md-4 bg-warning-subtle p-0 p-md-3 rounded">
                <?php if($recipe['recipPrepTime'] != '') { ?>    
                <div class="row m-1 m-md-0 mt-4 mt-md-4">
                    <div class="col-5 mb-3">
                        <h5>Forberedelsestid</h5>
                    </div>
                    <div class="col-7 mb-3">
                        <p><?php echo htmlspecialchars($recipe['recipPrepTime']) . ' ' . htmlspecialchars($recipe['recipPrepTimeUnit']); ?></p>
                    </div>
                </div>
                <?php } ?>
                 <?php if($recipe['recipCookTime'] != '') { ?>
                <div class="row m-1 m-md-0">
                    <div class="col-5 mb-3">
                        <h5>Tilberedningstid</h5>
                    </div>
                    <div class="col-7 mb-3">
                        <p><?php echo htmlspecialchars($recipe['recipCookTime']) . ' ' . htmlspecialchars($recipe['recipCookTimeUnit']); ?></p>
                    </div>
                </div>
                <?php } ?>
                <?php if($recipe['recipTemp'] != '') { ?>
                <div class="row m-1 m-md-0">
                    <div class="col-5 mb-3">
                        <h5>Temperatur</h5>
                    </div>
                    <div class="col-7 mb-3">
                        <p><?php echo htmlspecialchars($recipe['recipTemp']) . ' ' . htmlspecialchars($recipe['recipTempUnit']); ?></p>
                    </div>
                </div>
                <?php } ?>
                <?php if($recipe['recipAmount'] != '') { ?>
                <div class="row m-1 m-md-0">
                    <div class="col-5 mb-3">
                        <h5>Antal</h5>
                    </div>
                    <div class="col-7 mb-3">
                        <p><span id="recipeAmount"><?php echo htmlspecialchars($recipe['recipAmount']) . '</span> ' . htmlspecialchars($recipe['recipAmountUnit']); ?></p>
                    </div>
                </div>
                <?php } ?>
            </article>
        </section>
        <section class="row">
            <article>
                <h3 class="mt-5 border-bottom pb-3">Beskrivelse</h3>
                <p class="my-4">
                   <?php echo htmlspecialchars($recipe['recipShortDescr']); ?>
                </p>
            </article>
        </section>
        <section class="row">
            <article class="ingredients">
                <h3 class="mt-5 border-bottom pb-3">Ingredienser til <input type="number" class="amountWidth" name="currentAmount" value="<?php echo htmlspecialchars($recipe['recipAmount']); ?>"<?php echo '> ' . htmlspecialchars($recipe['recipAmountUnit']); ?></h3>
                <ul class="my-4">
                    <?php for($i = 0; $i < $ingrstmt->rowCount(); $i++) { ?>
                    <li class="my-2"><input type="number" readonly class="form-control-plaintext d-inline amountWidth" name="recipeAmount<?php echo $i; ?>" value="<?php echo htmlspecialchars($ingredients[$i]['ingrAmount']) . '"> ' . htmlspecialchars($ingredients[$i]['ingrUnit']) . ' ' . htmlspecialchars($ingredients[$i]['ingrName']); ?>  </li>
                    <?php } ?>
                </ul>
            </article>
        </section>
        <section class="row">
            <article class="instructions">
                <h3 class="mt-5 border-bottom pb-3">Fremgangsmåde</h3>
                <ol class="my-4">
                    <?php for($i = 0; $i < $instrstmt->rowCount(); $i++) { ?>
                    <li class="my-2"><?php echo htmlspecialchars($instructions[$i]['instDescription']); ?></li>

                    <?php } ?>
                </ol>
            </article>
        </section>

    </main>

    <script src="adjustIngredients.js"></script>
    <?php require_once 'include/footer.php'; ?>

</body>
</html>