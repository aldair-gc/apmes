<?php
$DBservername = "localhost";
$DBdatabase = "u186683530_neidebd";
$DBusername = "u186683530_neideuser";
$DBpassword = "G&vo~k7a";

$conn = mysqli_connect($DBservername, $DBusername, $DBpassword, $DBdatabase);

// make the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// check if the fields exist
if (!isset($_POST['name'], $_POST['password'], $_POST['email'])) {
    exit('Data missing.');
}

// check if the fields are not empty
if (empty($_POST['name']) || empty($_POST['password']) || empty($_POST['email'])) {
    exit('All fields must be fulfilled.');
}

// validate email
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    exit('Invalid email!');
}

// invalid characters validation
if (preg_match('/^[a-zA-Z0-9]+$/', $_POST[name]) == 0) {
    exit('Name with invalid characters!');
}

// character length check
if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
    exit('Password must be between 5 and 20 characters long!');
}

// check if the email is already on the database
if ($stmt = $conn->prepare('SELECT id, password FROM accounts WHERE email = ?')) {
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo 'This email is already registered.';
    } else {
        if ($stmt = $conn->prepare('INSERT INTO accounts (name, password, email) VALUES (?, ?, ?')) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('sss', $_POST['name'], $password, $_POST['email']);
            $stmt->execute();
            echo 'User registered succesfully';
        } else {
            echo 'Error proccessing register!';
        }
    }

    $stmt->close();
} else {
    echo 'Could not prepare statement!';
}
$conn->close();
?>