<?php
    require_once 'include/head.php';

    foreach($_POST as $key => $value) {
        $cleanvalue = trim(htmlspecialchars($value));

        $$key = $cleanvalue;
    }

    $sql = "INSERT INTO recipe (recipName, recipCategory, recipBy, recipDate, recipShortDescr, recipPrepTime, recipPrepTimeUnit, recipCookTime, recipCookTimeUnit, recipTemp, recipTempUnit) VALUES (:name, :category, :created_by, :created_at, :short_description, :prep_time, :prep_time_unit, :cook_time, :cook_time_unit, :temp, :temp_unit)";

    $stmt = $dbcon->prepare($sql);

    $stmt->bindParam(':name', $recipeName, PDO::PARAM_STR);
    $stmt->bindParam(':category', $recipeCategory, PDO::PARAM_STR);
    $stmt->bindParam(':created_by', $recipeBy, PDO::PARAM_STR);
    $stmt->bindParam(':created_at', $recipeDate, PDO::PARAM_STR);
    $stmt->bindParam(':short_description', $recipeDesc, PDO::PARAM_STR);
    $stmt->bindParam(':prep_time', $recipePrepTime, PDO::PARAM_INT);
    $stmt->bindParam(':prep_time_unit', $recipePrepTimeUnit, PDO::PARAM_STR);
    $stmt->bindParam(':cook_time', $recipeCookTime, PDO::PARAM_INT);
    $stmt->bindParam(':cook_time_unit', $recipeCookTimeUnit, PDO::PARAM_STR);
    $stmt->bindParam(':temp', $recipeTemp, PDO::PARAM_STR);
    $stmt->bindParam(':temp_unit', $recTempUnit, PDO::PARAM_STR);

    if($stmt->execute()) {
        $recipeID = $dbcon->lastInsertId();

        // Håndter ingredienser
        $ingredientIndex = 1;
        $insertIngr = true;

        while (isset($_POST["ingrName{$ingredientIndex}"]) && $insertIngr) {
            $ingrName = $_POST["ingrName{$ingredientIndex}"];
            $cleansed_Amount = str_replace(",", ".", $_POST["ingrAmount{$ingredientIndex}"]);
            $ingrAmount = filter_var($cleansed_Amount, FILTER_VALIDATE_FLOAT);

            if($ingrAmount == false) {
               echo "Ugyldig værdi for feltet mængde. Du har indtastet: $cleansed_Amount";
                exit(); 
            }

            $ingrUnit = $_POST["ingrUnit{$ingredientIndex}"];

            $sql = "INSERT INTO ingredients (recipID, ingrName, ingrAmount, ingrUnit) VALUES (:recipe_id, :name, :amount, :unit)";

            $stmt = $dbcon->prepare($sql);

            $stmt->bindParam(':recipe_id', $recipeID, PDO::PARAM_INT);
            $stmt->bindParam(':name', $ingrName, PDO::PARAM_STR);
            $stmt->bindParam(':amount', $ingrAmount, PDO::PARAM_STR);
            $stmt->bindParam(':unit', $ingrUnit, PDO::PARAM_STR);
            
            $insertIngr = $stmt->execute();

            if(!$insertIngr) {
                echo "Der skete en fejl ved oprettelse af ingrediens: {$ingrName}.";
                exit();
            }

            $ingredientIndex++;
        }

    } else {
        echo "Der skete en fejl ved oprettelse af opskriften.";
        exit();
    }

?>
  <body class="min-vh-100 bg-light d-flex flex-column">
    <?php include 'include/header.php'; ?>

    <main class="container my-5 shadow-sm p-4 bg-white rounded flex-grow-1">
        <h2 class="mb-4">Opskrift oprettet</h2>

        <pre>
            <?php 
                $sql = "SELECT * FROM recipe ORDER BY recipID DESC LIMIT 1";

                $stmt = $dbcon->prepare($sql);

                $stmt->execute();

                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                print_r($result);

                $sql = "SELECT * FROM ingredients WHERE recipID = :recipe_id";

                $stmt = $dbcon->prepare($sql);
                $stmt->bindParam(':recipe_id', $recipeID, PDO::PARAM_INT);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                print_r($result);
            ?>
        </pre>
        
    </main>

    <?php require_once 'include/footer.php'; ?>

</body>
</html>