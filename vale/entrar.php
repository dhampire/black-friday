<?php
require_once('funciones.php');
//conectar('localhost', 'root', '', 'cmtajibos');
conectar ('localhost', 'LosTajibos', '-XK3^DngQABK', 'it4jibos');

$codigo = substr( md5(microtime()), 1, 8);


//Recibir
$nombre = strip_tags($_POST['nombre']);
$apellidos = strip_tags($_POST['apellidos']);
$edad = strip_tags($_POST['edad']);
$sexo = strip_tags($_POST['sexo']);
$email = strip_tags($_POST['email']);
$telefono = strip_tags($_POST['telefono']);
$pais = strip_tags($_POST['pais']);
$pais = strip_tags($_POST['estado']);
$ciudad = strip_tags($_POST['ciudad']);
$direccion = strip_tags($_POST['direccion']);

foreach($_POST['interest2'] as $color)

echo $color;
echo $nombre ;

?>  


