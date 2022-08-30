<?php
include '/header.php';
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

        <div class="posts-container">
            <div class="post-container">
                <!--Posts from DB will be loaded here-->
            </div>
        </div>

</main>

<?php
include '/footer.php';
?>