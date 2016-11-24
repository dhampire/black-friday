<?php
require_once('funciones.php');
//conectar('localhost', 'root', '', 'cmtajibos');
conectar ('localhost', 'www360ts_cmvale', 'c-4W3b&Vl1pC', 'www360ts_cmvale');  
//conectar ('localhost', 'www360ts_tajibos', 'iRssT)Q9P=4)', 'www360ts_cmtajibos');


$codigo = substr( md5(microtime()), 1, 8);


//Recibir
$nombre = strip_tags($_POST['nombre']);
$apellidos = strip_tags($_POST['apellidos']);
$edad = strip_tags($_POST['edad']);
$sexo = strip_tags($_POST['sexo']);
$email = strip_tags($_POST['email']);
$telefono = strip_tags($_POST['telefono']);
$pais = strip_tags($_POST['pais']);
$estado = strip_tags($_POST['estado']);
$ciudad = strip_tags($_POST['ciudad']);
$direccion = strip_tags($_POST['direccion']);
$reserva = " - ";

$vale = "Vale de descuento";

$meter = @mysql_query('INSERT INTO  datos (nombre, apellidos, edad, sexo, email, telefono, codigo, pais, ciudad, direccion, reserva, vale) 
            values 
            ("'.$nombre.'", "'.$apellidos.'", "'.$edad.'", "'.$sexo.'", "'.$email.'", "'.$telefono.'", "'.$codigo.'", "'.$pais.'", "'.$ciudad.'", "'.$direccion.'", "'.$reserva.'", "'.$vale.'")');

$cuerpo_mensaje ="
<table>
    <tr>
        <td>
            <img src='http://360-ts.com/cmtajibos/img/cabecera.png' width='900px'>
        </td>

    </tr>
</table>

<!------------------------------------ 
---- BODY ----------------------------
------------------------------------->
<table>
    <tr>
        <td></td>
        <td bgcolor='#FFFFFF'>
            
            <!-- content -->
            <div>
                <table width='900'>
                    <tr>
                        <td>
                            <h1>Hola, $nombre $apellidos</h1>
                            <p>Gracias por su preferencia. <br />
                            Este es el código de confirmación de su Plan CyberMonday:</p>
                            <p>&nbsp;</p>
                            <h3>Código de confirmación</h3>
                            <table width='200' align='center' bgcolor='#FF0000' >
                              <tr>
                                <td><h2 style='color:#fff' align='center'>$codigo</h2> </td>
                              </tr>
                          </table>
                            <p>&nbsp;</p>
                            <p>
                                <ul>
                                    <li><strong>Nombre:</strong> $nombre $apellidos</li>
                                    <li><strong>Email:</strong> $mail</li>
                                    <li><strong>Teléfono:</strong> $telefono</li>
                                    <li><strong>País:</strong> $pais</li>
                                    <li><strong>Estado:</strong> $estado</li>
                                    <li><strong>Ciudad:</strong> $ciudad</li>

                                </ul>
                            </p>
                            <p>Vale de consumo con 10% de descuento en todos restaurantes y servicios de Los Tajibos Hotel<br />
</p><h4>*Este descuento es válido solo por el día de hoy 30 de noviembre del 2015 y debe ser cancelado antes de las 22:00 horas del día martes 1ro de diciembre 2015</h4>

                            <table width='900' align='center' bgcolor='#FF0000' >
                            
                              <tr><td><p style='color: #fff'>Total a pagar:</td>
                                <td><h2 style='color:#fff' align='center'>179 Bs.</h2> </td>
                              </tr>
                          </table>
                          <p>&nbsp;</p>
                         
<center><h2>Formas de Pago</h2></center>
        
            <h3>Opción 1</h3>
            <p>Pago mediante Tarjeta de Credito<br />
            Para Pagar con tarjeta de crédito por favor comuníquese llamando al 3421000 con  su código de confirmación y nosotros le informaremos los simples pasos que debe  tomar.</p>            <br />
            <h3>Opción 2</h3>
            <p>
            Transferencias bancarias o depósitos: Banco Bisa. <br>
            Cta. Corriente N° 15362014 Moneda Extranjera / Cta. Corriente N° 15360011 Moneda Nacional <br><br>
            SOCIEDAD HOTELERA LOS TAJIBOS S.A.
            </p>
            
            <h3>Opción 3</h3>
            <p>Dirigirse a la recepción de: <br>
Los Tajibos Hotel & Convention Center en la Avenida San Martin, #455 en Santa Cruz, Bolivia  con su código de confirmación <span style='color:red'>IMPRESO</span> y nuestro personal lo atenderá inmediatamente.</p>                           
                            <!-- A Real Hero (and a real human being) -->
                          <p>&nbsp;</p>
                            </p><!-- /Callout Panel -->
    
                        </td>
                    </tr>
                </table>
            </div>
            
            <!-- COLUMN WRAP -->
            

            </div><!-- /COLUMN WRAP --> 
            
        </td>
        <td></td>
    </tr>
</table>

<!-- FOOTER -->
<table>
    <tr>
        <td></td>
        <td >
            
                <!-- content -->
                <div>
                     <table width='500' align='center' >
                        <tr>
                            <td align='center'><!-- /hero -->
                                <!-- Callout Panel -->
                                <p>*Este documento sólo es un comprobante de que el usuario solicitó obtener el descuento ofrecido CyberMonday, no es una confirmación de estadía. Una vez realice su pago favor comuníquese con el centro de reservas llamando al +591-3 3421000 o envíe un email a: cybermonday@lostajiboshotel.com
                                    <br />
                              </p>

                              <img src='http://360-ts.com/cmtajibos/img/logos.png' width='150px'>
                            </td>
                        </tr>
                    </table>
                </div><!-- /content -->
                
        </td>
        <td></td>
    </tr>
</table><!-- /FOOTER -->
";


// PhpMailer 

    require("../php/class.phpmailer.php");


   $mail = new PHPMailer();
   $mail->From     = "lostajiboshotel@lostajibosnews.com";
   $mail->FromName = "Los Tajibos Hotel";
   $mail->AddAddress($email); // Dirección a la que llegaran los mensajes.
 //Aquí van los datos que apareceran en el correo que reciba

 $mail->WordWrap = 50; 
 $mail->IsHTML(true);     
 $mail->Subject  =  "Cyber Monday Los Tajibos"; // Asunto del mensaje.
 $mail->Body     =  $cuerpo_mensaje;
// Mensaje del usuario

// Datos del servidor SMTP, podemos usar el de Google, Outlook, etc...

  $mail->IsSMTP(); 
  $mail->Host = "localhost";  // Servidor de Salida. 465 es uno de los puertos que usa Google para su servidor SMTP
  $mail->SMTPAuth = true; 
  $mail->Username = "lostajiboshotel@lostajibosnews.com";  // Correo Electrónico
  $mail->Password = "LosTajibos.com"; // Contraseña del correo

 // Activo condificacción utf-8
   $mail->CharSet = "UTF-8";
    if($mail->send()){ 
        echo "<script type='text/javascript'>
           window.location = 'felicidades.php'
      </script>";}
    else {
        echo "<script>alert('Error al enviar el formulario');location.href ='javascript:history.back()';</script>"; }
//insertar datos de SQL 



?>  