<?php
$images = [
    '69cb119f212d7.jpg',
    '69cb117218b23.webp'
];

echo "<h2>Verificando imágenes en /public/productos/</h2>";

foreach ($images as $image) {
    $path = $_SERVER['DOCUMENT_ROOT'] . '/productos/' . $image;
    echo "Buscando: " . $path . "<br>";
    if (file_exists($path)) {
        echo "✅ Existe<br><br>";
    } else {
        echo "❌ NO existe<br><br>";
    }
}

echo "<h2>Contenido de la carpeta productos:</h2>";
$dir = $_SERVER['DOCUMENT_ROOT'] . '/productos/';
if (is_dir($dir)) {
    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            echo "- $file<br>";
        }
    }
} else {
    echo "La carpeta productos NO existe en: $dir";
}