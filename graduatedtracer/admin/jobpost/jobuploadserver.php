<?php 
session_start();
include '../dbhelper.php';

 if(isset($_POST['submit'])){
  $jobtitle = $_POST['jobtitle'];
  $jobtitle = addslashes($jobtitle);

  $companyname = $_POST['companyname'];
  $companyname = addslashes($companyname);

  $email = $_POST['email'];
  $contact = $_POST['contact'];
  if ($contact == "") {
    $contact = "N/A";
  }
  $link = $_POST['link'];
  if ($link == "") {
    $link = "N/A";
  }



  $duration = $_POST['daterange'];
  $jobtype = $_POST['jobtype'];

  $location = $_POST['location'];
  $location = addslashes($location);

  $description = $_POST['description'];
  $description = addslashes($description);
  
    $minimumsalary = $_POST['minimumsalary'];
  $minimumsalary = addslashes($minimumsalary);

    $maximumsalary = $_POST['maximumsalary'];
  $maximumsalary = addslashes($maximumsalary);


  $qualification1 = "";
  foreach ($_POST['qualification'] as $qualification){
                if ($qualification != "") {  
                $qualification1 .= $qualification . ",,,";
                }
        }
  $qualification1 = addslashes($qualification1);



  $qualification1 = substr_replace($qualification1 ,"", -3);

  $specialization1 = "";
   foreach ($_POST['specialization'] as $specialization){
                $specialization1 .= $specialization . ", ";
        }

   $specialization1 = substr_replace($specialization1 ,"", -2);

   date_default_timezone_set('Asia/Manila');
  $jobpostdate= date("Y-m-d");
      $time = date('g:i a');


  $split = explode(' - ', $duration);  
  $startdate = $split[0];
  $enddate = $split[1];




  $result = mysqli_query($conn,"INSERT INTO jobpost (jobtitle,companyname,email,contact,link,startdate,enddate,jobtype,location,specialization,qualification,description,jobstatus,collegeuploaded,jobpostdate,jobposttime,minimumsalary,maximumsalary) values ('$jobtitle','$companyname','$email','$contact','$link','$startdate','$enddate','$jobtype','$location','$specialization1','$qualification1','$description','pending','admin','$jobpostdate','$time','$minimumsalary','$maximumsalary')");

  $result = mysqli_query($conn,"INSERT INTO aljobpost (jobtitle,companyname,email,contact,link,startdate,enddate,jobtype,location,specialization,qualification,description,jobstatus,collegeuploaded,jobpostdate,jobposttime,minimumsalary,maximumsalary) values ('$jobtitle','$companyname','$email','$contact','$link','$startdate','$enddate','$jobtype','$location','$specialization1','$qualification1','$description','upload','admin','$jobpostdate','$time','$minimumsalary','$maximumsalary')");

  if ($result) {
    $_SESSION['adminjobsuccess'] = "asdasdsa";
  header("Location: jobupload.php");
  }

 }











?>