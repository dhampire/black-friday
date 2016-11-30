<?php 
$name = strip_tags($_POST['nombre']);
$mail = strip_tags($_POST['mail']);
$phone = strip_tags($_POST['telefono']);
$country = strip_tags($_POST['pais']);
$city = strip_tags($_POST['Ciudad']);
$direction = strip_tags($_POST['direccion']);
?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'meta.php';?>
</head>
<body>
	<main class="container">
		<section class="row">
			<div class="col-xs-12 promocion__fondo">
				
				<div class="datos col-md-6 col-md-offset-3 col-xs-12 confirmar">
	                <div class="col-xs-12">
	                	<center><h2>Confirme sus datos ingresados</h2>
	                	<p>Por favor verifique antes de continuar</p></center>
	                	<ul>
	                		<li class="list-group-item"><span class="fa fa-check color"></span> <?php echo $name; ?></li>
	                		<li class="list-group-item"><span class="fa fa-check color"></span> <?php echo $mail;?></li>
	                		<li class="list-group-item"><span class="fa fa-check color"></span> <?php echo $phone; ?></li>
	                		<li class="list-group-item"><span class="fa fa-check color"></span> <?php echo $country; ?></li>
	                		<li class="list-group-item"><span class="fa fa-check color"></span> <?php echo $city; ?></li>
	                		<li class="list-group-item"><span class="fa fa-check color"></span> <?php echo $direction;?></li>
	                	</ul>
	                	<center><a onclick="history.go(-1);"">Volver al formulario</a></center>

	                	<small class="col-xs-12 condiciones">
			                *Fecha de venta: Lunes 28 de Noviembre <br>
			                *Horario: 8:00 a 22:00<br>
			                *Promoción no reembolsable <br>
			                *Cupos limitados por día <br>
			                *La reserva no es reembolsable
				        </small>
							<form action="introducir.php" method="POST">
								<input type="text" value="<?php echo $name ;?>" name="name" hidden>
								<input type="text" value="<?php echo $mail ;?>" name="mail" hidden>
								<input type="text" value="<?php echo $phone ;?>" name="phone" hidden>
								<input type="text" value="<?php echo $country ;?>" name="country" hidden>
								<input type="text" value="<?php echo $city ;?>" name="city" hidden>
								<input type="text" value="<?php echo $direction ;?>" name="direction" hidden>
								<center>
								<input type="submit" class="btn btn-success" value="Adquiera su Plan ¡Ahora!"/>
								</center>
							</form>
	                </div>
	            </div>
	        </div>

			</div>
		</div>
		</section>

		<section class="row">
				        <div class="col-xs-8 col-xs-offset-2">
		        <center><h2 class="titles">Forma de Pago</h2></center>
			
				<p>Dirigirse a la recepción de: <br>
					Los Tajibos Hotel & Convention Center en la Avenida San Martin, #455 en Santa Cruz, Bolivia  con su código de confirmación <span style="color=red">IMPRESO</span> y nuestro personal lo atenderá inmediatamente.</p>
					<p>Reservas: +591-3 3421000  blackfriday@lostajiboshotel.com</p>
			</div>

		</section>
	</main>
<?php 	include 'footer.php'; ?>


</body>
</html>