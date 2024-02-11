<?php
include 'dbconnect.php';

$idpost = $_POST['idpost'];
// $idpost = "2";
$stmt = $conn->prepare("SELECT comment.commentid,comment.idno, comment.idpost, comment.comment , comment.date, comment.time,graduated.graduatedimage,graduated.firstname,graduated.middlename,graduated.lastname FROM comment join graduated on comment.idno = graduated.idno where comment.idpost = '$idpost' and comment.commentstatus != 'deleted' order by comment.commentid ASC ");

$stmt ->execute();
$stmt -> bind_result($idcomment,$idno, $idpost,$comment ,$date, $time,$graduatedimage,$firstname,$middlename,$lastname);

$post = array();

while($stmt ->fetch()){

	$temp = array();

	$temp['idcomment'] = $idcomment;
	$temp['idno'] = $idno;
	$temp['idpost'] = $idpost;
	$temp['comment'] = $comment;
	$temp['date'] = $date;
	$temp['time'] = $time;
	$temp['img'] =   $dblink."graduatedstudent/graduatedimage/".$graduatedimage;
		$temp['firstname'] = $firstname;
			$temp['middlename'] = $middlename;
				$temp['lastname'] = $lastname;

	array_push($post,$temp);
}

echo json_encode($post);

?>