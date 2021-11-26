<!DOCTYPE html>
<?php
require_once('../src/config/constants.php');
require_once('../src/domain/SessionManager.php');
require_once('../src/services/db/DBCategoryConnection.php');
require_once('../src/services/db/DBEntryConnection.php');
require_once('../src/controllers/LoginPostController.php');
require_once('../src/controllers/SigninPostController.php');

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

$USER_SESSION = getSession();

$CATEGORIAS = getAllCategories();

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
	<link href="assets/css/main.css" rel="stylesheet" type="text/css" />
	<title><?= $DATA['title'] ?? '' ?></title>
</head>

<body>
    <?php include('templates/header.php'); ?>
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
                <?php include('templates/widgets/loginWidget.php'); ?>
                <?php include('templates/widgets/signinWidget.php'); ?>
            <?php else: ?>
            <?php endif; ?>
		</aside>
	</section>
    <?php include('templates/footer.php'); ?>
</body>

</html>