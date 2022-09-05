<?php
require('php/session.php');
require('php/db.php');
$urlid = htmlspecialchars($_GET["groupname"]);
require('php/deletegroup.php');
?>