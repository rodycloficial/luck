<?php
echo "<h2>1. Buscando en storage/app/public/productos/</h2>";
$storagePath = __DIR__ . '/../storage/app/public/productos/';
if (is_dir($storagePath)) {
    $files = scandir($storagePath);
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            echo "✅ $file<br>";
        }
    }
} else {
    echo "❌ Carpeta no existe: " . realpath($storagePath) . "<br>";
}

echo "<h2>2. Buscando en public/productos/</h2>";
$publicPath = __DIR__ . '/productos/';
if (is_dir($publicPath)) {
    $files = scandir($publicPath);
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            echo "✅ $file<br>";
        }
    }
} else {
    echo "❌ Carpeta no existe: " . realpath($publicPath) . "<br>";
}

echo "<h2>3. Creando carpeta storage si no existe</h2>";
if (!is_dir($storagePath)) {
    mkdir($storagePath, 0777, true);
    echo "Carpeta storage creada<br>";
}

echo "<h2>4. Creando carpeta public/productos si no existe</h2>";
if (!is_dir($publicPath)) {
    mkdir($publicPath, 0777, true);
    echo "Carpeta public/productos creada<br>";
}
?>