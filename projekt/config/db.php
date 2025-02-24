<?php
try {
    // Zajisti správné připojení k databázi
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=sin_slavy;charset=utf8', 'root', 'root'); // upravit podle potřeby
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Nastavení režimu chyb
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage()); // Chyba při připojení k databázi
}
