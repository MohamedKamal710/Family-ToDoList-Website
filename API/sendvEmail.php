<?php 
require('PHPMailer-master/src/PHPMailer.php');
require('PHPMailer-master/src/SMTP.php');

$sentTo = $_POST['sentTo'];
$token = $_POST['vtoken'];
echo "$link";

$mail = new  PHPMailer\PHPMailer\PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "petek.authser@gmail.com";
$mail->Password   = "12345678xx";

$mail->IsHTML(true);
$mail->AddAddress($sentTo, "");
$mail->SetFrom("petek.authser@gmail.com", "PETEK AUTH SERVER");
$mail->Subject = "Verify Your Email - PETEK";
$content = "<p>Verify your email using the link below : <br>  http://localhost/hw1/PHP/verify.php?token=$token</p>";

$mail->MsgHTML($content); 
if(!$mail->Send()) {
  echo "Error while sending Email.";
  var_dump($mail);
} else {
  echo "Email sent successfully";
}



?>