<?php
    if (session_status() !== 2) session_start();
    if (isset($_SESSION['loggedin'])) { ?>

    <?php while ($row = mysqli_fetch_array($posts)) { ?>

        <?php require('post.php') ?>

        <div class="post-control">
            <a class="midbutton" href="<?php echo '/post_editor.php?id=' . $row['id']; ?>">
                <i class="fa-solid fa-pen-to-square"></i>edit
            </a>
            <a class="midbutton font-red" href="<?php echo '/post_delete.php?id=' . $row['id']; ?>">
                <i class="fa-solid fa-eraser"></i>delete
            </a>
            </div>
        </div>

    <?php } ?>

<?php } else { ?>

    <?php while ($row = mysqli_fetch_array($posts)) { ?>
        
        <?php require('post.php') ?>
        </div>

    <?php } ?>

<?php } ?>
