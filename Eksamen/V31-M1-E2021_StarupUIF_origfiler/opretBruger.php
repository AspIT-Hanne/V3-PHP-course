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
        <h1>Opret bruger</h1>
        <section>
            <article>
                <form method="post">
                    <div>
                        <label for="brugerMail">Email: </label>
                        <input type="email" name="brugerMail" placeholder="Indtast email" required>
                        <div>*</div>
                    </div>
                    <div>
                        <label for="brugerPassword">Adgangskode:</label>
                        <input type="password" name="brugerPassword" placeholder="Indtast adgangskode" required>
                        <div>*</div>
                    </div>
                    <div>
                        <label for="brugerGentagPassword">Gentag adgangskode:</label>
                        <input type="password" name="brugerGentagPassword" placeholder="Gentag adgangskode" required>
                        <div>*</div>
                    </div>
                    <div>
                        <label for="brugerPrivilegie">Privilegie:</label>
                        <select name="brugerPrivilegie">
                            <option value="Moderator">Moderator</option>
                            <option value="Administrator">Administrator</option>
                        </select>  
                    </div>
                    <div>
                        <label for="brugerFornavn">Fornavn: </label>
                        <input type="text" name="brugerFornavn" placeholder="Indtast fornavn">
                    </div>
                    <div>
                        <label for="brugerEfternavn">Efternavn: </label>
                        <input type="text" name="brugerEfternavn" placeholder="Indtast efternavn">
                    </div>
                    <div>
                        <label for="brugerAdresse">Adresse: </label>
                        <input type="text" name="brugerAdresse" placeholder="Indtast adresse">
                    </div>
                    <div>
                        <label for="brugerPostnr">Postnummer: </label>
                        <input type="text" name="brugerPostnr" placeholder="Indtast postnummer">
                    </div>
                    <div>
                        <label for="brugerBy">By: </label>
                        <input type="text" name="brugerBy" placeholder="Indtast by">
                    </div>
                    <div>
                        <label for="brugerTlfnr">Telefonnummer: </label>
                        <input type="text" name="brugerTlfnr" placeholder="Indtast telefonnummer">
                    </div>
                    <div>
                        <div></div>
                        <input type="submit" value="Opret" name="nyBrugerSubmit">
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