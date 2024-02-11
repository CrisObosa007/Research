<?php 
session_start();
include ('dbhelper.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link rel="icon" type="image/png" href="images/ucu.png"/>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">   
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="css/util.css?v=<?php echo time();?>">
    <link rel="stylesheet" type="text/css" href="css/main.css?v=<?php echo time();?>">
    <link rel="stylesheet" type="text/css" href="css/signup.css?v=<?php echo time();?>">
    <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time();?>">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="css/multiselect.css?v=<?php echo time();?>" rel="stylesheet"/>
    <script src="multiselect.min.js?v=<?php echo time();?>"></script>
</head>
<style type="text/css">
#success-hidden input[type="checkbox"]{
    display: None;
}

/*start sucessfully*/
.container-success1{
   position: fixed;
  width: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(86,86,86,.30);
  z-index: 10000;
  overflow: auto;
}
.container-success01{
  width: 80%;
  margin-left: 10%;
  margin-right: 10%;
  border-radius: 10px;
  color: rgb(1,82,73);
  margin-top : 100px;
  z-index: 10001;
  font-weight: 700;
  text-align: center;
  padding-bottom: 10px; 
  height: auto; 
  margin-bottom: 20px;
  text-align: left;
  background: #fff;
  padding: 15px;
}
.container-success01 .close-btn{
  position: absolute;
  right: 20px;
  top: 15px;
  font-size: 20px;
  cursor: pointer;
  background:#eb8d00;
  width: 3%;
  height: 20px;
  text-align: center;

}
.container-success01 .close-btn:hover{
  color:rgba(255,255,255,0.9);
}
.labelpreview01{
    width: 90px;
    font-size: 1em;
    color: #297fa7;
    float: left;
    text-align: left;

}
.outputpreview01{
    font-size: 1.2em;
    float: left;
    text-align: left;

 
}
.labelpreview{
    font-size: .9em;
    color: #575757;
    float: left;
    font-weight: 800;

}
.outputpreview{
  font-size: 1em;
  line-height: normal;
  width: 90%;
  padding: 1%;
  margin-right: 10%;
  box-sizing: border-box;
  color: #000    ;
  position: relative;
  border-radius: 7px;
  text-align: left;
  padding: 5px;
  margin-top: -15px;
  text-transform: uppercase; 
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;

}
.editsubmit:hover{
    transform: translate(0, -3px);
}
//icon
.container-successicon1{
   position: fixed;
  width: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(86,86,86,.30);
  z-index: 10000;
}
.container-successicon01{
  width: 30%;
  padding: 15px;
  left: 30%;
  margin-left: 5%;
  border-radius: 10px;
  color: rgb(1,82,73);
  background: #fff;
  position: absolute;
  top: 17%;
  box-shadow: 3px 3px 3px #000;
  z-index: 10001;
  font-weight: 700;
  text-align: center;
  padding-bottom: 40px; 
  height: 40%; 
  background: #E9E7E7;
}
.container-successicon01 .close-btn{
  position: absolute;
  right: 20px;
  top: 15px;
  font-size: 20px;
  cursor: pointer;
  background:#eb8d00;
  width: 3%;
  height: 20px;
  text-align: center;

}
.container-successicon01 .close-btn:hover{
  color:rgba(255,255,255,0.9);
}
.iconlabel{
      position:absolute;
      left:10px;
      top:41px;
      color:#30A3F1;
      color: #fff;
      padding-right: 5px;
      height: 18px;
      font-size: 17px;
      padding-left: 1px;

}
/*pop up*/
input[type="checkbox"]{
  display: none;
}
.container1{
   position: fixed;
  width: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(86,86,86,.8);
  z-index: 10000;
  overflow: auto;
  display :none;
  overflow: auto;    
}
.container01{
  width: 40%;
  margin-left: 25%;
  margin-right: 25%;
  border-radius: 10px;
  color: rgb(1,82,73);
  margin-top : 150px;
  box-shadow: 5px 5px 5px 5px#696969;
  z-index: 10001;
  font-weight: 700;
  text-align: center;
  padding-bottom: 40px; 
  height: auto; 
  margin-bottom: 20px;
  text-align: left;
  background-color: #fff;
}
@media only screen and (max-width: 600px) {
  .container01{
  width: 80%;
  margin-left: 10%;
  margin-right: 10%;
  }
}
.container01 .close-btn1{
  float: right;
  padding: 5px 10px 5px 10px;
  top: 15px;
  font-size: 20px;
  cursor: pointer;
  background:#0c506f;
  text-align: center;
  color: #fff;

}
.container01 .close-btn1:hover{
  color:rgba(255,255,255,0.9);
  /*transform: translate(0, -3px);*/
  background-color: red;

}
.selectyes:hover{
    background-color: #fff !important;
    color: #29A9EA !important;
    border:solid 1px #29A9EA !important;
}
.selectno:hover{
    background-color: #29A9EA !important;
    color: #fff !important;
    border:solid 1px #29A9EA !important;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    function table(){
        if (document.getElementById('secondformyes').checked) {
        document.getElementById('form2').style.display = 'block';
        document.getElementById('form1').style.display = 'none';
    }
}

