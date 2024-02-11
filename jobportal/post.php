<?php
require "DataBase.php";
$response = array();
$db = new DataBase();

    include 'dbconnect.php';

   date_default_timezone_set('Asia/Manila');
    $time = date('g:i a');
    $date= date("Y-m-d");
    $reactcount = "";
    $commentcount = "0";
    $idno = $_POST['idno'];
    $post = $_POST['post'];
    $year = $_POST['yearall'];



    $result = mysqli_query($conn,"INSERT INTO post (idno,post,year,date,time,reactcount,commentcount) values ('$idno','$post','$year','$date','$time','$reactcount','$commentcount')");



    $response['error'] = false; 
    $response['message'] = "Post Success";










    echo json_encode($response);
?>