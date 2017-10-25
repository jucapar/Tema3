<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="css/estilos23.css">
  <title>Ejercicio 23</title>
</head>
<body>


<?php
		/*
			Juan Carlos Pastor Regueras
			Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente, pero las respuestas que habíamos tecleado correctamente aparecerán en el formulario y no tendremos que volver a teclearlas 
			Fecha revision: 23-10-2017
		*/
		//Incluimos nuestra libreria de validacion
		include "LibreriaValidacionFormularios.php";
		
		// Constantes para los valores maximos y minimos
		define ("MIN",3);
		define ("MAX",200);
		
		// Array de errores, utilizado para mostrar el mensaje de error correspondiente al valor devuelto por la funcion de validacion
		$arrayErrores = array(" ", "No ha introducido ningun valor<br />", "El valor introducido no es valido<br />","Tamaño minimo no valido<br />", "Tamaño maximo no valido<br />");
		
		//Variable de control, utilizada para saber si algun campo introducido es erroneo
		$error = false;
		
		 // Variable que guardará el valor devuelto por las funciones de validacion
		$valida = 0;
		
		
		// Inicializamos todos los arrays
		$resultado = array(
			'campo' => ''
			
		);
		
		
		$erroresCampos = array(
			'campo' => ''
		);
		
		$erroresEstilos = array(
			'campo' => ''
			
		);
		//array para la persistencia de radioButton
		$arrayRadioButton = array(
			'valor1' => '',
			'valor2' => ''
		);
		
		//array para la persistencia de Checbox
		$arrayCheckbox = array(
			'valor1' => '',
			'valor2' => ''
		);
	
	
	
		if (filter_has_var(INPUT_POST,'enviar')){//Si hemos pulsado el boton de Enviar
			//Comenzamos las validaciones de datos
			//Ejecutamos la funcion de validacion y recogemos el valor devuelto
			$valida = funcionValidacion($_POST['campo']);
			//Si el valor es distinto de 0 ha habido un error y procedemos a tratarlo
			if($valida != 0) {
			//Asignamos el error producido al valor correspondiente en el array de errores
			$erroresCampos['campo'] = $arrayErrores[$valida];
			//Activamos el class correspondiente para marcar el borde del campo en rojo
			$erroresEstilos['campo'] = "error";
			//Como ha habido un error, la variable de control $error toma el valor true
			$error = true;
				//Si no ha habido ningun error, guardamos el valor enviado en el array de cuestionario
			}
			else {
				//Si no ha habido ningun error, guardamos el valor enviado en el array de cuestionario
				$resultado['campo'] = $_POST['campo'];
				
			}
				
			
		}
		//Si no hemos pulsado el boton, o ha habido un error en la validacion mostrarmos el formulario
		if(!filter_has_var(INPUT_POST,'enviar')|| $error ){
			
			?>
			<form action="<?PHP echo $_SERVER['PHP_SELF']; ?>" id="IdFormulario" method="post">
	
			<label for="texto">Texto:</label><br />
			<input type="text" name="nombre" value="<?php echo $resultado['campo'];?>" class="<?PHP echo $erroresEstilos['campo'];?>"><br /><br />
			<?PHP echo $erroresCampos['campo']; ?>
			
			<label for="texto">Numero:</label><br />
			<input type="number" name="nombre" value="<?php echo $resultado['campo'];?>" class="<?PHP echo $erroresEstilos['campo'];?>"><br /><br />
			<?PHP echo $erroresCampos['campo']; ?>
			
			<label for="password">Password:</label><br />
			<input type="password" name="password" value="<?php echo $resultado['campo'];?>" class="<?PHP echo $erroresEstilos['campo'];?>"><br /><br />
			<?PHP echo $erroresCampos['campo']; ?>
			
			<label for="email">Email:</label><br />
			<input type="email" name="email" value="<?php echo $resultado['campo'];?>" class="<?PHP echo $erroresEstilos['campo'];?>"><br /><br />
			<?PHP echo $erroresCampos['campo']; ?>
			
			<label for="radioButton">RadioButton</label><br />
			<input type="radio" name="radioButton" value="Valor1" <?php echo $arrayRadioButton['valor1'];?> class="<?PHP echo $erroresEstilos['campo'];?>"> Valor1
			<input type="radio" name="radioButton" value="Valor2" <?php echo $arrayRadioButton['valor2'];?> class="<?PHP echo $erroresEstilos['campo'];?>"> Valor2<br /><br />
			<?PHP echo $erroresCampos['campo']; ?>
			
			<label for="fecha">Fecha</label><br />
			<input type="date" name="fecha" value="<?php echo $resultado['campo'];?>" class="<?PHP echo $erroresEstilos['campo'];?>"><br /><br />
			<?PHP echo $erroresCampos['campo']; ?>
		
			<label for="checkbox[]">Chexbox:</label><br />	
			<input type="checkbox" name="checkbox[]" value="Valor1" <?php echo $arrayCheckbox['valor1'];?> class="<?PHP echo $erroresEstilos['checkbox'];?>">Valor1 <br />
			<input type="checkbox" name="checkbox[]" value="Valor1" <?php echo $arrayCheckbox['valor2'];?> class="<?PHP echo $erroresEstilos['checkbox'];?>">Valor2 <br />
		
			<?PHP echo $erroresCampos['campo']; ?>
			
		
			<label for="textarea">Textarea:</label><br />	
			<textarea  cols="86" rows ="20" name="textarea" form="IdFormulario" class="<?PHP echo $erroresEstilos['textarea'];?>" ><?php echo $resultado['campo'];?></textarea>
			<br />	
			<?PHP echo $erroresCampos['campo']; ?>
		
			<input type="submit" name="enviar" value="Enviar">
	
		</form>
		<?PHP
		}
		else{
			
			//Tratamos el formulario
		}
		?>
			
			
</body>
</html>