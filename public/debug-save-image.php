<?php
// Simular lo que hace el controlador
$storagePath = __DIR__ . '/../storage/app/public/productos/';
$testImage = __DIR__ . '/productos/69c99030de236.webp'; // una imagen que existe

echo "<h2>Probando guardado en storage:</h2>";

if (file_exists($testImage)) {
    $destino = $storagePath . 'test-copy.webp';
    if (copy($testImage, $destino)) {
        echo "✅ Imagen copiada a storage: test-copy.webp<br>";
    } else {
        echo "❌ Error al copiar a storage<br>";
    }
} else {
    echo "❌ Imagen de prueba no encontrada: $testImage<br>";
}

echo "<h2>Verificando permisos:</h2>";
echo "¿Storage es escribible? " . (is_writable($storagePath) ? '✅ Sí' : '❌ No') . "<br>";
echo "Ruta storage: $storagePath<br>";
?>