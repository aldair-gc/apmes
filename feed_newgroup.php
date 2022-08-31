<?php
require('public/php/session.php');
require('public/php/fetch_groups.php');
?>

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
                    <li id="back-to-editor-button" class="button"><a href="/feed_editor.html">back</a></li>
                </ul>
                <ul>
                    <li id="new-group-button" class="button"><a href="/feed_newpost.php">new post</a></li>
                </ul>
            </div>

            <div class="new-post">
                <div class="post">
                    <h2>Create new group</h2>

                    <form action="/public/php/newgroup.php" method="post">
                        <label for="groupname">Group name:</label>
                        <input type="text" name="groupname" id="groupname">

                        <input type="button" value="Save">
                    </form>
                </div>
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