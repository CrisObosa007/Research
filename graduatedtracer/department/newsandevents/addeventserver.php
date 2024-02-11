<?php 
session_start();
include '../dbhelper.php';



if(isset($_POST['submit'])){
  $college = $_POST['college'];
  $college = addslashes($college);

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





    




  }
  $allfiles = ", " . $allfiles;
  $allfiles = substr_replace($allfiles ,"", -2);
  
  





      
      $result = mysqli_query($conn,"INSERT INTO event (eventcollege,uploadedevent,eventdetail,startdate,starttime,enddate,endtime,venue,address,description,organizer,sponsor,eventimage,eventdate) values ('$college','$college','$eventdetail','$startdate','$starttime','$enddate','$endtime','$venue','$address','$description','$organizer1','$sponsor1','$allfiles','$eventdate')");


      $result = mysqli_query($conn,"INSERT INTO alevent (eventcollege,uploadedevent,eventdetail,startdate,starttime,enddate,endtime,venue,address,description,organizer,sponsor,eventimage,eventdate,time,status) values ('$college','$college','$eventdetail','$startdate','$starttime','$enddate','$endtime','$venue','$address','$description','$organizer1','$sponsor1','$allfiles','$eventdate','$time','uploaded')");




          require "../mail.php";
      $sql = "SELECT * FROM graduated where college like '%$college%' and eventnotification ='Yes' order by id DESC limit 3";
      $result = mysqli_query($conn,$sql);
      if ($result-> num_rows > 0 ){
        while ($row=mysqli_fetch_array($result)){
          $email = $row['email'];
          $firstname = $row['firstname'];
          $lastname = $row['lastname'];

          $subject = $firstname . " " .$lastname;


          
          $recipient = $email;   
             ob_start();
      include("eventemail.php");
      $message = ob_get_contents();
        ob_get_clean();

          if(send_mail($recipient,$subject, $message)){
            
          }
          

          



        }




}



















        $_SESSION['departmenteventsuccess'] = "asdasdsa";
        header("Location: addevents.php");
        


        





  }





?>