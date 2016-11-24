<?php
require_once('funciones.php');
//conectar('localhost', 'root', '', 'cmtajibos');
conectar ('localhost', 'www360ts_tajibos', 'IHJu{kIe2PO0)', 'www360ts_tajibos');

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



if (isset($_POST['promo'])) {
	$valepromo = "- Promo Cyber Mami";
}
else { $valepromo = ""; 
}
if (isset($_POST['vale1'])) {
	$valeviva = "- Incluye vale para VIVA SPA";
} else {
	$valeviva = "";
}
if (isset($_POST['vale2'])) {
	$valeconsumo = "- Incluye Vale de consumo en Jardin de Asia, Piegari y La Terraza";
} else {
	$valeconsumo = "";
}


if ($valepromo and $valeviva and $valeconsumo == "") {
	echo "<script>alert('Usted debe seleccionar al menos una opcion para acceder a nuestros Descuentos.
	 Gracias!');location.href ='javascript:history.back()';</script>";
}



$query = @mysql_query('SELECT * FROM datos WHERE email="'.mysql_real_escape_string($email).'"');
if($existe = @mysql_fetch_object($query))
{ echo "<script>alert('Usted ya ha sido registrado, por favor revise su bandeja de entrada o en su defecto la carpeta de Spam. Gracias!');location.href ='javascript:history.back()';</script>"; }

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <META http-equiv="refresh" content="0;URL=http://www.indiana.edu/~account/new-directory">
    <meta content="Plan de descuento Cyber Mami de los Tajibos Hotel" name="description" />
    <meta content="Hotal, Santa Cruz, Bolivia, Cyber Mami, Los Tajibos, Descuentos, Jardin de Asia, descuento, La Terraza, Piegari," name="keywords" />
    <title>Plan Cyber Mami -  Los Tajibos & Hotel Convention Center</title>
    <meta property="og:url"                content="http://lostajibosnews.com" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="Plan Cyber Mami - Los Tajibos & Hotel Convention Center" />
    <meta property="og:description"        content="Precio increíble en 99USD. Un fin de semana 5 estrellas en el Los Tajibos Hotel & Convention Center" />
    <meta property="og:image"              content="http://lostajibosnews.com/img/promo.jpg" />
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
<body>
<?php include 'titulo.php'; ?>

<div id="contenedor">

	<div id="resultado">

		<div class="datos">
		<center><h2>Datos ingresados</h2></center>
		<p>Por favor verifique sus datos</p>
			<ul>
				<li><strong>Nombre y Apellido:</strong> <?php echo $nombre ." $apellidos" ?></li>
				<li><strong>Edad:</strong> <?php echo $edad ;?></li>
				<li><strong>Sexo:</strong> <?php echo $sexo ;?></li>
				<li><strong>Email:</strong> <?php echo $email ;?></li>
				<li><strong>Teléfono:</strong> <?php echo $telefono ;?></li>
				<li><strong>País:</strong> <?php echo $pais ;?></li>
				<li><strong>Ciudad:</strong> <?php echo $ciudad ; ?></li>
				<center>Los planes que usted a aquirido son:</center>
				<li><?php echo $valepromo; ?></li>
				<li><?php echo $valeviva; ?></li>
				<li><?php echo $valeconsumo ?></li>

			</ul>
			<div class="volver"><a onclick="history.go(-1);"">Volver al formulario</a></div>

		</div>

		
	
			<div id="vale">
			<p>Una vez usted reciba su correo, usted podrá adicionar la cantidad de paquetes del Viva Spa, Noches y vales de consumo que usted desee.</p>
			<p>Noches a US99 sujetos a disponibilidad, pueden ser utilizadas cualquier fin de semana hasta el 20 de Diciembre 2016, no puede ser utilizado en combinación con otra oferta ó descuento. No está disponible durante las semanas del 15 de septiembre hasta el 30 de septiembre</p>
				<form action="introducir.php" method="POST">
					<input type="text" value="<?php echo $nombre ;?>" name="nombre" hidden>
					<input type="text" value="<?php echo $apellidos ;?>" name="apellidos" hidden>
					<input type="text" value="<?php echo $edad ;?>" name="edad" hidden>
					<input type="text" value="<?php echo $sexo ;?>" name="sexo" hidden>
					<input type="text" value="<?php echo $email ;?>" name="email" hidden>
					<input type="text" value="<?php echo $telefono ;?>" name="telefono" hidden>
					<input type="text" value="<?php echo $pais ;?>" name="pais" hidden>
					<input type="text" value="<?php echo $ciudad ;?>" name="ciudad" hidden>
					<input type="text" value="<?php echo $valepromo ;?>" name="valepromo" hidden>
					<input type="text" value="<?php echo $valeviva ;?>" name="valeviva" hidden>
					<input type="text" value="<?php echo $valeconsumo ;?>" name="valeconsumo" hidden>
					<center>
					<h2>*Este descuento estará disponible el 23, 24, y 25 del mes de Mayo 2016 y debe ser cancelado antes de las 22:00 horas del miércoles 25 de mayo 2016</h2>
				    <input type="submit" value="Adquiera su Plan Cyber Mami" id="boton"/>
					</center>
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