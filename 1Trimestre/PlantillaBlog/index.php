<!DOCTYPE html>
<?php

const DATA = [
	'title' => 'Plantilla de blog de jose'
];

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
	<link href="views/css/main.css?t=1" rel="stylesheet" type="text/css" />
	<title><?= DATA['title'] ?></title>
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
	<section class="content-wrapper">
		<article class="content">
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
			<div class="widget">
				<h2 class="title">Login</h2>
				<form action="index.php" enctype="application/x-www-form-urlencoded" method="POST">
					<label for="login-username">Username:</label><br />
					<input id="login-username" type="text" name="username" value="<?= $_POST['username'] ?? '' ?>" required /><br />

					<label for="login-password">Password:</label><br />
					<input id="login-password" type="password" name="password" value="<?= $_POST['password'] ?? '' ?>" required /><br />

					<input id="login-btn" type="submit" name="submitType" value="Iniciar sesi&oacute;n" />
				</form>
			</div>

			<div class="widget">
				<h2 class="title">Sign in</h2>
				<form action="index.php" enctype="application/x-www-form-urlencoded" method="POST">
					<label for="signin-username">Username:</label><br />
					<input id="signin-username" type="text" name="username" value="<?= $_POST['username'] ?? '' ?>" required /><br />

					<label for="signin-password">Password:</label><br />
					<input id="signin-password" type="password" name="password" value="<?= $_POST['password'] ?? '' ?>" required /><br />

					<label for="signin-email">Email:</label><br />
					<input id="signin-password" type="email" name="email" value="<?= $_POST['email'] ?? '' ?>" required /><br />

					<input id="signin-btn" type="submit" name="submitType" value="Registrarse" />
				</form>
			</div>
		</aside>
	</section>
	<footer class="site-footer">
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