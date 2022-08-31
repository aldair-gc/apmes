<?php
require('session.php');
require('db.php');

// check if the fields exist
if (!isset($_POST['groupname'], $_POST['title'], $_POST['text'])) {
    exit('Data missing.');
}

// check if the fields are not empty
if (empty($_POST['groupname']) || empty($_POST['title']) || empty($_POST['text'])) {
    exit('The fields must be fulfilled.');
}

// handle submitted file
if (!isset($_POST['file']) || empty($_POST['file'])) {
    $uploadfile = '';
} else {
    $uploaddir = '../uploads/';
    $uploadfile = $uploaddir . time() . basename($_FILES['file']['name']);
    
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
}

// save the new post in the database
if ($stmt = $conn->prepare('INSERT INTO posts (groupname, title, text, file) VALUES (?, ?, ?, ?)')) {
    $stmt->bind_param('ssss', $_POST['groupname'], $_POST['title'], $_POST['text'], $uploadfile);
    $stmt->execute();
    header('Location: /home.php');
} else {
    echo 'Error proccessing register request!';
}

$conn->close();
?>
