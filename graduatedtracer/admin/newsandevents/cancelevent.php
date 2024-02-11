<?php 
session_start();
include '../dbhelper.php';

if(isset($_POST['cancelinfo'])){
  $eventid = $_POST['eventid'];

  $sql = "SELECT * FROM event WHERE eventid='$eventid'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $eventcollege = $row['eventcollege'];
  $eventdetail = $row['eventdetail'];
  $description = $row['description'];
  $eventimage = $row['eventimage'];
  $startdate = $row['startdate'];
  $enddate = $row['enddate'];
  $starttime = $row['starttime'];
  $endtime = $row['endtime'];
  $eventtype = $row['eventtype'];
  $address = $row['address'];
  $venue = $row['venue'];
  $organizer = $row['organizer'];
  $sponsor = $row['sponsor'];


  date_default_timezone_set('Asia/Manila');
  $eventdate= date("Y-m-d");
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





  $result = mysqli_query($conn,"DELETE FROM event WHERE eventid='$eventid'");




  $result1 = mysqli_query($conn,"INSERT INTO alevent (uploadedevent,eventcollege,eventdetail,startdate,starttime,enddate,endtime,venue,address,description,eventtype,organizer,sponsor,eventimage,eventdate,time,status,reason) values ('admin','$eventcollege','$eventdetail','$startdate','$starttime','$enddate','$endtime','$venue','$address','$description','$eventtype','$organizer','$sponsor','$eventimage','$eventdate','$time','cancelled','$reasons1')");
  


  if ($result1) {
    $_SESSION['canceladminevent'] = "asdasdsa";
    header("Location: events.php");
  }

}











?>