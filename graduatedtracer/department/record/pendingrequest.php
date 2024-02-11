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

    if (isset($_POST['submitpendingcourse'])) {
           $pendingcourse = "";
           $pendingcourse = $_POST['pendingcourse'];
           $pendingcourse1 = "";
          if ($pendingcourse != "") {
            foreach ($_POST['pendingcourse'] as $pendingcourse){
            $pendingcourse1 .= $pendingcourse . ", ";
            }
            $pendingcourse1 = substr_replace($pendingcourse1 ,"", -2);

            $_SESSION['pendingcourse'] = $pendingcourse1;
            $pendingcourse = $_SESSION['pendingcourse'];
           }

        }




    if (isset($_SESSION['pendingcourse'])) {
    $pendingcourse = $_SESSION['pendingcourse'];
    }else{
    $pendingcourse = "";
    $sql = "SELECT * FROM user WHERE college='$college'";
    $result = $conn-> query($sql);
    if ($result-> num_rows > 0 ){
    while ($row=mysqli_fetch_array($result)){
        $pendingcourse .=  $row['course'].", ";

        }
    }
  }


    

    
?>
<!DOCTYPE html>
<html lang="en">
<style type="text/css">
  
input[type="checkbox"]{
  display: none;
  margin: 0;
}
#deletepopup input[type="checkbox"]{
  display: block;
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
  /*transform: translate(0, -3px);*/
  background-color: red;

}

.infolabel1{
    font-size: 2vmin;
    color: #101010;
    padding-left: 15px;
    text-align: left;
    width: 100%;
    font-family: Roboto, "Helvetica Neue", HelveticaNeue, Helvetica, Arial, sans-serif;
    padding: 5px 0px 0px 0px;
}
.infolabel2{
  font-size: 2.2vmin;
  width: 90%;
  color: #000;
  border-radius: 7px;
  text-align: left;
  font-weight: 540;
  font-family: Roboto, "Helvetica Neue", HelveticaNeue, Helvetica, Arial, sans-serif;
  padding: 5px 0px 0px 0px;

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
  background-color: transparent;
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

}
.container02 .close-btn2{
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
.container02 .close-btn2:hover{
  color:rgba(255,255,255,0.9);
  /*transform: translate(0, -3px);*/
  background-color: red;

}





/*start sucessfully*/
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
table tbody tr td{
 border-color: #696969;
}
.table-responsive{
  padding-top: 0px;
}
.icon-success:hover{
  transform: translate(0, -3px);
}
.icon-delete:hover{
  transform: translate(0, -3px);
}
.approveyes:hover{
  transform: translate(0, -3px);
}
.approveno:hover{
  transform: translate(0, -3px);
}
.deleteyes:hover{
  transform: translate(0, -3px);
}
.deleteno:hover{
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
  font-size: 1.7vmin;x;
  padding: 7px 13px 7px 13px;
}
.deletebtn:hover{
  transform: translate(0, -3px);
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
.popup_table{
  width: 60%;
  margin-left: 20%;
  margin-right: 20%;
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
</style>
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

  <title>Pending Request</title>
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
/*college course*/
 #pendingcourse_multiSelect {
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
 #pendingcourse_input {
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
 #pendingcourse_itemList {
  background-color: #E8E8E8;
  color: #000;
  width: auto;
  z-index: 1000;
  text-align: left;
  font-size: 2vmin;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
  font-weight: 400;
  }
#pendingcourselabel input[type="checkbox"]{
  display: block;
  position: relative;
  display: inline-block;
}

</style>
<script type="text/javascript">
    function validateReason() {
    var file = document.profileForm.file.value;

    var fileErr  = true;


         if(file == "") {
            printError("fileErr", "Please Select Photo");
        } else {
           var fileName = document.getElementById("file").value;
           var idxDot = fileName.lastIndexOf(".") + 1;
           var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
           if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
              printError("fileErr", "");
              fileErr = false;
            }else{
                printError("fileErr", "Invalid Photo Only accept (PNG/JPEG/JPG)");
          } 

           
        }



    
     if((fileErr) == true) {
       return false;
    } else {
        alert(dataPreview);
    }
    
};

</script>
<body>
<div id="loading">
  <img id="loading-image" src="../assets/img/loading.gif" alt="Loading..." />
