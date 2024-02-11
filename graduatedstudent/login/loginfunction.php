<?php
session_start();
include 'dbhelper.php';


if (isset($_POST['idno']) && isset($_POST['password'])) {

	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$idno = validate($_POST['idno']);
	$password = validate($_POST['password']);
	if (empty($idno) && empty($password)) {
		header("Location: /capstone1/login/login.php?error=All fields are required");
		exit();
	}
	if (empty($idno)) {
		header("Location: /capstone1/login/login.php?error=Username is required");
		exit();
	}
	if (empty($password)) {
		header("Location: /capstone1/login/login.php?error=Password is required");
		exit();
	}
	if (empty($idno)) {
			header("Location: login.php?error=Fields are required");
			exit();
			}else{
		
		$sql = "SELECT * FROM graduated WHERE idno='$idno' AND password='$password'";

			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) === 1) {
				$row = mysqli_fetch_assoc($result);

				if ($row['idno'] === $idno && $row['password'] === $password) {
					
					$_SESSION['idno'] = $row['idno'];
					$_SESSION['id'] = $row['id'];
					$_SESSION['password'] = $row['password'];

				   date_default_timezone_set('Asia/Manila');
					  $date= date("Y-m-d");
					   $time = date('g:i a');

					mysqli_query($conn,"INSERT INTO login (username,date,time)values('$idno','$date','$time')");

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