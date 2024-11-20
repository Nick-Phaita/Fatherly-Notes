<?php
require 'db.php';

// Register User
function registerUser($username, $password) {
    global $pdo;

    // Validate input
    if (empty($username) || empty($password)) {
        return "Username and password are required.";
    }

    if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)) {
        return "Username must be 3-20 characters and only contain letters, numbers, or underscores.";
    }

    if (strlen($password) < 6) {
        return "Password must be at least 6 characters.";
    }

    // Check if username exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $existingUser = $stmt->fetch();
    if ($existingUser) {
        return "Username already taken.";
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert the new user into the database
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->execute([$username, $hashedPassword]);

    return null;  // Return null if everything is fine
}

// Login User
function loginUser($username, $password) {
    global $pdo;

    // Validate input
    if (empty($username) || empty($password)) {
        return "Username and password are required.";
    }

    // Check if the user exists in the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        return null;  // Return null if login is successful
    }

    return "Invalid username or password.";  // Return error if login fails
}
?>


