<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Preskibo</title>
    <!-- StyleSheets -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="icon" type="image/png" href="./images/paediatrics.png">
  </head>
  <body>

    <header class="header">
      <a href="/" class="logo">Pres<span class="yellow">kibo</span></a>

      <nav class="navbar">
        <a href="#home">Home</a>
        <a href="#services">Services</a>
        <a href="#about">About Us</a>
        <a href="#contact">Contact Us</a>
        <a class="nav-link" href="client.html">Client</a>

        <a href="login.php" class="btn">Sign in</a>
      </nav>

      <!-- Hamburger -->
      <div class="hamburger">
        <img src="./images/grid-outline.svg" alt="" />
      </div>
    </header>

    <!-- Home -->
    <section class="home" id="home">
      <div class="content">
        <h1>Write Prescriptions <span class="yellow">Easier & Faster.</span></h1>
        <p>
          Preskibo is a leading global e-prescribing software,
          connecting doctors and patients through its platform.
        </p>
        <a href="get_appointment.php" class="home-btn">Get Appointment Now!</a>
      </div>
      <div class="image">
        <img src="./images/bg_3.svg" alt="" />
      </div>
    </section>

    <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enter Patient Credentials</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="process.php">

                    <div class="modal-body">

                        <div class="form-group">
                            <label>Patient ID </label>
                            <input type="text" name="pat_id" class="form-control" placeholder="Enter Your Patient ID">
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="Enter Your Phone Number">
                        </div>

                        
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" value="<?php echo $id ?>" >
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="login" class="btn btn-primary">login</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <!-- Services -->
    <section class="services" id="services">
      <div class="top">
        <h2><span class="yellow">Why</span> We are the Best</h2>
        <p>
          Preskibo is a leading global e-prescribing software,
          connecting doctors and patients through its platform.
        </p>
      </div>

      <div class="bottom">
        <div class="box">

          <i class="fa fa-user-md" style="font-size:48px;color:green"></i>
          <h4>Daily care experts</h4>
          <p>
            
          </p>
          <a href="#">View More <img src="./images/btn-arrow.svg" alt="" /> </a>
        </div>
        <div class="box">
          <i class="fas fa-mobile-alt yellow"></i>
          <h4>Available 24/7</h4>
          <p>
            
          </p>
          <a href="#">View More <img src="./images/btn-arrow.svg" alt="" /> </a>
        </div>
        <div class="box">
          <i class="fa fa-wheelchair" style="font-size:48px;color:red"></i>
          <h4>Balanced care</h4>
          <p>
            
          </p>
          <a href="#">View More <img src="./images/btn-arrow.svg" alt="" /> </a>

        </div>
      </div>
      <div class="top">
        <h2><span class="yellow">OUR HEALTH CARE &</span>  PROTECTION PLANS</h2>
        <p>
          Preskibo is a leading global e-prescribing software,
          connecting doctors and patients through its platform.
        </p>



       <div class="bottom">

        <div class="box">
          <div class="card use-image w-96">
        <div class="card-body">
      <div class="grid lg:grid-cols-2 sm:grid-cols-2">

        <h2 class="text-2xl text-[#0071DC] font-bold">Our Care</h2>

         <img src= "./images/General Physician.png">  
      </div>
      <p class="text-2xl"><b class="text-extrabold">$ 150</b>/ monthly</p>
      <p class="mb-5">For 1 adult</p>
      <ul>
        <i class="fa fa-user-md" style="font-size:48px;color:green"></i>
          <li class="mb-5">  <p style="color:">Unlimited consultations with our experienced on duty General Physician</p> <h1><h1></li><p style="color:"> Upto 40% discount on home diagnostic tests</p>

          <li class="mb-5"></li>
          <li> </i><p style="color:"> $ 40,000 cashback on health &amp; life insurance.</p></li>
        </ul>
        <div class="card-actions"><button class="btn bg-[#0071DC] text-white hover:bg-black"> <i style='font-size:24px' class='fas'>&#xf217;</i> Subscribe Now </button>
        </div>
        </div>
        </div>
        </div>
        <div class="box">
          <div class="card use-image w-96">
        <div class="card-body">
      <div class="grid lg:grid-cols-2 sm:grid-cols-2">

        <h2 class="text-2xl text-[#0071DC] font-bold">Our Care</h2>

         <img src= "./images/General Physician.png">  
      </div>
      <p class="text-2xl"><b class="text-extrabold">$ 150</b>/ monthly</p>
      <p class="mb-5">For 1 adult</p>
      <ul>
        <i class="fa fa-user-md" style="font-size:48px;color:green"></i>
          <li class="mb-5">  <p style="color:">Unlimited consultations with our experienced on duty General Physician</p> <h1><h1></li><p style="color:"> Upto 40% discount on home diagnostic tests</p>

          <li class="mb-5"></li>
          <li> </i><p style="color:"> $ 40,000 cashback on health &amp; life insurance.</p></li>
        </ul>
        <div class="card-actions"><button class="btn bg-[#0071DC] text-white hover:bg-black"> <i style='font-size:24px' class='fas'>&#xf217;</i> Subscribe Now </button>
        </div>
        </div>
        </div>



       </div>
       </div>

  <div class="top">
      
      <h2><span class="yellow">Choose Specialist </span>  Doctors</h2>
      <div class="home-btn">
                <a href="https://preskibo.tk" class="btn btn-lg spciality-btn">View All Specialist</a>
            </div>
          </div>
      <div class="bottom">

        <div class="box">

          

          <img src= "./images/General Physician.png">  
          <h4>General Physician</h4>
          <p>
            
          </p>
          <a href="#">View More <img src="./images/btn-arrow.svg" alt="" /> </a>
        </div>
        <div class="box">
          <img src= "./images/Gynaecology.png">
          <h4>Obstetrics &amp; Gynecology</h4>

          <p>
            
          </p>
          <a href="#">View More <img src="./images/btn-arrow.svg" alt="" /> </a>
        </div>
        <div class="box">
          <img src= "./images/child specialist.png">
          <h4>Child specialist</h4>
          <p>
            
          </p>
          <a href="#">View More <img src="./images/btn-arrow.svg" alt="" /> </a>
        </div>
      </div>
      
      <div class="bottom">
        <div class="box">

         <img src= "./images/cardiology1.png">
          <h4>Cardiology</h4>
          <p>
            
          </p>
          <a href="#">View More <img src="./images/btn-arrow.svg" alt="" /> </a>
        </div>
        <div class="box">
           <img src= "./images/Dermatology1.png">
          <h4>Dermatology</h4>
          <p>
            
          </p>
          <a href="#">View More <img src="./images/btn-arrow.svg" alt="" /> </a>
        </div>
        <div class="box">
          <img src= "./images/paediatrics.png">
          <h4>Paediatrics</h4>
          <p>
            
          </p>
          <a href="#">View More <img src="./images/btn-arrow.svg" alt="" /> </a>
        </div>
      </div>



    </section>
    <section id="callaction" class="home-section paddingtop-40">  
           <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="callaction bg-gray">
              <div class="row">
                <div class="col-md-8">
                  <div class="wow fadeInUp" data-wow-delay="0.1s">
                  <div class="cta-text">
                      
                  <h3><i class='fas fa-phone-alt' style='font-size:48px;color:darkred;'>In an emergency? Need help now?  </i></button></h3>
                  </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="wow lightSpeedIn" data-wow-delay="0.1s">
                    <div class="cta-btn">
                    <a href="https://t.me/labib_azad" class="btn btn-skin btn-lg">Book an appoinment</a>  <p>Contact As Our Telegram </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
            </div>
  </section>  


    <!-- About #1 -->
    <section class="about" id="about"style="gap: 3rem 13rem">
      <div class="image">
        <img src= "./images/img1.svg">  
       
      </div>
      <div class="content">
        <h3>
          <span class="yellow">Scheduling System</span> Doctors time-slot
        </h3>
        <p>
          
        </p>
        <div class="form-group">
                                        <select class="form-control" id="department" name="department">
                                            <option>Choose Department
                                            
                      </option>
                                        
