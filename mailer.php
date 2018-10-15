<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
require_once "phpmailer/class.phpmailer.php";
require 'PHPMailer/PHPMailerAutoload.php';

if(isset($_POST['submit'])){
   $name= $_POST['name'];
   $number= $_POST['phone'];
   $email= $_POST['email'];
   $city=$_POST['city'];
   $mesg= $_POST['message'];

$message = '<html lang="en" dir="ltr"><body>';
$message .= '';
$message .= '<img src="header.png" alt="" style="width:100%;height:200px;">';
$message .= '<br>';
$message .= '<strong>NAME</strong>:  '.$name;
$message .= '<br>';
$message .= '<strong>EMAIL</strong>:  '.$email;
$message .= '<br>';
$message .= '<strong>CITY</strong>:  '.$city;
$message .= '<br>';
$message .= '<strong>PHONE NUMBER</strong>:  '.$number;
$message .= '<br>';
$message .='<strong>MESSAGE</strong>:  '.$mesg;
$message .= '<br>';
$message .= ' </body></html>';


// creating the phpmailer object
$mail = new PHPMailer(true);
try{
// telling the class to use SMTP

// enables SMTP debug information (for testing) set 0 turn off debugging mode, 1 to show debug result
$mail->SMTPDebug = 0;
 $mail->isHTML(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com;smtp2.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'adonaimailer@gmail.com';
$mail->Password = 'adonai\mailer|';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// add a subject line
$mail->Subject = 'Enquiry from ANL Website';

// Sender email address and name
$mail->SetFrom($email,$name);

// reciever address, person you want to send(probably domain)----the clients Email
$mail->AddAddress('edutech4logic@gmail.com');
$mail->AddAddress('demiladephilus@gmail.com');
$mail->AddAddress('lebaddan@gmail.com');
$mail->AddAddress('anlcodingtech@gmail.com');

$mail->addReplyTo($email,$name);
// if your send to multiple person add this line again
//$mail->AddAddress('tosend@domain.com');


// add message body
$mail->MsgHTML($message);


    // send mail
    $mail->Send();
    $msg = "Mail sent successfully";
    echo 'MESSAGE SENT SUCCESSFULLY';
} catch (phpmailerException $e) {
    $msg = $e->getMessage();

} catch (Exception $e) {
    $msg = $e->getMessage();
}
}
else{
   $msg = "Message not sent";
   echo 'Message not sent';
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Thanks</title>
  </head>
  <body>

     <div class="thank_content">
       <h1><?php echo $msg; ?></h1>
     </div>

</html>
