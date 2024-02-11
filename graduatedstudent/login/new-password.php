<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forget Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="images/ucu.png"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<!--===============================================================================================-->
</head>
<style type="text/css">
    .button:hover{
        background-color: #0E658D !important;
    }
</style>
<style type="text/css">
    #loading {
  position: fixed;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  opacity: 0.7;
  background-color: #fff;
  z-index: 99;
}

#loading-image {
  z-index: 100;
  width: 140px;
}
</style>
<body>
<div id="loading">
    <img id="loading-image" src="images/loading.gif" alt="Loading..." />
</div>
    
    <div class="limiter">
        <div class="container-login100" style="background-color: #0c506f;">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-20 p-b-20" align="center">
                <form class="login100-form validate-form"action="new-password.php" method="POST" autocomplete="off">
                    <span class=" p-b-20" style="font-weight: 700;width: 100%;font-size: 30px;">
                        New Password
                    </span>
                    <span class="login100-form-title p-b-0 p-t-10" style="font-size: 17px;">
                  
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                                ?>

                            <style type="text/css">
                                .alert-success{
                                    display: none;
                                }
                            </style>
                            <?php 
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    </span>

                    <div class="wrap-input100 validate-input m-b-10 m-t-10">
                         <input class="form-control"  type="password" name="password" id="password" placeholder="Create new password" required minlength="8" style="padding-right: 40px;">
                         <i class="bi fa-eye-slash  fa fa-eye" id="toggleolduserpassword" style="margin-right:10px;float: right;margin-top: -25px;color: #686868;"></i>
                    </div>

                    <script type="text/javascript">
                    //first password
                    const togglePassword = document.querySelector('#toggleolduserpassword');
                    const password = document.querySelector('#password'); 
                    togglePassword.addEventListener('click', function (e) {
                    // toggle the type attribute
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);
                    // toggle the eye / eye slash icon
                    this.classList.toggle('fa-eye-slash');
                    });
                    </script>
                    <div class="wrap-input100 validate-input m-b-23">
                         <input class="form-control" type="password" name="cpassword" id="cpassword" placeholder="Confirm your password" required style='padding: 0px 10px 0px 10px;'>
                         <i class="bi fa-eye-slash  fa fa-eye" id="toggleolduserpassword2" style="margin-right:10px;float: right;margin-top: -25px;color: #686868;"></i>
                    </div>
                    <script type="text/javascript">
                    //first password
                    const togglePassword2 = document.querySelector('#toggleolduserpassword2');
                    const password2 = document.querySelector('#cpassword'); 
                    togglePassword2.addEventListener('click', function (e) {
                    // toggle the type attribute
                    const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
                    password2.setAttribute('type', type);
                    // toggle the eye / eye slash icon
                    this.classList.toggle('fa-eye-slash');
                    });
                    </script>
    

                    
                    <div class="container-login100-form-btn">
                        <div style="width:100%">
                            <input class="form-control button" type="submit" name="change-password" value="Change"style="width: 50%;background: #0c506f;color: #fff;">
                        </div>
                    </div>

        

                </form>
            </div>
        </div>
    </div>
    

    <div id="dropDownSelect1"></div>
    
<!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="js/main.js"></script>

<script>
  $(window).on('load', function () {
    $('#loading').hide();
  }) 
</script>
</body>
</html>