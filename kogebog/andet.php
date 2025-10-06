<?php
    require_once 'include/head.php';

?>
  <body class="min-vh-100 bg-light">
    <?php include 'include/header.php'; ?>
    
    <main class="container my-5">
        <h2 class="mb-4">Nyeste opskrifter</h2>
        <section class="row g-4 mb-4">
            
            <article class="col-md-4">
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
           
        </section>
    </main>

    <?php require_once 'include/footer.php'; ?>
  </body>
</html>