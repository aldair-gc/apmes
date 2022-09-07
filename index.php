<?php
require('php/db.php');
require('php/fetch_posts.php');
require('components/header.php');
?>

<main>
    <div class="intro">
            <img src="./public/images/logo-bg-png.png" alt="Logo">
        </div>

        <div class="block-bg-white text-block">
            <h1>HOW PRECIOUS IS THY WORD, GOD OF ISRAEL</h1>
            <hr>
            <p>Let's rejoice in the presence of our God and Savior. We are committed to preach the Word of God, and in
                his Son Jesus Christ. It our pleasure to be here to serve you, in Jesus name.</p>
        </div>

        <div class="block-bg-blue">
            <div class="square-container">
                <div class="block-flex-wrap">
                    <div class="square">
                        <div class="inner-square" id="church">
                            <div class="square-image"></div>
                        </div>
                    </div>

                    <div class="square stretch">
                        <div class="rectangle-text">
                            <a href="/thechurch.php">
                                <h1>The Church</h1>
                            </a>
                            The places like Apostolic and Prophetic Ministries El Shaddai are not only religiously
                            important
                            but as well have great historic value in our country. This is one of the churches of
                            Massachusetts. Not solely providing a space to worship God, it can also host recreational
                            events, join diverse cultural activities, establish a friendly group of like-minded persons
                            and
                            offer vital social care.
                        </div>
                    </div>
                </div>

                <div class="block-flex-wrap wrap-reverse">
                    <div class="square stretch">
                        <div class="rectangle-text">
                            <a href="/our_family.php">
                                <h1>Our Family</h1>
                            </a>
                            The places like Apostolic and Prophetic Ministries El Shaddai are not only religiously
                            important
                            but as well have great historic value in our country. This is one of the churches of
                            Massachusetts. Not solely providing a space to worship God, it can also host recreational
                            events, join diverse cultural activities, establish a friendly group of like-minded persons
                            and
                            offer vital social care.
                        </div>
                    </div>
                    <div class="square">
                        <div class="inner-square" id="our-family">
                            <div class="square-image"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="block-bg-white">
            <div class="carousel block-bg-white">

                <ul class="carousel">
                    <input class="carousel_activator" type="radio" id="A" name="activator" checked="checked" />
                    <input class="carousel_activator" type="radio" id="B" name="activator" />
                    <input class="carousel_activator" type="radio" id="C" name="activator" />
                    <input class="carousel_activator" type="radio" id="D" name="activator" />
                    <div class="carousel_controls">
                        <label class="carousel_control carousel_control_backward" for="D"></label>
                        <label class="carousel_control carousel_control_forward" for="B"></label>
                    </div>
                    <div class="carousel_controls">
                        <label class="carousel_control carousel_control_backward" for="A"></label>
                        <label class="carousel_control carousel_control_forward" for="C"></label>
                    </div>
                    <div class="carousel_controls">
                        <label class="carousel_control carousel_control_backward" for="B"></label>
                        <label class="carousel_control carousel_control_forward" for="D"></label>
                    </div>
                    <div class="carousel_controls">
                        <label class="carousel_control carousel_control_backward" for="C"></label>
                        <label class="carousel_control carousel_control_forward" for="A"></label>
                    </div>
                    <li class="carousel_slide">
                        <h1></h1>
                    </li>
                    <li class="carousel_slide">
                        <h1></h1>
                    </li>
                    <li class="carousel_slide">
                        <h1></h1>
                    </li>
                    <li class="carousel_slide">
                        <h1></h1>
                    </li>
                    <div class="carousel_indicators">
                        <label class="carousel_indicator" for="A"></label>
                        <label class="carousel_indicator" for="B"></label>
                        <label class="carousel_indicator" for="C"></label>
                        <label class="carousel_indicator" for="D"></label>
                    </div>
                </ul>

            </div>
        </div>

        <div class="square-container">
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
                        <a href="/prayer.php">
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
