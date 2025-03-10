<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $index = $_POST['index'];
    $recordsFile = 'records.json';
    $records = json_decode(file_get_contents($recordsFile), true);
    
    if (isset($records[$index])) {
        $imagePath = $records[$index]['image'];
        if ($imagePath !== 'uploads/default.jpg' && file_exists($imagePath)) {
            unlink($imagePath);
        }
        unset($records[$index]);
        $records = array_values($records);
        file_put_contents($recordsFile, json_encode($records, JSON_PRETTY_PRINT));
    }
    
    header("Location: dashboard.php");
    exit();
}
?>