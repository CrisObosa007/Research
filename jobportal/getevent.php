<?php

include 'dbconnect.php';

$stmt = $conn->prepare("SELECT uploadedevent,eventcollege,eventid,eventdetail,startdate,starttime,enddate,endtime,venue,address,description,eventtype,organizer,sponsor,eventimage,eventdate,interested,notinterested FROM event order by eventid DESC");

$stmt ->execute();
$stmt -> bind_result($uploadedevent,$eventcollege,$eventid,$eventdetail, $startdate, $starttime, $enddate, $endtime, $venue, $address, $description, $eventtype, $organizer, $sponsor, $eventimage,$eventdate,$interested,$notinterested);

$news = array();

while($stmt ->fetch()){

    $temp = array();
    $eventtopic = "";
        $temp['uploadedevent'] = $uploadedevent;
    $temp['eventcollege'] = $eventcollege;
	$temp['eventid'] = $eventid;
	$temp['eventdetail'] = $eventdetail;
	$temp['startdate'] = $startdate;
	$temp['starttime'] = $starttime;
	$temp['enddate'] = $enddate;
	$temp['endtime'] = $endtime;
	$temp['venue'] = $venue;
	$temp['address'] = $address;
	$temp['description'] = $description;
	$temp['eventtype'] = $eventtype;
	$temp['eventtopic'] = $eventtopic;
	$temp['organizer'] = $organizer;
	$temp['sponsor'] = $sponsor;

			$eventimagecollected = "";
			$spesplit = explode(', ', $eventimage);  
			for($i=0; $i<sizeof($spesplit); $i++){
				$eventimagecollected .= $dblink."graduatedtracer/uploadimage/".$spesplit[$i].",,,";
			}

	$temp['eventimage'] = $eventimagecollected;
	// $temp['eventimage'] = "http://192.168.1.105/GraduatedTracer/GraduatedTracer/uploadimage/".$eventimage;
	// $temp['eventimage'] = "http://176.100.141.207/GraduatedTracer/GraduatedTracer/uploadimage/".$eventimage;
	$temp['eventdate'] = $eventdate;
	$temp['interested'] = $interested;
	$temp['notinterested'] = $notinterested;



	array_push($news,$temp);
	}

	echo json_encode($news);

?>