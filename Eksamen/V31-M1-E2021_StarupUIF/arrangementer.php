<?php

    include "includes/includer.php";

    if (isset($_POST['catChooser']))
    {
        $Alle = $Musik = $Kunst = $Foredrag = $Sport = $Natur = $Andet = "";

        ${$_POST['eventCategory']} = "selected";
    }
    else
    {
        $Alle = "selected";
        $Musik = $Kunst = $Foredrag = $Sport = $Natur = $Andet = "";
    }

?>

<body class="min-vh-100">

    <?php include "includes/nav.php"; ?>

    <main class="container-fluid">
        <section class="row align-items-center my-5">
            <h1 class="display-1 col-10">Alle arrangementer i Starup UIF</h1>
            <form class="col" method="post">
                <label for="eventCategory">Vælg kategori</label>
                <select name="eventCategory">
                    <option value="Alle" <?php echo $Alle; ?>>Alle</option>
                    <option value="Musik" <?php echo $Musik; ?>>Musik</option>
                    <option value="Kunst" <?php echo $Kunst; ?>>Kunst</option>
                    <option value="Foredrag" <?php echo $Foredrag; ?>>Foredrag</option>
                    <option value="Sport" <?php echo $Sport; ?>>Sport/idræt</option>
                    <option value="Natur" <?php echo $Natur; ?>>Natur</option>
                    <option value="Andet" <?php echo $Andet; ?>>Andet</option>
                </select>
                <input type="submit" name="catChooser" value="Udfør">
            </form>
        
        </section>
        <section class="row row-cols-3">

            <article class="col">
                <h2>Gåtur i Haderslev Tunneldal</h2>
                <p><img class="img-fluid" src="img/GaaturTunneldal.jpg"></p>
                <p>Haderslev Tunneldal strækker sig over 25 km. fra Haderslev til Vojens, og er sandsynligvis formet af vandløb, der har eroderet sig ned i landskabet. Tunneldalen byder på mange spændende strækninger, der er oplagte til en vandretur, cykeltur eller løbetur. Naturen i og omkring tunneldalen består af et tæt net af små veje, bække samt et bakket landskab. Derudover fortæller området en spændende kulturhistorie som fx ved Tørning Mølle og i Dyrehaven.</p>
                <p>Dato: 19. september 2021</p>
                <p>Start: 10:00</p>
                <p>Sted: Mødested: P-pladsen ved Starup Skov</p>

                <a href="visArrangement.php">Læs mere om dette arrangement...</a>

            </article>

            <article class="col">
                <h2>Vegetarisk inspiration til aftensmaden</h2>
                <p><img class="img-fluid" src="img/VegetarKokkeskole.jpg"></p>
                <p>Vi sætter fokus på kødløs inspiration til hele familiens aftensmad. Der laves mad med masser af protein og fiber, som sikrer at i føler jer mætte i lang tid - også uden kød.</p>
                <p>Dato: 23. september 2021</p>
                <p>Start: 17:00</p>
                <p>Sted: Starup Skole - Madkundskab</p>

                <a href="visArrangement.php">Læs mere om dette arrangement...</a>

            </article>

            <article class="col">
                <h2>Håndboldkamp - serie 1 herrer</h2>
                <p><img class="img-fluid" src="img/Serie1haandbold.jpg"></p>
                <p>Kom og bak op om vores serie 1 herrer, som spiller om oprykning til Danmarksserie.Kampen mod Næssets IF skal vindes for at holde liv i drømmen op oprykning</p>
                <p>Dato: 26. september 2021</p>
                <p>Start: 16:00</p>
                <p>Sted: Starup Hallen - Hal 1</p>

                <a href="visArrangement.php">Læs mere om dette arrangement...</a>

            </article>

            <article class="col">
                <h2>Fodboldkamp - serie 3 herrer</h2>
                <p><img class="img-fluid" src="img/Serie3Fodbold.jpg"></p>
                <p>Starup UIF møder Vojens BI i serie 3 herrer</p>
                <p>Dato: 26. oktober 2021</p>
                <p>Start: 18:30</p>
                <p>Sted: Fodboldbanerne bag Starup Hallen</p>

                <a href="visArrangement.php">Læs mere om dette arrangement...</a>

            </article>

            <article class="col">
                <h2>Detox din hjerne - foredrag med Morten Kristiansen</h2>
                <p><img class="img-fluid" src="img/ForedragMortenKristiansen.jpg"></p>
                <p>Madmyter, pseudovidenskab og regulær bullshit fylder alt for meget i sundhedsdebatten. Misinformationen forvirrer og får for mange til at fokusere på det forkerte, i jagten på sundhed - eller får dem til at tage på, i jagten på vægttab. Derfor er det tid til en cleanse - ikke af din krop, men af dine tanker. En detox, der udrenser dit sind for usunde usandheder om sundhed,  og erstatter dem med brugbare fakta.Til foredraget får du blandt andet svar på, hvor farligt det kunstige sødemiddel aspartam i virkeligheden er, hvad forskningen egentlig siger om sukkerafhængighed og hvor vigtigt det er at undgå kulhydrater, hvis du gerne vil tabe dig.</p>
                <p>Dato: 29. september 2021</p>
                <p>Start: 20:00</p>
                <p>Sted: Starup Skole - Fællessalen</p>

                <a href="visArrangement.php">Læs mere om dette arrangement...</a>

            </article>

            <article class="col">
                <h2>Fælles hundeluftningstur</h2>
                <p><img class="img-fluid" src="img/Hundetur.jpg"></p>
                <p>Vi mødes på parkeringspladsen ved Starup Skov. Sammen går vi en smuk tur med vores hund og laver lidt sjov motion undervejs. Deltagelse er gratis og alle kan være med.</p>
                <p>Dato: 2. oktober 2021</p>
                <p>Start: 10:00</p>
                <p>Sted: Parkeringspladsen ved Starup Skov</p>

                <a href="visArrangement.php">Læs mere om dette arrangement...</a>

            </article>
        </section>
    </main>

    <?php include "includes/footer.php"; ?>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>