<!DOCTYPE html>
<html>
	<head>
		<title>Ejercicio 1</title>
	</head>
		
	<body>
	
		<?php
		
			/*
				Juan Carlos Pastor Regueras
				Inicializar variables de los distintos tipos de datos básicos y mostrar los datos por pantalla. 
				Fecha revision: 19-10-2017
			*/
			$cadena = "Soy una cadena";
			$entero = 7;
			$real = 7.6;
			$booleano = true;
			
			echo "<p>La variable \$cadena es de tipo \"".gettype($cadena)."\" y tiene el valor: \"".$cadena."\"</p>";
			print"<p>La variable \$entero es de tipo \"".gettype($entero)."\" y tiene el  valor: \"".$entero."\"</p>";
			echo "<p>La variable \$real es de tipo \"".gettype($real)."\" y tiene el valor: \"".$real."\"</p>";
			print "<p>La variable \$booleano es de tipo \"".gettype($booleano)."\" y tiene el valor: \"".$booleano."\"</p>";
		?>
		
	
	</body>

</html>