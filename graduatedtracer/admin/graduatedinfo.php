 <?php 
 session_start();
 include 'dbhelper.php';


 if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
//USERNAME LOGIN
  $username = $_SESSION['username'];
  if ($username == "admin") {
    $course = 'Admin';

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
      $courseinfo = $row['course'];
      $college = $row['college'];
      $doublemajor;
      $collegesuser1 = $row['college'];
      $orno = $row['orno'];
           $ornodate = $row['ornodate'];
      if ($orno == "") {
        $orno1 = "N/A";
      }else{
        $orno1 = $row['orno'];
      }

      if ($ornodate == "") {
        $ornodate1 = "";
      }else{
       $ornodate1 = $row['ornodate'];
       $ornodate1 = strtotime($ornodate1);
       $ornodate1= date("M d Y" , $ornodate1);
       $ornodate1 = " ( " .$ornodate1. " ) ";
     }


     $spesplit = explode(', ', $collegesuser1);  
     for($iii=0; $iii<sizeof($spesplit); $iii++){

      if ($iii==1) {
        $courseinfo = $row['course'] . ", " . $row['course1'];
        $yeargrad = $row['yeargrad'] . ", " .  $row['yeargrad1'];

        $doublemajor = "display:none";

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

  .container1{
   position: fixed;
   width: 100%;
   top: 0;
   left: 0;
   right: 0;
   bottom: 0;
   background: rgba(86,86,86,.8);
   z-index: 10000;
   overflow: auto;
   display :none;
   overflow: auto;    
 }
 .container01{
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
.container01 .close-btn1{
  float: right;
  padding: 5px 10px 5px 10px;
  top: 15px;
  font-size: 20px;
  cursor: pointer;
  background:#0c506f;
  text-align: center;
  color: #fff;

}
.container01 .close-btn1:hover{
  color:rgba(255,255,255,0.9);
  /*transform: translate(0, -3px);*/
  background-color: red;

}
.resetpassword:hover{
  background: red !important;
  color: #fff !important;
}
@media only screen and (max-width: 600px) {
  .mobilepassword{
    width: 100%;
  }
}
.label3{
  color: red;
  font-size: 13px;
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
  .percentlabel{
    margin: 0px 0px 0px 7px;
    font-size: 18px;
    color: #07435f;
    font-weight: 600;
    font-size: 2.7vmin;

  }
  .failed{
    color: red;
    font-size: 13px;
  }
  .container-success2{
   position: fixed;
   width: 100%;
   top: 0;
   left: 0;
   right: 0;
   bottom: 0;
   background: rgba(0,0,0,.85);
   z-index: 10000;
 }
 .container-success2{
   position: fixed;
   width: 100%;
   top: 0;
   left: 0;
   right: 0;
   bottom: 0;
   background: rgba(0,0,0,.85);
   z-index: 10000;
 }

 .title_info2{
   width: auto;
   padding: 30px 50px 30px 50px;
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
</style>
<body>
  <div id="loading">
    <img id="loading-image" src="assets/img/loading.gif" alt="Loading..." />
  </div>
  <script type="text/javascript">
    setTimeout(function() {
      $('#undo-hidden').hide()
    }, 1600);
    setTimeout(function() {
      $('#success-hidden2').hide()
    }, 1600);
  </script>



  <header id="header" class="header fixed-top d-flex align-items-center">
    <script type="text/javascript">
      setTimeout(function() {
        document.getElementById('success-hidden').style.display = 'none';
      }, 1600);
    </script>
    <?php if(isset($_SESSION['douublemajor'])) {?> 
      <div id="success-hidden2" >
        <input type="checkbox" id="tablesuccess2">
        <div class="container-success2" id="successtransition">
          <div class="container-success02" align="center">


            <label class="title_info2">
              <img src="assets/img/success.gif" style="width: 20vmin;height: 20vmin;" />
              <br>
              <label style="font-size: 2em;margin-top: 20px;">
                <?php  
                echo "DOUBLE MAJOR SUCCESS!";

                ?>
              </label>
            </label><br>

          </div>
        </div>
        <?php echo" <style>#tablesuccess:checked ~ .container-success2{display: block;}</style>";?> 
      </div>

      <?php 
    }
    unset($_SESSION['douublemajor']);

    ?>
    <?php if(isset($_SESSION['ORupdated'])) {?> 
      <div id="success-hidden2" >
        <input type="checkbox" id="tablesuccess2">
        <div class="container-success2" id="successtransition">
          <div class="container-success02" align="center">


            <label class="title_info2">
              <img src="assets/img/success.gif" style="width: 20vmin;height: 20vmin;" />
              <br>
              <label style="font-size: 2em;margin-top: 20px;">
                <?php  
                echo "OR UPDATED!";

                ?>
              </label>
            </label><br>

          </div>
        </div>
        <?php echo" <style>#tablesuccess:checked ~ .container-success2{display: block;}</style>";?> 
      </div>

      <?php 
    }
    unset($_SESSION['ORupdated']);

    ?>

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

  <div class="pagetitle">
    <div class="row">
      <div class="col-12">
        <div class="col-xxl-5 col-md-5">
          <h1>Profile</h1>
          <nav>
            <ol class="breadcrumb" >
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Alumni</li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->
        <div class="col-xxl-7 col-md-7" align="right">
          <a href="graduatedlist.php">
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
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center" align="center">

            <img src="../../graduatedstudent/graduatedimage/<?php echo $graduatedimage;?>" alt="Profile" class="rounded-circle" style='width: 130px;height: 130px;'>
            <h2><?php echo $firstname . " " .$middlename . " " . $lastname; ?></h2>
            <h3>User Account</h3>
            <h2 style="background-color:transparent;width: 100%;margin-bottom: 10px;">
              <?php
              if ($facebook != "") {
                echo "<a href='".$facebook."' target='_blank'> <img src='assets/img/facebook.png' style='height: 30px;width: 30px;margin-right: 5px;'></a>";
              }
              if ($instagram != "") {
                echo "<a href='".$instagram."' target='_blank'> <img src='assets/img/instagram.png' style='height: 30px;width: 30px;margin-right: 5px;'></a>";
              }

              if ($linkedin != "") {
                echo "<a href='".$linkedin."' target='_blank'> <img src='assets/img/linkedin.png' style='height: 30px;width: 30px;margin-right: 5px;'></a>";
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
          <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" onclick="Overview()" style="font-size:15px">Background Information</button>
        </li>

        <li class="nav-item">
          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-doublemajor" onclick="DoubleMajor()" style="font-size:15px;

          <?php 
          echo $doublemajor;
          ?>


          " id="doublemajor">Double Major</button>
        </li>

        <li class="nav-item">
          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-orno" onclick="orno()" style="font-size:15px">OR Number</button>
        </li>
      </ul>
      <script type="text/javascript">
       function Overview() {
        document.getElementById("table1").style.display = "block";
        document.getElementById("table2").style.display = "none";
        document.getElementById("table3").style.display = "none";
      }
      function orno() {
        document.getElementById("table1").style.display = "none";
        document.getElementById("table2").style.display = "none";
        document.getElementById("table3").style.display = "block";
      }
      function DoubleMajor() {
        document.getElementById("table1").style.display = "none";
        document.getElementById("table2").style.display = "block";
        document.getElementById("table3").style.display = "none";
      }
    </script>
    <div class="tab-content pt-2" style="color:#000;display: block;" id="table1">

      <div class="tab-pane  show active profile-overview" id="profile-overview">

        <h5 class="card-title"><img src="assets/img/generalinformation.png" style="width: 20px;height: 20px;margin-right: 5px;">General Information</h5>
        <div class="row">
          <div class="col-lg-3 col-md-4 label1">OR Number</div>
          <div class="col-lg-9 col-md-8"><?php echo $orno1.$ornodate1 ?></div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-4 label1">Course</div>
          <div class="col-lg-9 col-md-8"><?php echo $courseinfo ?></div>
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
        <h5 class="card-title"  style="display:none;<?php if ($postgraduate != ""){echo "display: block";} ?>"><img src="assets/img/advancestudy.png" style="width: 20px;height: 20px;margin-right: 5px;">Advance Study</h5>
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




        <h5 class="card-title" style="display:none;<?php if ($firstjob != ""){echo "display: block";} ?>"><img src="assets/img/jobtype.png" style="width: 20px;height: 20px;margin-right: 5px;">Firstjob</h5>
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


        <h5 class="card-title" style="display:none;<?php if ($employed != ""){echo "display: block";} ?>"><img src="assets/img/employmentdata.png" style="width: 20px;height: 20px;margin-right: 5px;">Employment Data</h5>
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



    <script type="text/javascript">

      function printError(elemId, hintMsg) {
        document.getElementById(elemId).innerHTML = hintMsg;
      }

      function validateForm() {


        var course = document.contactForm.course.value;
        var yeargraduated = document.contactForm.yeargraduated.value;
        var review = document.contactForm.review.value;
        var  courseErr = yeargraduatedErr  =  true;


        if(course == "") {
          printError("courseErr", "Please select your Course");
          document.getElementById('courseErr').style.display = 'block';
        } else {
          printError("courseErr", "");
          courseErr = false;
        }

        if(yeargraduated == "") {
          printError("yeargraduatedErr", "Please select your Year Graduated");
          document.getElementById('yeargraduatedErr').style.display = 'block';
        } else {
          printError("yeargraduatedErr", "");
          yeargraduatedErr = false;
        }



        if(( courseErr || yeargraduatedErr) == true) {
         return false;
       } else {
         if (review == "1") {


         }
         if (review == "") {
          printError("courseInfo",course);
          printError("yeargraduatedInfo",yeargraduated);
          document.getElementById('success-hidden').style.display = 'block';

          return false;
        }


      }




    }



   //  function validateFormORno() {


   //    var orno = document.contactFormOR.orno.value;
   //    var ornodate = document.contactFormOR.ornodate.value;
   //    var  orno = ornodateErr  =  true;


   //    if(orno == "") {
   //      printError("ornoErr", "Please Enter OR Number");
   //      document.getElementById('ornoErr').style.display = 'block';
   //    } else {
   //      printError("ornoErr", "");
   //      ornoErr = false;
   //    }

   //    if(ornodate == "") {
   //      printError("ornodateErr", "Please select Date");
   //      document.getElementById('ornodateErr').style.display = 'block';
   //    } else {
   //      printError("ornodateErr", "");
   //      ornodateErr = false;
   //    }



   //    if(( ornoErr || ornodateErr) == true) {
   //     return false;
   //   } else {
   //   }




   // }

    function reviewsubmit(){
      if (document.getElementById('review1').checked) {

        document.getElementById('success-hidden').style.display = 'none';
        document.getElementById("Register").click();
        document.getElementById("Register").disabled=true;



      }
      if (document.getElementById('review0').checked) {
        document.getElementById('success-hidden').style.display = 'none';
      }
    }
  </script>

  <style type="text/css">
    .container-success1{
     position: fixed;
     width: 100%;
     top: 0;
     left: 0;
     right: 0;
     bottom: 0;
     background: rgba(86,86,86,.30);
     z-index: 10000;
     overflow: auto;
   }
   .container-success01{
    width: 60%;
    margin-left: 20%;
    margin-right: 20%;
    border-radius: 10px;
    color: rgb(1,82,73);
    margin-top : 100px;
    z-index: 10001;
    font-weight: 700;
    text-align: center;
    padding-bottom: 10px; 
    height: auto; 
    margin-bottom: 20px;
    text-align: left;
    background: #fff;
    padding: 25px;
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

  @media screen and (max-width: 1200px) {
    .container-success01{
      width: 80%;
      margin-left: 10%;
      margin-right: 10%;
    }
  }
  @media screen and (max-width: 992px) {
    .container-success01{
      width: 80%;
      margin-left: 10%;
      margin-right: 10%;
    }
  }
  @media screen and (max-width: 768px) {
    .container-success01{
      width: 80%;
      margin-left: 10%;
      margin-right: 10%;
    }
  }
  @media screen and (max-width: 576px) {
    .container-success01{
      width: 80%;
      margin-left: 10%;
      margin-right: 10%;
    }
  }
  @media screen and (max-width: 576px) {
    .container-success01{
      width: 80%;
      margin-left: 10%;
      margin-right: 10%;
    }
  }
  .register{
    background-color: #003C58;
    color: #fff;
    margin-top: 20px;
    border:none;
    padding: 7px 10px 7px 10px;
    margin-right: 20px;
    border-radius: 3px;
  }
  .register:hover{
   transform: translate(0, -3px);
 }
 .labelpreview{
  font-size: 1.5em;
  color: #101010;
  float: left;
  font-weight: 600;
  font-family: Roboto, "Helvetica Neue", HelveticaNeue, Helvetica, Arial, sans-serif;


}
.outputpreview{
  font-size: 1.5em;
  line-height: normal;
  width: 90%;
  padding: 1%;
  margin-right: 10%;
  box-sizing: border-box;
  color: #000    ;
  position: relative;
  border-radius: 7px;
  text-align: left;
  padding: 5px;
  margin-top: -15px;
  text-overflow: ellipsis;
  font-family: Roboto, "Helvetica Neue", HelveticaNeue, Helvetica, Arial, sans-serif;
  font-weight: 500;


}
.editsubmit{
  background-color: #07435f;
  color: #fff;
  font-size: 2vmin;
  padding:7px 10px 7px 10px;
  border-radius: 5px;
  margin-right: 10px; 
  font-family: Roboto, 'Helvetica Neue', HelveticaNeue, Helvetica, Arial, sans-serif;
  font-weight: 500;
}
.editsubmit:hover{
 transform: translate(0, -3px);
}
</style>

<form name="contactForm" method="POST" action="doublemajorserver.php" onsubmit="return validateForm()">
  <input type="hidden" name="idno" value="<?php echo $idno ?>">
  <input type="hidden" name="oldcourse"  value="<?php echo $courseinfo ?>">
  <input type="hidden" name="oldcollege"  value="<?php echo $college ?>">
  <input type="hidden" name="oldyeargraduated"  value="<?php echo $yeargrad ?>">
  <div id="success-hidden" style="display: none;">
    <input type="checkbox" id="tablesuccess"><label for="tablesuccess"  class=""></label>
    <div class="container-success1" id="successtransition">
      <div class="container-success01" style="background-color: #fff;;" >
        <!--              ---------------------START PRIMARY INFORMATION---------------------------- -->
        <p class='field whole' style="padding: 0px;margin: 0px;" align="left">
         <label style="color: #0c506f;font-size: 2em;font-family: Avantgarde, TeX Gyre Adventor, URW Gothic L, sans-serif;font-weight: 600;">Validation of Information for double major</label>
       </p> 
       <p style="float:left;width: 80%;">
        <label class='labelpreview'>Name</label>
        <label class="outputpreview"><?php echo $firstname . " " .$middlename . " " . $lastname; ?></label>
      </p>
      <p   style="float:left;width: 20%;">
        <label class='labelpreview'>Idno</label>
        <label  class="outputpreview"><?php echo $idno; ?></label>
      </p>

      <p style="float:left;width: 80%;">
        <label class='labelpreview'>Course</label>
        <label id="courseInfo" class="outputpreview">20181464</label>
      </p>
      <p   style="float:left;width: 20%;">
        <label class='labelpreview'>Year Graduated</label>
        <label id="yeargraduatedInfo" class="outputpreview">20181464</label>
      </p>


      <p class='field whole' style="text-align:right">
        <input type="radio" name="review" value=""  id="review0" onclick="javascript:reviewsubmit();" style="display:none">
        <label for="review0" class="editsubmit">Edit Info</label>
        <input type="radio" name="review" value="1" id="review1" onclick="javascript:reviewsubmit();" style="display:none">
        <label for="review1" class="editsubmit">Submit</label>
      </p>







    </div>
  </div>
  <style>#tablesuccess:checked ~ .container-success1{display: block;}</style>
  <script type="text/javascript">
   function myFunctionProfile() {
    var x = document.getElementById("success-hidden");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
</script>
</div> 









<div class="tab-content pt-2" style="color:#000;display: none;" id="table2">
  <div class="profile-overview">

    <h5 class="card-title"><img src="assets/img/doublemajor.png" style="width: 20px;height: 20px;margin-right: 5px;">Double Major</h5>
    <div class="row">
      <div class="col-lg-12 col-md-12 label3">Reminder!<br> 

      For alumni who had taken their double major degree or courses.</div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-4 label1 ">Full Name</div>
      <div class="col-lg-9 col-md-8"><?php echo $firstname . " " .$middlename . " " . $lastname; ?></div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-4 label1 ">Course/Degree</div>
      <div class="col-lg-9 col-md-8">   
        <select name="course" style="width: 100%;font-size: 16px;">
          <option disabled selected value="">Select</option>
          <?php 

          $sql = "select * from user where college != '' GROUP by course ASC";
          $result = $conn-> query($sql);

          while ($row=mysqli_fetch_array($result)){
            if ($row['course'] != $course) {
              echo "<option value='".$row['course']."'>".$row['course']."</option>";
            }


          }


          ?>

        </select>
        <label id="courseErr" class="failed" style="display:none"></label>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-3 col-md-4 label1 ">Year Graduated</div>
      <div class="col-lg-9 col-md-8">
        <select class="text-input" name="yeargraduated" style="font-size:16px;width: 100%;">
          <option disabled selected value="" id="yearselected">Select</option>
          <?php
          date_default_timezone_set('Asia/Manila');
          $time = date('g:i a');
          $date= date("Y") + 2;
          for ($i = $date; $i > 1980; $i--)  {
            $ii = $i - 1;
            echo "<option value='".$ii."'>".$ii."</option>";
          }



          ?>
        </select>
        <label id="yeargraduatedErr" class="failed" style="display:none"></label>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 " align="right">
       <input class='register' type='submit' value='Register' id="Register" name="send">
     </div>

   </div>



 </form>
</div>
</div>




<form name="contactFormOR" method="POST" action="orserver.php" onsubmit="return validateFormORno()">
  <input type="hidden" name="idno" value="<?php echo $idno ?>">
  <div class="tab-content pt-2" style="color:#000;display: none;" id="table3">
    <div class="profile-overview">

      <h5 class="card-title"><img src="assets/img/number.png" style="width: 18px;height: 18px;margin-right: 5px;">OR Number</h5>

      <div class="row">
        <div class="col-lg-3 col-md-4 label1 ">OR Number</div>
        <div class="col-lg-9 col-md-8">   
          <input type="text" name="orno" style="width:100%;font-size: 16px;padding: 3px 10px 3px 2px" class="inputlabel" value="<?php echo $orno ?>"   />
          <label id="ornoErr" class="failed" style="display:none"></label>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-3 col-md-4 label1 ">Date</div>
        <div class="col-lg-9 col-md-8">
          <input type="date" name="ornodate"  style="width: 100%;font-size: 16px;" class="labelinput"  value="<?php echo $ornodate ?>"  >
          <label id="ornodateErr" class="failed" style="display:none"></label>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12 col-md-12 " align="right">
         <input class='register' type='submit' value='Submit' id="orsubmit" name="orsubmit">
       </div>

     </div>



   </form>
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



