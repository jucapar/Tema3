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
			'nombre' => '',
			'apellido' => '',
			'fechaNac' => '',
			'email' => '',
			'password' => '',
			'sexo' => '',
			'altura' => '',
			'peso' => '',
			'estudios' => '',
			'musica' => '',
			'sistemaOperativo' => '',
			'sugerencias' => ''
		);
		
		
		$erroresCampos = array(
			'nombre' => '',
			'apellido' => '',
			'fechaNac' => '',
			'email' => '',
			'password' => '',
			'sexo' => '',
			'altura' => '',
			'peso' => '',
			'estudios' => '',
			'musica' => '',
			'sistemaOperativo' => '',
			'sugerencias' => ''
		);
		
		$erroresEstilos = array(
			'nombre' => '',
			'apellido' => '',
			'fechaNac' => '',
			'email' => '',
			'password' => '',
			'sexo' => '',
			'altura' => '',
			'peso' => '',
			'estudios' => '',
			'musica' => '',
			'sistemaOperativo' => '',
			'sugerencias' => ''
		);
	
	  
		$arrayEstudios = array(
			'ESO' => '',
			'Bachillerato' => '',
			'Universidad' => '',
			'FP' => ''
		);
		
		$arraySistemaOperativo = array(
			'Windows' => '',
			'Mac' => '',
			'Linux' => '',
			'Otro' => ''
		);
		
		$arraySexo = array(
			'Hombre' => '',
			'Mujer' => '',
			
		);
		
	
		if (filter_has_var(INPUT_POST,'enviar')){//Si hemos pulsado el boton de Enviar
			//Comenzamos las validaciones de datos
			//Ejecutamos la funcion de validacion y recogemos el valor devuelto
			$valida = validarCadenaAlfabetica($_POST['nombre'],MIN,MAX);
			//Si el valor es distinto de 0 ha habido un error y procedemos a tratarlo
			if($valida != 0) {
			//Asignamos el error producido al valor correspondiente en el array de errores
			$erroresCampos['nombre'] = $arrayErrores[$valida];
			//Activamos el class correspondiente para marcar el borde del campo en rojo
			$erroresEstilos['nombre'] = "error";
			//Como ha habido un error, la variable de control $error toma el valor true
			$error = true;
		
			}
			else {
				//Si no ha habido ningun error, guardamos el valor enviado en el array de cuestionario
				$resultado['nombre'] = $_POST['nombre'];
				
			}
				
				
			$valida =  validarCadenaAlfabetica($_POST['apellido'],MIN,MAX);
			if($valida != 0) {
				$erroresCampos['apellido'] = $arrayErrores[$valida];
				$erroresEstilos['apellido'] = "error";
				$error = true;
				}
				else {
					$resultado['apellido'] = $_POST['apellido'];
			}
			
			$valida =validarCadenaAlfanumerica($_POST['password'],MIN,MAX);
			if($valida != 0) {
				$erroresCampos['password'] = $arrayErrores[$valida];
				$erroresEstilos['password'] = "error";
				$error = true;
				}
			else {
					$resultado['password'] = $_POST['password'];
			}
			
			
			$valida = validarEmail($_POST['email']);
			if($valida != 0) {
				$erroresCampos['email'] = $arrayErrores[$valida];
				$erroresEstilos['email'] = "error";
				$error = true;
				}
			else {
					$resultado['email'] = $_POST['email'];
			}
			
			
			if(empty($_POST['sexo'])) {
				$erroresCampos['sexo'] = $arrayErrores[1];
				$erroresEstilos['sexo'] = "error";
				$error = true;
				}
			else {
					
					$resultado['sexo'] = $_POST['sexo'];
					$arraySexo[$resultado['sexo']] = "checked";
			}
			
			$valida = validarCadenaAlfanumerica($_POST['fechaNac'],MIN,MAX);
			if($valida != 0) {
				$erroresCampos['fechaNac'] = $arrayErrores[$valida];
				$erroresEstilos['fechaNac'] = "error";
				$error = true;
				}
			else {
					$resultado['fechaNac'] = $_POST['fechaNac'];
			}
			
			$valida = validarEntero($_POST['altura'],MIN,MAX);
			
			if($valida != 0) {
				$erroresCampos['altura'] = $arrayErrores[$valida];
				$erroresEstilos['altura'] = "error";
				$error = true;
				}
			else {
					$resultado['altura'] = $_POST['altura'];
			}
			
			
			$valida = validarReal($_POST['peso'],0,300);
			if($valida != 0) {
				$erroresCampos['peso'] = $arrayErrores[$valida];
				$erroresEstilos['peso'] = "error";
				$error = true;
				}
			else {
					$resultado['peso'] = $_POST['peso'];
			}
			
			
			
			if(!isset($_POST['estudios'])) {
				$erroresCampos['estudios'] = $arrayErrores[1];
				$erroresEstilos['estudios'] = "error";
				$error = true;
				}
			else {
					$resultado['estudios'] = $_POST['estudios'];
					foreach($resultado['estudios'] as $valor){
					$arrayEstudios[$valor] = "checked";
					}
			}
			
			
			$valida = validarCadenaAlfanumerica($_POST['musica'],MIN,MAX);
			if($valida != 0) {
				$erroresCampos['musica'] = $arrayErrores[$valida];
				$erroresEstilos['musica'] = "error";
				$error = true;
				}
			else {
					$resultado['musica'] = $_POST['musica'];
			}
			
			
			$valida = validarCadenaAlfanumerica($_POST['sistemaOperativo'],MIN,MAX);
			if($valida != 0) {
				$erroresCampos['sistemaOperativo'] = $arrayErrores[$valida];
				$erroresEstilos['sistemaOperativo'] = "error";
				$error = true;
				}
			else {
					$resultado['sistemaOperativo'] = $_POST['sistemaOperativo'];
					$arraySistemaOperativo[$resultado['sistemaOperativo']] = "selected";
			}
			
			
			$valida = validarCadenaAlfanumerica($_POST['sugerencias1'],MIN,MAX);
			if($valida != 0) {
				$erroresCampos['sugerencias'] = $arrayErrores[$valida];
				$erroresEstilos['sugerencias'] = "error";
				$error = true;
				}
			else {
					$resultado['sugerencias'] = $_POST['sugerencias1'];
			}
			
		}
		//Si no hemos pulsado el boton, o ha habido un error en la validacion mostrarmos el formulario
		if(!filter_has_var(INPUT_POST,'enviar')|| $error ){
			
			?>
			
			<form action="<?PHP echo $_SERVER['PHP_SELF']; ?>" id="formulario1" method="post">
	
			<label for="nombre">Nombre:</label><br />
			<input type="text" name="nombre" value="<?php echo $resultado['nombre'];?>" class="<?PHP echo $erroresEstilos['nombre'];?>"><br /><br />
			<?PHP echo $erroresCampos['nombre']; ?>
			
			<label for="apellido">Apellido:</label><br />
			<input type="text" name="apellido" value="<?php echo $resultado['apellido'];?>" class="<?PHP echo $erroresEstilos['apellido'];?>"><br /><br />
			<?PHP echo $erroresCampos['apellido']; ?>
			
			<label for="password">Password</label><br />
			<input type="password" name="password" value="<?php echo $resultado['password'];?>" class="<?PHP echo $erroresEstilos['password'];?>"><br /><br />
			<?PHP echo $erroresCampos['password']; ?>
			
			<label for="email">Email</label><br />
			<input type="email" name="email" value="<?php echo $resultado['email'];?>" class="<?PHP echo $erroresEstilos['email'];?>"><br /><br />
			<?PHP echo $erroresCampos['email']; ?>
		
			<label for="sexo">Sexo</label><br />
			<input type="radio" name="sexo" value="Hombre" <?php echo $arraySexo['Hombre'];?> class="<?PHP echo $erroresEstilos['sexo'];?>"> Hombre
			<input type="radio" name="sexo" value="Mujer" <?php echo $arraySexo['Mujer'];?> class="<?PHP echo $erroresEstilos['sexo'];?>"> Mujer<br /><br />
			<?PHP echo $erroresCampos['sexo']; ?>
			
			
			<label for="fechaNac">Fecha de Nacimiento</label><br />
			<input type="date" name="fechaNac" value="<?php echo $resultado['fechaNac'];?>" class="<?PHP echo $erroresEstilos['fechaNac'];?>"><br /><br />
			<?PHP echo $erroresCampos['fechaNac']; ?>
		
			
			<label for="altura">Altura</label><br />
			<input type="text" name="altura" value="<?php echo $resultado['altura'];?>" class="<?PHP echo $erroresEstilos['altura'];?>"><br /><br />
			<?PHP echo $erroresCampos['altura']; ?>
			
			
			<label for="peso">Peso</label><br />
			<input type="text" name="peso" value="<?php echo $resultado['peso'];?>" class="<?PHP echo $erroresEstilos['peso'];?>"><br /><br />
			<?PHP echo $erroresCampos['peso']; ?>
		
			
			<label for="estudios">Estudios:</label><br />	
			<input type="checkbox" name="estudios[]" value="ESO" <?php echo $arrayEstudios['ESO'];?> class="<?PHP echo $erroresEstilos['estudios'];?>">ESO <br />
			<input type="checkbox" name="estudios[]" value="Bachillerato" <?php echo $arrayEstudios['Bachillerato'];?> class="<?PHP echo $erroresEstilos['estudios'];?>">Bachillerato<br />
			<input type="checkbox" name="estudios[]" value="Universidad" <?php echo $arrayEstudios['Universidad'];?> class="<?PHP echo $erroresEstilos['estudios'];?>"> Universidad<br />
			<input type="checkbox" name="estudios[]" value="FP" <?php echo $arrayEstudios['FP'];?> class="<?PHP echo $erroresEstilos['estudios'];?>">FP<br /><br />
			<?PHP echo $erroresCampos['estudios']; ?>
			
				
			<label for="musica">Musica favorita:</label><br />	
			<input list="musica" name="musica" class="<?PHP echo $erroresEstilos['musica'];?>">
			<datalist id="musica">
				<option value="Rock">
				<option value="Pop">
				<option value="Rap">
			</datalist>
			<br />
			<?PHP echo $erroresCampos['musica']; ?>
			<br /><br />
		
			<label for="sistemaOperativo">Sistema Operativo:</label><br />	
			<select  name="sistemaOperativo">
				<option value="Windows" <?php echo $arraySistemaOperativo['Windows'];?> class="<?PHP echo $erroresEstilos['sistemaOperativo'];?>">Windows</option>
				<option value="Mac" <?php echo $arraySistemaOperativo['Mac'];?> class="<?PHP echo $erroresEstilos['sistemaOperativo'];?>">Mac</option>
				<option value="Linux" <?php echo $arraySistemaOperativo['Linux'];?> class="<?PHP echo $erroresEstilos['sistemaOperativo'];?>">Linux</option>
				<option value="Otro" <?php echo $arraySistemaOperativo['Otro'];?> class="<?PHP echo $erroresEstilos['sistemaOperativo'];?>">Otro</option>
			</select>
			<br />
			<?PHP echo $erroresCampos['sistemaOperativo']; ?>
			<br /><br />	
		
			<label for="sugerencias">Sugerencias:</label><br />	
			<textarea  cols="86" rows ="20" name="sugerencias1" form="formulario1" class="<?PHP echo $erroresEstilos['sugerencias'];?>" ><?php echo $resultado['sugerencias'];?></textarea>
			<br />	
			<?PHP echo $erroresCampos['sugerencias']; ?>
		
			<input type="submit" name="enviar" value="Enviar">
	
		</form>
			
			<?php
			//Si no ha habido ningun error, realizamos el tratamiento de los datos
			}else{
				foreach($resultado as $clave => $valor){
					if(is_array($valor)){
						echo("<strong>".$clave.":</strong>");
						foreach($valor as $campo){
							echo "$campo  ";
							}
							echo "<br />";
					}
					else{
						echo "<strong>".$clave."</strong>:".$valor."<br />";
						}
					}
					
				}
			
			?>
		
</body>
</html>
