<?php
ini_set("display_errors",1);
require_once("db_i.php");
dbconnect();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<?php
$tiempo_inicio = microtime_float();
function microtime_float()
{
list($useg, $seg) = explode(" ", microtime());
return ((float)$useg + (float)$seg);
}

function listar_directorios_ruta($ruta){ 
   // abrir un directorio y listarlo recursivo 
   global $fp;
   if (is_dir($ruta)) { 
      if ($dh = opendir($ruta)) { 
         while (($file = readdir($dh)) !== false) { 
            //esta línea la utilizaríamos si queremos listar todo lo que hay en el directorio 
            //mostraría tanto archivos como directorios 
            if ($file!="." && $file!=".."){
				if (filetype($ruta . $file)=="file"){
					
					//echo "<br>Nombre de archivo: $ruta $file : Es un: " . filetype($ruta . $file)."<br>"; 
					$folio=substr($file,14,10);
					$fecha=substr($file,25,10);
					$tipo=substr($file,11,2);
					$rut=substr($file,0,10);;
					$nombre_r="";
					$archivo=$ruta.$file;
					$rol=str_replace(".txt","",$file);
					$ext=explode("/",$archivo);
					$numd=count($ext)-1;
					echo $archivo."<br>\n";
					//descomprimir($archivo,$archivo2);
					
					//echo "NUMERO ".$numd."_____________<br>";
					
					//if ($numd==2){
					//echo $rut."--".$fecha."--".$folio."--".$tipo."  $archivo<br>";
					//echo "FOLIO ".$folio."<br>";
					//echo "Fecha ".$fecha."<br>";
					//echo "tipo ".$tipo."<br>";
					$tam=filesize($archivo);
					$filex=str_replace("","",$file);
					$filex=str_replace(".html","",$filex);
					$sql= "insert into pagina(archivo,scan) values ('$filex','')";
					dbquery3($sql);
					//echo $sql."<br>";
					//}
					//fwrite($fp, $sql. PHP_EOL);
            	}
			}
			if (is_dir($ruta . $file) && $file!="." && $file!=".."){ 
               //solo si el archivo es un directorio, distinto que "." y ".." 
               //echo "<br>Directorio: $ruta$file"; 
               listar_directorios_ruta($ruta . $file . "/"); 
            }else{
				//echo "ARCHVIO".$file."<br>";
			} 
         } 
      closedir($dh); 
      } 
   }else 
      echo "<br>No es ruta valida"; 
} 
function descomprimir($origen, $destino) {
  $string = implode("", gzfile($origen));
  $fp = fopen($destino, "w");
  fwrite($fp, $string, strlen($string));
  fclose($fp);
}
//descomprimir("urly/1/3541.txt", "urlb/1/3541.html");
$i=128;
while($i<166){
	//mkdir("urld/".$i,0777,true);
	$i++;
}

listar_directorios_ruta("salida/"); 
//fclose($fp);
$tiempo_fin = microtime_float();
$tiempo = $tiempo_fin - $tiempo_inicio;
	echo "Tiempo empleado: " . ($tiempo_fin - $tiempo_inicio);
echo "<br><br><br>";

?>
</body>
</html>
