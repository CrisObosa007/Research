<?php 
session_start();
include 'dbhelper.php';


if (isset($_SESSION['idno']) && isset($_SESSION['password'])) {
  //USERNAME LOGIN
  $idno = $_SESSION['idno'];
  $sql = "SELECT * from graduated where idno = '$idno'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $skill  = $row['specialization'];

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<body>
<?php
  $recommended = '0';
  $others = '0'; 
  $sql = 'select * from jobpost';
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  while ($row = mysqli_fetch_array($result)) {
    // $specialization = $row['specialization'];
    $x = '0';
  
    // echo "<br>";
    // if ($recommended == '0') {
    //   $recommended = '1';
    //   echo "recommended";
    //   echo "<br>";
    // }
    // echo $row['jobtitle'];
    // echo "<br>";

  // $spesplit = explode(', ', $specialization);  
  // for($i=0; $i<sizeof($spesplit); $i++){
  // $querysplit = $spesplit[$i];
  //     if ((stripos($spesplit[$i],$skill ) !== FALSE) && ($x == '0')){
    
  //         $x++;
  //         echo $row['jobtitle'];
  //         echo "<br>";

  //       }

  // }
    echo "hello";


    if ($others == '0') {
      $others = '1';
      echo "<br>";
      echo "others";
       echo "<br>";
    }


     // if ($x == '0') {
         echo $row['jobtitle'];
        echo "<br>";
    // }



  }



?>
</body>
</html>




















<?php 
}
?>
