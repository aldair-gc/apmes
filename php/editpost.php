<?php
require_once('session.php');
require_once('db.php');

// check if the fields exist
if (!isset($_POST['groupname'], $_POST['title'], $_POST['content'], $_POST['id'])) {
    header('Location: /feed.php?msg=ee');
    exit();
}

// check if the fields are not empty
if (empty($_POST['groupname']) || empty($_POST['title']) || empty($_POST['content']) || empty($_POST['id'])) {
    header('Location: /feed.php?msg=ef');
    exit();
}

// handle submitted file
if (isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])) {
    // prepare file's name and save it
    $uploaddir = '../uploads/';
    $origfilename = $_FILES['file']['name'];
    $exploded = explode('.', $origfilename);
    $extension = end($exploded);
    $newfilename = time() . '_' . rand(1000, 9999) . '.' . $extension;
    $uploadfile = $uploaddir . $newfilename;
    $loadpath = '/uploads' . '/' . $newfilename;
    
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);

// handle youtube url
if(!isset($_POST['youtubeurl']) || empty($_POST['youtubeurl'])) {
    $youtubeurl = '';
} else {
    $youtubeurl = $_POST['youtubeurl'];
}

    // save the new post in the database
    if ($stmt = $conn->prepare('UPDATE posts SET groupname=?, title=?, content=?, file=?, youtubeurl=? WHERE id=?')) {
        $stmt->bind_param('sssssi', $_POST['groupname'], $_POST['title'], $_POST['content'], $loadpath, $youtubeurl, $_POST['id']);
        $stmt->execute();
        header('Location: /feed.php?msg=sj');
    } else {
        header('Location: /feed.php?msg=ec');
        exit();
    }
} else {
    // save the new post in the database
    if ($stmt = $conn->prepare('UPDATE posts SET groupname=?, title=?, content=?, youtubeurl=? WHERE id=?')) {
        $stmt->bind_param('ssssi', $_POST['groupname'], $_POST['title'], $_POST['content'], $youtubeurl, $_POST['id']);
        $stmt->execute();
        header('Location: /feed.php?msg=sj');
    } else {
        header('Location: /feed.php?msg=ec');
        exit();
    }
}

$conn->close();
?>
