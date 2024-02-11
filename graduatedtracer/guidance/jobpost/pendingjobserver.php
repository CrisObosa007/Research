<?php 
session_start();
include '../dbhelper.php';
  require "../mail.php";
if(isset($_POST['submitjob'])){
  $id = $_POST['id'];


  $sql = "SELECT * FROM jobpost WHERE id='$id'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $jobtitle = $row['jobtitle'];
  $companyname = $row['companyname'];
  $email = $row['email'];
  $contact = $row['contact'];
  $jobtype = $row['jobtype'];
  $location = $row['location'];
  $skill = $row['specialization'];
  $link = $row['link'];
    $collegeuploaded = $row['collegeuploaded'];
  $qualification = $row['qualification'];
  $qualification = addslashes($qualification);
  $description = $row['description'];
  $description = addslashes($description);
  $startdate = $row['startdate'];
  $enddate = $row['enddate'];
  $jobpostdate = $row['jobpostdate'];

  $minimumsalary = $row['minimumsalary'];
  $minimumsalary = addslashes($minimumsalary);

  $maximumsalary =$row['maximumsalary'];
  $maximumsalary = addslashes($maximumsalary);


  date_default_timezone_set('Asia/Manila');
  $jobpostdate= date("Y-m-d");
  $time = date('g:i a');




  $result = mysqli_query($conn,"INSERT INTO aljobpost (jobtitle,companyname,email,contact,link,startdate,enddate,jobtype,location,specialization,qualification,description,jobstatus,collegeuploaded,jobpostdate,jobposttime,minimumsalary,maximumsalary) values ('$jobtitle','$companyname','$email','$contact','$link','$startdate','$enddate','$jobtype','$location','$skill','$qualification','$description','upload','guidance','$jobpostdate','$time','$minimumsalary','$maximumsalary')");









  
  $specialization1 = $_POST['specialization'];
  $spesplit = explode(', ', $specialization1);  
  for($i=0; $i<sizeof($spesplit); $i++){
    $querysplit = $spesplit[$i];

  }

  for($x = 15; $x >= $i; $x--){
    $spesplit[$x] = "asdasdsadsa";

  }


  $sql = "SELECT * FROM graduated where specialization like '%$spesplit[0]%' || specialization like '%$spesplit[1]%' || specialization like '%$spesplit[2]%' || specialization like '%$spesplit[3]%' || specialization like '%$spesplit[4]%' || specialization like '%$spesplit[5]%' || specialization like '%$spesplit[6]%' || specialization like '%$spesplit[7]%' || specialization like '% $spesplit[8]%' || specialization like '%$spesplit[9]%' || specialization like '%$spesplit[10]%' || specialization like '%$spesplit[11]%' ||specialization like '%$spesplit[12]%' || specialization like '%$spesplit[13]%' || specialization like '%$spesplit[14]%' || specialization like '%$spesplit[15]%' and notification = 'Yes' order by id DESC limit 3 ";
  $result = $conn-> query($sql);
  if ($result-> num_rows > 0 ){
    while ($row=mysqli_fetch_array($result)){
     $email = $row['email'];
     $firstname = $row['firstname'];
     $lastname = $row['lastname'];

     $subject = $firstname . " " .$lastname ;




     $recipient = $email;   
     ob_start();
     include("email.php");
     $message = ob_get_contents();
     ob_get_clean();

     if(send_mail($recipient,$subject, $message)){

     }



   }



 }

  $sql1 = "SELECT * FROM college WHERE college='$collegeuploaded'";
  $result1 = mysqli_query($conn,$sql1);
  $row1 = mysqli_fetch_array($result1);
  $emailuploaded = $row1['email'];
  $collegename = $row1['college'];

  $subject = $collegename ;
  $recipient = $emailuploaded;   
  ob_start();
  include("emailapproved.php");
  $message = ob_get_contents();
  ob_get_clean();

  if(send_mail($recipient,$subject, $message)){

  }






 $result=mysqli_query($conn,"UPDATE jobpost set jobstatus='Approved' where id='$id'");
 if ($result) {
  $_SESSION['guidancependingsuccess'] = "///";        
  header("Location: pendingjob.php");
}

}



if(isset($_POST['rejectjob'])){

  $id = $_POST['jobid'];


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









  $sql = "SELECT * FROM jobpost WHERE id='$id'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $jobtitle = $row['jobtitle'];
        $jobtitle = addslashes($jobtitle);
  $companyname = $row['companyname'];
        $companyname = addslashes($companyname);
  $email = $row['email'];
  $contact = $row['contact'];
  $jobtype = $row['jobtype'];
  $location = $row['location'];
      $location = addslashes($location);
  $skill = $row['specialization'];
    $skill = addslashes($skill);
  $link = $row['link'];
  $qualification = $row['qualification'];
    $qualification = addslashes($qualification);
  $description = $row['description'];
  $description = addslashes($description);
  $collegeuploaded = $row['collegeuploaded'];
  $startdate = $row['startdate'];
  $enddate = $row['enddate'];
  $jobpostdate = $row['jobpostdate'];

  date_default_timezone_set('Asia/Manila');
  $jobpostdate= date("Y-m-d");
  $time = date('g:i a');




  $result1 = mysqli_query($conn,"INSERT INTO aljobpost (jobtitle,companyname,email,contact,link,startdate,enddate,jobtype,location,specialization,qualification,description,jobstatus,reason,collegeuploaded,jobpostdate,jobposttime) values ('$jobtitle','$companyname','$email','$contact','$link','$startdate','$enddate','$jobtype','$location','$skill','$qualification','$description','disapproved','$reasons1','guidance','$jobpostdate','$time')");

  if ($collegeuploaded == "admin") {
  $sql1 = "SELECT * FROM college WHERE username='admin'";
  $result1 = mysqli_query($conn,$sql1);
  $row1 = mysqli_fetch_array($result1);
  $notificationcount = $row1['notification'];
  $notificationcount++;
  $result=mysqli_query($conn,"UPDATE college set notification='$notificationcount' where username='admin'");
    // code...
  }else{
      $sql1 = "SELECT * FROM college WHERE college='$collegeuploaded'";
  $result1 = mysqli_query($conn,$sql1);
  $row1 = mysqli_fetch_array($result1);
  $notificationcount = $row1['notification'];
  $notificationcount++;
  $result=mysqli_query($conn,"UPDATE college set notification='$notificationcount' where college='$collegeuploaded'");
  }






  $result=mysqli_query($conn,"UPDATE jobpost set jobstatus='disapproved',reason ='$reasons1' where id='$id'");
  if ($result) {
    $_SESSION['guidancependingdelete'] = "///";        
    header("Location: pendingjob.php");
  }
}




?>