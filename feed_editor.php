<?php
require('php/session.php');
require('php/db.php');
require('php/fetch_posts.php');
require('php/fetch_groups.php');
require('components/header.php');
?>

<main>
<div class="bg-blues"></div>

    <div class="posts-container">
        <div class="filter-menu">
            <ul id="filters">
                <li id="all" class="smallbutton active">all</li>
                <?php while ($row = mysqli_fetch_array($groups)) { ?>
                    <li id="<?php echo $row['groupname']; ?>" class="groupname smallbutton"><?php echo $row['groupname']; ?></li>
                <?php } ?>
            </ul>
            <ul id="filter-right-menu">
                <li id="new-post-button" class="midbutton"><a href="/feed_newpost.php">new post</a></li>
                <li id="new-group-button" class="midbutton"><a href="/feed_newgroup.php">new group</a></li>
            </ul>
        </div>

        <div class="post-container">
            <?php while ($row = mysqli_fetch_array($posts)) { ?>
                <?php $filechecked = ($row['file'] === '') ? '/public/images/bible-2110439_640.jpg' : $row['file'] ?>

                <div class="post <?php echo $row['groupname']; ?>">
                    <img class="post-media" src="<?php echo $filechecked; ?>"></img>
                    <div class="post-texts">
                        <div class="posts-header">
                            <div class="posts-title"><?php echo $row['title']; ?></div>
                            <div class="posts-date"><?php echo $row['date']; ?></div>
                        </div>
                        <div class="posts-content"><?php echo $row['content']; ?></div>
                    </div>
                    <div class="post-control">
                        <a
                            class="smallbutton" class="post-edit"
                            href="<?php echo '/post_editor.php?id=' . $row['id']; ?>">
                            edit
                        </a>
                        <a
                            class="smallbutton" class="post-delete"
                            href="<?php echo '/post_delete.php?id=' . $row['id']; ?>">
                            delete
                        </a>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</main>

<?php require('components/footer.php') ?>
