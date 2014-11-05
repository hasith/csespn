<?php
require_once './global.inc.php';
/*
1)visit http://www.glob.com.au/sendmail/ and download sendmail.zip
2)create a folder named "sendmail" in "C:\wamp\" and Extract Files 
3)open a sendmail.ini and configure it as following
    smtp_server=smtp.gmail.com
	smtp_port=465
	default_domain=localhost
	auth_username=username of the gmail
    auth_password=password of the gmail
	hostname=localhost
4)open both php.ini from "C:\wamp\bin\apache\Apache2.x\bin" and C:\wamp\bin\php\php 5.x and configure those in a same way as following.
 -under mail function of ini files you should do those changes.
    SMTP = localhost
	smtp_port = 25
	sendmail_from = NULL
	sendmail_path = "C:\wamp\sendmail\sendmail.exe -t -i"
	mail.add_x_header = "0"
	mail.log = NUll
5)Enable IMAP Access in your GMail's Settings
   Forwarding and POP/IMAP -> IMAP Access and Enable it.
6) Enable "ssl_module" module in Apache server
   click the wamp server icon in notification area -> Apache -> Apache modules -> ssl_module
7) Enable "php_openssl" and "php_sockets" extensions for PHP compiler
   click the wamp server icon in notification area -> PHP -> PHP extensions -> php_openssl and php_sockets
   
**Note.....
If it not works in Windows8, change the properties of sendmail.exe
right click sendmail.exe in sendmail folder-> properties -> compatibility -> change compatibility mode to Windows XP(Service Pack 3)     
 
9)Run this php file. 
*/


class Mail
{
function sendMail(){
$to = "amalka.iloshini@gmail.com";
$subject = "My subject";
$txt = "Hello";
$headers = "From: amalka.iloshini@gmail.com" . "\r\n" .
"CC: sandaru.weerasooriya@gmail.com";
mail($to,$subject,$txt,$headers);
 
}
}
?>