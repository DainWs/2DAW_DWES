<!DOCTYPE html>
<?php
require_once('../src/config/constants.php');
require_once('../src/domain/SessionManager.php');
require_once('../src/services/db/DBCategoryConnection.php');
require_once('../src/services/db/DBEntryConnection.php');

require_once('../src/controllers/PostController.php');

$USER_SESSION = getSession();

$CATEGORIAS = getAllCategories();

if (!isset($_GET['entryID'])) {
    header('Location: home.php');
}
$ENTRY = getEntryByID($_GET['entryID']);
?>
<html lang="es">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0" name="viewport" />
	<link href="assets/css/main.css?t=1" rel="stylesheet" type="text/css" />
    <link href="assets/css/nav.css?t=1" rel="stylesheet" type="text/css" />
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
				<?php include('templates/models/entryModels.php'); ?>
				<!-- End page content -->
			</section>
		</article>
		<aside>
            <?php if (isset($DATA['showSessionForms']) && $DATA['showSessionForms']): ?>
                <?php include('templates/widgets/loginWidget.php'); ?>
                <?php include('templates/widgets/signinWidget.php'); ?>
            <?php else: ?>
            <?php endif; ?>
		</aside>
	</section>
    <?php include('templates/footer.php'); ?>
</body>

</html>