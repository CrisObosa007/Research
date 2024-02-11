<?php
session_start();
include 'dbhelper.php';


if (isset($_POST['username']) && isset($_POST['userpassword'])) {

	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$username = validate($_POST['username']);
	$userpassword = validate($_POST['userpassword']);
	if (empty($username) && empty($userpassword)) {
		header("Location: /capstone1/login/login.php?error=All fields are required");
		exit();
	}
	if (empty($username)) {
		header("Location: /capstone1/login/login.php?error=Username is required");
		exit();
	}
	if (empty($userpassword)) {
		header("Location: /capstone1/login/login.php?error=Password is required");
		exit();
	}
	if (empty($username)) {
			header("Location: login.php?error=Fields are required");
			exit();
			}else{
		
		$sql = "SELECT * FROM college WHERE username='$username' AND userpassword='$userpassword'";

			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) === 1) {
				$row = mysqli_fetch_assoc($result);

				if ($row['username'] === $username && $row['userpassword'] === $userpassword) {
					
					$_SESSION['username'] = $row['username'];
					$_SESSION['id'] = $row['id'];
					$_SESSION['userpassword'] = $row['userpassword'];
					   date_default_timezone_set('Asia/Manila');
					  $date= date("Y-m-d");
					   $time = date('g:i a');

					mysqli_query($conn,"INSERT INTO login (username,date,time)values('$username','$date','$time')");

					header("Location: loginserver.php");
					exit();


				}else{
					header("Location: index.php?error=Incorrect Username or Password");
					exit();
			}

	}else{
		header("Location: index.php?error=Incorrect Username or Password");
			exit();
	}

}
		
}else{
	header("Location: index.php");
	exit();
}