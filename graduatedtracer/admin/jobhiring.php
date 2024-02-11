
<?php 
session_start();
include 'dbhelper.php';


if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    //USERNAME LOGIN
    $username = $_SESSION['username'];
    if ($username == "admin") {
    $course = 'Admin';
?>
<!DOCTYPE html>
<html lang="en">
<style type="text/css">
  
input[type="checkbox"]{
  display: none;
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

  <title>Job Hiring</title>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css?v=<?php echo time();?>" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/paginationcss.css?v=<?php echo time();?>">
  <link rel="stylesheet" type="text/css" href="jobpost/job.css?v=<?php echo time();?>">

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
<body>
<div id="loading">
  <img id="loading-image" src="assets/img/loading.gif" alt="Loading..." />
</div>


  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
  <?php if(isset($_SESSION['success'])) {?>
    <div id="success-hidden">
          <input type="checkbox" id="tablesuccess"><label for="tablesuccess"  class=""></label>
                     <div class="container-success1" id="successtransition">
                          <div class="container-success01">

                                <label for="tablesuccess" ></label>
                                <label class="title_info">
                                <img src="../assets/img/success.gif" style="width: 200px;height: 200px;" />
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
unset($_SESSION['success']);
 ?>


   <?php if(isset($_SESSION['delete'])) {?>
    <div id="delete-hidden">
          <input type="checkbox" id="tabledeleteinfo"><label for="tabledeleteinfo"  class=""></label>
                     <div class="container-success1" id="deleteinfitransition">
                          <div class="container-success01">

                                <label for="tabledeleteinfo" ></label>
                                <label class="title_info">
                                <img src="../assets/img/delete1.gif" style="width: 200px;height: 200px;" />
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
      <a href="dashboard.php" class="logo d-flex align-items-center">
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
              <h1>Job Posting</h1>
              <nav >
                <ol class="breadcrumb" style="background-color:transparent;">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item active">Job Hiring</li>
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

                <div class="card-body" style="border-top: 3px solid #297fa7;">
          <div class="table-responsive">
<table id="myTable" class="table table-striped" width="100%" style=""> 
        <thead>  
          <tr>  
                 <th style="border-bottom:solid 1px;width: 35%;font-size: 1.7vmin;">Company Name</th>  
            <th style="border-bottom:solid 1px;width: 25%;font-size: 1.7vmin;">Job Title</th>  
            <th style="border-bottom:solid 1px;width: 25%;font-size: 1.7vmin;">Job Type</th>  
            <th style="border-bottom:solid 1px;width: 15%;font-size: 1.7vmin;">Action</th> 

          </tr>  
        </thead>  
        <tbody>  
        <?php 
        $sql = "select * from jobpost where jobstatus = 'Approved' and courseuploaded = 'Admin'";
        $result = $conn-> query($sql);
        if ($result-> num_rows > 0 ){
        while ($row=mysqli_fetch_array($result)){
        $startdate = $row['startdate'];
        $startdate = strtotime($startdate);
        $startdate= date("F d Y" , $startdate);
        $enddate = $row['enddate'];
        $enddate = strtotime($enddate);
        $enddate= date("F d Y" , $enddate);


         $qualificationsplit = "";
        $qualification = $row['qualification'];  
        $spesplit = explode(',,,', $qualification);  
        for($i=0; $i<sizeof($spesplit); $i++){
        $qualificationsplit .= "<label class='infolabel3'> • ".$spesplit[$i]."</label><br>";

        }

        $specializationsplit = "";
        $specialization = $row['specialization'];  
        $spesplit2 = explode(', ', $specialization);  
        for($i=0; $i<sizeof($spesplit2); $i++){
        $specializationsplit .= "<label class='infolabel3'> • ".$spesplit2[$i]."</label><br>";

        }
        echo "
        <tr>
        <td class='table_td'>".$row['companyname']."</td>
        <td class='table_td'>".$row['jobtitle']."</td>
        <td class='table_td'>".$row['jobtype']."</td>
        <td align='center'>
 <input type='checkbox' id='a".$row['id']."'>
   <label for='a".$row['id']."' style='background-color:#07435f;color:#fff;font-size:1.7vmin;margin:0;padding: 1vmin 1.5vmin 1vmin 1.5vmin;border-radius:3px' class='classview'>
   <i class='fa fa-eye' style='font-size:1.7vmin;font;font-weight: bold;'>
   <label style=' font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;padding: 0px .3vmin 0px .3vmin;font-weight:600' for='a".$row['id']."'>View</label>
   </i></label>

                    <div class='container1'>

                          <div class='container01'>
                                                         
                                <div align='left' style='padding:10px;'>
                              
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
                              <label style='text-align: center;width:100%;font-size:3vmin;color:#0c506f'>JOB HIRING</label>
                              </td>
                            </tr>
                            <tr>
                              <td  colspan='2' style='border-top:solid #0c506f 2px;'>
                              </td>
                            </tr>
                             <tr>
                               <td class='infotd1'>
                             <label class='infolabel1'>WEBSITE LINK</label>
                              </td>
                              <td class='infotd2'>
                             <label class='infolabel2'>".$row['link']."</label>
                              </td>
                            </tr>
                            <tr>
                               <td class='infotd1'>
                             <label class='infolabel1'>JOB TITLE</label>
                              </td>
                              <td class='infotd2'>
                             <label class='infolabel2'>".$row['jobtitle']."</label>
                              </td>
                            </tr>

                            <tr>
                               <td class='infotd1'>
                             <label class='infolabel1'>COMPANY NAME</label>
                              </td>
                              <td class='infotd2'>
                             <label class='infolabel2'>".$row['companyname']."</label>
                              </td>
                            </tr>
                            <tr>
                               <td class='infotd1'>
                             <label class='infolabel1'>COMPANY EMAIL</label>
                              </td>
                              <td class='infotd2'>
                             <label class='infolabel2'>".$row['email']."</label>
                              </td>
                            </tr>
                            <tr>
                               <td class='infotd1'>
                             <label class='infolabel1'>COMPANY CONTACT #</label>
                              </td>
                              <td class='infotd2'>
                             <label class='infolabel2'>".$row['contact']."</label>
                              </td>
                            </tr>
                            <tr>
                               <td class='infotd1'>
                             <label class='infolabel1'>LOCATION</label>
                              </td>
                              <td class='infotd2'>
                             <label class='infolabel2'>".$row['location']."</label>
                              </td>
                            </tr>
                            <tr>
                               <td class='infotd1'>
                             <label class='infolabel1'>JOB TYPE</label>
                              </td>
                              <td class='infotd2'>
                             <label class='infolabel2'>".$row['jobtype']."</label>
                              </td>
                            </tr>                            <tr>
                               <td class='infotd1'>
                             <label class='infolabel1'>JOB DESCRIPTION</label>
                              </td>
                              <td class='infotd2'>
                             <label class='infolabel2'>".$row['description']."</label>
                              </td>
                            </tr>
                            <tr>
                               <td class='infotd1'>
                             <label class='infolabel1'>DURATION</label>
                              </td>
                              <td class='infotd2'>
                             <label class='infolabel2'>".$startdate." - ".$enddate."</label>
                              </td>
                            </tr>
                             <tr>
                             <td class='infotd1' style='vertical-align:top'>
                             <label class='infolabel1'>QUALIFICATION</label>
                             </td>
                             <td class='infotd2'>
                             ".$qualificationsplit."
                              </td>
                            </tr>
                            <tr>
                             <td class='infotd1' style='vertical-align:top'>
                             <label class='infolabel1'>SKILLS NEEDED</label>
                             </td>
                             <td class='infotd2'>
                             ".$specializationsplit."
                              </td>
                            </tr>
                            

                            </table>
                                  
                                  

                                  </div>
                          </div>
                    </div>
          <style>#a".$row['id'].":checked ~ .container1{display: block;visibility: visible;}</style>




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