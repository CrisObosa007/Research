<?php
session_start();
require "DataBase.php";
include 'dbconnect.php';
$response = array();
$db = new DataBase();


   date_default_timezone_set('Asia/Manila');
    $time = date('g:i a');
    $date= date("Y-m-d");
     
     $commentidno = $_POST['commentidno'];
          $commentpost = $_POST['commentpost'];
               $idpost = $_POST['idpost'];



     $result =mysqli_query($conn,"INSERT INTO comment(idno,comment,idpost,date,time) values('$commentidno','$commentpost','$idpost','$date','$time')");


          $sql = "SELECT * FROM post WHERE id='$idpost'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result);
            $commentcount = $row['commentcount'];
            $commentcount = $commentcount + 1;



          $result=mysqli_query($conn,"UPDATE post set commentcount = '$commentcount'  where id='$idpost'");



$idpost = $_POST['idpost'];

$stmt = $conn->prepare("SELECT comment.id,comment.idno, comment.idpost, comment.comment , comment.date, comment.time,graduated.graduatedimage,graduated.firstname,graduated.middlename,graduated.lastname  FROM comment join graduated on comment.idno = graduated.idno where comment.idpost = '$idpost'");

$stmt ->execute();
$stmt -> bind_result($id,$idno, $idpost,$comment ,$date, $time,$graduatedimage,$firstname,$middlename,$lastname);

$post = array();

while($stmt ->fetch()){

    $temp = array();

     $temp['id'] = $id;
     $temp['idno'] = $idno;
     $temp['idpost'] = $idpost;
     $temp['comment'] = $comment;
     $temp['date'] = $date;
     $temp['time'] = $time;
     $temp['img'] =   $dblink."graduatedstudent/graduatedimage/".$graduatedimage;
          $temp['firstname'] = $firstname;
               $temp['middlename'] = $middlename;
                    $temp['lastname'] = $lastname;
                    
    array_push($post,$temp);
}

echo json_encode($post);

?>
