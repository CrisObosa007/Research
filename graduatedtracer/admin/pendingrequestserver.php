<?php 
session_start();
include 'dbhelper.php';


	if (isset($_POST['approveinfo'])) {
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

		$sql = "SELECT * from graduated where firstname = '$firstname' AND middlename = '$middlename' AND lastname = '$lastname'";
          $result2 = $conn-> query($sql);
          if ($result2-> num_rows >= 1 ){
          		$_SESSION['validation'] = "///";
          		header("Location: pendigrequest.php");
          }

          if ($result2-> num_rows == 0 ) {
          
       





		$result =mysqli_query($conn,"INSERT INTO graduated(lastname,firstname,middlename,gender,birthdate,civilstatus,idno,contact,email,specialization,yeargrad,course,region,province,city,barangay,street,password,graduatedimage,notification,newsnotification,eventnotification) values('$lastname','$firstname','$middlename','$gender','$birthdate','$civilstatus','$idno','$contact','$email','$specialization','$yeargrad','$course','$region','$province','$city','$barangay','$street','$password','$graduatedimage','Yes','Yes','Yes')");


		if ($result) {

        $sql = "SELECT * FROM signup WHERE  id='$id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
 
        
      		$idno = $row['idno'];
 			$email = $row['email'];
 			$id;
 			$subject = $firstname . " " .$lastname. ", UCUAA Confirmed your Account" ;
          	$sender = array(
	    	'MIME-Version' => '1.0',
	    	'Content-type' => 'text/html;charset=UTF-8',
	    	'From' => 'UCUAA@mail.com',
	    	'Reply-To' => 'UCUAA@mail.com'
	   );

          	ob_start();
          	include("grademail.php");

			$message = ob_get_contents();
			ob_get_clean();


                $message;
                // $sender = "From: The UCUAA Team";
                if(mail($email, $subject, $message, $sender)){
          
            }
        
	 
	}
	  			
			$_SESSION['approve'] = "apasdas";
            $result=mysqli_query($conn,"UPDATE signup set status='graduated' where id='$id'");
            $result1 =mysqli_query($conn,"INSERT INTO employment(idno,empcourse,notification) values('$idno','$course','Yes')");
			header("Location: pendigrequest.php");
	}
			
}
?>




<?php 

if (isset($_POST['deleteinfo'])) {
	$id = $_POST['id'];
	$result=mysqli_query($conn,"UPDATE signup set status='delete' where id='$id'");
	if ($result) {
		$_SESSION['delete'] = $_POST['delete'];
		header("Location: pendigrequest.php");
	}
}


?>
