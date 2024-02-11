T<?php 
session_start();
include '../dbhelper.php';


if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
  //USERNAME LOGIN
  $username = $_SESSION['username'];
   if ($username == "guidance") {
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
.labelguild{
  font-size: 1.7vmin;
  color: #000;
  width: 100%;
}
.labelinput{
  height: 35px;
  color: #000;
  padding-left: 10px;
  font-size: 1.7vmin;
  border: solid 1px #000;
}
.failed{
  font-size: 1.5vmin;
  color: red;
  margin-top: 7px;
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
  width: 60%;
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
  background: #fff;
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
  border: solid 1px #000;
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
.description_mobile1 {
    width: 15% ;
  }
  .description_mobile2 {
   width: 85% ;
   text-align:justify;
  }
@media only screen and (max-width: 800px) {
  .description_mobile1 {
    width: 30% ;
  }
  .description_mobile2 {
   width: 70% ;
  }
}
.imageupload{
  background-color:#707070 ;
  padding: 7px 13px 7px 13px;
  color: #fff;box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
  border-radius: 3px; 
  font-family: Roboto, "Helvetica Neue", HelveticaNeue, Helvetica, Arial, sans-serif;
  font-size: 1.7vmin;
  font-weight: 500;
}
.imageupload:hover{
  background: #888888;
}
</style>
<head>
    <link rel="stylesheet" type="text/css" href="app.css?v=<?php echo time();?>">
  <meta http-equiv="X-UA-Compatible" content="IE=7">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

  <title>News Upload</title>
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

    var newsdetail = document.contactForm.newsdetail.value;
    var description = document.contactForm.description.value;
  
    var file = document.contactForm.file.value;
    var review = document.contactForm.review.value;



    var newsdetailErr = descriptionErr = fileErr = true;
    
    
    if(newsdetail == "") {
        printError("newsdetailErr", "Enter News Title");
    } else {
        printError("newsdetailErr", "");
        newsdetailErr = false;
      }

    //

    if(description == "") {
        printError("descriptionErr", "Enter Description");
    } else {
        printError("descriptionErr", "");
        descriptionErr = false;
        }
    //

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
    
    
     if((newsdetailErr  || descriptionErr || fileErr) == true) {
       return false;
    } else {

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
  <script>
    var counter = 0;

    function addInput() {
        var form = document.getElementById('formulario');
        // Increment counter
        counter++;
        // Reference dynamic input
        var template = document.getElementById('dynInp0');
        // Clone dynamic input
        var clone = template.cloneNode(true);
        /* Reassign clone id to the string "dynInp"...
        ||...concatenated to the current value of counter
        */
        clone.id = "dynInp" + counter;
        // Reference the first child of clone (<label>)
        var tag = clone.children[0];
        /* Change tag's text to the string "Entry "...
        ||...concatenated to the current value of counter
        */
        tag.textContent = "Organizer ";
        // Reference the 5th child of dynInp (<input>)
        var rem = clone.children[4];
        // Change button display to `inline-block'
        rem.style.display = 'inline-block';
        // Append clone to <form>
        form.appendChild(clone);
      }

    function removeInput(ele) {
      var form = document.getElementById('formulario');
      var parent = ele.parentNode;
      var removed = form.removeChild(parent);
    }
  </script>

<script type="text/javascript">
              setTimeout(function() {
              $('#undo-hidden').hide()
            }, 1600);
</script>

  <!-- ======= Header ======= -->
  <?php if(isset($_SESSION['guidancenewssucess'])) {?>
    <div id="undo-hidden">
          <input type="checkbox" id="tableundo"><label for="tableundo"  class=""></label>
                     <div class="container-undo1">
                          <div class="container-undo01" align="center">

                                <label class="title_info">
                                <img src="../assets/img/success.gif" style="width: 40%;height: 40%;" />
                                <br>
                                <label style="font-size: 2em;margin-top: 20px;">NEWS UPLOADED!</label>
                                </label><br>
                          </div>
                    </div>
                    <?php echo" <style>#tableundo:checked ~ .container-undo1{display: block;}</style>";?> 
    </div> 
    
   <?php 
 }
unset($_SESSION['guidancenewssucess']);
 ?>









  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">





   <?php if(isset($_SESSION['cancelepartmentnewssucess'])) {?>
    <div id="undo-hidden">
          <input type="checkbox" id="tableundo"><label for="tableundo"  class=""></label>
                     <div class="container-undo1">
                          <div class="container-undo01" align="center">

                                <label class="title_info">
                                <img src="../assets/img/success.gif" style="width: 40%;height: 40%;" />
                                <br>
                                <label style="font-size: 2em;margin-top: 20px;">NEWS REMOVED!</label>
                                </label><br>
                          </div>
                    </div>
                    <?php echo" <style>#tableundo:checked ~ .container-undo1{display: block;}</style>";?> 
    </div> 

   <?php 
 }
unset($_SESSION['cancelepartmentnewssucess']);
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
            <h6>Guidance</h6>
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
      <span>Job Posting</span>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav1" data-bs-toggle="collapse">
        <i class="fa fa-bullhorn"></i><span>Job Posting</span><i class="bi bi-chevron-down ms-auto"></i>
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
            <i class="bi bi-circle"></i><span>Disapproved</span>
          </a>
        </li>

      </ul>
    </li><!-- End Components Nav -->
    <li style="color: #B5B5B5;margin-left: 10px;padding: 7px;font-size: 13px;">
      <span>News & Event</span>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse" style="background-color: #297FA7;">
        <i class="fa fa-newspaper-o"></i><span >News & Events</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav22" class="nav-content  " data-bs-parent="#sidebar-nav">
        <li>
          <a href="#">
            <i class="bi bi-circle"></i><span style="color:#ADADAD" >News</span>
          </a>
        </li>
        <li>
          <a href="events.php">
            <i class="bi bi-circle"></i><span >Events</span>
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




<form action="addnewsserver.php" method="POST" name="contactForm" onsubmit="return validateForm()" id="formulario"  enctype="multipart/form-data">
s
  <main id="main" class="main">
    <div id="success-hidden"  style="display: none;">
          <input type="checkbox" id="tablesuccess"><label for="tablesuccess"  class=""></label>
                     <div class="container-success1" id="successtransition" >
                          <div class="container-success01">
                  
      <div class="row">
          <div class="col-xxl-12  col-md-12" style="margin-top: 20px;" align="center">
            <h2 style="font-weight: 800;font-size: 3vmin;color: #0c506f;border-bottom:solid 2px #0c506f;padding-bottom: 10px;">NEWS INFORMATION</h2>
          </div>
      


          <div class="col-xxl-6  col-md-6" style="margin-top: 20px;" >
                <div class="d-flex align-items-cente p-2" style="background-color:white;">
                          <div class="align-items-center" style="width: 30%;">
                            <label class='labelpreview01'>News Title</label>
                          </div>
                          <div style="width:70%" >
                            <label id="newsdetailInfo" class="outputpreview01"></label>
                          </div>                 
                </div>
          </div>

           <div class="col-xxl-6  col-md-6" style="margin-top: 20px;">
      
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
             <div class="d-flex align-items-cente p-2" style="background-color:white">
                          <div class="align-items-center" style="width: 30%;">
                          </div>
                          <div style="width:70%;"  align="left" >
                             <img id="output1" style="width: 20vmin;height: 20vmin;display: none;" />
                          </div>               
              </div>
          


           </div>
           <div class="col-xxl-12  col-md-12" style="margin-top: 20px;">
              <div class="d-flex align-items-cente p-2" style="background-color:white">
                          <div class="align-items-center description_mobile1">
                            <label class='labelpreview01'>Description</label>
                          </div>
                          <div  class="description_mobile2">
                            <label id="descriptionInfo" class="outputpreview01"></label>
                          </div>   
                          <div class="container2"></div>                  
                </div>
           </div>
            <div class="col-xxl-12  col-md-12" style="margin-top: 20px;text-align: right;" >
                    <input type="radio" name="review" value=""  id="review0" onclick="javascript:reviewsubmit();" style="display:none">
                                <label for="review0" style="background-color: #0c506f;color: #fff;font-size: 1.7vmin;padding: 10px 17px 10px 17px;border-radius: 5px;margin-right: 10px;" class="editsubmit">Edit</label>
                                <input type="radio" name="review" value="1" id="review1" onclick="javascript:reviewsubmit();" style="display:none">
                                <label for="review1" style="background-color: #0c506f;color: #fff;font-size: 1.7vmin;padding: 10px;border-radius: 5px;margin-right: 10px;" class="editsubmit">Submit</label>
             </div>

              






         </div>

         



        
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
      <div class="col-xxl-8 col-xl-8  col-md-8 col-sm-8">
      <h1>News</h1>
      <nav>
        <ol class="breadcrumb" >
          <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">News Upload</li>
        </ol>
      </nav>
        </div><!-- End Page Title -->
      <div class="col-xxl-4 col-xl-4  col-md-4 col-sm-4" align="right">
              <a href="news.php">
                  <label style='background-color:#07435f;color:#fff;font-size:1.7vmin;margin:0;padding: 1vmin 1.5vmin 1vmin 1.5vmin;border-radius:3px;margin-top: 20px;' class='addnews'>
   <i class='fa fa-list ' style='font-size:13px;font;font-weight: bold;'>
   <label style=' font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;padding: 0px .3vmin 0px .3vmin;font-weight:600'>News List</label>
   </i></label>

                </a>
      </div>


      </div>
    </div>
    </div>


    <section class="section dashboard">








    <div class="col-lg-12" style="width: 100%;" >
          <div class="row">
         <!-- Sales Card -->

              <div class="col-xxl-2 col-xl-2  col-md-12 col-sm-12"></div>
              <div class="col-xxl-8 col-xl-8  col-md-12 col-sm-12" style="background-color: #fff;margin-top: 20px;">
                 <div class="d-flex align-items-cente p-1 ">
                          <div class="align-items-center" style="width: 100%;margin-left: 13px;margin-right: 13px;margin-top: 10px;">
                            <label class='labelguild'>News Title</label>
                            <br>
                            <input type="text" name="newsdetail"  style="width: 100%;" class="labelinput" placeholder="News Title">
                            <label id="newsdetailErr" class="failed"></label>
                          </div>      
                </div>
                <div class="d-flex align-items-cente p-1 ">
                          <div class="align-items-center" style="width: 100%;margin-left: 13px;margin-right: 13px;">
                            <label class='labelguild'>Description</label>
                            <br>
                            <textarea name="description" id="description" class="inputtextarea"></textarea>
                            <br>
                            <label id="descriptionErr" class="failed"></label>
                          </div>  

                </div>
                   <div class="d-flex align-items-cente p-1" style="width: 100%;background-color: #fff;">
                    <div class="align-items-center" style="width: 100%;margin-left: 13px;margin-right: 13px;">
                        <label class='labelguild'>News Image</label>
                            <br>
          
                   <div class="card" style="box-shadow: none;border:solid 1px #000;border-radius: 0px;margin-bottom: 0px;">

                      <div class="drag-area">
                        <span class="visible">
                        <span class="select" role="button"></span>
                      </span>
                      <span class="on-drop">Drop images here</span>
                           <input name="file[]" type="file" id="file" value="1"  class="file" multiple onclick="MyLastestImage()" style="display:none" accept="image/png, image/jpeg, image/jpg, image/gif"/>
              <label for='file' style="" class="imageupload">Upload Image</label>
                      </div>

                      <!-- IMAGE PREVIEW CONTAINER -->
                      <div class="container"></div>
                      
                  </div>
                 
                  <script src="app.js?v=<?php echo time();?>"></script>
                   <label id="fileErr" class="failed"></label>
                </div>
                </div>
                <div class="d-flex align-items-cente p-3" style="text-align: right;background: #fff;">
                          <div class="align-items-center" style="width: 100%;margin-left: 13px;margin-right: 13px;">
                            <input type="submit" name="submit" id="submit" style="display:none">
                            <label for='submit' style="background-color: #E8E8E8;color: #0c506f;font-size: 2vmin;padding: 10px;border-radius: 5px;margin-right: 10px;" class="editsubmit">Submit</label>
                          </div>         
                </div>
                 
              </div>





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