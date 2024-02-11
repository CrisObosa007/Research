<?php
include 'dbconnect.php';

$stmt = $conn->prepare("SELECT course FROM user order by course ASC");

$stmt ->execute();
$stmt -> bind_result($course);

$courses = array();

while($stmt ->fetch()){

	$temp = array();

	$temp['course'] = $course;

	array_push($courses,$temp);
}

echo json_encode($courses);

?>