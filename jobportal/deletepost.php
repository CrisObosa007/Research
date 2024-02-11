<?php
require "DataBase.php";
$response = array();
$db = new DataBase();

    include 'dbconnect.php';


    $idpost = $_POST['idpost'];


    $result=mysqli_query($conn,"UPDATE post set poststatus = 'deleted'  where id='$idpost'");


    $response['error'] = false; 
    $response['message'] = "Post Deleted";




    echo json_encode($response);
?>