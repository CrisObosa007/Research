<?php 
session_start();
include '../dbhelper.php';



if(isset($_POST['submit'])){

      $eventcourse1 = "";
   foreach ($_POST['eventcourse'] as $eventcourse){
                $eventcourse1 .= $eventcourse . ",,,";
  }
  
    $eventcourse1 = substr_replace($eventcourse1 ,"", -3);
  $eventcourse1 = addslashes($eventcourse1);

  $eventid = $_POST['eventid'];

  $eventdetail = $_POST['eventdetail'];
  $eventdetail = addslashes($eventdetail);

  $startdate = $_POST['startdate'];
  $daterange = $_POST['daterange'];
  $enddate = "";
  $starttime = $_POST['starttime'];
  $endtime = $_POST['endtime'];

  $eventday = $_POST['eventday'];

  if ($eventday == "2") {
    $split = explode(' - ', $daterange);  
    $startdate = $split[0];
    $enddate = $split[1];

  }

  
  $venue = $_POST['venue'];
  $venue = addslashes($venue);

  $address = $_POST['address'];
  $address = addslashes($address);

  $description = $_POST['description'];
  $description = addslashes($description);


  $organizer1 ='';
  foreach ($_POST['organizer'] as $organizer){
    if ($organizer != "") {  
      $organizer1 .= $organizer . ",,,";
    }
  }
  $organizer1 = substr_replace($organizer1 ,"", -3);
  $organizer1 = addslashes($organizer1);

  $sponsor1 ='';
  foreach ($_POST['sponsors'] as $sponsor){
    if ($sponsor != "") {  
      $sponsor1 .= $sponsor . ",,,";
    }
  }

  $sponsor1 = substr_replace($sponsor1 ,"", -3);
  $sponsor1 = addslashes($sponsor1);


  date_default_timezone_set('Asia/Manila');
  $time = date('g:i a');
  $eventdate= date("Y-m-d");









        $allfiles = "";
        $file = $_FILES['file'];

        $filecount = count($_FILES['file']['name']);


        for ($i=0; $i <$filecount ; $i++) { 
        $_FILES['file']['name'][$i];
        $fileName = $_FILES['file']['name'][$i];
        $fileTmpName = $_FILES['file']['tmp_name'][$i];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.' , $fileName);
        $fileActualExt = strtolower(end($fileExt));


      
   
              $fileNameNew = "news" . uniqid('', true).".".$fileActualExt;
              $fileDestination = '../../uploadimage/'.$fileNameNew;
              move_uploaded_file($fileTmpName, $fileDestination);
              $fileDestination;
              $allfiles .=  $fileNameNew.", ";
              $allfiles = ", " . $allfiles;
              
    
          


        }
     $allfiles = substr_replace($allfiles ,"", -2);




  if ($fileName == "") {
                     $result = mysqli_query($conn,"UPDATE event SET eventcollege = '$eventcourse1', eventdetail = '$eventdetail', startdate = '$startdate', starttime = '$starttime', enddate = '$enddate', venue = '$venue', address = '$address', description = '$description', organizer = '$organizer1', sponsor = '$sponsor1' where eventid='$eventid' ");

                    $sql = "SELECT * FROM event WHERE eventid='$eventid'";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result);
                    $eventimage = $row['eventimage'];


      $result1 = mysqli_query($conn,"INSERT INTO alevent (uploadedevent,eventcollege,eventdetail,startdate,starttime,enddate,endtime,venue,address,description,organizer,sponsor,eventimage,eventdate,time,status) values ('admin','$college','$eventdetail','$startdate','$starttime','$enddate','$endtime','$venue','$address','$description','$organizer1','$sponsor1','$eventimage','$eventdate','$time','update')");


        
              }else{
                                                           $result = mysqli_query($conn,"UPDATE event SET  eventcollege = '$eventcourse1', eventdetail = '$eventdetail', startdate = '$startdate', starttime = '$starttime', enddate = '$enddate', venue = '$venue', address = '$address', description = '$description', organizer = '$organizer1', sponsor = '$sponsor1', eventimage = '$allfiles' where eventid='$eventid' ");

      $result1 = mysqli_query($conn,"INSERT INTO alevent (uploadedevent,eventcollege,eventdetail,startdate,starttime,enddate,endtime,venue,address,description,organizer,sponsor,eventimage,eventdate,time,status) values ('admin','$eventcourse1','$eventdetail','$startdate','$starttime','$enddate','$endtime','$venue','$address','$description','$organizer1','$sponsor1','$allfiles','$eventdate','$time','update')");
  
              }














        $_SESSION['adminditeventsuccess'] = "asdasdsa";
        header("Location: editevent.php");








}





?>