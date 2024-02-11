<?php 
session_start();
include '../dbhelper.php';


if (isset($_SESSION['idno']) && isset($_SESSION['password'])) {
  //USERNAME LOGIN
  $idno = $_SESSION['idno'];
  $sql = "SELECT * from graduated where idno = '$idno'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $skill  = $row['specialization'];
  $course = $row['course'];
  $yeargrad = $row['yeargrad'];
  $firstname = $row['firstname'];
  $middlename = $row['middlename'];
  $lastname = $row['lastname'];
  $graduatedimage = $row['graduatedimage'];


 if (isset($_POST['submitinterested'])) {
   $eventid = $_POST['eventid'];
   $interested = $_POST['interested'];
   $notinterested = $_POST['notinterested'];
   $idno = $_POST['idno'];

   $sql = "SELECT * from event where eventid = '$eventid'";
   $result = mysqli_query($conn,$sql);
   $row = mysqli_fetch_array($result);
   $oldinterested  = $row['interested'];
   $oldnotinterested  = $row['notinterested'];

    $oldinterestedresult = ""; 
    $splitoldinterested = explode(',', $oldinterested);  
    for($i=0; $i<sizeof($splitoldinterested); $i++){
      if ($idno != $splitoldinterested[$i] && $splitoldinterested[$i] != "") {
         $oldinterestedresult .= ",".$splitoldinterested[$i].",";
      }
   
    }
    $oldnotinterestedresult = ""; 
    $splitoldnotinterested = explode(',', $oldnotinterested);  
    for($i=0; $i<sizeof($splitoldnotinterested); $i++){
      if ($idno != $splitoldnotinterested[$i] && $splitoldnotinterested[$i] != "") {
         $oldnotinterestedresult .= ",".$splitoldnotinterested[$i].",";
      }
   
    }

    $oldinterestedresult .= $idno.",";



   $resultinterested=mysqli_query($conn,"UPDATE event set interested='$oldinterestedresult' where eventid='$eventid'");
   $resultnotinterested=mysqli_query($conn,"UPDATE event set notinterested='$oldnotinterestedresult' where eventid='$eventid'");
 }










   if (isset($_POST['submitnotinterested'])) {
  $eventid = $_POST['eventid'];
   $interested = $_POST['interested'];
   $notinterested = $_POST['notinterested'];
   $idno = $_POST['idno'];

   $sql = "SELECT * from event where eventid = '$eventid'";
   $result = mysqli_query($conn,$sql);
   $row = mysqli_fetch_array($result);
   $oldinterested  = $row['interested'];
   $oldnotinterested  = $row['notinterested'];

    $oldinterestedresult = ""; 
    $splitoldinterested = explode(',', $oldinterested);  
    for($i=0; $i<sizeof($splitoldinterested); $i++){
      if ($idno != $splitoldinterested[$i] && $splitoldinterested[$i] !="") {
         $oldinterestedresult .= ",".$splitoldinterested[$i].",";
      }
   
    }
    $oldnotinterestedresult = ""; 
    $splitoldnotinterested = explode(',', $oldnotinterested);  
    for($i=0; $i<sizeof($splitoldnotinterested); $i++){
      if ($idno != $splitoldnotinterested[$i] && $splitoldnotinterested[$i] != "") {
         $oldnotinterestedresult .= ",".$splitoldnotinterested[$i].",";
      }
   
    }

    $oldnotinterestedresult .= $idno.",";



   $resultinterested=mysqli_query($conn,"UPDATE event set interested='$oldinterestedresult' where eventid='$eventid'");
   $resultnotinterested=mysqli_query($conn,"UPDATE event set notinterested='$oldnotinterestedresult' where eventid='$eventid'");
   }




?>
<!DOCTYPE html>
<html lang="en">

<head>

  <script type="text/javascript">
window.alert = function() {};

// or simply
alert = function() {};

  </script>
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <link rel="stylesheet" 
  href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
  <script type="text/javascript" 
  src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" 
  src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">  <title>Event</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/tracerlogo.png" rel="icon">


  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css?v=<?php echo time();?>" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css?v=<?php echo time();?>" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css?v=<?php echo time();?>" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css?v=<?php echo time();?>" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css?v=<?php echo time();?>" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css?v=<?php echo time();?>" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css?v=<?php echo time();?>" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../assets/css/paginationcss.css?v=<?php echo time();?>">
  <link rel="stylesheet" type="text/css" href="newsandevent.css?v=<?php echo time();?>">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->


</head>
<style type="text/css">

.newstopic{
  float: left;
  padding-top: 10px;
  color: #008CB2;
  width: 100%;
  padding: 0xp;
  text-align: left;
  font-size: 13px;
  padding-bottom: 10px;
  margin-top: -20px;
}
.newstopic:hover{
  color: #00617C;
}
.classinterestered{
  padding: 3px 7px 3px 7px;
  background: #fff;
  color: green;
  border: none;
  font-size:1.7vmin
}
.classinterestered:hover{
  background: green;
  color: #fff;
}
.classnotinterestered{
  padding: 3px 10px 3px 10px;
  background: #fff;
  color: red;
  border: none;
  font-size:1.7vmin;
}
.classnotinterestered:hover{
  background-color: red;
  color: #fff;
}
#myTable_length label{
  font-size: 2vmin;
  font-family:Nunito, sans-serif;
  font-weight: 700;
}
#myTable_filter label {
    font-size: 2vmin;
    font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
    font-weight: 500;
    color: #07435f;
}
#myTable_filter input{
  border-radius: 5px;
  padding: 3px 10px 3px 10px;
  border: solid 2px #0c506f;
   outline-width: 0;
   color: #000;
   background-color:#fff;

}
#myTable_info{
      font-size: 2vmin;
    font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
    font-weight: 500;
}
#myTable_paginate{
        font-size: 2vmin;
    font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
    font-weight: 500;
    color: #000;
}
</style>
<body>
<div id="loading">
      <img id="loading-image" src="../assets/img/loading.gif" alt="Loading..." />