</script>

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


<script type="text/javascript">
              setTimeout(function() {
              $('#success').hide()
            }, 2000);
</script>

<script type="text/javascript">
              setTimeout(function() {
              $('#infosuccess').hide()
            }, 10000);
</script>

 

    <div class="limiter" id="form1"  style="display:block">
        <div class="container-login100" style="background-color: #07435f;">
            <div class="wrap-login100 p-l-50 p-r-50 p-t-10 p-b-30">
                <form class="login100-form validate-form" style="text-align:center;"  action="loginfunction.php" method="POST">
                   
                    <?php if(isset($_SESSION['success'])) {?>      
                     
                                <div id="success" style="background-color:rgba(152, 254, 152, 0.7);margin-left: -50px;margin-right: -50px;margin-bottom: 10px;margin-top: -50px;border-bottom: solid #309F00 2px;">
                                <span style="text-align:center;">
                                    <label style="font-size: 20px;margin-top: 50px;">Register Success!</label>
                                </span>
                                <br>
                                </div>
                        
                    <?php     
                     
                     unset($_SESSION['success']);
                     }
                   

                     ?>
                     <?php if(isset($_SESSION['infosuccess'])) {?>      
                     
                                <div id="infosuccess" style="background-color:rgba(152, 254, 152, 0.7);margin-left: -50px;margin-right: -50px;margin-bottom: 10px;margin-top: -50px;border-bottom: solid #309F00 2px;">
                                <span style="text-align:center;">
                                    <label style="font-size: 17px;margin-top: 50px;">Your password changed. Now you can login with your new password.</label>
                                </span>
                                <br>
                                </div>
                        
                    <?php      
                     unset($_SESSION['infosuccess']);
                     }
                   
                     ?>
                    <span style="text-align:center;">
                        <img src="images/ucu.png" style="width:100px;">
                    </span>
                    <span style="text-align: center;">
                        <label style="width: 100%;font-size: 1.3em;font-weight: 800;font-style: italic;">Welcome UCUians!</label>
                    </span>
                    <br>
                    <span style="text-align: center;">
                        <label style="width: 100%;font-size: .7em;">Register to get access in our University and be updated.</label>
                    </span>

                    <div class="wrap-input100 validate-input m-b-5 m-t-5" data-validate = "Username is reauired" style="text-align:left">
                        <span class="label-input100">ID Number</span>
                        <input class="input100" type="text" name="idno" id="idno" placeholder="Type your ID Number">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required" style="text-align:left">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" id="password" placeholder="Type your password">
                        <i class="bi fa-eye-slash  fa fa-eye" id="toggleolduserpassword" style="margin-right:25px;float: right;margin-top: -30px;color: #686868;"></i>
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
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
                  
                    
                     <div class="container-login100-form-btn ">
                         <div align="left" style="width:100%">
                            <a href="forgot-password.php" style="font-size: .6em;">Forgot password?</a>
                        </div>
                    </div>
                    <div>
                        <span><?php if (isset($_GET['error'])) { ?>
                        <p class="error" style="font-size: .7em;color: #FF2828;"><?php echo $_GET['error']; ?></p>
                        
                    <?php } ?></span>
                    </div>
                    <div class="container-login100-form-btn m-t-10">
                            <button class="login100-form-btn editsubmit" style="background-color:#0c506f;border-radius: 50px;font-size: .8em;" type="submit" name="LogIn" id="LogIn" value="LOGIN">
                                Login
                            </button>
                    </div>
                   </form>
                   
                    <div class="flex-col-c p-t-5">
                       <!--  <span class="txt1 p-b-5">
                            Or
                        </span> -->
                        <input type="radio" name="form" value="" checked="" style="display:none">
                        <input type="radio" onclick="javascript:table();" value="Yes" name="form" id="secondformyes" class="radio-button" hidden>
                        <style type="text/css">
                        
                            .signup:hover{
                                color: #4351DC;
                            }
                        </style>
 <!-------------------------- reset password ------------------------------>
                    <div class="container-login100-form-btn ">
                         <div align="center" style="width:100%">
                            <a href="register.php" style="font-size: .8em;">Register</a>
                        </div>
                    </div>





          <!-------------------------- reset password ------------------------------>
                    </div>
              
            </div>
        </div>
    </div>
    
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <script src="js/main.js"></script>




<script>
  $(window).on('load', function () {
    $('#loading').hide();
  }) 
</script>
</body>
</html>