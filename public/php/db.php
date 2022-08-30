<?php
$DB_HOST = "localhost";
$DB_NAME = "u186683530_neidebd";
$DB_USER = "u186683530_neideuser";
$DB_PASS = "G&vo~k7a";

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

// make the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>