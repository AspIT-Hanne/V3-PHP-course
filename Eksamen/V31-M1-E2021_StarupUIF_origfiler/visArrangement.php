<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Starup UIF arrangements kalender. Opret nye arrangementer - tilmeld dig arrangementer. Et godt sted at starte et aktivt og interessant fritidsliv.">
    <link href="css/bootstrap.css" rel="stylesheet">
    <title>Starup UIF arrangementer</title>
</head>

<body>

    <nav>
        <a href="index.php">
            <img src="img/LOGO-Starupuif.png" alt="StarupUIFLogo" width="100">
        </a>
        <ul>
            <li>
                <a href="arrangementer.php">
                    Alle arrangementer
                </a>
            </li>
            <li>
                <a href="opretArrangement.php">
                    Opret arrangement
                </a>
            </li>
            <li>
                <a href="opretBruger.php">
                    Opret bruger
                </a>
            </li>
            <li>
                <a href="visBruger.php">
                    Brugeradministration
                </a>
            </li>
            <li>
                <a href="login.php">
                    Log in
                </a>
            </li>
            <li>
                <a href="logud.php">
                    Log ud
                </a>
            </li>
        </ul>
    </nav>

    <main>
        <section>
            <h1>Fælles hundeluftningstur</h1>

            <article>
                <form method="post">
                    <div>
                        <img src="img/Hundetur.jpg">
                    </div>
                    <div>
                        <label for="eventNavn">Navn på arrangement: </label>
                        <input type="text" name="eventNavn" placeholder="Fælles hundeluftningstur">
                    </div>
                    <div>
                        <label for="eventKategori">Kategori</label>
                        <!-- Vær opmærksom på, at der kan være udfordringer med "selected" propertien i Firefox. Test det evt. i en anden browser, hvis du har problemer med dette. -->
                        <select name="eventKategori">
                            <option value="Musik">Musik</option>
                            <option value="Kunst">Kunst</option>
                            <option value="Foredrag">Foredrag</option>
                            <option value="Sport">Sport/idræt</option>
                            <option value="Natur" selected>Natur</option>
                            <option value="Andet">Andet</option>
                        </select>
                    </div>
                    <div>
                        <label for="eventBeskrivelse">Beskrivelse af arrangementet:</label>
                        <textarea placeholder="Vi mødes på parkeringspladsen ved Starup Skov. Sammen går vi en smuk tur med vores hund og laver lidt sjov motion undervejs. Deltagelse er gratis og alle kan være med."></textarea>
                    </div>
                    <div>
                        <label for="eventBillede">Indtast navn på billedfil:</label>
                        <input type="text" name="eventBillede" placeholder="Hundetur.jpg">
                    </div>
                    <div>
                        <label for="eventDato">Dato: </label>
                        <input type="date" name="eventDato" min="2021-01-01" value="2021-10-02">
                    </div>
                    <div>
                        <label for="eventStartTid">Start tidspunkt: </label>
                        <input type="time" name="eventStartTid" value="10:00">
                    </div>
                    <div>
                        <label for="eventSlutTid">Slut tidspunkt (ikke påkrævet): </label>
                        <input type="time" name="eventSlutTid" value="12:00">
                    </div>
                    <div>
                        <label for="eventSted">Sted: </label>
                        <input type="text" name="eventSted" placeholder="Parkeringspladsen ved Starup Skov">
                    </div>
                    <div>
                        <label for="eventPris">Pris: </label>
                        <input type="text" name="eventPris" placeholder="Gratis">
                    </div>
                    <div>
                        <label for="eventAnsvarlig">Ansvarlig/kontaktperson: </label>
                        <input type="text" name="eventAnsvarlig" placeholder="Niels Rasmussen">
                    </div>
                    <div>
                        <label for="eventAnsvTlf">Telefonnummer ansvarlig/kontaktperson:</label>
                        <input type="text" name="eventAnsvTlf" placeholder="33333333">
                    </div>

                    <div>
                        <input type="submit" value="Ret Arrangement" name="retArrangement">
                        <input type="submit" value="Acceptér Ændringer" name="accRetArrangement">
                        <input type="submit" value="Fortryd Ændringer" name="fortrRetArrangement">
                    </div>
                </form>
            </article>
        </section>
    </main>
    
    <footer>
        <div>
            <p>Starup UIF - Starup-hallen</p>
            <p>Starup Skolevej 33A</p>
            <p>6100 Haderslev</p>
        </div>
        <div>
            <img src="img/LOGO-Starupuif.png">
        </div>
        <div>
            <p><a href="#">Cookie- og GDPR-politik</a></p>
            <p><a href="#">Vedtægter</a></p>
            <p><a href="#">Bestyrelse</a></p>
            <p><a href="#">Ordensregler</a></p>
            <p><a href="#">Starup Kultur- og Idrætscenter</a></p>
        </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>