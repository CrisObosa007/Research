<?php
include 'dbconnect.php';

// $stmt = $conn->prepare("SELECT idno,course, course1, yeargrad, yeargrad1, firstname, middlename, lastname FROM graduated order by yeargrad desc");

// $stmt ->execute();
// $stmt -> bind_result( $idno,$course, $course1, $yeargrad, $yeargrad1, $firstname, $middlename, $lastname );

// $alumni = array();

// while($stmt ->fetch()){

//   $temp = array();

  


//   $temp['idno'] = $idno;
//   $temp['course'] = $course;
//   $temp['course1'] = $course1;
//   $temp['yeargrad'] = $yeargrad;
//   $temp['yeargrad1'] = $yeargrad1;
//   $temp['firstname'] = $firstname;
//   $temp['middlename'] = $middlename;
//   $temp['lastname'] = $lastname;

//   array_push($alumni,$temp);
// }

// echo json_encode($alumni);
// $course ="";
//   $sql = "SELECT * from user order by course";
//   $result = $conn-> query($sql);
//   if ($result-> num_rows > 0 ){
//     while ($row=mysqli_fetch_array($result)){
//       $course .= $row['course']. ", ";

//     }
//   }

// echo $course;
// ?>

<?php
include 'dbconnect.php';

$stmt = $conn->prepare("SELECT idno,course, course1, yeargrad, yeargrad1, firstname, middlename, lastname FROM graduated group by  yeargrad desc");

$stmt ->execute();
$stmt -> bind_result( $idno,$course, $course1, $yeargrad, $yeargrad1, $firstname, $middlename, $lastname );

$alumni = array();

while($stmt ->fetch()){

  $temp = array();

  // $alumnidata = "";
  // $allcourse = "";

  // include 'dbconnect.php';
  // $sql = "SELECT * from user order by course";
  // $result = $conn-> query($sql);
  // if ($result-> num_rows > 0 ){
  //   while ($row=mysqli_fetch_array($result)){
  //     $allcourse .= $row['course']. ", ";

  //   }
  // }



 //  $spesplit = explode(', ', $course);  
 //  for($i=0; $i<sizeof($spesplit); $i++){

 //    $selectedcouse = "";
 //    $selectedcouse = $spesplit[$i];

 //    $sql1 = "SELECT * from graduated where yeargrad like '%$yeargrad%' order by yeargrad";
 //    $result1 = $conn-> query($sql1);
 //    if ($result1-> num_rows > 0 ){
 //      while ($row1=mysqli_fetch_array($result1)){

 //        $spesplitcollege = explode(', ', $row1['college']);  
 //        for($ii=0; $ii<sizeof($spesplitcollege); $ii++){

 //         $collegecount = "";

 //         if (sizeof($spesplitcollege) == 0) {
 //           if ($selectedcouse == $row1['course']) {
 //                  $alumnidata .= $selectedcouse . ", " . $row1['firstname'] . "//";
 //           }
 //         }

 //         if (sizeof($spesplitcollege) == 1) {
 //           if ($selectedcouse == $row1['course'] ||$selectedcouse == $row1['course']) {
 //                  $alumnidata .= $selectedcouse . ", " . $row1['firstname'] . "//";
 //           }
 //         }
 //  $alumnidata .= $selectedcouse . ", " . $row1['firstname'] . "//";
 //       }






 //     }



 //   }



 // }


 $temp['idno'] = $idno;
 $temp['course'] = $course;
 $temp['course1'] = $course1;
 $temp['yeargrad'] = $yeargrad;
 $temp['yeargrad1'] = $yeargrad1;
 $temp['firstname'] = $firstname;
 $temp['middlename'] = $middlename;
 $temp['lastname'] = $lastname;

$alumnidata="";


 array_push($alumni,$temp);
}

echo json_encode($alumni);

?>