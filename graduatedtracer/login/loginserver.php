<?php
session_start();
include ("dbhelper.php");	
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
?>
<?php 
	$username = $_SESSION['username'];



	if ($username == "admin") {
		header("Location: ../admin/dashboard.php");
	}
	if ($username == "guidance") {
		header("Location: ../guidance/dashboard.php");
	}
	if ($username != "admin" && $username != "guidance") {
		header("Location: ../department/dashboard.php");
	}


?>



<?php 
}else{
     header("Location: login.php");
     exit();
}
 ?>