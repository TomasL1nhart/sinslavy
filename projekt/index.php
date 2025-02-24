<?php
include 'config/db.php';
$stmt = $pdo->query("SELECT * FROM students ORDER BY id ASC");
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Síň slávy</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div id="record-container">
            <?php foreach ($records as $record): ?>
                <?php include 'templates/record.php'; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>