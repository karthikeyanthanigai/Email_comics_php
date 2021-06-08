<?php
//sample code to check php mailer 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$info='done';
$email='karthikeyanthanigaivelu@gmail.com';
$password='12345678';
$code='123456';
//Load Composer's autoloader
require 'vendor/autoload.php';
$mail = new PHPMailer(true);


    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'karthikeyanthanigaivelu@gmail.com';                     //SMTP username
    $mail->Password   = 'iamironman';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('karthikeyanthanigaivelu@gmail.com');
    $mail->addAddress($email);     //Add a recipient
        //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email Verification Code';
    $mail->Body    = "Your verification code is $code";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';



    if($mail->Send()) {
      $info = "We've sent a verification code to your email - $email";
      $_SESSION['info'] = $info;
      $_SESSION['email'] = $email;
      $_SESSION['password'] = $password;
      header('location: user-otp.php');
      exit();
    } else {
        $errors['otp-error'] = "Failed while sending code!";
    }
 ?>
