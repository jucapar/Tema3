<!DOCTYPE html>
<html>
	<head>
	
	</head>
		<title>Ejercicio 14</title>
	<body>
	
		<?php
			/*
				Juan Carlos Pastor Regueras
				nicializar un array (bidimensional con dos índices numéricos) donde almacenamos el nombre de las personas que tienen reservado el asiento en un teatro de 20 filas y 15 asientos por fila. (Inicializamos el array ocupando únicamente 5 asientos). Recorrer el array con distintas técnicas (foreach(), while(), for()) para mostrar los asientos ocupados en cada fila y las personas que lo ocupan. 
				Fecha revision: 19-10-2017
			*/
			
			$teatro[0][0] = "Juan Carlos";
			$teatro[3][3] = "Juanjo";
			$teatro[7][5] = "Guty";
			$teatro[4][6] = "Marqués";
			$teatro[19][14] = "Alejandro";
			
			foreach ($teatro as $fila => $a) {
				foreach ($a as $asiento => $asistente) {
					print "En la fila " . $fila . " y asiento " . $asiento . " está sentado " . $asistente;
					print "<br/>";
				}
			}
			
		?>
		
	</body>

</html>