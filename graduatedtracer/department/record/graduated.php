<?php 
session_start();
include '../dbhelper.php';


if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
  //USERNAME LOGIN
  $username = $_SESSION['username'];
  if ($username != "") {
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM college WHERE username='$username'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $college = $row['college'];



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


      $employmentstatus = "Employed, Not Employed, Not Updated";
//closing college
    }
    if (isset($_SESSION['employmentstatus'])) {
      $employmentstatus =  $_SESSION['employmentstatus'];
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <link href="../assets/css/multiselect.css?v=<?php echo time();?>" rel="stylesheet"/>
      <script src="../assets/css/multiselect.min.js?v=<?php echo time();?>"></script>
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

      <title>Alumni List</title>
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
<script type="text/javascript">
  if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
  }
</script>
<style type="text/css">
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
   overflow: auto;
 }
 .containerselectgrad01{
   width: 50%;
   margin-left: 25%;
   margin-right: 25%;
   border-radius: 10px;
   color: rgb(1,82,73);
   margin-top : 15%;
   box-shadow: 5px 5px 5px 5px#696969;
   z-index: 10001;
   font-weight: 700;
   text-align: center;
   padding-bottom: 40px; 
   height: auto; 
   margin-bottom: 20px;
   text-align: left;
   background-color: #fff;
 }
 @media only screen and (max-width: 600px) {
  .containerselectgrad01{
    width: 80%;
    margin-left: 10%;
    margin-right: 10%;
  }
}
.containerselectgrad01 .close-btn{
  float: right;
  padding: 5px 10px 5px 10px;
  top: 15px;
  font-size: 20px;
  cursor: pointer;
  background:#0c506f;
  text-align: center;
  color: #fff;

}
.containerselectgrad01 .close-btn:hover{
  color:rgba(255,255,255,0.9);
  background-color: red;
}
.viewinfo:hover{
  transform: translate(0, -3px);
}
.classsubmit{
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
  border: none;
  color: #fff;
  background-color: #297ea7;
  padding: 5px 10px 5px 10px;
  font-weight: 500;
  border-radius: 3px;
  margin-left: 10px;

}
.classsubmit:hover{
 background-color: #0c506f;

}
.classview:hover{
 transform: translate(0, -3px);
}
.selectyear:hover{
  background-color: #4EB0DE !important;

}
.excel:hover{
  background-color: transparent !important;
  border: solid 2px green !important;
  color: green !important;

}
.print{
  background-color: #297fa7;
  border: none;
  padding: 5px 10px 5px 10px;
  color:#fff;
  border-radius: 5px;
  border: solid 2px #297fa7;
  width: auto;
  margin-left: 10px;
  margin-right: 5px;
  font-size: 1.7vmin;
  font-weight: 500;
}
.print:hover{
  background-color: transparent !important;
  border: solid 2px #297fa7 !important;
  color: #297fa7 !important;

}
.secondselectyear{
  display: none;
}
@media only screen and (max-width: 600px) {
  .secondselectyear{
    display: block;
  }
  .firstselectyear{
    display: none;
  }
}
.table_td{
  font-size: 2vmin;

}
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
/*college course*/
#collegecourse_multiSelect {
 font: inherit;
 width: auto;
 box-sizing: border-box;
 background: #fff;
 position: relative;
 background-color: transparent;
 border: none;
 padding: 0px;
 margin: 0px;
}
#collegecourse_input {
  background-color: #E8E8E8;
  color: #000;
  width: auto;
  line-height: normal;
  font-size: 2vmin;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
  font-weight: 500;
  border: none;
  border: 0px;

}
#collegecourse_itemList {
  background-color: #E8E8E8;
  color: #000;
  width: auto;
  z-index: 1000;
  text-align: left;
  font-size: 2vmin;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
  font-weight: 400;
}
/*skills*/
#specialization_multiSelect {
 font: inherit;
 width: auto;
 box-sizing: border-box;
 background: #fff;
 position: relative;
 background-color: transparent;
 border: none;
 padding: 0px;
 margin: 0px;
}
#specialization_input {
  background-color: #E8E8E8;
  color: #000;
  width: auto;
  line-height: normal;
  font-size: 2vmin;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
  font-weight: 500;
  border: none;
  border: 0px;

}
#specialization_itemList {
  background-color: #E8E8E8;
  color: #000;
  width: auto;
  z-index: 1000;
  text-align: left;
  font-size: 2vmin;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
  font-weight: 400;
}
/*year graduated*/
#yearselected_multiSelect {
 font: inherit;
 width: auto;
 box-sizing: border-box;
 background: #fff;
 position: relative;
 background-color: transparent;
 border: none;
 padding: 0px;
 margin: 0px;
}
#yearselected_input {
  background-color: #E8E8E8;
  color: #000;
  width: auto;
  line-height: normal;
  font-size: 2vmin;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
  font-weight: 500;
  border: none;
  border: 0px;

}
#yearselected_itemList {
  background-color: #E8E8E8;
  color: #000;
  width: auto;
  z-index: 1000;
  text-align: left;
  font-size: 2vmin;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
  font-weight: 400;
}
/*//year
//status*/
#employmentstatus_multiSelect {
 font: inherit;
 width: auto;
 box-sizing: border-box;
 background: #fff;
 position: relative;
 background-color: transparent;
 border: none;
 padding: 0px;
 margin: 0px;
}
#employmentstatus_input {
  background-color: #E8E8E8;
  color: #000;
  width: auto;
  line-height: normal;
  font-size: 2vmin;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
  font-weight: 500;
  border: none;
  border: 0px;

}
#employmentstatus_itemList {
  background-color: #E8E8E8;
  color: #000;
  width: auto;
  z-index: 1000;
  text-align: left;
  font-size: 2vmin;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
  font-weight: 400;
}
/*//status*/
.multiselect-text{
 font-size: 2vmin;
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

}
.container01 .close-btn1{
  position: absolute;
  right: 10px;
  top: 4px;
  font-size: 2.5vmin;
  cursor: pointer;
  color: #fff;
  background-color: #0c506f;
  padding: 1vmin 1.2vmin 1vmin 1.2vmin;
  text-align: center;

}
.container01 .close-btn1:hover{
  color:rgba(255,255,255,0.9);
  background-color: red;

}
#checkboxprint input[type="checkbox"]{
  display: none;
  margin: 0;
}
.popup_table{
  width: 40%;
  margin-left: 30%;
  margin-right: 30%;
  border-radius: 10px;
  color: rgb(1,82,73);
  margin-top :50px;
  box-shadow: 5px 5px 5px 5px#696969;
  z-index: 10001;
  font-weight: 700;
  text-align: center;
  padding-bottom: 40px; 
  height: auto; 
  margin-bottom: 20px;
  text-align: left;
  background-color: #fff;
}
.closingtab{
  width: 100%;
  background-color: transparent;
  padding: 0px;
  height: 40px;
  position: sticky;
  top: 0;
}
.infolabel2{
  font-size: 2vmin;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
  font-weight: 500;
  color: #000;
  background-color: transparent;
  border: none;
}
</style>
<body>
  <div id="loading">
    <img id="loading-image" src="../assets/img/loading.gif" alt="Loading..." />
  </div>


  <script type="text/javascript">
    setTimeout(function() {
      $('#undo-hidden').hide()
    }, 1600);
  </script>

  <!-- ======= Header ======= -->
  <?php if(isset($_SESSION['undo'])) {?>
    <div id="undo-hidden">
      <input type="checkbox" id="tableundo"><label for="tableundo"  class=""></label>
      <div class="container-undo1" id="">
        <div class="container-undo01">

          <label for="tableundo" ></label>
          <label class="title_info">
            <img src="../assets/img/success.gif" style="width: 200px;height: 200px;" />

          </label><br>
          <div align="left" class="">
            <!-- //design -->
            <label></label>
          </div>
        </div>
      </div>
      <?php echo" <style>#tableundo:checked ~ .container-undo1{display: block;}</style>";?> 
    </div> 
    <?php 
  }
  unset($_SESSION['undo']);
  ?>

  <!-- ======= Header ======= -->

  <?php 
  include ("print.php");

  ?>
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between" >
      <a href="../dashboard.php" class="logo d-flex align-items-center bugdashboard">
        <img src="../assets/img/tracerlogo.png" alt="">
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
          <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $username ?></span>
        </a><!-- End Profile Iamge Icon -->


        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6><?php echo $username ?></h6>
            <span>Department</span>
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
              <span>Sign Out</span>
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

    <li style="color: #B5B5B5;margin-left: 10px;padding: 7px;font-size: 13px;">
      <span>Record</span>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed"  style="background-color: #297FA7;">
        <i class="fa fa-graduation-cap"></i><span>Record</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content" data-bs-parent="#sidebar-nav">
        <li>
          <a href="pendingrequest.php">
            <i class="bi bi-circle"></i><span >Pending Request (Department)</span>
          </a>
        </li>
        <li>
          <a href="graduated.php">
            <i class="bi bi-circle"></i><span style="color:#ADADAD">Alumni</span>
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
         $sql1 = "SELECT * FROM college WHERE college='$college'";
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
        <i class="fa fa-newspaper-o"></i><span>News & Events</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="../newsandevents/news.php">
            <i class="bi bi-circle"></i><span>News</span>
          </a>
        </li>
        <li>
          <a href="../newsandevents/events.php">
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
          <a href="../activitylog/record.php">
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
        <div class="col-xxl-6 col-xl-3 col-md-3">
          <div class="pagetitle">
            <h1>Record</h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Alumni</li>
              </ol>

              <?php 
              if (isset($_POST['submitrecordcourseyear'])) {
                 // $_SESSION['employmentstatus'] = $_POST['employmentstatus'];
                $_SESSION['yearselected'] = $_POST['yearselected'];
                





                $employmentstatus = $_POST['employmentstatus'];
                $employmentstatus1 = "";
                if ($employmentstatus != "") {
                  foreach ($_POST['employmentstatus'] as $employmentstatus){
                    $employmentstatus1 .= $employmentstatus . ", ";
                  }
                  $employmentstatus1 = substr_replace($employmentstatus1 ,"", -2);

                  $_SESSION['employmentstatus'] = $employmentstatus1;
                  $employmentstatus = $_SESSION['employmentstatus'];
                }





            

              // -------------------Skills------------------------
                $specialization = $_POST['specialization'];
                $specialization1 = "";
                if ($specialization != "") {
                  foreach ($_POST['specialization'] as $specialization){
                    $specialization1 .= $specialization . ", ";
                  }
                  $specialization1 = substr_replace($specialization1 ,"", -2);

                  $_SESSION['skill'] = $specialization1;
                  $skill = $_SESSION['skill'];
                }else{
                  if ($_SESSION['skill'] != "") {
                   $skill = $_SESSION['skill'];
                 }

               }
              // -------------------Skills------------------------

              // -------------------Course------------------------
               $collegecourse = $_POST['collegecourse'];
               $collegecourse1 = "";
               if ($collegecourse != "") {
                foreach ($_POST['collegecourse'] as $collegecourse){
                  $collegecourse1 .= $collegecourse . ", ";
                }
                $collegecourse1 = substr_replace($collegecourse1 ,"", -2);

                $_SESSION['collegecourse'] = $collegecourse1;
                $collegecourse = $_SESSION['collegecourse'];
              }else{
                if ($_SESSION['collegecourse'] != "") {
                 $collegecourse = $_SESSION['collegecourse'];
               }

             }
              // -------------------Course------------------------
           }

           if (isset($_SESSION['yearselected']) ) {
            $yearselected = $_SESSION['yearselected'];
            $sql = "SELECT * FROM graduated WHERE college like '%$college%'";

            $yearselected = "";
            $yearselected1 = "";
            $yearselected = $_SESSION['yearselected'];
            foreach ($_SESSION['yearselected'] as $yearselected){
              if ($yearselected != "") {
                $yearselected1 .= $yearselected . ", ";
              }

            }
            $year = substr_replace($yearselected1 ,"", -2);


          }

          ?>


          <ol class="breadcrumb" style="margin-top:-10px;">
            <li class="breadcrumb-item active" style="display:none">Graduated Year (<?php echo $year; ?>)</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

    </div><!-- End Sales Card -->

    <div class="col-xxl-2 col-xl-3 col-md-3" ></div>
    <div class="col-xxl-2 col-xl-3 col-md-3" ></div>
    <div class="col-xxl-2 col-xl-3 col-md-3" >
      <div class="card info-card sales-card" style="background-color: #3BA6D8;height: 100px;">


        <div class="card-body" align="left">
          <form method="POST" action="grademployment.php">
            <button name="employed" id="employed" type="submit" style="background-color:transparent;border: none;" disabled>
             <h5 style="font-weight: 500;color: #012970;font-family:'Poppins',  sans-serif;padding: 2px;padding-top: 7px;">Total</h5>
           </button>
         </form>

         <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="height: 50px;width: 50px;">
            <i class="fa fa-briefcase" style="color: #297fa7;"></i>
          </div>
          <div class="ps-3">
            <!-- employed -->
