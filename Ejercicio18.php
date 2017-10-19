<!DOCTYPE html>
<html>
	<head>
	
	</head>
		<title>Ejercicio 14</title>
	<body>
	
		<?php
			/*
				Juan Carlos Pastor Regueras
				Recorrer el array anterior utilizando funciones para obtener el mismo resultado. 
				Fecha revision: 19-10-2017
			*/
			require "MostrarArray.php";
			
			$teatro[0][0] = "Juan Carlos";
			$teatro[3][3] = "Juanjo";
			$teatro[7][5] = "Guty";
			$teatro[4][6] = "Marqués";
			$teatro[19][14] = "Alejandro";
			
			mostrarMatriz($teatro);
			
		?>
		
	</body>

</html>