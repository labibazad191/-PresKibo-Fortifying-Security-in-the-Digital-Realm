<!Doctype HTML>
<html>
<head>
  <title>Preskibo</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="invoice.css">
 <link rel="icon" type="image/png" href="./images/paediatrics.png">
  
</head>


<body>

  <?php
    require('db.php');
    session_start();

    $username= $_SESSION['username'] ;
    $fullname = $_SESSION['fullname'];

    $sqls = "SELECT * FROM `medicine`";
    $querys = mysqli_query($con,$sqls);
    $rows = mysqli_fetch_array($querys);


    ?>

    <?php
    $time = date("Y-m-d H:i:s");

    if(isset($_POST['pres'])) {

    $id = $_POST['idp'];
    $_SESSION['p_id'] = $id;

    $sql = "SELECT * FROM patients WHERE patient_ID = '$id'";
                          $result = mysqli_query($con, $sql);
                          $row=mysqli_fetch_array($result);

                          $name= $row['doctor_name'];
                          $sql2 = "SELECT * FROM doctors WHERE Full_Name = '$name'";
                          $result2 = mysqli_query($con, $sql2);
                          $row2=mysqli_fetch_array($result2);
}
?>


  <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Medicine data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>



                <form method="POST" action="insert_all.php">

                    <div class="modal-body">
                        <div class="form-group">
                            <label> Medicine Name </label>
                            <select class="form-control" name="m_name" >
                                           <?php
                                          while($loop = mysqli_fetch_assoc($querys)){ ?>
                                            <option value="<?php echo $loop['Name'];?>" style="color: black;"><?php echo $loop['Name'] ?></option>
                    <?php } ?>
                                        </select>
                        </div>

                        <div class="form-group">
                            <label> Dose </label>
                            <input type="text" name="dose" class="form-control" placeholder="Enter Dose">
                        </div>

                        <div class="form-group">
                            <label>Strength</label>
                            <input type="text" name="strength" class="form-control" placeholder="Medicine Strength">
                        </div>

                        <div class="form-group">
                            <label> Advice</label>
                            <input type="text" name="advice" class="form-control" placeholder="Advice for taking medicine">
                        </div>
                        <div class="form-group">
                            <label> Duration</label>
                            <input type="text" name="duration" class="form-control" placeholder="Duration">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="idp" value="<?php echo $id ?>" >
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertdata2" class="btn btn-primary">Save Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

  

    



 

    <div class="content-box">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdeys">
<div class="row">
  <div class="col-sm-12">
      <div class="panel panel-default invoice" id="invoice">
      <div class="panel-body">
        <div class="row">

        <div class="col-sm-6 top-left">
          <i class="fa fa-rocket"></i>
        </div>

        <div class="col-sm-6 top-right">
            <h3 class="marginright">INVOICE-<?php echo $id ?></h3>
            <span class="marginright"><?php echo $time ?></span>
          </div>

      </div>
      <hr>
      <div class="row" style="display: flex; justify-content: space-between;">

        <div class="col-xs-4 from">
          <p class="lead marginbottom" style="font-size: 18px; color: black; font-weight: bold;">Doctor Name : <?php echo $row2['Full_Name'];?></p>
          <p>Email: <?php echo $row2['Email'];?></p>
          <p>Designation: <?php echo $row2['Designation'];?></p>
          <p>DepartMent: <?php echo $row2['Department'];?></p>
          <p>Phone: <?php echo $row2['Phone'];?></p>

        </div>

        <div class="col-xs-4 to">
          <p class="lead marginbottom" style="font-size: 18px; color: black; font-weight: bold;">Patient Name: <?php echo $row['fullname'];?></p>
          <p>Date of Birth: <?php echo $row['dob'];?></p>
          <p>Age: <?php echo $row['age'];?></p>
          <p>Gender: <?php echo $row['gender'];?></p>
          <p>Phone: <?php echo $row['phone'];?></p>
          <p>Email: <?php echo $row['email'];?></p>

          </div>

      </div>

      <?php
                        try{
                            $dbcon = new PDO("mysql:host=localhost:3306;dbname=pres_db;","root","");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            
                            $query="SELECT * FROM prescriptions WHERE patient_id='$id'";
                            
                            try{
                                $sql=$dbcon->query($query);
                                
                                $app_table=$sql->fetchAll();
                                ?>

      <div class="row table-row">
        <table class="table table-striped">
            <thead>
              <tr>
                <th class="text-center" style="width:5%">#</th>
                <th >Medicine Name</th>
                <th class="text-right" style="width:15%">Dose</th>
                <th class="text-right" style="width:15%">Strength</th>
                <th class="text-right" style="width:15%">Duration</th>
                <th class="text-right" style="width:15%">Advice</th>
                <th class="text-right" style="width:15%">Status</th>
              </tr>
            </thead>
            <tbody>
               <?php foreach($app_table as $j){ ?>
                         <tr>
                          <td><?php echo $j['id'] ?></td>
                          <td><?php echo $j['medicine_name'] ?></td>
                          <td><?php echo $j['dose'] ?></td>
                          <td><?php echo $j['strength'] ?></td>
                          <td><?php echo $j['duration'] ?></td>
                          <td><?php echo $j['advice'] ?></td>
                          <td>
                            <form method="post" action="process.php">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <input type="submit" value="Delete" name="reject2" class="delete">
                            </form>
                          </td>
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
             </tbody>
          </table>

      </div>



      <div class="row">
      <div class="col-xs-6 margintop">
        <p class="lead marginbottom">THANK YOU!</p>

        
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#studentaddmodal">
                        ADD Medicine
                    </button>
        <button class="btn btn-danger" id="invoice-print"><i class="fa fa-print"></i> Print Invoice</button>
        <button class="btn btn-warning" id="invoice-print"><i class="fa fa-left-arrow"><a href="dashboard.php" style="text-decoration: none; color: white;"></i> Go back</a></button>
      </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>






                    


  
</table>
    </div>
  </div>
  </div>
    
  <div class="clearfix"></div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>




</body>


</html>
