<?php 
session_start();
include ('dbhelper.php');

$userid = $_SESSION['id'];
$sql = "SELECT * FROM user WHERE id='$userid'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$userpassword = $row['userpassword'];













	if (isset($_POST['submitpassword'])) {
		$idno = $_POST['idno'];


		$adminpassword =  $_POST['adminpassword'];
			if ("CONFIRM" == $adminpassword) {
				$_SESSION['resetsuccess'] = "///";
				function password_generate($chars) {
		  		$data = 'ABCDEFGHIJKLNMOPQRSTUVWXYZ';
		  		return substr(str_shuffle($data), 0, $chars);
				}
				$password = password_generate(7); 
				$_SESSION['newpassword'] = $password;
				$result=mysqli_query($conn,"UPDATE graduated set password='$password' where idno='$idno'");
				header("Location: graduatedinfo.php");
			}
			else{
				$_SESSION['wrongpassword'] = "/////";
				header("Location: graduatedinfo.php");
			}

	}
















?>













