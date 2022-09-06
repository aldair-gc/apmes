                <?php $filechecked = ($row['file'] === '') ? '/public/images/logo3DPaper_1200.jpg' : $row['file'] ?>
                <?php $ext = strtolower(end(explode('.', $row['file']))); ?>

                <div class="post <?php echo $row['groupname']; ?>">
                    
                    <?php if ($ext === 'jpg' || $ext === 'jpeg' || $ext === 'gif' || $ext === 'png' || $ext === 'heic') { ?>

                        <img class="post-media" src="<?php echo $filechecked; ?>"></img>
                        
                    <?php } elseif ($ext === 'mov' || $ext === 'mpg' || $ext === 'mpeg' || $ext === 'avi' || $ext === 'wmv' ||
                    $ext === 'ogg' || $ext === 'mp4' || $ext === 'webm') { ?>

                        <video class="post-media" controls>
                            <source src="<?php echo $filechecked; ?>">
                            Your browser does not support the video tag.
                        </video>
                    
                    <?php } ?>

                    <div class="post-texts">
                        <div class="posts-header">
                            <div class="posts-title"><?php echo $row['title']; ?></div>
                            <div class="posts-date"><?php echo $row['date']; ?></div>
                        </div>
                        <div class="posts-content"><?php echo $row['content']; ?></div>
                    </div>