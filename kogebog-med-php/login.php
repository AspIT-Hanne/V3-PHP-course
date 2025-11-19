<?php
    require_once 'include/head.php';

    if(isset($_GET['error'])) {
        $error = $_GET['error'];
    }
    else {
        $error = '';
    }

?>
  <body class="min-vh-100 bg-light d-flex flex-column">
    <?php include 'include/header.php'; ?>

    <main class="container my-5 shadow-sm p-4 bg-white rounded flex-grow-1">
        <h2 class="mb-4">Login</h2>

        <form method="post" action="loginvelkommen.php" class="mx-auto w-md-50">
            <div class="mb-3">
                <label for="username" class="form-label">Brugernavn</label>
                <input type="text" class="form-control <?php if($error === 'usernotfound') echo 'is-invalid'; ?>" id="username" name="username" <?php if($error === 'invalidpassword') echo "value='{$_GET['user']}'"; ?> required>
                <?php if($error === 'usernotfound') echo '<div class="invalid-feedback">Brugernavnet blev ikke fundet.</div>'; ?>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Adgangskode</label>
                <input type="password" class="form-control <?php if($error === 'invalidpassword'){ echo 'is-invalid" autofocus';} ?> id="password" name="password" required>
                <?php if($error === 'invalidpassword') echo '<div class="invalid-feedback">Adgangskoden er forkert.</div>'; ?>
            </div>
            <input type="submit" class="btn bg-<?=$background;?> text-white" name="Login_submit" value="Log ind">
        </form>
    </main>

    <?php require_once 'include/footer.php'; ?>

</body>
</html>