<?php
    include 'include/head.php';
    session_destroy();
    session_unset();
    $_SESSION = [];
    // header('Location: index.php');
    echo ("<script>
        window.location.href = 'index.php';
        </script>");
    exit();
?>