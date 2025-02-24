<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

include '../config/db.php'; // Ujisti se, že je správně zahrnut soubor s připojením k DB
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("INSERT INTO students (jmeno, prijmeni, rocnik, obor, rekord, obrazek) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$_POST['jmeno'], $_POST['prijmeni'], $_POST['rocnik'], $_POST['obor'], $_POST['rekord'], $_POST['obrazek']]);
}

// Pokud je připojení k DB úspěšné, načti všechny záznamy
$records = $pdo->query("SELECT * FROM students")->fetchAll(PDO::FETCH_ASSOC);
?>
<form method="POST">
    <input type="text" name="jmeno" placeholder="Jméno" required>
    <input type="text" name="prijmeni" placeholder="Příjmení" required>
    <input type="text" name="rocnik" placeholder="Ročník" required>
    <input type="text" name="obor" placeholder="Obor" required>
    <input type="text" name="rekord" placeholder="Rekord" required>
    <input type="text" name="obrazek" placeholder="Obrázek (název souboru)">
    <button type="submit">Přidat</button>
</form>
<ul>
    <?php foreach ($records as $record): ?>
        <li>
            <?= htmlspecialchars($record['jmeno'] . ' ' . $record['prijmeni']) ?> - <?= htmlspecialchars($record['rekord']) ?>
            <a href="delete.php?id=<?= $record['id'] ?>">Smazat</a>
        </li>
    <?php endforeach; ?>
</ul>
