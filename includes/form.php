<?php
$mailfrom = $_POST['email'];
$name = $_POST['nombre'];
$web = $_POST['web'];
$empresa = $_POST['empresa'];
$telefono = $_POST['tel'];
$mensaje = $_POST['mensaje'];
$mail_destinatario = 'info@wombi.com.ar';


include("includes/lib/PHPMailer/class.phpmailer.php");
$mail = new PHPMailer();
$mail->From     = $mailfrom; // Mail de origen
$mail->FromName = $name . ' ' . $apellido; // Nombre del que envia
$mail->AddAddress($mail_destinatario); // Mail destino, podemos agregar muchas direcciones
$mail->AddReplyTo($mailfrom); // Mail de respuesta

$mail->WordWrap = 50; // Largo de las lineas
$mail->IsHTML(true); // Podemos incluir tags html
$mail->Subject  =  "Consulta desde la Landing Page";
$mail->Body     =  
"Nombre: $name \n<br />".
"Web: $web \n<br />".
"Email: $mailfrom \n<br />".
"Empresa: $empresa \n<br />".
"Telefono: $telefono \n<br />".
"Mensaje: $mensaje \n<br />".
$mail->AltBody  =  strip_tags($mail->Body); // Este es el contenido alternativo sin html

$mail->Mailer = "smtp";
$mail->Host = "ssl://smtp.gmail.com";
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = "formularios@wwwsa.com.ar";
$mail->Password = "formularios1234"; 

?>

<? if (isset ($_POST['enviar'])) {
//$headers .= "From: ".$_POST['email']. "rn";
//if ( mail ($mail_destinatario, $_POST['asunto'], "Nombre y apellidos : ".$_POST['nombre']." Asunto: ".stripcslashes ($_POST['asunto'])."n Mensaje :n ".stripcslashes ($_POST['mensaje']), $headers )) echo '

if  ($mail->Send()) {
$enviado = "1";
?>

	
				<div class="sent">Su mensaje a sido enviado correctamente. Gracias por contactarse con nosostros</div>
			
	
<? } else { $enviado = "1"; ?>

				<div class="sent red">Error al enviar el formulario. Por favor, inténtelo de nuevo mas tarde.</div>
	

<? }
}
?>
	<h1><a href="tel:11564591775">(011)156-459-1775</a></h1>
	<p>Escribinos a info@depositonorte.com.ar ó completa el siguiente formulario:</p>
	<form name="" id="formulario" method="post" action="" class="">
                     <fieldset>
                <label for="text">Nombre</label>
                <input type="text" name="nombre" id="text" autocomplete="on" tabindex="1" required="required" />
            </fieldset>
            <fieldset>
                <label for="text">Empresa</label>
                <input type="text" name="empresa" id="text" autocomplete="on" tabindex="1" />
            </fieldset>
           <fieldset>
                <label for="tel">Tel. / Cel.</label>
                <input type="tel" name="tel" id="tel"  autocomplete="on" tabindex="23" pattern="[0-9\-.\(\)\+\s]+"  required="required" />
            </fieldset>
            <fieldset>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" autocomplete="on" tabindex="24"  required="required" />
            </fieldset>
           
            <fieldset>
                <label for="message">Mensaje</label>
                <textarea name="mensaje" id="message"  tabindex="26"  required="required"></textarea>
            </fieldset>
           
            <fieldset>
                <input type="submit" name="enviar" id="submitbtn" tabindex="33" value="Enviar" class="first blue" style="float:right" />
            </fieldset>
        </form>