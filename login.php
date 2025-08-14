<?php
session_start();
include 'db.php';

$phone = $_POST['phone'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT id, password FROM users WHERE phone = ?");
$stmt->bind_param("s", $phone);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 1) {
    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $id;
        header("Location: index.php");
        exit;
    } else {
        echo "كلمة السر غير صحيحة.";
    }
} else {
    echo "رقم الهاتف غير موجود.";
}
?>