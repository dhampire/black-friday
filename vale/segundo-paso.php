<?php
require_once('funciones.php');
//conectar('localhost', 'root', '', 'cmtajibos');
conectar ('localhost', 'www360ts_cmvale', 'c-4W3b&Vl1pC', 'www360ts_cmvale');  

$codigo = substr( md5(microtime()), 1, 8);

//Recibir
$nombre = strip_tags($_POST['nombre']);
$apellidos = strip_tags($_POST['apellidos']);
$edad = strip_tags($_POST['edad']);
$sexo = strip_tags($_POST['sexo']);
$email = strip_tags($_POST['email']);
$telefono = strip_tags($_POST['telefono']);
$pais = strip_tags($_POST['pais']);
$ciudad = strip_tags($_POST['ciudad']);
$direccion = strip_tags($_POST['direccion']);
$estado = strip_tags($_POST['estado']);


$query = @mysql_query('SELECT * FROM datos WHERE email="'.mysql_real_escape_string($email).'"');
if($existe = @mysql_fetch_object($query))
 { echo "<script>alert('Usted ya ha sido registrado, por favor revise su bandeja de entrada o en su defecto la carpeta de Spam. Gracias!');location.href ='javascript:history.back()';</script>"; }

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Los Tajibos Hotel" name="author" />
    <meta content="Vales de descuento para servicios que brinda el Hotel Los Tajibos por el día del cyber Monday" name="description" />
    <meta content="Jardin de Asia, Vale, descuento, La Terraza, Piegari, Los Tajibos, Cyber Monday" name="keywords" />
    <title>Vale de consumo -  Los Tajibos & Hotel Convention Center</title>
    <meta property="og:url"                content="http://lostajibosnews.com/vale" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="Vale de consumo - Los Tajibos - Hotel Convention Center" />
    <meta property="og:description"        content="Vales de consumo con 10% de descuento en todos restaurantes y servicios de Los Tajibos Hotel" />
    <meta property="og:image"              content="http://lostajibosnews.com/img/promo.jpg" />
	<link rel="stylesheet" href="../css/estilo.css">
	<link rel="stylesheet" href="../css/normalize.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
<body>
<?php include 'titulo.php'; ?>

<div id="contenedor">

	<div id="resultado">

		<div class="datos">
		<center><h2>Datos ingresados</h2></center>
		<p style="color:red">Por favor verifique sus datos </p>
			<ul>
				<li><strong>Nombre y Apellido:</strong> <?php echo $nombre ." $apellidos" ?></li>
				<li><strong>Edad:</strong> <?php echo $edad ;?></li>
				<li><strong>Sexo:</strong> <?php echo $sexo ;?></li>
				<li><strong>Email:</strong> <?php echo $email ;?></li>
				<li><strong>Teléfono:</strong> <?php echo $telefono ;?></li>
				<li><strong>País:</strong> <?php echo $pais ;?></li>
				<li><strong>Ciudad:</strong> <?php echo $ciudad ; ?></li>
				<li><strong>Estado: </strong><?php echo $estado ;?></li>
				<li><strong>Dirección:</strong> <?php echo $direccion ;?></li>
			</ul>
			
		</div>

		
	
			<div id="vale">

				<form action="introducir.php" method="POST">
					<input type="text" value="<?php echo $nombre ;?>" name="nombre" hidden>
					<input type="text" value="<?php echo $apellidos ;?>" name="apellidos" hidden>
					<input type="text" value="<?php echo $edad ;?>" name="edad" hidden>
					<input type="text" value="<?php echo $sexo ;?>" name="sexo" hidden>
					<input type="text" value="<?php echo $email ;?>" name="email" hidden>
					<input type="text" value="<?php echo $telefono ;?>" name="telefono" hidden>
					<input type="text" value="<?php echo $pais ;?>" name="pais" hidden>
					<input type="text" value="<?php echo $estado ;?>" name="estado" hidden>
					<input type="text" value="<?php echo $ciudad ;?>" name="ciudad" hidden>
					<input type="text" value="<?php echo $direccion ;?>" name="direccion" hidden>
					<center>

					<h2>*Este descuento es válido solo por el día de hoy 30 de noviembre del 2015 y debe ser cancelado antes de las 22:00 horas del día Martes 1ro de diciembre 2015</h2>
				    <input type="submit" value="Aquiera su Vale de Consumo" id="boton"/>
					</center>
</form>
				</form>
			</div>

			<center><h2>Formas de Pago</h2></center>
		
			<h3>Opción 1</h3>
			<p>Pago mediante Tarjeta de Credito<br />
			Para Pagar con tarjeta de crédito por favor comuníquese llamando al 3421000 con  su código de confirmación y nosotros le informaremos los simples pasos que debe  tomar.</p>			<br />
			<h3>Opción 2</h3>
			<p>
			Transferencias bancarias o depósitos: Banco Bisa. <br>
			Cta. Corriente N° 15362014 Moneda Extranjera / Cta. Corriente N° 15360011 Moneda Nacional <br><br>
			SOCIEDAD HOTELERA LOS TAJIBOS S.A.
			</p>
			
			<h3>Opción 3</h3>
			<p>Dirigirse a la recepción de: <br>
Los Tajibos Hotel & Convention Center en la Avenida San Martin, #455 en Santa Cruz, Bolivia  con su código de confirmación <span style="color=red">IMPRESO</span> y nuestro personal lo atenderá inmediatamente.</p>
				<p>Reservas: +591-3 3421000  cybermonday@lostajiboshotel.com
			</p>
	</div>
</div>
<?php 	include 'footer.php'; ?>
</body>
</html>