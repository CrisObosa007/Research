<?php 
require "DataBase.php";
$response = array();
$db = new DataBase();
include ('dbconnect.php');


   $idpost = $_POST['idpost'];
   $idno = $_POST['idno'];

   $sql = "SELECT * from post where id = '$idpost'";
   $result = mysqli_query($conn,$sql);
   $row = mysqli_fetch_array($result);


   $reactcount  = $row['reactcount'];


   $reactcount = $reactcount . ", " . $idno;


   $resultinterested=mysqli_query($conn,"UPDATE post set reactcount='$reactcount' where id='$idpost'");

    $response['error'] = false; 
    $response['message'] = "React Success";


echo json_encode($response);
?>