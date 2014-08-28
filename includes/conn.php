<?php
// datos de conexión
$host = "localhost"; 
$usuario = "gaston"; 
$clave = "31464028";
//conectamos a la base 
$connect=mysql_connect ($host, $usuario, $clave);
//seleccionamos la base
$db_selected = mysql_select_db('landingdeposito', $connect); 

?>