<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    die("غير مصرح.");
}

$user_id = $_SESSION['user_id'];
$title = $_POST['title'];
$content = $_POST['content'];

$stmt = $conn->prepare("INSERT INTO novels (user_id, title, content) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $user_id, $title, $content);
$stmt->execute();

header("Location: index.php");
?>