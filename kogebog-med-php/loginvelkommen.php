<?php
    require_once 'include/head.php';

    if(isset($_POST['username'])) {

        $username = $_POST['username'];

        $sql = "SELECT * FROM users WHERE userName = :username";

        $stmt = $dbcon->prepare($sql);

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        $stmt->execute();

        // Hvis vores SQL statement returnerer lige præcis en række, så er der fundet en bruger med det angivne brugernavn
        if($stmt->rowCount() == 1) {
            $user = $stmt->fetch();

            print_r($user);
            
            if($user['userPW'] === $_POST['password']) {
                $_SESSION['username'] = $username;
                header('Location: index.php');
            }
            else {
                header('Location: login.php?error=invalidpassword&user=' . urlencode($username));
                exit();
            }
        }
        else {
            header('Location: login.php?error=usernotfound');
            exit();
        }
    }
    else {
        header('Location: login.php?error=emptyfields');
        exit();
    }

?>
  <body class="min-vh-100 bg-light d-flex flex-column">
    <?php include 'include/header.php'; ?>

    <main class="container my-5 shadow-sm p-4 bg-white rounded flex-grow-1">
        <h2 class="mb-4">Velkommen</h2>

        <p>Du er nu logget ind som <?php echo htmlspecialchars($_SESSION['username']); ?>.</p>

        <p>Du kan oprette en ny opskrift ved at vælge menupunktet Opret opskrift.</p>
    </main>

    <?php require_once 'include/footer.php'; ?>

</body>
</html>