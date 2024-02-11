<?php 
require "DataBase.php";
$response = array();
$db = new DataBase();
include 'dbconnect.php';

if (isset($_POST['idno']) && isset($_POST['email'])&& isset($_POST['checkemail'])) {
      $email = mysqli_real_escape_string($con, $_POST['email']);
        $idno = mysqli_real_escape_string($con, $_POST['idno']);
        $check_email = "SELECT * FROM graduated WHERE email='$email' and idno ='$idno'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE graduated SET code = $code WHERE email = '$email' and idno ='$idno' ";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                require "mail.php";

        $subject ="Password Reset Code" ;
        $recipient = $email;   
        include("email.php");
        $message = ob_get_contents();
        ob_get_clean();

        if(send_mail($recipient,$subject, $message)){
            
 
        



                    $response['error'] = false; 
                    $response['message'] = "We've sent a password reset otp to your email";

                }else{
                    $response['error'] = true; 
                    $response['message'] = "Failed while sending code!";
                }
            }else{
                $response['error'] = true; 
                $response['message'] = "Something went wrong!";
            }
        }else{
            $response['error'] = true; 
            $response['message'] = "This Email and ID Number Doesn't match";
        }

}


//entercode
   if(isset($_POST['checkresetotp'])){
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM graduated WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $response['error'] = false; 
            $response['message'] = "Create a New Password.";
    
        }else{
             $response['error'] = true; 
             $response['message'] = "You've entered incorrect code!";
        }
    }

//confirm password
     if(isset($_POST['changepassword'])){
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
       
            $code = 0;
            $email = $_POST['email']; //getting this email using session
            $idno =  $_POST['idno'];; 
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE graduated SET code = $code, password = '$password' WHERE email = '$email' and idno ='$idno'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $response['error'] = false; 
                $response['message'] = "Your password changed. Now you can login with your new password.";
            }else{
                $response['error'] = true; 
                $response['message'] = "Failed to change your password!";
            }
        
    }



echo json_encode($response);
?>