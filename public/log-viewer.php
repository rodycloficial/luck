<?php
$logFile = __DIR__ . '/../storage/logs/laravel.log';

if (file_exists($logFile)) {
    echo "<h1>Laravel Logs</h1>";
    echo "<pre>";
    echo htmlspecialchars(file_get_contents($logFile));
    echo "</pre>";
} else {
    echo "No se encuentra el archivo de log en: " . $logFile;
}

// También mostrar errores de PHP
echo "<h2>Error Log de PHP</h2>";
$phpErrorLog = ini_get('error_log');
if ($phpErrorLog && file_exists($phpErrorLog)) {
    echo "<pre>";
    echo htmlspecialchars(file_get_contents($phpErrorLog));
    echo "</pre>";
} else {
    echo "Error log no encontrado: " . $phpErrorLog;
}