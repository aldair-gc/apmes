<?php
session_start();
require_once('db.php');

// check the submitted data
if ( !isset($_POST['email'], $_POST['password']) ) {
    header('Location: /login.php?msg=6');
}

if ( empty($_POST['email']) || empty($_POST['password']) ) {
    header('Location: /login.php?msg=6');
}

// validate email
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header('Location: /register.php?msg=7');
}

// character length check
if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
    header('Location: /register.php?msg=8');

}

// prepare SQL statement
if ($stmt = $conn->prepare('SELECT id, password FROM accounts WHERE email = ?')) {
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();

        // Account exists, now verify the password
        if (password_verify($_POST['password'], $password)) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['id'] = $id;
            header('Location: /home.php');
        } else {
            header('Location: /login.php?msg=1');
        }
    } else {
        header('Location: /login.php?msg=2');
    }

    $stmt->close();
}

$conn->close();
?>
