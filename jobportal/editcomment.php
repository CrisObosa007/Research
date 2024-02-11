<?php
require "DataBase.php";
$response = array();
$db = new DataBase();

    include 'dbconnect.php';


    $comment = $_POST['comment'];
     $commentid = $_POST['commentid'];


    $result=mysqli_query($conn,"UPDATE comment set comment = '$comment'  where commentid='$commentid'");


    $response['error'] = false; 
    $response['message'] = "Edit Comment Success";




    echo json_encode($response);
?>