<?php

session_start();

if( !isset($_SESSION["logged_in"]))
{
    header("Location: log_in.php?error=Log in to see all posts and leave comments");
    die();
}

require "app/base.php";

$post = getAllPosts();
$comments = getAllComments();

$user = $_SESSION["name"];
$userId = $_SESSION["user_id"];
//echo $userId;

?>

    <!DOCTYPE html>
    <html>
        <head>

        </head>
        <body>

            <h2>Welcome <?= $user ?></h2>
            <a href="app/sign_out.php" />Sign out</a>

            <?php foreach ($post as $posts): ?>
                <p><?= $posts["post_name"] ?></p>
                <p><?= $posts["post_text"] ?></p>
                <p><?= $posts["created_at"] ?></p>
                <p><?= $posts["name"] ?></p>
    <!--            <p>--><?//= $posts["id"] ?><!--</p>-->

                <?php foreach ($comments as $comment): ?>
                    <?php if($posts["id"] == $comment["post_id"]): ?>
                        <p><?= $comment["comment"] ?></p>
                    <?php endif;?>
                <?php endforeach;?>


                <form method="post" action="app/comments.php">
                    <input name="comment" type="text">
                    <input type="hidden" name="post_id" value="<?= $posts['id'] ?>">
                    <button>Submit</button>
                </form>
                <a href="app/like.php?id=<?=$posts["id"] ?>">Like</a>
            <?php endforeach; ?>

        </body>
    </html>

