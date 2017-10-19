<!DOCTYPE html>
<html>
	<head>
	
	</head>
		<title>Ejercicio 16</title>
	<body>
	
		<?php
			/*
				Juan Carlos Pastor Regueras
				Recorrer el array anterior utilizando funciones para obtener el mismo resultado.
				Fecha revision: 19-10-2017
			*/
			$totalSueldoSemanal = 0;
			$sueldos = array(
				"Lunes" => 100,
				"Martes" => 110,
				"Miercoles" => 120,
				"Jueves" => 130,
				"Viernes" => 140,
				"Sabado" => 150,
				"Domingo" => 160
			);
			
			while(key($sueldos)!== null){
				echo key($sueldos).":".current($sueldos)."<br>";
				$totalSueldoSemanal += current($sueldos);
				next($sueldos);
				
			}
				
				
			
			print ("Salario total : $totalSueldoSemanal");
		?>
		
	</body>

</html>