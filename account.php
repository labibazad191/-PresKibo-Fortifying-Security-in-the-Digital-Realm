<!Doctype HTML>
<html>
<head>
	<title>Preskibo</title>
	<link rel="stylesheet" href="css/dashboard.css" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="icon" type="image/png" href="./images/paediatrics.png">
</head>


<body>

	<?php
    require('db.php');
    session_start();

    $username= $_SESSION['username'] ;

    $query=mysqli_query($con,"SELECT * FROM doctors where username='$username'")or die(mysqli_error());
    $row=mysqli_fetch_array($query);
?>
	
	<div id="mySidenav" class="sidenav">
	<p class="logo"><span>Pres</span>Kibo</p>
  <a href="dashboard.php" class="icon-a"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;Dashboard</a>
  <a href="patients.php"class="icon-a"><i class="fa fa-users icons"></i> &nbsp;&nbsp;Patients</a>
  <a href="appointments.php"class="icon-a"><i class="fa fa-list icons"></i> &nbsp;&nbsp;Appointments</a>
  <a href="medicine.php"class="icon-a"><i class="fa fa-shopping-bag icons"></i> &nbsp;&nbsp;Medcine Inventory</a>
  <a href="#"class="icon-a"><i class="fa fa-tasks icons"></i> &nbsp;&nbsp;Prescription</a>
  <a href="account.php"class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Account</a>
  <a href="logout.php"class="icon-a"><i class="fa fa-list-alt icons"></i> &nbsp;&nbsp;Sign out</a>

</div>
<div id="main">

	<div class="head">
		<div class="col-div-6">
<span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >&#9776; Account</span>
<span style="font-size:30px;cursor:pointer; color: white;" class="nav2"  >&#9776; Account</span>
</div>
	
	<div class="col-div-6">
	<div class="profile">

		<img src="images/user.svg" class="pro-img" />
		<p><?php echo strtoupper($username)?> <span>Doctor</span></p>
	</div>
</div>
	<div class="clearfix"></div>
</div>

	<div class="clearfix"></div>
	<br/>

  <?php

  if(isset($_REQUEST['username'])){
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $department = $_POST['department'];
        $designation = $_POST['designation'];
        $date = $_POST['date'];
        $query = "UPDATE doctors SET Full_Name = '$fullname',
                      username = '$username', Phone = '$phone', DOB = '$date', Department = '$department', Designation = '$designation', Email = '$email', Password='$password'
                      WHERE username='$username'";
        $result = mysqli_query($con, $query) or die("Query Unsuccessful.");
                    
        if ($result) {
            echo "<div class='form'>
                  <h3>Account Info Updated successfully.</h3><br/>
                  <p class='link'>Click here to <a href='account.php'>Go Back</a></p>
                  </div>
                  ";
        }
    } else {
?>

<div class="reg-form">
  <div class="container">
    <div class="title">Edit Profile</div>
    <div class="content">
      <form action="" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" name="fullname" required value="<?php echo $row['Full_Name']; ?>">
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter your username" name="username" required value="<?php echo $row['username']; ?>">
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="email" required value="<?php echo $row['Email']; ?>">
          </div>
          <div class="input-box">
            <span class="details">Date Of Birth</span>
            <input name="date" id="date" type="date" value="<?php echo $row['DOB']; ?>"class="details" placeholder="dd/mm/yyyy" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" name="phone" required value="<?php echo $row['Phone']; ?>">
          </div>
          <div class="input-box">
            <span class="details">Department</span>
            <select class="details" id="department" name="department">
              <option><?php echo $row['Department']; ?>
                                            
              </option>
            </select>
          </div>
          <div class="input-box">
            <span class="details">Designation</span>
            <input type="text" placeholder="Designation" value="<?php echo $row['Designation']; ?>" name="designation" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" required value="<?php echo $row['Password']; ?>" name="password">
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Update Profile">
        </div>
      </form>

      <?php
    }
?>

      
                     
    </div>
  </div>
</div>	




	
		
	<div class="clearfix"></div>
</div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>

  $(".nav").click(function(){
    $("#mySidenav").css('width','70px');
    $("#main").css('margin-left','70px');
    $(".logo").css('visibility', 'hidden');
    $(".logo span").css('visibility', 'visible');
     $(".logo span").css('margin-left', '-10px');
     $(".icon-a").css('visibility', 'hidden');
     $(".icons").css('visibility', 'visible');
     $(".icons").css('margin-left', '-8px');
      $(".nav").css('display','none');
      $(".nav2").css('display','block');
  });

$(".nav2").click(function(){
    $("#mySidenav").css('width','300px');
    $("#main").css('margin-left','300px');
    $(".logo").css('visibility', 'visible');
     $(".icon-a").css('visibility', 'visible');
     $(".icons").css('visibility', 'visible');
     $(".nav").css('display','block');
      $(".nav2").css('display','none');
 });

            
  $(document).ready(function(){
    function loadData(type, category_id){
      $.ajax({
        url : "config.php",
        type : "POST",
        data: {type : type, id : category_id},
        success : function(data){
          if(type == "doctorData"){
            $("#doctors").html(data);
          }else{
            $("#department").append(data);
          }
        }
      });
    }

    loadData();

    $("#department").on("change",function(){
      var department = $("#department").val();

      if(department != ""){
        loadData("doctorData", department);
      }else{
        $("#doctors").html("");
      }
    })        
            
  });

</script>

</body>

</html>
