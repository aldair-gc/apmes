<?php
require('php/db.php');
require('php/fetch_posts.php');
require('components/header.php');
?>

<main>
    <div class="intro box">
        <img src="./public/images/logo-bg-png.png" alt="Logo">
    </div>

    <div class="square-container box">
        <div class="square" id="church">
            <h2>The Church</h2>
            <div class="bgblur"></div>
        </div>
        <div class="square" id="prayers">
            <h2>Prayers</h2>
            <div class="bgblur"></div>
        </div>
        <div class="square" id="missions">
            <h2>Missions</h2>
            <div class="bgblur"></div>
        </div>
        <div class="square" id="agenda">
            <h2>Agenda</h2>
            <div class="bgblur"></div>
        </div>
        <div class="square" id="pictures">
            <h2>Pictures</h2>
            <div class="bgblur"></div>
        </div>
        <div class="square" id="videos">
            <h2>Videos</h2>
            <div class="bgblur"></div>
        </div>
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
</main>

<?php require('components/footer.php'); ?>
