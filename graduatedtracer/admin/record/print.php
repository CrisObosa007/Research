<style type="text/css">
    #my-section{
        display: none;

    }
    .table-container{
        width: 94%;
        padding-left: 3%;
        padding-right: 3%;
        border:  solid 1px #000;
        margin-top: 10px;

    }

    .heaederkoto{

    }
    thead.report-header{
        display: table-header-group;
    }
    .report-header tr th{
        padding: 5px;
        border-left: solid 1px #000;
        text-align: center;
    }
    tfoot.report-footer{
        display: table-footer-group;
    }
    .report-content tr{
        border: solid 1px #000;
    }
    .report-content tr td{
        border-right: solid 1px #000;
        padding: 5px;
    }
    @media print{
        body *:not(#my-section):not(#my-section *){
            display: none;
        }

        #my-section{
            display: block;
            
        }
        #bugdashboard{
            visibility: hidden;
        }
        #bugdashboard2{
            visibility: hidden;
        }

    }


</style>


<?php


if (isset($_SESSION['coursegraduated'])) {
   $college = $_SESSION['coursegraduated'];
}

//print start
if (isset($_POST['printinfo']) || isset($_POST['printinfoemployed']) || isset($_POST['printinfonotemployed']) || isset($_POST['printinfonotupdated']) || isset($_POST['relatedemployedprintinfo']) || isset($_POST['notrelatedemployedprintinfo'])) {

 date_default_timezone_set('Asia/Manila');
 $date= date("Y-m-d");
 $time = date('g:i a');

 mysqli_query($conn,"INSERT INTO report (username,report,date,time)values('admin','Print','$date','$time')");




 if ($username != "") {
    $print = "";
    $print1 = "";
    $print = $_POST['print'];
    foreach ($_POST['print'] as $print){
        $print1 .= $print . ", ";
    }
    $print1 = substr_replace($print1 ,"", -2);
}

}
//print end


//condition pront
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
?>


<div class="row" id="my-section" >

    <div class="col-xl-12 heaederkoto" >
        <div style="width:100%;position: relative;">
          <div style="width:20%;display: inline-block;" align="right">
            <img src="../assets/img/<?php 
            $sql = "SELECT * FROM college WHERE username='admin'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result);
            $image = $row['image'];
            echo $image;

        ?>" alt="Profile" style='width: 70px;margin-top: -45px;'>
    </div>
    <div style="width:59%;display: inline-block;" align="center">
        <label style="font-size: 23px;">URDANETA CITY UNIVERSITY</label><br>
        <label style="font-size:14px;font-weight: 500;margin-top: -10px;">San Vicente West, Urdaneta City 2428 Pangasinan</label><br>
        <label style="font-size:16px;font-weight: 500;margin-top: -7px"><?php echo $college; ?></label>
    </div>
    <div style="width:20%;display: inline-block;" align="left">
        <img src="../../department/assets/img/<?php 
        $sql = "SELECT * FROM college WHERE college='$college'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        $image = $row['image'];
        echo $image;

    ?>" alt="Profile"  style='width: 70px;margin-top: -45px;'>
</div>
</div>
<div style="width: 100%;border-top: solid 3px red;margin-top: 25px;">
   <label style="opacity: 0;">.</label>
