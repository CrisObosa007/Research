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

  <title>Job Closed</title>
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
  <img id="loading-image" src="../assets/img/loading.gif" alt="Loading..." />
</div>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

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
        <a class="nav-link collapsed" data-bs-target="#components-nav1" style="background-color: #297FA7;">
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
        <ul id="components-nav1" class="nav-content  " data-bs-parent="#sidebar-nav">
              <li>
            <a href="jobupload.php">
              <i class="bi bi-circle"></i><span>Job Upload</span>
            </a>
          </li>
          <li>
            <a href="pendingjob.php">
              <i class="bi bi-circle"></i><span  >Pending Job Approval (Guidance)</span>
            </a>
          </li>
          <li>
            <a href="jobhiring.php">
              <i class="bi bi-circle"></i ><span >Job Hiring</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span style="color:#ADADAD">Job Closed</span>
            </a>
          </li>
          <li>
            <a href="disapproved.php">
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
              <h1>Job Posting</h1>
              <nav >
                <ol class="breadcrumb" style="background-color:transparent;">
                  <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
                  <li class="breadcrumb-item active">Job Closed</li>
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
          <div class="table-responsive">
<table id="myTable" class="table table-striped" width="100%" style=""> 
        <thead>  
          <tr>  
               <th style="border-bottom:solid 1px;width: 25%;font-size: 1.7vmin;">Company Name</th>  
            <th style="border-bottom:solid 1px;width: 25%;font-size: 1.7vmin;">Job Title</th>  
            <th style="border-bottom:solid 1px;width: 15;font-size: 1.7vmin;">Job Type</th>  
                <th style="border-bottom:solid 1px;width: 15%;font-size: 1.7vmin;" >Views</th>  
            <th style="border-bottom:solid 1px;width: 20%;font-size: 1.7vmin;">Action</th>  
                </tr>  
        </thead>  
        <tbody>  
        <?php 
        $sql = "select * from jobpost where jobstatus = 'Closed' and collegeuploaded = 'admin'";
        $result = $conn-> query($sql);
        if ($result-> num_rows > 0 ){
        while ($row=mysqli_fetch_array($result)){
        $startdate = $row['startdate'];
        $startdate = strtotime($startdate);
        $startdate= date("M d Y" , $startdate);
        $enddate = $row['enddate'];
        $enddate = strtotime($enddate);
        $enddate= date("M d Y" , $enddate);

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
        <td class='table_td'>".$row['jobtype']."</td>";
             if ($row['views'] == "") {
                                        echo "<td class='table_td' align='left'>0</td>" ;
                                      }else{
                                        echo "<td class='table_td' align='left'>".$row['views']."</td> ";
                                      }
        echo "
        <td align='center'>
         <input type='checkbox' id='a".$row['id']."'>
            <label for='a".$row['id']."' style='background-color:#07435f;color:#fff;font-size:1.7vmin;margin:0;padding: 1vmin 1.5vmin 1vmin 1.5vmin;border-radius:3px' class='classview'>
   <i class='fa fa-eye' style='font-size:1.7vmin;font;font-weight: bold;'>
   <label style=' font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;padding: 0px .3vmin 0px .3vmin;font-weight:600' for='a".$row['id']."'>View</label>
   </i></label>
                      <div class='container1'>

                          <div class='container01'>
                                                         
                                <div align='left' style='padding:10px;'>
                                  <table class='popup_table' style='background-color:#000;  border-collapse: collapse'>
                            <tr>
                              <td colspan='2'>
                              <div class='closingtab'>
                                <label for='"."a".$row['id']."' class='close-btn1 fas fa-times' title='close'></label><br>
                              </div>
                               <label style='text-align: center;width:100%;font-size:3.5vmin;color:#0c506f;margin:0;padding:0;font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;'>".$row['companyname']."</label>
                              </td>
                             <tr>
                              <td>
                              <div class='col-container'  align='left'>

                              <div class='col p-1'  align='left' style=';box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;'>
                                 <div style='width:100%;padding:10px 0px 10px 0px'>
                                   <div  style='width:100%;' >
                                        <label style='width:100%'  class='infolabel1'><img src='../assets/img/jobtitle.png' style='height:3vmin;width:3vmin;margin-top:-5px;margin-right:5px'>".$row['jobtitle']."</label>             
                                   </div>
                                   <div  style='width:100%;' >
                                            <label style='width:100%'  class='infolabel2'><img src='../assets/img/address.png' style='height:2.5vmin;width:2.5vmin;margin-top:-5px;margin-right:5px'>".$row['location']."</label>      
                                   </div>
                                   <div style='width:100%;' >
                                        <label class='infolabel2'><img src='../assets/img/sched.png' style='height:2.5vmin;width:2.5vmin;margin-top:-5px;margin-right:5px'>".$startdate." - ".$enddate."</label>              
                                   </div>
                                        <div style='width:100%;' >
                                        <label class='infolabel2'><img src='../assets/img/pesos.png' style='height:2.5vmin;width:2.5vmin;margin-top:-5px;margin-right:5px'>".$row['minimumsalary']." - ".$row['maximumsalary']." Monthly</label>              
                                   </div>
                                 </div>
                              </div>

                              <div class=' col p-1'  align='left' style=';box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;'>
                                 <div style=';width:100%;padding:10px 0px 10px 0px'>
                                   <div style='width:100%;' > 
                                            <label style='width:100%'  class='infolabel1'><img src='../assets/img/jobtype.png' style='height:3vmin;width:3vmin;margin-top:-5px;margin-right:5px'>Job Type</label> 
                                        <br>
                                        <label class='infolabel3'>".$row['jobtype']."</label> 
                                    </div>
                                    <div style='width:100%;position:relative;display:inline-block;' > 
                                            <label style='width:100%'  class='infolabel1'><img src='../assets/img/jobskill.png' style='height:3vmin;width:3vmin;margin-top:-5px;margin-right:5px'>Job Skill</label> 
                                        <br>
                                        <label class='infolabel3'>".$row['specialization']."</label>   
                                   </div>
                                 </div>
                              </div>



                              </div>
                              <div class='col-xl-12  col-md-12 mt-4 p-1'  align='left' style='box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;'>
                                <div style='width:100%;padding:10px 0px 10px 0px'>
                                 <div style='width:100%;' >
                                        <label style='width:100%'  class='infolabel1'><img src='../assets/img/qualification.png' style='height:3vmin;width:3vmin;margin-top:-5px;margin-right:5px'>Qualification</label>            
                                 </div>
                                 <div class='p-2' style='width:100%;' >
                                      <label  class='infolabel2'>".$qualificationsplit."</label>              
                                 </div>
                                </div>
                              </div>
                              <div class='col-xl-12  col-md-12 mt-4 p-1'  align='left' style='box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;'>
                                <div style='width:100%;padding:10px 0px 10px 0px'>
                                 <div style='width:100%;' >
                                     <label style='width:100%'  class='infolabel1'><img src='../assets/img/description.png' style='height:3vmin;width:3vmin;margin-top:-5px;margin-right:5px'>Job Description</label>            
                                 </div>
                                 <div class='p-2' style='width:100%;' >
                                      <label  class='infolabel2'>".$row['description']."</label>              
                                 </div>
                                </div>
                              </div>
    
                               <div class='col-xl-12  col-md-12 mt-4 mb-4 p-1'  align='left' style='box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;'>
                               <div style='width:100%;padding:10px 0px 10px 0px'>
                                 <div  style=';width:100%;' > 
                                       <label style='width:100%'  class='infolabel1 mb-4'><img src='../assets/img/contactus.png' style='height:3vmin;width:3vmin;margin-top:-5px;margin-right:5px'>Contact Us</label>     
                                      <br>
                                      <label style='width:100%'  class='infolabel2'><img src='../assets/img/gmail.png' style='height:2.5vmin;width:2.5vmin;margin-top:-5px;margin-right:5px'>".$row['email']."</label> 
                                      <label style='width:100%'  class='infolabel2'><img src='../assets/img/phone.png' style='height:2.5vmin;width:2.5vmin;margin-top:-5px;margin-right:5px'>".$row['contact']."</label> 
                                      <label style='width:100%'  class='infolabel2'><img src='../assets/img/link.png' style='height:2.5vmin;width:2.5vmin;margin-top:-5px;margin-right:5px'><a href='".$row['link']."' target='_blank'>".$row['link']."</a></label> 
                                 </div>
                                </div>
                              </div>
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