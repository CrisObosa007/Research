<?php 
session_start();
require "connection.php";

$email = "";
$name = "";
$errors = array();

//if user signup button
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO usertable (name, email, password, code, status)
        values('$name', '$email', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From: shahiprem7890@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}
    //if user click verification code submit button
if(isset($_POST['check'])){
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
    $code_res = mysqli_query($con, $check_code);
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $fetch_code = $fetch_data['code'];
        $email = $fetch_data['email'];
        $code = 0;
        $status = 'verified';
        $update_otp = "UPDATE usertable SET code = $code, status = '$status' WHERE code = $fetch_code";
        $update_res = mysqli_query($con, $update_otp);
        if($update_res){
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            header('location: home.php');
            exit();
        }else{
            $errors['otp-error'] = "Failed while updating code!";
        }
    }else{
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}

    //if user click login button
if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $check_email = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($con, $check_email);
    if(mysqli_num_rows($res) > 0){
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['password'];
        if(password_verify($password, $fetch_pass)){
            $_SESSION['email'] = $email;
            $status = $fetch['status'];
            if($status == 'verified'){
              $_SESSION['email'] = $email;
              $_SESSION['password'] = $password;
              header('location: home.php');
          }else{
            $info = "It's look like you haven't still verify your email - $email";
            $_SESSION['info'] = $info;
            header('location: user-otp.php');
        }
    }else{
        $errors['email'] = "Incorrect email or password!";
    }
}else{
    $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
}
}

    //auto sesson fill up