</div>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">


    <div class="d-flex align-items-center justify-content-between">
     <a href="../jobpost/jobhiring.php" class="logo d-flex align-items-center">
        <img src="../assets/img/tracerlogo.png" alt="">
        <span class="d-none d-lg-block">GraduateTracer</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">


        <li class="nav-item dropdown">


        </li><!-- End Messages Nav -->
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../../graduatedimage/<?php echo $graduatedimage;?>" alt="Profile" class="rounded-circle" style='width: 40px;height: 40px;'>
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $firstname . " " .$middlename . " " . $lastname; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $firstname . " " .$middlename . " " . $lastname; ?></h6>
              <span>Username</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../profile.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../../login/logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

    
         <li style="color: #B5B5B5;margin-left: 10px;padding: 7px;font-size: 13px;">
          <span>Job Post</span>
      </li>
      <li class="nav-item">
        <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse">
          <i class="fa fa-bullhorn"></i><span>Job Post</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav1" class="nav-content  " data-bs-parent="#sidebar-nav">
              <li>
            <a href="../jobpost/recommendedjob.php">
              <i class="bi bi-circle"></i><span>Recommended Job</span>
            </a>
          </li>
          <li>
            <a href="../jobpost/jobhiring.php">
              <i class="bi bi-circle"></i><span>Job Vacancy</span>
            </a>
          </li>
      
        </ul>
              </li><!-- End Components Nav -->
      <li style="color: #B5B5B5;margin-left: 10px;padding: 7px;font-size: 13px;">
          <span>News & Event</span>
      </li>
      <li class="nav-item">
        <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse">
          <i class="fa fa-newspaper-o"></i><span>News & Event</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav1" class="nav-content  " data-bs-parent="#sidebar-nav">
          <li>
            <a href="news.php">
              <i class="bi bi-circle"></i><span>News</span>
            </a>
          </li>
          <li>
            <a href="event.php">
              <i class="bi bi-circle"></i><span  style="color:#5F71F6">Event</span>
            </a>
          </li>
         
        </ul>
      </li><!-- End Components Nav -->

    </ul>

  </aside><!-- End Sidebar-->



  <main id="main" class="main">

    <section class="section dashboard">
      <div class="row">
        <!-- Sales Card -->
       <div class="col-xxl-3 col-md-4">
              <div class="pagetitle">
              <h1>Event</h1>
              <nav >
                <ol class="breadcrumb" style="background-color:transparent;">
                  <li class="breadcrumb-item"><a href="../jobpost/jobhiring.php">Home</a></li>
                  <li class="breadcrumb-item active">Event</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->

      </div><!-- End Sales Card -->




        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">


            <div class="col-1">
            </div>
            <!-- Recent Sales -->
            <div class="col-10">
              <div class="card recent-sales overflow-auto">

                <div class="card-body" style="border-top: 3px solid #297fa7;">
                            <div class="table-responsive"  style="padding-top:20px;">
