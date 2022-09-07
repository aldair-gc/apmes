<?php
require('php/session.php');
require('components/header.php');
?>

<main>
    <div class="bg-blues"></div>

    <div class="form-box box">
        <h1>Home</h1>
        <ul id=home-options>
            <il><a href="/feed.php">Feed Manager</a></il>
            <il><a href="/groups.php">Groups manager</a></il>
            <il><a href="/newpost.php">New post</a></il>
            <il><a href="/messages.php">Messages reader</a></il>
        </ul>
    </div>

</main>

<?php require('components/footer.php'); ?>