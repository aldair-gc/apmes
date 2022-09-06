            <div class="post <?php echo $row['groupname']; ?>">

                <?php if ($row['youtubeurl'] !== '') { ?>

                    <div class="post-media">
                        <iframe src="https://www.youtube.com/embed/<?php echo $row['youtubeurl'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>

                <?php } else { ?>
                    <?php $filechecked = ($row['file'] === '') ? '/public/images/logo3DPaper_1200.jpg' : $row['file'] ?>
                    <?php $exploded = explode('.', $filechecked); $ext = strtolower(end($exploded)); ?>
                    <?php if ($ext === 'jpg' || $ext === 'jpeg' || $ext === 'gif' || $ext === 'png' || $ext === 'heic') { ?>

                        <img class="post-media" src="<?php echo $filechecked; ?>">The image could not be loaded.</img>

                    <?php } elseif ($ext === 'mov' || $ext === 'mpg' || $ext === 'mpeg' || $ext === 'avi' || $ext === 'wmv' ||
                    $ext === 'ogg' || $ext === 'mp4' || $ext === 'webm') { ?>

                        <video class="post-media" controls><source src="<?php echo $filechecked; ?>">Your browser does not support the video tag.</video>

                    <?php } elseif ($ext === 'mid' || $ext === 'midi' || $ext === 'wma' || $ext === 'aac' || $ext === 'wav' ||
                    $ext === 'mp3') { ?>

                        <audio class="post-media" controls><source src="<?php echo $filechecked; ?>">Your browser does not support the audio tag.</audio>
                    
                    <?php }; }; ?>

                <div class="post-texts">
                    <div class="posts-header">
                        <div class="posts-title"><?php echo $row['title']; ?></div>
                        <div class="posts-date"><?php echo $row['date']; ?></div>
                    </div>
                    <div class="posts-content"><?php echo $row['content']; ?></div>
                </div>