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


    $spesplit = explode(', ', $specialization1);  
  for($i=0; $i<sizeof($spesplit); $i++){
    $querysplit = $spesplit[$i];

  }

  for($x = 15; $x >= $i; $x--){
    $spesplit[$x] = "asdasdsadsa";

  }







   date_default_timezone_set('Asia/Manila');
  $jobpostdate= date("Y-m-d");
      $time = date('g:i a');


  $split2 = explode(' - ', $duration);  
  $startdate = $split2[0];
  $enddate = $split2[1];


       require "../mail.php";
        $sql = "SELECT * FROM graduated where specialization like '%$spesplit[0]%' || specialization like '%$spesplit[1]%' || specialization like '%$spesplit[2]%' || specialization like '%$spesplit[3]%' || specialization like '%$spesplit[4]%' || specialization like '%$spesplit[5]%' || specialization like '%$spesplit[6]%' || specialization like '%$spesplit[7]%' || specialization like '% $spesplit[8]%' || specialization like '%$spesplit[9]%' || specialization like '%$spesplit[10]%' || specialization like '%$spesplit[11]%' ||specialization like '%$spesplit[12]%' || specialization like '%$spesplit[13]%' || specialization like '%$spesplit[14]%' || specialization like '%$spesplit[15]%' and notification = 'Yes' order by id DESC limit 3";
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




















  $result = mysqli_query($conn,"INSERT INTO jobpost (jobtitle,companyname,email,contact,link,startdate,enddate,jobtype,location,specialization,qualification,description,jobstatus,collegeuploaded,jobpostdate,jobposttime,minimumsalary,maximumsalary) values ('$jobtitle','$companyname','$email','$contact','$link','$startdate','$enddate','$jobtype','$location','$specialization1','$qualification1','$description','approved','guidance','$jobpostdate','$time','$minimumsalary','$maximumsalary')");

  $result = mysqli_query($conn,"INSERT INTO aljobpost (jobtitle,companyname,email,contact,link,startdate,enddate,jobtype,location,specialization,qualification,description,jobstatus,collegeuploaded,jobpostdate,jobposttime,minimumsalary,maximumsalary) values ('$jobtitle','$companyname','$email','$contact','$link','$startdate','$enddate','$jobtype','$location','$specialization1','$qualification1','$description','upload','guidance','$jobpostdate','$time','$minimumsalary','$maximumsalary')");

  if ($result) {
    $_SESSION['guidancejobsuccess'] = "asdasdsa";
  header("Location: jobupload.php");
  }

 }











?>