<option value="Cardiology">Cardiology</option><option value="Gastrology">Gastrology</option><option value="Neurology">Neurology</option><option value="Nutriotionist">Nutriotionist</option><option value="Gynocology">Gynocology</option><option value="Medicine">Medicine</option>
</select>
                                    </div>



<div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control" id="doctors" name="doctors">
                                          <option>Choose Doctors</option>
                                            
                                        </select>
                                    </div>
                                </div>
        
        <a href="#" class="btn">Availability Check</a>
      </div>


<html> 
<body> 
<div class="content"><h3><i class="fa fa-play-circle" style="font-size:48px;color:red"></i>How To Make an Appointment Booking </h3>

<video autoplay="" controls="" loop="" width="80%">

  <source src="https://s3-us-west-2.amazonaws.com/converterpoint-22/encodings/d1388b54855a835f0ef8c7db6efdf81c.mp4" type="video/mp4">
  
</video>

</div>
</body> 
</html>


      <div class="content">
        <h3><button style='font-size:48px'>LIVE MEETING <i class='fas fa-video' style='font-size:48px;color:greenyellow;'> </i></button></h3>
        
        <p>
          
        </p>




        <div class="TN bzz aHS-YH" style="margin-left:0px">
          <div class="qj qr">
            
          </div>
          <div class="aio UKr6le">
            <span class="nU false">
              <a href="https://meet.google.com/new?hs=180&amp;authuser=0" target="_top" class="btn" title="Start a meeting" aria-label="Start a meeting" draggable="false">Start a meeting</a></span>
            </div>
            <div class="nL aif"
            ></div>
          </div>










    
      </div>

    </section>


    <!-- About #2 -->
    



    <!-- About #3 -->
    <section class="about about-3" style="gap: 3rem 13rem">
      <div class="image">
        <img src="./images/bg_2.svg" alt="" />
      </div>

      <div class="content">
        <h3><span class="yellow">Track</span> your Existing Medical Records</h3>
        <p>
          
        </p>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#studentaddmodal">
                        See Medical Records
        </button>
      </div>
    </section>
    


    <!-- App -->
    <section class="app" id="contact">
      <div class="image">
        <img src="./images/bg_5.svg" alt="" />
      </div>
      <div class="content">
        <h3>Now You can Also See your Medical Records from your phone</h3>
        <p>
          You can easily See the prescriptions using our Website. Now you can
          visit our website from anytime and anywhere.
        </p>
      </div>
    </section>

    


