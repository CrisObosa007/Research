
<?php
session_start();
include("dbhelper.php");
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
//USERNAME LOGIN
$username = $_SESSION['username'];
if ($username == "admin") {
$course = 'Admin';



     if (isset($_POST['employed'])) {
       $_SESSION['employed'] = "SELECT * FROM graduated JOIN employment ON graduated.course = employment.empcourse WHERE  employment.employed = 'Yes' and graduated.idno = employment.idno";
       $_SESSION['notemployed'] = "";
       $_SESSION['notupdated'] = "";
       $_SESSION['graduated'] = "";
       $_SESSION['data'] = $_SESSION['employed'] ;
       $_SESSION['list'] = "Employed";

     }
     if (isset($_POST['notemployed'])) {
       $_SESSION['employed'] = "";
       $_SESSION['notemployed'] = "SELECT * FROM graduated JOIN employment ON graduated.course = employment.empcourse WHERE  employment.employed = 'No' and graduated.idno = employment.idno";
       $_SESSION['notupdated'] = "";
       $_SESSION['graduated'] = "";
       $_SESSION['data'] = $_SESSION['notemployed'] ;
       $_SESSION['list'] = "Not Employed";

     }
     if (isset($_POST['notupdated'])) {
       $_SESSION['employed'] = "";
       $_SESSION['notemployed'] = "";
       $_SESSION['notupdated'] = "SELECT * FROM graduated JOIN employment ON graduated.course = employment.empcourse WHERE employment.employed = '' and graduated.idno = employment.idno";
       $_SESSION['graduated'] = "";
       $_SESSION['data'] = $_SESSION['notupdated'] ;
       $_SESSION['list'] = "Not Updated";

     }
     if (isset($_POST['graduated'])) {
       $_SESSION['employed'] = "";
       $_SESSION['notemployed'] = "";
       $_SESSION['notupdated'] = "";
       $_SESSION['graduated'] = "SELECT * FROM graduated JOIN employment ON graduated.course = employment.empcourse and graduated.idno = employment.idno";
       $_SESSION['data'] = $_SESSION['graduated'] ;
       $_SESSION['list'] = "List";

     }

     $list =   $_SESSION['list']. "";






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
.backbtn{
margin-top: 15px;
  font-size: 15px;
  background-color: #0c506f;
  color: #fff;
  padding: 5px 10px 5px 10px;
}
.backbtn:hover{
  transform: translate(0, -3px);
}
.btn {
  border: none;
  font-family: 'Lato';
  font-size: 1.7vmin;
  background: none;
  cursor: pointer;
  padding: 0px 10px 10px 10px;
  display: inline-block;
  margin: 0px 0px;
  text-transform: uppercase;
  letter-spacing: 1px;
  font-weight: 600;
  outline: none;
  position: relative;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  transition: all 0.3s;

}

.btn:after {
  content: '';
  position: absolute;
  z-index: -1;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  transition: all 0.3s;

}

/* Pseudo elements for icons */
.btn:before {
  font-family: 'FontAwesome';
  speak: none;
  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  line-height: 1;
  position: relative;
  -webkit-font-smoothing: antialiased;
/*  background-color: red;*/
  

}


/* Icon separator */
.btn-sep {
  padding: 10px 10px 10px 3.7vmin;
  background-color: #fff;
}
@media only screen and (max-width: 600px) {
  .btn-sep {
    padding: 10px 10px 10px 5vmin;
  }
}
.btn-sep:before {
/*  background: rgba(0,0,0,0.15);*/

}

.btn-4 {
  background: #07435f;
  color: #fff;

}

.btn-4:hover {
  background: #0F638A;
  color: #ECECEC;
}



.btn-4:before {
  position: absolute;

  left: 0;
  top: 0;
  margin-top: 8px;
  font-size: 2vmin;
  margin-left:7px;

}


.icon-send:before {
  content: "\f1d8";

}
.table_td{
  font-size: 1.7vmin;
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
</style>
<body>
<div id="loading">
  <img id="loading-image" src="assets/img/loading.gif" alt="Loading..." />
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
            <img src="assets/img/<?php 
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
          <div class="pagetitle">
              <div class="row">
                  <div class="col-12">
              <div class="col-xxl-5 col-md-5">
          
              <h1>Record</h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item active"><?php echo $list ?></li>
                  <li class="breadcrumb-item active">Alumni</li>
                </ol>
                   </nav>
            </div><!-- End Page Title -->
        
              <div class="col-xxl-7 col-md-7" align="right">
                        <a href="dashboard.php">
                                 <label style='background-color:#07435f;color:#fff;font-size:1.7vmin;margin:0;padding: 1vmin 1.5vmin 1vmin 1.5vmin;border-radius:3px;margin-top: 20px;' class='backbtn'>
   <i class='fa fa-arrow-left' style='font-size:13px;font;font-weight: bold;'>
   <label style=' font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;padding: 0px .3vmin 0px .3vmin;font-weight:600'>Back</label>
   </i></label>

                        </a>
              </div>


              </div>
            </div>
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

                 <div class="card-body" style="padding: 20px;border-top: 3px solid #297fa7;">
  
    <table id="myTable" class="table table-striped" width="100%"> 
        <thead>  
           <tr>  
            <?php
              if ($_SESSION['list'] == "List") {
        
             ?>
             <th style="border-bottom:solid 1px;width: 15%;font-size: 1.7vmin;">ID No</th>  
            <th style="border-bottom:solid 1px;width: 30%;font-size: 1.7vmin;">Name</th>  
            <th style="border-bottom:solid 1px;width: 15%;font-size: 1.7vmin;">Year</th>  
            <th style="border-bottom:solid 1px;width: 15%;font-size: 1.7vmin;">OR NO</th>
            <th style="border-bottom:solid 1px;width: 15%;font-size: 1.7vmin;">Employed</th>
            <th style="border-bottom:solid 1px;width: 20%;font-size: 1.7vmin;">Action</th>  
            <?php }?>
            <?php
              if ($_SESSION['list'] == "Employed" || $_SESSION['list'] == "Not Employed" || $_SESSION['list'] == "Not Updated") {
        
             ?>
             <th style="border-bottom:solid 1px;width: 20%;font-size: 1.7vmin;">ID No</th>  
            <th style="border-bottom:solid 1px;width: 30%;font-size: 1.7vmin;">Name</th>  
            <th style="border-bottom:solid 1px;width: 20%;font-size: 1.7vmin;">Year</th>  
            <th style="border-bottom:solid 1px;width: 20%;font-size: 1.7vmin;">OR NO</th>
            <th style="border-bottom:solid 1px;width: 20%;font-size: 1.7vmin;">Action</th>  
            <?php }?>

 
          </tr>
        </thead>  
        <tbody>  
        <?php 
         $sql = $_SESSION['data'];
         $result = $conn-> query($sql);
        if ($result-> num_rows > 0 ){
        while ($row=mysqli_fetch_array($result)){
              $college = $row['college'];

        $collegesuser1 = $row['college'];
        $spesplit = explode(', ', $collegesuser1);  
        for($iii=0; $iii<sizeof($spesplit); $iii++){

          if ($iii==0) {
              $yeargrad = $row['yeargrad'];
            
          }
          if ($iii==1) {
              $courseinfo = $row['course'] . ", " . $row['course1'];
              $yeargrad = $row['yeargrad'] . ", " .  $row['yeargrad1'];
            
          }

        }

           $employed = $row['employed'];
          if ($employed == '') {
            $employed = 'Not Updated';
          }
        echo "
        <tr>
        <td class='table_td'>".$row['idno']."</td>
        <td class='table_td'>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."</td>
        <td class='table_td'>".$yeargrad."</td>";
        if ($row['orno'] == "") {
          echo "     <td class='table_td'>N/A</td>";
        }else{
          echo "     <td class='table_td'>".$row['orno']."</td>";
        }
        if ($_SESSION['list'] == "List") {
          echo " <td class='table_td'>".$employed."</td>";
        }else{

        }
       


        echo "<td align='center'>
        <form method='POST' action='graduatedinfo.php'>
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