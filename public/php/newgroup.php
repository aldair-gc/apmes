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
            header('Location: /public/php/home.php');
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
