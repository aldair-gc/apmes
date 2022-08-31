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
                <li id="back-to-editor-button" class="button"><a href="/feed_editor.html">back</a></li>
            </ul>
            <ul>
                <li id="new-group-button" class="button"><a href="/feed_newpost.php">new post</a></li>
            </ul>
        </div>

        <div class="new-post">
            <div class="post">
                <h2>Create new group</h2>
                <ul id="groups-list">

                <?php while ($row = mysqli_fetch_array($groups)) { ?>
                    <li class="button"><?php echo $row['groupname']; ?></li>
                <?php } ?>

                </ul>
                <form action="/php/newgroup.php" method="post">
                    <label for="groupname">New group:</label>
                    <input type="text" name="groupname" id="groupname">

                    <input type="submit" value="Save">
                </form>
            </div>
        </div>
    </div>
</main>

<?php require('components/footer.php'); ?>
