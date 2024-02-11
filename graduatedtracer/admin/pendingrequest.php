<?php
session_start();
include("dbhelper.php");
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
//USERNAME LOGIN
  $username = $_SESSION['username'];
if ($username == "admin") {



?>
<!DOCTYPE html>
<html lang="en">
<style type="text/css">
  
input[type="checkbox"]{
  display: none;
}
.container1{
   position: fixed;
  width: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(86,86,86,.80);
  z-index: 10000;
  display :none;  
  overflow: auto;  
}
.container01{
/*  width: 35%;
  padding: 15px;
  left: 30%;
  margin-left: 5%;
  border-radius: 10px;
  color: rgb(1,82,73);
  background: #fff;
  position: absolute;
  top: 30%;
  box-shadow: 3px 3px 3px #000;
  z-index: 10001;
  font-weight: 700;
  text-align: center;
  padding-bottom: 40px; 
  height: 40%; */
}
.container01 .close-btn1{
  position: absolute;
  right: 10px;
  top: 4px;
  font-size: 20px;
  cursor: pointer;
  color: #fff;
  padding-top: 5px;
  width: 4%;
  height: 30px;
  text-align: center;

}
.container01 .close-btn1:hover{
  color:rgba(255,255,255,0.9);
  /*transform: translate(0, -3px);*/
  background-color: red;

}

.infolabel1{
    font-size: 1.7vmin;
    color: #297fa7;
    padding-left: 25px;
}
.infolabel2{
    font-size: 1.7vmin;
  width: 90%;
  color: #fff;
  border-radius: 7px;
  text-align: left;
  background: #0c506f;
  padding: 7px 0px 7px 13px;

}
.infotd1{
width: 25%;
text-align: left;
}
.infotd2{
width: 75%;
}
.closingtab{
  width: 100%;
  background-color: #CAC9C9;
  padding: 0px;
  height: 40px;
  position: sticky;
  top: 0;
}


/*//asdsa*/
.container2{
   position: fixed;
  width: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(86,86,86,.80);
  z-index: 10000;
  display :none;  
  overflow: auto;  
}
.container02{
/*  width: 56%;
  left:22%;
  right: 22%;
  bottom: 10%;
  margin-right: 5%;
  margin-left: 5%;
  border-radius: 10px;
  color: rgb(1,82,73);
  background: #fff;
  position: absolute;
  top: 10%;
  box-shadow: 3px 3px 3px #000;
  z-index: 10001;
  font-weight: 700;
  text-align: center;
  padding-bottom: 40px; 
  overflow: auto;*/
}
.container02 .close-btn2{
  position: absolute;
  right: 10px;
  top: 4px;
  font-size: 20px;
  cursor: pointer;
  color: #fff;
  padding-top: 5px;
  width: 4%;
  height: 30px;
  text-align: center;

}
.container02 .close-btn2:hover{
  color:rgba(255,255,255,0.9);
  /*transform: translate(0, -3px);*/
  background-color: red;

}




/*selectgrad*/
.containerselectgrad1{
   position: fixed;
  width: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(86,86,86,.30);
  z-index: 10000;
  display :none; 
}
.containerselectgrad01{
  width: 35%;
  padding: 15px;
  left: 30%;
  margin-left: 5%;
  border-radius: 10px;
  color: rgb(1,82,73);
  background: #fff;
  position: absolute;
  top: 30%;
  box-shadow: 3px 3px 3px #000;
  z-index: 10001;
  font-weight: 700;
  text-align: center;
  padding-bottom: 40px; 
  height: 30%; 
}
.containerselectgrad01 .close-btn{
  position: absolute;
  right: 20px;
  top: 15px;
  font-size: 20px;
  cursor: pointer;
  background:#0c506f;
  width: 4%;
  height: 20px;
  text-align: center;
  color: #fff;

}
.containerselectgrad01 .close-btn:hover{
  color:rgba(255,255,255,0.9);
}
/*approve gif*/
.container-approve1{
   position: fixed;
  width: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(86,86,86,.30);
  z-index: 10000;
}
.container-approve01{
  width: 35%;
  padding: 15px;
  left: 30%;
  margin-left: 5%;
  border-radius: 10px;
  color: rgb(1,82,73);
  background: #fff;
  position: absolute;
  top: 30%;
  box-shadow: 3px 3px 3px #000;
  z-index: 10001;
  font-weight: 700;
  text-align: center;
  padding-bottom: 40px; 
  height: 40%; 
}
.container-approve01 .close-btn{
  position: absolute;
  right: 20px;
  top: 15px;
  font-size: 20px;
  cursor: pointer;
  background:#eb8d00;
  width: 3%;
  height: 20px;
  text-align: center;

}
.container-approve01 .close-btn:hover{
  color:rgba(255,255,255,0.9);
}
table tbody tr td{
 border-color: #696969;
}
.table-responsive{
  padding-top: 30px;
}
.icon-approve:hover{
  transform: translate(0, -3px);
}
.approveyes:hover{
  transform: translate(0, -3px);
}
.approveno:hover{
  transform: translate(0, -3px);
}
.classsubmit{
  border: none;
  padding: 5px 10px 5px 10px;
  margin-top: 10px;
  font-size: 17px;
  background-color: #0c506f;
  color: #fff;
  border-radius: 5px;
}
.classsubmit:hover{
  transform: translate(0, -3px);
}
.approvedbtn{
  background-color: #247a01;
  color: #fff;
  padding: 7px 10px 7px 10px;
  font-size: 1.7vmin;
}
.approvedbtn:hover{
  transform: translate(0, -3px);
}
.deletebtn{
  background-color: #de1818;
  color: #fff;
  font-size: 1.7vmin;
  padding: 7px 13px 7px 13px;
}
.deletebtn:hover{
  transform: translate(0, -3px);
}
.selectyear:hover{
  background-color: #4EB0DE !important;

}
.container-success1{
   position: fixed;
  width: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(86,86,86,.30);
  z-index: 10000;
}
.container-success01{
/*  width: 35%;
  padding: 15px;
  left: 30%;
  margin-left: 5%;
  border-radius: 10px;
  color: rgb(1,82,73);
  background: #fff;
  position: absolute;
  top: 30%;
  box-shadow: 3px 3px 3px #000;
  z-index: 10001;
  font-weight: 700;
  text-align: center;
  padding-bottom: 40px; 
  height: 40%; */
}
.container-success01 .close-btn{
  position: absolute;
  right: 20px;
  top: 15px;
  font-size: 20px;
  cursor: pointer;
  background:#eb8d00;
  width: 3%;
  height: 20px;
  text-align: center;

}
.container-success01 .close-btn:hover{
  color:rgba(255,255,255,0.9);
}
.popup_table{
  width: 60%;
  margin-left: 20%;
  margin-right: 20%;
  border-radius: 10px;
  color: rgb(1,82,73);
  margin-top : 5%;
  box-shadow: 5px 5px 5px 5px#696969;
  z-index: 10001;
  font-weight: 700;
  text-align: center;
  padding-bottom: 40px; 
  height: auto; 
  margin-bottom: 20px;
  text-align: left;

}
.title_info{
 width: auto;
  padding: 15px;
  margin-left: 5%;
  margin-right: 5%;
  border-radius: 10px;
  color: rgb(1,82,73);
  background: #fff;
  margin-top : 10%;
  box-shadow: 3px 3px 3px #000;
  z-index: 10001;
  font-weight: 700;
  text-align: center;
  padding-bottom: 40px; 
  height: auto; 
}
.table_td{
  font-size: 2vmin;
}
@media only screen and (max-width: 600px) {
  .popup_table{
  width: 80%;
  margin-left: 10%;
  margin-right: 10%;
  }
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
.backbtn:hover{
  transform: translate(0, -3px);
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

  <title>All Pending Request</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/tracerlogo.png" rel="icon">

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

<body>
<script type="text/javascript">
              setTimeout(function() {
              $('#success-hidden').hide()
            }, 1600);
</script>
<script type="text/javascript">
              setTimeout(function() {
              $('#delete-hidden').hide()
            }, 3000);
</script>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
         <?php if(isset($_SESSION['approve'])) {?>
    <div id="success-hidden">
          <input type="checkbox" id="tablesuccess"><label for="tablesuccess"  class=""></label>
                     <div class="container-success1" id="successtransition">
                          <div class="container-success01" align="center">

  
                                <label class="title_info">
                                <img src="assets/img/success.gif" style="width: 40%;height: 40%;" />
                                <br>
                                <label style="font-size: 25px;margin-top: 20px;">APPROVED!</label>
                                </label><br>
                                <div align="left" class="">
                                <!-- //design -->
                                  <label></label>
                                </div>
                          </div>
                    </div>
                    <?php echo" <style>#tablesuccess:checked ~ .container-success1{display: block;}</style>";?> 
    </div> 

   <?php 
 }
unset($_SESSION['approve']);
 ?>




      <?php if(isset($_SESSION['delete'])) {?>
    <div id="delete-hidden">
          <input type="checkbox" id="tabledeleteinfo"><label for="tabledeleteinfo"  class=""></label>
                     <div class="container-success1" id="deleteinfitransition">
                          <div class="container-success01" align="center">


                                <label class="title_info">
                                <img src="assets/img/delete1.gif" style="width: 40%;height: 40%;" />
                                <br>
                                <label style="font-size: 25px;margin-top: 20px;">DELETED!</label>
                                </label><br>
                                <div align="left" class="">
                                <!-- //design -->
                                  <label></label>
                                </div>
                          </div>
                    </div>
                    <?php echo" <style>#tabledeleteinfo:checked ~ .container-success1{display: block;}</style>";?> 
    </div> 
 
   <?php }
   unset($_SESSION['delete']);
   ?>

    <div class="d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center justify-content-between">
      <a href="dashboard.php" class="logo d-flex align-items-center">
        <img src="assets/img/tracerlogo.png" alt="">
        <span class="d-none d-lg-block">GraduateTracer</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

 
      
   <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/<?php 
                $sql = "SELECT * FROM user WHERE username='$username'";
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
              <a class="dropdown-item d-flex align-items-center" href="accountsetting.php">
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
        <a class="nav-link  " href="dashboard.php" style="background-color: #297FA7;">
          <i class="fa fa-bar-chart"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li style="color: #B5B5B5;margin-left: 10px;padding: 7px;font-size: 13px;">
          <span>Record</span>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav3" data-bs-toggle="collapse">
          <i class="fa fa-bullhorn"></i><span>Record</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav3" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
        <a href="record/college.php">
              <i class="bi bi-circle"></i><span>List of Colleges</span>
            </a>
          </li>
          <li>
            <a href="record/addcollege.php">
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
            <a href="jobpost/jobupload.php">
              <i class="bi bi-circle"></i><span>Job Upload</span>
            </a>
          </li>
          <li>
            <a href="jobpost/pendingjob.php">
              <i class="bi bi-circle"></i><span>Pending Job Approval (Guidance)</span>
            </a>
          </li>
          <li>
            <a href="jobpost/jobhiring.php">
              <i class="bi bi-circle"></i><span>Job Hiring</span>
            </a>
          </li>
          <li>
            <a href="jobpost/jobclosed.php">
              <i class="bi bi-circle"></i><span>Job Closed</span>
            </a>
          </li>
          <li>
            <a href="jobpost/disapproved.php">
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
          <i class="fa fa-newspaper-o"></i><span>News & Events</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="newsandevents/news.php">
              <i class="bi bi-circle"></i><span>News</span>
            </a>
          </li>
          <li>
            <a href="newsandevents/events.php">
              <i class="bi bi-circle"></i><span>Events</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->     
         <li style="color: #B5B5B5;margin-left: 10px;padding: 7px;font-size: 13px;">
          <span>Activity Log</span>
      </li>
      <li class="nav-item">

        <a class="nav-link collapsed" data-bs-target="#components-nav5" data-bs-toggle="collapse">
          <i class="fa fa-history"></i><span>Activity Log</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav5" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="activitylog/record.php">
              <i class="bi bi-circle"></i><span>Activity Log</span>
            </a>
          </li>
         
        </ul>
      </li><!-- End Components Nav -->    
  </aside><!-- End Sidebar-->
  <main id="main" class="main">

    <section class="section dashboard">
      <div class="row">
        <!-- Sales Card -->
            <div class="col-xxl-5 col-md-5">
              <div class="pagetitle">
              <h1>Record</h1>
              <nav >
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item active">Approval</li>
                  <li class="breadcrumb-item active">All Colleges</li>
                </ol>
                
              </nav>
            </div><!-- End Page Title -->

            </div><!-- End Sales Card -->
                          <div class="col-xxl-7 col-md-7" align="right">
                        <a href="dashboard.php">
                                 <label style='background-color:#07435f;color:#fff;font-size:1.7vmin;margin:0;padding: 1vmin 1.5vmin 1vmin 1.5vmin;border-radius:3px;margin-top: 20px;' class='backbtn'>
   <i class='fa fa-arrow-left' style='font-size:13px;font;font-weight: bold;'>
   <label style=' font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;padding: 0px .3vmin 0px .3vmin;font-weight:600'>Back</label>
   </i></label>

                        </a>
              </div>

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

                 <div class="card-body" style="border-top: 3px solid #297fa7;padding-top: 30px;">
                   <input type="checkbox" id="selectgrad">
                      <label for="selectgrad"style="float: right;padding: 5px 15px 5px 15px;background-color: #0c506f;color: #fff;margin-top: 10px;display: none;" class="selectyear">
                      Select Year</label>
                     <div class="containerselectgrad1">
                          <div class="containerselectgrad01">

                                <label for="selectgrad" class="close-btn fas fa-times" title="close"></label>
                              
                                <br><br>
                            
                                  <label style="background-color: red;width: 200px;background-color: #0c506f;color: #fff;padding: 5px 10px 5px 10px;border-radius: 5px;">Classification</label>

                            
                                <form method="POST" action="coursegraduated.php" class="formgraduated">                                              
                                          <?php
                                              date_default_timezone_set('Asia/Manila');
                                              $time = date('g:i a');
                                              $date= date("Y")+2;
                                              ?>
                                          <select class="text-input" name="recordcourseyear1" id="recordcourseyear1" onchange="handleSelect()" style="width: 33%;padding: 5px 10px 5px 10px;color: #fff;background-color: #0c506f;" required>
                                            <option disabled selected value="" id="yearselected">Select</option>

                                            <?php
                                           
                                              for ($i = 2005 ; $date > $i; $i++)  {
                                                 
                                                  echo "<option value='".$i."' id='a".$i."'>".$i."</option>";
                                           

                                          


                                            echo "<script>
                                         
                                            document.getElementById('recordcourseyear1').onchange = function() {
                                            var stryearvalue = document.getElementById('recordcourseyear1').value;
                                            var stryearvalue = stryearvalue - 1;
                                            for (let i = 2005; i <= stryearvalue; stryearvalue--) {
                                            document.getElementById(stryearvalue).disabled=true;
                                            }
                                            var stryearvalue = document.getElementById('recordcourseyear1').value;
                                            for (let i = 2005; i > stryearvalue; i++) {
                                            document.getElementById(stryearvalue).disabled=false;
                                            }
                                              
                                              
                                          }

                                            </script>";

                                          }
                                           ?>
                                      </select>
                                      <label style="padding-left: 10px;padding-right: 10px;">To</label>
                                         <?php
                                              date_default_timezone_set('Asia/Manila');
                                              $time = date('g:i a');
                                              $date= date("Y")+2;
                                              ?>
                                          <select class="text-input" name="recordcourseyear2" id="recordcourseyear2" onchange="handleSelect()" style="width: 33%;padding: 5px 10px 5px 10px;color: #fff;background-color: #0c506f;" required>
                                            <option disabled selected value="" id="yearselected">Select</option>
                                            <?php
                                              for ($i =2005 ; $date > $i; $i++)  {

                                                  echo "<option value='".$i."' id='".$i."'>".$i."</option>";
                                              }?>

                                          </select>





                                  <input type="hidden" name="coursegraduated" value="<?php echo $recordcourse ?>">
                                  <button name="submitrecordcourseyear" class="classsubmit">submit</button>
                                </form>
                                
                     
                          </div>
                    </div>
                     <style>#selectgrad:checked ~ .containerselectgrad1{display: block;visibility: visible;}</style>
                  </form>
      <script type="text/javascript">
              setTimeout(function() {
              $('#validation-hidden').hide()
            }, 5000);
      </script>

        <?php if(isset($_SESSION['validation'])) {?>
          <div style="width:100%" align="center" id="validation-hidden">
          <label style="padding:10px;color: red;">The Alumni already exist</label>
          </div>
           <?php 
         }
        unset($_SESSION['validation']);
         ?>



    <table id="myTable" class="table table-striped" width="100%" > 
 
        <thead>  
          <tr>  
              <th style="border-bottom:solid 1px;width: 15%;font-size:1.7vmin;">ID No.</th>  
            <th style="border-bottom:solid 1px;width: 25%;font-size:1.7vmin;">Name</th>  
            <th style="border-bottom:solid 1px;width: 20%;font-size:1.7vmin;">Year</th>  
            <th style="border-bottom:solid 1px;width: 15%;font-size:1.7vmin;">Contact</th>
            <th style="border-bottom:solid 1px;width: 25%;font-size:1.7vmin;">Action</th>  
 
          </tr>  
        </thead>  
        <tbody>  
       <?php 
        $sql = "select * from signup where status = 'approval'";
        $result = $conn-> query($sql);
        if ($result-> num_rows > 0 ){
        while ($row=mysqli_fetch_array($result)){
        echo "
         <tr>
        <td class='table_td'>".$row['idno']."</td>
        <td class='table_td'>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."</td>
        <td class='table_td'>".$row['yeargrad']."</td>
        <td class='table_td'>".$row['contact']."</td>
        <td align='center'>
          <input type='checkbox' id='a".$row['id']."'>
   <label for='a".$row['id']."' style='background-color:#009933;color:#fff;font-size:1.7vmin;margin:0;padding: 1vmin 1.5vmin 1vmin 1.5vmin;border-radius:3px' class='approveyes'>
   <i class='fa fa-check' style='font-size:1.7vmin;font;font-weight: bold;'>
   <label style=' font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;padding: 0px .3vmin 0px .3vmin;font-weight:600' for='a".$row['id']."'>Approve</label>
   </i></label>
                    <div class='container1'>

                          <div class='container01'>
                                                         
                              
                            <table class='popup_table' style='background-color:#000'>
                            <tr>
                              <td colspan='2' >
                               <div class='closingtab'>
                                <label for='"."a".$row['id']."' class='close-btn1 fas fa-times' title='close'></label><br>
                              </div>
                              </td>
                            </tr>

                            <tr>
                              <td colspan='2'>
                              <label style='text-align: center;width:100%;font-size:20px;color:#0c506f'>GRADUATE INFORMATION</label>
                              </td>
                            </tr>
                            <tr>
                              <td  colspan='2' style='border-top:solid #0c506f 2px;'>
                              </td>
                            </tr>
                            <tr>
                              <td class='infotd1'>
                             <label class='infolabel1'>ID NUMBER</label>
                              </td>
                              <td class='infotd2'>
                             <label class='infolabel2'>".$row['idno']."</label>
                              </td>
                            </tr>
                            <tr>
                              <td class='infotd1'>
                              <label class='infolabel1'>NAME</label>
                              </td>
                              <td class='infotd2'>
                              <label class='infolabel2'>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."</label>
                              </td>
                            </tr>
                            <tr>
                               <td class='infotd1'>
                             <label class='infolabel1'>GENDER</label>
                              </td>
                              <td class='infotd2'>
                             <label class='infolabel2'>".$row['gender']."</label>
                              </td>
                            </tr>
                            <tr>
                               <td class='infotd1'>
                             <label class='infolabel1'>STATUS</label>
                              </td>
                              <td class='infotd2'>
                             <label class='infolabel2'>".$row['civilstatus']."</label>
                              </td>
                            </tr>
                            <tr>
                               <td class='infotd1'>
                             <label class='infolabel1'>ADDRESS</label>
                              </td>
                              <td class='infotd2'>
                             <label class='infolabel2'>".$row['street']." ".$row['barangay']." ".$row['city']." ".$row['province']."</label>
                              </td>
                            </tr>
                            <tr>
                               <td class='infotd1'>
                             <label class='infolabel1'>EMAIL</label>
                              </td>
                              <td class='infotd2'>
                             <label class='infolabel2'>".$row['email']."</label>
                              </td>
                            </tr>
                            <tr>
                               <td class='infotd1'>
                             <label class='infolabel1'>GRADUATED</label>
                              </td>
                              <td class='infotd2'>
                             <label class='infolabel2'>".$row['yeargrad']."</label>
                              </td>
                            </tr>

                    


                     
                        
                                <form action='courseserver.php' method='POST'>
                                <input type='hidden' name='success' value='success'>
                                <input type='hidden' name='id' value='".$row['id']."'>
                                <input type='hidden' name='lastname' value='".$row['lastname']."'>
                                <input type='hidden' name='firstname' value='".$row['firstname']."'>
                                <input type='hidden' name='middlename' value='".$row['middlename']."'>
                                <input type='hidden' name='gender' value='".$row['gender']."'>
                                <input type='hidden' name='birthdate' value='".$row['birthdate']."'>
                                <input type='hidden' name='civilstatus' value=".$row['civilstatus'].">
                                <input type='hidden' name='idno' value='".$row['idno']."'>
                                <input type='hidden' name='contact' value='".$row['contact']."'>
                                <input type='hidden' name='email' value='".$row['email']."'>
                                <input type='hidden' name='specialization' value='".$row['specialization']."'>
                                <input type='hidden' name='yeargrad' value='".$row['yeargrad']."'>
                                <input type='hidden' name='course' value='".$row['course']."'>
                                <input type='hidden' name='region' value='".$row['region']."'>
                                <input type='hidden' name='province' value='".$row['province']."'>
                                <input type='hidden' name='city' value='".$row['city']."'>
                                <input type='hidden' name='barangay' value='".$row['barangay']."'>
                                <input type='hidden' name='street' value='".$row['street']."'>
                                <input type='hidden' name='password' value='".$row['password']."'>
                                <br>

                                     <tr>
                               <td colspan='2'>
                               <label style='width:90%;text-align:right;font-size:2vmin;color:#247a01;'><button type='submit' name='approveinfo' class='approveyes' id='approveinfo' style='padding:8px;padding-left:15px;padding-right:15px;border:none;background-color:#009933;border-radius:3px;color:#fff'>Approve</button></label>
                              </td>
                            </tr>






                   
                               </form>
                                      </table>
                          </div>
                    </div>
          <style>#a".$row['id'].":checked ~ .container1{display: block;visibility: visible;}</style>

                 <input type='checkbox' id='b".$row['id']."'>
   <label for='b".$row['id']."' style='background-color:#CC0000 ;color:#fff;font-size:1.7vmin;margin:0;padding: 1vmin 1.5vmin 1vmin 1.5vmin;border-radius:3px' class='approveno'>
   <i class='fa fa-trash' style='font-size:1.7vmin;font;font-weight: bold;'>
   <label style=' font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;padding: 0px .3vmin 0px .3vmin;font-weight:600' for='b".$row['id']."'>Delete</label>
   </i></label>
                    <div class='container2'>

                          <div class='container02'>
                                                         
                              
                            <table class='popup_table' style='background-color:#000'>
                            <tr>
                              <td colspan='2' >
                               <div class='closingtab'>
                                <label for='"."b".$row['id']."' class='close-btn2 fas fa-times' title='close'></label><br>
                              </div>
                              </td>
                            </tr>

                            <tr>
                              <td colspan='2'>
                              <label style='text-align: center;width:100%;font-size:20px;color:#0c506f'>GRADUATE INFORMATION</label>
                              </td>
                            </tr>
                            <tr>
                              <td  colspan='2' style='border-top:solid #0c506f 2px;'>
                              </td>
                            </tr>
                            <tr>
                              <td class='infotd1'>
                             <label class='infolabel1'>ID NUMBER</label>
                              </td>
                              <td class='infotd2'>
                             <label class='infolabel2'>".$row['idno']."</label>
                              </td>
                            </tr>
                            <tr>
                              <td class='infotd1'>
                              <label class='infolabel1'>NAME</label>
                              </td>
                              <td class='infotd2'>
                              <label class='infolabel2'>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."</label>
                              </td>
                            </tr>
                            <tr>
                               <td class='infotd1'>
                             <label class='infolabel1'>GENDER</label>
                              </td>
                              <td class='infotd2'>
                             <label class='infolabel2'>".$row['gender']."</label>
                              </td>
                            </tr>
                            <tr>
                               <td class='infotd1'>
                             <label class='infolabel1'>STATUS</label>
                              </td>
                              <td class='infotd2'>
                             <label class='infolabel2'>".$row['civilstatus']."</label>
                              </td>
                            </tr>
                            <tr>
                               <td class='infotd1'>
                             <label class='infolabel1'>ADDRESS</label>
                              </td>
                              <td class='infotd2'>
                             <label class='infolabel2'>".$row['street']." ".$row['barangay']." ".$row['city']." ".$row['province']."</label>
                              </td>
                            </tr>
                            <tr>
                               <td class='infotd1'>
                             <label class='infolabel1'>EMAIL</label>
                              </td>
                              <td class='infotd2'>
                             <label class='infolabel2'>".$row['email']."</label>
                              </td>
                            </tr>
                            <tr>
                               <td class='infotd1'>
                             <label class='infolabel1'>GRADUATED</label>
                              </td>
                              <td class='infotd2'>
                             <label class='infolabel2'>".$row['yeargrad']."</label>
                              </td>
                            </tr>

                    


             
                        


                                <form action='courseserver.php' method='POST'>
                                <input type='hidden' name='delete' value='delete'>
                                <input type='hidden' name='id' value=".$row['id'].">
                                <br>




                              <tr>
                               <td  colspan='2'>
                                <label style='width:90%;text-align:right;font-size:2vmin;color:#F1F4F2;margin-right:7px;'><button type='submit' name='deleteinfo' class='approveno' id='deleteinfo' style='padding:8px;padding-left:15px;padding-right:15px;border:none;background-color:#CC0000;border-radius:3px;'>Delete</button></label>
                              </td>
                         
                            </tr>

                               </form>
                               </table>
                          </div>
                    </div>
          <style>#b".$row['id'].":checked ~ .container2{display: block;visibility: visible;}</style>
       


        </td>


        </tr>";
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


                </div>

              </div>
            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->

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

</body>

</html>

<?php
}
else{
    header("Location: ../login/logout.php");
     exit();
 }
  


}
//LOGOUT
else{
     header("Location: ../login/logout.php");
     exit();
}
?>

<?php 
?>