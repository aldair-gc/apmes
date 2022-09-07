<?php
    if (session_status() !== 2) session_start();
    if (isset($_SESSION['loggedin'])) { ?>

    <div class="post-control">
        <a class="midbutton" href="<?php echo '/replymessage.php?id=' . $row['id']; ?>">
            <i class="fa-solid fa-pen-to-square"></i>reply
        </a>
        <a class="midbutton font-red" href="<?php echo '/deletemessage.php?id=' . $row['id']; ?>">
            <i class="fa-solid fa-eraser"></i>delete
        </a>
    </div>

    <?php while ($row = mysqli_fetch_array($messages)) { ?>
        
        <?php require('message.php') ?>

    <?php } ?>

<?php } ?>
