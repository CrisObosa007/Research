<?php 

session_start();
include '../dbhelper.php';

if (isset($_POST['deleteinfo'])) {
	$jobid = $_POST['id'];

  $sql = "SELECT * FROM jobpost WHERE id='$jobid'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $collegeuploaded = $row['collegeuploaded'];
  $jobtitle = $row['jobtitle'];
   $jobtitle = addslashes($jobtitle);
  $companyname = $row['companyname'];
   $companyname = addslashes($companyname);
  $email = $row['email'];
  $contact = $row['contact'];
  $jobtype = $row['jobtype'];
  $location = $row['location'];
  $specialization = $row['specialization'];
  $link = $row['link'];
   $link = addslashes($link);
  $qualification = $row['qualification'];
   $qualification = addslashes($qualification);
  $description = $row['description'];
   $description = addslashes($description);
  
  $startdate = $row['startdate'];
  $enddate = $row['enddate'];
  
   date_default_timezone_set('Asia/Manila');
  $jobpostdate= date("Y-m-d");
      $time = date('g:i a');









		$reasons1 = "";
		$reasons = $_POST['reasons'];
		foreach ($_POST['reasons'] as $reasons){
			if ($reasons != "" && $reasons != "otherreason") {
				$reasons1 .= $reasons . ", ";
			}
			if ($reasons == "otherreason") {
				$otherreason = $_POST['otherreason'];
				$reasons1 .= $otherreason . ", ";
			}
                
        }

		$reasons1 = substr_replace($reasons1 ,"", -2);





 

  $result = mysqli_query($conn,"INSERT INTO aljobpost (jobtitle,companyname,email,contact,link,startdate,enddate,jobtype,location,specialization,qualification,description,jobstatus,reason,collegeuploaded,jobpostdate,jobposttime) values ('$jobtitle','$companyname','$email','$contact','$link','$startdate','$enddate','$jobtype','$location','$specialization','$qualification','$description','closed','$reasons1','$collegeuploaded','$jobpostdate','$time')");






	$result=mysqli_query($conn,"UPDATE jobpost set jobstatus='closed', reason='$reasons1' where id='$jobid'");
	if ($result) {
		$_SESSION['departmentjobhiringdelete'] = "asdas";
		header("Location: jobhiring.php");
	}



}

?>