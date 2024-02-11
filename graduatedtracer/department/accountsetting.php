 <?php 
session_start();
include 'dbhelper.php';


if (isset($_SESSION['id']) && isset($_SESSION['username'])) { 
  //USERNAME LOGIN
  $username = $_SESSION['username'];
  if ($username != "") {
  $username = $_SESSION['username'];
  $sql = "SELECT * FROM college WHERE username='$username'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $college = $row['college'];
  $contact = $row['contact'];
  $email = $row['email'];
  $userpassword = $row['userpassword'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Account Setting</title>
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
  <link href="assets/vendor/simple-datatables/style.css?v=<?php echo time();?>" rel="stylesheet">
   <link rel="icon" type="image/png" href="images/ucu.png"/>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">   
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="css/util.css?v=<?php echo time();?>">
    <link rel="stylesheet" type="text/css" href="css/main.css?v=<?php echo time();?>">
    <link rel="stylesheet" type="text/css" href="css/signup.css?v=<?php echo time();?>">
    <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time();?>">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="multiselect.css?v=<?php echo time();?>" rel="stylesheet"/>
    <script src="multiselect.min.js?v=<?php echo time();?>"></script>
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css?v=<?php echo time();?>" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="profile.css?v=<?php echo time();?>">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
<style type="text/css">
.motherlabel{
color: #fff;
font-size: 17px;
font-weight: bold;
padding: 7px;
margin-left: 7px;
}
.childlabel{
color: #fff;
font-size: 15px;
font-weight: bold;
padding: 10px;
margin-left: 15px;
}
.newphewlabel{
color: #fff;
font-size: 13px;
padding: 10px;
margin-left: 5px;
}
.editbutton{
  margin-top: 15px;
  background-color: #1C739A;
 color: #fff; 
 padding: 5px 10px 5px 10px;
 border-radius: 5px;
}
.editbutton:hover{
  transform: translate(0, -3px);
}
.editbutton2{
  background-color: #1C739A;
 color: #fff; 
 padding: 5px 10px 5px 10px;
 margin-top: 5px;
 border-radius: 5px;
}
.editbutton2:hover{
  transform: translate(0, -3px);
}
.editprofile{
  background-color: #07435f;
 color: #fff; 
 padding: 10px 20px 10px 20px;
 margin-top:25px;
 font-weight: 800;
 border-radius: 5px;
}
.editprofile:hover{
  transform: translate(0, -3px);
}
.failed{
  color: red;
  font-weight: 800;
  font-size: 1.7vmin;
}
/*sucess gif*/
.container-success1{
   position: fixed;
  width: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0,0,0,.85);
  z-index: 10000;
}
.container-success01{
  /*width: 30%;
  padding: 15px;
  left: 33%;
  margin-left: 5%;
  border-radius: 10px;
  color: rgb(1,82,73);
  background: #fff;
  position: absolute;
  top: 20%;
  /*box-shadow: 5px 5px 5px #000;*/
/*  box-shadow:#E5E5E5;
  z-index: 10001;
  font-weight: 700;
  text-align: center;
  padding-bottom: 40px; */ */
}
.title_info{
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
.container-success1 .close-btn{
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
<!-- HTML !-->
<button class="button-15" role="button">Button 15</button>

/* CSS */
.submitimage {
  background-image: linear-gradient(#42A1EC, #0070C9);
  border: 1px solid #0077CC;
  border-radius: 4px;
  box-sizing: border-box;
  color: #FFFFFF;
  cursor: pointer;
  direction: ltr;
  display: block;
  font-family: "SF Pro Text","SF Pro Icons","AOS Icons","Helvetica Neue",Helvetica,Arial,sans-serif;
  overflow: visible;
  padding: 4px 15px;
  text-align: center;
  vertical-align: baseline;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  white-space: nowrap;
}

.submitimage:disabled {
  cursor: default;
  opacity: .3;
}

.submitimage:hover {
  background-image: linear-gradient(#51A9EE, #147BCD);
  border-color: #1482D0;
  text-decoration: none;
}


</style>
<script type="text/javascript">
    
    function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

function validateForm() {



    var contact = document.contactForm.contact.value;
    var email = document.contactForm.email.value;


    var   contactErr = emailErr = true;
    
    

    if(contact == "") {
        printError("contactErr", "Please enter your Contact Number");
    } else {
        var regex = /^[0-9]\d{10}$/;
        if(regex.test(contact) === false) {
            printError("contactErr", "Please enter a valid 11 digit contact number");
        } else{
            printError("contactErr", "");
            contactErr = false;
        }
    }
    // Validate name
    if(email == "") {
        printError("emailErr", "Please enter your Email Address");
    } else {
        // Regular expression for basic email validation
        var regex = /^\S+@\S+\.\S+$/;
        if(regex.test(email) === false) {
            printError("emailErr", "Please enter a valid Email Address");
        } else{
            printError("emailErr", "");
            emailErr = false;
        }
    }

    
    
    
    

    if(( contactErr || emailErr ) == true) {
       return false;
    } else {
        
       
    }
};
    
</script>
<script type="text/javascript">
    function validateFormProfile() {
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
<script type="text/javascript">
  function validateFormPassword() {
    var currentpassword = document.passwordForm.currentpassword.value;
    var newpassword = document.passwordForm.newpassword.value;
    var confirmnewpassword = document.passwordForm.confirmnewpassword.value;

    var currentpasswordErr = newpasswordErr = confirmnewpasswordErr = true;
    
    // Validate Contact Number
    if(currentpassword == "") {
        printError("currentpasswordErr", "Please enter your Current Password");
    } 
    else{
  
       if(currentpassword != "<?php echo $userpassword; ?>") {
        printError("currentpasswordErr", "Please enter your Correct Current Password");
      }
      else {
        printError("currentpasswordErr", "");
        currentpasswordErr = false;}
    }
    



    if(newpassword != "" && confirmnewpassword != "") {
       
       var regex = /^.{8,}$/;
        if(regex.test(newpassword) === false) {
            printError("newpasswordErr", "Please enter atleast 8 Character");
            printError("confirmnewpasswordErr", "");
        } else{
           if (newpassword != confirmnewpassword) {
            printError("newpasswordErr", "");
            printError("confirmnewpasswordErr", "Password Doesn't match");
           }
           else{
            printError("newpasswordErr", "");
            newpasswordErr = false;
            printError("confirmnewpasswordErr", "");
            confirmnewpasswordErr = false;
           }
        }
    }
    else{
      // Validate Contact Number
    if(newpassword == "") {
        printError("newpasswordErr", "Please enter your New Password");
    } else {
        printError("newpasswordErr", "");
        newpasswordErr = false;
    }
     // Validate Contact Number
    if(confirmnewpassword == "") {
        printError("confirmnewpasswordErr", "Please enter your Confirm New Password");
    } else {
        printError("confirmnewpasswordErr", "");
        confirmnewpasswordErr = false;
    }
  }



    
     if((currentpasswordErr || newpasswordErr || confirmnewpasswordErr ) == true) {
       return false;
    } else {
        alert(dataPreview);
    }
    
};
</script>
  <header id="header" class="header fixed-top d-flex align-items-center">
<script type="text/javascript">
              setTimeout(function() {
              document.getElementById('success-hidden').style.display = 'none';
            }, 1600);
</script>
 <?php if(isset($_SESSION['success']) || isset($_SESSION['passwordsuccess']) || isset($_SESSION['profilesuccess'])) {?> 
    <div id="success-hidden" >
          <input type="checkbox" id="tablesuccess">
                     <div class="container-success1" id="successtransition">
                          <div class="container-success01" align="center">

                             
                                <label class="title_info">
                                <img src="assets/img/success.gif" style="width: 20vmin;height: 20vmin;" />
                                <br>
                                <label style="font-size: 2em;margin-top: 20px;">
                                <?php  if(isset($_SESSION['success'])) {
                                  echo " PROFILE UPDATED!";
                                }
                                 if(isset($_SESSION['passwordsuccess'])) {
                                  echo " PASSWORD UPDATED!";
                                } 
                                 if(isset($_SESSION['profilesuccess'])) {
                                  echo " LOGO UPDATED!";
                                } 
                                ?>  
                               </label>
                                </label><br>
                            
                          </div>
                    </div>
                    <?php echo" <style>#tablesuccess:checked ~ .container-success1{display: block;}</style>";?> 
    </div>
   
   <?php 
 }
unset($_SESSION['success']);
unset($_SESSION['passwordsuccess']);
unset($_SESSION['profilesuccess']);
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
        <a class="nav-link  " href="dashboard.php">
          <i class="fa fa-bar-chart"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li style="color: #B5B5B5;margin-left: 10px;padding: 7px;font-size: 13px;">
          <span>Record</span>
      </li>
      <li class="nav-item">

        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse">
          <i class="fa fa-graduation-cap"></i><span>Record</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="record/pendingrequest.php">
              <i class="bi bi-circle"></i><span>Pending Request (Department)</span>
            </a>
          </li>
          <li>
            <a href="record/graduated.php">
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

  </aside><!-- End Sidebar-->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1 style="margin-left: 10px;">Account Settings</h1>
      <nav>
      </nav>
    </div>



    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/img/<?php echo $image;?>" alt="Profile" class="rounded-circle" style='width: 130px;height: 130px;'>
              <h2><?php echo $username ?></h2>
              <h3>User Account</h3>
              <label><button onclick="myFunctionProfile()" style="border: none;" class="editprofile">Change Logo</button></label>
            </div>

            <form  action="accountsettingserver.php" method="POST" enctype="multipart/form-data" id="profileForm" name="profileForm" onsubmit="return validateFormProfile()" style="display:none">
                <div style="width: 100%;background-color: #fff;margin-top: 20px;padding-bottom: 20px;">
                  <div style="width: 60%;background-color: transparent;float: left;">
                    <input type="file" name="file" id="file" style="font-size: 13px;margin-left: 13px;color: #000;" accept="image/png, image/jpeg, image/jpg" >
                  </div>
                  <div style="width: 40%;background-color: transparent;float: right;position: relative;padding-right: 10px;" align="right">
                    <button type="submit" name="submitimage" class="submitimage" style="font-size:13px">UPLOAD</button>
                  </div>
                </div>
              
            <label id="fileErr" class="failed" style="margin-left:13px"></label>
            
                <script type="text/javascript">
               function myFunctionProfile() {
                var x = document.getElementById("profileForm");
                if (x.style.display === "none") {
                  x.style.display = "block";
                } else {
                  x.style.display = "none";
                }
              }
             </script>
             <br>
             </form>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Update Profile</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">
            
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
          <!--         <h5 class="card-title">About</h5>
                  <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p> -->

                  <h5 class="card-title">Profile Details</h5>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">User</div>
                    <div class="col-lg-9 col-md-8"><?php echo $college ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Username</div>
                    <div class="col-lg-9 col-md-8"><?php echo $username ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $email ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Contact</div>
                    <div class="col-lg-9 col-md-8"><?php echo $contact ?></div>
                  </div>
                 
                </div>

                <div class="tab-pane fade   profile-edit pt-3" id="profile-edit">
                  <h5 class="card-title">Profile Details</h5>
                  <!-- Profile Edit Form -->
                  <form action='accountsettingserver.php' class='form' method="POST" name="contactForm" onsubmit="return validateForm()">

                    <div class="row ">
                      <label class="col-md-4 col-lg-3 col-form-label">User</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="col-lg-9 col-md-8"><?php echo $username; ?></div>
                        <label></label>
                      </div>
                    </div>
                    <div class="row">
                      <label  class="col-md-4 col-lg-3 col-form-label">Contact</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="contact" type="text" class="form-control" id="contact" value="<?php echo $contact ?>">
                        <label id="contactErr" class="failed"  style="color:red"></label>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="text" class="form-control" id="email" value="<?php echo $email ?>">
                        <label id="emailErr" class="failed" style="color:red"></label>
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" name="submitprofile" style="margin-top: 20px;">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3  " id="profile-change-password">
                  <!-- Change Password Form -->
                  <form method="POST" action="accountsettingserver.php" name="passwordForm" onsubmit="return validateFormPassword()">

                      <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="password" name="currentpassword" id="currentpassword" style="width: 90%;padding-right: 30px;">
                        <i class="bi bi-eye-slash  eye-icon" id="toggleoldpassword" style="margin-left:-30px;"></i>
                        <br>
                        <label id="currentpasswordErr" class="failed"></label>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="password" name="newpassword" id="newpassword" style="width: 90%;padding-right: 30px;">
                        <i class="bi bi-eye-slash  eye-icon" id="togglenewpassword" style="margin-left:-30px;"></i>
                        <br>
                        <label id="newpasswordErr" class="failed"></label>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="password" name="confirmnewpassword" id="confirmnewpassword" style="width: 90%;padding-right: 30px;">
                        <i class="bi bi-eye-slash  eye-icon" id="toggleconfirmpassword" style="margin-left:-30px;"></i>
                        <br>
                        <label id="confirmnewpasswordErr" class="failed"></label>
                      </div>
                    </div> 

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" name="passwordsubmit">Change Password</button>
                    </div>
                     <script type="text/javascript">
                    //first password
                    const togglePassword = document.querySelector('#toggleoldpassword');
                    const password = document.querySelector('#currentpassword'); 
                    togglePassword.addEventListener('click', function (e) {
                    // toggle the type attribute
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);
                    // toggle the eye / eye slash icon
                    this.classList.toggle('bi-eye');
                    });
                    //second password
                    const togglePassword2 = document.querySelector('#togglenewpassword');
                    const password2 = document.querySelector('#newpassword'); 
                    togglePassword2.addEventListener('click', function (e) {
                    // toggle the type attribute
                    const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
                    password2.setAttribute('type', type);
                    // toggle the eye / eye slash icon
                    this.classList.toggle('bi-eye');
                    });
                     //third password
                    const togglePassword3 = document.querySelector('#toggleconfirmpassword');
                    const password3 = document.querySelector('#confirmnewpassword'); 
                    togglePassword3.addEventListener('click', function (e) {
                    // toggle the type attribute
                    const type = password3.getAttribute('type') === 'password' ? 'text' : 'password';
                    password3.setAttribute('type', type);
                    // toggle the eye / eye slash icon
                    this.classList.toggle('bi-eye');
                    });
                   </script>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

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