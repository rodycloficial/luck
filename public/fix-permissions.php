<?php
$dir = $_SERVER['DOCUMENT_ROOT'] . '/productos';

// Crear la carpeta si no existe
if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
    echo "Carpeta '$dir' creada.<br>";
}

// Cambiar permisos
chmod($dir, 0777);
echo "Permisos cambiados a 0777 en '$dir'<br>";

// Verificar
if (is_writable($dir)) {
    echo "✅ La carpeta tiene permisos de escritura.";
} else {
    echo "❌ La carpeta NO tiene permisos de escritura.";
}