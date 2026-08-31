<?php

require __DIR__ . "/postcard/loadenv.php"; // Load .env settings

$host = getenv('DB_HOST') ?: "mariadb";
$user = getenv('DB_USER') ?: "user";
$password = getenv('DB_PASSWORD');
$database = getenv('DB_NAME') ?: "db_01";

try {
    // create new PDO
    $dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    $pdo = new PDO($dsn, $user, $password, $options);

    echo "Connection to DB $database successful!";
} catch (PDOException $e) {
    // handle any errors
    echo "Connection failed: " . $e->getMessage();
}
