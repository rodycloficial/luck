<?php
$path = __DIR__ . '/productos/';
if (is_dir($path)) {
    $files = scandir($path);
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            unlink($path . $file);
            echo "Eliminado: $file<br>";
        }
    }
    echo "Todas las imágenes han sido eliminadas.";
} else {
    echo "La carpeta no existe.";
}
?>