<?php
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

            </div>

            <div class="new-post post">
                <h2>Prayer request</h2>

                <form enctype="multipart/form-data" action="/php/newmessage.php" method="POST">

                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" placeholder="Enter your name">

                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email">

                    <label for="name">Tel:</label>
                    <input type="tel" name="tel" id="tel" placeholder="Enter your phone number">

                    <label for="content">Message:</label>
                    <textarea name="content" id="content" cols="30" rows="10" placeholder="Write your message here"
                        autocorrect="on"></textarea>

                    <label for="file">Picture, video or audio:</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                    <input type="file" name="file" id="file">

                    <input type="text" name="folder" id="folder" value="prayer" class="hidden">

                    <input type="submit" value="Send">
                </form>
            </div>
        </div>

</main>

<?php require('components/footer.php'); ?>
