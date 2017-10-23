<!DOCTYPE html>
<html>
	<head>
	
	</head>
		<title>Ejercicio 15</title>
	<body>
	
		<?php
			/*
				Juan Carlos Pastor Regueras
				Crear e inicializar un array con el sueldo percibido de lunes a domingo. Recorrer el array para calcular el sueldo percibido durante la semana. (Array asociativo con los nombres de los días de la semana)  
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
			
			foreach($sueldos as $dia => $salario) {
				print("Dia $dia: salario $salario<br>");
				$totalSueldoSemanal+=$salario;
			}
			
			print ("Salario total : $totalSueldoSemanal");
		?>
		
	</body>

</html>
