<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

try {
    $response = $kernel->handle(
        $request = Illuminate\Http\Request::capture()
    );
    $response->send();
    $kernel->terminate($request, $response);
} catch (Exception $e) {
    echo "<h1>Error:</h1>";
    echo "<p><strong>Mensaje:</strong> " . $e->getMessage() . "</p>";
    echo "<p><strong>Archivo:</strong> " . $e->getFile() . "</p>";
    echo "<p><strong>Línea:</strong> " . $e->getLine() . "</p>";
    echo "<p><strong>Traza:</strong></p>";
    echo "<pre>" . $e->getTraceAsString() . "</pre>";
}