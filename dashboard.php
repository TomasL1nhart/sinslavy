<?php
include 'auth.php';
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styles2.css">
    <script defer src="dashboard.js"></script>
</head>
<body>
    <div class="dashboard-container">
        <h1>Admin Panel</h1>
        <form id="record-form" enctype="multipart/form-data" action="process.php" method="POST">
            <input type="text" name="name" placeholder="Jméno Příjmení" required>
            <input type="text" name="year" placeholder="Ročník" required>
            <input type="text" name="field" placeholder="Obor" required>
            <textarea name="record" placeholder="Rekord" required></textarea>
            <input type="file" name="image" accept="image/*" required>
            <button type="submit">Přidat</button>
        </form>
        <ul id="record-list"></ul>
        <a href="logout.php">Odhlásit</a>
    </div>
</body>
</html>