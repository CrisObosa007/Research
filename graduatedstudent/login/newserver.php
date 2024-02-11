<?php 
session_start();

include ('dbhelper.php');
	if (isset($_POST['send'])) {
		$lastname = ucwords(strtolower($_POST['lastname']));
		$firstname = ucwords(strtolower($_POST['firstname']));
		$middlename = ucwords(strtolower($_POST['middlename']));
		$gender = $_POST['gender'];
		$birthdate = $_POST['birthdate'];
		$civilstatus = $_POST['civilstatus'];
		


		$contact = $_POST['contact'];
		$email = $_POST['email'];
		$specialization1 = "";
		$specialization = $_POST['specialization'];
		foreach ($_POST['specialization'] as $specialization){
                $specialization1 .= $specialization . ", ";
        }

		$specialization1 = substr_replace($specialization1 ,"", -2);






		$status = "";
		$classification = $_POST['classification'];
		
		if ($classification == 'Graduating') {
			$status = 'Pending';
		}
		if ($classification == 'Graduated') {
			$status = 'Approval';
		}
		$yeargrad = $_POST['yeargraduated'];

		$idno = $_POST['idno'];
		if ($idno == "") {
				$idno = "";
				$idno = $yeargrad . "000001";

				$sql = "SELECT * FROM signup where idno like '%$yeargrad%' and LENGTH(idno) = 10 order by idno asc";
		          $result = mysqli_query($conn,$sql);
		          while ($row = mysqli_fetch_array($result)) { 
		          	$idno = $row['idno'] + 1;
		       
		          }
		      	$idno;

		}

		
		









		
		$course = $_POST['course'];

		  $sql = "select * from user where course = '$course'";
          $result = $conn-> query($sql);
                    
          while ($row=mysqli_fetch_array($result)){
          $college = $row['college'];

          }





		$region = ucwords(strtolower($_POST['region1']));
		$province = ucwords(strtolower($_POST['province1']));
		$city = ucwords(strtolower($_POST['city1']));
		$barangay = ucwords(strtolower($_POST['barangay1']));
		$street = ucwords(strtolower($_POST['house']));




		  $sql1 = "SELECT * FROM refregion where regCode = '$region'";
		  $result1 = mysqli_query($conn,$sql1);
		  $row1 = mysqli_fetch_array($result1);
		  $region = $row1['regDesc'];

		  $sql2 = "SELECT * FROM refprovince where provCode = '$province'";
		  $result2 = mysqli_query($conn,$sql2);
		  $row2 = mysqli_fetch_array($result2);
		  $province = $row2['provDesc'];

		  $sql3 = "SELECT * FROM refcitymun where citymunCode = '$city'";
		  $result3 = mysqli_query($conn,$sql3);
		  $row3 = mysqli_fetch_array($result3);
		  $city = $row3['citymunDesc'];
 
		  $sql4 = "SELECT * FROM refbrgy where brgyCode = '$barangay'";
		  $result4 = mysqli_query($conn,$sql4);
		  $row4 = mysqli_fetch_array($result4);
		  $barangay = $row4['brgyDesc'];







		date_default_timezone_set('Asia/Manila');
		$s = date('g:i a');
		$dateregister= date("Y-m-d");



		function password_generate($chars) {
  			$data = 'ABCDEFGHIJKLNMOPQRSTUVWXYZ';
  			return substr(str_shuffle($data), 0, $chars);
		}
		$password = password_generate(7);
		$result =mysqli_query($conn,"INSERT INTO signup(lastname,firstname,middlename,gender,birthdate,civilstatus,idno,contact,email,specialization,classification,yeargrad,course,college,region,province,city,barangay,street,password,status,dateregister) values('$lastname','$firstname','$middlename','$gender','$birthdate','$civilstatus','$idno','$contact','$email','$specialization1','$classification','$yeargrad','$course','$college','$region','$province','$city','$barangay','$street','$password','$status','$dateregister')");





 			$subject = $firstname . " " .$lastname. ", UCUAA Confirmed your Account" ;
          	$sender = array(
	    	'MIME-Version' => '1.0',
	    	'Content-type' => 'text/html;charset=UTF-8',
	    	'From' => 'UCUAA@mail.com',
	    	'Reply-To' => 'UCUAA@mail.com'
	      );

          	ob_start();
          	include("registeremail.php");

			$message = ob_get_contents();
			ob_get_clean();


                $message;
                if(mail($email, $subject, $message, $sender)){
          
            }





			$_SESSION['success'] = "asdasdas";
			header("Location: index.php");

	
	}

?>