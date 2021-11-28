<!DOCTYPE html>
<?php
require_once('../src/config/constants.php');
require_once('../src/domain/SessionManager.php');
require_once('../src/services/db/DBCategoryConnection.php');
require_once('../src/services/db/DBEntryConnection.php');

require_once('../src/controllers/PostController.php');

$USER_SESSION = getSession();

$CATEGORIAS = getAllCategories();

if (!isset($_GET['postID'])) {
    header('Location: home.php');
}
$ENTRY = getEntryByID($_GET['postID']);
?>
<html lang="es">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0" name="viewport" />
	<link href="assets/css/main.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/nav.css?t=1" rel="stylesheet" type="text/css" />
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
				<?php $post = $ENTRY; ?>
				<?php include('templates/widgets/postWidget.php'); ?>
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