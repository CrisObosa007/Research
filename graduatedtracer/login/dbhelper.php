<?php

$conn = mysqli_connect("localhost", "root", "", "graduatetracer" );
// $conn = mysqli_connect("localhost", "u523111758_UCUGradTracer", "CrisObosa21", "u523111758_ucugraduated" );
// $con = mysqli_connect("localhost", "u523111758_UCUGradTracer", "CrisObosa21", "u523111758_ucugraduated" );
date_default_timezone_set('Asia/Manila');
 $jobpostdate= date("Ymd");
       $sql = "select * from jobpost where jobstatus = 'Approved'";
        $result = $conn-> query($sql);
        if ($result-> num_rows > 0 ){
        while ($row=mysqli_fetch_array($result)){
        $enddate = $row['enddate'];
        $enddate = strtotime($enddate);
        $enddate= date("Ymd" , $enddate);
        $jobid = $row['id'];

     if ($enddate < $jobpostdate) {
     mysqli_query($conn,"UPDATE jobpost set jobstatus='closed' where id='$jobid'");
     }


   }
}
if (!$conn) {

	echo "Connecttion Failed!";

}

?>