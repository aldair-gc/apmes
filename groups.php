<?php
require('php/session.php');
require('php/db.php');
require('php/fetch_groups.php');
require('components/header.php');
?>

<main>
    <div class="bg-blues"></div>

    <div class="container box">
        <div class="filter-menu">
            <ul>
                <li>
                    <a class="midbutton" href="/feed.php">
                        <i class="fa-solid fa-arrow-left"></i>
                        back
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <a class="midbutton" href="/newpost.php">
                        <i class="fa-solid fa-plus"></i>
                        new post
                    </a>
                </li>
            </ul>
        </div>

        <div class="new-post post">
            <h2>Groups</h2>
            <ul id="groups-list">

            <?php while ($row = mysqli_fetch_array($groups)) { ?>
                <li class="smallbutton no-link"><?php echo $row['groupname']; ?>
                    <a class="minibutton font-red"
                        href="<?php echo '/group_delete.php?groupname=' . $row['groupname']; ?>">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </a>
                </li>
            <?php } ?>

            </ul>
            <form action="/php/newgroup.php" method="post">
                <label for="groupname">New group:</label>
                <input type="text" name="groupname" id="groupname">

                <input type="submit" value="Create">
            </form>
        </div>
    </div>
</main>

<?php require('components/footer.php'); ?>
