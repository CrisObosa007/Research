<?php 
session_start();
require "DataBase.php";
include ('dbconnect.php');



$idno = $_POST['idno'];
// $idno = "200978";

$alumniyeargrad = "";
$alumnicourse = "";
$alumnilist = "";
$alumniname = "&&&&";
$resultlist = "";
$finalresult = "";
$idnoyeargrad = "";
$idnoyeargrad1 = "";
  $sql5 ="SELECT * from graduated where idno = '$idno' ";
  $result5 = mysqli_query($conn,$sql5);
  while ($row5 = mysqli_fetch_array($result5)) { 
  $idnoyeargrad  = $row5['yeargrad']  ;  
  $idnoyeargrad1  = $row5['yeargrad1']  ;  
  }


 $sql = "select * from graduated where yeargrad = '$idnoyeargrad' || yeargrad1 = '$idnoyeargrad'";
$result = $conn-> query($sql);
while ($row=mysqli_fetch_array($result)){
  $alumniyeargrad = $row['yeargrad'];
}
  $sql2 = "select * from user  order by course ASC";
  $result2 = $conn-> query($sql2);
  while ($row2=mysqli_fetch_array($result2)){
     $alumnicourse = $row2['course'];

     $sql3 = "select * from graduated where yeargrad = '$alumniyeargrad' and course = '$alumnicourse'  order by lastname ASC";
     $result3 = $conn-> query($sql3);
     while ($row3=mysqli_fetch_array($result3)){
       $alumniname .= $row3['firstname'] . " " . $row3['middlename'] . " " . $row3['lastname'] . "&&&&";                
    }  
    $alumniname = substr_replace($alumniname ,"", -4);
    $resultlist .= $alumnicourse . "///" .  $alumniname . "/&/&/"; 
    $alumniname = "&&&&";      

 }
 $finalresult =  ",/,/,/". $resultlist;

if ($idnoyeargrad1 != "") {
$alumniyeargrad = "";
$alumnicourse = "";
$alumnilist = "";
$alumniname = "&&&&";
$resultlist = "";


$sql4 = "select * from graduated where yeargrad = '$idnoyeargrad1' || yeargrad1 = '$idnoyeargrad1'";
$result4 = $conn-> query($sql4);
while ($row4=mysqli_fetch_array($result4)){
  $alumniyeargrad = $row4['yeargrad'];
}
  $sql5 = "select * from user  order by course ASC";
  $result5 = $conn-> query($sql5);
  while ($row5=mysqli_fetch_array($result5)){
     $alumnicourse = $row5['course'];

     $sql6 = "select * from graduated where yeargrad = '$alumniyeargrad' and course = '$alumnicourse' order by lastname ASC ";
     $result6 = $conn-> query($sql6);
     while ($row6=mysqli_fetch_array($result6)){
       $alumniname .= $row6['firstname'] . " " . $row6['middlename'] . " " . $row6['lastname'] . "&&&&";                
    }  
    $alumniname = substr_replace($alumniname ,"", -4);
    $resultlist .= $alumnicourse . "///" .  $alumniname . "/&/&/"; 
    $alumniname = "&&&&";      

 }
 $finalresult .= ",/,/,/". $resultlist ;

}else{
   $finalresult .= ",/,/,/". " " ;
}












$response['alumni'] = $finalresult;




$response['error'] = false; 
$response['message'] = "";




echo json_encode($response);
?>