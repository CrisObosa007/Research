<?php 
require "DataBase.php";
$response = array();
$db = new DataBase();
include ('dbconnect.php');

if (isset($_POST['idno']) && isset($_POST['eventid'])) {


   $eventid = $_POST['eventid'];
   $interested = $_POST['interested'];
   $notinterested = $_POST['notinterested'];
   $idno = $_POST['idno'];

   $sql = "SELECT * from event where eventid = '$eventid'";
   $result = mysqli_query($conn,$sql);
   $row = mysqli_fetch_array($result);
   $oldinterested  = $row['interested'];
   $oldnotinterested  = $row['notinterested'];

    $oldinterestedresult = ""; 
    $splitoldinterested = explode(',', $oldinterested);  
    for($i=0; $i<sizeof($splitoldinterested); $i++){
      if ($idno != $splitoldinterested[$i] && $splitoldinterested[$i] !="") {
         $oldinterestedresult .= ",".$splitoldinterested[$i].",";
      }
   
    }
    $oldnotinterestedresult = ""; 
    $splitoldnotinterested = explode(',', $oldnotinterested);  
    for($i=0; $i<sizeof($splitoldnotinterested); $i++){
      if ($idno != $splitoldnotinterested[$i] && $splitoldnotinterested[$i] != "") {
         $oldnotinterestedresult .= ",".$splitoldnotinterested[$i].",";
      }
   
    }

    $oldnotinterestedresult .= $idno.",";



   $resultinterested=mysqli_query($conn,"UPDATE event set interested='$oldinterestedresult' where eventid='$eventid'");
   $resultnotinterested=mysqli_query($conn,"UPDATE event set notinterested='$oldnotinterestedresult' where eventid='$eventid'");



	$response['error'] = false; 
    $response['message'] = "Voted Success";
}




echo json_encode($response);
?>