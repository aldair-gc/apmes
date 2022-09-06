<?php
session_start();
if (isset($_SESSION['loggedin'])) { ?>

    <ul id="filter-right-menu">
        <li><a class="midbutton" href="/newpost.php"><i class="fa-solid fa-plus"></i> new post</a></li>
        <li><a class="midbutton" href="/groups.php"><i class="fa-solid fa-object-group"></i> groups</a></li>
    </ul>

<?php } ?>
