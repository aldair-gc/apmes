<?php
require('php/db.php');
require('php/fetch_messages.php');
require('components/header.php');
?>

<main>
<div class="bg-blues"></div>

    <div class="posts-container">
        <div class="filter-menu">
            <ul id="filters">
                <li id="prayer" class="smallbutton">prayer</li>
            </ul>
        </div>

        <div class="post-container">

            <?php require('php/buildmessages.php') ?>

        </div>
    </div>
</main>

<?php require('components/footer.php'); ?>
