<?php 
session_start();
include 'dbhelper.php';
$idno = $_SESSION['idno'];
date_default_timezone_set('Asia/Manila');
$time = date('g:i a');
$date= date("Y-m-d");


if (isset($_POST['submitemployment'])) {



  $employed = $_POST['employed'];

  if ($employed == "Yes") {
    $employedy1 = $_POST['employedy1'];
    $employedy2 = $_POST['employedy2'];
    $employedy3 = $_POST['employedy3'];
    $employedy4 = $_POST['employedy4'];
    $employedy5 = $_POST['employedy5'];
    $employedn1 = "";
  }
  if ($employed == "No") {
    $employedy1 = "";
    $employedy2 = "";
    $employedy3 = "";
    $employedy4 = "";
    $employedy5 = "";
    $employedn1 = $_POST['employedn1'];
  }




  


  $result1=mysqli_query($conn,"UPDATE employment set employed = '$employed' , employedy1 = '$employedy1' , employedy2 = '$employedy2' , employedy3 = '$employedy3' , employedy4 = '$employedy4' , employedy5 = '$employedy5' , employedn1 = '$employedn1' where idno='$idno'");


  $result =mysqli_query($conn,"INSERT INTO alemployment(idno,employed,employedy1,employedy2,employedy3,employedy4,employedy5,employedn1,time,date) values('$idno','$employed','$employedy1','$employedy2','$employedy3','$employedy4','$employedy5','$employedn1','$time','$date')");



  $result =mysqli_query($conn,"INSERT INTO alumniupdate(idno,action,time,date) values('$idno','Employment Data','$time','$date')");


       $_SESSION['success'] = 'sdadsadas';
      header("Location: profile.php");
    
  

}




?>

<?php
if (isset($_POST['submitfirstjob'])) {





  $firstjob = $_POST['firstjob'];


  if ($firstjob == "Yes") {
    $firstjoby1 = $_POST['firstjoby1'];

    $firstjoby21 = "";
    foreach ($_POST['firstjoby2'] as $firstjoby2){
      $firstjoby21 .= $firstjoby2 . ", ";
    }

    $firstjoby21 = substr_replace($firstjoby21 ,"", -2);

    $firstjoby3 = $_POST['firstjoby3'];
    $firstjoby4 = $_POST['firstjoby4'];

    if ($firstjoby4 == 'Yes') {
      $firstjoby4y11 = "";
      foreach ($_POST['firstjoby4y1'] as $firstjoby4y1){
        $firstjoby4y11 .= $firstjoby4y1 . ", ";
      }

      $firstjoby4y11 = substr_replace($firstjoby4y11 ,"", -2);
    }

    if ($firstjoby4 == "No") {
     $firstjoby4y11 = "";
   }



   $firstjoby5 = $_POST['firstjoby5'];
   $firstjoby6 = $_POST['firstjoby6'];       
 }


 if ($firstjob == "No") {
  $firstjoby1 = "";
  $firstjoby21 = "";
  $firstjoby3 = "";
  $firstjoby4 = "";
  $firstjoby4y11 = "";
  $firstjoby5 = "";
  $firstjoby6 = "";
}





$result=mysqli_query($conn,"UPDATE employment set firstjob = '$firstjob' , firstjoby1 = '$firstjoby1' , firstjoby2 = '$firstjoby21' , firstjoby3 = '$firstjoby3' , firstjoby4 = '$firstjoby4' , firstjoby4y1 = '$firstjoby4y11' , firstjoby5 = '$firstjoby5' , firstjoby6 = '$firstjoby6' where idno='$idno'");













$result =mysqli_query($conn,"INSERT INTO alfirstjob(idno,firstjob,firstjoby1,firstjoby2,firstjoby3,firstjoby4,firstjoby4y1,firstjoby5,firstjoby6,time,date) values('$idno','$firstjob','$firstjoby1','$firstjoby21','$firstjoby3','$firstjoby4','$firstjoby4y11','$firstjoby5','$firstjoby6','$time','$date')");


$result =mysqli_query($conn,"INSERT INTO alumniupdate(idno,action,time,date) values('$idno','First Job','$time','$date')");




$_SESSION['success'] = 'sdadsadas';
header("Location: profile.php");




}
?>









