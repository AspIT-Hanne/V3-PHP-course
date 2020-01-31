<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Newsletter</title>
</head>
<body>

    <?php 
        include "includes/topmenu.php";

        include "includes/sidemenu.php";
    ?>

    <div class="content">
        <main>
        <h1>Opret bruger</h1>
        <form action="newuser-landing.php" method="post">
            <p>
                <label for="firstname">Fornavn: </label>
                <input type="text" name="newuser-firstname" placeholder="Fornavn">
            </p>
            
            <p>
                <label for="newsletter-email">Email adresse: </label>
                <input type="text" name="newuser-email" placeholder="Email adresse">
            </p>
            
            <p>
                <input type="submit" name="newuser-submit" value="Opret" class="newsletterbtn">
            </p>
        </form>

        </main>

        <?php include "includes/footer.php"; ?>
    </div>
        
</body>
</html>