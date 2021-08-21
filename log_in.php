<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>


        <form action="app/log_in.php" method="post">

            <?php if(isset($_GET['error'])): ?>
                <p><?= $_GET['error']; ?></p>
            <?php endif; ?>

            <input required name="email" placeholder="Your email" type="text">
            <input required name="password" placeholder="Your password" type="password">

            <button>Submit</button>
        </form>






    </body>
</html>

