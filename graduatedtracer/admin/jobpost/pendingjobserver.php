<?php 
session_start();
include '../dbhelper.php';

 if(isset($_POST['cancelinfo'])){
  $jobid = $_POST['jobid'];

  $sql = "SELECT * FROM jobpost WHERE id='$jobid'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
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





  $result = mysqli_query($conn,"DELETE FROM jobpost WHERE id='$jobid'");



    $result1 = mysqli_query($conn,"INSERT INTO aljobpost (jobtitle,companyname,email,contact,link,startdate,enddate,jobtype,location,specialization,qualification,description,jobstatus,collegeuploaded,jobpostdate,reason,jobposttime) values ('$jobtitle','$companyname','$email','$contact','$link','$startdate','$enddate','$jobtype','$location','$specialization','$qualification','$description','cancelled','admin','$jobpostdate','$reasons1','$time')");


  if ($result) {
    $_SESSION['canceladminjobssucess'] = "asdasdsa";
  header("Location: pendingjob.php");
  }

 }











?>