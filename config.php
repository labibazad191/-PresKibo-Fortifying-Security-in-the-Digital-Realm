<?php

	$conn = mysqli_connect("localhost","root","","pres_db") or die("Connection failed");

	if($_POST['type'] == ""){
		$sql = "SELECT * FROM departments";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['department']}'>{$row['department']}</option>";
		}
	}else if($_POST['type'] == "doctorData"){
		$name = $_POST['id'];
		$sql = "SELECT * FROM doctors WHERE Department = '$name'";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['Full_Name']}'>{$row['Full_Name']}</option>";
		}
	}

	echo $str;

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
                             
                          }
                          else
                          {
                              echo '<script> alert("Data Not Saved"); </script>';
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
                            }
                            else
                            {
                                echo '<script> alert("Data Not Deleted"); </script>';
                            }
                        }

?>

