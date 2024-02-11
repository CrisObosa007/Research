<?php
session_start();
include ("dbhelper.php");	
if (isset($_SESSION['id']) && isset($_SESSION['idno'])) {
?>
<?php 
	$username = $_SESSION['username'];


		header("Location: ../portal/jobpost.php");
	


?>



<?php 
}else{
     header("Location: login.php");
     exit();
}
 ?>