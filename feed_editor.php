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
                <li><a class="midbutton" href="/feed_newpost.php"><i class="fa-solid fa-plus"></i> new post</a></li>
                <li><a class="midbutton" href="/groups.php"><i class="fa-solid fa-object-group"></i> groups</a></li>
            </ul>
        </div>

        <div class="post-container">
            <?php while ($row = mysqli_fetch_array($posts)) { ?>
                <?php require('php/post.php') ?>

                    <div class="post-control">
                        <a
                            class="midbutton"
                            href="<?php echo '/post_editor.php?id=' . $row['id']; ?>">
                            <i class="fa-solid fa-pen-to-square"></i> edit
                        </a>
                        <a
                            class="midbutton font-red"
                            href="<?php echo '/post_delete.php?id=' . $row['id']; ?>">
                            <i class="fa-solid fa-eraser"></i> delete
                        </a>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</main>

<?php require('components/footer.php') ?>
