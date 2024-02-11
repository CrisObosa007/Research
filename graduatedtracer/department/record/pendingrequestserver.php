
<?php 
session_start();
include '../dbhelper.php';
require "../mail.php";

date_default_timezone_set('Asia/Manila');
$time = date('g:i a');
$date= date("Y-m-d");
if (isset($_POST['approveinfo'])) {

	

	$college = $_POST['college'];
	$id = $_POST['id'];
	$lastname = $_POST['lastname'];
	$firstname = $_POST['firstname'];
	$middlename = $_POST['middlename'];
	$gender = $_POST['gender'];
	$birthdate = $_POST['birthdate'];
	$civilstatus = $_POST['civilstatus'];
	$idno = $_POST['idno'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$specialization = $_POST['specialization'];
	$yeargrad = $_POST['yeargrad'];
	$course = $_POST['course'];
	$region = $_POST['region'];
	$province = $_POST['province'];
	$city = $_POST['city'];
	$barangay = $_POST['barangay'];
	$street = $_POST['street'];
	$graduatedimage = "";
	$password = $_POST['password'];
	if ($gender == "Male") {
		$graduatedimage = '1.jpg';
	}
	if ($gender == "Female") {
		$graduatedimage = '0.jpg';
	}

	$sql = "SELECT * from graduated where idno = '$idno'";
	$result2 = $conn-> query($sql);
	if ($result2-> num_rows >= 1 ){
		$_SESSION['validation'] = "///";
		header("Location: pendingrequest.php");
	}


	if ($result2-> num_rows == 0 ) {
		
		
		$resultac =mysqli_query($conn,"INSERT INTO algraduated(lastname,firstname,middlename,gender,birthdate,civilstatus,idno,contact,email,specialization,yeargrad,course,college,region,province,city,barangay,street,approvedby,approveddate,approvedtime,status) values('$lastname','$firstname','$middlename','$gender','$birthdate','$civilstatus','$idno','$contact','$email','$specialization','$yeargrad','$course','$college','$region','$province','$city','$barangay','$street','$college','$date','$time','approved')");




		$result =mysqli_query($conn,"INSERT INTO graduated(lastname,firstname,middlename,gender,birthdate,civilstatus,idno,contact,email,specialization,yeargrad,course,college,region,province,city,barangay,street,password,graduatedimage,notification,newsnotification,eventnotification) values('$lastname','$firstname','$middlename','$gender','$birthdate','$civilstatus','$idno','$contact','$email','$specialization','$yeargrad','$course','$college','$region','$province','$city','$barangay','$street','$password','$graduatedimage','Yes','Yes','Yes')");




		$sql = "SELECT * FROM signup WHERE  id='$id'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		
		
		$idno = $row['idno'];
		$email = $row['email'];
		$id;
		$subject = $firstname . " " .$lastname. ", UCUAA Confirmed your Account" ;
		
		
		$recipient = $email;   
		include("email.php");
		$message = ob_get_contents();
		ob_get_clean();

		if(send_mail($recipient,$subject, $message)){
			
		}
		
		
		
		
		$_SESSION['departmentrecordsuccess'] = "approve";
		$result=mysqli_query($conn,"UPDATE signup set status='graduated' where id='$id'");
		$result1 =mysqli_query($conn,"INSERT INTO employment(idno,empcourse,empcollege,notification) values('$idno','$course','$college','Yes')");
		header("Location: pendingrequest.php");
	}
	
}

if (isset($_POST['deleteinfo'])) {
	$id = $_POST['id'];


	$reasons1 = "";
	$reasons = $_POST['reasons'];
	foreach ($_POST['reasons'] as $reasons){
		if ($reasons != "" && $reasons != "otherreason") {
			$reasons1 .= $reasons . ", ";
		}
		if ($reasons == "otherreason") {
			$otherreason = $_POST['otherreason'];
			$reasons1 .= $otherreason . ", ";
		}
		
	}

	$reasons1 = substr_replace($reasons1 ,"", -2);


	$sql = "SELECT * FROM signup where id='$id'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	$idno = $row['idno'];
	$yeargrad = $row['yeargrad'];
	$firstname = $row['firstname'];
	$middlename = $row['middlename'];
	$lastname = $row['lastname'];
	$gender = $row['gender'];
	$birthdate = $row['birthdate'];
	$civilstatus = $row['civilstatus'];
	$contact = $row['contact'];
	$email = $row['email'];
	$specialization = $row['specialization'];
	$street = $row['street'];
	$barangay = $row['barangay'];
	$city = $row['city'];
	$province = $row['province'];
	$region = $row['region'];
    // $postgraduate = $row['postgraduate'];
    // $postgraduatey1 = $row['postgraduatey1'];
    // $postgraduatey2 = $row['postgraduatey2'];
    // $employed = $row['employed'];
    // $employedy1 = $row['employedy1'];
    // $employedy2 = $row['employedy2'];
    // $employedy3 = $row['employedy3'];
    // $employedy4 = $row['employedy4'];
    // $employedy5 = $row['employedy5'];
    // $employedn1 = $row['employedn1'];
    // $firstjob = $row['firstjob'];
    // $firstjoby1 = $row['firstjoby1'];
    // $firstjoby2 = $row['firstjoby2'];
    // $firstjoby3 = $row['firstjoby3'];
    // $firstjoby4 = $row['firstjoby4'];
    // $firstjoby4y1 = $row['firstjoby4y1'];
	$password = $row['password'];
    // $graduatedimage = $row['graduatedimage'];
	$course = $row['course'];
	$college = $row['college'];




	$id;
	
		$subject = $firstname . " " .$lastname. ", UCUAA" ;


		
		$recipient = $email;   
		include("emaildeny.php");
		$message = ob_get_contents();
		ob_get_clean();

		if(send_mail($recipient,$subject, $message)){
			
		}
		





	$resultac =mysqli_query($conn,"INSERT INTO algraduated(lastname,firstname,middlename,gender,birthdate,civilstatus,idno,contact,email,specialization,yeargrad,course,college,region,province,city,barangay,street,approvedby,approveddate,approvedtime,status,reason) values('$lastname','$firstname','$middlename','$gender','$birthdate','$civilstatus','$idno','$contact','$email','$specialization','$yeargrad','$course','$college','$region','$province','$city','$barangay','$street','$college','$date','$time','denied','$reasons1')");












	$result=mysqli_query($conn,"UPDATE signup set status='delete', reason='$reasons1' where id='$id'");
	if ($result) {
		$_SESSION['departmentrecorddelete'] = "asdas";
		header("Location: pendingrequest.php");
	}



}
?>



















<?php 






?>
