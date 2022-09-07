<?php
require_once('db.php');

// check if the fields exist
if (!isset($_POST['name'], $_POST['email'], $_POST['tel'], $_POST['message'], $_POST['folder'])) {
    header('Location: /prayer.php?msg=ee');
    exit();
}

// check if the fields are not empty
if (empty($_POST['message']) || empty($_POST['folder'])) {
    header('Location: /prayer.php?msg=ev');
    exit();
}

// handle submitted file
if (!isset($_FILES['file']['name']) || empty($_FILES['file']['name'])) {
    $loadpath = '';
} else {
    $uploaddir = '../uploads/';
    $origfilename = $_FILES['file']['name'];
    $exploded = explode('.', $origfilename);
    $extension = end($exploded);
    $newfilename = 'prayer_' . time() . '_' . rand(1000, 9999) . '.' . $extension;
    $uploadfile = $uploaddir . $newfilename;
    $loadpath = '/uploads' . '/' . $newfilename;
    
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
}

// save the new post in the database
if ($stmt = $conn->prepare('INSERT INTO messages (name, email, tel, message, folder, file) VALUES (?, ?, ?, ?, ?, ?)')) {
    $stmt->bind_param('ssssss', $_POST['name'], $_POST['email'], $_POST['tel'], $_POST['message'], $_POST['folder'], $loadpath);
    $stmt->execute();
    header('Location: /prayer.php?msg=sx');
} else {
    header('Location: /prayer.php?msg=ec');
}

$conn->close();
?>
