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


  if (isset($_POST['eventinfo'])) {
    $_SESSION['eventid'] = $_POST['eventid'];
  }
  if (isset($_SESSION['eventid'])) {
  $eventid = $_SESSION['eventid'];
  $sql = "SELECT * from event where eventid = '$eventid'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $uploadedevent = $row['uploadedevent'];
  $eventdetail = $row['eventdetail'];
  $startdate = $row['startdate'];
  $starttime = $row['starttime'];
  $enddate = $row['enddate'];
  $endtime = $row['endtime'];
  $venue = $row['venue'];
  $address = $row['address'];
  $description = $row['description'];
  $eventtype = $row['eventtype'];
  $eventtopic = $row['eventtopic'];
  $organizer = $row['organizer'];
  $sponsor = $row['sponsor'];
  $eventimage = $row['eventimage'];
  $eventdate = $row['eventdate'];
  
  }else{
     header("Location: news.php");
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

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->


</head>
<style type="text/css">
.card-body tr{
  width:20%;
    display:inline-block;

}
.card-body td{
 display:block;

}
.sorting_1{
  background-color: transparent;
}
@media screen and (max-width: 540px) {
        .card-body tr{
      width:100%;
        display:inline-block;
    }
}
@media screen and (min-width: 540px) and (max-width: 780px) {
      .card-body tr{
      width:100%;
        display:inline-block;
    }
}
.tdsize{
  height: 230px;
  text-align: center;

}
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
.backbutton{
  font-size: 15px;
  margin-right: 10px;
  color: #fff;
  background-color: #0c506f;
  padding: 10px 10px 10px 10px;
}
.backbutton:hover{
  transform: translate(0, -3px);
}
.textlabel{
  font-size: 25px;
  padding: 10px;
  text-align: justify;
  text-justify: inter-word;
  font-family:Arial Narrow, sans-serif;
  font-weight: 100;
  color: #000;
}
</style>
<body>

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
          <span>Job Posting</span>
      </li>
      <li class="nav-item">
        <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse">
          <i class="fa fa-bullhorn"></i><span>Job Posting</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav1" class="nav-content  " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../jobpost/jobhiring.php">
              <i class="bi bi-circle"></i><span >Job Hiring</span>
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
              <i class="bi bi-circle"></i><span >News</span>
            </a>
          </li>
          <li>
            <a href="event.php">
              <i class="bi bi-circle"></i><span style="color:#5F71F6">Event</span>
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
              <h1>News & Events</h1>
              <nav >
                <ol class="breadcrumb" style="background-color:transparent;">
                  <li class="breadcrumb-item"><a href="../jobpost/jobhiring.php">Home</a></li>
                  <li class="breadcrumb-item active">Event</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->

      </div><!-- End Sales Card -->

    </div>
    <div style="width:100%;text-align: right;">
      <a href="event.php"><label class="backbutton">Back to Event </label></a>
    </div>
        <div class="col-lg-12">
          <div class="row">

            <div class="col-xxl-2 ">
            </div>



            <div class="col-xxl-8 " style="background-color:#fff;box-shadow: 0 1px 8px 0 rgba(0, 0, 0, 0.2), 0 1px 20px 0 rgba(0, 0, 0, 0.19);margin-bottom: 50px;">
              <div class=" info-card sales-card" style="background-color: transparent;">
              <div style="background-color: transparent;width: 100%;text-align: center;">
              <label style="font-size: 25px;padding: 10px;color: #000;"> <?php echo $eventdetail ?></label>
              </div>
              <div style="background-color: transparent;width: 100%;text-align: center;">
              <img src='../../../graduatedtracer/uploadimage/<?php echo $eventimage ?>' alt='Profile' style='width:30%;height: same-as-width;margin-top: 20px;'>
              </div>
              <div style="background-color: transparent;width: 100%;text-align: center;padding-top: 20px;">
              <label style="font-size: 17px;padding: 10px;color: #636363;text-align: justify;text-justify: inter-word;  font-weight:600;">The Event held at <?php echo $address ?>and it's Venue in the <?php echo $venue ?> Starting at <strong style="color: #2C2C2C;"><?php echo $startdate ?> ( 
                <script type="text/javascript">
                  var date = new Date("February 04, 2011 <?php echo $starttime; ?>");
                  var options = {
                    hour: 'numeric',
                    minute: 'numeric',
                    hour12: true
                  };
                  var timeString = date.toLocaleString('en-US', options);
                  console.log(timeString);
                  document.write(timeString);
                </script>



                )</strong> to  <strong style="color: #2C2C2C;"><?php echo $enddate ?> ( 
                <script type="text/javascript">
                  var date = new Date("February 04, 2011 <?php echo $endtime; ?>");
                  var options = {
                    hour: 'numeric',
                    minute: 'numeric',
                    hour12: true
                  };
                  var timeString = date.toLocaleString('en-US', options);
                  console.log(timeString);
                  document.write(timeString);
                </script> )<strong>
              

              </label>
              </div>
              <div style="background-color: transparent;width: 100%;text-align: left;margin-top: -10px;">
              <label style="font-size: 17px;padding: 10px;color: #636363;text-align: justify;text-justify: inter-word;  font-weight:600;"> - <?php echo $eventtype ?></label>
              </div>
               <div style="background-color: transparent;width: 100%;text-align: left;margin-top: -10px;">
              <label style="font-size: 17px;padding: 10px;color: #636363;text-align: justify;text-justify: inter-word;  font-weight:600;"> - <?php echo $eventtopic ?></label>
              </div>
              <div style="background-color: transparent;width: 100%;text-align: left;margin-top: -10px;">
              <label style="font-size: 17px;padding: 10px;color: #636363;text-align: justify;text-justify: inter-word;  font-weight:600;"><?php echo $description ?>
               </label>
             </div>
              <div style="background-color: transparent;width: 100%;text-align: center;margin-top: 20px;">
              <label style="font-size: 25px;padding: 10px;color: #000;  font-weight:600;">Sponsor</label>
              <br>
              
              <?php 
              $sponsoroutput = '';
               $sponsorsplit = explode(',,,', $sponsor);  
                  for($i=0; $i<sizeof($sponsorsplit); $i++){
                  $sponsoroutput .= "<label style='font-size: 14px;color: #636363;  font-weight:600;'>".$sponsorsplit[$i]."</label><br>";

                }
                echo $sponsoroutput;

              ?>
              </div>
              <div style="background-color: transparent;width: 100%;text-align: center;margin-top: 20px;">
              <label style="font-size: 25px;padding: 10px;color: #000;  font-weight:600;">Organizer</label>
              <br>
              
              <?php 
              $organizeroutput = '';
               $organizersplit = explode(',,,', $organizer);  
                  for($i=0; $i<sizeof($organizersplit); $i++){
                  $organizeroutput .= "<label style='font-size: 14px;color: #636363;  font-weight:600;'>".$organizersplit[$i]."</label><br>";

                }
                echo $organizeroutput;

              ?>
              </div>
              <div style="background-color: transparent;width: 100%;text-align: right;margin-top: 20px;">
              <label style="font-size: 17px;padding: 10px;color: #636363;"><?php echo $eventdate ?></label>
              </div>



              </div>
            </div>










            <div class="col-xxl-2 ">
            </div>

          </div>
        </div>




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
  <script src="../assets/js/main.js?v=<?php echo time();?>"></script>

</body>

</html>

<?php
}
else{
     header("Location: ../../login/index.php");
     exit();
 }
  


?>