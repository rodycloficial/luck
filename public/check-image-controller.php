<?php
echo "Revisando ImageController.php<br>";
$path = __DIR__ . '/../app/Http/Controllers/Api/ImageController.php';
if (file_exists($path)) {
    $content = file_get_contents($path);
    echo "<pre>" . htmlspecialchars($content) . "</pre>";
} else {
    echo "No se encontró el archivo ImageController.php";
}
?>