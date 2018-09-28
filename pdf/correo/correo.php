<?	
    include "class.phpmailer.php";
	include "class.smtp.php";

	$mailHost  = "servicios.itesm.mx"; 
	$mailPort  = 25;
	$mailUsername = "noreply.gdl@servicios.itesm.mx";
	$mailPassword = "zanovuru"; 
	$mailFrom  = "noreply.gdl@servicios.itesm.mx";
	$mailFromName = "CRM TEC";
	


	$mail = new phpmailer (); 
	$mail->isSMTP();      
 //	$mail->SMTPDebug  = 2;                                  
	$mail->Host = $mailHost;  
	$mail->SMTPAuth = true;  			                
	$mail->SMTPSecure = "tls";	
	$mail->Port       = $mailPort;                           
	$mail->Username = $mailUsername;  
	$mail->Password = $mailPassword;      
	$mail -> From = $mailFrom; 
	$mail -> FromName = $mailFromName;

?>