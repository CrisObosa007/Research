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

    if (isset($_POST['gradid'])) {
      $_SESSION['idno'] = $_POST['idno'];
    }

   if (isset($_SESSION['idno'])) {
    $idno = $_SESSION['idno'];

    $sql = "SELECT * FROM graduated INNER JOIN employment ON graduated.idno = employment.idno where graduated.idno ='$idno'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $yeargrad = $row['yeargrad'];
    $firstname = $row['firstname'];
    $middlename = $row['middlename'];
    $lastname = $row['lastname'];
    $gender = $row['gender'];
    $birthdate = $row['birthdate'];
    $civilstatus = $row['civilstatus'];
    $contact = $row['contact'];
    $email = $row['email'];
    $specialization = $row['specialization'];
    $street = $row['street'];
    $barangay = $row['barangay'];
    $city = $row['city'];
    $province = $row['province'];
    $region = $row['region'];
    $postgraduate = $row['postgraduate'];
    $postgraduatey1 = $row['postgraduatey1'];
    $postgraduatey2 = $row['postgraduatey2'];
    $employed = $row['employed'];
    $employedy1 = $row['employedy1'];
    $employedy2 = $row['employedy2'];
    $employedy3 = $row['employedy3'];
    $employedy4 = $row['employedy4'];
    $employedy5 = $row['employedy5'];
    $employedn1 = $row['employedn1'];
    $firstjob = $row['firstjob'];
    $firstjoby1 = $row['firstjoby1'];
    $firstjoby2 = $row['firstjoby2'];
    $firstjoby3 = $row['firstjoby3'];
    $firstjoby4 = $row['firstjoby4'];
    $firstjoby4y1 = $row['firstjoby4y1'];
          $firstjoby5 = $row['firstjoby5'];
  $firstjoby6 = $row['firstjoby6'];
           $facebook = $row['facebook'];
          $instagram = $row['instagram'];
                         $linkedin = $row['linkedin'];
    $password = $row['password'];
    $graduatedimage = $row['graduatedimage'];
    $course = $row['course'];
            $collegesuser1 = $row['college'];
        $spesplit = explode(', ', $collegesuser1);  
        for($iii=0; $iii<sizeof($spesplit); $iii++){

          if ($iii==1) {

            if ($spesplit[1] == $college) {
              $course = $row['course'] . ", " . $row['course1'];
              $yeargrad = $row['yeargrad'] . ", " .  $row['yeargrad1'];
            }
          }

        }
    }


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
  background: rgba(0,0,0,.85);
  z-index: 10000;
  display :none;    
}
.containerselectgrad01{
  width: 45%;
  padding: 15px;
  left: 20%;
  margin-left: 5%;
  border-radius: 10px;
  color: rgb(1,82,73);
  background: #121B5D;
  position: absolute;
  top: 20%;
  box-shadow: 5px 5px 5px #000;
  z-index: 10001;
  font-weight: 700;
  text-align: center;
  padding-bottom: 40px;  
}
.containerselectgrad1 .close-btn{
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
.containerselectgrad01 .close-btn:hover{
  color:rgba(255,255,255,0.9);
}
.infolabel1{
  font-size:  13px;
}
.infotd1{
  width: 30%;
}
.infolabel2{
  font-size: 15px;
}
.infotd2{
  width: 70%;
}
.label1{
  text-align: left;
  font-size: 15px;
  color: #006469;
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

  <title>Alumni Information</title>
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
.percentlabel{
  margin: 0px 0px 0px 7px;
  font-size: 18px;
  color: #07435f;
 font-weight: 600;
 font-size: 2.7vmin;

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
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
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
   <div class="pagetitle">
      <div class="row">
          <div class="col-12">
              <div class="col-xxl-5 col-md-5">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Graduated</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
        </div><!-- End Page Title -->
      <div class="col-xxl-7 col-md-7" align="right">
          <a href="grademployment.php">
    <label style='background-color:#07435f;color:#fff;font-size:1.7vmin;margin:0;padding: 1vmin 1.5vmin 1vmin 1.5vmin;border-radius:3px;margin-top: 20px;' class='graduatedrecord'>
   <i class='fa fa-arrow-left' style='font-size:13px;font;font-weight: bold;'>
   <label style=' font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;padding: 0px .3vmin 0px .3vmin;font-weight:600'>Back</label>
   </i></label>


                        </a>
      </div>


      </div>
    </div>
    </div>



    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="../../../graduatedstudent/graduatedimage/<?php echo $graduatedimage;?>" alt="Profile" class="rounded-circle" style='width: 130px;height: 130px;'>
              <h2 align="center" style="color:#07435f"><?php echo $firstname . " " .$middlename . " " . $lastname; ?></h2>
              <h3>User Account</h3>
                      <h2 style="background-color:transparent;width: 100%;margin-bottom: 10px;" align="center">
                <?php
                if ($facebook != "") {
                    echo "<a href='".$facebook."' target='_blank'> <img src='../assets/img/facebook.png' style='height: 30px;width: 30px;margin-right: 5px;'></a>";
                }
                if ($instagram != "") {
                    echo "<a href='".$instagram."' target='_blank'> <img src='../assets/img/instagram.png' style='height: 30px;width: 30px;margin-right: 5px;'></a>";
                }

                if ($linkedin != "") {
                    echo "<a href='".$linkedin."' target='_blank'> <img src='../assets/img/linkedin.png' style='height: 30px;width: 30px;margin-right: 5px;'></a>";
                }


                ?>
           

          </h2> 
            </div>


             <br>
        
          </div>
          <div class="card">
    <div class="card-body profile-card pt-1 d-flex flex-column " align="left">
        <div align="center"><h2 style="width:100%;color: #07435f;">Complete your profile</h2></div>

        <?php
        $countpercentage = 1;


        if ($postgraduate != "") {
            $countpercentage++;
        }
        if ($firstjob != "") {
          $countpercentage++;
      }
      if ($employed != "") {
          $countpercentage++;

      }


      ?>
      <?php if ($countpercentage == 1) { ?>
      <div style="width: 100%;" align="center">
        <div style=" width: 150px;height: 150px;border-radius: 150px;border: 10px solid #C0C0C0;border-top: 10px solid green;border-top-bottom: 10px solid white;-webkit-transform:rotate(-45deg);margin-top: 10px;">
            <label style="transform:rotate(45deg);padding: 40px 20px 40px 25px;color: green;font-size: 30px;">25%</label>
        </div>
     </div>
 <?php }?>
      <?php if ($countpercentage == 2) { ?>
     <div style="width: 100%;" align="center">
        <div style=" width: 150px;height: 150px;border-radius: 150px;border: 10px solid green;border-right: 10px solid #C0C0C0;border-bottom: 10px solid #C0C0C0;-webkit-transform:rotate(-45deg);margin-top: 10px;">
            <label style="transform:rotate(45deg);padding: 40px 20px 40px 25px;color: green;font-size: 30px;">50%</label>
        </div>
    </div>
    <?php }?>
     <?php if ($countpercentage == 3) { ?>
    <div style="width: 100%;" align="center">
        <div style=" width: 150px;height: 150px;border-radius: 150px;border: 10px solid green;border-top-right: 10px solid white;border-bottom: 10px solid #C0C0C0;-webkit-transform:rotate(-45deg);margin-top: 10px;">
            <label style="transform:rotate(45deg);padding: 40px 20px 40px 25px;color: green;font-size: 30px;">75%</label>
        </div>
    </div>
    <?php }?>
     <?php if ($countpercentage == 4) { ?>
    <div style="width: 100%;" align="center">
       <div style=" width: 150px;height: 150px;border-radius: 150px;border: 10px solid green;border-right: 10px solid green;border-bottom: 10px solid green;-webkit-transform:rotate(-45deg);margin-top: 10px;">
        <label style="transform:rotate(45deg);padding: 35px 20px 40px 25px;color: green;font-size: 30px;">100%</label>
    </div>
</div>
<?php }?>

<br>

<?php
$advancestudystatus;
if ($postgraduate == "") {
 $advancestudystatus = " <i class='fa fa-question-circle' style='padding: 3px ;border-radius: 10px;font-size:21px;margin-left:-2px'></i>";
}else{
 $advancestudystatus = " <i class='fa fa-check' style='background-color: green;color: #fff;padding: 3px;border-radius: 10px;font-size:13px;'></i>";
}
$firstjobstatus;
if ($firstjob == "") {
 $firstjobstatus = " <i class='fa fa-question-circle' style='padding: 3px ;border-radius: 10px;font-size:21px;margin-left:-2px'></i>";
}else{
 $firstjobstatus = " <i class='fa fa-check' style='background-color: green;color: #fff;padding: 3px;border-radius: 10px;font-size:13px;'></i>";
}
$employmentdatastatus;
if ($employed == "") {
 $employmentdatastatus = " <i class='fa fa-question-circle' style='padding: 3px ;border-radius: 10px;font-size:21px;margin-left:-2px'></i>";
}else{
 $employmentdatastatus = " <i class='fa fa-check' style='background-color: green;color: #fff;padding: 3px;border-radius: 10px;font-size:13px;'></i>";
}

?>
<div>
    <i class="fa fa-check" style="background-color: green;color: #fff;padding: 3px;border-radius: 10px;font-size:13px;"></i><label class="percentlabel">General Information</label>
</div>
<div>
  <?php echo $advancestudystatus ?><label class="percentlabel">Advance Study</label>
</div>
<div>
    <?php echo $firstjobstatus ?><label class="percentlabel">First Job</label>
</div>
<div>
   <?php echo $employmentdatastatus ?><label class="percentlabel">Employment Data</label>
</div>


</div>
</div>
  </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" style="font-size:15px">Background Information</button>
                </li>

              </ul>
              <div class="tab-content pt-2" style="color:#000">

                <div class="tab-pane  show active profile-overview" id="profile-overview">

                  <h5 class="card-title"><img src="../assets/img/generalinformation.png" style="width: 20px;height: 20px;margin-right: 5px;">General Information</h5>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label1">Course</div>
                    <div class="col-lg-9 col-md-8"><?php echo $course ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label1">Year Graduated</div>
                    <div class="col-lg-9 col-md-8"><?php echo $yeargrad ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label1">ID Number</div>
                    <div class="col-lg-9 col-md-8"><?php echo $idno ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label1 ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $firstname . " " .$middlename . " " . $lastname; ?></div>
                  </div>
                  
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label1">Gender</div>
                    <div class="col-lg-9 col-md-8"><?php echo $gender ?></div>
                  </div>
                 <div class="row">
                    <div class="col-lg-3 col-md-4 label1">Birthday</div>
                    <div class="col-lg-9 col-md-8"><?php echo $birthdate ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label1">Civil Status</div>
                    <div class="col-lg-9 col-md-8"><?php echo $civilstatus ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label1">Contact</div>
                    <div class="col-lg-9 col-md-8"><?php echo $contact ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label1">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $email ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label1">Skills</div>
                    <div class="col-lg-9 col-md-8"><?php echo $specialization ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label1">Address</div>
                    <div class="col-lg-9 col-md-8"><?php echo $street . " " . $barangay . " " . $city . " ".$province . " (" .$region ; ?> )</div>
                  </div>
  
     <h5 class="card-title"  style="display:none;<?php if ($postgraduate != ""){echo "display: block";} ?>"><img src="../assets/img/advancestudy.png" style="width: 20px;height: 20px;margin-right: 5px;">Advance Study</h5>
          <div class="row" style="display:none;<?php if ($postgraduate != ""){echo "display: block";} ?>">
              <div class="col-lg-12 col-md-12 label1">Enrolled in Graduate or Post Graduate Studies?</div>
              <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $postgraduate ?></div>
          </div>

          <div style="display:none;<?php if ($postgraduate == "Yes"){echo "display: block";} ?>">
              <div class="row" >
                  <div class="col-lg-12 col-md-12 label1">Current Status in graduate / post Graduate Studies?</div>
                  <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $postgraduatey1 ?></div>
              </div>
              <div class="row">
                  <div class="col-lg-12 col-md-12 label1">What made you pursue advance studies?</div>
                  <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $postgraduatey2 ?></div>
              </div>
          </div>




          <h5 class="card-title" style="display:none;<?php if ($firstjob != ""){echo "display: block";} ?>"><img src="../assets/img/jobtype.png" style="width: 20px;height: 20px;margin-right: 5px;">First job</h5>
          <div class="row" style="display:none;<?php if ($firstjob != ""){echo "display: block";} ?>">
              <div class="col-lg-12 col-md-12 label1">Do you have your first job after college?</div>
              <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $firstjob ?></div>
          </div>

          <div  style="display:none;<?php if ($firstjob == "Yes"){echo "display: block";} ?>">
              <div class="row">
                  <div class="col-lg-12 col-md-12 label1">How did you find your first job?</div>
                  <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $firstjoby1 ?></div>
              </div>
              <div class="row">
                  <div class="col-lg-12 col-md-12 label1">Reasons for accepting the first job?</div>
                  <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $firstjoby2 ?></div>
              </div>
              <div class="row">
                  <div class="col-lg-12 col-md-12 label1">Level Position in your first job?</div>
                  <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $firstjoby3 ?></div>
              </div>
              <div class="row">
                  <div class="col-lg-12 col-md-12 label1">Was the curriculum you had in college relevant to your first job?</div>
                  <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $firstjoby4 ?></div>
              </div>
              <div class="row" style="display:none;<?php if ($firstjoby4 == "Yes"){echo "display: block";} ?>">
                  <div class="col-lg-12 col-md-12 label1">If yes, what competencies learned in college did you find very useful  in first job?</div>
                  <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $firstjoby4y1 ?></div>
              </div>
              <div class="row" >
                  <div class="col-lg-12 col-md-12 label1">What is your initial gross monthly earning in your first job after college?</div>
                  <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $firstjoby5 ?></div>
              </div>
              <div class="row">
                  <div class="col-lg-12 col-md-12 label1">How long did it take you to land your first job?</div>
                  <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $firstjoby6 ?></div>
              </div>
          </div>


          <h5 class="card-title" style="display:none;<?php if ($employed != ""){echo "display: block";} ?>"><img src="../assets/img/employmentdata.png" style="width: 20px;height: 20px;margin-right: 5px;">Employment Data</h5>
          <div class="row" style="display:none;<?php if ($employed != ""){echo "display: block";} ?>">
              <div class="col-lg-12 col-md-12 label1">Are you presently Employed?</div>
              <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $employed ?></div>
          </div>
          <div style="display:none;<?php if ($employed == "Yes"){echo "display: block";} ?>">
              <div class="row" >
                  <div class="col-lg-12 col-md-12 label1">What is your present employment status?</div>
                  <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $employedy1 ?></div>
              </div>
              <div class="row">
                  <div class="col-lg-12 col-md-12 label1">Place of work?</div>
                  <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $employedy2 ?></div>
              </div>
              <div class="row">
                  <div class="col-lg-12 col-md-12 label1">Present Occupation</div>
                  <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $employedy3 ?></div>
              </div>
              <div class="row">
                  <div class="col-lg-12 col-md-12 label1">What is the major line of business of the company you are employed in?</div>
                  <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $employedy4 ?></div>
              </div>
              <div class="row">
                  <div class="col-lg-12 col-md-12 label1">Was the curriculum you had in college relevant to your present job?</div>
                  <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $employedy5 ?></div>
              </div>
          </div>

          <div class="row" style="display:none;<?php if ($employed == "No"){echo "display: block";} ?>">
              <div class="col-lg-12 col-md-12 label1">Main reason why you are not yet employed?</div>
              <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $employedn1 ?></div>
          </div>




                  




                </div>


              </div><!-- End Bordered Tabs -->
      
      </div>
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