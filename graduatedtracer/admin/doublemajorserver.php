<?php 
session_start();
include 'dbhelper.php';

if (isset($_POST['send'])) {


$newcourse = "";
$newcollege = "";
$newyeargraduated = "";
$newycollege;
$idno = $_POST['idno'];
$course = $_POST['course'];
$yeargraduated = $_POST['yeargraduated'];
$oldyeargraduated = $_POST['oldyeargraduated'];
$oldcollege = $_POST['oldcollege'];


   $sql = "SELECT * FROM user where course = '$course'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);
      $college = $row['college'];

$newcollege = $oldcollege . ", " . $college;


$result=mysqli_query($conn,"UPDATE graduated set course1='$course', college='$newcollege', yeargrad1='$yeargraduated'  where idno='$idno'");
$result=mysqli_query($conn,"UPDATE employment set empcourse1='$course', empcollege='$newcollege'  where idno='$idno'");
   $_SESSION['douublemajor'] = 'sdadsadas';
   header("Location: graduatedinfo.php");
}

?>
