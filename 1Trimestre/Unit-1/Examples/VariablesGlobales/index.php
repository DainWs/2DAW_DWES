<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			echo 'Hola '. ($_GET['nombre'] ?? '&lt;InserteNombreAqui&gt;');
		?>

		<p>
			<?php 
				$num1 =	(is_numeric($_GET['num1'] ?? '') 
							? $_GET['num1'] 
							: 0 );
				$num2 = (is_numeric($_GET['num2']  ?? '')
 							? $_GET['num2'] 
 							: 0 );
			?>
			Suma = <?php echo $num1 + $num2; ?>
		</p>
	</body>
</html>