<?php
include('session.php');
include('db.php');

// check if the fields exist
if (!isset($_POST['groupname'])) {
    exit('Data missing.');
}

// check if the fields are not empty
if (empty($_POST['groupname'])) {
    exit('The field must be fulfilled.');
}

// check if the group is already on the database
if ($stmt = $conn->prepare('SELECT id FROM groups WHERE groupname = ?')) {
    $stmt->bind_param('s', $_POST['groupname']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo 'This group is already registered.';
    } else {
        // save the new group in the database
        if ($stmt = $conn->prepare('INSERT INTO groups (groupname) VALUES (?)')) {
            $stmt->bind_param('s', $_POST['groupname']);
            $stmt->execute();
            header('Location: ../../home.php');
        } else {
            echo 'Error proccessing register request!';
        }
    }

    $stmt->close();
} else {
    echo 'Could not prepare statement!';
}

$conn->close();
?>