<?php
if (isset($_POST['submit'])) {

  $civilstatus = $_POST['civilstatus'];
  $contact = $_POST['contact'];
  $email = $_POST['email'];
    $facebook = $_POST['facebook'];
      $instagram = $_POST['instagram'];
           $linkedin = $_POST['linkedin'];
  $notification = $_POST['toggle1'];
  if ($notification == "") {
    $notification = "No";
  }
  $newsnotification = $_POST['toggle2'];
  if ($newsnotification == "") {
    $newsnotification = "No";
  }
  $eventnotification = $_POST['toggle3'];
  if ($eventnotification == "") {
    $eventnotification = "No";
  }

  $specialization1 = "";
  foreach ($_POST['specialization'] as $specialization){
    $specialization1 .= $specialization . ", ";
  }

  $specialization1 = substr_replace($specialization1 ,"", -2);


  $result=mysqli_query($conn,"UPDATE graduated set civilstatus = '$civilstatus' , notification = '$notification' , newsnotification = '$newsnotification' , eventnotification = '$eventnotification' ,contact = '$contact' , email = '$email' , specialization = '$specialization1' , facebook = '$facebook' , instagram = '$instagram', linkedin = '$linkedin'   where idno='$idno'");

  $result1=mysqli_query($conn,"UPDATE employment set  notification = '$notification' where idno='$idno'");




  $result =mysqli_query($conn,"INSERT INTO algeneralinfo(civilstatus,idno,contact,email,skill,facebook,instagram,linkedin,time,date) values('$civilstatus','$idno','$contact','$email','$specialization1','$facebook','$instagram','$linkedin','$time','$date')");


  $result =mysqli_query($conn,"INSERT INTO alumniupdate(idno,action,time,date) values('$idno','General Info','$time','$date')");




  $_SESSION['success'] = 'sdadsadas';
  header("Location: profile.php");

  



}
?>





<?php
if (isset($_POST['submitadvancestudy'])) {



  $postgraduate = $_POST['postgraduate'];

  if ($postgraduate == "Yes") {
    $postgraduatey1 = $_POST['postgraduatey1'];
    $postgraduatey2 = $_POST['postgraduatey2'];
  }
  if ($postgraduate == "No") {
    $postgraduatey1 = "";
    $postgraduatey2 = "";
  }



  $result1=mysqli_query($conn,"UPDATE employment set postgraduate = '$postgraduate' , postgraduatey1 = '$postgraduatey1' , postgraduatey2 = '$postgraduatey2'   where idno='$idno'");



  $result =mysqli_query($conn,"INSERT INTO aladvancestudy(idno,postgraduate,postgraduatey1,postgraduatey2,time,date) values('$idno','$postgraduate','$postgraduatey1','$postgraduatey2','$time','$date')");


  $result =mysqli_query($conn,"INSERT INTO alumniupdate(idno,action,time,date) values('$idno','Adavance Study','$time','$date')");




  $_SESSION['success'] = 'sdadsadas';
  header("Location: profile.php");

  



}
?>


<?php 




if (isset($_POST['passwordsubmit'])) {
  $newpassword = $_POST['newpassword'];
  $result=mysqli_query($conn,"UPDATE graduated set password='$newpassword' where idno='$idno'");
  if ($result) {
    $_SESSION['passwordsuccess'] = 'sdadsadas';
    header("Location: profile.php");
  }
  
}



?>
<?php 
if (isset($_POST['submitprofile'])) {

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
        $fileNameNew = "graduated" . uniqid('', true).".".$fileActualExt;
        $fileDestination = '../graduatedimage/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
        $fileDestination;

        $result = mysqli_query($conn,"UPDATE graduated set graduatedimage='$fileNameNew' where idno='$idno'");
        if ($result) {
         $_SESSION['profilesuccess'] = 'sdadsadas';
         header("Location: profile.php");
       }



     }else{
      echo "Your file is too big!!!";
    }
  }else {
    echo "There was an error uploading your file!!!";
  }
}else{
  echo "You cannot upload file of this type!!!";
}
}


?>