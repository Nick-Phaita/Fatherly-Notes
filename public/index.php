<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
?>
<?php include '../templates/header.php'; ?>
<h2>Welcome to Fatherly Notes</h2>
<p>A place where fathers can jot down their thoughts, track milestones, and connect with their fatherhood journey.</p>

<?php if ($isLoggedIn): ?>
    <p>Welcome back! Use the navigation menu to access your notes and milestones.</p>
    <a href="logout.php">Logout</a>
<?php else: ?>
    <p>Please <a href="login.php">login</a> or <a href="register.php">register</a> to get started.</p>
<?php endif; ?>

<?php include '../templates/footer.php'; ?>
