<?php

session_start();

if( !isset($_SESSION["logged_in"]))
{
    header("Location: log_in.php?error=Log in to see all posts");
}

require "app/base.php";

$post = getAllPosts();
?>

    <!DOCTYPE html>
    <html>
        <head>

        </head>
        <body>

        <?php foreach ($post as $posts): ?>
        <p><?= $posts["post_name"] ?></p>
        <p><?= $posts["post_text"] ?></p>
        <p><?= $posts["created_at"] ?></p>
        <p><?= $posts["name"] ?></p>
        <?php endforeach; ?>

        </body>
    </html>

