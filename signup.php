

<head>
  <title>Preskibo</title>
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
   <link rel="icon" type="image/png" href="./images/paediatrics.png">
</head>
<body class="align">

	
<?php
    require('db.php');

    if (isset($_REQUEST['username'])) {

        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);

        $fullname = stripslashes($_REQUEST['fullname']);
        $fullname = mysqli_real_escape_string($con, $fullname);

        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);

        $phone = stripslashes($_REQUEST['phone']);
        $phone = mysqli_real_escape_string($con, $phone);

        $password = mysqli_real_escape_string($con, $_POST['password']);
        $minLength = 8;
        
        if (
            strlen($password) >= $minLength &&
            preg_match('/[A-Z]/', $password) &&
            preg_match('/[a-z]/', $password) &&
            preg_match('/\d/', $password) &&
            preg_match('/[^A-Za-z0-9]/', $password)
        ) {
            $pass = hash('sha3-256', $password);

            $create_datetime = date("Y-m-d H:i:s");

            $query = "INSERT into `doctors` (username, Full_Name, Password, email, Phone, created_at)
                     VALUES ('$username','$fullname', '$pass', '$email', '$phone','$create_datetime' )";

            $result = mysqli_query($con, $query);

            if ($result) {
                echo "<div class='form'>
                      <h3>You are registered successfully.</h3><br/>
                      <p class='link'>Click here to <a href='login.php'>Login</a></p>
                      </div>";
            } else {
                echo "<div class='form'>
                      <h3>Required fields are missing.</h3><br/>
                      <p class='link'>Click here to <a href='signup.php'>registration</a> again.</p>
                      </div>";
            }
        } else {
            echo "<script type='text/javascript'>
                  alert('Password does not meet complexity requirements.');
                  </script>";
        }
    } else {
        
    
?>


  <div class="grid">
  	<p class="text--center" style="color: #28ceff; font-size: 38px;">Sign up<br></p>
    <form action="" method="post" class="form login">

      <div class="form__field">
        <label for="login__username">
          <i class="fas fa-user icon"></i>
          <span class="hidden">Username</span></label>
        <input autocomplete="username" id="login__username" type="text" name="username" class="form__input" placeholder="Username" required>
      </div>
      <div class="form__field">
        <label for="login__username">
          <i class="fas fa-address-card icon"></i>
          <span class="hidden">Full Name</span></label>
        <input autocomplete="fullname" id="login__username" type="text" name="fullname" class="form__input" placeholder="Full Name" required>
      </div>
      <div class="form__field">
        <label for="login__username">
          <i class="fas fa-envelope icon"></i>
          <span class="hidden">Email</span></label>
        <input autocomplete="email" id="login__username" type="text" name="email" class="form__input" placeholder="Email" required>
      </div>
      <div class="form__field">
        <label for="login__username">
          <i class="fas fa-phone-square-alt icon"></i>
          <span class="hidden">Phone Number</span></label>
        <input autocomplete="phone" id="login__username" type="text" name="phone" class="form__input" placeholder="Phone" required>
      </div>

      <div class="form__field">
        <label for="login__password">
          <i class="fas fa-lock icon"></i>
          <span class="hidden">Password</span></label>
        <input id="login__password" type="password" name="password" class="form__input" placeholder="Password" required>
      </div>

      <div class="form__field">
        <input type="submit" value="Sign Up" name="submit">
      </div>

      <p class="text--center">Already have account? <br><a href="login.php">Sign in now</a><i class="fas fa-arrow-right ml"></i></p>

    </form>
    <?php
    }
?>

    

  </div>

  

</body>