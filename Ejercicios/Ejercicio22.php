<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ejercicio 23</title>
</head>
<body>


<?php
		/*
			Juan Carlos Pastor Regueras
			Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente. 
			Fecha revision: 19-10-2017
		*/
		include "LibreriaValidacionFormularios.php";
		define ("MIN",5);
		define ("MAX",30);
		$arrayErrores = array(" ", "No ha introducido ningun valor<br />", "El valor introducido no es valido<br />","Tamaño minimo no valido<br />", "Tamaño maximo no valido<br />");
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
		
		$error = false;
		
		$nombre = "";
		$apellido = "";
		$fechaNac = "";
		$email = "";
		$password = "";
		$sexo = null;
		$altura = 0;
		$peso = 0;
		$estudios = null;
		$musica = "";
		$sistemaOperativo = "";
		$sugerencias = "";
	   
		$valida = 0;
		
		
	
		if (filter_has_var(INPUT_POST,'enviar')){
			
			$valida = validarCadenaAlfabetica($_POST['nombre'],MIN,MAX);
			if($valida != 0) {
			$erroresCampos['nombre'] = $arrayErrores[$valida];
			$error = true;
			}
			else {
				$nombre = $_POST['nombre'];
				
			}
				
				
			$valida =  validarCadenaAlfabetica($_POST['apellido'],MIN,MAX);
			if($valida != 0) {
				$erroresCampos['apellido'] = $arrayErrores[$valida];
				$error = true;
				}
				else {
					$apellido = $_POST['apellido'];
			}
			
			$valida =validarCadenaAlfanumerica($_POST['password'],MIN,MAX);
			if($valida != 0) {
				$erroresCampos['password'] = $arrayErrores[$valida];
				$error = true;
				}
			else {
					$password = $_POST['password'];
			}
			
			
			$valida = validarEmail($_POST['email']);
			if($valida != 0) {
				$erroresCampos['email'] = $arrayErrores[$valida];
				$error = true;
				}
			else {
					$email = $_POST['email'];
			}
			
			$valida = validarCadenaAlfabetica($_POST['sexo'],MIN,MAX);
			if($valida != 0) {
				$erroresCampos['sexo'] = $arrayErrores[$valida];
				$error = true;
				}
			else {
					
					$sexo = $_POST['sexo'];
					$arraySexo[$sexo] = "checked";
			}
			
			$valida = validarCadenaAlfanumerica($_POST['fechaNac'],MIN,MAX);
			if($valida != 0) {
				$erroresCampos['fechaNac'] = $arrayErrores[$valida];
				$error = true;
				}
			else {
					$fechaNac = $_POST['fechaNac'];
			}
			
			$valida = validarReal($_POST['altura'],0,2);
			
			if($valida != 0) {
				$erroresCampos['altura'] = $arrayErrores[$valida];
				$error = true;
				}
			else {
					$altura = $_POST['altura'];
			}
			
			
			$valida = validarReal($_POST['peso'],0,300);
			if($valida != 0) {
				$erroresCampos['peso'] = $arrayErrores[$valida];
				$error = true;
				}
			else {
					$peso = $_POST['peso'];
			}
			
			
			
			if(!isset($_POST['estudios'])) {
				$erroresCampos['estudios'] = $arrayErrores[1];
				$error = true;
				}
			else {
					$estudios = $_POST['estudios'];
					foreach($estudios as $valor){
					$arrayEstudios[$valor] = "checked";
					}
			}
			
			
			$valida = validarCadenaAlfanumerica($_POST['musica'],MIN,MAX);
			if($valida != 0) {
				$erroresCampos['musica'] = $arrayErrores[$valida];
				$error = true;
				}
			else {
					$musica = $_POST['musica'];
			}
			
			
			$valida = validarCadenaAlfanumerica($_POST['sistemaOperativo'],MIN,MAX);
			if($valida != 0) {
				$erroresCampos['sistemaOperativo'] = $arrayErrores[$valida];
				$error = true;
				}
			else {
					$sistemaOperativo = $_POST['sistemaOperativo'];
					$arraySistemaOperativo[$sistemaOperativo] = "selected";
			}
			
			
			$valida = validarCadenaAlfanumerica($_POST['sugerencias'],MIN,MAX);
			if($valida != 0) {
				$erroresCampos['sugerencias'] = $arrayErrores[$valida];
				$error = true;
				}
			else {
					$sugerencias = $_POST['sugerencias'];
			}
			
		}
		if(!filter_has_var(INPUT_POST,'enviar')|| $error ){
			
			?>
			
			<form action="<?PHP echo $_SERVER['PHP_SELF']; ?>" id="formulario1" method="post">
	
			<label for="nombre">Nombre:</label><br />
			<input type="text" name="nombre" value=""><br /><br />
			<?PHP echo $erroresCampos['nombre']; ?>
			
			<label for="apellido">Apellido:</label><br />
			<input type="text" name="apellido" value=""><br /><br />
			<?PHP echo $erroresCampos['apellido']; ?>
			
			<label for="password">Password</label><br />
			<input type="password" name="password" value=""><br /><br />
			<?PHP echo $erroresCampos['password']; ?>
			
			<label for="email">Email</label><br />
			<input type="email" name="email" value=""><br /><br />
			<?PHP echo $erroresCampos['email']; ?>
		
			<label for="sexo">Sexo</label><br />
			<input type="radio" name="sexo" value="Hombre"> Hombre
			<input type="radio" name="sexo" value="Mujer"> Mujer<br /><br />
			<?PHP echo $erroresCampos['sexo']; ?>
			
			
			<label for="fechaNac">Fecha de Nacimiento</label><br />
			<input type="date" name="fechaNac" value=""><br /><br />
			<?PHP echo $erroresCampos['fechaNac']; ?>
		
			
			<label for="altura">Altura</label><br />
			<input type="text" name="altura" value=""<br /><br />
			<?PHP echo $erroresCampos['altura']; ?>
			
			
			<label for="peso">Peso</label><br />
			<input type="text" name="peso" value=""<br /><br />
			<?PHP echo $erroresCampos['peso']; ?>
		
			
			<label for="estudios">Estudios:</label><br />	
			<input type="checkbox" name="estudios[]" value="ESO">ESO <br />
			<input type="checkbox" name="estudios[]" value="Bachillerato">Bachillerato<br />
			<input type="checkbox" name="estudios[]" value="Universidad" > Universidad<br />
			<input type="checkbox" name="estudios[]" value="FP" >FP<br /><br />
			<?PHP echo $erroresCampos['estudios']; ?>
			
				
			<label for="musica">Musica favorita:</label><br />	
			<input list="musica" name="musica" value="<?php echo $musica;?>">
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
				<option value="Windows">Windows</option>
				<option value="Mac">Mac</option>
				<option value="Linux" >Linux</option>
				<option value="Otro" Otro</option>
			</select>
			<br />
			<?PHP echo $erroresCampos['sistemaOperativo']; ?>
			<br /><br />	
		
			<label for="sugerencias">Sugerencias:</label><br />	
			<textarea  cols="86" rows ="20" name="sugerencias" form="formulario1" ></textarea>
			<br />	
			<?PHP echo $erroresCampos['sugerencias']; ?>
		
			<input type="submit" name="enviar" value="Enviar">
	
		</form>
			
			<?php
			
			}else{
				
				echo ("Nombre: $nombre<br />");
		
				echo ("Apellidos: $apellido<br />");
		
				echo ("E-mail: $email<br />");
		
				echo ("Password: $password<br />");
		
				echo ("Sexo: $sexo<br />");
		
				echo ("Fecha de nacimiento: $fechaNac<br />");
		
				echo ("Altura: $altura<br />");
		
				echo ("Peso: $peso<br />");
		
				echo ("Estudios:<br />");
		
				foreach($estudios as $valor){
					echo ("$valor<br />");
				}
				
				echo ("Musica favorita:$musica <br />");
		
				echo ("Sistema operativo: $sistemaOperativo<br />");
		
				echo ("Sugerencias $sugerencias");
			}
			
			?>
		
</body>
</html>