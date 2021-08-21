<?php
session_start();
?>


<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>

        <a href="sign_in.php">Sign in</a>
        <a href="log_in.php">Log in</a>
        <?php if(isset($_SESSION["logged_in"])): ?>
            <a href="add_new_post.php">Add new post</a>
        <?php endif; ?>

    </body>
</html>
