<?php
include 'dbconnect.php';

$stmt = $conn->prepare("SELECT newsid,newsdetail, venue, address, description, category, newstopic, newsimage, newsdate FROM news order by newsid desc");

$stmt ->execute();
$stmt -> bind_result($newsid,$newsdetail, $venue, $address, $description, $category, $newstopic, $newsimage, $newsdate);

$news = array();

while($stmt ->fetch()){

	$temp = array();
	$imagescollector = "";
	$temp['newsdetail'] = $newsdetail;
	$temp['venue'] = $venue;
	$temp['address'] = $address;
	$temp['description'] = $description;
	$temp['category'] = $category;
	$temp['newstopic'] = $newstopic;

			$newsimagecollected = "";
			$spesplit = explode(', ', $newsimage);  
			for($i=0; $i<sizeof($spesplit); $i++){
				$newsimagecollected .= $dblink."graduatedtracer/uploadimage/".$spesplit[$i].",,,";
			}
	$temp['newsimage'] = $newsimagecollected;
	$temp['newsdate'] = $newsdate;


	array_push($news,$temp);
}

echo json_encode($news);

?>