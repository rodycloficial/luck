<?php
// Crear la carpeta si no existe
$storageFolder = __DIR__ . '/../storage/app/public/productos/';
if (!is_dir($storageFolder)) {
    mkdir($storageFolder, 0777, true);
    echo "Carpeta storage creada: $storageFolder<br>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['imagen'])) {
    $archivo = $_FILES['imagen'];
    $nombre = uniqid() . '.' . pathinfo($archivo['name'], PATHINFO_EXTENSION);
    
    $storagePath = $storageFolder . $nombre;
    
    if (move_uploaded_file($archivo['tmp_name'], $storagePath)) {
        echo "✅ Imagen guardada en storage: $nombre<br>";
        echo "Ruta: $storagePath<br>";
    } else {
        echo "❌ Error al guardar en storage<br>";
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="imagen" accept="image/*" required>
    <button type="submit">Subir imagen</button>
</form>