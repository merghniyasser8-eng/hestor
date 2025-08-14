<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "novel_site";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}
?>