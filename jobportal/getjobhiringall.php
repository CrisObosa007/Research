<?php

include ('dbconnect.php');
$stmt = $conn->prepare("SELECT id,jobtitle,companyname,email,contact,startdate,enddate,jobtype,location,specialization,link,qualification,description,jobstatus,collegeuploaded,jobpostdate,minimumsalary,maximumsalary,views FROM jobpost where jobstatus = 'approved' order by id desc");

$stmt ->execute();
$stmt -> bind_result($id ,$jobtitle, $companyname, $email, $contact, $startdate, $enddate, $jobtype, $location, $specialization, $link, $qualification, $description, $jobstatus, $courseuploaded, $jobpostdate, $minimumsalary, $maximumsalary, $views);

$products = array();

while($stmt ->fetch()){

    $temp = array();
		$temp['id'] = $id;
	$temp['jobtitle'] = $jobtitle;
	$temp['companyname'] = $companyname;
	$temp['email'] = $email;
	$temp['contact'] = $contact;
	$temp['startdate'] = $startdate;
	$temp['enddate'] = $enddate;
	$temp['jobtype'] = $jobtype;
	$temp['location'] = $location;
	$temp['specialization'] = $specialization;
	$temp['link'] = $link;
	$temp['qualification'] = $qualification;
	$temp['description'] = $description;
	$temp['jobstatus'] = $jobstatus;
	$temp['courseuploaded'] = $courseuploaded;
	$temp['jobpostdate'] = $jobpostdate;
				$temp['minimumsalary'] = $minimumsalary;
			$temp['maximumsalary'] = $maximumsalary;
					$temp['views'] = $views;
		

	array_push($products,$temp);
	}

	echo json_encode($products);

?>