<?php 
    $totalallemployed = 0;
    $sql = "SELECT * FROM graduated JOIN employment ON graduated.college = employment.empcollege and graduated.idno = employment.idno WHERE employment.empcollege like '%$college%'";
    $result = $conn-> query($sql);
    if ($result-> num_rows > 0 ){
      while ($row=mysqli_fetch_array($result)){
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
     if (isset($_SESSION['yearselected'])) {
      $yearselected = $_SESSION['yearselected'];
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

    $totalallemployed ++ ;  
  }
}
   
}

?>  
</div>
<h6><?php echo $totalallemployed ?></h6>
</div>
</div><!-- End Sales Card -->

</div>
</div><!-- End Sales Card -->






<!--             ---------------Flexible Report-------------- -->
<div class="col-lg-12" style="margin-top: -25px;margin-bottom: 5px;">
  <div class="row" id="checkboxprint" style="margin-top:20px">

   <input type='checkbox' id='aprint'>
   <label for='aprint' class="print">Download Print</label>


   <div class='container1'>

    <div class='container01'>


      <table class='popup_table' >


        <tr>
          <td>
            <div class='closingtab'>
              <label for='aprint' class='close-btn1 fas fa-times' title='close'></label>
            </div>
          </td>
        </tr>
        <tr>
          <td>
           <div class='col-xl-12  col-md-12 mt-2'  align='center' style='box-shadow: rgba(0, 0, 0, 0.15) 0px 2px 8px;'>
             <div class='p-3' style='background-color:white;width:100%;' >

              <form action='graduated.php' method='POST' id='printpop' name='printpop' onsubmit='return validatePrint()'>
                <input type='hidden' name='delete' value='delete'>
                <input type='hidden' name='id' value=".$row['id'].">
                
                <div style='width:100%' align='left'class='form-group options'>
                  <label class='infolabel1' style='font-size:2.3vmin;color:#000'>Columns for Print <label style='color:red'>*</label></label>

                  <div style='width:100%'>
                    <input type='checkbox' name='print[]' value='idno' style='display:inline-block;position: relative;height:2.1vmin;width:2.1vmin;margin:5px 0px 0px 5px' required>
                    <label class='infolabel2'>ID Number</label>
                  </div>
                  <div style='width:100%'>
                    <input type='checkbox' name='print[]' value='name' style='display:inline-block;position: relative;height:2.1vmin;width:2.1vmin;margin:5px 0px 0px 5px' required>
                    <label class='infolabel2'>Name</label>
                  </div>
                  <div style='width:100%'>
                    <input type='checkbox' name='print[]' value='contact' style='display:inline-block;position: relative;height:2.1vmin;width:2.1vmin;margin:5px 0px 0px 5px' required>
                    <label class='infolabel2'>Contact</label>
                  </div>
                  <div style='width:100%'>
                    <input type='checkbox' name='print[]' value='email' style='display:inline-block;position: relative;height:2.1vmin;width:2.1vmin;margin:5px 0px 0px 5px' required>
                    <label class='infolabel2'>Email</label>
                  </div>
                  <div style='width:100%'>
                    <input type='checkbox' name='print[]' value='specialization' style='display:inline-block;position: relative;height:2.1vmin;width:2.1vmin;margin:5px 0px 0px 5px' required>
                    <label class='infolabel2'>Specialization</label>
                  </div>
                  <div style='width:100%'>
                    <input type='checkbox' name='print[]' value='year' style='display:inline-block;position: relative;height:2.1vmin;width:2.1vmin;margin:5px 0px 0px 5px' required>
                    <label class='infolabel2'>Graduated Year</label>
                  </div>
                  <div style='width:100%'>
                    <input type='checkbox' name='print[]' value='remark' style='display:inline-block;position: relative;height:2.1vmin;width:2.1vmin;margin:5px 0px 0px 5px' required>
                    <label class='infolabel2'>Remark</label>
                  </div>

                </div>
                <br>




                <div align="right">
                 <label style='width:auto;font-size:2vmin;color:#fff;margin-right:7px;'><button type='submit' name='printinfo' class='print' id='printinfo' style='padding:8px;padding-left:15px;padding-right:15px;border:none;background-color:#297fa7;border-radius:3px;border:solid 2px #297fa7'>Print</button></label>
               </div>
             </form>

           </div>
         </div>
       </td>
     </tr>









   </table>
 </div>
