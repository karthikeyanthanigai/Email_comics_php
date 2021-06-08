<?php require_once "controllerUserData.php"; ?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
?>
<?php
require "connection.php";


$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            header("refresh: 300");
            $con=  mysqli_connect("localhost","id16987015_test123","70tmAc>[ws44(D*>","id16987015_test");
          $update_pass = "SELECT sub FROM usertable WHERE email = '$email'";
          $run_query = mysqli_query($con, $update_pass);
          if(mysqli_num_rows($run_query) > 0){
              $fetch_data = mysqli_fetch_assoc($run_query);
              $er = $fetch_data['sub'];
              //echo $er;
                    if(isset($_POST['button2'])) {
                      if ($er=='1'){
                        $code='0';
                        $update_sub = "UPDATE usertable SET sub = '$code' WHERE email = '$email'";
                        $run_sub = mysqli_query($con, $update_sub);
                        $er='0';


                      }}

                    }
                 $val=rand(10,800);
                  $arr = file_get_contents('http://xkcd.com/'.$val.'/info.0.json');
                  $data = json_decode($arr);
                  $e= $data->img;

                //img save
                $contents=file_get_contents($e);
                $save_path="image.png";
                file_put_contents($save_path,$contents);

//send mail if subscribe
if ($er=='1'){
  $mail = new PHPMailer(true);

try{
      //Server settings
      $mail->isSMTP();
      $mail->Host       = 'smtp.gmail.com';
      $mail->SMTPAuth   = true;
      $mail->Username   = 'karthikeyanthanigaivelu@gmail.com';
      $mail->Password   = 'iamironman';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port       = 587;

      //Recipients
      $mail->setFrom('karthikeyanthanigaivelu@gmail.com');
      $mail->addAddress($email);     //Add a recipient
      $mail->addAttachment('image.png');


   $mail->AddEmbeddedImage('image.png', 'logo_2u');

      $mail->isHTML(true);
      $mail->Subject = 'Your meme';
      $mail->Body    = "your Meme is <br><img src='cid:logo_2u'><br><br><br>If you what to stop sending mail <a href='https://ungraceful-galley.000webhostapp.com/home.php'>Click here</a>";

      $mail->send();

      }  catch (Exception $e) {
        $errors['otp-error'] = "Failed while sending code!";
          //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
}


            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $fetch_info['name'] ?> | Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
    nav{
        padding-left: 100px!important;
        padding-right: 100px!important;
        background: #6665ee;
        font-family: 'Poppins', sans-serif;
    }
    nav a.navbar-brand{
        color: #fff;
        font-size: 30px!important;
        font-weight: 500;
    }
    button a{
        color: #6665ee;
        font-weight: 500;
    }
    button a:hover{
        text-decoration: none;
    }
    h1{
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 50px;
        font-weight: 600;
    }
    </style>
</head>
<body>
    <nav class="navbar">
    <a class="navbar-brand" href="#">Welcome <?php echo $fetch_info['name'] ?></a>
    <form method="post">


        <input type="submit" class="btn btn-danger" name="button2"
                value="UnSubscribe"/>
    </form>
    <button type="button" class="btn btn-light"><a href="logout-user.php">Logout</a></button>
    </nav>

<!--<img src="<?php //echo $e; ?>">-->
<img src="image.png">
</body>
</html>
