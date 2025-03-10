<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $year = $_POST['year'];
    $field = $_POST['field'];
    $record = $_POST['record'];
    
    $uploadDir = 'assets/';
    $uploadFile = $uploadDir . basename($_FILES['image']['name']);
    
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
        $imagePath = $uploadFile;
    } else {
        $imagePath = 'assets/default.jpg';
    }
    
    $newRecord = [
        "name" => $name,
        "year" => $year,
        "field" => $field,
        "record" => $record,
        "image" => $imagePath
    ];
    
    $recordsFile = 'records.json';
    $records = json_decode(file_get_contents($recordsFile), true);
    
    // Přidání nového záznamu na začátek pole
    array_unshift($records, $newRecord);
    
    // Uložení změn zpět do souboru
    file_put_contents($recordsFile, json_encode($records, JSON_PRETTY_PRINT));
    
    header("Location: dashboard.php");
    exit();
}
?>
