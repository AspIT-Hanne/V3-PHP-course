<?php

    include "includes/includer.php";
?>

<body>

    <?php include "includes/nav.php"; ?>

    <main class="container mb-5">
        <h1 class="my-5 display-1">Opret arrangement</h1>

        <article>
            <form method="post" class="container">
                <div class="row my-4">
                    <label for="eventNavn" class="col-4">Navn på arrangement: </label>
                    <input type="text" name="eventNavn" class="col">
                </div>
                <div class="row my-4">
                    <label for="eventCategory" class="col-4">Kategori</label>
                    <select name="eventCategory" class="col">
                        <option value="Musik">Musik</option>
                        <option value="Kunst">Kunst</option>
                        <option value="Foredrag">Foredrag</option>
                        <option value="Sport">Sport/idræt</option>
                        <option value="Natur">Natur</option>
                        <option value="Andet">Andet</option>
                    </select>
                </div>
                <div class="row my-4">
                    <label for="eventBeskrivelse" class="col-4">Beskrivelse af arrangementet:</label>
                    <textarea placeholder="Indtast beskrivelse..." style="resize: none;" class="col"></textarea>
                    </div>
                <div class="row my-4">
                    <label for="eventImage" class="col-4">Indtast navn på billedfil:</label>
                    <input type="text" name="eventImage" class="col">
                    </div>
                <div class="row my-4">
                    <label for="eventDato" class="col-4">Dato: </label>
                    <input type="date" name="eventDato" min="2021-01-01"class="col-3">
                </div>
                <div class="row my-4">
                    <label for="eventStartTid" class="col-4">Start tidspunkt: </label>
                    <input type="time" name="eventStartTid" class="col-3">
                </div>
                <div class="row my-4">
                    <label for="eventSlutTid" class="col-4">Slut tidspunkt (ikke påkrævet): </label>
                    <input type="time" name="eventSlutTid" class="col-3">
                </div>
                <div class="row my-4">
                    <label for="eventSted" class="col-4">Sted: </label>
                    <input type="text" name="eventSted" class="col">
                </div>
                <div class="row my-4">
                    <label for="eventPris" class="col-4">Pris: </label>
                    <input type="text" name="eventPris" class="col-3">
                </div>
                <div class="row my-4">
                    <label for="eventAnsvarlig" class="col-4">Ansvarlig/kontaktperson: </label>
                    <input type="text" name="eventAnsvarlig" class="col">
                </div>
                <div class="row my-4">
                    <label for="eventAnsvTlf" class="col-4">Telefonnummer ansvarlig/kontaktperson:</label>
                    <input type="text" name="eventAnsvTlf" class="col">
                </div>

                <input type="submit" value="Opret" name="eventSubmit" class="btn btn-success">
            </form>

        </article>
    </main>

    <?php include "includes/footer.php"; ?>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>