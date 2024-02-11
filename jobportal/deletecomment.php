<?php
require "DataBase.php";
$response = array();
$db = new DataBase();

include 'dbconnect.php';


$idcomment = $_POST['idcomment'];
$idpost = $_POST['idpost'];

$sql = "select * from post where id ='$idpost'";
$result = $conn-> query($sql);
while ($row=mysqli_fetch_array($result)){
  $commentcount = $row['commentcount'];
}
$commentcount = $commentcount - 1;

$result=mysqli_query($conn,"UPDATE post set commentcount = '$commentcount'  where id='$idpost'");


$result=mysqli_query($conn,"UPDATE comment set commentstatus = 'deleted'  where commentid='$idcomment'");


$response['error'] = false; 
$response['message'] = "Comment Deleted";




echo json_encode($response);
?>