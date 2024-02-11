<?php 
session_start();
include '../dbhelper.php';


if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
  //USERNAME LOGIN
  $username = $_SESSION['username'];
  if ($username == "admin") {
    $course = 'Admin';
    ?>
    <!DOCTYPE html>
    <html lang="en">
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
      .table-responsive{
        padding-top: 30px;
      }
      .table_td{
        font-size: 1.7vmin;
      }
      #myTable1_length label,#myTable2_length label,#myTable3_length label,#myTable4_length label,#myTable5_length label,#myTable6_length label,#myTable7_length label{
        font-size: 2vmin;
        font-family:Nunito, sans-serif;
        font-weight: 700;
      }
      #myTable1_filter label,#myTable2_filter label,#myTable3_filter label,#myTable4_filter label,#myTable5_filter label,#myTable6_filter label,#myTable7_filter label {
        font-size: 2vmin;
        font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
        font-weight: 500;
        color: #07435f;
      }
      #myTable1_filter input,#myTable2_filter input,#myTable3_filter input,#myTable4_filter input,#myTable5_filter input,#myTable6_filter input,#myTable7_filter input{
        border-radius: 5px;
        padding: 3px 10px 3px 10px;
        border: solid 2px #0c506f;
        outline-width: 0;
        color: #000;
        background-color:#fff;

      }
      #myTable1_info, #myTable2_info, #myTable3_info, #myTable4_info, #myTable5_info, #myTable6_info, #myTable7_info{
        font-size: 2vmin;
        font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
        font-weight: 500;
      }
      #myTable1_paginate,#myTable2_paginate,#myTable3_paginate,#myTable4_paginate,#myTable5_paginate,#myTable6_paginate,#myTable7_paginate{
        font-size: 2vmin;
        font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
        font-weight: 500;
        color: #000;
      }
      .labelapproved{
        background-color: #25C900;
        width: 70%;
        margin:0px 15% 0px 15%;
        color: #fff;
        border-radius: 10px;
        padding: 2px 0px 2px 0px;
        font-size: 1.7vmin;
        font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
        font-weight: 600;
      }
      .labeldenied{
       background-color: #FF3030;
       width: 70%;
       margin:0px 15% 0px 15%;
       color: #fff;
       border-radius: 10px;
       padding: 2px 0px 2px 0px;
       font-size: 1.7vmin;
       font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
       font-weight: 600;
     }
     .labelupdated{
      background-color: #25C900;
      width: 70%;
      margin:0px 15% 0px 15%;
      color: #fff;
      border-radius: 10px;
      padding: 2px 0px 2px 0px;
      font-size: 1.7vmin;
      font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
    }
    .labelcancelled{
     background-color: #FF3030;
     width: 70%;
     margin:0px 15% 0px 15%;
     color: #fff;
     border-radius: 10px;
     padding: 2px 0px 2px 0px;
     font-size: 1.7vmin;
     font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
   }
   .labelupload{
     background-color: #00C7C7;
     width: 70%;
     margin:0px 15% 0px 15%;
     color: #fff;
     border-radius: 10px;
     padding: 2px 0px 2px 0px;
     font-size: 1.7vmin;
     font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
   }
 </style>
 <head>
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <link rel="stylesheet" 
  href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
  <script type="text/javascript" 
  src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" 
  src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Activity Log</title>
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
  <link rel="stylesheet" type="text/css" href="job.css?v=<?php echo time();?>">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->


</head>

