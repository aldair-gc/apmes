<?php
require('php/session.php');
require('php/db.php');
require('php/fetch_groups.php');
require('components/header.php');
?>

<main>
    <div class="posts-container box">
        <div class="filter-menu">
            <ul>
                <li id="back-to-editor-button" class="button"><a href="/home.php">back</a></li>
            </ul>
            <ul>
                <li id="new-group-button" class="button"><a href="/feed_newgroup.php">new group</a></li>
            </ul>
        </div>

        <div class="new-post">
            <div class="post">
                <h2>Create new post</h2>

                <form enctype="multipart/form-data" action="/php/newpost.php" method="POST">
                    <label for="groupname">Group:</label>
                    <div class="radio-list">

                        <?php while ($row = mysqli_fetch_array($groups)) { ?>
                            <div class="radio-option">
                                <input type="radio" name="groupname" id="<?php echo $row['groupname']; ?>" value="<?php echo $row['groupname']; ?>">
                                <label for="<?php echo $row['groupname']; ?>"><?php echo $row['groupname']; ?></label>
                            </div>
                        <?php } ?>

                    </div>

                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title">

                    <label for="content">Text:</label>
                    <textarea name="content" id="content" cols="30" rows="10"></textarea>

                    <label for="file">Picture, video or audio:</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="6000000">
                    <input type="file" name="file" id="file">

                    <input type="submit" value="Save">
                </form>
            </div>
        </div>
    </div>
</main>

<?php require('components/footer.php'); ?>
