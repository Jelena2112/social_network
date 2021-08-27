<?php
session_start();

$user = $_SESSION["name"];
?>


<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>

        <?php if( !isset($_SESSION["logged_in"])): ?>
            <a href="sign_in.php">Sign in</a>
            <a href="log_in.php">Log in</a>
        <?php endif; ?>


        <?php if(isset($_SESSION["logged_in"])): ?>
            <a href="add_new_post.php">Add new post</a>
            <h2>Welcome <?= $user ?></h2>
        <?php endif; ?>

    </body>
</html>
