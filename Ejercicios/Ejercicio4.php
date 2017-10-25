<!DOCTYPE html>
<html>
	<head>
		<title>Ejercicio 3</title>
	</head>
		
	<body>
	
		<?php
		/*
				Juan Carlos Pastor Regueras
				Mostrar en tu página index la fecha y hora actual en Oporto formateada en portugués. 
				Fecha revision: 19-10-2017
			*/
			setlocale(LC_ALL,"pt_BR");
			date_default_timezone_set('Europe/Lisbon');
			echo strftime("%A %d de %B del %Y");
			
		?>
		
	</body>

</html>


