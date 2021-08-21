
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>

        <?php if(isset($_GET["error"])): ?>
            <p><?= $_GET["error"] ?></p>
        <?php endif; ?>

        <form action="app/add_new_post.php" method="post">
            <input  required name="post_name" placeholder="About your post" type="text">

            <textarea required name="post_text" placeholder="Your post" type="text"></textarea>
            <button>Submit</button>
        </form>

    </body>
</html>

