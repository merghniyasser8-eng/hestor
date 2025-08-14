<?php
include 'db.php';

$sql = "SELECT n.title, n.content, n.created_at, u.phone
        FROM novels n
        JOIN users u ON n.user_id = u.id
        ORDER BY n.created_at DESC";

$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<div class='novel'>";
    echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
    echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
    echo "<small>الكاتب: " . htmlspecialchars($row['phone']) . " | التاريخ: " . $row['created_at'] . "</small>";
    echo "</div>";
}
?>