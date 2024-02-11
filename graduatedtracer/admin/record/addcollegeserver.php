<?php 
session_start();
include '../dbhelper.php';

  require "../mail.php";

if(isset($_POST['submit'])){
 $college = $_POST['college'];

 if ($college != "other") {
   $coursename = $_POST['coursename'];
   $result = mysqli_query($conn,"INSERT INTO user (college,course) values ('$college','$coursename')");
 }
 if ($college == "other") {
   $college = $_POST['collegename1'];
   $coursename1 = $_POST['coursename1'];
   $username = $_POST['username'];
   $username = strtoupper($username);
   $contact = $_POST['contact'];
   $email = $_POST['email'];


   function password_generate($chars) {
    $data = 'ABCDEFGHIJKLNMOPQRSTUVWXYZ';
    return substr(str_shuffle($data), 0, $chars);
  }
  $password = password_generate(7);



  $file = $_FILES['file'];
  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  $fileExt = explode('.' , $fileName);
  $fileActualExt = strtolower(end($fileExt));


  $allowed = array('jpg', 'jpeg', 'png', 'pdf');

  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0 ) {
      if ($fileSize < 100000000) {
        $fileNameNew = "profile" . uniqid('', true).".".$fileActualExt;
        $fileDestination = '../../department/assets/img/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
        $fileDestination;



        $result = mysqli_query($conn,"INSERT INTO college (college,username,contact,email,userpassword,image) values ('$college','$username','$contact','$email','$password','$fileNameNew')");

        $result = mysqli_query($conn,"INSERT INTO user (college,course) values ('$college','$coursename1')");


      }


    }
}


     $subject = "Hello " . $college ;



      $recipient = $email;  
       ob_start();
      include("addcollegeemail.php");
      $message = ob_get_contents();
        ob_get_clean();

      if(send_mail($recipient,$subject, $message)){

      }










}


      $_SESSION['adminrecordsuccess'] = "asdasdsa";
      header("Location: addcollege.php");

    }
  ?>