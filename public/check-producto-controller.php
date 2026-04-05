<?php
echo "Revisando archivo ProductoController.php<br>";
$path = __DIR__ . '/../app/Http/Controllers/Admin/ProductoController.php';
if (file_exists($path)) {
    $content = file_get_contents($path);
    if (strpos($content, 'storeAs') !== false) {
        echo "✅ El controlador usa storeAs (storage)<br>";
    } elseif (strpos($content, 'move') !== false) {
        echo "❌ El controlador usa move (public) - DEBE CAMBIARSE<br>";
    }
    
    // Mostrar la línea específica donde guarda la imagen
    preg_match('/if \(\$request->hasFile\(\'imagen\'\)\).*?\}/s', $content, $matches);
    if (isset($matches[0])) {
        echo "<br><strong>Código de guardado de imagen:</strong><br>";
        echo "<pre>" . htmlspecialchars($matches[0]) . "</pre>";
    }
} else {
    echo "No se encontró el archivo ProductoController.php";
}
?>