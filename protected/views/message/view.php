
 <?php foreach ($messages as $key => $message) { ?>
            <div class="well">
                <h5>Message de : <?php echo $message['login']; ?></h5>
                <p><?php echo $message['content'] ?></p><br />
            </div>
<?php } ?>