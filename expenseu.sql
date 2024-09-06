-- Create the database (if not already created)
CREATE DATABASE IF NOT EXISTS expense_tracker_db;
USE expense_tracker_db;
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);
CREATE TABLE IF NOT EXISTS expenses (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  amount DECIMAL(10, 2) NOT NULL,
  category VARCHAR(100),
  payment_mode VARCHAR(50),
  date DATE,
  description TEXT,
  FOREIGN KEY (user_id) REFERENCES users(id)
);
