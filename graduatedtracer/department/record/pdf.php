<?php
session_start();
include '../dbhelper.php'; 
 $username = $_SESSION['username'];
  if ($username != "") {
  $username = $_SESSION['username'];
  $sql = "SELECT course FROM user WHERE username='$username'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $course = $row['course'];

}

if (isset($_POST['export_pdf'])) {
   // code...

 $sql = "SELECT * FROM graduated JOIN employment ON graduated.course = employment.empcourse and graduated.idno = employment.idno WHERE employment.empcourse = '$course' order by graduated.lastname ASC";
   if (isset($_SESSION['recordcourseyear1']) && $_SESSION['recordcourseyear2'] ) {
      $recordcourseyear1 = $_SESSION['recordcourseyear1'];
      $recordcourseyear2 = $_SESSION['recordcourseyear2'];
      $sql = "SELECT * FROM graduated JOIN employment ON graduated.course = employment.empcourse and graduated.idno = employment.idno WHERE employment.empcourse = '$course' and  graduated.yeargrad >= $recordcourseyear1 and $recordcourseyear2 >= graduated.yeargrad order by graduated.lastname ASC";
              }


      $output;
      $output = "<table>
      <th style='border-bottom:solid 1px;width: 18%;''>ID Number</th>  
      <th style='border-bottom:solid 1px;width: 18%;''>Last Name</th>  
      <th style='border-bottom:solid 1px;width: 18%;''>First Name</th>  
      <th style='border-bottom:solid 1px;width: 18%;''>Middle Name</th>  
      <th style='border-bottom:solid 1px;width: 18%;''>Year Graduated</th>  
      "     ;
       $result = $conn-> query($sql);
        if ($result-> num_rows > 0 ){
        while ($row=mysqli_fetch_array($result)){

        $output .= "
        <tr>
        <td>".$row['idno']."</td>
        <td>".$row['lastname']."</td>
        <td>".$row['firstname']."</td>
        <td>".$row['middlename']."</td>
        <td>".$row['yeargrad']."</td>
        <td align='center'>
        <form method='POST' action='graduatedinfo.php'>
        <input type='hidden' name='idno' value='".$row['idno']."'>
        </form>
        </td>


        </tr>";
            }
        }

      $output .= "</table>";
      header('Content-Description: File Transfer');
      header("Content-Type: application/octet-stream ");
      header("Content-Disposition: attachment; filename=record.pdf");
      header('cache-Control:  must-revalidate');
      header('Pragma Public');
      echo $output;

      ;
}

  ?>