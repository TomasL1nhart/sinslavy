<?php
session_start();

// Statické údaje pro administrátora
$admin_username = "admin";
$admin_password = "heslo";

// Kontrola, jestli byly odeslány údaje pro přihlášení
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Kontrola správnosti uživatelského jména a hesla
    if ($_POST['username'] === $admin_username && $_POST['password'] === $admin_password) {
        $_SESSION['admin'] = true; // Nastavení session pro admina
        header('Location: admin/dashboard.php'); // Přesměrování na dashboard
        exit;
    } else {
        $error = "Nesprávné uživatelské jméno nebo heslo.";
    }
}
?>
<!-- HTML formulář pro přihlášení -->
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Přihlášení</title>
</head>
<body>
    <h2>Přihlášení jako administrátor</h2>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Uživatelské jméno" required>
        <input type="password" name="password" placeholder="Heslo" required>
        <button type="submit">Přihlásit</button>
    </form>
</body>
</html>
