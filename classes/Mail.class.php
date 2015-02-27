<?php

date_default_timezone_set('Etc/UTC');

require_once ROOT_DIR . '/classes/PHPMailerAutoload.php';


class Mailer {
    
    public static function sendRegistratoinMail($toAddress, $toName, $key){
		
		$mail = Mailer::prepare();
		
		//Set who the message is to be sent to
		$mail->addAddress($toAddress, $toName);

		//Set the subject line
		$mail->Subject = 'CSE Portal Registration';

		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
		$mail->msgHTML("Dear ".$toName.", <br/><br/> Thank you for registering with the CSE Partner Portal. 
			Please use the below key to confirm your identification as a CSE student. <br/><br/> Key: ".$key."<br/><br/>
			Best Regards, <br/> Partner Portal Team");
    	
		//send the message, check for errors
		if (!$mail->send()) {
		    echo "Mailer Error: " . $mail->ErrorInfo;
			return false;
		} else {
		    return true;
		}
    }
	
	private static function prepare(){

		//Create a new PHPMailer instance
		$mail = new PHPMailer;

		//Tell PHPMailer to use SMTP
		$mail->isSMTP();

		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 0;

		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';

		//Set the hostname of the mail server
		$mail->Host = Config::Email_server;

		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = Config::Email_port;

		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'tls';

		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;

		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = Config::Email_username;

		//Password to use for SMTP authentication
		$mail->Password = Config::Email_password;

		//Set who the message is to be sent from
		$mail->setFrom('csepartnerportal@gmail.com', 'CSE Partner Portal');
		
		return $mail;
		
	}
    
}


?>