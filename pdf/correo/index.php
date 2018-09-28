<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


	include "class.phpmailer.php";
	include "class.smtp.php";

	$mailHost  = "mic-agentes.com"; 
	$mailPort  = 587;
	$mailUsername = "sistema@mic-agentes.com";
	$mailPassword = "^AlZB[]NsLuX"; 
	$mailFrom  = "sistema@mic-agentes.com";
	$mailFromName = "Sistemas MIC";
	$contents="<b>Rodri, si puedes leer esto, el cliente de correo esta listo</b><br>Atte: Iván";

	$mail = new phpmailer (); 

	try {
	$mail->isSMTP();      
 //	$mail->SMTPDebug  = 2;                                  
	$mail->Host = $mailHost;  
	$mail->SMTPAuth = true;  			                
	$mail->SMTPSecure = "tls";	
	$mail->Port       = $mailPort;                           
	$mail->Username = $mailUsername;  
	$mail->Password = $mailPassword;      
	$mail->From = $mailFrom; 
	$mail->FromName = $mailFromName;
	$mail->AddAttachment("img/mic.PNG"); //Archivo adjunto


	$mail ->AddAddress ("mario.ivan.rodriguez@itesm.mx");
	//$mail ->AddAddress ("rodrigo.loy@itesm.mx");
	//$mail ->AddAddress ("potara.cotosta@gmail.com");
	//$mail ->AddAddress ("jorge.carlos.rincon@gmail.com");
	$mail ->Subject = "Prueba de correos";
	$mail ->Body = $contents;
	$mail ->IsHTML (true);
	$mail ->Send ();
    echo "Message Sent OK\n";
}
catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}


?>