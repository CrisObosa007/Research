<?php 
require "DataBase.php";
$response = array();
$db = new DataBase();
include 'dbconnect.php';

    if(isset($_POST['checkemail'])){
        $email = $_POST['email'];
        $check_email = "SELECT * FROM signup WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) == 0){
            // $code = rand(999999, 111111);

            // $result =mysqli_query($con,"INSERT INTO emailverification(email) values('$email')");


            // $insert_code = "UPDATE emailverification SET code = $code WHERE email = '$email' ";
            // $run_query =  mysqli_query($con, $insert_code);
            // if($run_query){
            // require "mail.php";

            // $subject = "Email Verification Code";
            //  $recipient = $email;   

            // include("email.php");


            //     $message = ob_get_contents();
            //     ob_get_clean();
            //       if(send_mail($recipient,$subject, $message)){
            //           $response['error'] = false; 
            //         $response['message'] = "We've sent an otp to your email";
            //     }else{ $response['error'] = true; 
            //     $response['message']= "Failed while sending code!";
            //     }
            // }else{ $response['error'] = true; 
            //     $response['message'] = "Something went wrong!";
            // }
        }else{ $response['error'] = true; 
                $response['message'] = "Email Already Used";
        }
    }else{ $response['error'] = true; 
                $response['message'] = "Please try again";
        }









//entercode
   // if(isset($_POST['checkresetotp'])){
   //      $otp_code =$_POST['otp'];
   //      $check_code = "SELECT * FROM emailverification WHERE code = $otp_code";
   //      $code_res = mysqli_query($con, $check_code);
   //      if(mysqli_num_rows($code_res) > 0){
   //          $fetch_data = mysqli_fetch_assoc($code_res);
   //          $response['error'] = false; 
   //          $response['message'] = "You can register now";
    
   //      }else{
   //           $response['error'] = true; 
   //           $response['message'] = "You've entered incorrect code!";
   //      }
   //  }







    echo    json_encode($response);
?>