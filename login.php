<?php
session_start();
include 'db.php'; // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if user exists in the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Set session variables and redirect to expense tracker
        $_SESSION['user_id'] = $user['id'];
        header("Location: Expense.html");
        exit;
    } else {
        // Redirect back with an error message
        header("Location: laug.html?error=invalid");
        exit;
    }
}
?>
