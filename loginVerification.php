<?php
ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );
require('db.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  session_start();
  $code = $_SESSION['slogin'];
  $email=$_SESSION['email'];
  $uid=$_SESSION['doctor_id'];
   $name= $_SESSION['fullname'];
  $hascode = hash('sha3-256', $_POST['code']);
  if ($hascode == $code) {

    date_default_timezone_set('Asia/Dhaka');
    $current_time = date('Y-m-d H:i:s');
    $iphone = strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone');

    $android = strpos($_SERVER['HTTP_USER_AGENT'], 'Android');

    $ipod = strpos($_SERVER['HTTP_USER_AGENT'], 'iPod');



    if ( $android ) {

                $mail = new PHPMailer( true );
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'preskibo@gmail.com';
                $mail->Password = 'mvlynyvdrsroqpet';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->setFrom( 'preskibo@gmail.com' );
                $mail->addAddress( $email );
                $mail->Subject = 'Login Info!! ';
                $mail->Body = "Your  Account is Login at $current_time from a Android device ;  ";
                $mail->send();
                $sql="INSERT INTO `logininfo`( `uid`, `name`, `email`, `device`, `time`) VALUES ('$uid','$name','$email','Android','$current_time')";
                mysqli_query($con, $sql);
                header("Location: dashboard.php");
    }
    elseif ( $iphone ) {
      $mail = new PHPMailer( true );
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'preskibo@gmail.com';
      $mail->Password = 'mvlynyvdrsroqpet';
      $mail->SMTPSecure = 'ssl';
      $mail->Port = 465;
      $mail->setFrom( 'preskibo@gmail.com' );
      $mail->addAddress( $email );
      $mail->Subject = 'Login Info!! ';
      $mail->Body = "Your  Account is Login at $current_time from a Iphone ;  ";
      $mail->send();
      $sql="INSERT INTO `logininfo`( `uid`, `name`, `email`, `device`, `time`) VALUES ('$uid','$name','$email','Iphone','$current_time')";
                mysqli_query($con, $sql);

      header("Location: dashboard.php");

  } elseif ( $ipod ) {
      $mail = new PHPMailer( true );
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'preskibo@gmail.com';
      $mail->Password = 'mvlynyvdrsroqpet';
      $mail->SMTPSecure = 'ssl';
      $mail->Port = 465;
      $mail->setFrom( 'preskibo@gmail.com' );
      $mail->addAddress( $email );
      $mail->Subject = 'Login Info!! ';
      $mail->Body = "Your  Account is Login at $current_time from a Ipad ;  ";
      $mail->send();
      $sql="INSERT INTO `logininfo`( `uid`, `name`, `email`, `device`, `time`) VALUES ('$uid','$name','$email','Ipad','$current_time')";
                mysqli_query($con, $sql);

      header("Location: dashboard.php");
    } else {

      $mail = new PHPMailer( true );
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'preskibo@gmail.com';
      $mail->Password = 'mvlynyvdrsroqpet';
      $mail->SMTPSecure = 'ssl';
      $mail->Port = 465;
      $mail->setFrom( 'preskibo@gmail.com' );
      $mail->addAddress( $email );
      $mail->Subject = 'Login Info!! ';
      $mail->Body = "Your  Account is Login at $current_time from a Laptop ;  ";
      $mail->send();
      $sql="INSERT INTO `logininfo`( `uid`, `name`, `email`, `device`, `time`) VALUES ('$uid','$name','$email','Laptop','$current_time')";
                mysqli_query($con, $sql);

      header("Location: dashboard.php");
    }



    
  } else {
    echo " <script type='text/javascript'>
        alert('Code is not correct');

        </script>
        
        ";
  }
}
?>


<head>
  <title>Preskibo</title>
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="icon" type="image/png" href="./images/paediatrics.png">
</head>

<body class="align">

  <div class="grid">

    <p class="text--center" style="color: #28ceff; font-size: 38px;">Verification<br></p>

    <form action="" method="POST" class="form login">

      <div class="form__field">
        <label for="login__username">
          <i class="fas fa-user icon"></i>
          <span class="hidden">Code</span></label>
        <input autocomplete="username" id="login__username" type="text" name="code" class="form__input" placeholder="Code" required>
      </div>



      <div class="form__field">
        <input type="submit" value="Sign In" name="submit">
      </div>
      <p class="text--center">Not A Member? <br><a href="signup.php">Sign up now</a></p>

    </form>





  </div>

</body>