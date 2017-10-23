<!DOCTYPE html>
<html>
	<head>
	
	</head>
		<title>Ejercicio 6</title>
	<body>
	
		<?php
			/*
				Juan Carlos Pastor Regueras
				Operar con fechas: calcular la fecha y el día de la semana de dentro de 60 días. 
				Fecha revision: 19-10-2017
			*/
			
			$fecha = date('d-m-Y');
			$nuevafecha = strtotime ( '+60 day' , strtotime ( $fecha ) ) ;
			$nuevafecha = date ( 'd-m-Y' , $nuevafecha );
			
			echo $nuevafecha;
		?>
		
	</body>

</html>
