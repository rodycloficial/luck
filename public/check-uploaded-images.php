<?php
// Cargar Laravel para tener acceso a las funciones
require_once __DIR__ . '/../bootstrap/app.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->handle(Illuminate\Http\Request::capture());

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

echo "<h2>También revisar en public/productos:</h2>";
$publicPath = $_SERVER['DOCUMENT_ROOT'] . '/productos/';
if (is_dir($publicPath)) {
    $files = scandir($publicPath);
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            echo "- $file<br>";
        }
    }
} else {
    echo "La carpeta no existe: $publicPath";
}
?>