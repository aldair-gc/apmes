<?php
require('db.php');

// check if the fields exist
if (!isset($_POST['name'], $_POST['password'], $_POST['email'])) {
    header('Location: /register.php?msg=5');
}

// check if the fields are not empty
if (empty($_POST['name']) || empty($_POST['password']) || empty($_POST['email'])) {
    header('Location: /register.php?msg=6');
}

// validate email
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header('Location: /register.php?msg=7');
}

// invalid characters validation
// if (preg_match('/^[a-zA-Z0-9]+$/', $_POST[name]) == 0) {
//     exit('Name with invalid characters!');
// }

// character length check
if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
    header('Location: /register.php?msg=8');

}

// check if the email is already on the database
if ($stmt = $conn->prepare('SELECT id, password FROM accounts WHERE email = ?')) {
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        header('Location: /register.php?msg=9');
    } else {
        if ($stmt = $conn->prepare('INSERT INTO accounts (name, password, email) VALUES (?, ?, ?)')) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('sss', $_POST['name'], $password, $_POST['email']);
            $stmt->execute();
            header('Location: /home.php');
        } else {
            header('Location: /register.php?msg=3');
        }
    }

    $stmt->close();
} else {
    header('Location: /register.php?msg=4');
}
$conn->close();
?>
