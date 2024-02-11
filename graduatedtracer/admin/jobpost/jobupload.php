
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
   <link href="multiselect.css?v=<?php echo time();?>" rel="stylesheet"/>
  <script src="multiselect.min.js?v=<?php echo time();?>"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

    <title>Job Upload</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/tracerlogo.png" rel="icon">


  <!-- Favicons -->
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 


</head>
 <style type="text/css">
        #success-hidden input[type="checkbox"]{
            display: None;
        }

        .failed{
          color: red;
          font-size: 1.5vmin;
          margin-top: 5px;
      }

      .titlelabel{
         font-size: 1.7vmin;
         color: #000;
         width: 100%;
     }
     .inputlabel{
      height: 37px;
      width: 100%;
      font-size: 1.7vmin;
      color: #000;
      padding-left: 5px;
      border: solid 1px #000;

  }
  .inputtextarea{
    width: 100%;
    height: 150px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    font-size: 1.7vmin;
    resize: none;
}
.editsubmit:hover{
    transform: translate(0, -3px);
}

/*pre invo*/
.container-success1{
 position: fixed;
 width: 100%;
 top: 0;
 left: 0;
 right: 0;
 bottom: 0;
 background: rgba(86,86,86,.50);
 z-index: 10000;

}
.container-success01{
  width: 70%;
  margin-left: 15%;
  margin-right: 15%;
  border-radius: 10px;
overflow-y: scroll;
overflow-x: hidden;
position: absolute;
top:10vh;height:80vh;
background: #fff;box-shadow: 5px 5px 5px 5px#696969;

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
.labelpreview01{
   font-size: 1.6vmin;
   float: left;
   color: #000;
   text-align: left;
   padding:  5px 10px 5px 10px;
   font-weight: 600;
   font-family: Roboto, "Helvetica Neue", HelveticaNeue, Helvetica, Arial, sans-serif;
}
.outputpreview01{
   font-size: 2vmin;
   font-weight: 500;
   float: left;
   color: #000 ;
   text-align: left;
   width: 90%;
   padding:  5px 10px 5px 10px;
   font-family: Roboto, "Helvetica Neue", HelveticaNeue, Helvetica, Arial, sans-serif;

   background-color: transparent;
   border: none;
}
.editsubmit:hover{
    transform: translate(0, -3px);
}
/*start undo*/
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
  right: 32%;
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
.clonehide{
    display: none;
}
.addmore{
  width:50px;
  text-align: left;
  background-color: gray;
  margin-left: 5px;
  font-size: 20px;
  color: #fff;
  text-align: center;
  height: 37px;
}
.removemore{
  width:50px;
  text-align: left;
  background-color: gray;
  margin-left: 5px;
  font-size: 20px;
  color: #fff;
  text-align: center;
  height: 100%;
  height: 37px;
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
</style>>
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

        var jobtitle = document.contactForm.jobtitle.value;
        var companyname = document.contactForm.companyname.value;
        var email = document.contactForm.email.value;
        var contact = document.contactForm.contact.value;
        var link = document.contactForm.link.value;
        var jobtype = document.contactForm.jobtype.value;
        var location = document.contactForm.location.value;
        var daterange = document.contactForm.daterange.value;
        var minimumsalary = document.contactForm.minimumsalary.value;
        var maximumsalary = document.contactForm.maximumsalary.value;


        var specializationvalue = [];
        $.each($(".specialization option:selected"), function(){            
            specializationvalue.push($(this).val());
        });
        specialization = specializationvalue.join("<br> • ");










        var qualification = document.getElementsByName('qualification[]');
        var k;

        for (var i = 0; i < qualification.length; i++) {
            var a = qualification[i];
            var b;
            b = b + a.value ;
            if (b != "") {
                k = k + a.value + "<br>• ";
                b = "";
            }
        }

        if (qualification == "undefined<br>• ") {
          var qualification = "";
      }else{
         var qualification = k.substring(15);
     }

     var description = document.contactForm.description.value;
     var review = document.contactForm.review.value;


     var jobtitleErr = companynameErr =  emailErr = contactErr = jobtypeErr = locationErr = specializationErr = daterangeErr  = qualificationErr = descriptionErr = minimumsalaryErr = maximumsalaryErr = true;

    // Validate Last Name
     if(jobtitle == "") {
        printError("jobtitleErr", "Enter job title");
    } else {
        printError("jobtitleErr", "");
        jobtitleErr = false;
    }
    if(companyname == "") {
        printError("companynameErr", "Enter company name");
    } else {
        printError("companynameErr", "");
        companynameErr = false;
    }
    if(email == "") {
        printError("emailErr", "Please enter your email address");
    } else {
        // Regular expression for basic email validation
        var regex = /^\S+@\S+\.\S+$/;
        if(regex.test(email) === false) {
            printError("emailErr", "Please enter a valid email address");
        } else{
            printError("emailErr", "");
            emailErr = false;
        }
    }
    if(contact == "") {
        printError("contactErr", "");
        document.getElementById('optionalcontact').style.display = 'block';
        contactErr = false;
        document.getElementById('contactErr').style.display = 'none';
    } else {
        var regex = /^[0-9]\d{10}$/;
        if(regex.test(contact) === false) {
            printError("contactErr", "Please enter a valid 11 digit contact number");
            document.getElementById('optionalcontact').style.display = 'none';
        } else{
            printError("contactErr", "");
            contactErr = false;
        }
    }
     if(jobtype == "") {
        printError("jobtypeErr", "Select job type");
    } else {
        printError("jobtypeErr", "");
        jobtypeErr = false;
    }

    if(location == "") {
        printError("locationErr", "Enter location");
    } else {
        printError("locationErr", "");
        locationErr = false;
    }
    if(specialization == "") {
        printError("specializationErr", "Select atleast one");
    } else {
        printError("specializationErr", "");
        specializationErr = false;
    }

    
    if(daterange == "") {
        printError("daterangeErr", "Enter duration");
    } else {
        printError("daterangeErr", "");
        daterangeErr = false;
    }
    if(qualification == "") {
        printError("qualificationErr", "Please enter qualification");
    } else {
        printError("qualificationErr", "");
        qualificationErr = false;
    }
    if(description == "") {
        printError("descriptionErr", "Enter description");
    } else {
        printError("descriptionErr", "");
        descriptionErr = false;
    }
    

    if(maximumsalary != "" || minimumsalary != ""){
      if(minimumsalary == "") {
        printError("minimumsalaryErr", "Enter salary");
    } else {
        printError("minimumsalaryErr", "");
        minimumsalaryErr = false;
    }
    
    
    if(maximumsalary == "") {
        printError("maximumsalaryErr", "Enter salary");
    } else {
        printError("maximumsalaryErr", "");
        maximumsalaryErr = false;
    }

    document.getElementById('optionalminimum').style.display = 'none';
        document.getElementById('optionalmaximum').style.display = 'none';
             document.getElementById('maximumsalaryErr').style.display = 'block';
      document.getElementById('minimumsalaryErr').style.display = 'block';

}else{
   printError("maximumsalaryErr", "");
   maximumsalaryErr = false;
   printError("minimumsalaryErr", "");
   minimumsalaryErr = false;
    document.getElementById('optionalminimum').style.display = 'block';
    document.getElementById('optionalmaximum').style.display = 'block';
     document.getElementById('maximumsalaryErr').style.display = 'none';
      document.getElementById('minimumsalaryErr').style.display = 'none';

}



printError("descriptionErr", "");
descriptionErr = false;


if((jobtitleErr || companynameErr || contactErr || emailErr || jobtypeErr || locationErr || specializationErr|| daterangeErr || qualificationErr || descriptionErr || minimumsalaryErr || maximumsalaryErr) == true) {
 return false;
} else {
    if (review == "1") {
    }
    if (review == "") {


        printError("jobtitleInfo",jobtitle);
        printError("companynameInfo",companyname);
        printError("emailInfo",email);
        if (contact == '') {
            contact = "N/A";
        }
        printError("contactInfo",contact);


        if (link == '') {
            link = "N/A";
        }
        printError("linkInfo",link);
        printError("daterangeInfo",daterange);
        printError("jobtypeInfo",jobtype);
        printError("locationInfo",location);
        specialization = " • " + specialization;
        printError("specializationInfo",specialization);
        qualification = "• " + qualification;
        qualification = qualification.slice(0, -2);
        printError("qualificationInfo",qualification);
        printError("descriptionInfo",description);
        if (description == "") {
             printError("descriptionInfo","N/A");
        }
        printError("salaryrangeInfo","PHP (" + minimumsalary + " - " + maximumsalary +")");

        if (minimumsalary == "") {
              printError("salaryrangeInfo","N/A");
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
    <?php if(isset($_SESSION['adminjobsuccess'])) {?>
    <div id="undo-hidden">
          <input type="checkbox" id="tableundo"><label for="tableundo"  class=""></label>
                     <div class="container-undo1">
                          <div class="container-undo01" align="center">

                                <label class="title_info">
                                <img src="../assets/img/success.gif" style="width: 40%;height: 40%;" />
                                <br>
                                <label style="font-size: 2em;margin-top: 20px;">JOB UPLOADED!</label>
                                </label><br>
                          </div>
                    </div>
                    <?php echo" <style>#tableundo:checked ~ .container-undo1{display: block;}</style>";?> 
    </div> 

   <?php 
 }
unset($_SESSION['adminjobsuccess']);
 ?>

  <!-- ======= Header ======= -->
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
            <a href="#">
              <i class="bi bi-circle"></i><span style="color:#ADADAD">Job Upload</span>
            </a>
          </li>
          <li>
            <a href="pendingjob.php">
              <i class="bi bi-circle"></i><span>Pending Job Approval (Guidance)</span>
            </a>
          </li>
          <li>
            <a href="jobhiring.php">
              <i class="bi bi-circle"></i><span>Job Hiring</span>
            </a>
          </li>
          <li>
            <a href="jobclosed.php">
              <i class="bi bi-circle"></i><span>Job Closed</span>
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
  <form action="jobuploadserver.php" method="POST" name="contactForm" onsubmit="return validateForm()"  >
  <input type="hidden" name="college" value="<?php echo $college ?>">
  <main id="main" class="main">
    <div id="success-hidden" style="display:none" >
      <input type="checkbox" id="tablesuccess"><label for="tablesuccess"  class=""></label>
      <div class="container-success1" id="successtransition" >
          <div class="container-success01">
            <div class="col-lg-12">
      <div class="row">
          <div class="col-xxl-12  col-md-12" style="margin-top: 20px;" align="center">
            <h2 style="font-weight: 800;font-size: 3vmin;color: #0c506f;">JOB UPLOAD INFORMATION</h2>
          </div>
          <div class="col-xxl-12  col-md-12" style="border-top: solid 2px #0c506f;" >
          </div>


          <div class="col-xxl-6  col-md-6" style="margin-top: 20px;" >
                <div class="d-flex align-items-cente p-2" style="background-color:white">
                          <div class="align-items-center" style="width: 30%;">
                            <label class='labelpreview01'>JOB TITLE</label>
                          </div>
                          <div style="width:70%" >
                            <label id="jobtitleInfo" class="outputpreview01"></label>
                          </div>                 
                </div>
                <div class="d-flex align-items-cente p-2" style="background-color:white">
                          <div class="align-items-center" style="width: 30%;">
                            <label class='labelpreview01'>COMPANY NAME</label>
                          </div>
                          <div style="width:70%" >
                            <label id="companynameInfo" class="outputpreview01"></label>
                          </div>                 
                </div>
                <div class="d-flex align-items-cente p-2" style="background-color:white">
                          <div class="align-items-center" style="width: 30%;">
                            <label class='labelpreview01'>EMAIL</label>
                          </div>
                          <div style="width:70%" >
                            <label id="emailInfo" class="outputpreview01"></label>
                          </div>                 
                </div>
                <div class="d-flex align-items-cente p-2" style="background-color:white">
                          <div class="align-items-center" style="width: 30%;">
                            <label class='labelpreview01'>CONTACT #</label>
                          </div>
                          <div style="width:70%" >
                            <label id="contactInfo" class="outputpreview01"></label>
                          </div>                 
                </div>
                <div class="d-flex align-items-cente p-2" style="background-color:white">
                          <div class="align-items-center" style="width: 30%;">
                            <label class='labelpreview01'>LINK</label>
                          </div>
                          <div style="width:70%" >
                            <label id="linkInfo" class="outputpreview01"> </label>
                          </div>                 
                </div>
                <div class="d-flex align-items-cente p-2" style="background-color:white">
                          <div class="align-items-center" style="width: 30%;">
                            <label class='labelpreview01'>DURATON</label>
                          </div>
                          <div style="width:70%" >
                            <label id="daterangeInfo" class="outputpreview01"></label>
                          </div>                 
                </div>
                <div class="d-flex align-items-cente p-2" style="background-color:white">
                          <div class="align-items-center" style="width: 30%;">
                            <label class='labelpreview01'>JOB TYPE</label>
                          </div>
                          <div style="width:70%" >
                            <label id="jobtypeInfo" class="outputpreview01"></label>
                          </div>                 
                </div>
                <div class="d-flex align-items-cente p-2" style="background-color:white">
                          <div class="align-items-center" style="width: 30%;">
                            <label class='labelpreview01'>LOCATION</label>
                          </div>
                          <div style="width:70%">
                            <label id="locationInfo" class="outputpreview01"></label>
                          </div>                 
                </div>
                <div class="d-flex align-items-cente p-2" style="background-color:white">
                          <div class="align-items-center" style="width: 30%;">
                            <label class='labelpreview01'>SPECIALIZATION</label>
                          </div>
                          <div style="width:70%">
                            <label id="specializationInfo" class="outputpreview01"></label>
                          </div>                 
                </div>
          </div>

           <div class="col-xxl-6  col-md-6" style="margin-top: 20px;">
                <div class="d-flex align-items-cente p-2" style="background-color:white">
                          <div class="align-items-center" style="width: 100%;">
                            <label class='labelpreview01'>SALARY RANGE</label>
                          </div>              
                </div>
                <div class="d-flex align-items-cente p-2" style="background-color:white">
                          <div class="align-items-center" style="width: 100%;">
                            <label id='salaryrangeInfo' class="outputpreview01" style="margin-left: 20px;"></label>
                           </div>              
                 </div>
               <div class="d-flex align-items-cente p-2" style="background-color:white">
                          <div class="align-items-center" style="width: 100%;">
                            <label class='labelpreview01'>QUALIFICATION</label>
                          </div>              
                </div>
                <div class="d-flex align-items-cente p-2" style="background-color:white">
                          <div class="align-items-center" style="width: 100%;">
                            <label id='qualificationInfo' class="outputpreview01" style="margin-left: 20px;"></label>
                           </div>              
                 </div>
                 <div class="d-flex align-items-cente p-2" style="background-color:white">
                          <div class="align-items-center" style="width: 30%;">
                            <label class='labelpreview01' style="text-align: justify;">DESCRIPTION</label>
                          </div>               
                </div>
                <div class="d-flex align-items-cente p-2" style="background-color:white">
                          <div class="align-items-center" style="width: 100%;">
                           <label id="descriptionInfo" class="outputpreview01" style="margin-left: 20px;"></label>
                           </div>              
                 </div>
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
            <div class="col-xxl-12  col-md-12" style="margin-top: 20px;text-align: right;" >
                    <input type="radio" name="review" value=""  id="review0" onclick="javascript:reviewsubmit();" style="display:none">
                                <label for="review0" style="background-color: #0c506f;color: #fff;font-size: 1.7vmin;padding: 10px 20px 10px 20px;border-radius: 5px;margin-right: 10px;" class="editsubmit">Edit</label>
                                <input type="radio" name="review" value="1" id="review1" onclick="javascript:reviewsubmit();" style="display:none">
                                <label for="review1" style="background-color: #0c506f;color: #fff;font-size: 1.7vmin;padding: 10px;border-radius: 5px;margin-right: 10px;" class="editsubmit">Submit</label>
             </div>

              






         </div>

         

      </div>
 <label style="font-size: .1px;">.</label>

        
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
    </div> 
    <div class="col-xxl-3 col-md-4">
              <div class="pagetitle">
              <h1>Job Upload</h1>
              <nav >
                <ol class="breadcrumb" style="background-color:transparent;">
                  <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
                  <li class="breadcrumb-item active">Job Upload</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->

      </div><!-- End Sales Card -->
    <div class="col-lg-12" style="background: #fff;padding: 10px 10px 15px 10px;box-shadow: 3px 3px 3px #D8D8D8;margin-bottom: 200px;">
      <div style="width: 100%;border-bottom: 2px solid #D8D8D8;color:#524E4E;padding:10px;">
        <h1>Create & Upload Job</h1>
      </div>
      <div class="row">
      
          <div class="col-xxl-6  col-md-6" style="margin-top: 20px;" >
            

                <div class="d-flex align-items-cente p-2">
                        <div class="align-items-center" style="width: 40%;">
                            <label class="titlelabel">JOB TITLE</label>
                          </div>
                          <div style="width:60%" >
                            <input type="text" name="jobtitle" id="jobtitle" class="inputlabel" placeholder="Job Title">
                            <br>
                            <label id="jobtitleErr" class="failed"></label>
                          </div>
                </div>
                <div class="d-flex align-items-cente p-2">
                        <div class="align-items-center" style="width: 40%;">
                            <label class="titlelabel">COMPANY NAME</label>
                          </div>
                          <div style="width:60%" >
                            <input type="text" name="companyname" class="inputlabel" placeholder="Company Name">
                            <br>
                            <label id="companynameErr" class="failed"></label>
                          </div>
                </div>
                 <div class="d-flex align-items-cente p-2">
                        <div class="align-items-center" style="width: 40%;">
                            <label class="titlelabel">COMPANY EMAIL</label>
                          </div>
                          <div style="width:60%" >
                            <input type="text"  class="inputlabel" id='email' name='email' placeholder="eg.ucu@gmail.com" >
                            <br>
                             <label id="emailErr" class="failed"></label>
                          </div>
                </div>
                       <div class="d-flex align-items-cente p-2">
                        <div class="align-items-center" style="width: 40%;">
                            <label class="titlelabel">COMPANY CONTACT #</label>
                          </div>
                          <div style="width:60%" >
                            <input type="number"  class="inputlabel" id='contact' name='contact' placeholder="09**********" >
                             <label style="margin-left: 5px;color: #B2AAAA;margin-top: 2px;font-size: 1.5vmin;" id="optionalcontact">( Optional )</label>
                             <label id="contactErr" class="failed"></label>
                          </div>
                </div>
                <div class="d-flex align-items-cente p-2">
                        <div class="align-items-center" style="width: 40%;">
                            <label class="titlelabel">COMPANY LINK</label>
                          </div>
                          <div style="width:60%" >
                            <input type="url"  class="inputlabel" id='link' name='link' placeholder="Website Link" >
                            <label style="margin-left: 5px;color: #B2AAAA;margin-top: 2px;font-size: 1.5vmin;">( Optional )</label>
                             <label></label>
                          </div>
                </div>

             
                <div class="d-flex align-items-cente p-2">
                        <div class="align-items-center" style="width: 40%;">
                            <label class="titlelabel">JOB TYPE</label>
                          </div>
                          <div style="width:60%" >
                            <select name="jobtype" class="inputlabel">
                              <option selected disabled value="">Select</option>
                              <option value="Intership">Intership</option>
                              <option value="Contract">Contract</option>
                              <option value="Full-time">Full-time</option>
                              <option value="Part-time">Part-time</option>
                                  <option value="Not Specified">Not Specified</option>
                            </select>
                            <br>
                            <label id="jobtypeErr" class="failed"></label>
                          </div>
                </div>
                 <div class="d-flex align-items-cente p-2">
                        <div class="align-items-center" style="width: 40%;">
                            <label class="titlelabel">LOCATION</label>
                          </div>
                          <div style="width:60%" >
                            <input type="text" name="location" class="inputlabel" placeholder="Location">
                            <br>
                            <label id="locationErr" class="failed"></label>
                          </div>
                </div>
    
    <script type="text/javascript">
       var options = document.getElementById('specialization').selectedOptions;
        var values = Array.from(options).map(({ value }) => value);
        console.log(values);
    </script>
                <div class="d-flex align-items-cente p-2">
                        <div class="align-items-center" style="width: 40%;">
                            <label class="titlelabel">SPECIALIZATION</label>
                          </div>
                          <div style="width:60%" style="background-color:red">
                            <select  id='specialization' name="specialization[]" class="specialization" value="" multiple>
                              <option value='Accounting/Finance'>Accounting/Finance</option>
                              <option value='Admin/Human Resources'>Admin/Human Resources</option>
                              <option value='Sales/Marketing'>Sales/Marketing</option>
                              <option value='Arts/Media/Communications'>Arts/Media/Communications</option>
                              <option value='Services'>Services</option>
                              <option value='Hotel/Restaurant'>Hotel/Restaurant</option>
                              <option value='Education/Training'>Education/Training</option>
                              <option value='Computer/Information Technology'>Computer/Information Technology</option>
                              <option value='Engineering'>Engineering</option>
                              <option value='Manufacturing'>Manufacturing</option>
                              <option value='Building/Construction'>Building/Construction</option>
                              <option value='Sciences'>Sciences</option>
                              <option value='Healthcare'>Healthcare</option>
                              <option value='Journalst/Editors'>Journalst/Editors</option>
                              <option value='General Work'>General Work</option>
                              <option value='Publishing'>Publishing</option>
                            </select>
                            <br>
                            <label id="specializationErr" class="failed"></label>
                          </div>
                </div>
                    <script>
                        document.multiselect('#specialization')
                            .setCheckBoxClick("checkboxAll", function(target, args) {
                                console.log("Checkbox 'Select All' was clicked and got value ", args.checked);
                            })
                            .setCheckBoxClick("1", function(target, args) {
                                console.log("Checkbox for item with value '1' was clicked and got value ", args.checked);
                            });


                    </script>
          </div>


           <div class="col-xxl-6  col-md-6" style="margin-top: 20px;">
             <div class="d-flex align-items-cente p-2">
                        <div class="align-items-center" style="width: 100%;">
                            <label class="titlelabel">SALARY RANGE</label>
                          </div>
                </div>
                <div class="d-flex align-items-cente" style="margin-left: 5%;margin-right: 5%;">
      <div style="width:30%" >
        <label style="margin-left: 5px;color: #B2AAAA;font-size: 1.5vmin;margin: 0;padding: 0;">(PHP)</label>
        <input type="text" name="minimumsalary" value="" id="minumumsalary" class="inputlabel"  style="width:86%" placeholder="Minimum Salary" />
        <label style="margin-left: 5px;color: #B2AAAA;margin-top: 2px;font-size: 1.5vmin;" id="optionalminimum">( Optional )</label>
        <label id="minimumsalaryErr" class="failed"></label>
    </div>
    <div style="width:35%" >
       <label style="margin-left: 5px;color: #B2AAAA;font-size: 1.5vmin;margin: 0;padding: 0;" >(PHP)</label>
       <input type="text" name="maximumsalary" value="" id="maximumsalary" class="inputlabel"  style="width:86%" placeholder="Maximum Salary" />
       <label style="margin-left: 5px;color: #B2AAAA;margin-top: 2px;font-size: 1.5vmin;" id="optionalmaximum">( Optional )</label>
       <label id="maximumsalaryErr" class="failed"></label>
   </div>
                </div>


               <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
                <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
                <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
                <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
                <div class="d-flex align-items-cente p-2  mt-3">
                        <div class="align-items-center" style="width: 100%;">
                            <label class="titlelabel">DURATION DATE</label>
                          </div>
                </div>
                <div class="d-flex align-items-cente p-2" style="margin-left: 5%;margin-right: 5%;">
                          <div style="width:70%" >
                            <input type="text" name="daterange" value="" id="daterange" class="inputlabel"  style="width:86%" />
                            <label id="daterangeErr" class="failed"></label>
                          </div>
                </div>
                <script>
              $(function() {
                $('input[name="daterange"]').daterangepicker({
                  opens: 'left'
                }, function(start, end, label) {
                  console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                });
              });
              </script>
            <div class="clonehide">
              <div class="d-flex align-items-cente p-2" id="clone" style="margin-left: 5%;margin-right: 5%;">

                            <input type="text" name="qualification[]" id="" placeholder="Qualification" class="inputlabel" style="width:60%">
                            <button type="button" class="btn addmore">+</button>
                            <button type="button" class="remove btn btn-danger removemore">-</button>
                         
              </div>
            </div>
              <div class="d-flex align-items-cente p-2">
                         <div class="align-items-center" style="width: 25%;">
                            <label class="titlelabel">Qualification</label>
                        </div>
             </div>
              <div class="d-flex align-items-cente p-2" id="clone" style="margin-left: 5%;margin-right: 5%;">
                            <input type="text" name="qualification[]" id="" placeholder="Qualification" class="inputlabel" style="width:60%">
                            <button type="button" class="btn addmore">+</button>
                         
              </div>
                <div id="clone_div1">
                </div>

                 
                      <script type="text/javascript">
                   
                   $(document).on('click', '.addmore', function (ev) {
                  var $clone = $("#clone").clone(true);
                  var $newbuttons = "<button type='button' class='remove btn btn-danger'> Remove</button>";
                  $clone.find('.tn-buttons').html($newbuttons).end().appendTo($('#clone_div1'));
                  });

                   $(document).on('click', '.remove', function (ev) {
                  $(this).parent().remove();
                  });
                    </script>
                <div class="d-flex align-items-cente p-2">
                          <div align="left" style="margin-left: 5%;">
                            <label id="qualificationErr" class="failed"></label>
                          </div>
                </div>
                
                <div class="d-flex align-items-cente p-2" >
                        <div class="align-items-center" style="width: 100%;">
                            <label class="titlelabel">Job Description :</label>
                        </div>
                </div>
                 <div class="d-flex align-items-cente p-2" >
                        <div class="align-items-center" style="width: 100%;">
                            <textarea name="description" class="inputtextarea"></textarea>
                            <br>
                            <label id="descriptionErr" class="failed"></label>
                        </div>
                </div>
                 <div class="d-flex align-items-cente p-2" >
                        <div class="align-items-center" style="width: 100%; text-align: right;margin-right: 10px;">
                            <input type="submit" name="submit" id="submit" style="display:none">
                            <label for='submit' style="background-color: #E8E8E8;color: #0c506f;font-size: 2vmin;padding: 10px;border-radius: 5px;margin-right: 10px;" class="editsubmit">Submit</label>
                        </div>
                </div>
              
          </div>

         

      </div>


        
    </div>

  </main><!-- End #main -->

</form>
<script type="text/javascript">       
  class magicFocus
    
    constructor: (@parent) ->
      
      return unless @parent
          
      @focus = document.createElement 'div'
      @focus.classList.add 'magic-focus'
      @parent.classList.add 'has-magic-focus'
      @parent.appendChild @focus

      for input in @parent.querySelectorAll('input, textarea, select')      
        input.addEventListener 'focus', ->
          window.magicFocus.show()
        input.addEventListener 'blur', ->
          window.magicFocus.hide()
      
    show: =>
      
      return unless ['INPUT','SELECT','TEXTAREA'].includes? (el = document.activeElement).nodeName
      
      clearTimeout(@reset)
                     
      el = document.querySelector("[for=#{el.id}]") if ['checkbox', 'radio'].includes? el.type

      @focus.style.top = "#{el.offsetTop||0}px"
      @focus.style.left = "#{el.offsetLeft||0}px"
      @focus.style.width = "#{el.offsetWidth||0}px"
      @focus.style.height = "#{el.offsetHeight||0}px"
        
    hide: =>
         
      @focus.style.width = 0 unless ['INPUT','SELECT','TEXTAREA', 'LABEL'].includes? (el = document.activeElement).nodeName
          
      @reset = setTimeout ->
        window.magicFocus.focus.removeAttribute('style')
      , 200

  # initialize
      
  window.magicFocus = new magicFocus document.querySelector('.form')

  $ ->
    $('.select').customSelect()</script>

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