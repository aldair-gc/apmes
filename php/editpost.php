<?php
require_once('session.php');
require_once('db.php');

// check if the fields exist
if (!isset($_POST['groupname'], $_POST['title'], $_POST['content'], $_POST['id'])) {
    exit('Data missing.');
}

// check if the fields are not empty
if (empty($_POST['groupname']) || empty($_POST['title']) || empty($_POST['content']) || empty($_POST['id'])) {
    exit('The fields must be fulfilled.');
}

// handle submitted file
if (!isset($_FILES['file']) || empty($_FILES['file'])) {
    // save the new post in the database
    if ($stmt = $conn->prepare('UPDATE posts SET groupname=?, title=?, content=? WHERE id=?')) {
        $stmt->bind_param('ssss', $_POST['groupname'], $_POST['title'], $_POST['content'], $_POST['id']);
        $stmt->execute();
        header('Location: /feed_editor.php');
    } else {
        header('Location: /feed_editor.php?msg=3');
    }
} else {
    $uploaddir = '../uploads/';
    $origfilename = $_FILES['file']['name'];
    $extension = end(explode('.', $origfilename));
    $newfilename = time() . '_' . rand(1000, 9999) . '.' . $extension;
    $uploadfile = $uploaddir . $newfilename;
    $loadpath = '/uploads' . '/' . $newfilename;
    
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);

    // save the new post in the database
    if ($stmt = $conn->prepare('UPDATE posts SET groupname=?, title=?, content=? file=? WHERE id=?')) {
        $stmt->bind_param('sssss', $_POST['groupname'], $_POST['title'], $_POST['content'], $loadpath, $_POST['id']);
        $stmt->execute();
        header('Location: /feed_editor.php');
    } else {
        header('Location: /feed_editor.php?msg=3');
    }
}

$conn->close();
?>
