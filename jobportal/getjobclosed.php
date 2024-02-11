<?php

include ('dbconnect.php');

$stmt = $conn->prepare("SELECT * FROM jobpost where jobstatus='Approved'");

$stmt ->execute();
$stmt -> bind_result($jobtitle, $jobtype);

$products = array();

while($stmt ->fetch()){

    $temp = array();
	
	$temp['jobtitle'] = $jobtitle;
	$temp['jobtype'] = $jobtype;


	array_push($products,$temp);
	}

	echo json_encode($products);

?>