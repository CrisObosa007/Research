<?php 
session_start();
include 'dbhelper.php';


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

  if (isset($_POST['jobhiring'])) {
    $_SESSION['jobid'] = $_POST['jobid'];
    $id = $_POST['jobid'];
$newviews = "";
  $sql = "SELECT * FROM jobpost where id = '$id'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $views = $row['views'];

  if ($views == "") {
      mysqli_query($conn,"UPDATE jobpost set views = '1'  where id = '$id'");
  }else{
   $newviews = $views + 1;
   mysqli_query($conn,"UPDATE jobpost set views = '$newviews'  where id ='$id'");
  }


  }
  if (isset($_SESSION['jobid'])) {
  $jobid = $_SESSION['jobid'];



   $sql = "SELECT * from jobpost where id = '$jobid'";
   $result = $conn-> query($sql);
   if ($result-> num_rows > 0 ){
   while ($row=mysqli_fetch_array($result)){
    $jobtitle = $row['jobtitle'];

    }
 }





  }
    else{
     header("Location: jobhiring.php");
  }










?>
<!DOCTYPE html>
<html lang="en">

<head>
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

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
  <meta content="width=device-width, initial-scale=1.0" name="viewport">  <title><?php echo $jobtitle ?></title>
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
    <link href="job.css?v=<?php echo time();?>" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/paginationcss.css?v=<?php echo time();?>">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->