<body>
  <div id="loading">
    <img id="loading-image" src="../assets/img/loading.gif" alt="Loading..." />
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="assets/img/tracerlogo.png" alt="">
        <span class="d-none d-lg-block">GraduateTracer</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

       


        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../assets/img/<?php 
            $sql = "SELECT * FROM college WHERE username='$username'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result);
            $image = $row['image'];
            echo $image;

          ?>" alt="Profile" class="rounded-circle" style='width: 40px;height: 40px;'>
          <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
        </a><!-- End Profile Iamge Icon -->


        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6>Admin</h6>
            <span>User</span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="../accountsetting.php">
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
              <span>Log out</span>
            </a>
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar" style="background-color: #07435f;">

 
  <ul class="sidebar-nav" id="sidebar-nav" style="margin-top: 50px;">

    <li style="color: #B5B5B5;margin-left: 10px;padding: 7px;font-size: 13px;">
      <span>Dashboard</span>
    </li>

    <li class="nav-item ">
      <a class="nav-link  " href="../dashboard.php" >
        <i class="fa fa-bar-chart"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <li style="color: #B5B5B5;margin-left: 10px;padding: 7px;font-size: 13px;" >
      <span>Record</span>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav3" data-bs-toggle="collapse" >
        <i class="fa fa-bullhorn"></i><span>Record</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav3" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
        <a href="../record/college.php">
              <i class="bi bi-circle"></i><span>List of Colleges</span>
            </a>
          </li>
          <li>
            <a href="../record/addcollege.php">
              <i class="bi bi-circle"></i><span>Add College / Course</span>
            </a>
        </li>
      </ul>
    </li><!-- End Components Nav -->
    <li style="color: #B5B5B5;margin-left: 10px;padding: 7px;font-size: 13px;">
      <span>Job Posting</span>
    </li>
    <li class="nav-item">
         <a class="nav-link collapsed" data-bs-target="#components-nav1" data-bs-toggle="collapse">
        <i class="fa fa-bullhorn"></i><span>Job Posting
        <span style="position: absolute;right: 0;margin-right: 40px;transition: none;">
         <?php 
         $sql1 = "SELECT * FROM college WHERE username='admin'";
         $result1 = mysqli_query($conn,$sql1);
         $row1 = mysqli_fetch_array($result1);
         $notificationcount = $row1['notification'];
         echo $notificationcount;
         ?>  
       </span></span><i class="bi bi-chevron-down ms-auto"></i>
      </a>

      <ul id="components-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="../jobpost/jobupload.php">
            <i class="bi bi-circle"></i><span>Job Upload</span>
          </a>
        </li>
        <li>
          <a href="../jobpost/pendingjob.php">
            <i class="bi bi-circle"></i><span>Pending Job Approval (Guidance)</span>
          </a>
        </li>
        <li>
          <a href="../jobpost/jobhiring.php">
            <i class="bi bi-circle"></i><span>Job Hiring</span>
          </a>
        </li>
        <li>
          <a href="../jobpost/jobclosed.php">
            <i class="bi bi-circle"></i><span>Job Closed</span>
          </a>
        </li>
        <li>
          <a href="../jobpost/disapproved.php">
               <i class="bi bi-circle"></i><span style=>Disapproved </span>
     <span style="margin-left: 15px;background-color: #DF330D;<?php
          if ($notificationcount == "") {
            echo "background-color:transparent;";
          }
        ?>padding: 3px 8px 3px 8px;border-radius: 20px;">
        <?php 

        echo $notificationcount;
        ?>  
    </span> 
    </a>
        </li>
        
      </ul>
    </li><!-- End Components Nav -->
    <li style="color: #B5B5B5;margin-left: 10px;padding: 7px;font-size: 13px;">
      <span>News & Event</span>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse">
        <i class="fa fa-newspaper-o"></i><span >News & Events</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav2" class="nav-content  collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="../newsandevents/news.php">
            <i class="bi bi-circle"></i><span >News</span>
          </a>
        </li>
        <li>
          <a href="../newsandevents/events.php">
            <i class="bi bi-circle"></i><span >Events</span>
          </a>
        </li>
      </ul>
    </li><!-- End Components Nav -->
    <li style="color: #B5B5B5;margin-left: 10px;padding: 7px;font-size: 13px;">
      <span>Activity Log</span>
    </li>
    <li class="nav-item">

      <a class="nav-link collapsed" data-bs-target="#components-nav5" data-bs-toggle="collapse"  style="background-color: #297FA7;">
        <i class="fa fa-history"></i><span>Activity Log</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav55" class="nav-content  " data-bs-parent="#sidebar-nav">
        <li>
          <a href="../activitylog/record.php">
            <i class="bi bi-circle"></i><span  style="color:#ADADAD">Activity Log</span>
          </a>
        </li>

      </ul>
    </li><!-- End Components Nav -->  
  </aside><!-- End Sidebar-->


  <main id="main" class="main">

    <section class="section dashboard">
      <div class="row">
        <!-- Sales Card -->
        <div class="col-xxl-3 col-md-4">
          <div class="pagetitle">
            <h1>Activity Log</h1>
            <nav >
              <ol class="breadcrumb" style="background-color:transparent;">
                <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Activity Log</li>
              </ol>
            </nav>
          </div><!-- End Page Title -->

        </div><!-- End Sales Card -->




        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">



            <!-- Recent Sales -->
            <div class="col-12">
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

                <div class="card-body" style="border-top: 3px solid #297fa7;">
                  <ul class="nav nav-tabs nav-tabs-bordered">

                    <li class="nav-item">
                      <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#record-overview" onclick="Record()" style="font-size: 2.2vmin;">Record</button>
                    </li>

                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#jobpost-overview" onclick="Jobpost()"  style="font-size: 2.2vmin;">Job Post</button>
                    </li>
                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#news-overview" onclick="News()"  style="font-size: 2.2vmin;">News</button>
                    </li>
                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#event-overview" onclick="Event()"  style="font-size: 2.2vmin;">Event</button>
                    </li>
                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#alumni-overview" onclick="Alumni()"  style="font-size: 2.2vmin;">Alumni</button>
                    </li>
                     <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#alumni-overview" onclick="Report()"  style="font-size: 2.2vmin;">Report</button>
                    </li>
                    
                     <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#alumni-overview" onclick="Login()"  style="font-size: 2.2vmin;">Login</button>
                    </li>
                    
                  </ul>
                  <script type="text/javascript">
                    function Record() {
                      document.getElementById("table-responsive1").style.display = "block";
                      document.getElementById("table-responsive2").style.display = "none";
                      document.getElementById("table-responsive3").style.display = "none";
                      document.getElementById("table-responsive4").style.display = "none";
                      document.getElementById("table-responsive5").style.display = "none";
                            document.getElementById("table-responsive6").style.display = "none";
                      document.getElementById("table-responsive7").style.display = "none";
                    }
                    function Jobpost() {
                      document.getElementById("table-responsive1").style.display = "none";
                      document.getElementById("table-responsive2").style.display = "block";
                      document.getElementById("table-responsive3").style.display = "none";
                      document.getElementById("table-responsive4").style.display = "none";
                      document.getElementById("table-responsive5").style.display = "none";
                           document.getElementById("table-responsive6").style.display = "none";
                      document.getElementById("table-responsive7").style.display = "none";
                    }
                    function News() {
                      document.getElementById("table-responsive1").style.display = "none";
                      document.getElementById("table-responsive2").style.display = "none";
                      document.getElementById("table-responsive3").style.display = "block";
                      document.getElementById("table-responsive4").style.display = "none";
                      document.getElementById("table-responsive5").style.display = "none";
                           document.getElementById("table-responsive6").style.display = "none";
                      document.getElementById("table-responsive7").style.display = "none";
                    }
                    function Event() {
                      document.getElementById("table-responsive1").style.display = "none";
                      document.getElementById("table-responsive2").style.display = "none";
                      document.getElementById("table-responsive3").style.display = "none";
                      document.getElementById("table-responsive4").style.display = "block";
                      document.getElementById("table-responsive5").style.display = "none";
                           document.getElementById("table-responsive6").style.display = "none";
                      document.getElementById("table-responsive7").style.display = "none";
                    }
                    function Alumni() {
                      document.getElementById("table-responsive1").style.display = "none";
                      document.getElementById("table-responsive2").style.display = "none";
                      document.getElementById("table-responsive3").style.display = "none";
                      document.getElementById("table-responsive4").style.display = "none";
                      document.getElementById("table-responsive5").style.display = "block";
                           document.getElementById("table-responsive6").style.display = "none";
                      document.getElementById("table-responsive7").style.display = "none";
                    }
                         function Report() {
                      document.getElementById("table-responsive1").style.display = "none";
                      document.getElementById("table-responsive2").style.display = "none";
                      document.getElementById("table-responsive3").style.display = "none";
                      document.getElementById("table-responsive4").style.display = "none";
                      document.getElementById("table-responsive5").style.display = "none";
                            document.getElementById("table-responsive6").style.display = "block";
                      document.getElementById("table-responsive7").style.display = "none";
                    }
                         function Login() {
                      document.getElementById("table-responsive1").style.display = "none";
                      document.getElementById("table-responsive2").style.display = "none";
                      document.getElementById("table-responsive3").style.display = "none";
                      document.getElementById("table-responsive4").style.display = "none";
                      document.getElementById("table-responsive5").style.display = "none";
                            document.getElementById("table-responsive6").style.display = "none";
                      document.getElementById("table-responsive7").style.display = "block";
                    }
                  </script>
                  <!-- //table 1 start -->
                  <div class="table-responsive"  id="table-responsive1" >
                    <table id="myTable1" class="table table-striped" width="100%" style=""> 
                      <thead>  
                        <tr>  
                         <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 18%">Date</th>
                         <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 10%">User</th>    
                         <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 15%">Idno</th>  
                         <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 20%">Name</th>  
                         <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 20%">Status</th> 
                         <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 17%">Reason</th> 
                       </tr>  
                     </thead>  
                     <tbody>  
                      <?php 
                      $sql = "SELECT * from algraduated";
                      $result = $conn-> query($sql);
                      if ($result-> num_rows > 0 ){
                        while ($row=mysqli_fetch_array($result)){
                          $approvedby;
                          $approvedby = $row['approvedby'];

                          $sql1 = "SELECT * from college where college = '$approvedby' ";
                          $result1 = $conn-> query($sql1);
                          if ($result1-> num_rows > 0 ){
                           while ($row1=mysqli_fetch_array($result1)){
                            $approvedby = $row1['username'];
                          }
                        }



                        $approveddate = $row['approveddate'];
                        $approveddate = strtotime($approveddate);
                        $approveddate= date("Y M d" , $approveddate);

                        $orderdate = "";
                        $orderdate = $row['approveddate'];
                        $orderdate = strtotime($orderdate);
                        $orderdate= date("Ymd" , $orderdate);


                        $approvedtime = $row['approvedtime'];
                        $approvedtime = strtotime($approvedtime);
                        $approvedtime= date("H:i" , $approvedtime);



                        $middlename = $row['middlename'];
                        $middlename = substr($middlename, -1);
                        $middlename = ucfirst($middlename);
                        if ($row['reason'] == "") {

                          echo "
                          <tr><td class='table_td'><label class='orderdate' style='font-size: .01px;'>".$orderdate.$approvedtime."</label>".$approveddate." at ".$approvedtime."</td>
                          <td class='table_td'>".$approvedby."</td>
                          <td class='table_td'>".$row['idno']."</td>
                          <td class='table_td'>".$row['lastname']." ".$row['firstname']." ".$middlename.".</td>
                          <td class='table_td' align='center'><label class='labelapproved'>Approved</label></td>
                          <td class='table_td'></td></tr>";
                        }
                        if ($row['reason'] != "") {

                          echo "
                          <tr><td class='table_td'><label class='orderdate' style='font-size: .01px;'>".$orderdate.$approvedtime."</label>".$approveddate." at ".$approvedtime."</td>
                          <td class='table_td'>".$approvedby."</td>
                          <td class='table_td'>".$row['idno']."</td>
                          <td class='table_td'>".$row['lastname']." ".$row['firstname']." ".$middlename.".</td>
                          <td class='table_td' align='center'><label class='labeldenied'>Denied</label></td>
                          <td class='table_td'>".$row['reason']."</td></tr>";
                        }






                      }

                    }
                    ?>  
                  </tbody>  
                </table>

              </div>
              <script>
                $(document).ready(function(){
                  $('#myTable1').dataTable();
                });
              </script>
              <!-- //table 1 close -->
              <!-- //table 1 start -->
              <div class="table-responsive"  id="table-responsive2"  style="display: none;">
                <table id="myTable2" class="table table-striped" width="100%" style=""> 
                  <thead>  
                    <tr>  
                     <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 20%;">Date</th>  
                     <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 20%;">Title</th>  
                     <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 20%;">Company Name</th>  
                     <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 20%;">Status</th>  
                     <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 20%;">Reason</th>  

                   </tr>  
                 </thead>  
                 <tbody>  
                  <?php 
                  $sql = "SELECT * from aljobpost";
                  $result = $conn-> query($sql);
                  if ($result-> num_rows > 0 ){
                    while ($row=mysqli_fetch_array($result)){
                      $status = "";


                      $jobpostdate = $row['jobpostdate'];
                      $jobpostdate = strtotime($jobpostdate);
                      $jobpostdate= date("Y M d" , $jobpostdate);


                      $orderdate = "";
                      $orderdate = $row['jobpostdate'];
                      $orderdate = strtotime($orderdate);
                      $orderdate= date("Ymd" , $orderdate);



                      $jobposttime = $row['jobposttime'];
                      $jobposttime = strtotime($jobposttime);
                      $jobposttime= date("H:i" , $jobposttime);


                      echo "
                      <tr><td class='table_td'>".$jobpostdate." at ".$jobposttime."</td>
                      <td class='table_td'>".$row['jobtitle']."</td>
                      <td class='table_td'>".$row['companyname']."</td>";

                      if ($row['jobstatus'] == "update") {
                        echo  "<td class='table_td' align='center'><label class='labelupdated'>Updated</label></td>
                        <td class='table_td'></td>";
                      }     
                      if ($row['jobstatus'] == "cancelled"){
                        echo  "<td class='table_td' align='center'><label class='labelcancelled'>Cancelled</label></td>
                        <td class='table_td'>".$row['reason']."</td>";
                      }
                      if ($row['jobstatus'] == "upload"){
                        echo  "<td class='table_td' align='center'><label class='labelupload'>Upload</label></td>
                        <td class='table_td'></td>";
                      }
                      if ($row['jobstatus'] == "denied"){
                        echo  "<td class='table_td' align='center'><label class='labelcancelled'>Denied</label></td>
                        <td class='table_td'>".$row['reason']."</td>";
                      }
                      if ($row['jobstatus'] == "closed"  && $row['reason'] == ""){
                        echo  "<td class='table_td' align='center'><label class='labelcancelled'>Closed</label></td>
                        <td class='table_td'></td>";
                      }
                      if ($row['jobstatus'] == "closed" && $row['reason'] != ""){
                        echo  "<td class='table_td' align='center'><label class='labelcancelled'>Closed</label></td>
                        <td class='table_td'>".$row['reason']."</td>";
                      }
                      if ($row['jobstatus'] == "approved"){
                        echo  "<td class='table_td' align='center'><label class='labelupload'>Approved</label></td>
                        <td class='table_td'></td>";
                      }
                      if ($row['jobstatus'] == "disapproved"){
                        echo  "<td class='table_td' align='center'><label class='labelcancelled'>Disapproved</label></td>
                        <td class='table_td'>".$row['reason']."</td>";
                      }
                      if ($row['jobstatus'] == "recover"){
                        echo  "<td class='table_td' align='center'><label class='labelupload'>Recovered</label></td>
                        <td class='table_td'></td>";
                      }
                      echo "</tr>";




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
            <!-- //table 2 close -->
            <!-- //table 3 start -->
            <div class="table-responsive"  id="table-responsive3"  style="display: none;">
              <table id="myTable3" class="table table-striped" width="100%" style=""> 
                <thead>  
                  <tr>  
                   <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 20%;">Date</th>
                   <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 20%;">User</th>  
                   <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 20%;">News</th>  
                   <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 20%;">Status</th>  
                   <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 20%;">Reason</th>  
                 </tr>  
               </thead>  
               <tbody>  
                <?php 
                $sql = "SELECT * from alnews";
                $result = $conn-> query($sql);
                if ($result-> num_rows > 0 ){
                  while ($row=mysqli_fetch_array($result)){
                    $newscollege;
                    $newscollege = $row['newscollege'];

                    $sql1 = "SELECT * from college where college = '$newscollege' ";
                    $result1 = $conn-> query($sql1);
                    if ($result1-> num_rows > 0 ){
                     while ($row1=mysqli_fetch_array($result1)){
                      $newscollege = $row1['username'];
                    }
                  }




   $newsdate = $row['newsdate'];
                      $newsdate = strtotime($newsdate);
                      $newsdate= date("Y M d" , $newsdate);


                           $orderdate = "";
                          $orderdate = $row['newsdate'];
                          $orderdate = strtotime($orderdate);
                          $orderdate= date("Ymd" , $orderdate);

                  
                  $newstime = $row['newstime'];
                  $newstime = strtotime($newstime);
                  $newstime= date("H:i" , $newstime);


                  
                  echo "
                  <tr><td class='table_td'><label class='orderdate' style='font-size: .01px;'>".$orderdate.$newstime."</label>".$newsdate." at ".$newstime."</td>
                  <td class='table_td'>".$newscollege."</td>
                  <td class='table_td'>".$row['newsdetail']."</td>"
                  ;

                  
                  if ($row['newsstatus'] == "update") {
                    echo  "<td class='table_td' align='center'><label class='labelupdated'>Updated</label></td>
                    <td class='table_td'></td>";
                  }     
                  if ($row['newsstatus'] == "removed"){
                    echo  "<td class='table_td' align='center'><label class='labelcancelled'>Removed</label></td>
                    <td class='table_td'>".$row['reason']."</td>";
                  }
                  if ($row['newsstatus'] == "upload"){
                    echo  "<td class='table_td' align='center'><label class='labelupload'>Upload</label></td>
                    <td class='table_td'></td>";
                  }



                  echo "</tr>";
                }
              }
              ?>  
            </tbody>  
          </table>

        </div>
        <script>
          $(document).ready(function(){
            $('#myTable3').dataTable();
          });
        </script>
        <!-- //table 3 close -->
        <!-- //table 4 start -->
        <div class="table-responsive"  id="table-responsive4"  style="display: none;">
          <table id="myTable4" class="table table-striped" width="100%" style=""> 
            <thead>  
              <tr>  
               <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 20%;">Date</th>  
               <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 20%;">User</th>  
               <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 20%;">Event</th>  
               <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 20%;">Status</th>  
               <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 20%;">Reason</th>  
             </tr>  
           </thead>  
           <tbody>  
            <?php 
            $sql = "SELECT * from alevent ";
            $result = $conn-> query($sql);
            if ($result-> num_rows > 0 ){
              while ($row=mysqli_fetch_array($result)){
                $uploadedevent;
                $uploadedevent = $row['uploadedevent'];

                $sql1 = "SELECT * from college where college = '$uploadedevent' ";
                $result1 = $conn-> query($sql1);
                if ($result1-> num_rows > 0 ){
                 while ($row1=mysqli_fetch_array($result1)){
                  $uploadedevent = $row1['username'];
                }
              }




                  $eventdate = $row['eventdate'];
                      $eventdate = strtotime($eventdate);
                      $eventdate= date("M d Y" , $eventdate);

                          $orderdate = "";
                          $orderdate = $row['eventdate'];
                          $orderdate = strtotime($orderdate);
                          $orderdate= date("Ymd" , $orderdate);

              
              $time = $row['time'];
              $time = strtotime($time);
              $time= date("H:i" , $time);

              
              echo " <tr><td class='table_td'><label class='orderdate' style='font-size: .01px;'>".$orderdate.$time."</label>".$eventdate." at ".$time."</td>
              <td class='table_td'>".$uploadedevent."</td>
              <td class='table_td'>".$row['eventdetail']."</td>";
              if ($row['status'] == "update") {
               echo  "<td class='table_td' align='center'><label class='labelupdated'>Updated</label></td>
               <td class='table_td'></td>";
             }     
             if ($row['status'] == "cancelled"){
              echo  "<td class='table_td' align='center'><label class='labelcancelled'>Removed</label></td>
              <td class='table_td'>".$row['reason']."</td>";
            }
            if ($row['status'] == "uploaded"){
             echo  "<td class='table_td' align='center'><label class='labelupload'>Upload</label></td>
             <td class='table_td'></td>";
           }

           echo "</tr>";
         }
       }
       ?>  
     </tbody>  
   </table>

 </div>
 <script>
  $(document).ready(function(){
    $('#myTable4').dataTable();
  });
</script>
<!-- //table 4 close -->
<!-- //table 5 start -->
<div class="table-responsive"  id="table-responsive5"  style="display: none;">
  <table id="myTable5" class="table table-striped" width="100%" style=""> 
    <thead>  
      <tr>  
       <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 25%;">Date</th>  
       <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 15%;">Idno</th>  
       <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 35%;">College</th>  
       <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 25%;">Action</th>   
     </tr>  
   </thead>  
   <tbody>  
    <?php 
    $sql = "SELECT * from alumniupdate ";
    $result = $conn-> query($sql);
    if ($result-> num_rows > 0 ){
      while ($row=mysqli_fetch_array($result)){

        $idno;
        $idno = $row['idno'];

        $sql1 = "SELECT * from graduated where idno = '$idno' ";
        $result1 = $conn-> query($sql1);
        if ($result1-> num_rows > 0 ){
         while ($row1=mysqli_fetch_array($result1)){
          $course = $row1['course'];
        }
      }


      $date = $row['date'];
      $date = strtotime($date);
      $date= date("M d Y" , $date);

      
      $time = $row['time'];
      $time = strtotime($time);
      $time= date("H:i" , $time);

      
      echo " <tr><td class='table_td'>".$date." at ".$time."</td>
      <td class='table_td'>".$idno."</td>
      <td class='table_td'>".$course."</td>
      <td class='table_td' align='center'>".$row['action']."</td>";
      


      echo "</tr>";
    }
  }
  ?>  
</tbody>  
</table>

</div>
<script>
  $(document).ready(function(){
    $('#myTable5').dataTable();
  });
</script>
<!-- //table 5 close -->
<!-- //table 6 start -->
<div class="table-responsive"  id="table-responsive6"  style="display: none;">
<table id="myTable7" class="table table-striped" width="100%" style=""> 
    <thead>  
      <tr>  
       <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 25%;">Date</th>  
       <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 25%;">Username</th>  
       <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 50%;">Report</th>  
     </tr>  
   </thead>  
   <tbody>  
    <?php 
    $sql = "SELECT * from report ";
    $result = $conn-> query($sql);
    if ($result-> num_rows > 0 ){
      while ($row=mysqli_fetch_array($result)){


      $date = $row['date'];
      $date = strtotime($date);
      $date= date("M d Y" , $date);

      
      $time = $row['time'];
      $time = strtotime($time);
      $time= date("H:i" , $time);

      
      echo " <tr><td class='table_td'>".$date." at ".$time."</td>
      <td class='table_td'>".$row['username']."</td>
      <td class='table_td'>".$row['report']."</td>";
      


      echo "</tr>";
    }
  }
  ?>  
</tbody>  
</table>

</div>
<script>
  $(document).ready(function(){
    $('#myTable6').dataTable();
  });
</script>
<!-- //table 6 close -->
<!-- //table 7 start -->
<div class="table-responsive"  id="table-responsive7"  style="display: none;">
  <table id="myTable7" class="table table-striped" width="100%" style=""> 
    <thead>  
      <tr>  
       <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 25%;">Date</th>  
       <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 25%;">Username</th>  
       <th style="border-bottom:solid 1px;font-size: 1.7vmin;width: 50%;">Name</th>  
     </tr>  
   </thead>  
   <tbody>  
    <?php 
    $sql = "SELECT * from login ";
    $result = $conn-> query($sql);
    if ($result-> num_rows > 0 ){
      while ($row=mysqli_fetch_array($result)){

        $idno;
        $idno = $row['username'];
        $name = "";
        $sql1 = "SELECT * from graduated where idno = '$idno' ";
        $result1 = $conn-> query($sql1);
        if ($result1-> num_rows > 0 ){
         while ($row1=mysqli_fetch_array($result1)){
          $name = $row1['firstname'] . " ".$row1['middlename'] . " ".$row1['lastname'];
        }
      }


      $date = $row['date'];
      $date = strtotime($date);
      $date= date("M d Y" , $date);

      
      $time = $row['time'];
      $time = strtotime($time);
      $time= date("H:i" , $time);

      
      echo " <tr><td class='table_td'>".$date." at ".$time."</td>
      <td class='table_td'>".$idno."</td>
      <td class='table_td'>".$name."</td>";
      


      echo "</tr>";
    }
  }
  ?>  
</tbody>  
</table>

</div>
<script>
  $(document).ready(function(){
    $('#myTable7').dataTable();
  });
</script>
<!-- //table 7 close -->


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
  header("Location: ../../login/logout.php");
     exit();
 }
  


}
//LOGOUT
else{
 header("Location: ../../login/logout.php");
     exit();
}
?>