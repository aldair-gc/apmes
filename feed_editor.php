<?php
require('public/php/session.php');
require('public/php/db.php');
require('public/php/fetch_posts_edit.php');
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
            <img src="/public/images/logo-png-small.png" alt="Logo">
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
                <ul id="filters">
                    <li id="all" class="button active">all</li>
                    <?php while ($row = mysqli_fetch_array($groups)) { ?>
                        <li id="<?php echo $row['groupname']; ?>" class="groupname button"><?php echo $row['groupname']; ?></li>
                    <?php } ?>
                </ul>
                <ul>
                    <li id="new-post-button" class="button"><a href="/feed_newpost.php">new post</a></li>
                    <li id="new-group-button" class="button"><a href="/feed_newgroup.php">new group</a></li>
                </ul>
            </div>

            <div class="post-container">
                <?php while ($row = mysqli_fetch_array($posts)) { ?>

                    <div class="post <?php echo $row['groupname']; ?>">
                        <img class="post-media" src="<?php echo $row['file']; ?>"></img>
                        <div class="post-texts">
                            <div class="posts-header">
                                <div class="posts-title"><?php echo $row['title']; ?></div>
                                <div class="posts-date"><?php echo $row['date']; ?></div>
                            </div>
                            <div class="posts-content"><?php echo $row['content']; ?></div>
                        </div>
                        <div class="post-control">
                            <button class="button" id="post-edit">edit</button>
                            <button class="button" id="post-delete">delete</button>
                        </div>
                    </div>

                <?php } ?>
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
    <script src="/public/js/script.js" type="module"></script>
</body>

</html>