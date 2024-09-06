<?php
session_start();
include 'db.php';  // Connect to the database

if (isset($_POST['submit'])) {
    // Get form data
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $payment_mode = $_POST['payment_mode'];
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    
    // Get user ID from session (after user login)
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        // If user is not logged in, redirect to login page
        header("Location: login.php");
        exit();
    }

    // Validate numeric fields
    if (!is_numeric($amount)) {
        echo "Invalid amount entered!";
        exit();
    }

    // Insert data into the 'expenses' table
    $sql = "INSERT INTO expenses (user_id, amount, category, payment_mode, date, description) 
            VALUES (:user_id, :amount, :category, :payment_mode, CURDATE(), :description)";
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute([
        ':user_id' => $user_id,
        ':amount' => $amount,
        ':category' => $category,
        ':payment_mode' => $payment_mode,
        ':description' => $description
    ]);

    // Check if the expense was successfully added
    if ($stmt->rowCount() > 0) {
        echo "Expense added successfully!";
        // Redirect back to the tracker page or display a success message
        header("Location: Expense.html");
    } else {
        echo "Failed to add expense!";
    }
} else {
    echo "No form data submitted!";
}
?>
