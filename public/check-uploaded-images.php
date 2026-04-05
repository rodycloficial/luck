<?php
echo "<h2>1. Buscando en storage/app/public/productos/</h2>";
$storagePath = __DIR__ . '/../storage/app/public/productos/';
if (is_dir($storagePath)) {
    $files = scandir($storagePath);
    $images = array_filter($files, function($file) {
        return $file != '.' && $file != '..';
    });
    if (count($images) > 0) {
        foreach ($images as $image) {
            echo "✅ $image<br>";
        }
    } else {
        echo "❌ No hay imágenes en storage.<br>";
    }
} else {
    echo "❌ La carpeta no existe: $storagePath<br>";
}

echo "<h2>2. Buscando en public/productos/</h2>";
$publicPath = __DIR__ . '/productos/';
if (is_dir($publicPath)) {
    $files = scandir($publicPath);
    $images = array_filter($files, function($file) {
        return $file != '.' && $file != '..';
    });
    if (count($images) > 0) {
        foreach ($images as $image) {
            echo "✅ $image<br>";
        }
    } else {
        echo "❌ No hay imágenes en public/productos.<br>";
    }
} else {
    echo "❌ La carpeta no existe: $publicPath<br>";
}
?>