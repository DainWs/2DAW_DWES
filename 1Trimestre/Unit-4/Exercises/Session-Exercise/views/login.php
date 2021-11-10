<!DOCTYPE html>
<?php include("controller/LangManager.php"); ?>
<?php
    session_start();
    $username = (isset($_POST['username'])) ? $_POST['username'] : '';
    $password = (isset($_POST['password'])) ? $_POST['password'] : '';

    $err = '';
    if (!empty($username) || !empty($password)) {
        if ($username === 'usuario' && $password === 'usuario') {
            $_SESSION[$token] = [
                "username" => "$username",
                "password" => "$password"
            ];
            header("Location: ../index.php");
        } else {
            $err = traduce('Review username and password');
        }
    }
?>
<html lang="<?= $lang ?? 'en' ?>">
    <head>
        <?php $pageTitle="Login"; ?>
        <?php $cssFile="../css/index.css"; ?>
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