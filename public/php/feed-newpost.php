<?php
include('connect.php');


// get registered groups from database
$groups = mysqli_query($conn, "SELECT * FROM groups");

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
                    <li id="back-to-editor-button" class="button"><a href="/feed-editor.html">back</a></li>
                </ul>
                <ul>
                    <li id="new-group-button" class="button"><a href="/feed-newgroup.html">new group</a></li>
                </ul>
            </div>

            <div class="new-post">
                <div class="post">
                    <h2>Create new post</h2>

                    <form action="/public/php/newpost.php" method="post">
                        <label for="groupname">Group:</label>
                        <input list="groups" name="groupname" id="groupname">
                        <datalist id="groups">
                            <?php while ($row = mysqli_fetch_array($groups)) { ?>
                                <option value="<?php echo $row['groupname']; ?>">
                            <?php } ?>
                        </datalist>

                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title">

                        <label for="content">Text:</label>
                        <textarea name="content" id="content" cols="30" rows="10"></textarea>

                        <label for="file">File:</label>
                        <input type="file" name="file" id="file">

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