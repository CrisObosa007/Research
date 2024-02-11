<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
	header("Location: loginserver.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="images/uculogo.png"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css?v=<?php echo time();?>">
	<link rel="stylesheet" type="text/css" href="css/main.css?v=<?php echo time();?>">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

</head>
<style type="text/css">
	.loginbtn{
		background-color: #0c506f;color: #fff;
		padding:10px 40px 10px 40px;
		border-radius: 50px;
		font-size: 17px;
	}
	.loginbtn:hover{
		transform: translate(0, -3px);
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
  <img id="loading-image" src="images/loading	.gif" alt="Loading..." />
</div>
	<div class="" id="form1">
		<div class="container-login100" style="background-color:#0c506f">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-20 p-b-20">
				<form class="login100-form validate-form" style="text-align:center;" action="loginfunction.php" method="POST">
					<span style="text-align:center;">
						<img src="images/uculogo.png" style="width:100px;">
					</span>
					<br>
					<span style="text-align: center;">
						<label style="font-size: 27px;font-weight:800;color:#ef0a13;">UCU</label> <label style="font-size: 27px;font-weight:800;color: #0020d7;">GRADUATE TRACER</label>
					</span>
					<div class="wrap-input100 validate-input m-b-23 m-t-20" data-validate = "Username is reauired" style="text-align:left">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" id="username" placeholder="Type your username">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required" style="text-align:left">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="userpassword" id="userpassword" placeholder="Type your password" style="padding-right: 50px;">
							<i class="bi fa-eye-slash  fa fa-eye" id="toggleolduserpassword" style="margin-right:25px;float: right;margin-top: -30px;color: #686868;"></i>
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					<script type="text/javascript">
					//first password
                    const togglePassword = document.querySelector('#toggleolduserpassword');
                    const password = document.querySelector('#userpassword'); 
                    togglePassword.addEventListener('click', function (e) {
                    // toggle the type attribute
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);
                    // toggle the eye / eye slash icon
                    this.classList.toggle('fa-eye-slash');
                    });
					</script>
					<div>
						<span><?php if (isset($_GET['error'])) { ?>
						<p class="error" style="font-size: 17px;color: #FF2828;"><?php echo $_GET['error']; ?></p>
						
					<?php } ?></span>
					</div>
					
					
					
					<div class="container-login100-form-btn m-t-40" >
						
		
								 <input type="submit" name="LogIn" id="LogIn" value="LOGIN" class="loginbtn">
			
						
					</div>
				</form>
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