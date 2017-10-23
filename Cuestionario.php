<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="css/estilosCuestionario.css">
  <title>Cuestionario</title>
</head>
<body>


<?php
		
		require "LibreriaValidacionFormularios.php";
		
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
			
			$erroresEstilos[$i] = array(
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
	
		$arrayErrores = array(" ", "<strong>No ha introducido ningun valor</strong><br />", "<strong>El valor introducido no es valido</strong><br />","<strong>Tamaño minimo no valido</strong><br />", "<strong>Tamaño maximo no valido</strong><br />");
		
		if (filter_has_var(INPUT_POST,'enviar')){
			for ($i = 0;$i<DIMENSION;$i++){
				$valida = validarDNI($_POST['dni'][$i]);
				if($valida != 0) {
					$erroresCampos[$i]['dni'] = $arrayErrores[$valida];
					$erroresEstilos[$i]['dni'] = "error";
					$error = true;
				}
				else {
					$cuestionario[$i]['dni'] = $_POST['dni'][$i];
				}
				
				$valida = validarCadenaAlfabetica($_POST['nombre'][$i]);
				if($valida != 0) {
					$erroresCampos[$i]['nombre'] = $arrayErrores[$valida];
					$erroresEstilos[$i]['nombre'] = "error";
					$error = true;
				}
				else {
					$cuestionario[$i]['nombre'] = $_POST['nombre'][$i];
				}
						
				
				$valida =  validarCadenaAlfabetica($_POST['apellido'][$i]);
				if($valida != 0) {
					$erroresCampos[$i]['apellido'] = $arrayErrores[$valida];
					$erroresEstilos[$i]['apellido'] = "error";
					$error = true;
				}
				else {
					$cuestionario[$i]['apellido'] = $_POST['apellido'][$i];
				}
				
				
				$valida =  validarEmail($_POST['email'][$i]);
				if($valida != 0) {
					$erroresCampos[$i]['email'] = $arrayErrores[$valida];
					$erroresEstilos[$i]['email'] = "error";
					$error = true;
				}
				else {
					$cuestionario[$i]['email'] = $_POST['email'][$i];
				}
				
				$valida =  validarEntero($_POST['altura'][$i],MINALTURA,MAXALTURA);
				if($valida != 0) {
					$erroresCampos[$i]['altura'] = $arrayErrores[$valida];
					$erroresEstilos[$i]['altura'] = "error";
					$error = true;
				}
				else {
					$cuestionario[$i]['altura'] = $_POST['altura'][$i];
				}
				
				$valida =  validarReal($_POST['peso'][$i],MINPESO,MAXPESO);
				if($valida != 0) {
					$erroresCampos[$i]['peso'] = $arrayErrores[$valida];
					$erroresEstilos[$i]['peso'] = "error";
					$error = true;
				}
				else {
					$cuestionario[$i]['peso'] = $_POST['peso'][$i];
				}
				
				
				if(empty($_POST['fechanac'][$i])) {
					$erroresCampos[$i]['fechanac'] = $arrayErrores[1];
					$erroresEstilos[$i]['fechanac'] = "error";
					$error = true;
				}
				else {
					$cuestionario[$i]['fechanac'] = $_POST['fechanac'][$i];
					
				}
				
				$valida =  validarURL($_POST['url'][$i]);
				if($valida != 0) {
					$erroresCampos[$i]['url'] = $arrayErrores[$valida];
					$erroresEstilos[$i]['url'] = "error";
					$error = true;
				}
				else {
					$cuestionario[$i]['url'] = $_POST['url'][$i];
	
				}
				
				$valida =  validarTelefono($_POST['telefono'][$i]);
				if($valida != 0) {
					$erroresCampos[$i]['telefono'] = $arrayErrores[$valida];
					$erroresEstilos[$i]['telefono'] = "error";
					$error = true;
				}
				else {
					$cuestionario[$i]['telefono'] = $_POST['telefono'][$i];
	
				}
			
				$valida =  validarCadenaAlfanumerica($_POST['sugerencias'][$i]);
				if($valida != 0) {
					$erroresCampos[$i]['sugerencias'] = $arrayErrores[$valida];
					$erroresEstilos[$i]['sugerencias'] = "error";
					$error = true;
				}
				else {
					$cuestionario[$i]['sugerencias'] = $_POST['sugerencias'][$i];
				}
				
				if(!isset($_POST['sexo'.$i])) {
					$erroresCampos[$i]['sexo'] = $arrayErrores[1];
					$erroresEstilos[$i]['sexo'] = "error";
					$error = true;
				}
				else {
					$cuestionario[$i]['sexo'] = $_POST['sexo'.$i];
					$arraySexo[$i][$cuestionario[$i]['sexo']] = 'checked';
				}
				
				if(!isset($_POST['aficiones'.$i])) {
					$erroresCampos[$i]['aficiones'] = $arrayErrores[1];
					$erroresEstilos[$i]['aficiones'] = "error";
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
						$erroresEstilos[$i]['foto'] = "error";
						$error = true;
						$cuestionario[$i]['foto'] = '';
				}
			}		
		}
		if(!filter_has_var(INPUT_POST,'enviar')|| $error ){
			
			?>
			<div id="container">
			<form enctype="multipart/form-data" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" id="formulario1" method="post">
			<?php 
			
			for($i = 0; $i < DIMENSION;$i++){
				
			?>
			<div id="<?php echo "persona".$i ;?>">
				<label for="<?php echo "dni[$i]";?>">DNI:</label><br />
				<input type="text" name="<?php echo "dni[$i]";?>" value="<?PHP echo $cuestionario[$i]['dni'];?>" class="<?PHP echo $erroresEstilos[$i]['dni'];?>"><br /><br />
				<?PHP echo $erroresCampos[$i]['dni']; ?>
				
				<label for="<?php echo "nombre[$i]"?>">Nombre:</label><br />
				<input type="text" name="<?php echo "nombre[$i]";?>" value="<?PHP echo $cuestionario[$i]['nombre']; ?>" class="<?PHP echo $erroresEstilos[$i]['nombre'];?>"><br /><br />
				<?PHP echo $erroresCampos[$i]['nombre']; ?>
			
				<label for="<?php echo "apellido[$i]";?>">Apellido:</label><br />
				<input type="text" name="<?php echo "apellido[$i]";?>" value="<?PHP echo $cuestionario[$i]['apellido']; ?>" class="<?PHP echo $erroresEstilos[$i]['apellido'];?>"><br /><br />
				<?PHP echo $erroresCampos[$i]['apellido']; ?>
				
				<label for="<?php echo "email[$i]";?>">Email:</label><br />
				<input type="text" name="<?php echo "email[$i]"?>" value="<?PHP echo $cuestionario[$i]['email']; ?>" class="<?PHP echo $erroresEstilos[$i]['email'];?>"><br /><br />
				<?PHP echo $erroresCampos[$i]['email']; ?>
				
				
				<label for="<?php echo "altura[$i]";?>">Altura (en cm):</label><br />
				<input type="text" name="<?php echo "altura[$i]";?>" value="<?PHP echo $cuestionario[$i]['altura']; ?>" class="<?PHP echo $erroresEstilos[$i]['altura'];?>"><br /><br />
				<?PHP echo $erroresCampos[$i]['altura']; ?>
				
				
				<label for="<?php echo "peso[$i]";?>">Peso:</label><br />
				<input type="text" name="<?php echo "peso[$i]";?>" value="<?PHP echo $cuestionario[$i]['peso']; ?>" class="<?PHP echo $erroresEstilos[$i]['peso'];?>"><br /><br />
				<?PHP echo $erroresCampos[$i]['peso']; ?>
				
				
				<label for="<?php echo "fechanac[$i]";?>">Fecha de nacimiento:</label><br />
				<input type="date" name="<?php echo "fechanac[$i]";?>" value="<?PHP echo $cuestionario[$i]['fechanac']; ?>" class="<?PHP echo $erroresEstilos[$i]['fechanac'];?>"><br /><br />
				<?PHP echo $erroresCampos[$i]['fechanac']; ?>
				
				<label for="<?php echo "url[$i]";?>">URL:</label><br />
				<input type="text" name="<?php echo "url[$i]";?>" value="<?PHP echo $cuestionario[$i]['url']; ?>" class="<?PHP echo $erroresEstilos[$i]['url'];?>"><br /><br />
				<?PHP echo $erroresCampos[$i]['url']; ?>
				
				<label for="<?php echo "telefono[$i]";?>">Telefono:</label><br />
				<input type="text" name="<?php echo "telefono[$i]";?>" value="<?PHP echo $cuestionario[$i]['telefono']; ?>" class="<?PHP echo $erroresEstilos[$i]['telefono'];?>"><br /><br />
				<?PHP echo $erroresCampos[$i]['telefono']; ?>
				
				<label for="<?php echo "sexo".$i;?>">Sexo</label><br />
				<input type="radio" name="<?php echo "sexo".$i;?>" value="Hombre" <?php echo $arraySexo[0]['Hombre'];?> class="<?PHP echo $erroresEstilos[$i]['sexo'];?>"> Hombre
				<input type="radio" name="<?php echo "sexo".$i;?>" value="Mujer" <?php echo $arraySexo[0]['Mujer'];?> class="<?PHP echo $erroresEstilos[$i]['sexo'];?>"> Mujer<br /><br />
				<?PHP echo $erroresCampos[0]['sexo']; ?>
				
				<label for="<?php echo "aficiones".$i."[]";?>">Aficiones:</label><br />	
					<input type="checkbox" name="<?php echo "aficiones".$i."[]";?>" value="Musica" <?php echo $arrayAficiones[$i]['Musica'];?> class="<?PHP echo $erroresEstilos[$i]['aficiones'];?>">Musica <br />
					<input type="checkbox" name="<?php echo "aficiones".$i."[]";?>" value="Cine"  <?php echo $arrayAficiones[$i]['Cine'];?> class="<?PHP echo $erroresEstilos[$i]['aficiones'];?>">Cine<br />
					<input type="checkbox" name="<?php echo "aficiones".$i."[]";?>" value="Lectura" <?php echo $arrayAficiones[$i]['Lectura'];?> class="<?PHP echo $erroresEstilos[$i]['aficiones'];?>">Lectura<br />
					<input type="checkbox" name="<?php echo "aficiones".$i."[]";?>" value="Deporte" <?php echo $arrayAficiones[$i]['Deporte'];?> class="<?PHP echo $erroresEstilos[$i]['aficiones'];?>">Deporte<br /><br />
				<?PHP echo $erroresCampos[$i]['aficiones']; ?>
				
				<label for="<?php echo "sugerencias[$i]";?>">Sugerencias:</label><br />	
				<textarea  cols="20" rows ="10" name="<?php echo "sugerencias[$i]";?>" form="formulario1"  class="<?PHP echo $erroresEstilos[$i]['sugerencias'];?>"><?php echo $cuestionario[$i]['sugerencias'];?></textarea>
				<br />	
				<?PHP echo $erroresCampos[$i]['sugerencias']; ?>
				<label for="<?php echo "foto".$i;?>">Seleccione una foto de perfil:</label><br />
				<input type="file" id="file" name="<?php echo "foto".$i;?>" class="<?PHP echo $erroresEstilos[$i]['foto'];?>">
				<br /><br /><br />
				<?PHP echo $erroresCampos[$i]['foto']; ?>
				
			
			</div>
			
			<?php }?>
	
		
			<input type="submit" name="enviar" value="Enviar">
			
			
			</form>
		</div>	
			<?php
			
			}else{
				
				for($i = 0; $i < DIMENSION; $i++){
					foreach($cuestionario[$i] as $clave => $valor){
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
					echo "<br />";
				}
				
			?>
			
			<img src="<?php echo $cuestionario[0]['foto'];?>"  width="100" height="100" />
			<img src="<?php echo $cuestionario[1]['foto'];?>" width="100" height="100" />
			<img src="<?php echo $cuestionario[2]['foto'];?>" width="100" height="100" />
			<?php
				echo "<br /><br /><br />";
				
				echo "El persona de mas edad nació el ".max(array_column($cuestionario,'fechanac'));
				echo "<br />";
				echo "El peso minimo de los encuestados es: ".min(array_column($cuestionario,'peso'));
				echo "<br />";
				echo "La altura media de los encuestados es: ".array_sum(array_column($cuestionario,'altura'))/DIMENSION;
				
			?>	
			<?php }?>
</body>
</html>

