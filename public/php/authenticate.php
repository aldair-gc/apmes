<?php
session_start();

$DBservername = "localhost";
$DBdatabase = "u186683530_neidebd";
$DBusername = "u186683530_neideuser";
$DBpassword = "0b[L$xIO=";

$conn = mysqli_connect($DBservername, $DBusername, $DBpassword, $DBdatabase);

// make the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// check the submitted data
if ( !isset($_POST['email'], $_POST['password']) ) {
    exit('Email and password are required.');
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
            header('Location: home.php');
        } else {
            echo 'Incorrect email and/or password!';
        }
    } else {
        echo 'Email not registered!';
    }

    $stmt->close();
}


$conn->close();
?>