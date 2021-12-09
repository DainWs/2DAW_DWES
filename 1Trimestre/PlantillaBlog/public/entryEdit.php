<!DOCTYPE html>
<?php
require_once('../src/config/constants.php');
require_once('../src/domain/LangManager.php');
require_once('../src/domain/SessionManager.php');
require_once('../src/services/db/DBCategoryConnection.php');
require_once('../src/services/db/DBEntryConnection.php');

require_once('../src/controllers/PostController.php');

if (!hasSession()) {
	header("location: ../index.php");
	exit;
}

if (!existEntryWithID($_GET['entryID'])) {
	header('Location: home.php');
}

if ($DATA['entryUpdate'] ?? false) {
	header("location: home.php");
}

$USER_SESSION = getSession();

$USERS = getAllUsers();
$CATEGORIAS = getAllCategories();

if (isset($_GET['entryID'])) {
    $ENTRY = getEntryByID($_GET['entryID']);

	//Ahora que tenemos la entrada y los usuarios, los mezclamos por si el autor es el usuario por defecto 'unknown'
	$ENTRY_USER = [
		0 => [
			USER_ID => $ENTRY[ENTRY_USER_ID],
			USER_NAME => $ENTRY[ENTRY_USER_NAME]
		]
	];

	$USERS = array_merge($USERS, $ENTRY_USER);
}

$IS_ENTRY_NEW = !isset($_GET['entryID']);
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
		<?php include('templates/models/editEntryModel.php'); ?>
	</section>
    <?php include('templates/footer.php'); ?>
</body>

</html>