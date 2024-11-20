<?php
require 'db.php';

// Fetch Notes
function getNotes($userId) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM notes WHERE user_id = ?");
    $stmt->execute([$userId]);
    return $stmt->fetchAll();
}

// Add Note
function addNote($userId, $content) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO notes (user_id, content) VALUES (?, ?)");
    $stmt->execute([$userId, $content]);
}
?>

