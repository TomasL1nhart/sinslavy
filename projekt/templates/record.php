<div class="record">
    <h1><?= htmlspecialchars($record['jmeno'] . ' ' . $record['prijmeni']) ?></h1>
    <p><?= htmlspecialchars($record['rocnik'] . ' - ' . $record['obor']) ?></p>
    <p class="rekord">"<?= htmlspecialchars($record['rekord']) ?>"</p>
    <img src="uploads/<?= htmlspecialchars($record['obrazek']) ?>" alt="Foto" class="student-img">
</div>