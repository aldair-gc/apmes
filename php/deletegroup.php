<?php
require_once('session.php');
require_once('db.php');

// delete group
if ($stmt = $conn->prepare('DELETE FROM groups WHERE groupname=?')) {
    $stmt->bind_param('s', $urlid);
    $stmt->execute();
    header('Location: /groups.php?msg=dr');
} else {
    header('Location: /groups.php?msg=ec');
    exit();
}

$conn->close();
?>
