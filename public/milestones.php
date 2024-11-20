<?php
require '../src/milestones.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    addMilestone($_SESSION['user_id'], $_POST['description'], $_POST['date']);
}
$milestones = getMilestones($_SESSION['user_id']);
?>
<?php include '../templates/header.php'; ?>
<h2>Your Milestones</h2>
<form method="POST">
    <input type="text" name="description" placeholder="Milestone Description" required>
    <input type="date" name="date" required>
    <button type="submit">Add Milestone</button>
</form>
<ul>
    <?php foreach ($milestones as $milestone): ?>
        <li><?php echo htmlspecialchars($milestone['description']) . " (" . htmlspecialchars($milestone['milestone_date']) . ")"; ?></li>
    <?php endforeach; ?>
</ul>
<?php include '../templates/footer.php'; ?>

