<?php
require_once('session.php');
require_once('db.php');

// check if the fields exist
if (!isset($_POST['groupname'], $_POST['title'], $_POST['content'])) {
    header('Location: /newpost.php?msg=ee');
    exit();
}

// check if the fields are not empty
if (empty($_POST['groupname']) || empty($_POST['title']) || empty($_POST['content'])) {
    header('Location: /newpost.php?msg=ef');
    exit();
}

// handle submitted file
if (!isset($_FILES['file']) || empty($_FILES['file'])) {
    $loadpath = '';
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
if (!isset($_POST['youtubeurl']) || empty($_POST['youtubeurl'])) {
    $youtube = '';
} else {
    $url_exploded = explode('/', $_POST['youtubeurl']);
    $youtube = end($url_exploded);
}

// save the new post in the database
if ($stmt = $conn->prepare('INSERT INTO posts (groupname, title, content, file, youtubeurl) VALUES (?, ?, ?, ?, ?)')) {
    $stmt->bind_param('sssss', $_POST['groupname'], $_POST['title'], $_POST['content'], $loadpath, $youtube);
    $stmt->execute();
    header('Location: /feed.php?msg=ss');
} else {
    header('Location: /feed.php?msg=ec');
    exit();
}

$conn->close();
?>
