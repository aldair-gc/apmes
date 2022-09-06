<?php
require_once('php/session.php');
require_once('php/db.php');
require('php/fetch_groups.php');
require('components/header.php');
$urlid = htmlspecialchars($_GET["id"]);
$post = mysqli_query($conn, "SELECT groupname, title, content, youtubeurl FROM posts WHERE id=$urlid");
$thispost = mysqli_fetch_array($post);
?>

<main>
<div class="bg-blues"></div>

    <div class="posts-container box">
        <div class="filter-menu">
            <ul>
                <li id="back-to-editor-button" class="midbutton"><a href="/feed.php">back</a></li>
            </ul>
            <ul>
                <li id="new-group-button" class="midbutton"><a href="/groups.php">groups</a></li>
            </ul>
        </div>

        <div class="new-post">
            <div class="post">
                <h2>Edit post</h2>

                <form enctype="multipart/form-data" action="/php/editpost.php" method="POST">
                    <label for="groupname">Group:</label>
                    <div class="radio-list">

                        <?php while ($row = mysqli_fetch_array($groups)) { ?>
                            <div class="radio-option">
                                <input type="radio" name="groupname" id="<?php echo $row['groupname']; ?>" value="<?php echo $row['groupname']; ?>"
                                    <?php echo (($row['groupname'] == $thispost['groupname']) ? ' checked' : '') ?>>
                                <label for="<?php echo $row['groupname']; ?>"><?php echo $row['groupname']; ?></label>
                            </div>
                        <?php } ?>

                    </div>

                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" value="<?php echo $thispost['title'] ?>">

                    <label for="content">Text:</label>
                    <textarea name="content" id="content" cols="30" rows="10"><?php echo $thispost['content'] ?></textarea>

                    <label for="file">Picture, video or audio:</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="6000000">
                    <input type="file" name="file" id="file">

                    <label for="youtubeurl">YouTube url:</label>
                    <input type="text" name="youtubeurl" id="youtubeurl" value="<?php echo $thispost['youtubeurl'] ?>">

                    <input type="hidden" name="id" value="<?php echo $urlid ?>">

                    <input type="submit" value="Update">
                </form>
            </div>
        </div>
    </div>
</main>

<? require('components/footer.php'); ?>
