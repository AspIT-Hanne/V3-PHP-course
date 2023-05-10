<?php

    include "includes/includer.php";

    $mailErr = $pwErr = $repeatPwErr = "";
?>

<body class="d-flex flex-column vh-100">

    <?php include "includes/nav.php"; ?>
    <main class="container vh-100">
        <h1 class="my-5 display-1">Log ind</h1>
        <section>
            <article>
                <form method="post" class="container">
                    <div class="row my-4">
                        <label for="brugerMail" class="col-2">Email: </label>
                        <input type="text" name="brugerMail" class="col-6">
                    </div>
                    <div class="row my-4">
                        <label for="brugerPassword" class="col-2">Adgangskode:</label>
                        <input type="text" name="brugerPassword" class="col-6">
                    </div>
                    <div class="row my-4">
                        <div class="col-2"></div>
                        <input type="submit" name="loginSubmit" value="Log ind" class="col-2 btn btn-success">
                    </div>
                </form>
            </article>
        </section>
    </main>

    <?php include "includes/footer.php"; ?>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>