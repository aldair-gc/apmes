<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.html');
    exit;
}
>?

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Apostolic & Prophetic Ministries El Shaddai</title>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
</head>

<body>
    <nav>
        <div id="logo">
            <img src="./public/images/logo-png-small.png" alt="Logo">
            Apostolic & Prophetic Ministries El Shaddai
        </div>
        <ul>
            <li><a href="/index.html">Home</a></li>
            <li><a href="/feed.html">Feed</a></li>
            <li><a href="/login.html">Login</a></li>
        </ul>
    </nav>
    <main>

        <div class="posts-container box">
            <div class="filter-menu">
                <ul>
                    <li id="all" class="button active">all</li>
                    <li id="group1" class="button">group1</li>
                    <li id="group2" class="button">group2</li>
                </ul>
                <ul>
                    <li id="new-post" class="button">new post</li>
                    <li id="new-post" class="button">new group</li>
                </ul>
            </div>

            <div class="post-container">
                <!--Posts from DB will be loaded here-->
            </div>
        </div>

    </main>
    <footer>
        <div class="footer-container">
            <div class="footer-col">footer1</div>
            <div class="footer-col">footer2</div>
            <div class="footer-col">footer3</div>
        </div>
    </footer>
    <script src="./public/js/script.js" type="module"></script>
</body>

</html>

