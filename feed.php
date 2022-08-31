<?php
require('php/db.php');
require('php/fetch_groups.php');
require('php/fetch_posts.php');
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
                </div>

            <?php } ?>
        </div>
    </div>
</main>

<?php require('components/footer.php'); ?>