if (isset($_POST['send'])) {
    $_SESSION['send'] = "open";
    $_SESSION['lastname'] = $_POST['lastname'];
    $_SESSION['firstname'] = $_POST['firstname'];
    $_SESSION['middlename'] = $_POST['middlename'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['birthdate'] = $_POST['birthdate'];
    $_SESSION['civilstatus'] = $_POST['civilstatus'];
    $_SESSION['idno'] = $_POST['idno'];
    $_SESSION['contact'] = $_POST['contact'];
    $_SESSION['email'] = $_POST['email'];
    $specialization1 = "";
    $specialization = $_POST['specialization'];
    foreach ($_POST['specialization'] as $specialization){
        $specialization1 .= $specialization . ", ";
    }

    $specialization1 = substr_replace($specialization1 ,"", -2);

    $_SESSION['specialization'] = $specialization1;
    $_SESSION['classification'] = $_POST['classification'];
    $_SESSION['yeargraduated'] = $_POST['yeargraduated'];
    $_SESSION['course'] = $_POST['course'];
    $_SESSION['region1'] = $_POST['region1'];
    $_SESSION['province1'] = $_POST['province1'];
    $_SESSION['city1'] = $_POST['city1'];
    $_SESSION['barangay1'] = $_POST['barangay1'];
    $_SESSION['house'] = $_POST['house'];
}

    //if user click continue button in forgot password form
if(isset($_POST['send'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $check_email = "SELECT * FROM signup WHERE email='$email'";
    $run_sql = mysqli_query($con, $check_email);
    if(mysqli_num_rows($run_sql) == 0){
        $code = rand(999999, 111111);

        $result =mysqli_query($con,"INSERT INTO emailverification(email) values('$email')");


        $insert_code = "UPDATE emailverification SET code = $code WHERE email = '$email' ";
        $run_query =  mysqli_query($con, $insert_code);
        if($run_query){
            require "mail.php";

            $subject = "Email Verification Code";
            $recipient = $email;   

            include("email.php");


            $message = ob_get_contents();
            ob_get_clean();
            if(send_mail($recipient,$subject, $message)){
                $info = "We've sent an otp to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;

                header('location: email-code.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Something went wrong!";
        }
    }else{
        $errors['email'] = "Email Already Used";
    }
}

    //if user click check reset otp button
if(isset($_POST['check-reset-otp'])){
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM emailverification WHERE code = $otp_code";
    $code_res = mysqli_query($con, $check_code);
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);



        $lastname = $_SESSION['lastname'];
        $firstname = $_SESSION['firstname'];
        $middlename = $_SESSION['middlename'];
        $gender = $_SESSION['gender'];
        $birthdate = $_SESSION['birthdate'];
        $civilstatus = $_SESSION['civilstatus'];
        $idno = $_SESSION['idno'];
        $contact = $_SESSION['contact'];
        $email = $_SESSION['email'];
        $specialization = $_SESSION['specialization'];
        $classification = $_SESSION['classification'];

        $status = "";        
        if ($classification == 'Graduating') {
            $status = 'Pending';
        }
        if ($classification == 'Graduated') {
            $status = 'Approval';
        }
        $yeargrad = $_SESSION['yeargraduated'];
        $course = $_SESSION['course'];
        $region1 = $_SESSION['region1'];
        $province1 = $_SESSION['province1'];
        $city1 = $_SESSION['city1'];
        $barangay1 = $_SESSION['barangay1'];
        $house = $_SESSION['house'];


        $lastname = ucwords(strtolower($lastname));
        $firstname = ucwords(strtolower($firstname));
        $middlename = ucwords(strtolower($middlename));

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

          $sql = "select * from user where course = '$course'";
          $result = $conn-> query($sql);
                    
          while ($row=mysqli_fetch_array($result)){
          $college = $row['college'];

          }

        $region = ucwords(strtolower($region1));
        $province = ucwords(strtolower($province1));
        $city = ucwords(strtolower($city1));
        $barangay = ucwords(strtolower($barangay1));
        $street = ucwords(strtolower($house));




        $sql1 = "SELECT * FROM refregion where regCode = '$region'";
        $result1 = mysqli_query($conn,$sql1);
        $row1 = mysqli_fetch_array($result1);
        $region = $row1['regDesc'];

        $sql2 = "SELECT * FROM refprovince where provCode = '$province'";
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_array($result2);
        $province = $row2['provDesc'];

        $sql3 = "SELECT * FROM refcitymun where citymunCode = '$city'";
        $result3 = mysqli_query($conn,$sql3);
        $row3 = mysqli_fetch_array($result3);
        $city = $row3['citymunDesc'];

        $sql4 = "SELECT * FROM refbrgy where brgyCode = '$barangay'";
        $result4 = mysqli_query($conn,$sql4);
        $row4 = mysqli_fetch_array($result4);
        $barangay = $row4['brgyDesc'];



        date_default_timezone_set('Asia/Manila');
        $s = date('g:i a');
        $dateregister= date("Y-m-d");



        function password_generate($chars) {
            $data = 'ABCDEFGHIJKLNMOPQRSTUVWXYZ';
            return substr(str_shuffle($data), 0, $chars);
        }
        $password = password_generate(7);
        $result =mysqli_query($conn,"INSERT INTO signup(lastname,firstname,middlename,gender,birthdate,civilstatus,idno,contact,email,specialization,classification,yeargrad,course,college,region,province,city,barangay,street,password,status,dateregister) values('$lastname','$firstname','$middlename','$gender','$birthdate','$civilstatus','$idno','$contact','$email','$specialization','$classification','$yeargrad','$course','$college','$region','$province','$city','$barangay','$street','$password','$status','$dateregister')");




            $subject = $firstname . " " .$lastname. ", UCUAA Confirmed your Account" ;
               require "mail.php";


             $recipient = $email;   
             // $message = $code;
            include("registeremail.php");


                $message = ob_get_contents();
                ob_get_clean();
                  if(send_mail($recipient,$subject, $message)){
          
            }



        unset($_SESSION['send']);
        unset($_SESSION['email']);
        $_SESSION['success'] = "asdasdas";
        header("Location: index.php");

    }else{
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}

    //if user click change password button
if(isset($_POST['change-password'])){
    $_SESSION['info'] = "";
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Password doesn't matched!";
    }else{
        $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $idno = $_SESSION['idno']; 
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE graduated SET code = $code, password = '$password' WHERE email = '$email' and idno ='$idno'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $infosuccess = "Your password changed. Now you can login with your new password.";
                $_SESSION['infosuccess'] = $infosuccess;
                header('Location: index.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login-user.php');
    }
?>