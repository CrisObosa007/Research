<?php
require "DataBase.php";
$response = array();
$db = new DataBase();
if (isset($_POST['idno'])){
include 'dbconnect.php';
    $employedvalue;
    $postgraduatevalue;
    $firstjobvalue;
    $firstjob4value;
    $idno = $_POST['idno'];



    $postgraduate = $_POST['postgraduate'];
    $postgraduatey1 = $_POST['postgraduatey1'];
    $postgraduatey2 = $_POST['postgraduatey2'];
    $employed = $_POST['employed'];
    $employedy1 = $_POST['employedy1'];
    $employedy2 = $_POST['employedy2'];
    $employedy3 = $_POST['employedy3'];
    $employedy4 = $_POST['employedy4'];
    $employedy5 = $_POST['employedy5'];
    $employedn1 = $_POST['employedn1'];
    $firstjob = $_POST['firstjob'];
    $firstjoby1 = $_POST['firstjoby1'];
    $firstjoby2 = $_POST['firstjoby2'];
    $firstjoby3 = $_POST['firstjoby3'];
    $firstjoby4 = $_POST['firstjoby4'];
    $firstjoby4y1 = $_POST['firstjoby4y1'];

    if ($postgraduate == "Yes" && $postgraduatey1 != "" && $postgraduatey2 != "") {
      $postgraduatevalue = "1";
      $postgraduatey1 = $_POST['postgraduatey1'];
      $postgraduatey2 = $_POST['postgraduatey2'];
    }
    if ($postgraduate == "No") {
      $postgraduatevalue = "1";
      $postgraduatey1 = "";
      $postgraduatey2 = "";
    }

    if ($employed == "Yes" && $employedy1 != "" && $employedy2 != ""&& $employedy3 != ""&& $employedy4 != ""&& $employedy5 != "") {
      $employedvalue = "1";
      $employedy1 = $_POST['employedy1'];
      $employedy2 = $_POST['employedy2'];
      $employedy3 = $_POST['employedy3'];
      $employedy4 = $_POST['employedy4'];
      $employedy5 = $_POST['employedy5'];
      $employedn1 = "";
    }
    if ($employed == "No" && $employedn1 != "") {
      $employedvalue = "1";
      $employedy1 = "";
      $employedy2 = "";
      $employedy3 = "";
      $employedy4 = "";
      $employedy5 = "";
      $employedn1 = $_POST['employedn1'];
    }

    if ($firstjob == "Yes" && $firstjoby1 != "" && $firstjoby2 != "" && $firstjoby3 != "" && $firstjoby4 != "") {
      $firstjobvalue = "1";
      $firstjoby1 = $_POST['firstjoby1'];
      $firstjoby2 = $_POST['firstjoby2'];
      $firstjoby3 = $_POST['firstjoby3'];
      $firstjoby4 = $_POST['firstjoby4'];

      if ($firstjoby4 == "Yes" && $firstjoby4y1 != "") {
        $firstjob4value = "1";
        $firstjoby4y1 = $_POST['firstjoby4y1'];
      }
      if ($firstjoby4 == "No") {
        $firstjob4value = "1";
        $firstjoby4y1 = "";
      }
    }
    if ($firstjob == "No") {
      $firstjobvalue = "1";
      $firstjob4value = "1";
    }


    if ($postgraduatevalue ==  "1" && $employedvalue == "1" && $firstjobvalue == "1"  && $firstjob4value == "1" && $civilstatus != "" && strlen($contact) == 11 && filter_var($email, FILTER_VALIDATE_EMAIL) && $specialization != "") {



         $result1=mysqli_query($conn,"UPDATE employment set postgraduate = '$postgraduate' , postgraduatey1 = '$postgraduatey1' , postgraduatey2 = '$postgraduatey2' , employed = '$employed' , employedy1 = '$employedy1' , employedy2 = '$employedy2' , employedy3 = '$employedy3' , employedy4 = '$employedy4' , employedy5 = '$employedy5' , employedn1 = '$employedn1' , firstjob = '$firstjob' , firstjoby1 = '$firstjoby1' , firstjoby2 = '$firstjoby2' , firstjoby3 = '$firstjoby3' , firstjoby4 = '$firstjoby4' , firstjoby4y1 = '$firstjoby4y1' , notification = '$notification' where idno='$idno'");


            $sql = "SELECT * FROM graduated INNER JOIN employment ON graduated.idno = employment.idno where graduated.idno ='$idno'";
            $result = mysqli_query($conn,$sql);
            $user = mysqli_fetch_array($result);
              
     $response['idno'] = $user['idno'];
     $response['password'] = $user['password'];
     $response['firstname'] = $user['firstname'];
     $response['middlename'] = $user['middlename'];
     $response['lastname'] = $user['lastname'];
     $response['yeargrad'] = $user['yeargrad'];
     $response['yeargrad1'] = $user['yeargrad1'];
     $response['college'] = $user['college'];
     $response['course'] = $user['course'];
     $response['course1'] = $user['course1'];
     $response['gender'] = $user['gender'];
     $response['birthdate'] = $user['birthdate'];
     $response['civilstatus'] = $user['civilstatus'];
     $response['contact'] = $user['contact'];
     $response['email'] = $user['email'];
     $response['specialization'] = $user['specialization'];
     $response['region'] = $user['region'];
     $response['province'] = $user['province'];
     $response['city'] = $user['city'];
     $response['barangay'] = $user['barangay'];
     $response['street'] = $user['street'];
     $response['graduatedimage'] =  $dblink."graduatedstudent/graduatedimage/".$user['graduatedimage'];
     $response['facebook'] = $user['facebook'];
     $response['instagram'] = $user['instagram'];
     $response['linkedin'] = $user['linkedin'];
     $response['bookmark'] = $user['bookmark'];

             // $response['graduatedimage'] =  "http://192.168.1.105/GraduatedTracer/GraduatedStudent/graduatedimage/".$user['graduatedimage'];
             // $response['graduatedimage'] =  "http://176.100.141.207/GraduatedTracer/GraduatedStudent/graduatedimage/".$user['graduatedimage'];
     $response['notification'] = $user['notification'];
     $response['newsnotification'] = $user['newsnotification'];
     $response['eventnotification'] = $user['eventnotification'];

            //employment
     $response['postgraduate'] = $user['postgraduate'];
     $response['postgraduatey1'] = $user['postgraduatey1'];
     $response['postgraduatey2'] = $user['postgraduatey2'];
     $response['employed'] = $user['employed'];
     $response['employedy1'] = $user['employedy1'];
     $response['employedy2'] = $user['employedy2'];
     $response['employedy3'] = $user['employedy3'];
     $response['employedy4'] = $user['employedy4'];
     $response['employedy5'] = $user['employedy5'];
     $response['employedn1'] = $user['employedn1'];
     $response['firstjob'] = $user['firstjob'];
     $response['firstjoby1'] = $user['firstjoby1'];
     $response['firstjoby2'] = $user['firstjoby2'];
     $response['firstjoby3'] = $user['firstjoby3'];
     $response['firstjoby4'] = $user['firstjoby4'];
     $response['firstjoby4y1'] = $user['firstjoby4y1'];
     $response['firstjoby5'] = $user['firstjoby5'];
     $response['firstjoby6'] = $user['firstjoby6'];
  










      
          $response['error'] = false; 
          $response['message'] = "Updated Success";
    }
    else{
        // $response['error'] = true; 
        // $response['message'] = "All Fields are required";
    }









   

} else{ 
      }
echo json_encode($response);
?>