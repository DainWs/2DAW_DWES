<!DOCTYPE html>
<?php
require_once('../../src/config/constants.php');
require_once("../../src/domain/SessionManager.php");
require_once('../../src/controllers/LoginPostController.php');

$DATA = [
	'title' => 'Plantilla de blog de jose',
    'showSessionForms' => true
];

if (hasSession()) {
    $DATA['showSessionForms'] = false;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitType'])) {
    switch ($_POST['submitType']) {
        case SUBMIT_TYPE_LOGOUT:
            if (hasSession()) {
                clearSession();
                $DATA['showSessionForms'] = true;
            }
            break;
        case SUBMIT_TYPE_SIGNIN:
            if (!hasSession()) {
            }
            break;
        case SUBMIT_TYPE_LOGIN:
            if (!hasSession()) {
                $result = doLoginPost();
                if (is_string($result)) {
                    $DATA['errors'] = [0=>$result];
                } else {
                    $DATA['showSessionForms'] = !$result;
                }
            }
            break;
    }
}

$POSTS = [
	0 => [
		'header' => 'Post 1',
		'main' => 'Lorem ipsum dolor sit amet, donec diam urna et wisi aliquam quis, ut habitasse aenean dui amet et. Ullamcorper augue. Et mauris nunc ut morb...',
		'footer' => ''
	]
];


?>
<html lang="es">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0" name="viewport" />
	<link href="../css/main.css?t=1" rel="stylesheet" type="text/css" />
	<title><?= $DATA['title'] ?? '' ?></title>
</head>

<body>
	<header>
		<h1>Blog de Jose Antonio Duarte</h1>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li>
					<a>Categor&iacute;as</a>
					<ul>
						<li><a>Categoria 1</a></li>
						<li><a>Categoria 2</a></li>
						<li><a>Categoria 3</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</header>
	<section>
		<article>
			<section>
				<!-- Start page content -->
				<?php foreach ($POSTS as $key => $post) : ?>
					<article class="post-outer">
						<header>
							<h2><?= $post['header'] ?? ''; ?></h2>
						</header>
						<main>
							<?= $post['main'] ?? ''; ?>
						</main>
						<footer>
							<?= $post['footer'] ?? ''; ?>
						</footer>
					</article>
				<?php endforeach; ?>
				<!-- End page content -->
			</section>
		</article>
		<aside>
            <?php if (isset($DATA['showSessionForms']) && $DATA['showSessionForms']): ?>
                <div class="widget">
                    <h2 class="title">Login</h2>
                    <form action="<?= $_SERVER['PHP_SELF']; ?>" enctype="application/x-www-form-urlencoded" method="POST">
                        <label for="login-email">Email:</label><br />
                        <input id="login-email" type="text" name="email" value="<?= $_POST['email'] ?? '' ?>"/><br/>

                        <label for="login-password">Password:</label><br />
                        <input id="login-password" type="password" name="password" value="<?= $_POST['password'] ?? '' ?>"/><br/>

                        <input id="login-btn" type="submit" value="Iniciar sesi&oacute;n" />
                        <input type="hidden" name="submitType" value="<?= SUBMIT_TYPE_LOGIN ?>"/>
                    </form>
                </div>

                <div class="widget">
                    <h2 class="title">Sign in</h2>
                    <form action="<?= $_SERVER['PHP_SELF']; ?>" enctype="application/x-www-form-urlencoded" method="POST">
                        <label for="signin-name">Nombre:</label><br />
                        <input id="signin-name" type="text" name="name" value="<?= $_POST['name'] ?? '' ?>"/><br/>

                        <label for="signin-surname">Apellidos:</label><br />
                        <input id="signin-surname" type="text" name="surname" value="<?= $_POST['surname'] ?? '' ?>"/><br/>

                        <label for="signin-email">Correo Electr&oacute;nico:</label><br />
                        <input id="signin-password" type="email" name="email" value="<?= $_POST['email'] ?? '' ?>"/><br/>

                        <label for="signin-password">Contrase&ntilde;a:</label><br />
                        <input id="signin-password" type="password" name="password" value="<?= $_POST['password'] ?? '' ?>"/><br/>

                        <input id="signin-btn" type="submit" value="Registrarse" />
                        <input type="hidden" name="submitType" value="<?= SUBMIT_TYPE_SIGNIN ?>"/>
                    </form>
                </div>
            <?php else: ?>
                <div class="widget">
                    <h2 class="title">Sign out</h2>
                    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                        <input id="logout-btn" type="submit" value="Cerrar sesi&oacute;n" />
                        <input type="hidden" name="submitType" value="<?= SUBMIT_TYPE_LOGOUT ?>"/>
                    </form>
                </div>
            <?php endif; ?>
		</aside>
	</section>
	<footer>
		<section>
			<article class="widget">
				<h2 class="title">Ahora uno en el footer</h2>
				<div>
					Cualquier cosa
				</div>
			</article>
		</section>
	</footer>
</body>

</html>