<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

// Načti připojení k databázi
include '/config/db.php';

// Zkontroluj, jestli máme platné ID pro smazání
if (isset($_GET['id'])) {
    // Připrav SQL dotaz pro smazání záznamu
    $stmt = $pdo->prepare("DELETE FROM students WHERE id = ?");
    $stmt->execute([$_GET['id']]);
}

// Přesměruj zpět na dashboard
header('Location: dashboard.php');
exit;
?>
