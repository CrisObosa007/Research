<?php
session_start();
require "DataBase.php";
include 'dbconnect.php';
$response = array();
$db = new DataBase();


$idpost = $_POST['idpost'];


$sql = "SELECT post.id,post.idno,post.post,post.year,graduated.graduatedimage, post.date, post.time,graduated.firstname,graduated.middlename,graduated.lastname FROM post join graduated on post.idno = graduated.idno where post.id='$idpost'";
$result = mysqli_query($conn,$sql);
$user = mysqli_fetch_array($result);


$response['idpost'] = $user['id'];
$response['postidno'] = $user['idno'];
$response['postpost'] = $user['post'];
$response['postyear'] = $user['year'];
$response['postgraduatedimage'] =$dblink."graduatedstudent/graduatedimage/".$user['graduatedimage'];
$response['postdate'] = $user['date'];
$response['posttime'] = $user['time'];
$response['postfirstname'] = $user['firstname'];
$response['postmiddlename'] = $user['middlename'];
$response['postlastname'] = $user['lastname'];


$response['error'] = false; 
$response['message'] = "Login Successful "; 





echo json_encode($response);

?>