</div>
<style>#aprint:checked ~ .container1{display: block;visibility: visible;}</style>

<script type="text/javascript">
 $(function(){
  var requiredCheckboxes = $('.options :checkbox[required]');
  requiredCheckboxes.change(function(){
    if(requiredCheckboxes.is(':checked')) {
      requiredCheckboxes.removeAttr('required');
    } else {
      requiredCheckboxes.attr('required', 'required');
    }
  });
});
</script>



<button onclick="window.print()" id="print" class="print" style="display: none;"  >Download Print</button>
<form action="excel.php" method="POST" style="width: auto;margin: 0;padding: 0;">
  <input type="submit" name="excelinfo" class="excel" value="Download Excel" style="background-color: green;border: none;padding: 5px 10px 5px 10px;color:#fff;border-radius: 5px;border: solid 2px green;width: auto;font-size: 1.7vmin;" />
</form>
</div>
</div>



<?php



if (isset($_POST['printinfo'])) {
  ?>
  <script type='text/javascript'>

    document.getElementById('print').onclick();

  </script>

  <?php 

}
?>

<!--     ---------------Flexible Report-------------- -->



<!-- ----------table------------ -->
<div class="col-lg-12">
  <div class="row">



    <!-- Recent Sales -->
    <div class="col-12">
      <div class="card recent-sales overflow-auto">


       <div class="card-body" style="border-top: 3px solid #297fa7;">



        <label for="selectgrad"style="float: right;padding: 0;margin: 0px 0px 30px 0px;color: #fff;font-size: 2vmin;width: 100%;border-bottom: 1px solid #000;" align="left">
          <form method="POST" action="" class="formgraduated">   

           <!--  ------------college course------------------- -->
           <script type="text/javascript">
             var options = document.getElementById('specialization').selectedOptions;
             var values = Array.from(options).map(({ value }) => value);
             console.log(values);
           </script>

           <label style="  font-size: 2vmin;font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;font-weight: 500;color: #000;">Skills</label>
           <input type="hidden" name="specialization[]" value="" checked>
           <select  id='specialization' name="specialization[]" class="specialization"  style="color: #fff;background-color: #0c506f;" class="text-input" multiple>
            <?php
                                                     //skills start
            $selectedskill = "";
            $sql = "SELECT * FROM skill";
            $result = $conn-> query($sql);
            if ($result-> num_rows > 0 ){
              while ($row=mysqli_fetch_array($result)){
                $skillsplit = explode(', ', $skill);  
                for($i=0; $i<sizeof($skillsplit); $i++){

                  if ($skillsplit[$i] == $row['skill']) {
                   $selectedskill = "selected";
                 }

               }
               echo "<option value='".$row['skill']."'".$selectedskill.">".$row['skill']."</option>";
               $selectedskill = "";
             }
           }
                                                    //closing skills
           ?>
         </select>


         <script>
          document.multiselect('#specialization')
          .setCheckBoxClick("checkboxAll", function(target, args) {
            console.log("Checkbox 'Select All' was clicked and got value ", args.checked);
          })
          .setCheckBoxClick("1", function(target, args) {
            console.log("Checkbox for item with value '1' was clicked and got value ", args.checked);
          });


        </script>

        <!--  ------------------------------- -->


        <!--  ------------college course------------------- -->
        <script type="text/javascript">
         var options = document.getElementById('collegecourse').selectedOptions;
         var values = Array.from(options).map(({ value }) => value);
         console.log(values);
       </script>
       <input type="hidden" name="collegecourse[]" value="">
       <label style="  font-size: 2vmin;font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;font-weight: 500;color: #000;">Course</label>
       <select  id='collegecourse' name="collegecourse[]" class="collegecourse"  style="color: #fff;background-color: #E8E8E8;" multiple>
         <?php 

         $sql = "select * from user where college like '%$college%'";
         $result = $conn-> query($sql);
         $selectedcourse = "";
         while ($row=mysqli_fetch_array($result)){
          $spesplit = explode(', ', $collegecourse);  
          for($i=0; $i<sizeof($spesplit); $i++){

            if ($spesplit[$i] == $row['course']) {
             $selectedcourse = "selected";
           }


         }
         echo "<option value='".$row['course']."'".$selectedcourse.">".$row['course']."</option>";
         $selectedcourse = "";

       }

       ?>
     </select>



     <script>
      document.multiselect('#collegecourse')
      .setCheckBoxClick("checkboxAll", function(target, args) {
        console.log("Checkbox 'Select All' was clicked and got value ", args.checked);
      })
      .setCheckBoxClick("1", function(target, args) {
        console.log("Checkbox for item with value '1' was clicked and got value ", args.checked);
      });


    </script>

    <!--  ------------college course------------------- -->
    <!-- -----------year---------- -->


    <?php
    date_default_timezone_set('Asia/Manila');
    $time = date('g:i a');
    $date= date("Y")+2;
    ?>
    <script type="text/javascript">
      var options = document.getElementById('yearselected').selectedOptions;
      var values = Array.from(options).map(({ value }) => value);
      console.log(values);
    </script>
    <input type="hidden" name="yearselected[]" value="">
    <label style="  font-size: 2vmin;font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;font-weight: 500;color: #000;">Year</label>
    <select  id='yearselected' name="yearselected[]" class="yearselected"  style="color: #fff;background-color: #E8E8E8;" multiple>
     <?php 

     $sql = "select * from user where college like '%$college%'";
     $result = $conn-> query($sql);
     $yearselect = "";

     for($i=2005; $i<$date; $i++){

      if (isset($_SESSION['yearselected'])) {

        $yearselected = "";
        $yearselected1 = "";
        $yearselected = $_SESSION['yearselected'];
        foreach ($_SESSION['yearselected'] as $yearselected){
         if ($i == $yearselected) {
           $yearselect = "selected";
         }

       }

     }else{
       $yearselect = "selected";
     }


     echo "<option value='".$i."'".$yearselect.">".$i."</option>";
     $yearselect = "";
   }




   ?>
 </select>



 <script>
  document.multiselect('#yearselected')
  .setCheckBoxClick("checkboxAll", function(target, args) {
    console.log("Checkbox 'Select All' was clicked and got value ", args.checked);
  })
  .setCheckBoxClick("1", function(target, args) {
    console.log("Checkbox for item with value '1' was clicked and got value ", args.checked);
  });


