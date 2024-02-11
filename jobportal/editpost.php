<?php
require "DataBase.php";
$response = array();
$db = new DataBase();

    include 'dbconnect.php';


    $post = $_POST['post'];
     $idpost = $_POST['idpost'];


    $result=mysqli_query($conn,"UPDATE post set post = '$post'  where id='$idpost'");


    $response['error'] = false; 
    $response['message'] = "Edit Post Success";










    echo json_encode($response);
?>