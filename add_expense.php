<?php
session_start();
include 'db.php'; // Include the database connection

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $payment_mode = $_POST['payment_mode'];
    $date = date('Y-m-d'); // Automatically get current date
    $description = $_POST['description'];

    // Insert expense into the database
    $stmt = $pdo->prepare("INSERT INTO expenses (user_id, amount, category, payment_mode, date, description) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$user_id, $amount, $category, $payment_mode, $date, $description]);

    echo "Expense added successfully!";
} else {
    echo "Please log in first!";
}
?>
