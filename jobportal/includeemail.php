<?php 


require "mail.php";
        if(send_mail($recipient,$subject, $message)){
          // $response['error'] = false; 
          // $response['message'] = "We've sent an otp to your email";
      }else{
      //  $response['error'] = true; 
      // $response['message']= "Failed while sending code!";
  }

?>