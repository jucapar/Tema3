<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ejercicio 21</title>
</head>
<body>


<?php
		/*
			Juan Carlos Pastor Regueras
			Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas recogidas. 
			Fecha revision: 19-10-2017
		*/
	$nombre = "";
		$apellido = "";
		$fechaNacimiento = "";
		$email = "";
		$password ="";
		$sexo = "";
		$altura = 0;
		$peso = 0;
		$estudios = array();
		$musica = "";
		$sugerencias = "";
	if(filter_has_var(INPUT_POST,'enviar')){
			
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$fechaNac = $_POST['fechaNac'];
		$sexo = $_POST['sexo'];
		$altura = $_POST['altura'];
		$peso = $_POST['peso'];
		$estudios = $_POST['estudios'];
		$musica = $_POST['musica'];
		$sistemaOperativo = $_POST['sistemaOperativo'];
		$sugerencias = $_POST['sugerencias'];
		echo ("Nombre: $nombre<br />");
		
		echo ("Apellidos: $apellido<br />");
		
		echo ("E-mail: $email<br />");
		
		echo ("Password: $password<br />");
		
		echo ("Sexo: $sexo<br />");
		
		echo ("Fecha de nacimiento: $fechaNacimiento<br />");
		
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
	else {
		?>
	<form action="<?PHP echo $_SERVER['PHP_SELF']; ?>" id="formulario1" method="post">
	
		<label for="nombre">Nombre:</label><br />
		<input type="text" name="nombre" value=""><br /><br />

		<label for="apellido">Apellido:</label><br />
		<input type="text" name="apellido" value=""><br /><br />

		<label for="password">Password</label><br />
		<input type="password" name="password"><br /><br />

		<label for="email">Email</label><br />
		<input type="email" name="email"><br /><br />

		<label for="sexo">Sexo</label><br />
		<input type="radio" name="sexo" value="Hombre" checked> Hombre
		<input type="radio" name="sexo" value="Mujer"> Mujer<br /><br />
	 
		<label for="fechaNac">Fecha de Nacimiento</label><br />
		<input type="date" name="fechaNac"><br /><br />

		<label for="altura">Altura</label><br />
		<input type="text" name="altura" value=""><br /><br />

		<label for="peso">Peso:</label><br />
		<input type="text" name="peso" value=""><br /><br />

		<label for="estudios">Estudios:</label><br />	
		<input type="checkbox" name="estudios[]" value="ESO">ESO<br />
		<input type="checkbox" name="estudios[]" value="Bachillerato">Bachillerato<br />
		<input type="checkbox" name="estudios[]" value="Universidad"> Universidad<br />
		<input type="checkbox" name="estudios[]" value="FP">FP<br /><br />
	
		<label for="musica">Musica favorita:</label><br />	
		<input list="musica" name="musica">
		<datalist id="musica">
			<option value="Rock">
			<option value="Pop">
			<option value="Rap">
		</datalist>
		
		<br /><br />
		<label for="sistemaOperativo">Sistema Operativo:</label><br />	
		<select  name="sistemaOperativo">
			<option value="Windows" selected="selected">Windows</option>
			<option value="Mac">Mac</option>
			<option value="Linux">Linux</option>
			<option value="Otro">Otro</option>
		</select>
		<br />	<br />	
		<label for="sugerencias">Sugerencias:</label><br />	
		<textarea  cols="86" rows ="20" name="sugerencias" form="formulario1"> Escriba aqui sus sugerencias</textarea>
		<br />	
   
		<input type="submit" name="enviar" value="Enviar">
	
	</form>
	
  </form>
<?php	
	}

?>

</body>
</html>
