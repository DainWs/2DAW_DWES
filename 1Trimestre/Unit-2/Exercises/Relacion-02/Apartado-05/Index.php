<!DOCTYPE html>
<!--
Función que nos devuelve la fecha de hoy en castellano
-->
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			date_default_timezone_set('Europe/Madrid');

			function getCurrentDate() {
				$currentDate = new DateTime();
    			$dateData = $currentDate->format('d-M-Y');
    			$dateData = explode('-',$dateData);
    			return $dateData[0] . ' de ' . $dateData[1] . ' del ' . $dateData[2];
			}
			
    	?>
	</body>
</html>