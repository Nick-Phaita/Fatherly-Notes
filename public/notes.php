<?php
require '../src/notes.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    addNote($_SESSION['user_id'], $_POST['content']);
}
$notes = getNotes($_SESSION['user_id']);
?>
<?php include '../templates/header.php'; ?>
<h2>Your Notes</h2>
<form method="POST">
    <textarea name="content" placeholder="Write your note..." required></textarea>
    <button type="submit">Add Note</button>
</form>
<ul>
    <?php foreach ($notes as $note): ?>
        <li><?php echo htmlspecialchars($note['content']); ?></li>
    <?php endforeach; ?>
</ul>
<?php include '../templates/footer.php'; ?>

