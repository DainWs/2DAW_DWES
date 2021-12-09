<!DOCTYPE html>
<?php
require_once('../src/config/constants.php');
require_once('../src/domain/LangManager.php');
require_once('../src/domain/SessionManager.php');
require_once('../src/services/db/DBCategoryConnection.php');
require_once('../src/services/db/DBEntryConnection.php');

require_once('../src/controllers/PostController.php');

$USER_SESSION = getSession();
$CATEGORIAS = getAllCategories();
$ENTRIES = getAllEntries("", $_GET['user'] ?? -1, $_GET['category'] ?? -1);
?>
<html lang="es">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0" name="viewport" />
	<link href="assets/css/main.css?t=1" rel="stylesheet" type="text/css" />
	<link href="assets/css/nav.css?t=1" rel="stylesheet" type="text/css" />
	<link href="assets/css/categorias.css?t=1" rel="stylesheet" type="text/css" />
	<link href="assets/css/entries.css?t=1" rel="stylesheet" type="text/css" />
	<link href="assets/css/widget.css?t=1" rel="stylesheet" type="text/css" />
	<title><?= $DATA['title'] ?? '' ?></title>
</head>

<body>
    <?php include('templates/header.php'); ?>
	<section>
		<article>
			<section>
				<!-- Start page content -->
				<?php foreach ($ENTRIES as $key => $entry) : ?>
					<?php include('templates/models/compressedEntryModel.php'); ?>
				<?php endforeach; ?>
				<!-- End page content -->
			</section>
		</article>
		<aside>
            <?php include('templates/widgets/forms/searchWidget.php') ?>
            <?php include('templates/widgets/forms/categoryWidget.php') ?>
			<?php if(hasSession()): ?>
				<?php include('templates/widgets/forms/newCategoryWidget.php'); ?>
				<?php include('templates/widgets/forms/newEntryWidget.php'); ?>
			<?php endif; ?>
		</aside>
	</section>
    <?php include('templates/footer.php'); ?>
</body>

</html>