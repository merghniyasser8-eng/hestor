<?php
include 'db.php';

$phone = $_POST['phone'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// تحقق من وجود الرقم
$stmt = $conn->prepare("SELECT id FROM users WHERE phone = ?");
$stmt->bind_param("s", $phone);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    die("رقم الهاتف مسجّل مسبقًا.");
}

$stmt = $conn->prepare("INSERT INTO users (phone, password) VALUES (?, ?)");
$stmt->bind_param("ss", $phone, $password);
$stmt->execute();

header("Location: login.html");
?>