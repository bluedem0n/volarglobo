<?php
// Conectando, seleccionando la base de datos
$link = mysql_connect('localhost', 'root', 'root')
    or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('descuento') or die('No se pudo seleccionar la base de datos');

$sql       = 'SELECT * FROM Hoja1';
$resultado = mysql_query($sql, $link);

if(!$resultado) {
    echo "Error de BD, no se pudo consultar la base de datos";
    echo "Error MySQL: " . mysql_error();
    exit;
}

//Actualizar IDs Provincias
$idPronvicia=1;

while ($fila = mysql_fetch_assoc($resultado)) {
    
    
//    echo "INSERT INTO `ciudad` (`id`, `empresa_id`, `provincia_id`, `codigo`, `nombre`, `status`, `observacion`, `user_id`, `user_name`, `created_at`, `updated_at`) "
//    . "VALUES(".$fila['IDPROVINCIA'].", 1, 1, 'ID-".$fila['IDPROVINCIA']."', '".$fila['PROVINCIA']."', 1, '', 1, 'Salazar Jesus', '2017-01-25 22:16:09', '2017-01-25 22:16:09');";
/*    
    echo $sql = "UPDATE Hoja1 SET "
                            . "PROVINCIA = '".ucwords(strtolower($fila['PROVINCIA']))."',"
                            . "DISTRITO = '".ucwords(strtolower($fila['DISTRITO']))."',"
                            . "CORREGIMIENTO = '".ucwords(strtolower($fila['CORREGIMIENTO']))."' "
                            . "  WHERE IDCORREGIMIENTO = '".$fila['IDCORREGIMIENTO']."'";
    
 * echo "<br>";
 */
    //echo $sql = "UPDATE Hoja1 SET IDPROVINCIA='".$idPronvicia."' WHERE PROVINCIA='".$fila['PROVINCIA']."'"; 
    
    //echo $sql = "UPDATE Hoja1 SET IDDISTRITO='".$idPronvicia."' WHERE DISTRITO='".$fila['DISTRITO']."'"; 
    
    
//echo "INSERT INTO `municipio` (`id`, `empresa_id`, `ciudad_id`, `codigo`, `nombre`, `status`, `observacion`, `user_id`, `user_name`, `created_at`, `updated_at`) "
 //   . "VALUES(".$fila['IDDISTRITO'].", 1, ".$fila['IDPROVINCIA'].", 'DIS-".$fila['IDDISTRITO']."', '".$fila['DISTRITO']."', 1, '', 1, 'Salazar Jesus', '2017-01-25 22:24:51', '2017-01-25 22:24:51');";
   
echo "INSERT INTO `parroquia` (`id`, `empresa_id`, `provincia_id`, `ciudad_id`, `municipio_id`, `municipio_nombre`, `codigo`, `nombre`, `cp`, `cant_proveedor`, `status`, `observacion`, `user_id`, `user_name`, `created_at`, `updated_at`) "
    . "VALUES(".$fila['IDCORREGIMIENTO'].", 1, 1, ".$fila['IDPROVINCIA'].", ".$fila['IDDISTRITO'].", '".$fila['DISTRITO']."', 'CORR-".$fila['IDCORREGIMIENTO']."', 'CORR-".$fila['CORREGIMIENTO']."', '1', 0, 1, '', 1, 'Salazar Jesus', '2017-01-25 22:27:41', '2017-01-25 22:27:41');";    
    
    
    echo "<br>";
    //mysql_query($sql, $link);
    
    $idPronvicia++;
    
}

mysql_free_result($resultado);

?>