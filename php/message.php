            <div class="post <?php echo $row['folder']; ?>">
            
                <div class="post-control">
                    <a class="midbutton" href="<?php echo '/replymessage.php?id=' . $row['id']; ?>">
                        <i class="fa-solid fa-pen-to-square"></i>reply
                    </a>
                    <a class="midbutton font-red" href="<?php echo '/deletemessage.php?id=' . $row['id']; ?>">
                        <i class="fa-solid fa-eraser"></i>delete
                    </a>
                </div>

                <div class="message-text">
                    <div class="message-header">
                        <div class="name">Name: <?php echo $row['name']; ?></div>
                        <div class="email">Email: <?php echo $row['email']; ?></div>
                        <div class="tel">Tel: <?php echo $row['tel']; ?></div>
                        <div class="date">Date: <?php echo $row['date']; ?></div>
                    </div>
                    <hr>
                    <div class="posts-content"><?php echo $row['message']; ?></div>
                </div>

                <?php if ($row['file'] !== '') { ?>

                    <div class="message-file">
                        <?php $exploded = explode('.', $row['file']); $ext = strtolower(end($exploded)); ?>
                        <?php if ($ext === 'jpg' || $ext === 'jpeg' || $ext === 'gif' || $ext === 'png' || $ext === 'heic') { ?>

                            <img class="post-media" src="<?php echo $row['file']; ?>"></img>

                        <?php } elseif ($ext === 'mov' || $ext === 'mpg' || $ext === 'mpeg' || $ext === 'avi' || $ext === 'wmv' ||
                        $ext === 'ogg' || $ext === 'mp4' || $ext === 'webm') { ?>

                            <video class="post-media" controls><source src="<?php echo $row['file']; ?>">Your browser does not support the video tag.</video>

                        <?php } elseif ($ext === 'mid' || $ext === 'midi' || $ext === 'wma' || $ext === 'aac' || $ext === 'wav' ||
                        $ext === 'mp3') { ?>

                            <audio class="post-media" controls><source src="<?php echo $row['file']; ?>">Your browser does not support the audio tag.</audio>

                        <?php }; ?>

                    </div>
                <?php }; ?>
                
            </div>