</div>
</div>
<div class="col-xl-12" align="center" >

    <?php

    if (!isset($_SESSION['yearselected']) ) {

       $sql = "SELECT * FROM graduated WHERE college like '%$college%'";
       date_default_timezone_set('Asia/Manila');
       $time = date('g:i a');
       $date= date("Y")+2;
       $yearselected = "";

       for ($yearselected=2005; $yearselected <$date ; $yearselected++) { 




         ?>

         <div style="width:100%;" align="left"><label style="font-size: 13px;padding-left: 3%;margin-bottom: -8px;"><?php echo $college ." ("." Year: ". $yearselected ?> )</label></div>
         <table class="report-container table-container" >
          <thead class="report-header">
            <tr>
                <?php

                $print2 = explode(', ', $print1);  
                for($i=0; $i<sizeof($print2); $i++){
                    if ($print2[$i] == 'idno') {
                        echo "<th style='border-bottom:solid 1px;'>ID number</th>";
                    }
                    if ($print2[$i] == 'name') {
                        echo "<th style='border-bottom:solid 1px;'>Name</th>";
                    }
                    if ($print2[$i] == 'contact') {
                        echo "<th style='border-bottom:solid 1px;'>Contact</th>";
                    }
                    if ($print2[$i] == 'email') {
                        echo "<th style='border-bottom:solid 1px;'>Email</th>";
                    }
                    if ($print2[$i] == 'specialization') {
                        echo "<th style='border-bottom:solid 1px;'>Skill</th>";
                    }
                    if ($print2[$i] == 'year') {
                        echo "<th style='border-bottom:solid 1px;'>Yr Grad</th>";
                    }

                    if ($print2[$i] == 'occupation') {
                        echo "<th style='border-bottom:solid 1px;'>Occupation</th>";
                    }
                    if ($print2[$i] == 'remark') {
                        echo "<th style='border-bottom:solid 1px;'>Remark</th>";
                    }

                }

                ?>







            </tr>
        </thead>

        <tbody class="report-content">
           <?php

           if (isset($_POST['printinfo'])) {
            $sql = "SELECT * FROM graduated JOIN employment ON graduated.college = employment.empcollege and graduated.idno = employment.idno WHERE employment.empcollege like '%$college%' order by graduated.lastname ASC";
        }
        if (isset($_POST['printinfoemployed'])) {
            $sql = "SELECT * FROM graduated JOIN employment ON graduated.college = employment.empcollege and graduated.idno = employment.idno WHERE employment.empcollege like '%$college%' and employment.employed = 'Yes' order by graduated.lastname ASC";
        }
        if (isset($_POST['printinfonotemployed'])) {
            $sql = "SELECT * FROM graduated JOIN employment ON graduated.college = employment.empcollege and graduated.idno = employment.idno WHERE employment.empcollege like '%$college%' and employment.employed = 'No' order by graduated.lastname ASC";
        }
        if (isset($_POST['printinfonotupdated'])) {
            $sql = "SELECT * FROM graduated JOIN employment ON graduated.college = employment.empcollege and graduated.idno = employment.idno WHERE employment.empcollege like '%$college%' and employment.employed = '' order by graduated.lastname ASC";
        }
        if (isset($_POST['relatedemployedprintinfo'])) {
            $sql = "SELECT * FROM graduated join employment ON graduated.college = employment.empcollege  WHERE graduated.college like '%$college%' and employment.employed = 'Yes'  and graduated.idno = employment.idno and employment.employedy5 = 'Yes'  order by graduated.lastname ASC";
        }

        if (isset($_POST['notrelatedemployedprintinfo'])) {
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
                          $looping3 = 0;
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

   $userspesplit = explode(', ', $useryearselected1);  
   for($ii=0; $ii<sizeof($userspesplit); $ii++){
    if ($yearselected == $userspesplit[$ii]) {
      $looping2 = 2;
  }
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
      // ---------------------employment status---------
         $employmentstatus1 = $employmentstatus;
         $spesplit = explode(', ', $employmentstatus1);  
         for($i=0; $i<sizeof($spesplit); $i++){
         $employmentstatususer;

         if ($row['employed'] == "Yes") {
            $employmentstatususer = "Employed";
         }
         if ($row['employed'] == "No") {
            $employmentstatususer = "Not Employed";
         }
         if ($row['employed'] == "") {
            $employmentstatususer = "Not Updated";
         }


           if ($spesplit[$i] == $employmentstatususer) {
             $looping3 = 2;

            }



       }

       // ---------------------employment status---------
   if ($looping != 0 && $looping1 != 0 && $looping2 != 0 && $looping3 != 0) {
    echo"<tr>";

$print2 = explode(', ', $print1);  
for($i=0; $i<sizeof($print2); $i++){
 if ($print2[$i] == 'idno') {
  echo "<td style='text-align:center'>".$row['idno']."</td>";
}
if ($print2[$i] == 'name') {
  echo "<td style='padding-left:20px'>".$row['lastname'].", " .$row['firstname']. " " .$middlename.".</td>";
}
if ($print2[$i] == 'contact') {
  echo "<td style='text-align:center'>".$row['contact']."</td>";
}
if ($print2[$i] == 'email') {
  echo "<td style='text-align:center'>".$row['email']."</td>";
}
if ($print2[$i] == 'specialization') {
  echo "<td style='text-align:center'>".$row['specialization']."</td>";
}
if ($print2[$i] == 'year') {
  echo "<td style='text-align:center'>".$row['yeargrad']."</td>";
}
if ($print2[$i] == 'occupation') {
  echo "<td style='text-align:center'>".$row['employedy3']."</td>";
}
if ($print2[$i] == 'remark') {
  echo "<td style='text-align:center'></td>";
}

}


echo "</tr>";
}
}

}



?>
</tbody>
</table>
<?php }


}

?>


















<?php 

