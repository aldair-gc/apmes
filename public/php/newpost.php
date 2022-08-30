<?php

// check if user is logged in
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: /login.html');
    exit;
}

// connect database
$DB_HOST = "localhost";
$DB_USER = "u186683530_neideuser";
$DB_PASS = "G&vo~k7a";
$DB_NAME = "u186683530_neidebd";

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

// make the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

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
    $uploaddir = '/public/uploads/';
    $uploadfile = $uploaddir . time() . basename($_FILES['file']['name']);
    
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
}

// save the new post in the database
if ($stmt = $conn->prepare('INSERT INTO posts (groupname, title, text, file) VALUES (?, ?, ?, ?)')) {
    $stmt->bind_param('ssss', $_POST['groupname'], $_POST['title'], $_POST['text'], $uploadfile);
    $stmt->execute();
    header('Location: /public/php/home.php');
} else {
    echo 'Error proccessing register request!';
}


$conn->close();

?>
