<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master\src\Exception.php';
require 'PHPMailer-master\src\PHPMailer.php';
require 'PHPMailer-master\src\SMTP.php';

echo "IMPORTS OK";

$message = $_POST['message'];
$address = $_POST['address'];
$title = $_POST['title'];
echo $message . "message // address:".$address;


//echo    phpinfo();

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

$mail->SMTPDebug  = 1;  // was 4 for debug
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";

$mail->Username   = "GMAIL ";// eg example@email.com
$mail->Password   = "PASSWORD FOR GMAIL"; //password123

$mail->IsHTML(true);
$mail->AddAddress("$address", " "); 

$mail->SetFrom("CHANGE", "CHANGE");   // says whos the email is from 
$mail->AddReplyTo("CHANGE", "CHANGE");  // what address the reply is sent to

// $mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");  //used for CCing people into emails 
$mail->Subject = "$title";
$content = " $message ";

$mail->MsgHTML($content); 
if(!$mail->Send()) {
  echo "Error while sending Email.";
  var_dump($mail);
} else {
  echo "Email sent successfully";
}

echo "All done";

?>

<h1>ok</h1>
