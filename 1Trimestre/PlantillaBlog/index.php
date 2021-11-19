<!DOCTYPE html>
<?php

const DATA = [
	'title' => 'Plantilla de blog de jose'
];

?>
<html lang="es">

<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0" name="viewport"/>
	<link href="css/main.css" rel="stylesheet" type="text/css"/>
	<title><?= DATA['title'] ?></title>
</head>

<body>
	<main class="site-wrapper">
		<header class="site-header">
			<section>
				<header class="widget">
					<h1 class="site-title">
						<a href="index.php" rel="home" title="Ir al inicio">Home</a>
					</h1>
				</header>
			</section>
		</header>
		<section class="content-wrapper">
			<article class="content">
				<section>
					<!-- Start page content -->
					<div class="widget">
						<div>
							<div class="post-outer">
								<div>
									<header>
										<h2>Seccion 1</h2>
									</header>
									<div>
										
									</div>
									<footer>

									</footer>
								</div>
							</div>
							<div class="post-outer">
								<div>
									<header>
										<h2>Post</h2>
									</header>
									<div>
										Lorem ipsum dolor sit amet, donec diam urna et wisi aliquam quis, ut habitasse
										aenean dui amet et. Ullamcorper augue. Et mauris nunc ut morb...
									</div>
									<footer>
									</footer>
								</div>
							</div>
						</div>
					</div>
					<!-- End page content -->
				</section>
			</article>
			<aside class="sidebar">
				<div class="widget">
					<h2 class="title">Un widget en la sidebar</h2>
					<div>
						Esto puede ser cualquier otra cosa.
					</div>
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
	</main>
</body>

</html>