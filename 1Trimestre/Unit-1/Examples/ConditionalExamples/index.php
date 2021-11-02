<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			$var = 5;
			if ($var < 4) {
				echo 'Es menor que el 4';
			}
			else {
				echo 'Es 4 o mayor de 4';
			}

			$sw = 'variable';
			switch ($sw) {
				case 'value':
					echo 'value';
					break;
				case 'variable':
					echo 'variable';
					break;
				default:
					echo 'ninguno';
					break;
			}
		?>
	</body>
</html>