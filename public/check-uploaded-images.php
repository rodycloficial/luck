<?php
$storagePath = storage_path('app/public/productos/');
echo "<h2>Imágenes en storage:</h2>";
if (is_dir($storagePath)) {
    $files = scandir($storagePath);
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            echo "- $file<br>";
        }
    }
} else {
    echo "La carpeta no existe: $storagePath";
}

echo "<h2>Subida de archivo (debug):</h2>";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
}
?>