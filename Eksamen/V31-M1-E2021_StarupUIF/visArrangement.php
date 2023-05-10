<?php
    include "includes/includer.php";
?>

<body class="d-flex flex-column vh-100">
    <?php include "includes/nav.php"; ?>

    <main class="container pb-5 vh-100">
        <section >
            <h1 class="display-1 col-10 my-5">Fælles hundeluftningstur</h1>

            <article class="container">
                <div class="row">
                    <img class="img-fluid col" src="img/Hundetur.jpg">
            
                    <div class="col container">
                        <div class="row my-3">
                            <div class="col-3">
                                Kategori:
                            </div>
                            <div class="col">
                                Natur
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-3">
                                Beskrivelse:
                            </div>
                            <div class="col">
                                Vi mødes på parkeringspladsen ved Starup Skov. Sammen går vi en smuk tur med vores hund og laver lidt sjov motion undervejs. Deltagelse er gratis og alle kan være med.
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-3">
                                Dato:
                            </div>
                            <div class="col">
                                2. oktober 2021
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-3">
                                Start:
                            </div>
                            <div class="col">
                                10:00
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-3">
                                Slut:
                            </div>
                            <div class="col">
                                12:00
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-3">
                                Sted:
                            </div>
                            <div class="col">
                                Parkeringspladsen ved Starup Skov
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-3">
                                Pris:
                            </div>
                            <div class="col">
                                Gratis
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-3">
                                Kontaktperson:
                            </div>
                            <div class="col">
                                <a href="mailto:niels.rasmussen@gmail.com">Niels Rasmussen</a> - tlf: 33333333
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                        <input type="submit" value="Ret Arrangement" name="retArrangement" class="col mx-5 btn btn-success">
                        <input type="submit" value="Acceptér Ændringer" name="accRetArrangement" class="col mx-5 btn btn-success">
                        <input type="submit" value="Fortryd Ændringer" name="fortrRetArrangement" class="col mx-5 btn btn-success">
                    </div>
            </article>
        </section>
    </main>
    <?php include "includes/footer.php"; ?>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>