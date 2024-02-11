<?php 
require "DataBase.php";
$response = array();
$db = new DataBase();
include ('dbconnect.php');


$idpost = $_POST['idpost'];
$idno = $_POST['idno'];
$rereactcount = "";

$sql = "SELECT * from post where id = '$idpost'";
$result = mysqli_query($conn,$sql);
if ($result-> num_rows > 0 ){
   while ($row=mysqli_fetch_array($result)){
   $reactcount = $row['reactcount'];

    $spesplitreactcount = explode(', ', $reactcount);  
    for($i=1; $i<sizeof($spesplitreactcount); $i++){
         if ($spesplitreactcount[$i] != $idno) {
            $rereactcount = $rereactcount . ", " . $spesplitreactcount[$i];
         }

    }

 }
}





$resultinterested=mysqli_query($conn,"UPDATE post set reactcount='$rereactcount' where id='$idpost'");



$response['error'] = false; 
$response['message'] = "Unsaved";





echo json_encode($response);
?>