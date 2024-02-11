<?php 
session_start();
include '../dbhelper.php';


if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
  //USERNAME LOGIN
     $username = $_SESSION['username'];
    if ($username == "admin") {

    if (isset($_SESSION['coursegraduated'])) {
     $college = $_SESSION['coursegraduated'];
    }


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


          //year start display
         if (isset($_SESSION['yearselected']) ) {
                $yearselected = $_SESSION['yearselected'];
                $sql = "SELECT * FROM graduated WHERE college like '%$college%' ";

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
              
          if (!isset($_SESSION['yearselected'])){
             $year = "All";

          }
          //year end display
          if (isset($_POST['relatedemployed'])) {
    
            $_SESSION['relatedemployed'] = "SELECT * FROM graduated join employment ON graduated.college = employment.empcollege  WHERE graduated.college like '%$college%' and employment.employed = 'Yes'  and graduated.idno = employment.idno and employment.employedy5 = 'Yes'";
            $_SESSION['relateddata'] = $_SESSION['relatedemployed'];
            $_SESSION['relatedlist'] = "Related";
          }
          if (isset($_POST['notrelatedemployed'])) {
    
            $_SESSION['relatedemployed'] = "SELECT * FROM graduated join employment ON graduated.college = employment.empcollege  WHERE graduated.college like '%$college%' and employment.employed = 'Yes'  and graduated.idno = employment.idno and employment.employedy5 = 'No'";
            $_SESSION['relateddata'] = $_SESSION['relatedemployed'];
            $_SESSION['relatedlist'] = "Not Related";
          }
          
          if (isset($_SESSION['relatedemployed']) || isset($_SESSION['notrelatedemployed'])) {
        
          }else{
             header('Location: graduated.php');
          exit;
          }





          $list =   $_SESSION['relatedlist'];




?>
<!DOCTYPE html>
<html lang="en">
<style type="text/css">
  
input[type="checkbox"]{
  display: none;
}
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
.viewinfo:hover{
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
.classview:hover{
 transform: translate(0, -3px);
}
.graduatedrecord{
margin-top: 15px;
  font-size: 15px;
  background-color: #0c506f;
  color: #fff;
  padding: 5px 10px 5px 10px;
}
.graduatedrecord:hover{
  transform: translate(0, -3px);
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
.table_td{
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
</style>
<script type="text/javascript">
  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<body>
<div id="loading">
  <img id="loading-image" src="../assets/img/loading.gif" alt="Loading..." />
</div>


  <?php 
                  include ("print.php");

                  ?>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
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
    <li style="color: #B5B5B5;margin-left: 10px;padding: 7px;font-size: 13px;" >
      <span>Record</span>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav3" data-bs-toggle="collapse" style="background-color: #297FA7;">
        <i class="fa fa-bullhorn"></i><span>Record</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav4" class="nav-content  " data-bs-parent="#sidebar-nav">
        <li>
    <a href="college.php">
              <i class="bi bi-circle"></i><span style="color:#ADADAD">List of Colleges</span>
            </a>
          </li>
          <li>
            <a href="addcollege.php">
              <i class="bi bi-circle"></i><span>Add College / Course</span>
            </a>
        </li>
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
          <div class="col-12">
              <div class="col-xxl-8 col-xl-8 col-md-8 col-sm-8">
              <div class="pagetitle">
              <h1>Record</h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
                  <li class="breadcrumb-item active"><?php echo $list ?></li>
                  <li class="breadcrumb-item active">Employed</li>
                  <li class="breadcrumb-item active" style="display: none">Graduated Year (<?php echo $year; ?>)</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->

            </div><!-- End Sales Card -->
                        <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-4" align="right">
                                                 <a href="grademployment.php">
                <label style='background-color:#07435f;color:#fff;font-size:1.7vmin;margin:0;padding: 1vmin 1.5vmin 1vmin 1.5vmin;border-radius:3px;margin-top: 20px;' class='graduatedrecord'>
   <i class='fa fa-arrow-left' style='font-size:13px;font;font-weight: bold;'>
   <label style=' font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;padding: 0px .3vmin 0px .3vmin;font-weight:600'>Back</label>
   </i></label>


                        </a>
            </div>




        </div>
             



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

                                      <form action='employmentrelated.php' method='POST' id='printpop' name='printpop' onsubmit='return validatePrint()'>
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
                                 
                                
                                                                  <?php
                                          if (isset($_POST['relatedemployed']) ){
                                              $_SESSION['relatedemployedprint'] = "1";
                                            unset($_SESSION['notrelatedemployedprint']);
         
                                          }
                                             if (isset($_POST['notrelatedemployed'])) {
                                                 $_SESSION['notrelatedemployedprint'] = "1";
                                            unset($_SESSION['relatedemployedprint']);
                                          }

                           if(isset($_SESSION['relatedemployedprint']) || isset($_SESSION['notrelatedemployedprint'])){ 

                  echo "<div style='width:100%'>
                    <input type='checkbox' name='print[]' value='occupation' style='display:inline-block;position: relative;height:2.1vmin;width:2.1vmin;margin:5px 0px 0px 5px' required>
                    <label class='infolabel2'>Occupation</label>
                  </div>";
   }

echo"          </div>
                <br>";






                                          if (isset($_SESSION['relatedemployedprint'])) {
                                           echo "<label style='width:100%;text-align:right;font-size:2vmin;color:#F1F4F2;margin-right:7px;'><button type='submit' name='relatedemployedprintinfo' class='printinfoemployed print' id='relatedemployedprintinfo' style='padding:8px;padding-left:15px;padding-right:15px;border:none;background-color:#297fa7;border-radius:3px;border:solid 2px #297fa7'>Print</button></label>";
                                          
                                          }
                                          if (isset($_SESSION['notrelatedemployedprint'])) {
                                              echo "<label style='width:100%;text-align:right;font-size:2vmin;color:#F1F4F2;margin-right:7px;'><button type='submit' name='notrelatedemployedprintinfo' class='printinfonotemployed print' id='notrelatedemployedprintinfo' style='padding:8px;padding-left:15px;padding-right:15px;border:none;background-color:#297fa7;border-radius:3px;border:solid 2px #297fa7'>Print</button></label>";
                                       
                                          }
                                





                                   


                                       ?>
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

                        

                                                    <?php



                                          if (isset($_SESSION['relatedemployedprint'])) {
                                           echo "<input type='submit' name='relatedexcelinfoemployed' class='excel' value='Download Excel' style='background-color: green;border: none;padding: 5px 10px 5px 10px;color:#fff;border-radius: 5px;border: solid 2px green;width: auto;font-size: 1.7vmin;' />";
                                          
                                          }
                                          if (isset($_SESSION['notrelatedemployedprint'])) {
                                              echo "<input type='submit' name='notrelatedexcelinfoemployed' class='excel' value='Download Excel' style='background-color: green;border: none;padding: 5px 10px 5px 10px;color:#fff;border-radius: 5px;border: solid 2px green;width: auto;font-size: 1.7vmin;' />";
                                       
                                          }
                      



                                   


                                       ?>





                        </form>
          </div>
        </div>



        <?php

          
          
  if (isset($_POST['relatedemployedprintinfo']) || isset($_POST['notrelatedemployedprintinfo'])) {
          ?>
            <script type='text/javascript'>

            document.getElementById('print').onclick();

            </script>
            
         <?php 

        }
        ?>

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

                 <div class="card-body" style="padding: 20px;border-top: 3px solid #297fa7;">
  
    <table id="myTable" class="table table-striped" width="100%"> 
        <thead>  
          <tr>  
            <th style="border-bottom:solid 1px;width: 15%;font-size: 1.7vmin;">ID No</th>  
            <th style="border-bottom:solid 1px;width: 30%;font-size: 1.7vmin;">Name</th>  
            <th style="border-bottom:solid 1px;width: 15%;font-size: 1.7vmin;">Year</th>  
            <th style="border-bottom:solid 1px;width: 15%;font-size: 1.7vmin;">Contact</th>
            <th style="border-bottom:solid 1px;width: 10%;font-size: 1.7vmin;">Action</th>  

 
          </tr>  
        </thead>  
        <tbody>  
        <?php

        $sql = $_SESSION['relatedemployed'];
        
        $result = $conn-> query($sql);
        if ($result-> num_rows > 0 ){
        while ($row=mysqli_fetch_array($result)){
        $looping = 0;
        $looping1 = 0; 
        $looping2 = 0;
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
       // ---------------------college course---------
        if ($looping != 0 && $looping1 != 0 && $looping2 != 0) {
        echo "
        <tr>
        <td class='table_td'>".$row['idno']."</td>
        <td class='table_td'>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."</td>
        <td class='table_td'>".$row['yeargrad']."</td>
        <td class='table_td'>".$row['contact']."</td>
        <td class='table_td' align='center'>
        <form method='POST' action='grademploymentinfo.php'>
        <input type='hidden' name='idno' value='".$row['idno']."'>
          <button  name='gradid' id='gradid".$row['idno']."' style='display:none'></button>
            <label for='gradid".$row['idno']."' style=';background-color:#07435f;color:#fff;font-size:1.7vmin;margin:0;padding: 1vmin 1.5vmin 1vmin 1.5vmin;border-radius:3px' class='classview'>
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