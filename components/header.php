<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Apostolic & Prophetic Ministries El Shaddai</title>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css?v=<?php echo microtime() ?>">
    <script src="https://kit.fontawesome.com/2cc3b4dcd6.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,400;0,700;1,400;1,700&family=Open+Sans:ital,wght@0,300;0,400;1,300;1,400&family=Roboto:ital,wght@0,100;0,300;0,400;1,100;1,300;1,400&display=swap" rel="stylesheet"></head>

<body>
<header>
        <a id="logo" href="/index.php">
            <img src="/public/images/logo-png-small.png" alt="Logo">
            Apostolic & Prophetic Ministries El Shaddai
        </a>

        <input id="menu-check" type="checkbox" name="menu-check" class="hidden">
        <label id="menu-icon" for="menu-check">
            <div id="menu-icon-a"></div>
            <div id="menu-icon-b"></div>
            <div id="menu-icon-c"></div>
        </label>

        <ul id="menu">
            <li class="menu-opt"><a href="/index.php">Home</a></li>
            <li class="menu-opt"><a href="/feed.php">Feed</a></li>
            <li class="menu-opt"><a href="/contact.php">Contact</a></li>
            
            <?php if (session_status === "PHP_SESSION_ACTIVE") { ?>

                <li class="menu-opt"><a class="font-red" href="/php/logout.php">Logout</a></li>

            <?php } ?>

        </ul>
    </header>
    <div class="msg-container"></div>
    