<?php
    require_once 'include/head.php';

?>
  <body class="min-vh-100 bg-light">
    <?php include 'include/header.php'; ?>
    
    <main class="container my-5">
        <h2 class="mb-4">Nyeste opskrifter</h2>
        <section class="row g-4 mb-4">
            <article class="col-lg-4">
                <a href="opskrift.php" class="card h-100">
                    <div class="card-header bg-success-subtle">
                        <h5 class="card-title">Møllehjul</h5>
                    </div>
                    <div class="card-body">
                        <img src="img/recipeMollehjul.jpg" class="card-img" alt="Mollehjul">
                        <p class="card-text mt-3">
                            De sprøde og luftige hjemmebagte møllehjul er ligeså gode - eller måske endda bedre - end dem, du køber hos bageren.
                        </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Kategori: Bagværk</li>
                    </ul>
                    <div class="card-footer bg-success-subtle fst-italic">
                        <p>Oprettet d. 15/9-2025 af Moster Hanne</p>
                    </div>
                </a>
            </article>
            <article class="col-lg-4">
                <div class="card h-100">
                    <div class="card-header bg-success-subtle">
                        <h5 class="card-title">Hyldeblomstsaft</h5>
                    </div>
                    <div class="card-body">
                        <img src="img/recipeHyldeblomstsaft.jpg" class="card-img" alt="Hyldeblomstsaft">
                        <p class="card-text mt-3">
                           Helt utrolig frisk og dejlig opskrift på hyldeblomst saft. Bevar sommerens friske drik helt til næste år (eller hvor længe den nu kan få lov at stå i fred!)
                        </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Kategori: Andet</li>
                    </ul>
                    <div class="card-footer bg-success-subtle fst-italic">
                        <p>Oprettet d. 7/9-2025 af Moster Hanne</p>
                    </div>
                </div>
            </article>
            <article class="col-lg-4">
                <div class="card h-100">
                    <div class="card-header bg-success-subtle">
                        <h5 class="card-title">Sønderjysk rugbrød</h5>
                    </div>
                    <div class="card-body">
                        <img src="img/recipeSdrjyskRugbrod.jpg" class="card-img" alt="Sønderjysk rugbrød">
                        <p class="card-text mt-3">
                           En variation af det klassiske sønderjyske rugbrød. Dette er dog ikke rundt men bagt i form og derfor firkantet - men stadig lige så saftigt og lækkert som sin runde bror.
                        </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Kategori: Bagværk</li>
                    </ul>
                    <div class="card-footer bg-success-subtle fst-italic">
                        <p>Oprettet d. 30/8-2025 af Moster Hanne</p>
                    </div>
                </div>
            </article>
        </section>
        <section class="row g-4 mb-5">
            <article class="col-lg-4">
                <div class="card h-100">
                    <div class="card-header bg-success-subtle">
                        <h5 class="card-title">Hvidløgsflutes</h5>
                    </div>
                    <div class="card-body">
                        <img src="img/recipeHvidlogsflutes.jpg" class="card-img" alt="Hvidløgsflutes">
                        <p class="card-text mt-3">
                            Fantastiske hjemmelavede hvidløgsflutes baseret på opskriften fra Ibsens mad.
                        </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Kategori: Bagværk</li>
                    </ul>
                    <div class="card-footer bg-success-subtle fst-italic">
                        <p>Oprettet d. 30/8-2025 af Moster Hanne</p>
                    </div>
                </div>
            </article>
             <article class="col-lg-4">
                <div class="card h-100">
                    <div class="card-header bg-success-subtle">
                        <h5 class="card-title">Smash burger</h5>
                    </div>
                    <div class="card-body">
                        <img src="img/recipeSmashBurger.jpg" class="card-img" alt="Smash burger">
                        <p class="card-text mt-3">
                            Med denne opskrift kan du lave den perfekte smash burger derhjemme - saftig, sprød og fuld af smag.
                        </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Kategori: Aftensmad</li>
                    </ul>
                    <div class="card-footer bg-success-subtle fst-italic">
                        <p>Oprettet d. 22/8-2025 af Moster Hanne</p>
                    </div>
                </div>
            </article>
        </section>
    </main>

    <?php require_once 'include/footer.php'; ?>
  </body>
</html>