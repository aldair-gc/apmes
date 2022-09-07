<?php
    if (session_status() !== 2) session_start();
    if (isset($_SESSION['loggedin'])) { ?>

    <?php while ($row = mysqli_fetch_array($messages)) { ?>
        
        <?php require('message.php') ?>

    <?php } ?>

<?php } ?>
