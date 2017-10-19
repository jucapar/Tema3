<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="estiloCuestionario.css">
  <title>Cuestionario</title>
</head>
<body>


<?php
		include "LibreriaValidacionFormularios.php";
		
		$MIN = 5;
		$MAX = 30;
		
		$error = false;
		$valida = 0;
		
		$cuestionario = array();
		$cuestionario[0] = array(
			'nombre' => '',
			'apellido' => ''
		);
		
		$cuestionario[1] = array(
			'nombre' => '',
			'apellido' => ''
		);
		
		$cuestionario[2] = array(
			'nombre' => '',
			'apellido' => ''
		);
	
		$erroresCampos = array();
		
		$erroresCampos[0] =  array(
			'nombre' => '',
			'apellido' => ''
		);
		
		$erroresCampos[1] =  array(
			'nombre' => '',
			'apellido' => ''
		);
		
		$erroresCampos[2] =  array(
			'nombre' => '',
			'apellido' => ''
		);
		
		$arrayErrores = array(" ", "No ha introducido ningun valor<br />", "El valor introducido no es valido<br />","Tamaño minimo no valido<br />", "Tamaño maximo no valido<br />");
		
		if (filter_has_var(INPUT_POST,'enviar')){
			
			
			
		}
		if(!filter_has_var(INPUT_POST,'enviar')|| $error ){
			
			?>
			
			<form action="<?PHP echo $_SERVER['PHP_SELF']; ?>" id="formulario1" method="post">
	
			<div id="persona1">
				<label for="nombre[0]">Nombre:</label><br />
				<input type="text" name="nombre[]" value=""><br /><br />
			
			
				<label for="apellido[0]">Apellido:</label><br />
				<input type="text" name="apellido[]" value=""><br /><br />
			
			</div>
			
			<div id="persona2">
				<label for="nombre[1]">Nombre:</label><br />
				<input type="text" name="nombre[]" value=""><br /><br />
			
			
				<label for="apellido[1]">Apellido:</label><br />
				<input type="text" name="apellido[]" value=""><br /><br />
			
			</div>
			
			<div id="persona2">
				<label for="nombre[2]">Nombre:</label><br />
				<input type="text" name="nombre[]" value=""><br /><br />
			
			
				<label for="apellido[2]">Apellido:</label><br />
				<input type="text" name="apellido[]" value=""><br /><br />
				
			</div>
			
		
			<input type="submit" name="enviar" value="Enviar">
	
		</form>
			
			<?php
			
			}else{
				
				print_r($_POST);
			}
			?>
		
</body>
</html>