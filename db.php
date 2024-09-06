<?php
$host = 'localhost';
$dbname = 'expense_tracker_db';
$username = 'root'; // Update to your MySQL username
$password = 'Puja@2908';     // Update to your MySQL password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}
?>
