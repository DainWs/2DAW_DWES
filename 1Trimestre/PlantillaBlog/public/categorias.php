<!DOCTYPE html>
<?php
require_once('../src/config/constants.php');
require_once('../src/domain/SessionManager.php');
require_once('../src/services/db/DBCategoryConnection.php');
require_once('../src/services/db/DBEntryConnection.php');

$DATA = [
	'title' => 'Plantilla de blog de jose'
];

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_POST['category'])) {
    
}

$USER_SESSION = getSession();

$CATEGORIAS = getAllCategories();

$ENTRIES = getAllEntries();
?>
<html lang="es">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0" name="viewport" />
	<link href="assets/css/main.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/categorias.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/posts.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/widget.css" rel="stylesheet" type="text/css" />
	<title><?= $DATA['title'] ?? '' ?></title>
</head>

<body>
    <?php include('templates/header.php'); ?>
	<section>
		<article>
			<section>
				<!-- Start page content -->
				<?php foreach ($ENTRIES as $key => $post) : ?>
					<?php include('templates/models/postModels.php'); ?>
				<?php endforeach; ?>
				<!-- End page content -->
			</section>
		</article>
		<aside>
            <?php include('templates/widgets/categoryWidget.php') ?>
		</aside>
	</section>
    <?php include('templates/footer.php'); ?>
</body>

</html>