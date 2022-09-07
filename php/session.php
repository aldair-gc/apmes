<?php
if (session_status() !== 2) session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: /login.php?msg=en');
    exit;
}
