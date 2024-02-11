<?php
require "DataBase.php";
include 'dbconnect.php';
require "mail.php";



if (isset($_POST['lastname']) &&isset($_POST['firstname']) && isset($_POST['middlename']) && isset($_POST['gender']) && isset($_POST['birthdate']) &&  isset($_POST['civilstatus'])&& isset($_POST['idno'])&& isset($_POST['contact'])&& isset($_POST['email'])&& isset($_POST['skills'])&& isset($_POST['classification'])&& isset($_POST['yeargrad'])&& isset($_POST['course'])){
  $status = "";
  $college = "";

  $codeverification = "1";

  $course = $_POST['course'];

  $sql = "select * from user where course = '$course'";
  $result = $conn-> query($sql);

  while ($row=mysqli_fetch_array($result)){
      $college = $row['college'];

  }

  $lastname = ucwords(strtolower($_POST['lastname']));
  $firstname = ucwords(strtolower($_POST['firstname']));
  $middlename = ucwords(strtolower($_POST['middlename']));
  $gender = $_POST['gender'];
  $birthdate = $_POST['birthdate'];
  $civilstatus = $_POST['civilstatus'];
  $idno = $_POST['idno'];
  $contact = $_POST['contact'];

  $specialization = $_POST['skills'];
  $classification = $_POST['classification'];
  $yeargrad = $_POST['yeargrad'];

  $region = ucwords(strtolower($_POST['region']));
  $province = ucwords(strtolower($_POST['province']));
  $city = ucwords(strtolower($_POST['city']));
  $barangay = ucwords(strtolower($_POST['barangay']));
  $street = ucwords(strtolower($_POST['house']));
  $email = $_POST['email'];
  $validationemail = "";

  $sql = "select * from signup";
  $result = $conn-> query($sql);

  while ($row=mysqli_fetch_array($result)){
    if ($email == $row['email']) {
        $validationemail = "asdasdasdasdasdas";
    }


}




if ($validationemail == "") {


    if ($classification == 'Graduating') {
        $status = 'Pending';
    }
    if ($classification == 'Alumni') {
        if ($idno == "") {
            $idno = "";
            $idno = $yeargrad . "000001";

            $sql = "SELECT * FROM signup where idno like '%$yeargrad%' and LENGTH(idno) = 10 order by idno asc";
            $result = mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_array($result)) { 
                $idno = $row['idno'] + 1;

            }
            $idno;

        }
        $status = 'Approval';
    }



    if(isset($_POST['checkemail'])){

       
        
       $code = rand(999999, 111111);

       $result =mysqli_query($con,"INSERT INTO emailverification(email) values('$email')");


       $insert_code = "UPDATE emailverification SET code = $code WHERE email = '$email' ";
       $run_query =  mysqli_query($con, $insert_code);
       if($run_query){

        $subject = "Email Verification Code";
        $recipient = $email;   

        include("email.php");
        $message = ob_get_contents();
        ob_get_clean();
        if(send_mail($recipient,$subject, $message)){
          $response['error'] = false; 
          $response['message'] = "We've sent an otp to your email";
      }else{ $response['error'] = true; 
      $response['message']= "Failed while sending code!";
  }
         // code...
  
}else{ $response['error'] = true; 
$response['message'] = "Something went wrong!";
}

}




}else{
    if(isset($_POST['checkresetotp'])){

    }else{
        $response['error'] = true; 
        $response['message'] = "Email Already Exist";

    }

}




}






if(isset($_POST['checkresetotp'])){
    $otp_code =$_POST['otp'];
    $check_code = "SELECT * FROM emailverification WHERE code = $otp_code";
    $code_res = mysqli_query($con, $check_code);
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);


        date_default_timezone_set('Asia/Manila');
        $s = date('g:i a');
        $dateregister= date("Y-m-d");
        function password_generate($chars) {
            $data = 'ABCDEFGHIJKLNMOPQRSTUVWXYZ';
            return substr(str_shuffle($data), 0, $chars);
        }
        $password = password_generate(7);

        if (!isset($_POST['sender'])) {
         $result =mysqli_query($conn,"INSERT INTO signup(lastname,firstname,middlename,gender,birthdate,civilstatus,idno,contact,email,specialization,classification,yeargrad,course,college,region,province,city,barangay,street,password,status,dateregister) values('$lastname','$firstname','$middlename','$gender','$birthdate','$civilstatus','$idno','$contact','$email','$specialization','$classification','$yeargrad','$course','$college','$region','$province','$city','$barangay','$street','$password','$status','$dateregister')");
     } 
     if (isset($_POST['sender'])) {
       $subject = $firstname . " " .$lastname. ", UCUAA Confirmed your Account" ;


       $recipient = $email;   

       include("registeremail.php");
       $message = ob_get_contents();
       ob_get_clean();

       if(send_mail($recipient,$subject, $message)){
           $codeverification++;
       }
   }


   
   

   $response['error'] = false; 
   $response['message'] = "Register Success";


}else{
   $response['error'] = true; 
   $response['message'] = "You've entered incorrect code!";
}
}

// $response = array();




echo json_encode($response);
?>