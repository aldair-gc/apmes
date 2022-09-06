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
        </div>

        <div class="post-container">
            <?php while ($row = mysqli_fetch_array($posts)) { ?>
                <?php $filechecked = ($row['file'] === '') ? '/public/images/logo3DPaper_1200.jpg' : $row['file'] ?>
                <?php $ext = strtolower(end(explode('.', $row['file']))); ?>

                <div class="post <?php echo $row['groupname']; ?>">
                    
                    <?php if ($ext === 'jpg' || $ext === 'jpeg' || $ext === 'gif' || $ext === 'png' || $ext === 'heic') { ?>

                        <img class="post-media" src="<?php echo $filechecked; ?>"></img>
                        
                    <?php } elseif ($ext === 'mov' || $ext === 'mpg' || $ext === 'mpeg' || $ext === 'avi' || $ext === 'wmv' ||
                    $ext === 'ogg' || $ext === 'mp4' || $ext === 'webm') { ?>

                        <video class="post-media" controls>
                            <source src="<?php echo $filechecked; ?>">
                            Your browser does not support the video tag.
                        </video>
                    
                    <?php } ?>

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