</script>




<input type="hidden" name="coursegraduated" value="<?php echo $recordcourse ?>">
<!-- -----------year---------- -->
<!-- -----------employement status---------- -->


<script type="text/javascript">
  var options = document.getElementById('employmentstatus').selectedOptions;
  var values = Array.from(options).map(({ value }) => value);
  console.log(values);
</script>
<input type="hidden" name="employmentstatus[]" value="">
<label style="  font-size: 2vmin;font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;font-weight: 500;color: #000;">Status</label>
<select  id='employmentstatus' name="employmentstatus[]" class="employmentstatus"  style="color: #fff;background-color: #E8E8E8;" multiple>
 <?php 



 $employmentstatusselected = "";
 $employmentstatusselected1= "";
 $employmentstatusselected2= "";
 $employmentstatusselected3= "";

 if (isset($_SESSION['employedstatus'])) {

       //  $yearselected = "";
       //  $yearselected1 = "";
       //  $yearselected = $_SESSION['yearselected'];
       //  foreach ($_SESSION['yearselected'] as $yearselected){
       //   if ($i == $yearselected) {
       //     $yearselect = "selected";
       //   }

       // }

 }


 $employmentstatussplit = explode(', ', $employmentstatus);  
 for($i=0; $i<sizeof($employmentstatussplit); $i++){

  if ($employmentstatussplit[$i] == "Employed") {
   $employmentstatusselected1 = "selected";
 }
  if ($employmentstatussplit[$i] ==  "Not Employed") {
   $employmentstatusselected2 = "selected";
 }
  if ($employmentstatussplit[$i] ==  "Not Updated") {
   $employmentstatusselected3 = "selected";
 }

}

