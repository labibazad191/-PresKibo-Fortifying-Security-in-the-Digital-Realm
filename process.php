  <?php
  require('db.php');

  session_start();  

  if(isset($_POST['insertdata']))
                      {
                          $mname = $_POST['mname'];
                          $generic = $_POST['generic'];
                          $company = $_POST['company'];
                          $details = $_POST['details'];

                          $query = "INSERT INTO medicine (`Name`,`Generic`,`company`,`Details`) VALUES ('$mname','$generic','$company','$details')";
                          $query_run = mysqli_query($con, $query);

                          if($query_run)
                          {
                              echo '<script> alert("Data Saved"); </script>';
                              header("Location:medicine.php");
                             
                          }
                          else
                          {
                              echo '<script> alert("Data Not Saved"); </script>';
                              header("Location:medicine.php");
                          }
                      }




                    if(isset($_POST['reject']))
                        {
                            $id = $_POST['id'];

                            $query = "DELETE FROM medicine WHERE id='$id'";
                            $query_run = mysqli_query($con, $query);

                            if($query_run)
                            {
                                echo '<script> alert("Data Deleted"); </script>';
                                header("Location:medicine.php");
                            }
                            else
                            {
                                echo '<script> alert("Data Not Deleted"); </script>';
                                header("Location:medicine.php");
                            }
                        }

                    if(isset($_POST['rejected']))
                        {
                            $id = $_POST['id'];

                            $query = "DELETE FROM appointments WHERE id='$id'";
                            $query_run = mysqli_query($con, $query);

                            if($query_run)
                            {
                                echo '<script> alert("Data Deleted"); </script>';
                                header("Location:appointments.php");
                            }
                            else
                            {
                                echo '<script> alert("Data Not Deleted"); </script>';
                            }
                        }

                        if(isset($_POST['reject2']))
                        {
                            $id = $_POST['idm'];

                            $query = "DELETE FROM prescriptions WHERE id='$id'";
                            $query_run = mysqli_query($con, $query);

                            if($query_run)
                            {
                                echo '<script> alert("Data Deleted"); </script>';
                                header("Location:insert_all.php");
                            }
                            else
                            {
                                echo '<script> alert("Data Not Deleted"); </script>';
                                header("Location:insert_all.php");
                            }
                        }

                     

                                if(isset($_POST['approve']))
                                {   
                                    $id = $_POST['id'];
                                    $p_id= $_POST['p_id'];
                                    $query=mysqli_query($con,"SELECT * FROM appointments where id='$id'")or die(mysqli_error());
                                    $row=mysqli_fetch_array($query);

                                    $fname = $row['patient_name'];
                                    $email = $row['email'];
                                    $phone = $row['phone'];
                                    $doctor = $row['doctor'];
                                    $dob= $row['dob'];
                                    $age= $row['age'];
                                    $gender= $row['gender'];
                                    $msg= $row['msg'];

                                    $query = "INSERT INTO `patients` (`fullname`, `email`, `phone`, `dob`, `patient_ID`, `gender`, `age`, `comment`, `doctor_name`) VALUES ( '$fname', '$email', '$phone', '$dob', '$p_id', '$gender', '$age', '$msg', '$doctor') ";

                                    $query_run = mysqli_query($con, $query);

                                    if($query_run)
                                    {
                                        echo '<script> alert("Data Updated"); </script>';
                                        $query = "DELETE FROM appointments WHERE id='$id'";
                                        $query_run = mysqli_query($con, $query);
                                        header("Location:appointments.php");
                                    }
                                    else
                                    {
                                        echo '<script> alert("Data Not Updated"); </script>';
                                    }
                                }


                        if(isset($_POST['login']))
                        {
                            $id = $_POST['pat_id'];
                            $num = $_POST['phone'];
                            $_SESSION['pat_id']= $id;

                            $query = "SELECT * FROM patients WHERE patient_ID='$id' AND phone='$num'";
                            $query_run = mysqli_query($con, $query);

                            if($query_run)
                            {
                                echo '<script> alert("Data Found"); </script>';
                                header("Location:Records.php");
                            }
                            else
                            {
                                echo '<script> alert("Data Not Found"); </script>';
                                header("Location:Records.php");
                            }
                        }




                  
 
                        ?>




