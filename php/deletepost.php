<?php
require_once('session.php');
require_once('db.php');

// delete post
if ($stmt = $conn->prepare('DELETE FROM posts WHERE id=?')) {
    $stmt->bind_param('i', $urlid);
    $stmt->execute();
    header('Location: /feed_editor.php?msg=11');
} else {
    header('Location: /feed_editor.php?msg=3');
}

$conn->close();
?>
