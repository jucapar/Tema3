<?php
	function mostrarArray($array) {
		
		foreach($array as $clave => $valor){
			print ("$clave:$valor<br>");
		}
	}
	
	function mostrarMatriz($matriz) {
		
		foreach ($matriz as $fila => $posicion) {
			foreach ($posicion as $columna => $valor) {
				print("matriz[$fila][$columna] = $valor<br>");
			}
		}
	}

?>