<div class="top">
  <div class="container">
    
    <section class="about" id="contact">
      <div class="image">

      <img src="./images/bg_2.svg" alt="" />
    </div>
    <div class="content">
 <script src="https://use.fontawesome.com/a6f0361695.js"></script>

<h2 id="fh2">WE APPRECIATE YOUR REVIEW!</h2>
<h6 id="fh6">Your review will help us to improve our web hosting quality products, and customer services.</h6>


<form id="feedback" action="">
  <div class="pinfo">Your personal info</div>
  
<div class="form-group">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-user"></i></span>
  <input  name="name" placeholder="Labib Azad" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
    <input name="email" type="email" class="form-control" placeholder="labib.azad94@gmail.com">
     </div>
  </div>
</div>

<div class="form-group">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-globe"></i></span>
  <input  name="URL" placeholder="https://labibazad.tk/" class="form-control"  type="url">
    </div>
  </div>
</div>

 <div class="pinfo">Rate our overall services.</div>
  

<div class="form-group">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-heart"></i></span>
   <select class="form-control" id="rate">
      <option value="1star">1</option>
      <option value="2stars">2</option>
      <option value="3stars">3</option>
      <option value="4stars">4</option>
      <option value="5stars">5</option>
    </select>
    </div>
  </div>
</div>

 <div class="pinfo">Write your feedback.</div>
  

<div class="form-group">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
  <textarea class="form-control" id="review" rows="3"></textarea>
 
    </div>
  </div>
</div>

 <button type="submit" class="btn btn-primary">Submit</button>


</form>
</div>
</div>
</div>
</section>








  


    <!-- Footer -->
    <footer class="footer">
      <div class="top">
        <div class="content">
          <a href="" class="logo">Pres<span class="yellow">Kibo</span></a>
          <p>
            
          </p>
        </div>

        <div class="links">
          <div class="link">
            <h4>Contact Information</h4>
            <div>
              <i class="fas fa-map-marker-alt yellow"> </i>
              <span>Madani Avenue, Satarkul, Badda, Dhaka-1260</span>
            </div>
            <div>
              <i class="fas fa-envelope yellow"> </i>
              <span>preskibo@gmail.com</span>
            </div>
          </div>

          <div class="link">
            <h4>Connect with Us</h4>
           <div>
            <i class="fab fa-facebook yellow"></i>
              <span>facebook</span>
            </div>
            <div>
              <i class="fab fa-instagram yellow"></i>
              <span>Instagram</span>
            </div>
            <div>
              <i class="fab fa-twitter yellow"></i>
              <span>Twitter</span>
            </div>
            
       
      </div>

      <div class="bottom">
        
                  <p>2023 © All Rights Reserved | Developed by Team Preskibo</p>
                
      </div>
    </footer>

    <!-- Go To Top -->
    <div class="scroll-top">
      <img src="./images/arrow-up-outline.svg" alt="" />
    </div>
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

  </body>
</html>
