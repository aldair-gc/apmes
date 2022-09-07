<?php
require('php/session.php');
require('components/header.php');
?>

<main>
    <div class="bg-blues"></div>

    <div class="form-box box">
            <h1>Management</h1>
            <ul id=home-options>
                <li><a href="/feed.php"><i class="fa-solid fa-table-list"></i>Feed Manager</a></li>
                <li><a href="/messages.php"><i class="fa-solid fa-envelope-open-text"></i>Messages reader</a></li>
                <li><a href="/newpost.php"><i class="fa-solid fa-square-plus"></i>New post</a></li>
                <li><a href="/groups.php"><i class="fa-solid fa-object-group"></i>Groups manager</a></li>
            </ul>
    </div>

</main>

<?php require('components/footer.php'); ?>