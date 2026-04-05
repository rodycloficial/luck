<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['imagen'])) {
    $archivo = $_FILES['imagen'];
    $nombre = uniqid() . '.' . pathinfo($archivo['name'], PATHINFO_EXTENSION);
    
    // Intentar guardar en storage
    $storagePath = __DIR__ . '/../storage/app/public/productos/' . $nombre;
    
    if (move_uploaded_file($archivo['tmp_name'], $storagePath)) {
        echo "✅ Imagen guardada en storage: $nombre<br>";
        echo "Ruta: $storagePath<br>";
    } else {
        echo "❌ Error al guardar en storage<br>";
    }
    
    // También verificar si se guardó en public
    $publicPath = __DIR__ . '/productos/' . $nombre;
    if (file_exists($publicPath)) {
        echo "⚠️ También se guardó en public: $publicPath<br>";
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="imagen" accept="image/*" required>
    <button type="submit">Subir imagen</button>
</form>