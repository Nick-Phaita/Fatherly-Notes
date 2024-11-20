<?php
require 'db.php';

// Fetch Milestones
function getMilestones($userId) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM milestones WHERE user_id = ?");
    $stmt->execute([$userId]);
    return $stmt->fetchAll();
}

// Add Milestone
function addMilestone($userId, $description, $date) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO milestones (user_id, description, milestone_date) VALUES (?, ?, ?)");
    $stmt->execute([$userId, $description, $date]);
}
?>

