<?php
/* Base de datos mysql, valores por defecto */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'dentos');
 
/* prueba de conneccion*/
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// verificando la coneccion
if($link === false){
    die("ERROR: No se puede Conectar " . mysqli_connect_error());
}
?>