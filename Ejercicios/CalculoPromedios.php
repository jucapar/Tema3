<?php
   
   $encuesta = array();
   
   $encuesta[0] = array(
        'fecha' => '',
	   'temperatura' => '',
	   'presionAtmosferica' => ''
   );
   
  $contador = 0;
        //print_r($_POST);
        if(isset($_POST['CalcularPromedios'])){
       $fp = fopen("datos.txt","r");
         while(!feof($fp)) {
            $linea = fgets($fp);
            if(!empty($linea)){
                $arrayTemp = explode("+",$linea);
                $encuesta[$contador]['fecha'] = $arrayTemp[0];
                $encuesta[$contador]['temperatura'] = $arrayTemp[1];
                $encuesta[$contador]['presionAtmosferica'] = $arrayTemp[2];
                $contador++;
            } 
         }
         fclose($fp);
         
         echo("Fecha Temperatura Presion Atmosferica<br />");
         for($i = 0; $i <count($encuesta);$i++){
            echo $encuesta[$i]['fecha']." ".$encuesta[$i]['temperatura']." ".$encuesta[$i]['presionAtmosferica']."<br />"; 
         }
          echo("Temperatura<br />");
          echo "Maximo:".max(array_column($encuesta,'temperatura'))." Minimo:".min(array_column($encuesta,'temperatura'))." Promedio:".array_sum(array_column($encuesta,'temperatura'))/count($encuesta)."<br />";
          echo("Presion Atmosferica<br />");                                                                                                                                       
          echo "Maximo:".max(array_column($encuesta,'presionAtmosferica'))." Minimo:".min(array_column($encuesta,'presionAtmosferica'))." Promedio:".array_sum(array_column($encuesta,'presionAtmosferica'))/count($encuesta)."<br />";
         }
?>