<?php
	
		/*
			Juan Carlos Pastor Regueras
			Construir un formulario para recoger un cuestionario realizado a una persona y enviarlo a una página tratamiento.php para que muestre las preguntas y las respuestas recogidas. 
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
	else{
		echo ("No has pulsado Enviar");
	}
	
	
?>