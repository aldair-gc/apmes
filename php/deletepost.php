<?php
require('session.php');
require('db.php');

// delete post
if ($stmt = $conn->prepare('DELETE FROM posts WHERE id=?')) {
    $stmt->bind_param('s', $urlid['id']);
    $stmt->execute();
    header('Location: /feed_editor.php');
} else {
    header('Location: /feed_editor.php?msg=3');
}

$conn->close();
?>
