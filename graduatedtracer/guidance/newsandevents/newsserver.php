<?php 
session_start();
include '../dbhelper.php';



if(isset($_POST['removeinfo'])){
  $newsid = $_POST['newsid'];
    $sql = "SELECT * FROM news WHERE newsid='$newsid'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $newsdetail = $row['newsdetail'];
    $newsdetail = addslashes($newsdetail);


  $description = $row['description'];
    $description = addslashes($description);

    
  $newsimage = $row['newsimage'];


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
      $reasons1 = addslashes($reasons1);




    date_default_timezone_set('Asia/Manila');
   $time = date('g:i a');
   $newsdate= date("Y-m-d");


  

      $result = mysqli_query($conn,"INSERT INTO alnews (newscollege,newsdetail,description,newsimage,newsdate,newstime,newsstatus,reason) values ('guidance','$newsdetail','$description','$newsimage','$newsdate','$time','removed','$reasons1')");

        $result1 = mysqli_query($conn,"DELETE FROM news WHERE newsid='$newsid'");

  $_SESSION['canceledguidancenewssucess'] = "asdasdsa";
  header("Location: news.php");



}

?>