<?php
require('php/db.php');
require('php/fetch_groups.php');
require('php/fetch_posts.php');
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

            <?php require('php/feed_right_menu.php') ?>

        </div>

        <div class="post-container">

            <?php require('php/buildposts.php') ?>

        </div>
    </div>
</main>

<?php require('components/footer.php'); ?>
