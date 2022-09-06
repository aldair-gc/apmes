<?php
require_once('session.php');
require_once('db.php');

// check if the fields exist
if (!isset($_POST['groupname'], $_POST['title'], $_POST['content'], $_POST['id'])) {
    header('Location: /feed.php?msg=ee');
}

// check if the fields are not empty
if (empty($_POST['groupname']) || empty($_POST['title']) || empty($_POST['content']) || empty($_POST['id'])) {
    header('Location: /feed.php?msg=ef');
}

// handle submitted file
if (isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])) {
    // prepare file's name and save it
    $uploaddir = '../uploads/';
    $origfilename = $_FILES['file']['name'];
    $extension = end(explode('.', $origfilename));
    $newfilename = time() . '_' . rand(1000, 9999) . '.' . $extension;
    $uploadfile = $uploaddir . $newfilename;
    $loadpath = '/uploads' . '/' . $newfilename;
    
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);

    // save the new post in the database
    if ($stmt = $conn->prepare('UPDATE posts SET groupname=?, title=?, content=?, file=? WHERE id=?')) {
        $stmt->bind_param('ssssi', $_POST['groupname'], $_POST['title'], $_POST['content'], $loadpath, $_POST['id']);
        $stmt->execute();
        header('Location: /feed.php?msg=sj');
    } else {
        header('Location: /feed.php?msg=ec');
    }
} else {
    // save the new post in the database
    if ($stmt = $conn->prepare('UPDATE posts SET groupname=?, title=?, content=? WHERE id=?')) {
        $stmt->bind_param('sssi', $_POST['groupname'], $_POST['title'], $_POST['content'], $_POST['id']);
        $stmt->execute();
        header('Location: /feed.php?msg=sj');
    } else {
        header('Location: /feed.php?msg=ec');
    }
}

$conn->close();
?>