<table id="myTable" width="100%" style=""> 
        <thead style="display:none">  
          <tr>  
            <th style="border-bottom:solid 1px;" style="width: 20%;">Photo</th>
            <th style="border-bottom:solid 1px;" style="width: 10%;">Date</th>    
            <th style="border-bottom:solid 1px;" style="width: 20%;">Event Type</th>  
            <th style="border-bottom:solid 1px;" style="width: 40%;">Event Topic</th>  
            <th style="border-bottom:solid 1px;" style="width: 10%;">Action</th>  
          </tr> 
        </thead>  
        
        
          <?php 
          $sql = "SELECT * FROM event where uploadedevent like '%$course%'";
          $result = mysqli_query($conn,$sql);
          while ($row = mysqli_fetch_array($result)) { 
        $organizersplit = "";
        $organizer = $row['organizer'];  
        $spesplit = explode(',,,', $organizer);  
        for($i=0; $i<sizeof($spesplit); $i++){
          $organizersplit .= $spesplit[$i].", ";

        }
        $organizersplit = substr($organizersplit, 0, -2);


        $sponsorsplit = "";
        $sponsor = $row['sponsor'];  
        $spesplit2 = explode(',,,', $sponsor);  
        for($i=0; $i<sizeof($spesplit2); $i++){
          $sponsorsplit .= $spesplit2[$i].", ";

        }
        $sponsorsplit = substr($sponsorsplit, 0, -2);
       
        $eventdate = $row['eventdate'];
        $eventdate = strtotime($eventdate);
        $eventdate= date("F d Y" , $eventdate);
        $startdate = $row['startdate'];
        $startdate = strtotime($startdate);
        $startdate= date("F d Y" , $startdate);
        $starttime = $row['starttime'];
        $starttime = date('h:i a ', strtotime($starttime));
        $enddate = $row['enddate'];
        $enddate = strtotime($enddate);
        $enddate= date("F d Y" , $enddate);
        $endtime = $row['endtime'];
        $endtime = date('h:i a ', strtotime($endtime));
        $eventid = $row['eventid'];


        $conditioninterested ="";
        $interested = $row['interested'];  
        $interestedsplit2 = explode(',', $interested);  
        for($i=0; $i<sizeof($interestedsplit2); $i++){
          if ($interestedsplit2[$i] == $idno) {
            $conditioninterested = "style='background-color:green;color:#fff' disabled";
          }

        }

        $conditionnotinterested = "";
        $notinterested = $row['notinterested'];  
        $notinterestedsplit2 = explode(',', $notinterested);  
        for($i=0; $i<sizeof($notinterestedsplit2); $i++){
          if ($notinterestedsplit2[$i] == $idno) {
            $conditionnotinterested = "style='background-color:red;color:#fff' disabled";
          }

        }





             echo "<tr ><td style='background-color:transparent;border:none;' class='tdsize'>
            <div class='row' style='background-color:#F3F3F3;padding: 10px 20px 20px 20px;margin-bottom:20px;box-shadow: rgba(0, 0, 0, 0.0) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;'>


            <div class='col-xxl-12  col-md-12' style='margin-top: 20px;' align='center'>
            <label style='width:100%;font-size:3vmin' class='title'>".$row['eventdetail']."</label>
            <label style='width:100%;font-size:1.7vmin' class='dateuploaded'>".$eventdate."</label>
            <label class='textlabel'><label class='titlelabel'>Starting Date:</label> ".$startdate."( ".$starttime." ) to ".$enddate."( ".$endtime." )</label>
            </div>
  
            <div class='col-xxl-4  col-md-4'  align='left'>
              <div style='width:100%' align='center'>
               <img src='../../../graduatedtracer/uploadimage/".$row['eventimage']."' alt='Profile' style='width:20vmin;height:20vmi;margin-bottom:10px'>
              </div>
                <label style='width:100%;text-align:justify;font-size:1.7vmin;padding:0;margin:0;' class='textlabel'><label class='titlelabel'>Address :</label> ".$row['venue']."</label>
               <label style='width:100%'text-align:justify;font-size:1.7vmin;padding:0;margin:0;' class='textlabel'><label class='titlelabel'>Venue :</label> ".$row['address']."</label>
             </div>



             <div class='col-xxl-8  col-md-8' style='margin-top: 0px;' align='left' id='myDIV".$eventid."'>
              <label class='description eventdescription' style='margin-top:20px;margin-bottom:20px'>";

               if(strlen($row['description']) > 450){
                    echo    substr_replace($row['description'],"", 450). "<button onclick='myFunction".$eventid."()' class='readbtn'> Read More...</button>";
                  }
                  else{
                    echo $row['description'];
                  }


              echo "



              </label>
  
        
              <label style='width:100%;font-size:1.7vmin;padding:0;margin:0;'class='textlabel'><label class='titlelabel'>Sponsor/s : </label> ".$sponsorsplit."</label>
              <label style='width:100%;font-size:1.7vmin;padding:0;margin:0;' class='textlabel'><label class='titlelabel'>Organizer/s : </label> ".$organizersplit."</label>
             </div>
            


             <div class='col-xxl-7  col-md-7' style='margin-top: 20px;display:none' align='left' id='myDIV2".$eventid."' >
              <label class='description'>".$row['description']."<button onclick='myFunction2".$eventid."()' class='readbtn'>Read less..</button></label>
              <br>
              <label style='width:100%;font-size:1.7vmin;padding:0;margin:0;'class='textlabel'><label class='titlelabel'>Sponsor/s : </label> ".$sponsorsplit."</label>
              <label style='width:100%;font-size:1.7vmin;padding:0;margin:0;' class='textlabel'><label class='titlelabel'>Organizer/s : </label> ".$organizersplit."</label>
             </div>";

             ?>
             <script type="text/javascript">
               function myFunction<?php echo $eventid ?>() {
                  var x = document.getElementById("myDIV<?php echo $eventid ?>");
                  if (x.style.display === "none") {
                    x.style.display = "block";
                  } else {
                    x.style.display = "none";
                    document.getElementById("myDIV2<?php echo $eventid ?>").style.display = "block";
                  }
                }
             </script>
              <script type="text/javascript">
               function myFunction2<?php echo $eventid ?>() {
                  var x = document.getElementById("myDIV2<?php echo $eventid ?>");
                  if (x.style.display === "none") {
                    x.style.display = "block";
                  } else {
                    x.style.display = "none";
                    document.getElementById("myDIV<?php echo $eventid ?>").style.display = "block";
                  }
                }
             </script>



                 <?php
          $eventdate1 = $row['enddate'];
         $eventdate1 = strtotime($eventdate1);
         $eventdate1= date("Ymd" ,$eventdate1);


         date_default_timezone_set('Asia/Manila');
         $currentdate= date("Ymd"); 

       
         if ($eventdate1 < $currentdate) {

           echo "<style type='text/css'>.vote".$row['eventid']."{display:none;}</style>";


         }




                 echo "  
            <div class='col-xxl-12  col-md-12' align='left'>
            
            <form method='POST' action=''>
            <input type='hidden' name='eventid' value='".$eventid."'>
            <input type='hidden' name='idno' value='".$idno."'>
            <input type='hidden' name='interested' value='".$row['interested']."'>
            <input type='hidden' name='notinterested' value='".$row['notinterested']."'>

            <div style='background-color:#DEE1DD;margin-bottom:10px;padding:5px' align='center' class='vote".$row['eventid']."'> 
            <label style='color:#000;padding-right:10px;font-size:2vmin;font-weight:400'>Are you Interested in this Event?</label>
            <button type='submit' class='classinterestered' name='submitinterested' ".$conditioninterested." >Yes</button>
            <button type='submit' class='classnotinterestered' name='submitnotinterested' ".$conditionnotinterested.">No</button>
            </form>
            </div>



            


            </div>






            </div></td></tr>";

          }

          ?>
        
     
     </table>
  </div>
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>

                </div>

              </div>
            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->

    </section>

  </main><!-- End #main -->


  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>


<script>
  $(window).on('load', function () {
    $('#loading').hide();
  }) 
</script>
</body>
</html>

<?php
}
else{
     header("Location: ../../login/index.php");
     exit();
 }
  


?>