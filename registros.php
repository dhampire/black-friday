
<?php
require_once('funciones.php');
//conectar('localhost', 'root', '', 'cmtajibos');
conectar ('localhost', 'www360ts_tajibos', 'IHJu{kIe2PO0', 'www360ts_tajibos');
mysql_query ("SET NAMES 'utf8'");

	$query= "SELECT * from datos";
	$resultado = mysql_query($query);
	$suma = mysql_num_rows($resultado);

$registros = 50; 

@$pagina = $_GET ['pagina']; 

if (!isset($pagina)) 
{ 
$pagina = 1; 
$inicio = 0; 
} 
else 
{ 
$inicio = ($pagina-1) * $registros; 
} 

//realizamos la busqueda en la base de datos 
$pegar = "SELECT * FROM datos ORDER BY id ASC LIMIT ".$inicio." , ".$registros." "; 
$cad = mysql_query($pegar) or die ( 'error al listar, $pegar' .mysql_errno()); 

//calculamos las paginas a mostrar 

$contar = "SELECT * FROM datos"; 
$contarok = mysql_query($contar); 
$total_registros = mysql_num_rows($contarok); 
//$total_paginas = ($total_registros / $registros); 
$total_paginas = ceil($total_registros / $registros); 


?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Registro de usuarios</title>
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

	<div id="contenedor">
		<div id="cabeza">
		<center>	<img src="img/cabecera.png" alt=""></center>
		</div>
		
		<section id="medio-a">

		<center><h2>Total de registros <span style="color:red"><?php echo $suma?></span></h2>	</center>
			<?
			echo '<table width="100%" border="1">
  <tr>
    <td><strong>Nombre y Apellidos</strong></td>
    <td><strong>Email</strong></td>
    <td><strong>Telefono</strong></td>
    <td><strong>Edad</strong></td>
    <td><strong>codigo</strong></td>
    <td><strong>País</strong></td>
    <td><strong>Ciudad</strong></td>
    <td><strong>Cyber Mami</strong></td>
    <td><strong>Vale Viva</strong></td>
    <td><strong>Vale Consumo</strong></td>
  </tr>';


		 while ($columna= mysql_fetch_array($cad)) {
		    
		    $email = $columna['email'];
			    $querys = "SELECT * FROM preguntas WHERE email LIKE $email";
				$resultados = mysql_query($querys);

				echo '<td>' .$columna['nombre']. "&nbsp;" .$columna['apellidos'].   '</td>';
				echo '<td>' .$columna['email']. '</td>';
				echo '<td>' .$columna['telefono']. '</td>';
		        echo '<td>' .$columna['edad']. '</td>';
		        echo '<td>' .$columna['codigo']. '</td>';
		        echo '<td>' .$columna['pais']. '</td>';
				echo '<td>' .$columna['ciudad']. '</td>';
		        echo '<td>' .$columna['valepromo']. '</td>';
		        echo '<td>' .$columna['valeviva']. '</td>';
		        echo '<td>' .$columna['valeconsumo']. '</td>';
				echo '</tr>' ;
		 }

			echo '</table>';

echo "<center><p>"; 

if($total_registros>$registros){ 
if(($pagina - 1) > 0) { 
echo "<span class='pactiva'><a href='?pagina=".($pagina-1)."'>&laquo; Anterior</a></span> "; 
} 
// Numero de paginas a mostrar 
$num_paginas=4; 
//limitando las paginas mostradas 
$pagina_intervalo=ceil($num_paginas/2)-1; 

// Calculamos desde que numero de pagina se mostrara 
$pagina_desde=$pagina-$pagina_intervalo; 
$pagina_hasta=$pagina+$pagina_intervalo; 

// Verificar que pagina_desde sea negativo 
if($pagina_desde<1){ // le sumamos la cantidad sobrante para mantener el numero de enlaces mostrados $pagina_hasta-=($pagina_desde-1); $pagina_desde=1; } // Verificar que pagina_hasta no sea mayor que paginas_totales if($pagina_hasta>$total_paginas){ 
$pagina_desde-=($pagina_hasta-$total_paginas); 
$pagina_hasta=$total_paginas; 
if($pagina_desde<1){ 
$pagina_desde=1; 
} 
} 

for ($i=$pagina_desde; $i<=$pagina_hasta; $i++){ 
if ($pagina == $i){ 
echo "<span class='pnumero'>".$pagina."</span> "; 
}else{ 
echo "<span class='pactiva'><a href='?pagina=$i'>$i</a></span> "; 
} 
} 

if(($pagina + 1)<=$total_paginas) { 
echo " <span class='pactiva'><a href='?pagina=".($pagina+1)."'>Siguiente &raquo;</a></span>"; 
} 
} 

echo "</p></center></div>"; 

	?>
		</section>
	</div>
</body>
</html>