echo "
<option value='Employed' ".$employmentstatusselected1.">Employed</option>
<option value='Not Employed'".$employmentstatusselected2.">Not Employed</option>
<option value='Not Updated'".$employmentstatusselected3.">Not Updated</option>";






?>
</select>



<script>
  document.multiselect('#employmentstatus')
  .setCheckBoxClick("checkboxAll", function(target, args) {
    console.log("Checkbox 'Select All' was clicked and got value ", args.checked);
  })
  .setCheckBoxClick("1", function(target, args) {
    console.log("Checkbox for item with value '1' was clicked and got value ", args.checked);
  });


</script>




<input type="hidden" name="coursegraduated" value="<?php echo $recordcourse ?>">
<!-- -----------employement status---------- -->
<button name="submitrecordcourseyear" class="classsubmit">Submit</button>
</form>
</label>

<!-- ----------table------------ -->



<table id="myTable" class="table table-striped" width="100%"> 
  <thead>  
    <tr>  
      <th style="border-bottom:solid 1px;width: 15%;font-size: 1.7vmin;">ID No</th>  
      <th style="border-bottom:solid 1px;width: 28%;font-size: 1.7vmin;">Name</th>  
      <th style="border-bottom:solid 1px;width: 21%;font-size: 1.7vmin;">Year</th>  
      <th style="border-bottom:solid 1px;width: 18%;font-size: 1.7vmin;">Employment Status</th>
      <th style="border-bottom:solid 1px;width: 18%;font-size: 1.7vmin;">Action</th>  

    </tr>  
  </thead>  
  <tbody>  
    <?php 

    $sql = "SELECT * FROM graduated JOIN employment ON graduated.college = employment.empcollege and graduated.idno = employment.idno WHERE employment.empcollege like '%$college%'";


    $result = $conn-> query($sql);
    if ($result-> num_rows > 0 ){
      while ($row=mysqli_fetch_array($result)){
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
     if (isset($_SESSION['yearselected'])) {
      $yearselected = $_SESSION['yearselected'];
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


    $employed = $row['employed'];
    if ($employed == "Yes") {
      $employed = "Employed";
    }
    if ($employed == "No") {
      $employed = "Not Employed";
    }
    if ($employed == '') {
      $employed = 'Not Updated';
    }
    echo "
    <tr>
    <td class='table_td'>".$row['idno']."</td>
    <td class='table_td'>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."</td>
    <td class='table_td'>".$useryearselected1."</td>
    <td class='table_td'>".$employed."</td>
    <td align='center'>
    <form method='POST' action='graduatedinfo.php'>
    <input type='hidden' name='idno' value='".$row['idno']."'>
    <button  name='gradid' id='gradid".$row['idno']."' style='display:none'></button>
    <label for='gradid".$row['idno']."' style='background-color:#07435f;color:#fff;font-size:1.7vmin;margin:0;padding: 1vmin 1.5vmin 1vmin 1.5vmin;border-radius:5px' class='classview'>
    <i class='fa fa-eye' style='font-size:1.7vmin;font;font-weight: bold;'>
    <label style='font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;padding: 0px .3vmin 0px .3vmin;font-weight:600' for='gradid".$row['idno']."'>View</label>
    </i></label>
    </form>
    </td>


    </tr>";
  }
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