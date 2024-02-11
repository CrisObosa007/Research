<?php 
require "DataBase.php";
$response = array();
$db = new DataBase();
include 'dbconnect.php';

$id = $_POST['id'];
$newviews = "";
  $sql = "SELECT * FROM jobpost where id = '$id'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $views = $row['views'];

  if ($views == "") {
      mysqli_query($conn,"UPDATE jobpost set views = '1'  where id = '$id'");
  }else{
   $newviews = $views + 1;
   mysqli_query($conn,"UPDATE jobpost set views = '$newviews'  where id ='$id'");
  }


   $response['error'] = false; 
    $response['message'] = "Change Password Success";
echo json_encode($response);
?>