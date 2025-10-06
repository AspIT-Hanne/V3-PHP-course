<?php
    require_once 'include/head.php';

?>
  <body class="min-vh-100 bg-light">
    <?php include 'include/header.php'; ?>

    <main class="container my-5 shadow-sm p-4 bg-white rounded">
        <h2 class="mb-4">Login</h2>

        <form method="post" class="mx-auto w-md-50">
            <div class="mb-3">
                <label for="username" class="form-label">Brugernavn</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Adgangskode</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn bg-success text-white">Log ind</button>
    </main>

    <?php require_once 'include/footer.php'; ?>

</body>
</html>