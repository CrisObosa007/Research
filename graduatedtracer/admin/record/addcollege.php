<?php 
session_start();
include '../dbhelper.php';


if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
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
    .labelguild{
      font-size: 1.8vmin;
    }
    .labelinput{
      height: 35px;
      color: #000;
      padding-left: 10px;
      font-size: 1.8vmin;
      margin-top: 7px;
    }
    .failed{
      font-size: 1.7vmin;
      color: red;
    }
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
/*     width: 60%;
     margin-left: 20%;
     margin-right: 20%;
     border-radius: 10px;
     color: rgb(1,82,73);
     margin-top : 100px;
     box-shadow: 5px 5px 5px 5px#696969;
     z-index: 10001;
     font-weight: 700;
     text-align: center;
     padding-bottom: 40px; 
     height: auto; 
     margin-bottom: 20px;
     text-align: left;
     background: #fff;*/
   }
   @media only screen and (max-width: 600px) {
    .container-success01{
      width: 80%;
      margin-left: 10%;
      margin-right: 10%;
    }
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
  .clonehide{
    display: none;
  }
  .clonehide2{
    display: none;
  }
  .inputtextarea{
    width: 100%;
    height: 100px;
    padding: 10px;
    font-size: 1.7vmin;
  }
  .labelpreview01{
   font-size: 1.9vmin;
   float: left;
   color: #000;
   text-align: left;
   padding:  5px 10px 5px 10px;
   font-weight: 600;
   margin-left: 20px;
   font-family: Roboto, "Helvetica Neue", HelveticaNeue, Helvetica, Arial, sans-serif;
 }
 .outputpreview01{
   font-size: 2.2vmin;
   float: left;
   color: #000 ;
   text-align: left;
   width: 90%;
   padding:  5px 10px 5px 10px;
   font-family: Roboto, "Helvetica Neue", HelveticaNeue, Helvetica, Arial, sans-serif;
   font-weight: 500;

 }
 .container-undo1{
   position: fixed;
   width: 100%;
   top: 0;
   left: 0;
   right: 0;
   bottom: 0;
   background: rgba(86,86,86,.30);
   z-index: 10000;
 }
 .container-undo01{
/*  width: auto;
  padding: 15px;
  left: 32%;
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
  height: auto; */

}
.container-undo01 .close-btn{
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
.container-undo01 .close-btn:hover{
  color:rgba(255,255,255,0.9);
}
.editsubmit:hover{
  transform: translate(0, -3px);
}
.news{
  margin-right: 50px;
  margin-bottom: 20px;
  font-size: 15px;
  background-color: #0c506f;
  color: #fff;
  padding: 5px 10px 5px 10px;
}
.news:hover{
  transform: translate(0, -3px);
}
.addnews{
  margin-top: 15px;
  font-size: 15px;
  background-color: #0c506f;
  color: #fff;
  padding: 5px 10px 5px 10px;
}
.addnews:hover{
  transform: translate(0, -3px);
}
.failed{
  color: red;
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
.imageupload{
  background-color:#707070 ;
  padding: 7px 13px 7px 13px;
  color: #fff;box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
  border-radius: 3px; 
  font-family: Roboto, "Helvetica Neue", HelveticaNeue, Helvetica, Arial, sans-serif;
  font-size: 1.7vmin;
  font-weight: 500;
  margin-left: 13px;
}
.imageupload:hover{
  background: #888888;
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
  text-align: left;
  background-color: #fff;
  margin-top: 20vh;

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

  <title>Add Course</title>
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
</style>
<body>
  <div id="loading">
    <img id="loading-image" src="../assets/img/loading.gif" alt="Loading..." />
  </div>


  <script type="text/javascript">

    function printError(elemId, hintMsg) {
      document.getElementById(elemId).innerHTML = hintMsg;
    }

    function validateForm() {

      var college = document.contactForm.college.value;
      var coursename = document.contactForm.coursename.value;
      var coursename1 = document.contactForm.coursename1.value;
      var collegename1 = document.contactForm.collegename1.value;
      var username = document.contactForm.username.value;
      var contact = document.contactForm.contact.value;
      var email = document.contactForm.email.value;
      var review = document.contactForm.review.value;
      var file = document.contactForm.file.value;

      var collegeErr  = newcoursenameErr = courseErr = course1Err =collegename1Err = usernameErr = contactErr = emailErr = fileErr = true;

    //
      if(college == "") {
        printError("collegeErr", "Select College");
      } else {
        printError("collegeErr", "");
        collegeErr = false;
      }
    //
      if(college == "other") {
       if(collegename1 == "") {
        printError("collegename1Err", "Enter Course Name");
      } else {
        printError("collegename1Err", "");
        collegename1Err = false;
      }

      if(coursename1 == "") {
        printError("course1Err", "Enter Course Name");
      } else {
        printError("course1Err", "");
        course1Err = false;
      }



      if(username == "") {
        printError("usernameErr", "Enter Username");
      } else {
        printError("usernameErr", "");
        usernameErr = false;
      }


      if(contact == "") {
        printError("contactErr", "Enter Contact Number");
        contactErr = false;
      } else {
        var regex = /^[0-9]\d{10}$/;
        if(regex.test(contact) === false) {
          printError("contactErr", "Please enter a valid 11 digit contact number");
        } else{
          printError("contactErr", "");
          contactErr = false;
        }
      }

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

      if(file == "") {
        printError("fileErr", "Please Select Logo");
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


      printError("courseErr", "");
      courseErr = false;
    }
    


  }else{
    printError("collegename1Err", "");
    collegename1Err = false;

    printError("course1Err", "");
    course1Err = false;

    printError("usernameErr", "");
    usernameErr = false;

    printError("contactErr", "");
    contactErr = false;

    printError("emailErr", "");
    emailErr = false;

    printError("fileErr", "");
    fileErr = false;

    if(coursename == "") {
      printError("courseErr", "Enter Course Name");
    } else {
      printError("courseErr", "");
      courseErr = false;
    }


  }







  //

  //














  if((collegeErr || courseErr|| course1Err || collegename1Err || usernameErr || contactErr || emailErr || fileErr) == true) {
   return false;
 } else {
  if (review == "1") {
  }
  if (review == "") {

    if (college == "other") {
      printError("college1Info",collegename1);
      printError("course1Info",coursename1);
      printError("usernameInfo",username);
      printError("contactInfo",contact);
      printError("emailInfo",email);
      document.getElementById('popupcollege1').style.display = 'block';
    }
    if (college != "other") {
     document.getElementById('popupcollege').style.display = 'block';
     printError("collegeInfo",college);
     printError("courseInfo",coursename);
   }

   document.getElementById('success-hidden').style.display = 'block';

   return false;

 }

}

};

function reviewsubmit(){
  if (document.getElementById('review1').checked) {

    document.getElementById('success-hidden').style.display = 'none';
    document.getElementById("submit").click();
    

  }
  if (document.getElementById('review0').checked) {
    document.getElementById('success-hidden').style.display = 'none';
  }
}

</script>

<script type="text/javascript">
  setTimeout(function() {
    $('#undo-hidden').hide()
  }, 1600);
</script>

<!-- ======= Header ======= -->
<?php if(isset($_SESSION['adminrecordsuccess'])) {?>
  <div id="undo-hidden">
    <input type="checkbox" id="tableundo"><label for="tableundo"  class=""></label>
    <div class="container-undo1">
      <div class="container-undo01" align="center">

        <label class="title_info">
          <img src="../assets/img/success.gif" style="width: 40%;height: 40%;" />
          <br>
          <label style="font-size: 2em;margin-top: 20px;">ADDED SUCCESS!</label>
        </label><br>
      </div>
    </div>
    <?php echo" <style>#tableundo:checked ~ .container-undo1{display: block;}</style>";?> 
  </div> 

  <?php 
}
unset($_SESSION['adminrecordsuccess']);
?>









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
              <i class="bi bi-circle"></i><span  style="color:#ADADAD">Add College / Course</span>
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



  <form action="addcollegeserver.php" method="POST" name="contactForm" onsubmit="return validateForm()"  enctype="multipart/form-data">
    <input type="text" name="course" value="<?php echo $course ?>" style='display: none;'>
    <main id="main" class="main">
      <div id="success-hidden"  style="display: none;">
        <input type="checkbox" id="tablesuccess"><label for="tablesuccess"  class=""></label>
        <div class="container-success1" id="successtransition" >
          <div class="container-success01">




            <table class="popup_table">


              <tr>
                <td colspan='2'>
                 <label style='text-align: center;width:100%;font-size:3vmin;color:#0c506f;margin:0;padding:15px 0px 15px 0px'> Course Information</label>
               </td>
             </tr>
             <tr>
              <td  colspan='2' style='border-top:solid #0c506f 2px;'>
              </td>
            </tr>
            <tr>
              <td  colspan='2' align='center'>



                <div id="popupcollege" style="display:none">
                  <div class='col-xl-12  col-md-12 mt-12' style='box-shadow: rgba(0, 0, 0, 0.15) 0px 2px 5px;padding: 10px 5px 10px 5px;' >
                    <div class='d-flex align-items-cente p-2' style='background-color:white'>
                      <div class='align-items-center' style='width: 20%;'>
                        <label class='infolabel1'>College Name</label>
                      </div>
                      <div style='width:80%'>
                       <label id="collegeInfo" class="infolabel2"></label>
                     </div>                 
                   </div>
                   <div class='d-flex align-items-cente p-2' style='background-color:white'>
                    <div class='align-items-center' style='width: 20%;'>
                      <label class='infolabel1'>Course Name</label>
                    </div>
                    <div style='width:80%'>
                     <label id="courseInfo" class="infolabel2"></label>
                   </div>                 
                 </div>
               </div>
             </div>




            <div id="popupcollege1" style="display:none">

               <div class='col-xl-3  col-md-12 mt-5'  align='center' style='box-shadow: rgba(0, 0, 0, 0.15) 0px 2px 5px;'>
                 <div class='p-3' style='background-color:white;width:100%;' >
                  <img id="output1" style="width: 20vmin;height: 20vmin;display: none;" />
                </div>
              </div>
                <div class='col-xl-9  col-md-12 mt-5' style='box-shadow: rgba(0, 0, 0, 0.15) 0px 2px 5px;padding: 10px 5px 10px 5px;' >

            
                <div class='d-flex align-items-cente p-2' style='background-color:white'>
                  <div class='align-items-center' style='width: 20%;'>
                    <label class='infolabel1'>College Name</label>
                  </div>
                  <div style='width:80%'>
                   <label id="college1Info" class="infolabel2"></label>
                 </div>                 
               </div>
               <div class='d-flex align-items-cente p-2' style='background-color:white'>
                <div class='align-items-center' style='width: 20%;'>
                  <label class='infolabel1'>Course Name</label>
                </div>
                <div style='width:80%'>
                 <label id="course1Info" class="infolabel2"></label>
               </div>                 
             </div>
             <div class='d-flex align-items-cente p-2' style='background-color:white'>
              <div class='align-items-center' style='width: 20%;'>
                <label class='infolabel1'>Acronym</label>
              </div>
              <div style='width:80%'>
               <label id="usernameInfo" class="infolabel2"></label>
             </div>                 
           </div>
           <div class='d-flex align-items-cente p-2' style='background-color:white'>
            <div class='align-items-center' style='width: 20%;'>
              <label class='infolabel1'>Contact</label>
            </div>
            <div style='width:80%'>
             <label id="contactInfo" class="infolabel2"></label>
           </div>                 
         </div>
         <div class='d-flex align-items-cente p-2' style='background-color:white'>
          <div class='align-items-center' style='width: 20%;'>
            <label class='infolabel1'>Email</label>
          </div>
          <div style='width:80%'>
           <label id="emailInfo" class="infolabel2"></label>
         </div>                 
       </div>









   </div>
</div>

   <div class="col-xxl-12  col-md-12" style="margin-top: 20px;text-align: right;margin-bottom: 20px;" >
    <input type="radio" name="review" value=""  id="review0" onclick="javascript:reviewsubmit();" style="display:none">
    <label for="review0" style="background-color: #0c506f;color: #fff;font-size: 1.7vmin;padding: 10px 17px 10px 17px;border-radius: 5px;margin-right: 10px;" class="editsubmit">Edit</label>
    <input type="radio" name="review" value="1" id="review1" onclick="javascript:reviewsubmit();" style="display:none">
    <label for="review1" style="background-color: #0c506f;color: #fff;font-size:  1.7vmin;padding: 10px;border-radius: 5px;margin-right: 10px;" class="editsubmit">Submit</label>
  </div>


</td>

</tr>







</form>
</table>






</div>






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











<div class="pagetitle">
  <div class="row">
    <div class="col-12">
      <div class="col-xxl-4 col-md-4">
        <h1>Record</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Add College / Course</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->


    </div>
  </div>
</div>



<!-- Sales Card -->
<div class="col-xxl-12  col-md-12" style="color:#000">
 <div class="col-xxl-2  col-md-12">
 </div>
 <div class="col-xxl-8  col-md-12" style="background-color: #fff;">
   <div class="d-flex align-items-cente p-1 ">
    <div class="align-items-center" style="width: 100%;margin-left: 13px;margin-right: 13px;margin-top: 10px;">
      <label class='labelguild'>Select College</label>
      <br>
      <select name="college"style="width: 100%;color: #000;" class="labelinput" id="college">
        <option disabled selected value="">Select College</option>
        <?php
        $sql = "SELECT * FROM college where college != '' group by college ASC ";
        $result = $conn-> query($sql);
        if ($result-> num_rows > 0 ){
          while ($row=mysqli_fetch_array($result)){
            echo "<option value='".$row['college']."'>".$row['college']."</option>";

          }
        }

        ?>
        <option value="other">Other</option>
      </select>
      <label id="collegeErr" class="failed"></label>
    </div>      
  </div>

  <div id="newcollege1" style="display:none">
    <div class="d-flex align-items-cente p-1 ">
      <div class="align-items-center" style="width: 100%;margin-left: 13px;margin-right: 13px;">
        <label class='labelguild'>College Name</label>
        <br>
        <input type="text" name="collegename1"  style="width: 100%;" class="labelinput" placeholder="College Name">
        <label id="collegename1Err" class="failed"></label>
      </div>      
    </div>

    <div class="d-flex align-items-cente p-1 ">
      <div class="align-items-center" style="width: 100%;margin-left: 13px;margin-right: 13px;">
        <label class='labelguild'>Course Name</label>
        <br>
        <input type="text" name="coursename1"  style="width: 100%;" class="labelinput" placeholder="Course Name">
        <label id="course1Err" class="failed"></label>
      </div>      
    </div>


    <div class=" p-1">

      <div class="col-xxl-4 col-xl-4   col-md-12" > 
        <div class="align-items-center" >
          <label class='labelguild'>College Acronym</label>
          <br>
          <input type="text" name="username"  style="width: 100%;" class="labelinput" placeholder="eg: BSBE">
          <label id="usernameErr" class="failed"></label>
        </div> 
      </div>

      <div class="col-xxl-4 col-xl-4 col-md-12" > 
        <div class="align-items-center" >
         <label class='labelguild'>Contact Number</label>
         <br>
         <input type="number" name="contact"  style="width: 100%;" class="labelinput" placeholder="Contact Number">
         <label id="contactErr" class="failed"></label>
       </div> 
     </div>

     <div class="col-xxl-4 col-xl-4  col-md-12" > 
      <div class="align-items-center" >
        <label class='labelguild'>Email</label>
        <br>
        <input type="text" name="email"  style="width: 100%;" class="labelinput" placeholder="Email">
        <label id="emailErr" class="failed"></label>
      </div> 
    </div>
  </div>



  <div class="d-flex align-items-cente p-2" style="width: 100%;">
    <div class="align-items-center">


     <input name="file" type="file" id="file"  class="file" onclick="hideimage()" onchange="loadFile(event)" style="display:none" accept="image/png, image/jpeg, image/jpg"/>
     <label for='file' style="" class="imageupload">Upload Logo</label><br>
     <label id="fileErr" class="failed" style="margin-left:15px"></label>
   </div>
   <div class="align-items-center" style="width: 50%;">
    <img id="output" style="width: 15vmin;height: 15vmin;display: none;margin-left: 10px;" />
  </div>

  <script>

    function hideimage(){
      document.getElementById("output").style.display = "none";
    }


    var loadFile = function(event) {
      var output = document.getElementById('output');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
                        URL.revokeObjectURL(output.src) // free memory
                        $('#output').show();
                      }
                      var output1 = document.getElementById('output1');
                      output1.src = URL.createObjectURL(event.target.files[0]);
                      output1.onload = function() {
                        URL.revokeObjectURL(output1.src) // free memory
                        $('#output1').show();
                      }
                    };
                  </script>
                </div>


              </div>
              <div  id="coursediv" style="display: none;">
                <div class="d-flex align-items-cente p-1">
                  <div class="align-items-center" style="width: 100%;margin-left: 13px;margin-right: 13px;">
                    <label class='labelguild'>Course Name</label>
                    <br>
                    <input type="text" name="coursename"  style="width: 100%;" class="labelinput" placeholder="Course Name">
                    <label id="courseErr" class="failed"></label>
                  </div>      
                </div>
              </div>
              <script>

                $(document).ready(function(){
                  $('#college').on('change', function(){
                    var hiddencollege = $(this).val(); 
                    if (hiddencollege == "other") {
                     document.getElementById('newcollege1').style.display = 'block';
                     document.getElementById('coursediv').style.display = 'none';
                   }else{

                   }
                 });
                });
                $(document).ready(function(){
                  $('#college').on('change', function(){
                    var hiddencollege = $(this).val(); 
                    if (hiddencollege != "other") {
                     document.getElementById('newcollege1').style.display = 'none';
                     document.getElementById('coursediv').style.display = 'block';
                   }else{

                   }
                 });
                });
              </script>  










              <div class="d-flex align-items-cente p-3" style="text-align: right;">
                <div class="align-items-center" style="width: 100%;margin-left: 13px;margin-right: 13px;">
                  <input type="submit" name="submit" id="submit" style="display:none">
                  <label for='submit' style="background-color: #E8E8E8;color: #0c506f;font-size: 2.2vmin;padding: 10px;border-radius: 5px;margin-right: 10px;" class="editsubmit">Submit</label>
                </div>         
              </div>




            </div>


          </div><!-- End Sales Card -->
        </div>
      </div>

    </section>
  </form>



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