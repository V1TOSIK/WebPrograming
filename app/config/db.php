<?php
$host = 'postgres';
$port = '5432';
$dbname = 'lab_db';
$user = 'postgres';
$password = 'password';

try {
    $pdo = new PDO(
        "pgsql:host=$host;port=$port;dbname=$dbname",
        $user,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    // echo "Підключено до PostgreSQL!";
} catch (PDOException $e) {
    die("Помилка підключення: " . $e->getMessage());
}
?>
