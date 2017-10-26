<!DOCTYPE html>
<html>
	<head>
	
	</head>
		<title>Ejercicio 13</title>
	<body>
	<?php
        //Autor: Juan Carlos Pastor
		//Crear una función que cuente el número de visitas a la página actual desde una fecha concreta.
        //Ultima modificación: 26/10/2017
                $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
                $fecha_requisito = strtotime("20-01-2017 00:00:00"); 
                $archivo = "contador.txt";  
                $fp = fopen($archivo,"r");//Abre el archivo contador.txt.
                $contador = fgets($fp, 26); 
                fclose($fp);
                if($fecha_actual > $fecha_requisito){ 
                    ++$contador;  
                    $fp = fopen($archivo,"w+");  
                    fwrite($fp, $contador, 26);  
                    fclose($fp);                     
                } 
                 
                echo "Numero de visitas $contador veces"; 
            ?> 
	</body>

</html>