</div>


  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
         <?php if(isset($_SESSION['departmentrecordsuccess'])) {?>
    <div id="success-hidden">
          <input type="checkbox" id="tablesuccess"><label for="tablesuccess"  class=""></label>
                     <div class="container-success1" id="successtransition">
                          <div class="container-success01" align="center">

                           
                                <label class="title_info">
                                <img src="../assets/img/success.gif" style="width: 40%;height: 40%;" />
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
unset($_SESSION['departmentrecordsuccess']);
 ?>




 <?php if(isset($_SESSION['departmentrecorddelete'])) {?>
    <div id="delete-hidden">
          <input type="checkbox" id="tabledeleteinfo"><label for="tabledeleteinfo"  class=""></label>
                     <div class="container-success1" id="deleteinfitransition">
                          <div class="container-success01" align="center">

    
                                <label class="title_info">
                                <img src="../assets/img/delete1.gif" style="width: 40%;height: 40%;" />
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
   unset($_SESSION['departmentrecorddelete']);
   ?>



    <div class="d-flex align-items-center justify-content-between">
      <a href="../dashboard.php" class="logo d-flex align-items-center">
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
            <a href="#">
              <i class="bi bi-circle"></i><span style="color:#ADADAD">Pending Request (Department)</span>
            </a>
          </li>
          <li>
            <a href="graduated.php">
              <i class="bi bi-circle"></i><span>Alumni</span>
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
       <div class="col-xxl-3 col-md-4">
              <div class="pagetitle">
              <h1>Record</h1>
              <nav >
                <ol class="breadcrumb" style="background-color:transparent;">
                  <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
                  <li class="breadcrumb-item active">Pending Request</li>
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


                <div class="card-body" style="border-top: 3px solid #297fa7;">


          <div class="table-responsive">
            <script type="text/javascript">
              setTimeout(function() {
              $('#validation-hidden').hide()
            }, 5000);
           </script>

          <?php if(isset($_SESSION['validation'])) {?>
            <div style="width:100%" align="center" id="validation-hidden" >
            <label style="color: red;width: 100%;">Graduate student already exist </label>
            </div>
             <?php 
           }
          unset($_SESSION['validation']);
           ?>
                           <form method="POST" action="" class="formgraduated">  
                           <label for="selectgrad"style="float: right;padding: 0;margin: 0px 0px 30px 0px;color: #fff;font-size: 2vmin;width: 100%;border-bottom: 2px solid #ebeef4;" align="left" id="pendingcourselabel">
                        
                       <!--  ------------college course------------------- -->
                                          <script type="text/javascript">
                                             var options = document.getElementById('pendingcourse').selectedOptions;
                                              var values = Array.from(options).map(({ value }) => value);
                                              console.log(values);
                                          </script>
                                          <input type="hidden" name="pendingcourse[]" value="">
                                           <label style="  font-size: 2vmin;font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;font-weight: 500;color: #000;">Course</label>
                                          <select  id='pendingcourse' name="pendingcourse[]" class="pendingcourse"  style="color: #fff;background-color: #E8E8E8;" multiple>
                                             <?php 

                                                $sql = "select * from user where college= '$college'";
                                                $result = $conn-> query($sql);
                                                $selectedcourse = "";
                                                while ($row=mysqli_fetch_array($result)){
                                                  $spesplit = explode(', ', $pendingcourse);  
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
                                          document.multiselect('#pendingcourse')
                                              .setCheckBoxClick("checkboxAll", function(target, args) {
                                                  console.log("Checkbox 'Select All' was clicked and got value ", args.checked);
                                              })
                                              .setCheckBoxClick("1", function(target, args) {
                                                  console.log("Checkbox for item with value '1' was clicked and got value ", args.checked);
                                              });


                                      </script>

                         <!--  ------------college course------------------- -->
                         <button name="submitpendingcourse" class="classsubmit">Submit</button>
                           </label>
                       </form>

<table id="myTable" class="table table-striped" width="100%" style=""> 
        <thead>  
          <tr>  
            <th style="border-bottom:solid 1px;width: 20%;font-size:1.7vmin;">ID No.</th>  
            <th style="border-bottom:solid 1px;width: 25%;font-size:1.7vmin;">Name</th>  
            <th style="border-bottom:solid 1px;width: 20%;font-size:1.7vmin;">Year</th>  
            <th style="border-bottom:solid 1px;width: 15%;font-size:1.7vmin;">Contact</th>
            <th style="border-bottom:solid 1px;width: 20%;font-size:1.7vmin;">Action</th>  
          </tr>  
        </thead>  
     
        <tbody>  
        <?php 
        $sql = "select * from signup where college = '$college' and status = 'pending'";
        $result = $conn-> query($sql);
        if ($result-> num_rows > 0 ){
        while ($row=mysqli_fetch_array($result)){

        $looping = 0;
        // ---------------------college course---------
        $pendingcourse1 = $pendingcourse;
        $spesplit = explode(', ', $pendingcourse1);  
        for($i=0; $i<sizeof($spesplit); $i++){

            $userpendingcourse1 = $row['course'];
            $userspesplit = explode(', ', $userpendingcourse1);  
            for($ii=0; $ii<sizeof($userspesplit); $ii++){
                if ($spesplit[$i] == $userspesplit[$ii]) {
                 $looping = 2;
                }
            }

        }
       // ---------------------college course---------
        if ($looping != 0) {



        $pic = "0.jpg";

        if ($row['gender'] == "Male") {
          $pic = "1.jpg";
        }

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
                                                         
                         
                            <table class='popup_table' >
                        

                            <tr>
                              <td colspan='2'>
                              <div class='closingtab'>
                                <label for='"."a".$row['id']."' class='close-btn1 fas fa-times' title='close'></label><br>
                              </div>
                               <label style='text-align: center;width:100%;font-size:3vmin;color:#0c506f;margin:0;padding:0'>GRADUATE INFORMATION</label>
                              </td>
                            </tr>
                            <tr>
                              <td  colspan='2' style='border-top:solid #0c506f 2px;'>
                              </td>
                            </tr>
                             <tr>
                              <td  colspan='2' align='center'>
                              <div class='col-xl-3  col-md-12 mt-2'  align='center' style='box-shadow: rgba(0, 0, 0, 0.15) 0px 2px 5px;'>
                                 <div class='p-3' style='background-color:white;width:100%;' >
                                      <img src='../../../graduatedstudent/graduatedimage/".$pic."' style='width: 20vmin;height:20vmin;' />               
                                 </div>
                              </div>
                              <div class='col-xl-9  col-md-12 mt-2' style='box-shadow: rgba(0, 0, 0, 0.15) 0px 2px 5px;padding 10px 5px 10px 5px' >
                              
                                  <div class='d-flex align-items-cente p-2' style='background-color:white'>
                                          <div class='align-items-center' style='width: 20%;''>
                                            <label class='infolabel1'>ID No :</label>
                                          </div>
                                          <div style='width:80%'>
                                            <label id='categoryInfo' class='infolabel2'>".$row['idno']."</label>
                                          </div>                 
                                  </div>
                                    <div class='d-flex align-items-cente p-2' style='background-color:white'>
                                          <div class='align-items-center' style='width: 20%;''>
                                            <label class='infolabel1'>Name :</label>
                                          </div>
                                          <div style='width:80%'>
                                            <label id='categoryInfo' class='infolabel2'>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."</label>
                                          </div>                 
                                  </div>
                                   <div class='d-flex align-items-cente p-2' style='background-color:white'>
                                          <div class='align-items-center' style='width: 20%;''>
                                            <label class='infolabel1'>Course :</label>
                                          </div>
                                          <div style='width:80%'>
                                            <label id='categoryInfo' class='infolabel2'>".$row['course']."</label>
                                          </div>                 
                                  </div>
                                   <div class='d-flex align-items-cente p-2' style='background-color:white'>
                                          <div class='align-items-center' style='width: 20%;''>
                                            <label class='infolabel1'>Gender :</label>
                                          </div>
                                          <div style='width:80%'>
                                            <label id='categoryInfo' class='infolabel2'>".$row['gender']."</label>
                                          </div>                 
                                  </div>
                                   <div class='d-flex align-items-cente p-2' style='background-color:white'>
                                          <div class='align-items-center' style='width: 20%;''>
                                            <label class='infolabel1'>Address :</label>
                                          </div>
                                          <div style='width:80%'>
                                            <label id='categoryInfo' class='infolabel2'>".$row['street']." ".$row['barangay']." ".$row['city']." ".$row['province']."</label>
                                          </div>                 
                                  </div>
                                   <div class='d-flex align-items-cente p-2' style='background-color:white'>
                                          <div class='align-items-center' style='width: 20%;''>
                                            <label class='infolabel1'>Email :</label>
                                          </div>
                                          <div style='width:80%'>
                                            <label id='categoryInfo' class='infolabel2'>".$row['email']."</label>
                                          </div>                 
                                  </div>
                                   <div class='d-flex align-items-cente p-2' style='background-color:white'>
                                          <div class='align-items-center' style='width: 20%;''>
                                            <label class='infolabel1'>Year :</label>
                                          </div>
                                          <div style='width:80%'>
                                            <label id='categoryInfo' class='infolabel2'>".$row['yeargrad']."</label>
                                          </div>                 
                                  </div>

                              </div>
                              </td>
                            </tr>
                      


                        
                        
                                <form action='pendingrequestserver.php' method='POST'>
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
                                <input type='hidden' name='college' value='".$college."'>
                                <input type='hidden' name='password' value='".$row['password']."'>
                                <br>

                              <tr>
                               <td colspan='2'>
                                           <label style='width:100%;text-align:right;font-size:2vmin;color:#247a01;margin:10px 0px 10px 0px'><button type='submit' name='approveinfo' class='approveyes' id='approveinfo' style='padding:8px;padding-left:15px;padding-right:15px;border:none;background-color:#009933;border-radius:3px;color:#fff'>Approve</button></label>
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
   <label style=' font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;padding: 0px .3vmin 0px .3vmin;font-weight:600' for='b".$row['id']."'>Deny</label>
   </i></label>                      <div class='container2'>

                          <div class='container02'>
                                                         
                         
                            <table class='popup_table' style='background-color:#000'>
                              <tr>
                              <td colspan='2'>
                              <div class='closingtab'>
                                <label for='"."b".$row['id']."' class='close-btn2 fas fa-times' title='close'></label><br>
                              </div>
                               <label style='text-align: center;width:100%;font-size:3vmin;color:#0c506f;margin:0;padding:0'>GRADUATE INFORMATION</label>
                              </td>
                            </tr>
                            <tr>
                              <td  colspan='2' style='border-top:solid #0c506f 2px;'>
                              </td>
                            </tr>
                             <tr>
                              <td  colspan='2' align='center'>
                              <div class='col-xl-3  col-md-12 mt-2'  align='center' style='box-shadow: rgba(0, 0, 0, 0.15) 0px 2px 5px;'>
                                 <div class='p-3' style='background-color:white;width:100%;' >
                                      <img src='../../../graduatedstudent/graduatedimage/".$pic."' style='width: 20vmin;height:20vmin;' />               
                                 </div>
                              </div>
                              <div class='col-xl-9  col-md-12 mt-2' style='box-shadow: rgba(0, 0, 0, 0.15) 0px 2px 5px;padding 10px 5px 10px 5px' >
                              
                                  <div class='d-flex align-items-cente p-2' style='background-color:white'>
                                          <div class='align-items-center' style='width: 20%;''>
                                            <label class='infolabel1'>ID No :</label>
                                          </div>
                                          <div style='width:80%'>
                                            <label id='categoryInfo' class='infolabel2'>".$row['idno']."</label>
                                          </div>                 
                                  </div>
                                    <div class='d-flex align-items-cente p-2' style='background-color:white'>
                                          <div class='align-items-center' style='width: 20%;''>
                                            <label class='infolabel1'>Name :</label>
                                          </div>
                                          <div style='width:80%'>
                                            <label id='categoryInfo' class='infolabel2'>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."</label>
                                          </div>                 
                                  </div>
                                   <div class='d-flex align-items-cente p-2' style='background-color:white'>
                                          <div class='align-items-center' style='width: 20%;''>
                                            <label class='infolabel1'>Course :</label>
                                          </div>
                                          <div style='width:80%'>
                                            <label id='categoryInfo' class='infolabel2'>".$row['course']."</label>
                                          </div>                 
                                  </div>
                                   <div class='d-flex align-items-cente p-2' style='background-color:white'>
                                          <div class='align-items-center' style='width: 20%;''>
                                            <label class='infolabel1'>Gender :</label>
                                          </div>
                                          <div style='width:80%'>
                                            <label id='categoryInfo' class='infolabel2'>".$row['gender']."</label>
                                          </div>                 
                                  </div>
                                   <div class='d-flex align-items-cente p-2' style='background-color:white'>
                                          <div class='align-items-center' style='width: 20%;''>
                                            <label class='infolabel1'>Address :</label>
                                          </div>
                                          <div style='width:80%'>
                                            <label id='categoryInfo' class='infolabel2'>".$row['street']." ".$row['barangay']." ".$row['city']." ".$row['province']."</label>
                                          </div>                 
                                  </div>
                                   <div class='d-flex align-items-cente p-2' style='background-color:white'>
                                          <div class='align-items-center' style='width: 20%;''>
                                            <label class='infolabel1'>Email :</label>
                                          </div>
                                          <div style='width:80%'>
                                            <label id='categoryInfo' class='infolabel2'>".$row['email']."</label>
                                          </div>                 
                                  </div>
                                   <div class='d-flex align-items-cente p-2' style='background-color:white'>
                                          <div class='align-items-center' style='width: 20%;''>
                                            <label class='infolabel1'>Year :</label>
                                          </div>
                                          <div style='width:80%'>
                                            <label id='categoryInfo' class='infolabel2'>".$row['yeargrad']."</label>
                                          </div>                 
                                  </div>

                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td colspan='2'>
                                <div class='col-xl-12  col-md-12 mt-2'  align='center' style='box-shadow: rgba(0, 0, 0, 0.15) 0px 2px 8px;margin-bottom:20px'>
                                 <div class='p-3' style='background-color:white;width:100%;' >

                                      <form action='pendingrequestserver.php' method='POST' id='deletepopup' name='deletepopup' onsubmit='return validateReason()'>
                                      <input type='hidden' name='delete' value='delete'>
                                      <input type='hidden' name='id' value=".$row['id'].">
                
                                      <div style='width:100%' align='left'class='form-group options'>
                                          <label class='infolabel1' style='font-size:2.3vmin'>Reason for Denying? <label style='color:red'>*</label></label>
                                    
                                             <div style='width:100%'>
                                              <input type='checkbox' name='reasons[]' value='Not Accurate Information' style='display:inline-block;position: relative;height:2.1vmin;width:2.1vmin;margin:5px 0px 0px 5px' required>
                                              <label class='infolabel2'>Not Accurate Information</label>
                                            </div>
                                           <div style='width:100%'>
                                              <input type='checkbox' name='reasons[]' value='Has a record of Unlawful Acts' style='display:inline-block;position: relative;height:2.1vmin;width:2.1vmin;margin:5px 0px 0px 5px' required>
                                              <label class='infolabel2'>Has a record of Unlawful Acts</label>
                                            </div>
                                            <div style='width:100%'>
                                              <input type='checkbox' name='reasons[]' value='Duplication of Data' style='display:inline-block;position: relative;height:2.1vmin;width:2.1vmin;margin:5px 0px 0px 5px' required>
                                              <label class='infolabel2'>Duplication of Data</label>
                                            </div>
                                               <div style='width:100%'>
                                              <input type='checkbox' name='reasons[]' value='Inactive Account/User' style='display:inline-block;position: relative;height:2.1vmin;width:2.1vmin;margin:5px 0px 0px 5px' required>
                                              <label class='infolabel2'>Inactive Account/User</label>
                                            </div>
                                            <div style='width:100%' style='display:inline-block;position: relative;'>
                                            <input type='checkbox' name='reasons[]' value='otherreason' style='display:inline-block;position: relative;height:2.1vmin;width:2.1vmin;margin:5px 0px 0px 5px' required id='otherreason".$row['id']."' onclick='javascript:postgraduateCheck".$row['id']."();'>

                                              <label class='infolabel2' style='width:auto'>Other Reason</label>
                                              <input type='text' name='otherreason' value='' style='width:60%;padding:2px 5px 2px 5px;color:#000;font-family: Roboto, HelveticaNeue, Helvetica, Arial, sans-serif;font-weight:500;font-size:2vmin;visibility:hidden;' id='textOther".$row['id']."'>
                                              
                                            </div>
                                                  <script>
                                                     function postgraduateCheck".$row['id']."() {
                                                      if (document.getElementById('otherreason".$row['id']."').checked) {
                                                             textOther".$row['id'].".style.visibility = 'visible';
                                                            document.getElementById('textOther".$row['id']."').required = true;

                                                      }else{
                                                           textOther".$row['id'].".style.visibility = 'hidden';
                                                          document.getElementById('textOther".$row['id']."').required = false;

                                                      }
                                                    }
                                                    </script>
                                         
                                      </div>
                                      <br>



                                     <label style='width:100%;text-align:right;font-size:2vmin;color:#F1F4F2;margin-right:7px;'><button type='submit' name='deleteinfo' class='approveno' id='deleteinfo' style='padding:8px;padding-left:15px;padding-right:15px;border:none;background-color:#CC0000;border-radius:3px;'>Submit</button></label>
                                      </form>

                                 </div>
                              </div>
                              </td>
                            </tr>
                    


                        
                        


                                


                                   </table>
                          </div>
                    </div>
          <style>#b".$row['id'].":checked ~ .container2{display: block;visibility: visible;}</style>
       


        </td>


        </tr>";
            }
        }
      }
        ?>  
        </tbody>  
     </table>
     <!-- checkbox required atleast one -->
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
     <!-- Other reason -->






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