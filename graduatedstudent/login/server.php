
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





		$region = ucwords(strtolower($_POST['region']));
		$province = ucwords(strtolower($_POST['province']));
		$city = ucwords(strtolower($_POST['city']));
		$barangay = ucwords(strtolower($_POST['barangay']));
		$street = ucwords(strtolower($_POST['house']));

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
               require "mail.php";


             $recipient = $email;   
             // $message = $code;
            include("registeremail.php");


                $message = ob_get_contents();
                ob_get_clean();
                  if(send_mail($recipient,$subject, $message)){
          
            }





             unset($_SESSION['email']);
			$_SESSION['success'] = "asdasdas";
			header("Location: index.php");
		
	
	}

?>