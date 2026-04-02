<?php
$host = 'crossover.proxy.rlwy.net';
$port = 17565;
$dbname = 'railway';
$username = 'root';
$password = 'LDNvokjVGKxUBjsYKFGbcEzfboCCAZVN';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "CREATE TABLE IF NOT EXISTS sessions (
        id VARCHAR(255) NOT NULL PRIMARY KEY,
        user_id BIGINT UNSIGNED NULL,
        ip_address VARCHAR(45) NULL,
        user_agent TEXT NULL,
        payload TEXT NOT NULL,
        last_activity INT NOT NULL,
        INDEX sessions_user_id_index (user_id),
        INDEX sessions_last_activity_index (last_activity)
    )";
    
    $pdo->exec($sql);
    echo "Tabla 'sessions' creada exitosamente.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}