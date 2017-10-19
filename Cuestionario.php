<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="estilosCuestionario.css">
  <title>Cuestionario</title>
</head>
<body>


<?php
		include "LibreriaValidacionFormularios.php";
		
		define ("MIN",5);
		define ("MAX",30);
		define ("MINALTURA",30);
		define ("MAXALTURA",220);
		define ("MINPESO",30);
		define ("MAXPESO",300);
		define ("DIMENSION",3);
		$error = false;
		$valida = 0;
		$directorioSubida = "img/";
	
		$cuestionario = array();
		$erroresCampos = array();
		$arraySexo = array();
		$arrayAficiones = array();
		
		
		for($i = 0;$i < DIMENSION; $i++){
			$cuestionario[$i] = array(
			'dni' => '',
			'nombre' => '',
			'apellido' => '',
			'email' => '',
			'altura' => '',
			'peso' => '',
			'fechanac' => '',
			'url' => '',
			'telefono' => '',
			'sexo' => '',
			'aficiones' => '',
			'sugerencias' => '',
			'foto' => ''
			);
			
			$erroresCampos[$i] = array(
			'dni' => '',
			'nombre' => '',
			'apellido' => '',
			'email' => '',
			'altura' => '',
			'peso' => '',
			'fechanac' => '',
			'url' => '',
			'telefono' => '',
			'sexo' => '',
			'aficiones' => '',
			'sugerencias' => '',
			'foto' => ''
			);
			
			$arraySexo[$i] = array(
			'Hombre' => '',
			'Mujer' => ''
			);
			
			$arrayAficiones[$i] = array(
				'Musica' => '',
				'Cine' => '',
				'Lectura' => '',
				'Deporte' => ''
			);
				
		}
	
		$arrayErrores = array(" ", "No ha introducido ningun valor<br />", "El valor introducido no es valido<br />","Tamaño minimo no valido<br />", "Tamaño maximo no valido<br />");
		
		if (filter_has_var(INPUT_POST,'enviar')){
			
			
			for ($i = 0;$i<DIMENSION;$i++){
				$valida = validarDNI($_POST['dni'][$i],MIN,MAX);
				if($valida != 0) {
					$erroresCampos[$i]['dni'] = $arrayErrores[$valida];
					$error = true;
				}
				else {
					$cuestionario[$i]['dni'] = $_POST['dni'][$i];
				}
				
				$valida = validarCadenaAlfabetica($_POST['nombre'][$i],MIN,MAX);
				if($valida != 0) {
					$erroresCampos[$i]['nombre'] = $arrayErrores[$valida];
					$error = true;
				}
				else {
					$cuestionario[$i]['nombre'] = $_POST['nombre'][$i];
				}
						
				
				$valida =  validarCadenaAlfabetica($_POST['apellido'][$i],MIN,MAX);
				if($valida != 0) {
					$erroresCampos[$i]['apellido'] = $arrayErrores[$valida];
					$error = true;
				}
				else {
					$cuestionario[$i]['apellido'] = $_POST['apellido'][$i];
				}
				
				
				$valida =  validarEmail($_POST['email'][$i]);
				if($valida != 0) {
					$erroresCampos[$i]['email'] = $arrayErrores[$valida];
					$error = true;
				}
				else {
					$cuestionario[$i]['email'] = $_POST['email'][$i];
				}
				
				$valida =  validarEntero($_POST['altura'][$i],MINALTURA,MAXALTURA);
				if($valida != 0) {
					$erroresCampos[$i]['altura'] = $arrayErrores[$valida];
					$error = true;
				}
				else {
					$cuestionario[$i]['altura'] = $_POST['altura'][$i];
				}
				
				$valida =  validarReal($_POST['peso'][$i],MINPESO,MAXPESO);
				if($valida != 0) {
					$erroresCampos[$i]['peso'] = $arrayErrores[$valida];
					$error = true;
				}
				else {
					$cuestionario[$i]['peso'] = $_POST['peso'][$i];
				}
				
				
				if(empty($_POST['fechanac'][$i])) {
					$erroresCampos[$i]['fechanac'] = $arrayErrores[1];
					$error = true;
				}
				else {
					$cuestionario[$i]['fechanac'] = $_POST['fechanac'][$i];
					
				}
				
				$valida =  validarURL($_POST['url'][$i]);
				if($valida != 0) {
					$erroresCampos[$i]['url'] = $arrayErrores[$valida];
					$error = true;
				}
				else {
					$cuestionario[$i]['url'] = $_POST['url'][$i];
	
				}
				
				$valida =  validarTelefono($_POST['telefono'][$i]);
				if($valida != 0) {
					$erroresCampos[$i]['telefono'] = $arrayErrores[$valida];
					$error = true;
				}
				else {
					$cuestionario[$i]['telefono'] = $_POST['telefono'][$i];
	
				}
			
				$valida =  validarCadenaAlfanumerica($_POST['sugerencias'][$i],MIN,MAX);
				if($valida != 0) {
					$erroresCampos[$i]['sugerencias'] = $arrayErrores[$valida];
					$error = true;
				}
				else {
					$cuestionario[$i]['sugerencias'] = $_POST['sugerencias'][$i];
				}
				
				if(!isset($_POST['sexo'.$i])) {
					$erroresCampos[$i]['sexo'] = $arrayErrores[1];
					$error = true;
				}
				else {
					$cuestionario[$i]['sexo'] = $_POST['sexo'.$i];
					$arraySexo[$i][$cuestionario[$i]['sexo']] = 'checked';
				}
				
				if(!isset($_POST['aficiones'.$i])) {
					$erroresCampos[$i]['aficiones'] = $arrayErrores[1];
					$error = true;
				}
				else {
					$cuestionario[$i]['aficiones'] = $_POST['aficiones'.$i];
					foreach($cuestionario[$i]['aficiones'] as $valor){
					$arrayAficiones[$i][$valor] = "checked";
					}
				}
				
				$cuestionario[$i]['foto'] = $directorioSubida . basename($_FILES['foto'.$i]['name']);
	
				if (!move_uploaded_file($_FILES['foto'.$i]['tmp_name'], $cuestionario[$i]['foto'])) {
						$erroresCampos[$i]['foto'] = $arrayErrores[1];
						$error = true;
						$cuestionario[$i]['foto'] = '';
				} 
				
			}

						
		}
		if(!filter_has_var(INPUT_POST,'enviar')|| $error ){
			
			?>
			<div id="container">
			<form enctype="multipart/form-data" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" id="formulario1" method="post">
	
			<div id="persona1">
				<label for="dni[0]">DNI:</label><br />
				<input type="text" name="dni[0]" value="<?PHP echo $cuestionario[0]['dni']; ?>"><br /><br />
				<?PHP echo $erroresCampos[0]['dni']; ?>
				
				<label for="nombre[0]">Nombre:</label><br />
				<input type="text" name="nombre[0]" value="<?PHP echo $cuestionario[0]['nombre']; ?>"><br /><br />
				<?PHP echo $erroresCampos[0]['nombre']; ?>
			
				<label for="apellido[0]">Apellido:</label><br />
				<input type="text" name="apellido[0]" value="<?PHP echo $cuestionario[0]['apellido']; ?>"><br /><br />
				<?PHP echo $erroresCampos[0]['apellido']; ?>
				
				<label for="email[0]">Email:</label><br />
				<input type="text" name="email[0]" value="<?PHP echo $cuestionario[0]['email']; ?>"><br /><br />
				<?PHP echo $erroresCampos[0]['email']; ?>
				
				
				<label for="altura[0]">Altura (en cm):</label><br />
				<input type="text" name="altura[0]" value="<?PHP echo $cuestionario[0]['altura']; ?>"><br /><br />
				<?PHP echo $erroresCampos[0]['altura']; ?>
				
				
				<label for="peso[0]">Peso:</label><br />
				<input type="text" name="peso[0]" value="<?PHP echo $cuestionario[0]['peso']; ?>"><br /><br />
				<?PHP echo $erroresCampos[0]['peso']; ?>
				
				
				<label for="fechanac[0]">Fecha de nacimiento:</label><br />
				<input type="date" name="fechanac[0]" value="<?PHP echo $cuestionario[0]['fechanac']; ?>"><br /><br />
				<?PHP echo $erroresCampos[0]['fechanac']; ?>
				
				<label for="url[0]">URL:</label><br />
				<input type="text" name="url[0]" value="<?PHP echo $cuestionario[0]['url']; ?>"><br /><br />
				<?PHP echo $erroresCampos[0]['url']; ?>
				
				<label for="telefono[0]">Telefono:</label><br />
				<input type="text" name="telefono[0]" value="<?PHP echo $cuestionario[0]['telefono']; ?>"><br /><br />
				<?PHP echo $erroresCampos[0]['telefono']; ?>
				
				<label for="sexo">Sexo</label><br />
				<input type="radio" name="sexo0" value="Hombre" <?php echo $arraySexo[0]['Hombre'];?> > Hombre
				<input type="radio" name="sexo0" value="Mujer" <?php echo $arraySexo[0]['Mujer'];?> > Mujer<br /><br />
				<?PHP echo $erroresCampos[0]['sexo']; ?>
				
				<label for="aficiones0[]">Aficiones:</label><br />	
					<input type="checkbox" name="aficiones0[]" value="Musica" <?php echo $arrayAficiones[0]['Musica'];?>>Musica <br />
					<input type="checkbox" name="aficiones0[]" value="Cine"  <?php echo $arrayAficiones[0]['Cine'];?>>Cine<br />
					<input type="checkbox" name="aficiones0[]" value="Lectura" <?php echo $arrayAficiones[0]['Lectura'];?>>Lectura<br />
					<input type="checkbox" name="aficiones0[]" value="Deporte" <?php echo $arrayAficiones[0]['Deporte'];?>>Deporte<br /><br />
				<?PHP echo $erroresCampos[0]['aficiones']; ?>
				
				<label for="sugerencias[0]">Sugerencias:</label><br />	
				<textarea  cols="20" rows ="10" name="sugerencias[0]" form="formulario1"><?php echo $cuestionario[0]['sugerencias'];?></textarea>
				<br />	
				<?PHP echo $erroresCampos[0]['sugerencias']; ?>
				<label for="foto[0]">Seleccione una foto de perfil:</label><br />
				<input type="file" id="file" name="foto0">
				<br />
				<?PHP echo $erroresCampos[0]['foto']; ?>
				
			
			</div>
			
			<div id="persona2">
				<label for="dni[1]">DNI:</label><br />
				<input type="text" name="dni[1]" value="<?PHP echo $cuestionario[1]['dni']; ?>"><br /><br />
				<?PHP echo $erroresCampos[1]['dni']; ?>
			
				<label for="nombre[1]">Nombre:</label><br />
				<input type="text" name="nombre[1]" value="<?PHP echo $cuestionario[1]['nombre']; ?>"><br /><br />
				<?PHP echo $erroresCampos[1]['nombre']; ?>
			
				<label for="apellido[1]">Apellido:</label><br />
				<input type="text" name="apellido[1]" value="<?PHP echo $cuestionario[1]['apellido']; ?>"><br /><br />
				<?PHP echo $erroresCampos[1]['apellido']; ?>
				
				<label for="email[1]">Email:</label><br />
				<input type="text" name="email[1]" value="<?PHP echo $cuestionario[1]['email']; ?>"><br /><br />
				<?PHP echo $erroresCampos[1]['email']; ?>
				
				<label for="altura[1]">Altura (en cm):</label><br />
				<input type="text" name="altura[1]" value="<?PHP echo $cuestionario[1]['altura']; ?>"><br /><br />
				<?PHP echo $erroresCampos[1]['altura']; ?>
				
				
				<label for="peso[1]">Peso:</label><br />
				<input type="text" name="peso[1]" value="<?PHP echo $cuestionario[1]['peso']; ?>"><br /><br />
				<?PHP echo $erroresCampos[1]['peso']; ?>
				
				
				<label for="fechanac[1]">Fecha de nacimiento:</label><br />
				<input type="date" name="fechanac[1]" value="<?PHP echo $cuestionario[1]['fechanac']; ?>"><br /><br />
				<?PHP echo $erroresCampos[1]['fechanac']; ?>
					
				<label for="url[1]">URL:</label><br />
				<input type="text" name="url[1]" value="<?PHP echo $cuestionario[1]['url']; ?>"><br /><br />
				<?PHP echo $erroresCampos[1]['url']; ?>
				
				<label for="telefono[1]">Telefono:</label><br />
				<input type="text" name="telefono[1]" value="<?PHP echo $cuestionario[1]['telefono']; ?>"><br /><br />
				<?PHP echo $erroresCampos[1]['telefono']; ?>
				
				<label for="sexo">Sexo</label><br />
				<input type="radio" name="sexo1" value="Hombre" <?php echo $arraySexo[1]['Hombre'];?> > Hombre
				<input type="radio" name="sexo1" value="Mujer" <?php echo $arraySexo[1]['Mujer'];?> > Mujer<br /><br />
				<?PHP echo $erroresCampos[1]['sexo']; ?>
				
				<label for="aficiones1[]">Aficiones:</label><br />	
					<input type="checkbox" name="aficiones1[]" value="Musica" <?php echo $arrayAficiones[1]['Musica'];?>>Musica <br />
					<input type="checkbox" name="aficiones1[]" value="Cine"  <?php echo $arrayAficiones[1]['Cine'];?>>Cine<br />
					<input type="checkbox" name="aficiones1[]" value="Lectura" <?php echo $arrayAficiones[1]['Lectura'];?>>Lectura<br />
					<input type="checkbox" name="aficiones1[]" value="Deporte" <?php echo $arrayAficiones[1]['Deporte'];?>>Deporte<br /><br />
				<?PHP echo $erroresCampos[1]['aficiones']; ?>
				
				<label for="sugerencias[1]">Sugerencias:</label><br />	
				<textarea  cols="20" rows ="10" name="sugerencias[1]" form="formulario1"><?php echo $cuestionario[1]['sugerencias'];?></textarea>
				<br />	
			<?PHP echo $erroresCampos[1]['sugerencias']; ?>
			
				<label for="foto[1]">Seleccione una foto de perfil:</label><br />
				<input type="file" id="file" name="foto1">
				<br />
				<?PHP echo $erroresCampos[1]['foto']; ?>
			</div>
			
			<div id="persona2">
				<label for="dni[2]">DNI:</label><br />
				<input type="text" name="dni[2]" value="<?PHP echo $cuestionario[2]['dni']; ?>"><br /><br />
				<?PHP echo $erroresCampos[2]['dni']; ?>
				
				<label for="nombre[2]">Nombre:</label><br />
				<input type="text" name="nombre[2]" value="<?PHP echo $cuestionario[2]['nombre']; ?>"><br /><br />
				<?PHP echo $erroresCampos[2]['nombre']; ?>
			
				<label for="apellido[2]">Apellido:</label><br />
				<input type="text" name="apellido[2]" value="<?PHP echo $cuestionario[2]['apellido']; ?>"><br /><br />
				<?PHP echo $erroresCampos[2]['apellido']; ?>
				
				<label for="email[2]">Email:</label><br />
				<input type="text" name="email[2]" value="<?PHP echo $cuestionario[2]['email']; ?>"><br /><br />
				<?PHP echo $erroresCampos[2]['email']; ?>
				
				<label for="altura[2]">Altura (en cm):</label><br />
				<input type="text" name="altura[2]" value="<?PHP echo $cuestionario[2]['altura']; ?>"><br /><br />
				<?PHP echo $erroresCampos[2]['altura']; ?>
				
				
				<label for="peso[2]">Peso:</label><br />
				<input type="text" name="peso[2]" value="<?PHP echo $cuestionario[2]['peso']; ?>"><br /><br />
				<?PHP echo $erroresCampos[2]['peso']; ?>
				
				
				<label for="fechanac[2]">Fecha de nacimiento:</label><br />
				<input type="date" name="fechanac[2]" value="<?PHP echo $cuestionario[2]['fechanac']; ?>"><br /><br />
				<?PHP echo $erroresCampos[2]['fechanac']; ?>
				
				<label for="url[2]">URL:</label><br />
				<input type="text" name="url[2]" value="<?PHP echo $cuestionario[2]['url']; ?>"><br /><br />
				<?PHP echo $erroresCampos[2]['url']; ?>
				
				<label for="telefono[2]">Telefono:</label><br />
				<input type="text" name="telefono[2]" value="<?PHP echo $cuestionario[2]['telefono']; ?>"><br /><br />
				<?PHP echo $erroresCampos[2]['telefono']; ?>
				
				<label for="sexo2">Sexo</label><br />
				<input type="radio" name="sexo2" value="Hombre" <?php echo $arraySexo[2]['Hombre'];?> > Hombre
				<input type="radio" name="sexo2" value="Mujer" <?php echo $arraySexo[2]['Mujer'];?> > Mujer<br /><br />
				<?PHP echo $erroresCampos[2]['sexo']; ?>
				
				<label for="aficiones2[]">Aficiones:</label><br />	
					<input type="checkbox" name="aficiones2[]" value="Musica" <?php echo $arrayAficiones[2]['Musica'];?>>Musica <br />
					<input type="checkbox" name="aficiones2[]" value="Cine"  <?php echo $arrayAficiones[2]['Cine'];?>>Cine<br />
					<input type="checkbox" name="aficiones2[]" value="Lectura" <?php echo $arrayAficiones[2]['Lectura'];?>>Lectura<br />
					<input type="checkbox" name="aficiones2[]" value="Deporte" <?php echo $arrayAficiones[2]['Deporte'];?>>Deporte<br /><br />
				<?PHP echo $erroresCampos[2]['aficiones']; ?>
				
				
				<label for="sugerencias[2]">Sugerencias:</label><br />	
				<textarea  cols="20" rows ="10" name="sugerencias[2]" form="formulario1"><?php echo $cuestionario[2]['sugerencias'];?></textarea>
				<br />	
			<?PHP echo $erroresCampos[2]['sugerencias']; ?>
			
				<label for="foto[2]">Seleccione una foto de perfil:</label><br />
				<input type="file" id="file" name="foto2">
				<br />
	
			
			<input type="submit" name="enviar" value="Enviar">
			</div>
			
		</form>
		</div>	
			<?php
			
			}else{
				
				for($i = 0; $i < DIMENSION; $i++){
					foreach($cuestionario[$i] as $clave => $valor){
						if(is_array($valor)){
							foreach($valor as $campo){
								echo "$campo </br>";
							}
						}
						else{
							echo $clave.":".$valor."<br />";
						}
					}
					echo "<br />";
				}
				
			?>
			
			<img src="<?php echo $cuestionario[0]['foto'];?>"  width="100" height="100" />
			<img src="<?php echo $cuestionario[1]['foto'];?>" width="100" height="100" />
			<img src="<?php echo $cuestionario[2]['foto'];?>" width="100" height="100" />
			<?php }?>
</body>
</html>