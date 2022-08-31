<?php
require('php/session.php');
require('php/db.php');
require('php/fetch_posts_edit.php');
require('php/fetch_groups.php');
require('components/header.php');
?>

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
                        <button class="button" id="post-edit">edit</button>
                        <button class="button" id="post-delete">delete</button>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</main>

<?php require('components/footer.php') ?>
