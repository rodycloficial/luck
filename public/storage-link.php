<?php
$target = __DIR__ . '/../storage/app/public';
$link = __DIR__ . '/storage';

if (file_exists($link)) {
    echo "El enlace ya existe.";
} else {
    if (symlink($target, $link)) {
        echo "Enlace simbólico creado: $link -> $target";
    } else {
        echo "Error al crear el enlace simbólico.";
    }
}