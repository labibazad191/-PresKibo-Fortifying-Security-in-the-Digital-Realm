<!DOCTYPE html>
<html>
    <head>
        <title>Preskibo</title>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      
        <link href="css/navbar.css" rel="stylesheet" type="text/css"/>
        <link href="css/appointment.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
         <link rel="icon" type="image/png" href="./images/paediatrics.png">
    </head>
    <body>
    <header class="header">
      <a href="index.php" class="logo">Pres<span class="yellow">kibo</span></a>

      <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="#services">Services</a>
        <a href="#about">About Us</a>
        <a href="#contact">Contact Us</a>
        <a href="login.php" class="btn">Sign in</a>
      </nav>

      <!-- Hamburger -->
      <div class="hamburger">
        <img src="./images/grid-outline.svg" alt="" />
      </div>
    </header>

        <div class="container box">
            <div class="row align-items-center">
                <div class="col-lg-6 ">
                    <div class="appoinment-content">
                        <img src="images/bg_3.svg" alt="" class="img-fluid"/>
                        <div class="emergency">
                        	<h2 class="text-lg text-center">call Now</h2>
                            <h2 class="text-lg"><i class="icofont-phone-circle text-lg"></i>+880 191456789</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-10 ">
                    <div class="appoinment-wrap mt-5 mt-lg-0">
                        <h2 class="mb-2 title-color">Book appoinment</h2>
                        <p class="mb-4">
                            Now you can get an online appointment, We will get back to you and fix a meeting with doctors.
                        </p>

                        <?php
						    require('db.php');
						    session_start();
						    
						    
						    if (isset($_POST['submit'])) {

                            if (isset($_POST['department']) && !empty($_POST['doctors']) && !empty($_POST['date']) && !empty($_POST['time']) && !empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['message'])) {

                            		$doctor = stripslashes($_POST['doctors']);
							        $doctor = mysqli_real_escape_string($con, $doctor);

							        $department = stripslashes($_POST['department']);
							        $department = mysqli_real_escape_string($con, $department);

							        $app_time    = stripslashes($_POST['time']);
							        $app_time    = mysqli_real_escape_string($con, $app_time);

							        $app_date = stripslashes($_POST['date']);
							        $app_date = mysqli_real_escape_string($con, $app_date);

							        $patient_name = stripslashes($_POST['name']);
							        $patient_name = mysqli_real_escape_string($con, $patient_name);

							        $phone = stripslashes($_POST['phone']);
							        $phone = mysqli_real_escape_string($con, $phone);

							        $msg = stripslashes($_POST['message']);
							        $msg = mysqli_real_escape_string($con, $msg);

                      $age= $_POST['age'];
                      $gender= $_POST['gender'];
                      $dob= $_POST['dob'];
                      $email= $_POST['email'];

							        $create_datetime = date("Y-m-d H:i:s");

                                $sql = "INSERT INTO `appointments` (`doctor`, `department`, `app_time`, `app_date`, `patient_name`, `phone`, `msg`,`age`,`gender`,`dob`,`email`, `created_at`) VALUES
										('$doctor', '$department', '$app_time', '$app_date', '$patient_name', '$phone', '$msg', '$age', '$gender', '$dob','$email', '$create_datetime')";

						        $query = mysqli_query($con,$sql) or die("Query Unsuccessful.");

						        if ($query) {
                                    echo "<p class='success'>Your appointment has been taken!</p>";
                                    header("Refresh:5;url= index.php");
                                }
                            } else {
                                echo "<p class='error'>Fill out the all form data!</p>";
                            }
                        }

						        
						        ?>

                        <form id="#" class="appoinment-form" method="post" action="#">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control" id="department" name="department">
                                            <option>Choose Department
                                            
											</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control" id="doctors" name="doctors">
                                        	<option>Choose Doctors</option>
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="date" id="date" type="text" class="form-control" placeholder="dd/mm/yyyy">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="time" id="time" type="text" class="form-control" placeholder="Time">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="dob"type="text" class="form-control" placeholder="Date Of Birth">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="name" id="name" type="text" class="form-control" placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="gender" id="name" type="text" class="form-control" placeholder="Gender">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="age" id="name" type="text" class="form-control" placeholder="Age">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="email" id="name" type="text" class="form-control" placeholder="Email">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="phone" id="phone" type="Number" class="form-control" placeholder="Phone Number">
                                    </div>
                                </div>

                            </div>
                            <div class="form-group-2 mb-4">
                                <textarea name="message" id="message" class="form-control" rows="6" placeholder="Your Message"></textarea>
                            </div>

                            <input type="submit" name="submit" class="btn btn-main btn-round-full" value="Make Appoinment">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
        <script>
            
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

  	$("#date").datepicker({
                    dateFormat: 'dd/mm/yy',
                    minDate: 0
                });


                //timepicker
                $('#time').timepicker({

                });
            
  });



        </script>

    </body>
</html>