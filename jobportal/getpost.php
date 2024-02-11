<?php
include 'dbconnect.php';

$stmt = $conn->prepare("SELECT post.id,post.idno,post.post,post.year,graduated.graduatedimage, post.date, post.time, post.reactcount, post.commentcount,graduated.firstname,graduated.middlename,graduated.lastname FROM post join graduated on post.idno = graduated.idno where post.poststatus != 'deleted' order by post.id DESC");

$stmt ->execute();
$stmt -> bind_result($id,$idno, $post,$year,$graduatedimage ,$date, $time,$reactcount,$commentcount, $firstname, $middlename, $lastname);

$trending = array();

while($stmt ->fetch()){

	$temp = array();

	$temp['id'] = $id;
	$temp['idno'] = $idno;
	$temp['post'] = $post;
		$temp['year'] = $year;
	$temp['img'] =   $dblink."graduatedstudent/graduatedimage/".$graduatedimage;
	$temp['date'] = $date;
	$temp['time'] = $time;
		$temp['reactcount'] = $reactcount;
			$temp['commentcount'] = $commentcount;
	$temp['firstname'] = $firstname;
	$temp['middlename'] = $middlename;
	$temp['lastname'] = $lastname;

	array_push($trending,$temp);
}

echo json_encode($trending);

?>