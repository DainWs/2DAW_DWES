<!DOCTYPE html>
<!--
Escriba un programa que:

Muestre un grupo de entre 20 y 30 animales al azar.
 Se usará un array para almacenar el código de los animales. El número de elementos del array será el determinado aleatoriamente entre 20 y 30. Tenga en cuenta que los animales son caracteres con rango Unicode: 128000 a 128060. Por ejemplo, podría mostrar el siguiente resultado:



A continuación, mostrará un animal al azar de los que están incluidos en el grupo anterior y lo eliminará del array. Por ejemplo:              
                 
Por último, mostrará de nuevo el grupo inicial, pero habiendo eliminado del grupo los animales que coincidan con el animal suelto (al menos habrá uno). También mostrará un mensaje con el número total de animales que quedan.  En el ejemplo anterior quedarían 21 animales. 
Notas:

 uso de las funciones  rand(), array_rand(), unset.
Crea las funciones que consideres oportunas.
-->
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			function selectAnimals($animals) {
				$array = [];
				$array[0] = "";
				$numAnimals = rand(20,30);
				echo "<br/><br/>El grupo de animales seleccionado:  <br/>";
				do {
					$i = $animals[array_rand($animals)];
					echo "&#$i;";
					array_push($array, $i);
				} while (count($array) < $numAnimals);
				return $array;
			}

			function deleteAnimal(&$array) {
				$hasDelete = true;
				$animalToDelete = $array[array_rand($array)];
				echo "<br/><br/>El animal que se va a borrar:  <br/>";
				echo "&#$animalToDelete;<br/><br/>";
				while($hasDelete) {
					$hasDelete = false;
					$key = array_search($animalToDelete, $array);
					if(isset($array[$key])) {
						unset($array[$key]);
						$hasDelete = true;
					}
				}
			}

			$animals = [];
			echo "Todos los animales:  <br/>";
			for ($i = 128000; $i < 128060 ; $i++) { 
				echo "&#$i;";
				array_push($animals, $i);
			}

			$seleccionados = selectAnimals($animals);
			deleteAnimal($seleccionados);

			echo "Los animales que quedan son:  <br/>";
			foreach ($seleccionados as $key => $value) {
				echo "&#$value;";
			}
			
    	?>
	</body>
</html>
