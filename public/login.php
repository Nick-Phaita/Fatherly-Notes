<?php
require '../src/auth.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize input to prevent XSS attacks
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Call the login function and handle errors
    $error = loginUser($username, $password);
    
    if (!$error) {
        header("Location: notes.php");
        exit;
    }
}
?>
<?php include '../templates/header.php'; ?>
<h2>Login</h2>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required pattern="[a-zA-Z0-9_]{3,20}" title="3-20 characters: letters, numbers, or underscores">
    <input type="password" name="password" placeholder="Password" required minlength="8">
    <button type="submit">Login</button>
</form>
<?php if (!empty($error)) echo "<p>$error</p>"; ?>
<?php include '../templates/footer.php'; ?>

