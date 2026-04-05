<?php
$storagePath = __DIR__ . '/../storage/app/public/productos/';

echo "<h2>Verificando carpeta storage</h2>";

if (is_dir($storagePath)) {
    echo "✅ La carpeta existe: $storagePath<br>";
    $files = scandir($storagePath);
    $images = array_filter($files, function($file) {
        return $file != '.' && $file != '..';
    });
    if (count($images) > 0) {
        echo "<h3>Imágenes encontradas en storage:</h3>";
        foreach ($images as $image) {
            echo "📷 $image<br>";
        }
    } else {
        echo "❌ No hay imágenes en storage.<br>";
    }
} else {
    echo "❌ La carpeta NO existe: $storagePath<br>";
    echo "Intentando crear la carpeta...<br>";
    if (mkdir($storagePath, 0777, true)) {
        echo "✅ Carpeta creada exitosamente.<br>";
    } else {
        echo "❌ No se pudo crear la carpeta.<br>";
    }
}

echo "<h2>Ubicación real de storage:</h2>";
echo "Ruta completa: " . realpath(__DIR__ . '/../storage/app/public/') ?: 'No existe';
?>