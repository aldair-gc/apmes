<?php
require_once('session.php');
require_once('db.php');

// check if the fields exist
if (!isset($_POST['groupname'], $_POST['title'], $_POST['content'])) {
    header('Location: /newpost.php?msg=ee');
}

// check if the fields are not empty
if (empty($_POST['groupname']) || empty($_POST['title']) || empty($_POST['content'])) {
    header('Location: /newpost.php?msg=ef');
}

// handle submitted file
if (!isset($_FILES['file']) || empty($_FILES['file'])) {
    $uploadfile = '';
} else {
    $uploaddir = '../uploads/';
    $origfilename = $_FILES['file']['name'];
    $exploded = explode('.', $origfilename);
    $extension = end($exploded);
    $newfilename = time() . '_' . rand(1000, 9999) . '.' . $extension;
    $uploadfile = $uploaddir . $newfilename;
    $loadpath = '/uploads' . '/' . $newfilename;
    
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
}

// handle youtube url
if(!isset($_POST['youtubeurl']) || empty($_POST['youtubeurl'])) {
    $youtube = '';
} else {
    $youtube = '<iframe width="560" height="315" src="' . $_POST['youtubeurl'] . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
}

// save the new post in the database
if ($stmt = $conn->prepare('INSERT INTO posts (groupname, title, content, file, youtube) VALUES (?, ?, ?, ?, ?)')) {
    $stmt->bind_param('sssss', $_POST['groupname'], $_POST['title'], $_POST['content'], $loadpath, $youtube);
    $stmt->execute();
    header('Location: /feed.php?msg=ss');
} else {
    header('Location: /feed.php?msg=ec');
}

$conn->close();
?>
