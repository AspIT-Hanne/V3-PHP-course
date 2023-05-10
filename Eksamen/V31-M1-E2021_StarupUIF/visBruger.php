<?php

    include "includes/includer.php";

    $mailErr = $pwErr = $repeatPwErr = "";
?>

<body>

    <?php include "includes/nav.php"; ?>
    <main class="container">
        <h1 class="my-5 display-1">Brugeradministration</h1>
        <section>
            <article>
                <form method="post" class="container">
                    <div class="row my-4">
                        <label for="brugerMail" class="col-2">Email: </label>
                        <input type="email" name="brugerMail" required placeholder="Indtast mail"  class="col-6">
                        <div class="col"><input type="submit" value="Hent bruger" name="hentBruger" class="col btn btn-success"></div>
                    </div>
                    <div class="row my-4">
                        <label for="brugerPassword" class="col-2">Adgangskode:</label>
                        <input type="password" name="brugerPassword" required readonly placeholder="Indtast adgangskode" class="col-6">
                        <div class="col">* <?php echo $pwErr;?></div>
                    </div>
                    <div class="row my-4">
                        <label for="brugerGentagPassword" class="col-2">Gentag adgangskode:</label>
                        <input type="password" name="brugerGentagPassword" required readonly placeholder="Gentag adgangskode" class="col-6">
                        <div class="col">* <?php echo $repeatPwErr;?></div>
                    </div>
                    <div class="row my-4">
                        <label for="brugerPrivilegie" class="col-2">Privilegie:</label>
                        <select name="brugerPrivilegie" class="col-6" disabled>
                            <option value="Moderator">Moderator</option>
                            <option value="Administrator">Administrator</option>
                        </select>  
                    </div>
                    <div class="row my-4">
                        <label for="brugerFornavn" class="col-2">Fornavn: </label>
                        <input type="text" name="brugerFornavn" placeholder="Indtast fornavn" readonly class="col-6">
                    </div>
                    <div class="row my-4">
                        <label for="brugerEfternavn" class="col-2">Efternavn: </label>
                        <input type="text" name="brugerEfternavn" placeholder="Indtast efternavn" readonly class="col-6">
                    </div>
                    <div class="row my-4">
                        <label for="brugerAdresse" class="col-2">Adresse: </label>
                        <input type="text" name="brugerAdresse" placeholder="Indtast adresse" readonly class="col-6">
                    </div>
                    <div class="row my-4">
                        <label for="brugerPostnr" class="col-2">Postnummer: </label>
                        <input type="text" name="brugerPostnr" placeholder="Indtast postnummer" readonly class="col-6">
                    </div>
                    <div class="row my-4">
                        <label for="brugerBy" class="col-2">By: </label>
                        <input type="text" name="brugerBy" placeholder="Indtast by" readonly class="col-6">
                    </div>
                    <div class="row my-4">
                        <label for="brugerTlfnr" class="col-2">Telefonnummer: </label>
                        <input type="text" name="brugerTlfnr" placeholder="Indtast telefonnummer" readonly class="col-6">
                    </div>
                    
                    <div class="row my-4">
                        <input type="submit" value="Ret Bruger" name="retBruger" class="col mx-5 btn btn-success">
                        <input type="submit" value="Acceptér Ændringer" name="accRetBruger" class="col mx-5 btn btn-success">
                        <input type="submit" value="Fortryd Ændringer" name="fortrRetBruger" class="col mx-5 btn btn-success">
                    </div>
                </form>

            </article>

        </section>
    </main>
    <?php include "includes/footer.php"; ?>

    <script src="js/bootstrap.bundle.min.js"></script>  
</body>
</html>