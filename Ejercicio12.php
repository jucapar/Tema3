<!DOCTYPE html>
<html>
	<head>
	
	</head>
		<title>Ejercicio 12</title>
	<body>
	
		<?php
			/*
				Juan Carlos Pastor Regueras
				Mostrar el contenido de las variables superglobales (utilizando print_r() y foreach()). 
				Fecha revision: 19-10-2017
			*/
			echo "<h2>Utilizando print_r</h2>";
		
			echo "<h3>GLOBALS</h3>";
			print_r($GLOBALS);
			echo "<br><br>";
			
			echo "<h3>SERVER</h3>";
			print_r($_SERVER);
			echo "<br><br>";
			
			echo "<h3>GET</h3>";
			print_r($_GET);
			echo "<br><br>";
			
			echo "<h3>POST</h3>";
			print_r($_POST);
			echo "<br><br>";
			
			echo "<h3>FILES</h3>";
			print_r($_FILES);
			echo "<br><br>";
			
			echo "<h3>COOKIE</h3>";
			print_r($_COOKIE);
			echo "<br><br>";
			
			echo "<h3>SESSION</h3>";
			print_r($_SESSION);
			echo "<br><br>";
			
			echo "<h3>REQUEST</h3>";
			print_r($_REQUEST);
			echo "<br><br>";
			
			echo "<h3>ENV</h3>";
			print_r($_ENV);
			echo "<br><br><br><br>";
			
			
			
			echo "<h2>Utilizando foreach</h2>";
			echo "<h3>GLOBALS</h3>";
			foreach($_GLOBALS as $clave => $valor) {
				echo $clave.":".$valor."</br>";
			}
			
			echo "<h3>SERVER</h3>";
			foreach($_SERVER as $clave => $valor) {
				echo $clave.":".$valor."</br>";
			}
			echo "<br><br>";
			
			
			echo "<h3>GET</h3>";
			foreach($_GET as $clave => $valor) {
				echo $clave.":".$valor."</br>";
			}
			echo "<br><br>";
			
			echo "<h3>POST</h3>";
			foreach($_POST as $clave => $valor) {
				echo $clave.":".$valor."</br>";
			}
			echo "<br><br>";
			
			echo "<h3>FILES</h3>";
			foreach($_FILES as $clave => $valor) {
				echo $clave.":".$valor."</br>";
			}
			echo "<br><br>";
			
			echo "<h3>COOKIE</h3>";
			foreach($_COOKIE as $clave => $valor) {
				echo $clave.":".$valor."</br>";
			}
			echo "<br><br>";
			
			echo "<h3>SESSION</h3>";
			foreach($_SESSION as $clave => $valor) {
				echo $clave.":".$valor."</br>";
			}
			echo "<br><br>";
			
			echo "<h3>REQUEST</h3>";
			foreach($_REQUEST as $clave => $valor) {
				echo $clave.":".$valor."</br>";
			}
			echo "<br><br>";
			
			echo "<h3>ENV</h3>";
			foreach($_ENV as $clave => $valor) {
				echo $clave.":".$valor."</br>";
			}
			echo "<br><br>";
		?>
		
	</body>

</html>