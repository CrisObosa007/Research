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
  $course = $row['course'];
  $college = $row['college'];
  $yeargrad = $row['yeargrad'];
  $firstname = $row['firstname'];
  $middlename = $row['middlename'];
  $lastname = $row['lastname'];
  $graduatedimage = $row['graduatedimage'];
  $collegesuser1 = $row['college'];
  $spesplit = explode(', ', $collegesuser1);  
  for($iii=0; $iii<sizeof($spesplit); $iii++){

    if ($iii==1) {

      if ($spesplit[1] == $college) {
        $course = $row['course'] . ", " . $row['course1'];
        $yeargrad = $row['yeargrad'] . ", " .  $row['yeargrad1'];
      }
    }

  }


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
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <link rel="stylesheet" 
  href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
  <script type="text/javascript" 
  src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" 
  src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">  <title>Events</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->

  <link rel="icon" type="image/png" href="assets/img/tracerlogo.png">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css?v=<?php echo time();?>" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css?v=<?php echo time();?>" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css?v=<?php echo time();?>" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css?v=<?php echo time();?>" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css?v=<?php echo time();?>" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css?v=<?php echo time();?>" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css?v=<?php echo time();?>" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/paginationcss.css?v=<?php echo time();?>">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->


</head>
<style type="text/css">

  .tdsize{
    height: auto;
    text-align: left;
    margin-bottom: 23px;
    margin: 0;
    padding: 0;

  }
  .newstitle{
    padding: 0;
    margin: 0;
    padding: 0px 20px 0px 20px;
    color: #000;
    width: 100%;
    font-size: 2.5vmin;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    margin-top: 10px;
    font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;font-weight: 600;

  }
  .company{
   padding: 0;
   margin: 0;
   padding: 0px 10px 0px 20px;
   color: #202020;
   width: 100%;
   font-size: 2.3vmin;
   margin-bottom: 10px;
   font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;font-weight: 500;
 }
 .jobtype{
  padding: 0px 20px 0px 20px;
  font-size: 1.7vmin;
  width: 100%;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;font-weight: 500;
  color: #202020;
}
.qualification{
  padding: 0px 20px 0px 20px;
  width: 55vmin;
  font-size: 1.7vmin;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;font-weight: 500;

}
</style>
<style type="text/css">
  #loading {
    position: fixed;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    opacity: 0.7;
    background-color: #fff;
    z-index: 99;
  }

  #loading-image {
    z-index: 100;
    width: 140px;
  }
  #myTable_length label,  #myTable2_length label{
    font-size: 2vmin;
    font-family:Nunito, sans-serif;
    font-weight: 700;
  }
  #myTable_filter label, #myTable2_filter label {
    font-size: 2vmin;
    font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
    font-weight: 500;
    color: #07435f;
  }
  #myTable_filter input,#myTable2_filter input{
    border-radius: 5px;
    padding: 3px 10px 3px 10px;
    border: solid 2px #0c506f;
    outline-width: 0;
    color: #000;
    background-color:#fff;

  }
  #myTable_info, #myTable2_info{
    font-size: 2vmin;
    font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
    font-weight: 500;
  }
  #myTable_paginate, #myTable2_paginate{
    font-size: 2vmin;
    font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
    font-weight: 500;
    color: #000;
  }

  .buttonleft, .buttonright{
    font-size: 2.7vmin;
    border: none;
    color: #000;
    background-color: #BEBEBE;

  }
  .buttonleft:hover, .buttonright:hover{
    background-color: #000;
    color: #fff;
  }
  .active,.column:hover{ opacity: 1 !important;!important}
  .infoseemore{
    margin: 10px 0px 5px 0px;
    width: 100%;
    color: #fff;
    background-color: #A8A8A8;
    padding: 5px 0px 5px 0px;

  }
  .infoseemore:hover{
    background-color: #919191;

    color: #F3F3F3s;
  }

  .eventdetail{
    font-size: 3vmin;
    font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
    font-weight: 600;
    color: #0c506f;
    padding: 0;
    margin: 0;
    width: 100%;

  }
  .description{
    font-size: 2.3vmin;
    font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
    font-weight: 500;
    color: #343433;
    padding: 15px 10px 15px 15px;
    margin: 0;
    width: 100%;
    text-align: justify;
    text-justify: inter-word;

  }
  .sched{
    font-size: 1.8vmin;
    font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
    font-weight: 500;
    color: #D40E0E;
    padding: 0;
    margin: 0;
    width: 100%;

  }
  .infolabel2{
    font-size: 1.9vmin;
    font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
    font-weight: 500;
    color: #343433;
    padding: 5px 0px 5px 0px;
    margin: 0;
    width: 100%;
  }
  .infolabel3{
   font-size: 2.1vmin;
   font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
   font-weight: 500;
   color: #343433;
   padding: 0;
   margin: 0;
   width: 100%;
 }
 .infolabel4{
  font-size: 1.8vmin;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
  font-weight: 600;
  color: #000;
  margin: 0;
  padding: 5px 0px 5px 0px;
  width: 100%;
}
.seemore{
  border: none;
  background-color: transparent;
  font-style: italic;
  font-weight: 600;
  color: #3d93f6;
}
.seemore:hover{
  color: #47BCFF;
}
.seeless{
  border: none;
  background-color: transparent;
  font-style: italic;
  font-weight: 600;
  color: #3d93f6;
}
.seeless:hover{
  color: #47BCFF;
}
.classinterestered{
  color: #808080;
  background-color: #fff;
  border: solid 1px #808080;
}
.classnotinterestered{
  color: #808080;
  background-color: #fff;
  border: solid 1px #808080;
}
</style>
<body>
  <div id="loading">
    <img id="loading-image" src="assets/img/loading.gif" alt="Loading..." />

  </div>


  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">


    <div class="d-flex align-items-center justify-content-between">
      <a href="jobpost.php" class="logo d-flex align-items-center">
        <img src="assets/img/tracerlogo.png" alt="">
        <span class="d-none d-lg-block">GraduateTracer</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">



        <li class="nav-item dropdown">


          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">


        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../graduatedimage/<?php echo $graduatedimage;?>" alt="Profile" class="rounded-circle" style='width: 40px;height: 40px;'>
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
              <a class="dropdown-item d-flex align-items-center" href="profile.php">
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
              <a class="dropdown-item d-flex align-items-center" href="../login/logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
  <aside id="sidebar" class="sidebar" style="background-color: #07435f;">

    <ul class="sidebar-nav" id="sidebar-nav" style="margin-top: 50px;">

      <li style="color: #B5B5B5;margin-left: 10px;padding: 7px;font-size: 13px;">
        <span>Job Post</span>
      </li>

      <li class="nav-item ">
        <a class="nav-link  " href="jobpost.php" >
          <i class="fa fa-bullhorn"></i>
          <span>Job Post</span>
        </a>
      </li>
      <li style="color: #B5B5B5;margin-left: 10px;padding: 7px;font-size: 13px;">
        <span>News</span>
      </li>

      <li class="nav-item ">
        <a class="nav-link  " href="news.php">
          <i class="fa fa-newspaper-o"></i>
          <span>News</span>
        </a>
      </li>    
      <li style="color: #B5B5B5;margin-left: 10px;padding: 7px;font-size: 13px;">
        <span>Events</span>
      </li>

      <li class="nav-item ">
        <a class="nav-link  " href="events.php"  style="background-color: #297FA7;">
          <i class="fa fa-calendar"></i>
          <span>Events</span>
        </a>
      </li>    


    </ul>

  </aside><!-- End Sidebar-->



  <main id="main" class="main">

    <section class="section dashboard">
      <div class="row">
        <!-- Sales Card -->
        <div class="col-xxl-3 col-md-4">
          <div class="pagetitle">
            <h1>Events</h1>
            <nav >
              <ol class="breadcrumb" style="background-color:transparent;">
                <li class="breadcrumb-item"><a href="jobpost.php">Home</a></li>
                <li class="breadcrumb-item active">Events</li>
              </ol>
            </nav>
          </div><!-- End Page Title -->

        </div><!-- End Sales Card -->




        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">


           <div class="col-xxl-1 col-xl-1 col-md-12 col-sm-12">
           </div>
           <!-- Recent Sales -->
           <div class="col-xxl-10 col-xl-10 col-md-12 col-sm-12">
            <div class="card recent-sales overflow-auto">

              <div class="filter">
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <!-- //closing table -->
              <div class="card-body" style="border-top: 3px solid #297fa7;background-color: #F5F5F5;">
                <ul class="nav nav-tabs nav-tabs-bordered mt-2">

                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" onclick="allevent()" style="font-size: 2.2vmin;">All Events</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" onclick="reletedevent()"  style="font-size: 2.2vmin;">Related Events</button>
                  </li>
                </ul>
                <script type="text/javascript">
                  function allevent() {
                    document.getElementById("table-responsive2").style.display = "none";
                    document.getElementById("table-responsive1").style.display = "block";
                  }
                  function reletedevent() {
                    document.getElementById("table-responsive1").style.display = "none";
                    document.getElementById("table-responsive2").style.display = "block";
                  } 
                </script>


                <!-- -------------first table ------------------------ -->
                <div class="table-responsive" id="table-responsive1" style="padding-top:20px;background-color: transparent;">

                  <table id="myTable" width="100%" style="padding-bottom: 30px;background-color: transparent;"> 
                    <thead style="display:none">  
                      <tr>  
                        <th style="border-bottom:solid 1px;" style="width: 20%;">Photo</th>
                        <th style="border-bottom:solid 1px;" style="width: 10%;">Date</th>    
                        <th style="border-bottom:solid 1px;" style="width: 20%;">Event Type</th>  
                        <th style="border-bottom:solid 1px;" style="width: 40%;">Event Topic</th>  
                        <th style="border-bottom:solid 1px;" style="width: 10%;">Action</th>  
                      </tr> 
                      <tbody>  
                        <?php 
                        $sql = "select * from event";
                        $result = $conn-> query($sql);
                        if ($result-> num_rows > 0 ){
                          while ($row=mysqli_fetch_array($result)){


                            $interested = $row['interested'];
                            $interestedresult = 0; 
                            $splitinterested = explode(',', $interested);  
                            for($i=0; $i<sizeof($splitinterested); $i++){
                              if ($splitinterested[$i] != "") {
                               $interestedresult++;
                             }

                           }

                           $notinterested = $row['notinterested'];
                           $notinterestedresult = 0; 
                           $notsplitinterested = explode(',', $notinterested);  
                           for($i=0; $i<sizeof($notsplitinterested); $i++){
                            if ($notsplitinterested[$i] != "") {
                             $notinterestedresult++;
                           }

                         }


                         $schedule;
                         $organizersplit = "";
                         $organizer = $row['organizer'];  
                         $spesplit = explode(',,,', $organizer);  
                         for($i=0; $i<sizeof($spesplit); $i++){
                          $organizersplit .= $spesplit[$i].", ";

                        }

                        $organizersplit = substr_replace($organizersplit ,"", -2);
                        $sponsorsplit = "";
                        $sponsor = $row['sponsor'];  
                        $spesplit2 = explode(',,,', $sponsor);  
                        for($i=0; $i<sizeof($spesplit2); $i++){
                          $sponsorsplit .= $spesplit2[$i].", ";

                        }
                        $sponsorsplit = substr_replace($sponsorsplit ,"", -2);

                        $eventdate = $row['eventdate'];
                        $eventdate = strtotime($eventdate);
                        $eventdate= date("M d Y" , $eventdate);
                        $startdate = $row['startdate'];
                        $startdate = strtotime($startdate);
                        $startdate= date("M d Y" , $startdate);
                        $starttime = $row['starttime'];
                        $starttime = date('h:i a ', strtotime($starttime));
                        $enddate = $row['enddate'];
                        $enddate = strtotime($enddate);
                        $enddate= date("M d Y" , $enddate);
                        $endtime = $row['endtime'];
                        $endtime = date('h:i a ', strtotime($endtime));
                        if ($row['enddate'] == "") {
                          $schedule = $startdate  . " ( " . $starttime . " to " . $endtime . " )";
                        }else{
                          $schedule = $startdate . " to " . $enddate . " ( " . $starttime . " to " . $endtime . " )";
                        }


                        $i=1;

                        echo "
                        <tr>
                        <td style='padding-bottom:30px;background-color:#f5f5f5'>






                        <div class='row' style='background-color:#fff;border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;margin:0;'>

                        <div class='col-xl-12 col-md-12 col-sm-12 pt-2'  align='center' >
                        <label class='eventdetail'>".$row['eventdetail']."</label>
                        </div>
                        <div class='col-xl-12 col-md-12 col-sm-12 mb-2' align='center'>
                        <label style='width:100%'  class='sched'><img src='assets/img/sched.png' style='height:2.5vmin;width:2.5vmin;margin:0;padding:0'>".$schedule."</label> 
                        </div>

                        <div style='padding:0px 17px 0px 17px;margin:0'>
                        <div class='row' >
                        <div class='col-xl-3 col-md-4 col-sm-12'  style=';box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;' align='center' >
                        <img id='amyImg".$row['eventid'].$i."' src='../../graduatedtracer/uploadimage/".$row['eventimage']."' style='width:20vmin;height:20vmin;margin:15px 0px 15px 0px'>

                        <div id='amyModal".$row['eventid'].$i."' class='amodal".$row['eventid'].$i."'>
                        <span class='aclose".$row['eventid'].$i."'>&times;</span>
                        <img class='amodal-content".$row['eventid'].$i."' id='aimg01".$row['eventid'].$i."'>
                        <div id='acaption".$row['eventid'].$i."'></div>
                        </div>

                        </div>
                        <div class='col-xl-9 col-md-8 col-sm-12' style=';box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;'>

                        <div class='row'>

                        <div class='col-xl-3 col-md-3 col-sm-3 col-3 pt-3' > 
                        <label class='infolabel4'>Event Type</label> 
                        </div>

                        <div class='col-xl-9 col-md-9 col-sm-9 col-9 pt-3'  > 
                        <label  class='infolabel2' >".$row['eventtype']."</label> 
                        </div>

                        <div class='col-xl-3 col-md-3 col-sm-3 col-3' > 
                        <label class='infolabel4'>Address/Venue</label> 
                        </div>

                        <div class='col-xl-9 col-md-9 col-sm-9 col-9' > 
                        <label  class='infolabel2' >".$row['address']." (".$row['venue'].") </label> 
                        </div>


                        <div class='col-xl-3 col-md-3 col-sm-3 col-3' > 
                        <label class='infolabel4'>Organizer</label> 
                        </div>

                        <div class='col-xl-9 col-md-9 col-sm-9 col-9' > 
                        <label  class='infolabel2' >".$organizersplit."</label> 
                        </div>

                        <div class='col-xl-3 col-md-3 col-sm-3 col-3' > 
                        <label class='infolabel4'>Sponsor</label> 
                        </div>

                        <div class='col-xl-9 col-md-9 col-sm-9 col-9' > 
                        <label  class='infolabel2' >".$sponsorsplit."</label> 
                        </div>

                        </div>

                        </div>  
                        </div>  
                        </div>";
                        $description = $row['description'];
                        if (strlen($description) <= 300) {
                         echo " <div class='row'>
                         <div class='col-xl-12 col-md-12 col-sm-12 col-12' > 
                         <label style='width:100%'  class='description' ><label style='margin-left:20px'></label>".$row['description']."</label> 
                         </div>

                         </div>";
                       }
                       if (strlen($description) >= 299) {
                         $description = substr($description, 0, 296);
                         echo " <div class='row' id='divSeeMore".$row['eventid']."' >
                         <div class='col-xl-12 col-md-12 col-sm-12 col-12' > 
                         <label style='width:100%'  class='description' ><label style='margin-left:20px'></label>".$description."...<button class='seemore' onclick='mySeeMore".$row['eventid']."()'>See more</button></label> 
                         </div>

                         </div>";
                       }

                       echo " <div class='row' id='divSeeLess".$row['eventid']."' style='display:none' >
                       <div class='col-xl-12 col-md-12 col-sm-12 col-12' id='divSeeMore".$row['eventid']."' > 
                       <label style='width:100%'  class='description' ><label style='margin-left:20px'></label>".$row['description']."<button  class='seeless'  onclick='mySeeLess".$row['eventid']."()'>See less</button></label> 
                       </div>

                       </div>";







                       echo "<script>
                       function mySeeMore".$row['eventid']."(){
                         document.getElementById('divSeeMore".$row['eventid']."').style.display = 'none';
                         document.getElementById('divSeeLess".$row['eventid']."').style.display = 'block';
                       }
                       function mySeeLess".$row['eventid']."(){
                         document.getElementById('divSeeMore".$row['eventid']."').style.display = 'block';
                         document.getElementById('divSeeLess".$row['eventid']."').style.display = 'none';
                       }

                       </script>";






                       echo "</div>
                       </div>





                       </div>


                       </td>


                       </tr>










                       ";
                     }
                   }
                   ?>  
                 </tbody>  
               </table>

             </div>
             <script>
              $(document).ready(function(){
                $('#myTable').dataTable();
              });
            </script>


            <!-- close table -->

            <!-- -------------second table ------------------------ -->
            <div class="table-responsive" id="table-responsive2" style="padding-top:20px;background-color: transparent;display: none;">

              <table id="myTable2" width="100%" style="padding-bottom: 30px;background-color: transparent;"> 
                <thead style="display:none">  
                  <tr>  
                    <th style="border-bottom:solid 1px;" style="width: 20%;">Photo</th>
                    <th style="border-bottom:solid 1px;" style="width: 10%;">Date</th>    
                    <th style="border-bottom:solid 1px;" style="width: 20%;">Event Type</th>  
                    <th style="border-bottom:solid 1px;" style="width: 40%;">Event Topic</th>  
                    <th style="border-bottom:solid 1px;" style="width: 10%;">Action</th>  
                  </tr> 
                  <tbody>  
                    <?php 
                    $sql = "select * from event";
                    $result = $conn-> query($sql);
                    if ($result-> num_rows > 0 ){
                      while ($row=mysqli_fetch_array($result)){


                        date_default_timezone_set('Asia/Manila');
                        $currentdate= date("Ymd");
                        $closingdate;
                        $hidingselector = "";
                        if ($row['enddate'] == "") {
                          $closingdate = $row['startdate'];
                          $closingdate = strtotime($closingdate);
                          $closingdate= date("Ymd" , $closingdate);
                          if ($closingdate < $currentdate) {
                            $hidingselector = "display:none;";
                          }
                        }else{
                          $closingdate = $row['enddate'];
                          $closingdate = strtotime($closingdate);
                          $closingdate= date("Ymd" , $closingdate);
                          if ($closingdate < $currentdate) {
                           $hidingselector = "display:none;";
                         }
                       }



                       $relatedevent = 0;
                       $collegecourse1 = $college;
                       $spesplit = explode(', ', $collegecourse1);  
                       for($i=0; $i<sizeof($spesplit); $i++){


                        $userspesplit = explode(',,,', $row['eventcollege']);  
                        for($ii=0; $ii<sizeof($userspesplit); $ii++){
                         if ($spesplit[$i] == $userspesplit[$ii]) {
                           $relatedevent = 2;

                         }
                       }
                     }





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






                    $schedule;
                    $organizersplit = "";
                    $organizer = $row['organizer'];  
                    $spesplit = explode(',,,', $organizer);  
                    for($i=0; $i<sizeof($spesplit); $i++){
                      $organizersplit .= $spesplit[$i].", ";

                    }

                    $organizersplit = substr_replace($organizersplit ,"", -2);
                    $sponsorsplit = "";
                    $sponsor = $row['sponsor'];  
                    $spesplit2 = explode(',,,', $sponsor);  
                    for($i=0; $i<sizeof($spesplit2); $i++){
                      $sponsorsplit .= $spesplit2[$i].", ";

                    }
                    $sponsorsplit = substr_replace($sponsorsplit ,"", -2);

                    $eventdate = $row['eventdate'];
                    $eventdate = strtotime($eventdate);
                    $eventdate= date("M d Y" , $eventdate);
                    $startdate = $row['startdate'];
                    $startdate = strtotime($startdate);
                    $startdate= date("M d Y" , $startdate);
                    $starttime = $row['starttime'];
                    $starttime = date('h:i a ', strtotime($starttime));
                    $enddate = $row['enddate'];
                    $enddate = strtotime($enddate);
                    $enddate= date("M d Y" , $enddate);
                    $endtime = $row['endtime'];
                    $endtime = date('h:i a ', strtotime($endtime));
                    if ($row['enddate'] == "") {
                      $schedule = $startdate  . " ( " . $starttime . " to " . $endtime . " )";
                    }else{
                      $schedule = $startdate . " to " . $enddate . " ( " . $starttime . " to " . $endtime . " )";
                    }



                    $i = 1;
                    if ($relatedevent == 2) {



                     echo "
                     <tr>
                     <td style='padding-bottom:30px;background-color:#f5f5f5'>






                     <div class='row' style='background-color:#fff;border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;margin:0;'>

                     <div class='col-xl-12 col-md-12 col-sm-12 pt-2'  align='center' >
                     <label class='eventdetail'>".$row['eventdetail']."</label>
                     </div>
                     <div class='col-xl-12 col-md-12 col-sm-12 mb-2' align='center'>
                     <label style='width:100%'  class='sched'><img src='assets/img/sched.png' style='height:2.5vmin;width:2.5vmin;margin:0;padding:0'>".$schedule."</label> 
                     </div>

                     <div style='padding:0px 17px 0px 17px;margin:0'>
                     <div class='row' >
                     <div class='col-xl-3 col-md-4 col-sm-12'  style=';box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;' align='center' >
                     <img id='bmyImg".$row['eventid'].$i."' src='../../graduatedtracer/uploadimage/".$row['eventimage']."' style='width:20vmin;height:20vmin;margin:15px 0px 15px 0px'>

                     <div id='bmyModal".$row['eventid'].$i."' class='bmodal".$row['eventid'].$i."'>
                     <span class='bclose".$row['eventid'].$i."'>&times;</span>
                     <img class='bmodal-content".$row['eventid'].$i."' id='bimg01".$row['eventid'].$i."'>
                     <div id='bcaption".$row['eventid'].$i."'></div>
                     </div>



                     </div>
                     <div class='col-xl-9 col-md-8 col-sm-12' style=';box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;'>

                     <div class='row'>

                     <div class='col-xl-3 col-md-3 col-sm-3 col-3 pt-3' > 
                     <label class='infolabel4'>Event Type</label> 
                     </div>

                     <div class='col-xl-9 col-md-9 col-sm-9 col-9 pt-3' > 
                     <label  class='infolabel2' >".$row['eventtype']."</label> 
                     </div>

                     <div class='col-xl-3 col-md-3 col-sm-3 col-3' > 
                     <label class='infolabel4'>Address/Venue</label> 
                     </div>

                     <div class='col-xl-9 col-md-9 col-sm-9 col-9' > 
                     <label  class='infolabel2' >".$row['address']." (".$row['venue'].") </label> 
                     </div>


                     <div class='col-xl-3 col-md-3 col-sm-3 col-3' > 
                     <label class='infolabel4'>Organizer</label> 
                     </div>

                     <div class='col-xl-9 col-md-9 col-sm-9 col-9' > 
                     <label  class='infolabel2' >".$organizersplit."</label> 
                     </div>

                     <div class='col-xl-3 col-md-3 col-sm-3 col-3' > 
                     <label class='infolabel4'>Sponsor</label> 
                     </div>

                     <div class='col-xl-9 col-md-9 col-sm-9 col-9' > 
                     <label  class='infolabel2' >".$sponsorsplit."</label> 
                     </div>

                     </div>

                     </div>  
                     </div>  
                     </div>";
                     $description = $row['description'];
                     if (strlen($description) <= 300) {
                       echo " <div class='row'>
                       <div class='col-xl-12 col-md-12 col-sm-12 col-12' > 
                       <label style='width:100%'  class='description' ><label style='margin-left:20px'></label>".$row['description']."</label> 
                       </div>

                       </div>";
                     }
                     if (strlen($description) >= 299) {
                       $description = substr($description, 0, 296);
                       echo " <div class='row' id='bdivSeeMore".$row['eventid']."' >
                       <div class='col-xl-12 col-md-12 col-sm-12 col-12' > 
                       <label style='width:100%'  class='description' ><label style='margin-left:20px'></label>".$description."...<button class='seemore' onclick='bmySeeMore".$row['eventid']."()'>See more</button></label> 
                       </div>

                       </div>";
                     }

                     echo " <div class='row' id='bdivSeeLess".$row['eventid']."' style='display:none' >
                     <div class='col-xl-12 col-md-12 col-sm-12 col-12' id='divSeeMore".$row['eventid']."' > 
                     <label style='width:100%'  class='description' ><label style='margin-left:20px'></label>".$row['description']."<button  class='seeless'  onclick='bmySeeLess".$row['eventid']."()'>See less</button></label> 
                     </div>

                     </div>

                     <div class='col-xxl-12  col-md-12' align='left' style='padding:0;margin:0;".$hidingselector."'>

                     <form method='POST' action=''>
                     <input type='hidden' name='eventid' value='".$row['eventid']."'>
                     <input type='hidden' name='idno' value='".$idno."'>
                     <input type='hidden' name='interested' value='".$row['interested']."'>
                     <input type='hidden' name='notinterested' value='".$row['notinterested']."'>

                     <div style='background-color:transparent;margin:0px 0px 10px 0px;padding:5px;' align='center' class='vote".$row['eventid']."' id='vote".$row['eventid']."'>

                     <label style='background-color:#E8E8E8;padding:5px 15px 5px 15px;border-radius:3px'>
                     <label style='color:#000;padding-right:10px;font-size:2vmin;font-weight:600;width:auto;'>Are you Interested in this Event?</label>
                     <button type='submit' class='classinterestered' name='submitinterested' ".$conditioninterested." >Yes</button>
                     <button type='submit' class='classnotinterestered' name='submitnotinterested' ".$conditionnotinterested.">No</button>
                     </label>

                     </form>
                     </div>
                     </div>











                     ";







                     echo "<script>
                     function bmySeeMore".$row['eventid']."(){
                       document.getElementById('bdivSeeMore".$row['eventid']."').style.display = 'none';
                       document.getElementById('bdivSeeLess".$row['eventid']."').style.display = 'block';
                     }
                     function bmySeeLess".$row['eventid']."(){
                       document.getElementById('bdivSeeMore".$row['eventid']."').style.display = 'block';
                       document.getElementById('bdivSeeLess".$row['eventid']."').style.display = 'none';
                     }

                     </script>";






                     echo "</div>
                     </div>











                     </div>



                     </div>


                     </td>


                     </tr>










                     ";

                   }
                 }
               }
               ?>  
             </tbody>  
           </table>

         </div>
         <script>
          $(document).ready(function(){
            $('#myTable2').dataTable();
          });
        </script>
        <!-- //image zoom -->
        <?php 
        $sql = "select * from event";
        $result = $conn-> query($sql);
        if ($result-> num_rows > 0 ){
          while ($row=mysqli_fetch_array($result)){
            $i=1;
            echo "  <style>#amyImg".$row['eventid'].$i.", #bmyImg".$row['eventid'].$i." {
              border-radius: 5px;
              cursor: pointer;
              transition: 0.3s;
            }

            #amyImg".$row['eventid'].$i.":hover, #bmyImg".$row['eventid'].$i.":hover {opacity: .8;}

            .amodal".$row['eventid'].$i.", .bmodal".$row['eventid'].$i." {
              position: fixed;
              width: 100%;
              top: 0;
              left: 0;
              right: 0;
              bottom: 0;
              background: rgba(86,86,86,.8);
              z-index: 100000;
              overflow: auto;
              display :none; 
              background-color: rgb(0,0,0);
              background-color: rgba(0,0,0,0.9); 
            }


            .amodal-content".$row['eventid'].$i.",.bmodal-content".$row['eventid'].$i." {
              margin: auto;
              display: block;
              width: 60vmin;
              height:60vmin;
              position: fixed;
              top: 50%;
              left: 50%;
              transform: translate(-50%, -50%);
              background-color:#fff; 
            }


            #acaption".$row['eventid'].$i.",  #bcaption".$row['eventid'].$i." {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
          }


          .amodal-content".$row['eventid'].$i.", #acaption".$row['eventid'].$i.", .bmodal-content".$row['eventid'].$i.", #bcaption".$row['eventid'].$i." {  
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
          }




          .aclose".$row['eventid'].$i.",  .bclose".$row['eventid'].$i." {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
          }

          .aclose".$row['eventid'].$i.":hover,
          .aclose".$row['eventid'].$i.":focus,.bclose".$row['eventid'].$i.":hover,
          .bclose".$row['eventid'].$i.":focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
          }


          </style>";



          echo "
          <script>
          var amodal".$row['eventid'].$i." = document.getElementById('amyModal".$row['eventid'].$i."');


          var aimg".$row['eventid'].$i." = document.getElementById('amyImg".$row['eventid'].$i."');
          var amodalImg".$row['eventid'].$i." = document.getElementById('aimg01".$row['eventid'].$i."');
          aimg".$row['eventid'].$i.".onclick = function(){
            amodal".$row['eventid'].$i.".style.display = 'block';
            amodalImg".$row['eventid'].$i.".src = this.src;
            acaptionText".$row['eventid'].$i.".innerHTML = this.alt;
          }

          var aspan".$row['eventid'].$i." = document.getElementsByClassName('aclose".$row['eventid'].$i."')[0];


          aspan".$row['eventid'].$i.".onclick = function() { 
            amodal".$row['eventid'].$i.".style.display = 'none';
          }
          </script>  "; 

          echo "
          <script>
          var bmodal".$row['eventid'].$i." = document.getElementById('bmyModal".$row['eventid'].$i."');


          var bimg".$row['eventid'].$i." = document.getElementById('bmyImg".$row['eventid'].$i."');
          var bmodalImg".$row['eventid'].$i." = document.getElementById('bimg01".$row['eventid'].$i."');
          bimg".$row['eventid'].$i.".onclick = function(){
            bmodal".$row['eventid'].$i.".style.display = 'block';
            bmodalImg".$row['eventid'].$i.".src = this.src;
            bcaptionText".$row['eventid'].$i.".innerHTML = this.alt;
          }

          var bspan".$row['eventid'].$i." = document.getElementsByClassName('bclose".$row['eventid'].$i."')[0];


          bspan".$row['eventid'].$i.".onclick = function() { 
            bmodal".$row['eventid'].$i.".style.display = 'none';
          }
          </script>  "; 








        }
      }?>
    </div>
  </div>
</div>
</div>
</div>
<!-- close table -->
</section>

</main><!-- End #main -->


<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.min.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

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