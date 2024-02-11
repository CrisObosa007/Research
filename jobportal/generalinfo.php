<?php
require "DataBase.php";
$response = array();
$db = new DataBase();

include 'dbconnect.php';

$idno = $_POST['idno'];
$facebook = $_POST['facebook'];
$instagram = $_POST['instagram'];
$linkedin = $_POST['linkedin'];
$notification = $_POST['notificationjob'];
if ($notification == "") {
  $notification = "No";
}
$notificationnews = $_POST['notificationnews'];
if ($notificationnews == "") {
  $notificationnews = "No";
}
$notificationevent = $_POST['notificationevent'];
if ($notificationevent == "") {
  $notificationevent = "No";
}

$civilstatus = $_POST['civilstatus'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$specialization = $_POST['skills'];




$result=mysqli_query($conn,"UPDATE graduated set civilstatus = '$civilstatus' , notification = '$notification', newsnotification = '$notificationnews', eventnotification = '$notificationevent' ,contact = '$contact' , email = '$email' , specialization = '$specialization', facebook = '$facebook', instagram = '$instagram', linkedin = '$linkedin'  where idno='$idno'");


$result1=mysqli_query($conn,"UPDATE employment set notification = '$notification' where idno='$idno'");


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


echo json_encode($response);
?>