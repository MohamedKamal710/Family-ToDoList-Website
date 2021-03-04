<?php 
require('PHPMailer-master/src/PHPMailer.php');
require('PHPMailer-master/src/SMTP.php');

$sentTo = $_POST['sentTo'];
$link = $_POST['link'];
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
$mail->Subject = "Reset Password Request - PETEK";
$content = "<p>We have received a request to reset your password . <br> In order to set a new password please click the link below : <br>  $link</p>";

$mail->MsgHTML($content); 
if(!$mail->Send()) {
  echo "Error while sending Email.";
  var_dump($mail);
} else {
  echo "Email sent successfully";
}



?>