<?php
/**
 * Database connection using PDO with prepared statements.
 * Update the credentials below to match your local MySQL setup.
 */

$db_host = 'localhost';
$db_name = 'polling_db';
$db_user = 'root';
$db_pass = '';

try {
    $pdo = new PDO(
        "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4",
        $db_user,
        $db_pass,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false, // use real prepared statements
        ]
    );
} catch (PDOException $e) {
    // Never leak DB credentials/details in production; log instead.
    http_response_code(500);
    die('Database connection failed. Please try again later.');
}
