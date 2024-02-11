 <?php 
session_start();
include '../dbhelper.php';


if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
   $username = $_SESSION['username'];
    if ($username == "admin") {
    $course = 'Admin';

    if (isset($_POST['departmentcourse'])) {
       $_SESSION['college'] = $_POST['college'];

    }

   if (isset($_SESSION['college'])) {
    $college = $_SESSION['college'];

    $sql = "SELECT * FROM user INNER JOIN college ON user.college = college.college";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $departmentcollege = $row['college'];
        $departmentusername  = $row['username'];
            $departmentemail  = $row['email'];
                $departmentcontact  = $row['contact'];

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

  <title><?php echo $college ?></title>
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


<script type="text/javascript">
              setTimeout(function() {
              $('#success-hidden').hide()
            }, 1600);
</script>



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
              <i class="bi bi-circle"></i><span>List of Colleges</span>
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

    <div class="pagetitle">
      <div class="row">
          <div class="col-12">
              <div class="col-xxl-5 col-md-5">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb" >
          <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
          <li class="breadcrumb-item active"><?php echo $college ?></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
        </div><!-- End Page Title -->
      <div class="col-xxl-7 col-md-7" align="right">
                <a href="college.php"><label class="graduatedrecord">Back</label></a>
      </div>


      </div>
    </div>
    </div>
    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center" align="center">

              <img src="../../department/assets/img/<?php echo $departmentimage;?>" alt="Profile" class="rounded-circle" style='width: 130px;height: 130px;'>
              <h2><?php echo $departmentcollege ?></h2>
              <h3>User Account</h3>
           
            </div>
             <br>
             </form>
          </div>

                   <?php if(isset($_SESSION['resetsuccess'])) {?>  
                    
                    <div class="card">
                    <div class=" profile-card pt-0 d-flex flex-column align-items-center" align="center">
                                <div id="resetsuccess" style="background-color:rgba(152, 254, 152,1);width: 100%;color: #000;">
                                <span style="text-align:center;">
                                    <label style="font-size: 15px;padding: 3px 0px 0px 0px;">Reset password success!</label>
                                </span>
                                <br>
                                </div>
                                <div style="width:100%;" align="left">
                                  <label style="font-size: 13px;padding: 10px 10px 0px 10px;">Your new password is :  </label><br>
                                  <label style="width:100%;text-align:center;font-size: 17px;padding-bottom: 10px"><?php echo $_SESSION['newpassword']; ?></label>
                                </div>
                     </div>
                    </div>
                    
                    <?php      
                     unset($_SESSION['resetsuccess']);
                     unset($_SESSION['newpassword']);
                     }
                   ?>

                    <?php if(isset($_SESSION['wrongpassword'])) {?>   
                    <div class="card">
                    <div class=" profile-card pt-0 d-flex flex-column align-items-center" align="center">
                                <div id="wrongpassword" style="background-color: red;width: 100%;color: #fff;">
                                <span style="text-align:center;">
                                    <label style="font-size: 15px;padding: 3px 0px 0px 0px;">Reset failed, Wrong Confirmation!</label>
                                </span>
                                <br>
                                </div>
                      </div>
                    </div>
                  
                     
                    <?php      
                     unset($_SESSION['wrongpassword']);
                     }
                   ?>

           
            <div class="card">
            <div class=" profile-card pt-0 d-flex flex-column align-items-center" align="center">
               <input type='checkbox' id='a'>
               <label for='a' class="resetpassword" style='background-color:#fff;padding: 5px 10px 2px 10px;color:red;width: 100%;font-size: 15px;font-weight: 700;'>RESET MY PASSWORD 
                <i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:fff;font-size: 20px;"></i>
               </label>

                     <div class='container1'>

                          <div class='container01'>
                          <div class='closingtab' style="margin-bottom: 10px;">
                                <label for='a' class='close-btn1 fas fa-times' title='close'></label><br>
                          </div>
                                
                                <div align='left' style='padding:10px;;'>
                                <!-- //design -->
                                   <label style='text-align: center;width:100%;font-size:15px;color:#0c506f;font-weight: 600;'>To reset the password of <lable style='font-weight: 700;font-size: 17px;'><?php echo $departmentusername ?></lable>,<br>Type <strong>CONFIRM</strong> to reset password</label>
                                  <br>
                                   <form method="POST" action="departmentresetpassword.php">
                                    <input type="hidden" name="departmentcollege" value="<?php echo $departmentcollege ?>">
                                   <!--  <div style="width:100%">
                                        <input type="password" name="adminpassword" id="adminpassword"style="width: 100%;padding-right: 30px;height: 30px;color: #000;font-size: 17px;">
                                        <i class="bi bi-eye-slash  eye-icon" id="toggleoldpassword" style="margin-left:-30px;font-size: 17px;color: #000;"></i>
                                    </div> -->
                                     <div style="width:100%" align="center">
                                        <input type="text" name="adminpassword" id="adminpassword"style="width: 50%;padding-right: 30px;height: 30px;color: #000;font-size: 1.7vmin;">
                      
                                    </div>
                                    <div style="width:100%;" align="center">
                                        <input type="submit" name="submitpassword" style="margin-top:15px;font-size: 15px;border: none;color: #fff;background: #0c506f;padding: 5px 10px 5px 10px;border-radius: 5px;">
                                    </div>
                             <!--         <script type="text/javascript">
                                    //first password
                                    const togglePassword = document.querySelector('#toggleoldpassword');
                                    const password = document.querySelector('#adminpassword'); 
                                    togglePassword.addEventListener('click', function (e) {
                                    // toggle the type attribute
                                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                                    password.setAttribute('type', type);
                                    // toggle the eye / eye slash icon
                                    this.classList.toggle('bi-eye');
                                    });
                            
                                   </script> -->
                                  </form>
                                  
                                  

                                  </div>
                          </div>
                    </div>
          <style>#a:checked ~ .container1{display: block;visibility: visible;}</style>


            </div>
          </div>





          <div class="card">

           
          </div>
        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" style="font-size:20px">Overview</button>
                </li>

              </ul>
              <div class="tab-content pt-2" style="color:#000">

                <div class="tab-pane  show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Department Details</h5>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label1">College</div>
                    <div class="col-lg-9 col-md-8"><?php echo $departmentcollege; ?></div>
                    <div class="col-lg-3 col-md-4 mt-3 label1">Username</div>
                    <div class="col-lg-9 col-md-8 mt-3"><?php echo $departmentusername; ?></div>
                    <div class="col-lg-3 col-md-4 mt-3 label1">Email</div>
                    <div class="col-lg-9 col-md-8 mt-3"><?php echo $departmentemail; ?></div>
                    <div class="col-lg-3 col-md-4 mt-3 label1">Contact</div>
                    <div class="col-lg-9 col-md-8 mt-3"><?php echo $departmentcontact; ?></div>
                  </div>
              
                </div>


              </div><!-- End Bordered Tabs -->
            </div>
          </div>
      </div>
    </section>

  </main><!-- End #main -->







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