<?php 
session_start();
include 'dbhelper.php';

if (isset($_POST['orsubmit'])) {

	$orno = $_POST['orno'];
	$ornodate = $_POST['ornodate'];
	$idno = $_POST['idno'];


	$result=mysqli_query($conn,"UPDATE graduated set orno='$orno', ornodate='$ornodate'  where idno='$idno'");
	   $_SESSION['ORupdated'] = 'sdadsadas';
   header("Location: graduatedinfo.php");
}
?>