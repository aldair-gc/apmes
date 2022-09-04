<?php
require('php/db.php');
require('php/fetch_posts.php');
require('components/header.php');
?>

<main>
        <div class="intro">
            <img src="./public/images/logo-bg-png.png" alt="Logo">
        </div>

        <div class="square-container">
            <div class="square">
                <div class="inner-square" id="church">
                    <div class="square-image"></div>
                    <div class="square-text">
                        <h3></h3>
                        <a href="/thechurch.php">
                            <h2>The Church</h2>
                        </a>
                    </div>
                </div>
            </div>
            <div class="square">
                <div class="inner-square" id="our-family">
                    <div class="square-image"></div>
                    <div class="square-text">
                        <h3></h3>
                        <a href="/our_family.php">
                            <h2>Our Family</h2>
                        </a>
                    </div>
                </div>
            </div>
            <div class="square">
                <div class="inner-square" id="feed">
                    <div class="square-image"></div>
                    <div class="square-text">
                        <h3></h3>
                        <a href="/feed.php">
                            <h2>Feed</h2>
                        </a>
                    </div>
                </div>
            </div>
            <div class="square">
                <div class="inner-square" id="prayers">
                    <div class="square-image"></div>
                    <div class="square-text">
                        <h3></h3>
                        <a href="/prayers.php">
                            <h2>Prayers</h2>
                        </a>
                    </div>
                </div>
            </div>
            <div class="square">
                <div class="inner-square" id="missions">
                    <div class="square-image"></div>
                    <div class="square-text">
                        <h3></h3>
                        <a href="/missions.php">
                            <h2>Missions</h2>
                        </a>
                    </div>
                </div>
            </div>
            <div class="square">
                <div class="inner-square" id="agenda">
                    <div class="square-image"></div>
                    <div class="square-text">
                        <h3></h3>
                        <a href="/agenda.php">
                            <h2>Agenda</h2>
                        </a>
                    </div>
                </div>
            </div>
            <div class="square">
                <div class="inner-square" id="pictures">
                    <div class="square-image"></div>
                    <div class="square-text">
                        <h3></h3>
                        <a href="/pictures.php">
                            <h2>Pictures</h2>
                        </a>
                    </div>
                </div>
            </div>
            <div class="square">
                <div class="inner-square" id="videos">
                    <div class="square-image"></div>
                    <div class="square-text">
                        <h3></h3>
                        <a href="/videos.php">
                            <h2>Videos</h2>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php require('components/footer.php'); ?>
