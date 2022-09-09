<?php
require_once('session.php');
require_once('db.php');

// delete post
if ($stmt = $conn->prepare('DELETE FROM messages WHERE id=?')) {
    $stmt->bind_param('i', $urlid);
    $stmt->execute();
    header('Location: /messages.php?msg=dy');
} else {
    header('Location: /messages.php?msg=ec');
}

$conn->close();
?>
