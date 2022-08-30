<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: /login.html');
    exit;
}

// $DBservername = "localhost";
// $DBdatabase = "u186683530_neidebd";
// $DBusername = "u186683530_neideuser";
// $DBpassword = "0b[L$xIO=";

// $conn = mysqli_connect($DBservername, $DBusername, $DBpassword, $DBdatabase);

// // make the connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }
