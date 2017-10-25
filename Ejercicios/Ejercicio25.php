<!DOCTYPE html>
<html>
<head>
    <META http-equiv=Content-Type content="text/html; charset=UTF-8">
    <link rel="icon" type="image/ico"  href="imagenes/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../css/ejercicios1-30.css">
</head>
<body>
<?php
//Autor: Sergio Marqués Martín
//Ultima modificación: 23/10/2017
require 'LibreriaMarques.php';// Instrucción para importar la libreria de funciones.
$entradaOK=true;//Variable que controla si hay errores en el formulario. Si esta en 'true' la entrada es correcta.
$aErrores;// Array para guardar mensajes y errores:
$aEncuesta = array();//Array que contiene las respuestas de la encuesta.
//Inicialización del array que contiene las respuestas de la encuesta y los errores.

	$aEncuesta = array();
    $aEncuesta[0] = array(
	'fecha' => '',
	   'temperatura' => '',
	   'presionAtmosferica' => ''
    );
    $aErrores = array(
       'fecha' => '',
	   'temperatura' => '',
	   'presionAtmosferica' => ''
    );

	

// Condición para ver si se ha pulsado el botón de enviar.
if(isset($_POST['AnadirRegistro'])) {


        // Usamos las funciones de validación y guardamos el resultado en el array $aErrores
        // si hay algun campo erroneo entonces asigna al error null.

    
        $aErrores['fecha']=validarFecha($_POST['fecha'],1);
	$aErrores['temperatura']=comprobarEntero($_POST['temperatura'],1);
        $aErrores['presionAtmosferica']=comprobarEntero($_POST['temperatura'],1);
		
		

    //Bucle que recorre el array de errores para comprobar si hay alguno que tiene el valor null.
    //Si encuentra un error en null entonces cambia el valor de $entradaOK a false.
    foreach($aErrores as $valor){
            if($valor!=null){
                $entradaOK=false;
            }
        }

}
//Condición que controla que nunca se haya pulsado el boton enviar y la entrada no este en true.
if(!filter_has_var(INPUT_POST,'AnadirRegistro') ||  $entradaOK==false ){
	
?>
<!--    Estructura del formulario.-->
<form name="input" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
					
            <div id="">
               

                <!--        Tipo fecha -->
                Fecha:<br>
                <input type="date" name="fecha" <?php if(isset($_POST['fecha']) && empty($mensajeError['fecha'])){ echo 'value="',$_POST['fecha'],'"';}?>/>
                <span class="error"><?php echo $aErrores["fecha"];?></span><hr>

                   <!--        Tipo numerico flotante-->
               Temperatura:<br>
                <input type="number" name="temperatura" step="0.1" min="-30" max="50"<?php if(isset($_POST['temperatura']) && empty($mensajeError['temperatura'])){ echo 'value="',$_POST['temperatura'],'"';}?> />
                <span class="error"><?php echo $aErrores["temperatura"];?></span><hr>

                <!--        Tipo numerico entero-->
                Presion Atmosferica:<br>
                <input type="number" name="presionAtmosferica" min="950" max="1050"<?php if(isset($_POST['presionAtmosferica']) && empty($mensajeError['presionAtmosferica'])){ echo 'value="',$_POST['presionAtmosferica'],'"';}?> />
                <span class="error"><?php echo $aErrores["presionAtmosferica"];?></span><hr>

          


        <!--      Botones para enviar el formulario y para limpiar los campos-->
		<input id="enviar" type="submit" value="Añadir Registro" name="AnadirRegistro"/>

    </form>
	<form action="CalculoPromedios.php" method="post">
		<input id="enviar" type="submit" value="Calcular Promedios" name="CalcularPromedios"/>
	</form>
    <!--        Fin de la estructura del formulario.-->
    <?php
    //Y en caso de que no haya error y se haya pulsado el botón de enviar se muestra la información del formulario.	
	}
	else{
	
		
			$fp = fopen("datos.txt","a+");
			fwrite($fp,$_POST['fecha']. "+" . $_POST['temperatura']. "+" .$_POST['presionAtmosferica']."\n");
			fclose($fp);
			header("Location: " . $_SERVER['PHP_SELF']);	
		
			
		
	}
    ?>
</body>
</html>
