<?php 
session_start();
include '../dbhelper.php';

if(isset($_POST['recoverjob'])){

$id = $_POST['id'];

  $sql = "SELECT * FROM jobpost WHERE id='$jobid'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
    $collegeuploaded = $row['collegeuploaded'];
  $jobtitle = $row['jobtitle'];
  $companyname = $row['companyname'];
  $email = $row['email'];
  $contact = $row['contact'];
  $jobtype = $row['jobtype'];
  $location = $row['location'];
  $specialization = $row['specialization'];
  $link = $row['link'];
  $qualification = $row['qualification'];
  $description = $row['description'];
  $startdate = $row['startdate'];
  $enddate = $row['enddate'];
  
   date_default_timezone_set('Asia/Manila');
  $jobpostdate= date("Y-m-d");
      $time = date('g:i a');




  $result = mysqli_query($conn,"INSERT INTO aljobpost (jobtitle,companyname,email,contact,link,startdate,enddate,jobtype,location,specialization,qualification,description,jobstatus,collegeuploaded,jobpostdate,jobposttime) values ('$jobtitle','$companyname','$email','$contact','$link','$startdate','$enddate','$jobtype','$location','$specialization','$qualification','$description','recover','guidance','$jobpostdate','$time')");













$result=mysqli_query($conn,"UPDATE jobpost set jobstatus='pending' where id='$id'");
if ($result) {
        $_SESSION['guidancerecover'] = "///";        
        header("Location: disapproved.php");
    }
}



?>