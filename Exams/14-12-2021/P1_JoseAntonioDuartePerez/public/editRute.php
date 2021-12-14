<!DOCTYPE html>
<?php
use src\controllers\PostController;
use src\services\DBRuteConnection;

require_once('../src/config/constants.php');
require_once('../src/models/Ruta.php');
require_once('../src/controllers/PostController.php');
require_once('../src/controllers/RutePostController.php');
require_once('../src/services/DBRuteConnection.php');
require_once('../src/validators/FormValidator.php');

new PostController();

if (PostController::$DATA['ruteUpdate'] ?? false) {
	header("location: home.php");
}

if (!isset($_POST['id_rute'])) {
	header("location: home.php");
}

$RUTE = (new DBRuteConnection())->queryWith($_POST['id_rute']);

?>
<html lang="es">

<head>
    <title>Senderismo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<section>
		<form action="<?= $_SERVER['PHP_SELF']; ?>" enctype="application/x-www-form-urlencoded" method="POST" autocomplete="off">
			<label for="rute-title">title:</label><br/>
			<input id="rute-title" type="text" name="title" value="<?= $_POST['title'] ?? '' ?>" placeholder="<?= $RUTE[0]->getTitulo() ?? '' ?>"/><br />

			<?php if(isset(PostController::$DATA['errors'][SUBMIT_TYPE_ADD_RUTE]['title'])): ?>
				<p class="error"><?= PostController::$DATA['errors'][SUBMIT_TYPE_ADD_RUTE]['title'] ?? ''; ?></p>
			<?php endif; ?>

			<label for="rute-description">description:</label><br />
			<textarea id="rute-description" name="description" rows="5" value="<?= $_POST['description'] ?? '' ?>" ><?= $RUTE[0]->getDescripcion() ?? '' ?></textarea><br />

			<?php if(isset(PostController::$DATA['errors'][SUBMIT_TYPE_ADD_RUTE]['description'])): ?>
				<p class="error"><?= PostController::$DATA['errors'][SUBMIT_TYPE_ADD_RUTE]['description'] ?? ''; ?></p>
			<?php endif; ?>

			<label for="rute-desnivel">desnivel:</label><br />
			<input id="rute-desnivel" type="number" name="desnivel" value="<?= $_POST['desnivel'] ?? '' ?>" placeholder="<?= $RUTE[0]->getDesnivel() ?? '' ?>"/><br />

			<?php if(isset(PostController::$DATA['errors'][SUBMIT_TYPE_ADD_RUTE]['desnivel'])): ?>
				<p class="error"><?= PostController::$DATA['errors'][SUBMIT_TYPE_ADD_RUTE]['desnivel'] ?? ''; ?></p>
			<?php endif; ?>

			<label for="rute-distancia">distancia:</label><br />
			<input id="rute-distancia" type="number" name="distancia" value="<?= $_POST['distancia'] ?? '' ?>" placeholder="<?= $RUTE[0]->getDistancia() ?? '' ?>" /><br />
			
			<?php if(isset(PostController::$DATA['errors'][SUBMIT_TYPE_ADD_RUTE]['distancia'])): ?>
				<p class="error"><?= PostController::$DATA['errors'][SUBMIT_TYPE_ADD_RUTE]['distancia'] ?? ''; ?></p>
			<?php endif; ?>

			<label for="rute-dificultad">dificultad:</label><br />
			<select id="rute-dificultad" name="dificultad">
				<option value="-1" selected>Do not change</option>
				<option value="1">Media</option>
				<option value="0">Baja</option>
			</select>
			
			<?php if(isset(PostController::$DATA['errors'][SUBMIT_TYPE_ADD_RUTE]['dificultad'])): ?>
				<p class="error"><?= PostController::$DATA['errors'][SUBMIT_TYPE_ADD_RUTE]['dificultad'] ?? ''; ?>;</p>
			<?php endif; ?>

			<?php if(isset(PostController::$DATA['errors'][SUBMIT_TYPE_ADD_RUTE]['others'])): ?>
				<p class="error"><?= PostController::$DATA['errors'][SUBMIT_TYPE_ADD_RUTE]['others'] ?? ''; ?></p>
			<?php endif; ?>

			<input id="rute-btn" type="submit" value="Guardar" />
			<input type="hidden" name="id" value="<?= $_POST['id_rute'] ?>" />
			<input type="hidden" name="submitType" value="<?= SUBMIT_TYPE_EDIT_RUTE ?>" />
		</form>
	</section>
</body>

</html>