<?php
include ('dbconnect.php');
require "DataBase.php";
$response = array();
$db = new DataBase();
// if (isset($_POST['lastname']) &&isset($_POST['firstname']) && isset($_POST['middlename']) && isset($_POST['gender']) && isset($_POST['birthdate']) &&  isset($_POST['civilstatus'])&& isset($_POST['idno'])&& isset($_POST['contact'])&& isset($_POST['email'])&& isset($_POST['skills'])&& isset($_POST['classification'])&& isset($_POST['yeargrad'])&& isset($_POST['course'])){
  $status = "";
  $course = ucwords(strtolower($_POST['course']));
  $lastname = ucwords(strtolower($_POST['lastname']));
  $firstname = ucwords(strtolower($_POST['firstname']));
  $middlename = ucwords(strtolower($_POST['middlename']));
   $gender = $_POST['gender'];
   $birthdate = $_POST['birthdate'];
   $civilstatus = $_POST['civilstatus'];

   $contact = $_POST['contact'];
   $email = $_POST['email'];
   $specialization = $_POST['skills'];
    $classification = "Alumni";
    $yeargrad = $_POST['yeargrad'];

   $region = ucwords(strtolower($_POST['region']));
   $province = ucwords(strtolower($_POST['province']));
   $city = ucwords(strtolower($_POST['city']));
   $barangay = ucwords(strtolower($_POST['barangay']));
   $street = ucwords(strtolower($_POST['house']));
   $status = "Approval";
   $idno = "";
   $idno = $yeargrad . "000001";

    $sql = "SELECT * FROM signup where idno like '%$yeargrad%' and LENGTH(idno) = 10 order by idno asc";
          $result = mysqli_query($conn,$sql);
          while ($row = mysqli_fetch_array($result)) { 
            $idno = $row['idno'] + 1;
       
          }
  $idno;

   date_default_timezone_set('Asia/Manila');
    $s = date('g:i a');
    $dateregister= date("Y-m-d");
    function password_generate($chars) {
        $data = 'ABCDEFGHIJKLNMOPQRSTUVWXYZ';
        return substr(str_shuffle($data), 0, $chars);
    }
    $password = password_generate(7);

        $result =mysqli_query($conn,"INSERT INTO signup(lastname,firstname,middlename,gender,birthdate,civilstatus,idno,contact,email,specialization,classification,yeargrad,course,region,province,city,barangay,street,password,status,dateregister) values('$lastname','$firstname','$middlename','$gender','$birthdate','$civilstatus','$idno','$contact','$email','$specialization','$classification','$yeargrad','$course','$region','$province','$city','$barangay','$street','$password','$status','$dateregister')");


    $response['error'] = false; 
    $response['message'] = "Registered Success";
      
  
echo json_encode($response);
?>