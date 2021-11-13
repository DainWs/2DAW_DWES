<!DOCTYPE html>
<?php

const DATA = [
	'title' => 'Plantilla de blog de jose'
];

?>
<html class="v2 js" lang="es">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0" name="viewport">
	<link href="css/main.css" rel="stylesheet" type="text/css">
	<title><?= DATA['title'] ?></title>
</head>

<body class=" index">
	<div class="site-wrapper">
		<header class="site-header">
			<div class="header section">
				<div class="widget Header">
					<h1 class="site-title">
						<a href="index.php" rel="home" title="Ir al inicio">Home</a>
					</h1>
				</div>
			</div>
		</header>
		<article class="content-wrapper">
			<div class="content">
				<div class="main section">
					<div class="widget Blog">
						<div class="blog-posts hfeed">
							<div class="post-outer post-numero-0">
								<div class="post hentry">
									<header class="post-header">
										<h2 class="post-title entry-title">Seccion 1</h2>
									</header>
									<div class="post-body entry-content">
										
									</div>
									<footer class="post-footer">

									</footer>
								</div>
							</div>
							<div class="post-outer post-numero-1">
								<div class="post hentry">
									<header class="post-header">
										<h2 class="post-title entry-title">Post</h2>
									</header>
									<div class="post-body entry-content">
										Lorem ipsum dolor sit amet, donec diam urna et wisi aliquam quis, ut habitasse
										aenean dui amet et. Ullamcorper augue. Et mauris nunc ut morb...
									</div>
									<footer class="post-footer">
									</footer>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<aside class="sidebar section">
				<div class="widget HTML">
					<h2 class="title">Un widget en la sidebar</h2>
					<div class="widget-content">
						Esto puede ser cualquier otra cosa.
					</div>
				</div>
			</aside>
		</article>
		<footer class="site-footer">
			<div class="footer section">
				<div class="widget HTML">
					<h2 class="title">Ahora uno en el footer</h2>
					<div class="widget-content">
						Cualquier cosa
					</div>
				</div>
			</div>
		</footer>
	</div>
</body>

</html>