<!DOCTYPE html>
<html>
	<head>
		<title>Ejercicio 3</title>
	</head>
		
	<body>
	
		<?php
			/*
				Juan Carlos Pastor Regueras
				Mostrar en tu página index la fecha y hora actual formateada en castellano 
				Fecha revision: 19-10-2017
			*/
			setlocale(LC_ALL,"es_ES");
			echo strftime("%A %d de %B del %Y");
			//ver libreria nl2br
			//enlace setlocale: http://www.prodevtips.com/2011/02/21/php-and-setlocale-getting-more-locales-than-english-to-work/
		?>
		
	</body>

</html>
