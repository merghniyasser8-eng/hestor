<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>الروايات</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>مرحبا بك في موقع الروايات</h1>
    <a href="logout.php">🚪 تسجيل الخروج</a>

    <form action="submit.php" method="POST">
        <input type="text" name="title" placeholder="عنوان الرواية" required><br>
        <textarea name="content" placeholder="نص الرواية..." rows="8" required></textarea><br>
        <button type="submit">نشر الرواية</button>
    </form>

    <hr>

    <h2>📖 الروايات المنشورة:</h2>
    <div id="novels">
        <?php include 'fetch.php'; ?>
    </div>
</body>
</html>