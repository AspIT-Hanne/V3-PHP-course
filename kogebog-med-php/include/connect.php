<?php
require_once 'config.php'; // Inkludér konfigurationsoplysningerne

$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;

// $dsn er en forkortelse for Data Source Name, som bruges af PHP Data Objects (PDO) til at specificere forbindelsesparametre til databasen.
// $dsn består af flere dele:
// 1. mysql: Angiver, at vi bruger MySQL-database som database-driver.
// 2. host: Angiver værtsnavnet (DB_HOST).
// 3. dbname: Angiver databasenavnet (DB_NAME).
// 4. charset: Angiver tegnsættet (DB_CHARSET).
// I eksemplet ovenfor vil den færdige DSN-streng se sådan ud:
// mysql:host=localhost;dbname=kogebog;charset=utf8mb4


// PDO-indstillinger for at forbedre sikkerhed og ydeevne
$options = [
    // Cache forbindelsen til databasen (persistent connection)
    // På den måde genbruges den samme databaseforbindelse i stedet for at oprette en ny for hver forespørgsel.
    // Dette kan forbedre ydeevnen betydeligt under belastning.
    PDO::ATTR_PERSISTENT         => true,
    
    // Indstil standardfejltilstanden til at kaste undtagelser (Exceptions)
    // Dette er den vigtigste best practice for fejlsikring!
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    
    // Deaktiver emulerede forberedte statements.
    // Brug af ægte forberedte statements forhindrer SQL Injection og forbedrer ydeevnen.
    PDO::ATTR_EMULATE_PREPARES   => false,
    
    // Sæt standard fetch mode til at returnere et associative array
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];


// Forsøg at oprette forbindelse til databasen ved at bruge try-catch blokken
// for at håndtere eventuelle fejl under forbindelsesprocessen.
// Fordelen ved at anvende try-catch er, at vi kan fange evt. problemer, som opstår (Exceptions)
// og håndtere dem på en kontrolleret måde, hvilket forbedrer applikationens stabilitet og brugervenlighed.

try {
     // Opretter en ny PDO-instans (forbindelsen)
    $dbcon = new PDO($dsn, DB_USER, DB_PASS, $options);
    
    // Valgfrit: Output for at bekræfte forbindelse. Når du er sikker på, at det virker, kan du fjerne denne linje.
    echo "Forbindelse oprettet med succes!";
    
} catch (\PDOException $e) {
    // Fanger kun PDO Exceptions
    
    // Ved produktionsmiljøer skal du undgå at vise $e->getMessage() til brugeren, 
    // da det kan afsløre følsomme databaseoplysninger.
    // Log i stedet fejlen: error_log($e->getMessage());
    
    // Da dette er et lokalt test-miljø udskriver vi evt. fejlmeddelelser, så vi nemt kan se, hvad problemet er
    // Samtidigt afsluttes scriptet med exit() for at forhindre yderligere eksekvering.
    exit("Databaseforbindelsen mislykkedes: " . $e->getMessage()); 
}