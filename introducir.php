<?php
require_once('funciones.php');
//conectar('localhost', 'root', '', 'blackfriday');
conectar ('localhost', 'lostajibosnews_blackfriday', 'r)zq4X*(iW8?', 'lostajibosnews_blackfriday');
mysql_query ("SET NAMES 'utf8'");

$code = substr( md5(microtime()), 1, 8);


//Recibir
$name = strip_tags($_POST['name']);
$mail = strip_tags($_POST['mail']);
$correo = $_REQUEST['mail'] ;
$phone = strip_tags($_POST['phone']);
$country = strip_tags($_POST['country']);
$city = strip_tags($_POST['city']);
$direction = strip_tags($_POST['direction']);

$cuerpo_mensaje ="
<!------------------------------------ 
---- BODY ----------------------------
------------------------------------->
<table>
    <tr>
        <td></td>
        <td bgcolor='#FFFFFF'>
            
            <!-- content -->
            <div>
                <table width='600'>
                    <tr>
                        <td>
                            <h1>Saludos cordiales $name</h1>
                            <p>Gracias por su preferencia. <br />
                            Este es el código con el que usted podrá, hacer validad su reserva. Asegúrese de no perder este Código.</p>
                            
                            <table width='200' align='center' bgcolor='#FF0000' >
                              <tr>
                                <td><h2 style='color:#fff; margin: 10px;' align='center'>$code</h2> </td>
                              </tr>
                          </table>
                            <p>&nbsp;</p>
                            <p>
                                <ul>
                                    <li><strong>Nombre y Apellidos:</strong> $name</li>
                                    <li><strong>Email:</strong> $mail</li>
                                    <li><strong>Teléfono:</strong> $phone</li>
                                </ul>
                            </p>
                            <p>Habitación doble standard (capacidad máximo 4 personas). Late check out sujeto a disponibilidad.
                            </p>

                            <p>
                                *Fecha de venta: Lunes 28 de Noviembre <br>
                                *Horario: 8:00 a 22:00<br>
                                *Promoción no reembolsable <br>
                                *Cupos limitados por día <br>
                                *La reserva no es reembolsable <br>
                                *<b>Solo válido para los fines de semana</b>
                            </p>
                            <h3>Incluye</h3>
                            <p>
                               <ul>
                                    <li>Desayuno Bufett Americano para 4 personas</li>
                                    <li>Acceso al Gym</li>
                                    <li>Piscina</li>
                                    <li>Wi fi</li>
                                    <li>Sauna</li>
                                    <li>Parqueo</li>
                                    <li>Plan Recreacional para niños</li>
                                </ul>
                            </p>

                          <center><h3>IMPRIMA ESTE DOCUMENTO PARA REALIZAR SU PAGO </h3></center>
                         
        <center><h2>Forma de Pago</h2></center>
        
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
                                <p><p>*Este documento sólo es un comprobante de que el usuario solicitó obtener el descuento ofrecido en el Plan Cyber Monday del Hotel Los Tajibos, no es una confirmación de estadía. Una vez realice su pago favor comuníquese con el centro de reservas llamando al +591-3 3421000 o envíe un email a: info@lostajiboshotel.com
                                    <br />
                              </p>

                              <img src='http://lostajibosnews.com/img/logos.png' width='150px'>
                            </td>
                        </tr>
                    </table>
                </div><!-- /content -->
                
        </td>
        <td></td>
    </tr>
</table><!-- /FOOTER -->
";


$query = @mysql_query('SELECT * FROM registros WHERE mail="'.mysql_real_escape_string($mail).'"');
if ($existe = @mysql_fetch_object($query))
{ echo "<script>alert('Usted ya ha sido registrado, por favor revise su bandeja de entrada o en su defecto la carpeta de Spam. Gracias!');location.href ='javascript:history.back()';</script>"; 
}

else {
        $meter = @mysql_query('INSERT INTO  registros (name, mail, phone, country, city, direction, code) 
        values ("'.$name.'", "'.$mail.'", "'.$phone.'", "'.$country.'", "'.$city.'", "'.$direction.'", "'.$code.'")');
     
        // PhpMailer 

            require("php/class.phpmailer.php");

            $mail = new PHPMailer();
            $mail->From     = "info@lostajibosnews.com";
            $mail->FromName = "Los Tajibos Hotel";
            $mail->AddAddress($correo); // Dirección a la que llegaran los mensajes.
        // Aquí van los datos que apareceran en el correo que reciba

            $mail->WordWrap = 50; 
            $mail->IsHTML(true);     
            $mail->Subject  =  "Black Friday Los Tajibos Hotel & Convention Center"; // Asunto del mensaje.
            $mail->Body     =  $cuerpo_mensaje;


         // Mensaje del usuario

        // Datos del servidor SMTP, podemos usar el de Google, Outlook, etc...

            $mail->IsSMTP(); 
            $mail->Host = "localhost";  // Servidor de Salida. 465 es uno de los puertos que usa Google para su //servidor SMTP
            $mail->SMTPAuth = true; 
            $mail->Username = "info@lostajibosnews.com";  // Correo Electrónico
            $mail->Password = "LosTajibos23"; // Contraseña del correo
            // Activo condificacción utf-8
            $mail->CharSet = "UTF-8";

            if($mail->send()){ 
                echo "<script type='text/javascript'>
                   window.location = 'felicidades.php'
              </script>";}
            else {
                echo "<script>alert('Error al enviar el formulario');location.href ='javascript:history.back()';<///script>"; }


}
?>  