if (isset($_SESSION['yearselected']) ) {
   $yearselected = $_SESSION['yearselected'];
   $sql = "SELECT * FROM graduated WHERE college like '%$college%'";

   $yearselected = "";
   $yearselected1 = "";
   $yearselected = $_SESSION['yearselected'];
   foreach ($_SESSION['yearselected'] as $yearselected){
     if ($yearselected != "") {?>

      <div style="width:100%;" align="left"><label style="font-size: 13px;padding-left: 3%;margin-bottom: -8px;"><?php echo $college ." ("." Year: ". $yearselected ?> )</label></div>
      <table class="report-container table-container" >
          <thead class="report-header">
            <tr>
                <?php

                $print2 = explode(', ', $print1);  
                for($i=0; $i<sizeof($print2); $i++){
                    if ($print2[$i] == 'idno') {
                        echo "<th style='border-bottom:solid 1px;'>ID number</th>";
                    }
                    if ($print2[$i] == 'name') {
                        echo "<th style='border-bottom:solid 1px;'>Name</th>";
                    }
                    if ($print2[$i] == 'contact') {
                        echo "<th style='border-bottom:solid 1px;'>Contact</th>";
                    }
                    if ($print2[$i] == 'email') {
                        echo "<th style='border-bottom:solid 1px;'>Email</th>";
                    }
                    if ($print2[$i] == 'specialization') {
                        echo "<th style='border-bottom:solid 1px;'>Skill</th>";
                    }
                    if ($print2[$i] == 'year') {
                        echo "<th style='border-bottom:solid 1px;'>Yr Grad</th>";
                    }
                    if ($print2[$i] == 'occupation') {
                        echo "<th style='border-bottom:solid 1px;'>Occupation</th>";
                    }
                    if ($print2[$i] == 'remark') {
                        echo "<th style='border-bottom:solid 1px;'>Remark</th>";
                    }

                }

                ?>







            </tr>
        </thead>

        <tbody class="report-content">
           <?php

           if (isset($_POST['printinfo'])) {
            $sql = "SELECT * FROM graduated JOIN employment ON graduated.college = employment.empcollege and graduated.idno = employment.idno WHERE employment.empcollege like '%$college%' order by graduated.lastname ASC";
        }
        if (isset($_POST['printinfoemployed'])) {   
            $sql = "SELECT * FROM graduated JOIN employment ON graduated.college = employment.empcollege and graduated.idno = employment.idno WHERE employment.empcollege like '%$college%' and employment.employed = 'Yes' order by graduated.lastname ASC";
        }
        if (isset($_POST['printinfonotemployed'])) {
            $sql = "SELECT * FROM graduated JOIN employment ON graduated.college = employment.empcollege and graduated.idno = employment.idno WHERE employment.empcollege like '%$college%' and employment.employed = 'No' order by graduated.lastname ASC";
        }
        if (isset($_POST['printinfonotupdated'])) {
            $sql = "SELECT * FROM graduated JOIN employment ON graduated.college = employment.empcollege and graduated.idno = employment.idno WHERE employment.empcollege like '%$college%' and employment.employed = '' order by graduated.lastname ASC";
        }
        if (isset($_POST['relatedemployedprintinfo'])) {
            $sql = "SELECT * FROM graduated join employment ON graduated.college = employment.empcollege  WHERE graduated.college like '%$college%' and employment.employed = 'Yes'  and graduated.idno = employment.idno and employment.employedy5 = 'Yes'  order by graduated.lastname ASC";
        }

        if (isset($_POST['notrelatedemployedprintinfo'])) {
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
                          $looping3 = 0;
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

   $userspesplit = explode(', ', $useryearselected1);  
   for($ii=0; $ii<sizeof($userspesplit); $ii++){
    if ($yearselected == $userspesplit[$ii]) {
      $looping2 = 2;
  }
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
      // ---------------------employment status---------
         $employmentstatus1 = $employmentstatus;
         $spesplit = explode(', ', $employmentstatus1);  
         for($i=0; $i<sizeof($spesplit); $i++){
         $employmentstatususer;

         if ($row['employed'] == "Yes") {
            $employmentstatususer = "Employed";
         }
         if ($row['employed'] == "No") {
            $employmentstatususer = "Not Employed";
         }
         if ($row['employed'] == "") {
            $employmentstatususer = "Not Updated";
         }


           if ($spesplit[$i] == $employmentstatususer) {
             $looping3 = 2;

            }



       }

       // ---------------------employment status---------
   if ($looping != 0 && $looping1 != 0 && $looping2 != 0 && $looping3 != 0) {
    echo"<tr>";

$print2 = explode(', ', $print1);  
for($i=0; $i<sizeof($print2); $i++){
 if ($print2[$i] == 'idno') {
  echo "<td style='text-align:center'>".$row['idno']."</td>";
}
if ($print2[$i] == 'name') {
  echo "<td style='padding-left:20px'>".$row['lastname'].", " .$row['firstname']. " " .$middlename.".</td>";
}
if ($print2[$i] == 'contact') {
  echo "<td style='text-align:center'>".$row['contact']."</td>";
}
if ($print2[$i] == 'email') {
  echo "<td style='text-align:center'>".$row['email']."</td>";
}
if ($print2[$i] == 'specialization') {
  echo "<td style='text-align:center'>".$row['specialization']."</td>";
}
if ($print2[$i] == 'year') {
  echo "<td style='text-align:center'>".$row['yeargrad']."</td>";
}
if ($print2[$i] == 'occupation') {
  echo "<td style='text-align:center'>".$row['employedy3']."</td>";
}
if ($print2[$i] == 'remark') {
  echo "<td style='text-align:center'></td>";
}

}


echo "</tr>";
}
}

}



?>
</tbody>
</table>
<?php }

}

}
?>
<div style="float: footnote;margin-top: 50px;width: 100%;margin-left: 30px;" align="left">
    <label style="font-size: 15px;font-weight: 500;width: 100%;">Prepared by : </label>
    <br>
    <br>
    <label style="width:100%"><strong>_______________________________________________</strong></label>
    <label style="width:100;font-size: 18px;font-weight: 600">UCUAA</label>
    <label style="font-size: 15px;font-weight: 500;width: 100%;font-style: italic;">College Alumni Coordinator</label>
</div>
</div>
</div>