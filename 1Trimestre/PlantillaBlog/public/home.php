<!DOCTYPE html>
<?php
require_once('../src/config/constants.php');
require_once('../src/domain/SessionManager.php');
require_once('../src/services/db/DBCategoryConnection.php');
require_once('../src/services/db/DBEntryConnection.php');

require_once('../src/controllers/PostController.php');

$USER_SESSION = getSession();
$CATEGORIAS = getAllCategories();
$ENTRIES = getAllEntries();
$USERS = getAllUsers(USER_DATE);
?>
<html lang="es">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0" name="viewport" />
	<link href="assets/css/main.css?t=1" rel="stylesheet" type="text/css" />
    <link href="assets/css/nav.css?t=1" rel="stylesheet" type="text/css" />
	<link href="assets/css/posts.css?t=5" rel="stylesheet" type="text/css" />
    <link href="assets/css/users.css?t=5" rel="stylesheet" type="text/css" />
	<link href="assets/css/widget.css?t=5" rel="stylesheet" type="text/css" />
	<title><?= $DATA['title'] ?? '' ?></title>
</head>

<body>
    <?php include('templates/header.php'); ?>
	<section>
		<article class="main-flex-article">
            <header>
                <h1>Lastest Posts</h1>
            </header>
			<section class="flex-list">
				<!-- Start page content -->
				<?php for ($i = 0; $i < 4 && $i < count($ENTRIES); $i++): ?>
					<?php $post = $ENTRIES[array_keys($ENTRIES)[$i]]; ?>
                    <?php include('templates/models/compressedPostModel.php'); ?>
				<?php endfor; ?>
				<!-- End page content -->
			</section>

            <header>
                <h1>Newests Users</h1>
            </header>
			<section class="flex-list">
				<!-- Start page content -->
				<?php for ($i = 0; $i < 4 && $i < count($USERS); $i++): ?>
					<?php $user = $USERS[array_keys($USERS)[$i]]; ?>
                    <?php include('templates/models/compressedUserModel.php'); ?>
				<?php endfor; ?>
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