</head>
<style type="text/css">

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
.jobtitle{
  padding: 0px 20px 0px 20px;
  font-size: 2.5vmin;
  color: #000;
  font-family: Roboto, "Helvetica Neue", HelveticaNeue, Helvetica, Arial, sans-serif;
  font-weight: 600;
}
.textlabel{
  margin: 0;
  padding: 0;
  padding: 0px 20px 0px 20px;
  font-size: 2.3vmin;
  color: #202020;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;font-weight: 500;
  margin-top: 5px;
}
.textlabel2{
  margin: 0;
  padding: 0;
  padding: 0px 20px 0px 30px;
  font-size: 2.3vmin;
  color: #202020;
  text-align: justify;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;font-weight: 500;
}
.jobtype{

  margin-left: 15px;
  padding: 5px 5px 5px 5px;
  border-radius: 5px;
  font-size: 2.3vmin;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;font-weight: 500;
    color: #202020;
}
.titlelabel2{
  font-size: 2.5vmin;
  padding: 0px 20px 0px 20px;
  color: #202020;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;font-weight: 600;
  margin-top: 10px;
}
.description{
  padding: 0px 20px 0px 30px;
  font-size: 2vmin;
  color: #000;
  text-align: justify;
  font-family: Roboto, "Helvetica Neue", HelveticaNeue, Helvetica, Arial, sans-serif;
  font-weight: 500;
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
</style>
<body>
<div id="loading">
      <img id="loading-image" src="../assets/img/loading.gif" alt="Loading..." />

</div>



  <header id="header" class="header fixed-top d-flex align-items-center">


    <div class="d-flex align-items-center justify-content-between">
      <a href="jobpost.php" class="logo d-flex align-items-center">
        <img src="assets/img/tracerlogo.png" alt="">
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
            <img src="../graduatedimage/<?php echo $graduatedimage;?>" alt="Profile" class="rounded-circle" style='width: 40px;height: 40px;'>
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
              <a class="dropdown-item d-flex align-items-center" href="profile.php">
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
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
  <aside id="sidebar" class="sidebar" style="background-color: #07435f;">

    <ul class="sidebar-nav" id="sidebar-nav" style="margin-top: 50px;">

      <li style="color: #B5B5B5;margin-left: 10px;padding: 7px;font-size: 13px;">
        <span>Job Post</span>
      </li>

      <li class="nav-item ">
        <a class="nav-link  " href="jobpost.php" style="background-color: #297FA7;">
          <i class="fa fa-bullhorn"></i>
          <span>Job Post</span>
        </a>
      </li>
      <li style="color: #B5B5B5;margin-left: 10px;padding: 7px;font-size: 13px;">
        <span>News</span>
      </li>

      <li class="nav-item ">
        <a class="nav-link  " href="news.php">
          <i class="fa fa-newspaper-o"></i>
          <span>News</span>
        </a>
      </li>    
      <li style="color: #B5B5B5;margin-left: 10px;padding: 7px;font-size: 13px;">
        <span>Events</span>
      </li>

      <li class="nav-item ">
        <a class="nav-link  " href="events.php">
          <i class="fa fa-calendar"></i>
          <span>Events</span>
        </a>
      </li>    


    </ul>

  </aside><!-- End Sidebar-->
  <main id="main" class="main">

    <div class="pagetitle">
      <div class="row">
          <div class="col-12">
      <div class="col-xxl-5 col-md-5">
      <h1>Job Post</h1>
      <nav>
        <ol class="breadcrumb" style="background-color: transparent;">
          <li class="breadcrumb-item"><a href="jobpost.php">Home</a></li>
          <li class="breadcrumb-item active">Job Post</li>
          <li class="breadcrumb-item active">Job Information</li>
        </ol>
      </nav>
        </div><!-- End Page Title -->
      <div class="col-xxl-7 col-md-7" align="right">
              <a href="jobpost.php">
          <label style='background-color:#07435f;color:#fff;font-size:1.7vmin;margin:0;padding: 1vmin 1.5vmin 1vmin 1.5vmin;border-radius:3px;margin-top: 20px;' class='backbutton'>
   <i class='fa fa-arrow-left' style='font-size:13px;font;font-weight: bold;'>
   <label style=' font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;padding: 0px .3vmin 0px .3vmin;font-weight:600'>Back</label>
   </i></label>

                </a>
      </div>


      </div>
    </div>
    </div>

    <section class="section dashboard">



        <!-- Left side columns -->
        <div class="col-lg-12" style="padding: 0px;margin: 0px;">
          <div class="row" >


        <div class="col-xxl-2 ">
        </div>




            <div class="col-xxl-8" >
              <div class="card info-card sales-card" style='background-color:transparent;box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;padding: 10px;'>
                   <?php 
                  $sql = "SELECT * from jobpost where id = '$jobid'";
                  $result = $conn-> query($sql);
                  if ($result-> num_rows > 0 ){
                  while ($row=mysqli_fetch_array($result)){
                  $qualificationsplit = "";
                  $qualification = $row['qualification'];  
                  $spesplit = explode(',,,', $qualification);  
                  for($i=0; $i<sizeof($spesplit); $i++){
                  $qualificationsplit .= "<label style='width:100%' class='textlabel2'> • ".$spesplit[$i]."</label><br>";

                  }
                    $startdate = $row['startdate'];
                    $startdate = strtotime($startdate);
                    $startdate= date("F d Y" , $startdate);
                    $enddate = $row['enddate'];
                    $enddate = strtotime($enddate);
                    $enddate= date("F d Y" , $enddate);
                    echo"

                            <table class='popup_table' style='border-collapse: collapse'>
                            <tr>
                              <td colspan='2'>
                 
                               <label style='text-align: center;width:100%;font-size:3.5vmin;color:#0c506f;margin:0;padding:0;font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;margin:10px 0px 10px 0px'>".$row['companyname']."</label>
                              </td>
                             <tr>
                              <td>
                              <div class='col-container'  align='left'>

                              <div class='col p-1'  align='left' style=';box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;'>
                                 <div style='width:100%;padding:10px 0px 10px 0px'>
                                   <div  style='width:100%;' >
                                        <label style='width:100%'  class='infolabel1'><img src='assets/img/jobtitle.png' style='height:3vmin;width:3vmin;margin-top:-5px;margin-right:5px'>".$row['jobtitle']."</label>             
                                   </div>
                                   <div  style='width:100%;' >
                                            <label style='width:100%'  class='infolabel2'><img src='assets/img/address.png' style='height:2.5vmin;width:2.5vmin;margin-top:-5px;margin-right:5px'>".$row['location']."</label>      
                                   </div>
                                   <div style='width:100%;' >
                                        <label class='infolabel2'><img src='assets/img/sched.png' style='height:2.5vmin;width:2.5vmin;margin-top:-5px;margin-right:5px'>".$startdate." - ".$enddate."</label>              
                                   </div>
                                             <div style='width:100%;' >
                                        <label class='infolabel2'><img src='assets/img/pesos.png' style='height:2.5vmin;width:2.5vmin;margin-top:-5px;margin-right:5px'>".$row['minimumsalary']." - ".$row['maximumsalary']." Monthly</label>              
                                   </div>
                                 </div>
                              </div>

                              <div class=' col p-1'  align='left' style=';box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;'>
                                 <div style=';width:100%;padding:10px 0px 10px 0px'>
                                   <div style='width:100%;' > 
                                            <label style='width:100%'  class='infolabel1'><img src='assets/img/jobtype.png' style='height:3vmin;width:3vmin;margin-top:-5px;margin-right:5px'>Job Type</label> 
                                        <br>
                                        <label class='infolabel3'>".$row['jobtype']."</label> 
                                    </div>
                                    <div style='width:100%;position:relative;display:inline-block;' > 
                                            <label style='width:100%'  class='infolabel1'><img src='assets/img/jobskill.png' style='height:3vmin;width:3vmin;margin-top:-5px;margin-right:5px'>Job Skill</label> 
                                        <br>
                                        <label class='infolabel3'>".$row['specialization']."</label>   
                                   </div>
                                 </div>
                              </div>



                              </div>
                              <div class='col-xl-12  col-md-12 mt-4 p-1'  align='left' style='box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;'>
                                <div style='width:100%;padding:10px 0px 10px 0px'>
                                 <div style='width:100%;' >
                                        <label style='width:100%'  class='infolabel1'><img src='assets/img/qualification.png' style='height:3vmin;width:3vmin;margin-top:-5px;margin-right:5px'>Qualification</label>            
                                 </div>
                                 <div class='p-2' style='width:100%;' >
                                      <label  class='infolabel2'>".$qualificationsplit."</label>              
                                 </div>
                                </div>
                              </div>
                              <div class='col-xl-12  col-md-12 mt-4 p-1'  align='left' style='box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;'>
                                <div style='width:100%;padding:10px 0px 10px 0px'>
                                 <div style='width:100%;' >
                                     <label style='width:100%'  class='infolabel1'><img src='assets/img/description.png' style='height:3vmin;width:3vmin;margin-top:-5px;margin-right:5px'>Job Description</label>            
                                 </div>
                                 <div class='p-2' style='width:100%;' >
                                      <label  class='infolabel2'>".$row['description']."</label>              
                                 </div>
                                </div>
                              </div>
    
                               <div class='col-xl-12  col-md-12 mt-4 mb-4 p-1'  align='left' style='box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;'>
                               <div style='width:100%;padding:10px 0px 10px 0px'>
                                 <div  style=';width:100%;' > 
                                       <label style='width:100%'  class='infolabel1 mb-4'><img src='assets/img/contactus.png' style='height:3vmin;width:3vmin;margin-top:-5px;margin-right:5px'>Contact Us</label>     
                                      <br>
                                      <label style='width:100%'  class='infolabel2'><img src='assets/img/gmail.png' style='height:2.5vmin;width:2.5vmin;margin-top:-5px;margin-right:5px'>".$row['email']."</label> 
                                      <label style='width:100%'  class='infolabel2'><img src='assets/img/phone.png' style='height:2.5vmin;width:2.5vmin;margin-top:-5px;margin-right:5px'>".$row['contact']."</label>  ";

                                      if ($row['link'] == "N/A") {
                                           echo "<label style='width:100%'  class='infolabel2'><img src='assets/img/link.png' style='height:2.5vmin;width:2.5vmin;margin-top:-5px;margin-right:5px'>".$row['link']."</label> ";
                                      }else{
                                           echo "<label style='width:100%'  class='infolabel2'><img src='assets/img/link.png' style='height:2.5vmin;width:2.5vmin;margin-top:-5px;margin-right:5px'><a href='".$row['link']."' target='_blank'>".$row['link']."</a></label> ";
                                      }
                                   
                                   


                                   echo   "
                                 </div>
                                </div>
                              </div>
                              </td>
                            </tr>
                            

                            </table>
                                  
                                  

  
  

                            ";





                          }
                        }

                    ?>
              </div>
          
            </div>




        <div class="col-xxl-2 ">
        </div>





          </div>

      </div>
   




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
     header("Location: ../login/index.php");
     exit();
 }
  


?>