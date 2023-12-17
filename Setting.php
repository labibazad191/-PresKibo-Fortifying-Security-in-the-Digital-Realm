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
    $fullname = $_SESSION['fullname'];

   $uid=$_SESSION['doctor_id'];
    if(!isset($_SESSION['doctor_id'])){
      header("location: login.php");
      exit;
    }
    ?>
	
	<div id="mySidenav" class="sidenav">
	<p class="logo"><span>Pres</span>Kibo</p>
  <a href="dashboard.php" class="icon-a"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;Dashboard</a>
  <a href="patients.php"class="icon-a"><i class="fa fa-users icons"></i> &nbsp;&nbsp;Patients</a>
  <a href="appointments.php"class="icon-a"><i class="fa fa-list icons"></i> &nbsp;&nbsp;Appointments</a>
  <a href="medicine.php"class="icon-a"><i class="fa fa-shopping-bag icons"></i> &nbsp;&nbsp;Medcine Inventory</a>
  <a href="https://meet.google.com/ozd-juwd-dja"class="icon-a"><i class="fa fa-video-camera"></i> &nbsp;&nbsp;Live Meeting</a>
  <a href="account.php"class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Account</a>
  <a href="Setting.php"class="icon-a"><i class="fa fa-cog icons"></i> &nbsp;&nbsp;Setting</a>

  <a href="logout.php"class="icon-a"><i class="fa fa-list-alt icons"></i> &nbsp;&nbsp;Sign out</a>

</div>
<div id="main">

	<div class="head">
		<div class="col-div-6">
<span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >&#9776; Dashboard</span>
<span style="font-size:30px;cursor:pointer; color: white;" class="nav2"  >&#9776; Dashboard</span>
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
	
	
	
	
	
	<div class="clearfix"></div>
	<br/><br/>
	<div class="col-div-8">
		<div class="box-8">
		<div class="content-box">
			<p>Login info</p>
			<br/>

			<?php
                        try{
                            $dbcon = new PDO("mysql:host=localhost:3306;dbname=pres_db;","root","");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            
                            $query="SELECT * FROM `logininfo` WHERE uid='$uid'";
                            
                            try{
                                $sql=$dbcon->query($query);
                                
                                $app_table=$sql->fetchAll();
                                ?>

			<table>
  <tr>
    <th>Device</th>
    <th>Date And Time</th>
    
  </tr>

<?php foreach($app_table as $row){ ?>
   <tr>
    <td><?php echo $row['device'] ?></td>
    <td><?php echo $row['time'] ?></td>
    
  </tr>
 <?php
                                }
                            }
                            catch(PDOException $ex){
                                ?>
                                    <tr>
                                        <td colspan="5">Data read error ... ...</td>    
                                    </tr>
                                <?php
                            }
                            
                        }
                        catch(PDOException $ex){
                            ?>
                                <tr>
                                    <td colspan="5">Data read error ... ...</td>    
                                </tr>
                            <?php
                        }
                    ?>
  
  
</table>
		</div>
	</div>
	</div>

	
  </div>
		</div>
	</div>
	</div>
		
	<div class="clearfix"></div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

</script>

</body>


</html>
