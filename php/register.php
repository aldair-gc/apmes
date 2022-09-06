<?php
require_once('db.php');

// check if the fields exist
if (!isset($_POST['name'], $_POST['password'], $_POST['email'])) {
    header('Location: /register.php?msg=ee');
    exit();
}

// check if the fields are not empty
if (empty($_POST['name']) || empty($_POST['password']) || empty($_POST['email'])) {
    header('Location: /register.php?msg=ef');
    exit();
}

// validate email
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header('Location: /register.php?msg=eg');
    exit();
}

// character length check
if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
    header('Location: /register.php?msg=eh');
    exit();
}

// check if the email is already on the database
if ($stmt = $conn->prepare('SELECT id, password FROM accounts WHERE email = ?')) {
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        header('Location: /register.php?msg=ei');
        exit();
    } else {
        if ($stmt = $conn->prepare('INSERT INTO accounts (name, password, email) VALUES (?, ?, ?)')) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('sss', $_POST['name'], $password, $_POST['email']);
            $stmt->execute();
            header('Location: /login.php?msg=so');
        } else {
            header('Location: /register.php?msg=ec');
            exit();
        }
    }

    $stmt->close();
} else {
    header('Location: /register.php?msg=ed');
    exit();
}
$conn->close();
?>
