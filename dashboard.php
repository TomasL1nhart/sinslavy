<?php
include 'auth.php';
$records = json_decode(file_get_contents('records.json'), true);
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
    <h1>Admin Panel</h1>
    <form id="record-form" enctype="multipart/form-data" action="process.php" method="POST">
        <input type="text" name="name" placeholder="Jméno a příjmení" required>
        
        <select name="year" required>
            <option value="">Vyber ročník</option>
            <option value="1">1. ročník</option>
            <option value="2">2. ročník</option>
            <option value="3">3. ročník</option>
            <option value="4">4. ročník</option>
        </select>
        
        <select name="field" required>
            <option value="">Vyber obor</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="H">H</option>
            <option value="F">F</option>
            <option value="G">G</option>
        </select>
        
        <textarea name="record" placeholder="Ú" required></textarea>
        <input type="file" name="image" accept="image/*" id="image-input" required>
        <img id="file-preview" src="#" alt="Náhled obrázku">
        <button type="submit">Přidat</button>
    </form>
    <br><br>
    <ul id="record-list">
    <?php foreach ($records as $index => $record): ?>
        <li>
            <?php echo $record['name'] . ' - ' . $record['record']; ?>
            <form action="delete.php" method="POST" class="delete-form" onsubmit="return confirmDelete(event)">
                <input type="hidden" name="index" value="<?php echo $index; ?>">
                <button type="submit" class="delete-btn">Smazat</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>

<script>
function confirmDelete(event) {
    if (!confirm("Opravdu chcete tento záznam smazat?")) {
        event.preventDefault();
        return false;
    }
    return true;
}
</script>
    <a href="logout.php">Odhlásit</a>
</body>
</html>