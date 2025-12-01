<?php

$host = "mariadb";
$user = "user";
$password = "user-secret";
$database = "db_01";

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
