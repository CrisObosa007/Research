<?php
session_start();
include '../dbhelper.php'; 
$username = $_SESSION['username'];
if ($username != "") {
  $username = $_SESSION['username'];
  $sql = "SELECT * FROM college WHERE username='$username'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $college = $row['college'];

}
if (isset($_SESSION['skill']) && isset($_SESSION['collegecourse'])) {
  $skill = $_SESSION['skill'];
  $collegecourse = $_SESSION['collegecourse'];
}else{
    //skills start
    $skill = "";
    $sql = "SELECT * FROM skill";
    $result = $conn-> query($sql);
    if ($result-> num_rows > 0 ){
        while ($row=mysqli_fetch_array($result)){
            $skill .= $row['skill'] . ", ";
        }
    }
  //closing skills

  //college start
    $collegecourse = "";
    $sql = "SELECT * FROM user WHERE college like '%$college%'";
    $result = $conn-> query($sql);
    if ($result-> num_rows > 0 ){
      while ($row=mysqli_fetch_array($result)){
          $collegecourse .=  $row['course'].", ";

      }
  }
//closing college
}
if (isset($_POST['excelinfo']) ||isset($_POST['excelinfoemployed']) ||isset($_POST['excelinfonotemployed']) ||isset($_POST['excelinfonotupdated'])||isset($_POST['relatedexcelinfoemployed']) ||isset($_POST['notrelatedexcelinfoemployed'])) {
   // code...

 date_default_timezone_set('Asia/Manila');
 $date= date("Y-m-d");
 $time = date('g:i a');

 mysqli_query($conn,"INSERT INTO report (username,report,date,time)values('$username','Excel','$date','$time')");


  $output;
  $output = "<table>
  <th>ID Number</th>  
  <th>Last Name</th>  
  <th>First Name</th>  
  <th>Middle Name</th> 
    <th>Year Graduated</th>  
  <th>Email</th>  
  <th>Contact</th>  
  <th>Specialization</th>  
  <th>Employed</th>  
  <th>Occupation</th>  
  <th>Related</th>  
  "     ;

  if (isset($_POST['excelinfo'])) {
    $sql = "SELECT * FROM graduated JOIN employment ON graduated.college = employment.empcollege and graduated.idno = employment.idno WHERE employment.empcollege like '%$college%' order by graduated.lastname ASC";
}
if (isset($_POST['excelinfoemployed'])) {
    $sql = "SELECT * FROM graduated JOIN employment ON graduated.college = employment.empcollege and graduated.idno = employment.idno WHERE employment.empcollege like '%$college%' and employment.employed = 'Yes' order by graduated.lastname ASC";
}
if (isset($_POST['excelinfonotemployed'])) {
    $sql = "SELECT * FROM graduated JOIN employment ON graduated.college = employment.empcollege and graduated.idno = employment.idno WHERE employment.empcollege like '%$college%' and employment.employed = 'No' order by graduated.lastname ASC";
}
if (isset($_POST['excelinfonotupdated'])) {
    $sql = "SELECT * FROM graduated JOIN employment ON graduated.college = employment.empcollege and graduated.idno = employment.idno WHERE employment.empcollege like '%$college%' and employment.employed = '' order by graduated.lastname ASC";
}
if (isset($_POST['relatedexcelinfoemployed'])) {
    $sql = "SELECT * FROM graduated join employment ON graduated.college = employment.empcollege  WHERE graduated.college like '%$college%' and employment.employed = 'Yes'  and graduated.idno = employment.idno and employment.employedy5 = 'Yes'  order by graduated.lastname ASC";
}

if (isset($_POST['notrelatedexcelinfoemployed'])) {
    $sql = "SELECT * FROM graduated join employment ON graduated.college = employment.empcollege  WHERE graduated.college like '%$college%' and employment.employed = 'Yes'  and graduated.idno = employment.idno and employment.employedy5 = 'No'  order by graduated.lastname ASC";
}
$result = $conn-> query($sql);
if ($result-> num_rows > 0 ){
    while ($row=mysqli_fetch_array($result)){
        $middlename = $row['middlename'];
        $middlename = substr($middlename, -1);
        $middlename = ucfirst($middlename);

        $looping = 0;
        $looping1 = 0; 
        $looping2 = 0;
                 // ----------colleges selecter-------------------
        $collegesuser1 = $row['college'];
        $spesplit = explode(', ', $collegesuser1);  
        for($iii=0; $iii<sizeof($spesplit); $iii++){

          if ($iii==0) {
            if ($spesplit[0] == $college) {
              $useryearselected1 = $row['yeargrad'];
              $usercollegecourse1 = $row['course'];
          }
      }
      if ($iii==1) {

        if ($spesplit[1] == $college) {
         $useryearselected1 = $row['yeargrad1'];
         $usercollegecourse1 = $row['course1'];
     }
 }

}

         // ----------colleges selecter-------------------
         // ---------------------college course---------
$collegecourse1 = $collegecourse;
$spesplit = explode(', ', $collegecourse1);  
for($i=0; $i<sizeof($spesplit); $i++){


  $userspesplit = explode(', ', $usercollegecourse1);  
  for($ii=0; $ii<sizeof($userspesplit); $ii++){
   if ($spesplit[$i] == $userspesplit[$ii]) {
     $looping1 = 2;

 }
}



}

       // ---------------------college course---------
        // ---------------------yarselected---------

if (isset($_SESSION['yearselected'])) {
  foreach ($_SESSION['yearselected'] as $yearselected){

      $userspesplit = explode(', ', $useryearselected1);  
      for($ii=0; $ii<sizeof($userspesplit); $ii++){
        if ($yearselected == $userspesplit[$ii]) {
          $looping2 = 2;
      }
  }



}  
}else{
    $looping2 = 2;
}

        // ---------------------yarselected---------


         // ---------------------Skills---------


$specialization1 = $skill;
$spesplit = explode(', ', $specialization1);  
for($i=0; $i<sizeof($spesplit); $i++){

    $userspecialization1 = $row['specialization'];
    $userspesplit = explode(', ', $userspecialization1);  
    for($ii=0; $ii<sizeof($userspesplit); $ii++){
      if ($spesplit[$i] == $userspesplit[$ii]) {
       $looping = 2;
   }
}

}
        // ---------------------Skills---------
       // ---------------------college course---------
if ($looping != 0 && $looping1 != 0 && $looping2 != 0) {

    $output .= "
    <tr>
    <td>".$row['idno']."</td>
    <td>".$row['lastname']."</td>
    <td>".$row['firstname']."</td>
    <td>".$row['middlename']."</td>
    <td>".$useryearselected1."</td>
    <td>".$row['email']."</td>
    <td>".$row['contact']."</td>
    <td>".$row['specialization']."</td>
    <td>".$row['employed']."</td>
    <td>".$row['employedy3']."</td>
    <td>".$row['employedy5']."</td>
    <td align='center'>
    <form method='POST' action='graduatedinfo.php'>
    <input type='hidden' name='idno' value='".$row['idno']."'>
    </form>
    </td>


    </tr>";
}
}
}
$output .= "</table>";
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=record.xls");
echo $output;

;
}

?>