<!DOCTYPE html>
<?php include("../controller/LoginController.php"); ?>
<html lang="<?= $lang ?? 'en' ?>">
    <head>
        <?php include("templates/head.php"); ?>
    </head>
    <body>
        <main>
            <?php if (!empty($err)) : ?>
                <p class="error"><?php echo $err ?></p>
            <?php endif; ?>
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="username"><?= traduce('Username') ?>:</label><br/>
                <input type="text" id="username" name="username" value="<?php echo $_POST['username'] ?? ''; ?>"><br/>
                
                <label for="password"><?= traduce('Password') ?>:</label><br/>
                <input type="password" id="password" name="password" value="<?php echo $_POST['password'] ?? ''; ?>"><br/><br/>

                <input type="submit" value="<?= traduce('Sign in') ?>">
            </form> 
        </main>
    </body>
</html>