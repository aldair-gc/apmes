<?php
require_once('session.php');
require_once('db.php');

// check if the fields exist
if (!isset($_POST['groupname'])) {
    header('Location: /groups.php?msg=ee');
    exit();
}

// check if the fields are not empty
if (empty($_POST['groupname'])) {
    header('Location: /groups.php?msg=ef');
    exit();
}

// check if the characters are valid
if (preg_match('/\S{1,20}\g/', $_POST['groupname']) == 0) {
    header('Location: /groups.php?msg=eu');
    exit();
}

// check if the group is already on the database
if ($stmt = $conn->prepare('SELECT id FROM groups WHERE groupname = ?')) {
    $stmt->bind_param('s', $_POST['groupname']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        header('Location: /groups.php?msg=el');
    } else {
        // save the new group in the database
        if ($stmt = $conn->prepare('INSERT INTO groups (groupname) VALUES (?)')) {
            $stmt->bind_param('s', $_POST['groupname']);
            $stmt->execute();
            header('Location: /groups.php?msg=sm');
        } else {
            header('Location: /feed.php?msg=ec');
            exit();
        }
    }

    $stmt->close();
} else {
    header('Location: /feed.php?msg=ed');
    exit();
}

$conn->close();
?>
