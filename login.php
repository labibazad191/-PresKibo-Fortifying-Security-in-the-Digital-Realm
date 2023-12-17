<head>
  <title>Preskibo</title>
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="icon" type="image/png" href="./images/paediatrics.png">
  <script src="https://www.google.com/recaptcha/api.js?render=6Lf13hcpAAAAALosTpPy3lDslcE9ngnTXeTskshj"></script>

</head>

<body class="align">

  <div class="grid">

    <p class="text--center" style="color: #28ceff; font-size: 38px;">Login<br></p>
    <?php
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';
    require('db.php');
    session_start();

    if (isset($_POST['username'])) {
      $recaptcha_secret = "6Lf13hcpAAAAAPJfBInAaIRrV8WHB7tJfRYF21AF"; 
    $recaptcha_response = $_POST['g-recaptcha-response'];

    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = [
        'secret' => $recaptcha_secret,
        'response' => $recaptcha_response,
        'remoteip' => $_SERVER['REMOTE_ADDR']
    ];
    $options = [
      'http' => [
          'header' => "Content-type: application/x-www-form-urlencoded\r\n",
          'method' => 'POST',
          'content' => http_build_query($data),
      ],
  ];
  $context = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
  $result = json_decode($result, true);

  if (!$result['success'] || $result['action'] != 'submit_form' || $result['score'] < 0.5) {
      // reCAPTCHA v3 validation failed
      die('reCAPTCHA v3 verification failed. Please make sure you are not a robot.');
  }

    
      $username = mysqli_real_escape_string( $con, $_POST[ 'username' ] );

      $password = mysqli_real_escape_string( $con, hash( 'sha3-256', $_POST[ 'password' ] ) );


      $query    = "SELECT * FROM `doctors` WHERE username='$username'AND Password='$password'";

      $result = mysqli_query($con, $query) or die(mysql_error());
      $rows = mysqli_num_rows($result);
      $res = mysqli_fetch_assoc($result);



      if ($rows == 1) {
        $visitor_ip = $_SERVER['REMOTE_ADDR'];
        $allowed_ips = array('::1', '127.0.0.1');
        if (in_array($visitor_ip, $allowed_ips)) {
        $_SESSION['username'] = $username;
        $_SESSION['fullname'] = $res['Full_Name'];
        $_SESSION['doctor_id'] = $res['ID'];
        $_SESSION['email'] = $res['Email'];
        $email=$res['Email'];
        

        $code = ( rand( 100000, 999999 ) );
        $hascode = hash( 'sha3-256', $code );
        $_SESSION[ 'slogin' ] = $hascode;


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
        $mail->Subject = 'One time Password  ';
        $mail->Body = "Your  one time Passwordis : $code";
        $mail->send();
        



        header("Location: loginVerification.php");
        }
        else {
          echo "<div class='form'>
                  <h3 class='text--center'>Access denied. Your IP is not authorized.</h3><br/>
                  <p class='link text--center'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
          
          
      }
      } else {
        echo "<div class='form'>
                  <h3 class='text--center'>Incorrect Username/password.</h3><br/>
                  <p class='link text--center'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
      }
    } else {
    ?>
      <form action="" method="POST" class="form login">
      <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">


        <div class="form__field">
          <label for="login__username">
            <i class="fas fa-user icon"></i>
            <span class="hidden">Username</span></label>
          <input autocomplete="username" id="login__username" type="text" name="username" class="form__input" placeholder="Username" required>
        </div>

        <div class="form__field">
          <label for="login__password">
            <i class="fas fa-lock icon"></i>
            <span class="hidden">Password</span></label>
          <input id="login__password" type="password" name="password" class="form__input" placeholder="Password" required>
        </div>

        <div class="form__field">
          <input type="submit" value="Sign In" name="submit">
        </div>
        <p class="text--center">Not A Member? <br><a href="signup.php">Sign up now</a></p>

      </form>



    <?php
    }
    ?>


  </div>
  <script>
    grecaptcha.ready(function () {
        grecaptcha.execute('6Lf13hcpAAAAALosTpPy3lDslcE9ngnTXeTskshj', { action: 'submit_form' }).then(function (token) {
            document.getElementById('g-recaptcha-response').value = token;
        });
    });
</script>

</body>