<?php
require_once('session.php');
require_once('db.php');

// delete post
if ($stmt = $conn->prepare('DELETE FROM posts WHERE id=?')) {
    $stmt->bind_param('i', $urlid);
    $stmt->execute();
    header('Location: /feed.php?msg=dk');
} else {
    header('Location: /feed.php?msg=ec');
    exit();
}

$conn->close();
?>
