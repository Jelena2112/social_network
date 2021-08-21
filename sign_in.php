<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>

        <?php if(isset($_GET["error"])): ?>
            <p><?= $_GET["error"] ?></p>
        <?php endif; ?>

        <form action="app/new_user.php" method="post">
            <input required  name="name" placeholder="Your name" type="text">
            <input required  name="phone" placeholder="Your phone" type="text">
            <input required  name="city" placeholder="Your city" type="text">
            <input required  name="country" placeholder="Your country" type="text">
            <input required  name="age" placeholder="Your age" type="number">
            <input required  name="email" placeholder="Your email" type="email">
            <input required  name="password" placeholder="Your password" type="password">
            <textarea required name="about_me" placeholder="Write something about you" type="text"></textarea>
            <button>Submit</button>
        </form>

    </body>
</html>
