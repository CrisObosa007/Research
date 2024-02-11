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
  <meta content="width=device-width, initial-scale=1.0" name="viewport">  <title>Recommended Job</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
   
   <link rel="icon" type="image/png" href="../assets/img/tracerlogo.png">

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
  width:50%;
    display:inline-block;

}
.card-body td{
 display:block;

}
.sorting_1{
  background-color: transparent;
}
@media screen and (max-width: 600px) {
        .card-body tr{
      width:100%;
        display:inline-block;
    }
}

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
text-overflow: ellipsis;
overflow: hidden;
display: inherit;
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
      <a href="jobhiring.php" class="logo d-flex align-items-center">
        <img src="../assets/img/tracerlogo.png" alt="">
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
            <a href="recommendedjob.php">
              <i class="bi bi-circle"></i><span style="color:#5F71F6">Recommended Job</span>
            </a>
          </li>
          <li>
            <a href="jobhiring.php">
              <i class="bi bi-circle"></i><span >Job Vacancy</span>
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
            <a href="../newsandevent/news.php">
              <i class="bi bi-circle"></i><span>News</span>
            </a>
          </li>
          <li>
            <a href="../newsandevent/event.php">
              <i class="bi bi-circle"></i><span>Event</span>
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
              <h1>Job Post</h1>
              <nav >
                <ol class="breadcrumb" style="background-color:transparent;">
                  <li class="breadcrumb-item"><a href="jobhiring.php">Home</a></li>
                  <li class="breadcrumb-item active">Recommended Job</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->

      </div><!-- End Sales Card -->



                  <div class="col-lg-12">
                       <div class="col-xxl-1 col-md-1">
                       </div>
                       <div class="col-xxl-10 col-md-10">
                            <label style="   font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;font-weight: 500;font-size: 3vmin;color: #202020;">Recommended jobs based on your skill/s</label>
                       </div>
                  </div>
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">


             <div class="col-1">
             </div>
            <!-- Recent Sales -->
            <div class="col-10">
              <div class="card recent-sales overflow-auto">

     
<!-- //closing table -->
                <div class="card-body" style="border-top: 3px solid #297fa7;">
                            <div class="table-responsive" style="padding-top:20px;">
                
<table id="myTable"  style="padding-bottom: 30px;"> 
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
  $spesplit;
  $spesplit = explode(', ', $skill);  
  for($i=0; $i<sizeof($spesplit); $i++){
    $querysplit = $spesplit[$i];

  }
  for($x = 15; $x >= $i; $x--){
    $spesplit[$x] = "asdasdsadsa";

  }   

          $sql = "SELECT * FROM jobpost where jobstatus = 'approved' and ( specialization like '%$spesplit[0]%' || specialization like '%$spesplit[1]%' || specialization like '%$spesplit[2]%' || specialization like '%$spesplit[3]%' || specialization like '%$spesplit[4]%' || specialization like '%$spesplit[5]%' || specialization like '%$spesplit[6]%' || specialization like '%$spesplit[7]%' || specialization like '% $spesplit[8]%' || specialization like '%$spesplit[9]%' || specialization like '%$spesplit[10]%' || specialization like '%$spesplit[11]%' ||specialization like '%$spesplit[12]%' || specialization like '%$spesplit[13]%' || specialization like '%$spesplit[14]%' || specialization like '%$spesplit[15]%')";
          $result = mysqli_query($conn,$sql);
          while ($row = mysqli_fetch_array($result)) { 
            $qualificationsplit = "";
            $qualification = $row['qualification'];  
            $spesplit = explode(',,,', $qualification);  
            
            echo "<tr ><td style='background-color:transparent;border:none;' class='tdsize'>
            <div class='col-xxl-12' >
              <div class='card info-card sales-card'  style='background-color:transparent;border-radius:10px;box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;'>
                <form method='POST' action='recommendedjobinfo.php'>
                <button id='jobhiring".$row['id']."' name='jobhiring' style='border:none;background-color:transparent;display:none'></button>
                <input type='hidden' name='jobid' value='".$row['id']."'>
                
                <label class='newstitle' for='jobhiring".$row['id']."'>".$row['jobtitle']."</label>
                <label class='company' for='jobhiring".$row['id']."'>".$row['companyname']."</label>
                <div style='width:100%'>
                <label class='jobtype' for='jobhiring".$row['id']."'><label style='background-color: #transparent;box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;;  padding: 5px 20px 5px 20px;border-radius: 5px;'>    <img src='../assets/img/suitcase.png' style='height:2.5vmin;width:2.5vmin;margin-top:-5px;margin-right:5px'>".$row['jobtype']."</label></label>
                </div>


                <label class='qualification' for='jobhiring".$row['id']."'>• ".$spesplit[0]."</label>
                </form>
                
                
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
            </div>
          </div>
        </div>
  <!-- close table -->
    
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