<?php
    require_once 'include/head.php';

?>
  <body class="min-vh-100 bg-light d-flex flex-column">
    <?php include 'include/header.php'; ?>

    <main class="container my-5 shadow-sm p-4 bg-white rounded flex-grow-1">
        <h2 class="mb-4">Ny opskrift</h2>

        <pre>
            <?php print_r($_POST); ?>
        </pre>

        <?php
        $temp = '';
            foreach ($_POST as $key => $value) {
                if($value !== '') {
                    if($key !== $temp.'Unit') {
                        if(str_contains($key, 'Unit')) {
                            echo " " . htmlspecialchars($value);
                        }
                        else {
                            echo "<br><strong>" . htmlspecialchars($key) . ":</strong> " . htmlspecialchars($value);
                        }
                    }
                } else {
                    $temp = $key;
                }
                
            }
            ?>
    </main>

    <?php require_once 'include/footer.php'; ?>

</body>
</html>