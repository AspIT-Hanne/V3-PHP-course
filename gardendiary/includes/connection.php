<?php 

    $host = "localhost";
    $user = "root";
    $pword = "";
    $db = "plantebasen";

    $connection = new MySQLi($host, $user, $pword, $db);

    // If database connection fails
    if($connection->connect_error) 
    {   
        // Kill current script and add error-message
        die("Connection to database failed: ". $connection->connect_error);
    }
?>