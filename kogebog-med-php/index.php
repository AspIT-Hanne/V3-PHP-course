<?php
    require_once 'include/head.php';

    $sql = "SELECT * FROM recipe";

    $stmt = $dbcon->prepare($sql);
    
    $stmt->execute();
    
    $result = $stmt->fetchAll();

    

?>
  <body class="min-vh-100 bg-light d-flex flex-column">
    <!-- Body er lavet med minimum højde på 100 viewport height, og som lodret flexbox, så main-området kan udvides til at fylde hele højden -->
    <?php include 'include/header.php'; ?>
    
    <main class="container my-5 flex-grow-1">
        <!-- Main indholdet er lavet som en bootstrap container, der har en margin i top og bund på 5 og en flex-grow på 1, så den kan udvide sig til at fylde hele højden, hvis siden i sig selv ikke fylder hele højden (som fx login.php) -->
        <h2 class="mb-4">Nyeste opskrifter</h2>
        <?php
        for($i = 0; $i < $stmt->rowCount(); $i++) {
            
            if ( $i % 3 == 0) {
                echo "<section class='row g-4 mb-4'>";
            }
            ?>

                <article class="col-lg-4">
                    <a href="opskrift.php?recipID=<?php echo htmlspecialchars($result[$i]['recipID']); ?>" class="card h-100">
                        <div class="card-header bg-<?=$background;?>-subtle">
                            <h5 class="card-title"><?php echo htmlspecialchars($result[$i]['recipName']); ?></h5>
                        </div>
                        <div class="card-body">
                            <img src="img/<?php echo htmlspecialchars($result[$i]['recipImg']); ?>" class="card-img" alt="<?php echo htmlspecialchars($result[$i]['recipName']); ?>">
                            <p class="card-text mt-3">
                                <?php echo htmlspecialchars($result[$i]['recipShortDescr']); ?>
                            </p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <!-- Kategorien er oprettet som list-group for at få det opdelt med ramme øverst og nederst -->
                            <li class="list-group-item">Kategori: <?php echo htmlspecialchars($result[$i]['recipCategory']); ?></li>
                        </ul>
                        <div class="card-footer bg-<?=$background;?>-subtle fst-italic">
                            <p>Oprettet d. <?php echo htmlspecialchars($result[$i]['recipDate']); ?> af <?php echo htmlspecialchars($result[$i]['recipBy']); ?></p>
                        </div>
                    </a>
                </article>

            <?php   
            if ( ($i + 1) % 3 == 0) {
                echo "</section>";
            }
        }
        
        ?>
    </main>

    <?php require_once 'include/footer.php'; ?>
  </body>
</html>