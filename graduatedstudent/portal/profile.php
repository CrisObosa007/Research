<?php 
session_start();
include 'dbhelper.php';


if (isset($_SESSION['idno']) && isset($_SESSION['password'])) {
  //USERNAME LOGIN
  $idno = $_SESSION['idno'];
  $sql = "SELECT * FROM graduated INNER JOIN employment ON graduated.idno = employment.idno where graduated.idno ='$idno';";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $course = $row['course'];
  $college = $row['college'];
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
  $notification = $row['notification'];
  $newsnotification = $row['newsnotification'];
  $eventnotification = $row['eventnotification'];
  if ($notification == "Yes") {
      $notificationstatus;
      $notificationstatus = 'On';
  }else{
    $notificationstatus;
    $notificationstatus = 'Off';
}
if ($newsnotification == "Yes") {
  $newsnotificationstatus;
  $newsnotificationstatus = 'On';
}else{
    $newsnotificationstatus;
    $newsnotificationstatus = 'Off';
}
if ($eventnotification == "Yes") {
  $eventnotificationstatus;
  $eventnotificationstatus = 'On';
}else{
    $eventnotificationstatus;
    $eventnotificationstatus = 'Off';
}

$collegesuser1 = $row['college'];
$spesplit = explode(', ', $collegesuser1);  
for($iii=0; $iii<sizeof($spesplit); $iii++){

  if ($iii==1) {

      $course = $row['course'] . ", " . $row['course1'];
      $yeargrad = $row['yeargrad'] . ", " .  $row['yeargrad1'];

  }

}

?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Profile</title>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">

    function printError(elemId, hintMsg) {
        document.getElementById(elemId).innerHTML = hintMsg;
    }

    function validateForm() {


        var civilstatus = document.contactForm.civilstatus.value;
        var contact = document.contactForm.contact.value;
        var email = document.contactForm.email.value;
        var specialization = document.contactForm.specialization.value;




        var  civilstatusErr = contactErr = emailErr = specializationErr  =  true;


        if(civilstatus == "") {
            printError("civilstatusErr", "Please select your Civil Status");
        } else {
            printError("civilstatusErr", "");
            civilstatusErr = false;
        }

    // Validate Contact Number
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
    // Validate specialization
        if(specialization == "") {
            printError("specializationErr", "Please select atleast one");
        } else {
            printError("specializationErr", "");
            specializationErr = false;
        }












        if(( civilstatusErr || contactErr || emailErr || specializationErr) == true) {
           return false;
       } else {


       }
   };

</script>
<!-- advance study -->
<script type="text/javascript">
    function validateFormAdvanceStudy() {

        var postgraduate = document.advancestudyForm.postgraduate.value;
        var postgraduatey1 = document.advancestudyForm.postgraduatey1.value;
        var postgraduatey2 = document.advancestudyForm.postgraduatey2.value;


        var postgraduateErr = postgraduatey1Err = postgraduatey2Err =  true;

        if(postgraduate == "") {
            printError("postgraduateErr", "Please answer");
        } else {
            printError("postgraduateErr", "");
            postgraduateErr = false;
        }
        if(postgraduate == "Yes") {
          if(postgraduatey1 == "") {
            printError("postgraduatey1Err", "Please answer");
        } else {
            printError("postgraduatey1Err", "");
            postgraduatey1Err = false;
        }
        if(postgraduatey2 == "") {
            printError("postgraduatey2Err", "Please answer");
        } else {
            printError("postgraduatey2Err", "");
            postgraduatey2Err = false;
        }
    }
    if(postgraduate == "No") {
      printError("postgraduateErr", "");
      postgraduatey1Err = false;
      printError("postgraduateErr", "");
      postgraduatey2Err = false;
  }



  if(( postgraduateErr || postgraduatey1Err || postgraduatey2Err) == true) {
     return false;
 } else {


 }



}
</script>
<!-- advance study -->
<!-- first job -->
<script type="text/javascript">
    function validateFormFirstJob() {
      var firstjob = document.firstjobForm.firstjob.value;
      var firstjoby1 = document.firstjobForm.firstjoby1.value;
      var firstjoby2 = document.firstjobForm.firstjoby2.value;
      var firstjoby3 = document.firstjobForm.firstjoby3.value;
      var firstjoby4 = document.firstjobForm.firstjoby4.value;
      var firstjoby4y1 = document.firstjobForm.firstjoby4y1.value;
      var firstjoby5 = document.firstjobForm.firstjoby5.value;
      var firstjoby6 = document.firstjobForm.firstjoby6.value;


      var firstjobErr = firstjoby1Err = firstjoby2Err = firstjoby3Err = firstjoby4Err = firstjoby4y1Err = firstjoby5Err = firstjoby6Err = true;








      if(firstjob == "") {
        printError("firstjobErr", "Please answer");
    } else {
        printError("firstjobErr", "");
        firstjobErr = false;
    }

    if(firstjob == "Yes") {
        if(firstjoby1 == "") {
            printError("firstjoby1Err", "Please answer");
        } else {
            printError("firstjoby1Err", "");
            firstjoby1Err = false;
        }
        if(firstjoby2 == "") {
            printError("firstjoby2Err", "Please answer");
        } else {
            printError("firstjoby2Err", "");
            firstjoby2Err = false;
        }
        if(firstjoby3 == "") {
            printError("firstjoby3Err", "Please answer");
        } else {
            printError("firstjoby3Err", "");
            firstjoby3Err = false;
        }
        if(firstjoby4 == "") {
            printError("firstjoby4Err", "Please answer");
        } else {
            printError("firstjoby4Err", "");
            firstjoby4Err = false;
        }

        if(firstjoby4 == "Yes") {
            if(firstjoby4y1 == "") {
                printError("firstjoby4y1Err", "Please answer");
            } else {
                printError("firstjoby4y1Err", "");
                firstjoby4y1Err = false;
            }
        }


        if(firstjoby4 == "No") {
            printError("firstjoby4y1Err", "");
            firstjoby4y1Err = false;
        }

        if(firstjoby5 == "") {
            printError("firstjoby5Err", "Please answer");
        } else {
            printError("firstjoby5Err", "");
            firstjoby5Err = false;
        }

        if(firstjoby6 == "") {
            printError("firstjoby6Err", "Please answer");
        } else {
            printError("firstjoby6Err", "");
            firstjoby6Err = false;
        }
    }


    if(firstjob == "No") {
        printError("firstjoby1Err", "");
        firstjoby1Err = false;
        printError("firstjoby2Err", "");
        firstjoby2Err = false;
        printError("firstjoby3Err", "");
        firstjoby3Err = false;
        printError("firstjoby4Err", "");
        firstjoby4Err = false;
        printError("firstjoby4y1Err", "");
        firstjoby4y1Err = false;
        printError("firstjoby5Err", "");
        firstjoby5Err = false;
        printError("firstjoby6Err", "");
        firstjoby6Err = false;
    }


    if(( firstjobErr || firstjoby1Err || firstjoby2Err || firstjoby3Err || firstjoby4Err || firstjoby4y1Err || firstjoby5Err || firstjoby6Err) == true) {
     return false;
 } else {


 }



}
</script>
<!-- First Job -->
<!-- employment data -->
<script type="text/javascript">
    function validateFormEmployment() {
        var employed = document.employmentForm.employed.value;
        var employedy1 = document.employmentForm.employedy1.value;
        var employedy2 = document.employmentForm.employedy2.value;
        var employedy3 = document.employmentForm.employedy3.value;
        var employedy4 = document.employmentForm.employedy4.value;
        var employedy5 = document.employmentForm.employedy5.value;
        var employedn1 = document.employmentForm.employedn1.value;

        var employedErr = employedy1Err = employedy2Err = employedy3Err = employedy4Err = employedy5Err = employedn1Err = true;



        if(employed == "") {
            printError("employedErr", "Please answer");
        } else {
            printError("employedErr", "");
            employedErr = false;
        }
        if(employed == "Yes") {
            if(employedy1 == "") {
                printError("employedy1Err", "Please answer");
            } else {
                printError("employedy1Err", "");
                employedy1Err = false;
            }
            if(employedy2 == "") {
                printError("employedy2Err", "Please answer");
            } else {
                printError("employedy2Err", "");
                employedy2Err = false;
            }
            if(employedy3 == "") {
                printError("employedy3Err", "Please answer");
            } else {
                printError("employedy3Err", "");
                employedy3Err = false;
            }
            if(employedy4 == "") {
                printError("employedy4Err", "Please answer");
            } else {
                printError("employedy4Err", "");
                employedy4Err = false;
            }
            if(employedy5 == "") {
                printError("employedy5Err", "Please answer");
            } else {
                printError("employedy5Err", "");
                employedy5Err = false;
            }
            printError("employedn1Err", "");
            employedn1Err = false;

        }
        if(employed == "No") {
            if(employedn1 == "") {
                printError("employedn1Err", "Please answer");
            } else {
                printError("employedn1Err", "");
                employedn1Err = false;
            }

            printError("employedy1Err", "");
            employedy1Err = false;
            printError("employedy2Err", "");
            employedy2Err = false;
            printError("employedy3Err", "");
            employedy3Err = false;
            printError("employedy4Err", "");
            employedy4Err = false;
            printError("employedy5Err", "");
            employedy5Err = false;

        }


        if(( employedErr || employedy1Err || employedy2Err || employedy3Err || employedy4Err || employedy5Err || employedn1Err) == true) {
           return false;
       } else {


       }

   }

</script>
<!-- employment data -->
<!-- //password -->
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

           if(currentpassword != "<?php echo $password; ?>") {
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
<!-- Profile -->
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
//post graduated
   function postgraduateCheck() {
    if (document.getElementById('postgraduateyes').checked) {
        document.getElementById('divpostgraduatey1').style.display = 'block';
        document.getElementById('divpostgraduatey2').style.display = 'block';


    }
    else if (document.getElementById('postgraduateno').checked) {
        document.getElementById('divpostgraduatey1').style.display = 'none';
        document.getElementById('divpostgraduatey2').style.display = 'none';

    }  


}
//presently employed
function employedcheck() {
    if (document.getElementById('employedyes').checked) {
        document.getElementById('divemployedy1').style.display = 'block';
        document.getElementById('divemployedy2').style.display = 'block';
        document.getElementById('divemployedy3').style.display = 'block';
        document.getElementById('divemployedy4').style.display = 'block';
        document.getElementById('divemployedy5').style.display = 'block';
        document.getElementById('divemployedn1').style.display = 'none';


    }
    else if (document.getElementById('employedno').checked) {
        document.getElementById('divemployedy1').style.display = 'none';
        document.getElementById('divemployedy2').style.display = 'none';
        document.getElementById('divemployedy3').style.display = 'none';
        document.getElementById('divemployedy4').style.display = 'none';
        document.getElementById('divemployedy5').style.display = 'none';
        document.getElementById('divemployedn1').style.display = 'block';
    }  


}
//firstjob
function firstjobcheck() {
    if (document.getElementById('firstjobyes').checked) {
        document.getElementById('divfirstjoby1').style.display = 'block';
        document.getElementById('divfirstjoby2').style.display = 'block';
        document.getElementById('divfirstjoby3').style.display = 'block';
        document.getElementById('divfirstjoby4').style.display = 'block';
        document.getElementById('divfirstjoby4y1').style.display = 'block';
        document.getElementById('divfirstjoby5').style.display = 'block';
        document.getElementById('divfirstjoby6').style.display = 'block';



    }
    else if (document.getElementById('firstjobno').checked) {
        document.getElementById('divfirstjoby1').style.display = 'none';
        document.getElementById('divfirstjoby2').style.display = 'none';
        document.getElementById('divfirstjoby3').style.display = 'none';
        document.getElementById('divfirstjoby4').style.display = 'none';
        document.getElementById('divfirstjoby4y1').style.display = 'none';
        document.getElementById('divfirstjoby5').style.display = 'none';
        document.getElementById('divfirstjoby6').style.display = 'none';

    }  


}
//firstjob yes 4
function firstjoby4check() {
    if (document.getElementById('firstjoby4yes').checked) {
        document.getElementById('divfirstjoby4y1').style.display = 'block';



    }
    else if (document.getElementById('firstjoby4no').checked) {
        document.getElementById('divfirstjoby4y1').style.display = 'none';

    }  


}
</script>

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
  .col-form-label{
    font-family: 'Open Sans'sans-serif;
    font-weight: 600 !important;
    font-size: 2.3vmin;
    color: #297fa7 !important;

}
.selectlabel{
    width:100%;
    display: inline-block;
    white-space: nowrap;
    font-size: 15px;
    font-family: "Segoe UI", Verdana, Helvetica, Sans-Serif;
    padding-top: 5px;
    padding-bottom: 5px;
}
.selectbutton{
    width:100%;
    display: inline-block;
    white-space: nowrap;
    font-size: 15px;
    font-family: "Segoe UI", Verdana, Helvetica, Sans-Serif;
    padding-top: 5px;
    padding-bottom: 5px;
}
.failed{
    color: Red;
    font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
    font-size: 2.2vmin;
}
.text-input{
   width: 100%;
   font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
   font-weight: 500;
   font-size: 2.3vmin;
   color: #383838;
   padding:5px;

}
</style>
<body>
    <div id="loading">
        <img id="loading-image" src="assets/img/loading.gif" alt="Loading..." />
    </div>


    <!-- ======= Header ======= -->
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
        <a class="nav-link  " href="jobpost.php">
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
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="jobpost.php">Home</a></li>
          <li class="breadcrumb-item active">Profile</li>
      </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">
    <div class="col-xl-4">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center" align="center">

          <img src="../graduatedimage/<?php echo $graduatedimage;?>" alt="Profile" class="rounded-circle" style='width: 130px;height: 130px;'>
          <h2 style="color:#000"><?php echo $firstname . " " .$middlename . " " . $lastname; ?></h2>
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

  
        <label><button onclick="myFunctionProfile()" style="border: none;" class="editprofile">Change Profile</button></label>
    </div>

    <form  action="profileserver.php" method="POST" enctype="multipart/form-data" id="profileForm" name="profileForm" onsubmit="return validateFormProfile()" style="display:none">
        <div style="width: 100%;margin-top: 20px;background-color: #fff;">
          <div style="width: 60%;background-color: transparent;float: left;">
            <input type="file" name="file" id="file" style="font-size: 13px;margin-left: 13px;color: #000;" accept="image/*" >
        </div>
        <div style="width: 40%;background-color: transparent;float: right;position: relative;padding-right: 10px;" align="right">
            <button type="submit" name="submitprofile" style="color: #000;font-size: 13px;">UPLOAD</button>
        </div>
    </div>

    <label id="fileErr" class="failed"></label>

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


<div class="card">
    <div class="card-body profile-card pt-1 d-flex flex-column " align="left">
        <div align="center"><h2 style="width:100%;color: #000;">Complete your profile</h2></div>

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
                <label style="transform:rotate(45deg);padding: 40px 50px 50px 25px;color: green;font-size: 30px;">25%</label>
            </div>
        </div>
    <?php }?>
    <?php if ($countpercentage == 2) { ?>
       <div style="width: 100%;" align="center">
        <div style=" width: 150px;height: 150px;border-radius: 150px;border: 10px solid green;border-right: 10px solid #C0C0C0;border-bottom: 10px solid #C0C0C0;-webkit-transform:rotate(-45deg);margin-top: 10px;">
            <label style="transform:rotate(45deg);padding: 40px 50px 50px 25px;color: green;font-size: 30px;">50%</label>
        </div>
    </div>
<?php }?>
<?php if ($countpercentage == 3) { ?>
    <div style="width: 100%;" align="center">
        <div style=" width: 150px;height: 150px;border-radius: 150px;border: 10px solid green;border-top-right: 10px solid white;border-bottom: 10px solid #C0C0C0;-webkit-transform:rotate(-45deg);margin-top: 10px;">
            <label style="transform:rotate(45deg);padding: 40px 50px 50px 25px;color: green;font-size: 30px;">75%</label>
        </div>
    </div>
<?php }?>
<?php if ($countpercentage == 4) { ?>
    <div style="width: 100%;" align="center">
     <div style=" width: 150px;height: 150px;border-radius: 150px;border: 10px solid green;border-right: 10px solid green;border-bottom: 10px solid green;-webkit-transform:rotate(-45deg);margin-top: 10px;">
        <label style="transform:rotate(45deg);padding: 50px 50px 50px 25px;color: green;font-size: 30px;">100%</label>
    </div>
</div>
<?php }?>



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
    <i class="fa fa-check" style="background-color: green;color: #fff;padding: 3px;border-radius: 10px;font-size:13px;"></i><label style="margin-left: 7px;font-size: 18px;color: #000;">General Information</label>
</div>
<div>
  <?php echo $advancestudystatus ?><label style="margin-left: 7px;font-size: 18px;color: #000;">Advance Study</label>
</div>
<div>
    <?php echo $firstjobstatus ?><label style="margin-left: 7px;font-size: 18px;color: #000;">First Job</label>
</div>
<div>
 <?php echo $employmentdatastatus ?><label style="margin-left: 7px;font-size: 18px;color: #000;">Employment Data</label>
</div>


</div>
</div>





</div>















<div class="col-xl-8">
    <script type="text/javascript">
      setTimeout(function() {
          document.getElementById('success-hidden').style.display = 'none';
      }, 3000);
  </script>
  <?php if(isset($_SESSION['success']) || isset($_SESSION['passwordsuccess']) || isset($_SESSION['profilesuccess'])) {?> 
    <div style="width:100%;margin-top: -10px;background-color: #11A400;color: #fff;"  align="center" id="success-hidden">

        <label style="font-size: 20px;padding: 5px 0px 5px 0px;">
            <?php  if(isset($_SESSION['success'])) {
              echo " PROFILE UPDATED!";
          }
          if(isset($_SESSION['passwordsuccess'])) {
              echo " PASSWORD UPDATED!";
          } 
          if(isset($_SESSION['profilesuccess'])) {
              echo " PROFILE UPDATED!";
          } 
          ?>  
      </label>

  </div>

  <?php 
}
unset($_SESSION['success']);
unset($_SESSION['passwordsuccess']);
unset($_SESSION['profilesuccess']);
?>
<div class="card">
    <div class="card-body pt-3">

      <!-- Bordered Tabs -->
      <ul class="nav nav-tabs nav-tabs-bordered">

        <li class="nav-item">
          <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
      </li>

      <li class="nav-item">
          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-info">General Info</button>
      </li>
      <li class="nav-item">
          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-study">Advance Study</button>
      </li>
      <li class="nav-item">
          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-firstjob">First Job</button>
      </li>
      <li class="nav-item">
          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-employment">Employment Data</button>
      </li>
      <li class="nav-item">
          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
      </li>

  </ul>
  <div class="tab-content pt-2">

    <div class="tab-pane fade show active profile-overview" id="profile-overview">
          <!--         <h5 class="card-title">About</h5>
              <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p> -->

              <h5 class="card-title"><img src="assets/img/generalinformation.png" style="height: 20px;width: 20px;margin-right: 5px;">General Information</h5>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">Course</div>
                <div class="col-lg-9 col-md-8"><?php echo $course ?></div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Year Graduated</div>
                <div class="col-lg-9 col-md-8"><?php echo $yeargrad ?></div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">ID Number</div>
                <div class="col-lg-9 col-md-8"><?php echo $idno ?></div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 label ">Full Name</div>
                <div class="col-lg-9 col-md-8"><?php echo $firstname . " " .$middlename . " " . $lastname; ?></div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-4 label">Gender</div>
                <div class="col-lg-9 col-md-8"><?php echo $gender ?></div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Birthday</div>
                <div class="col-lg-9 col-md-8"><?php echo $birthdate ?></div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Civil Status</div>
                <div class="col-lg-9 col-md-8"><?php echo $civilstatus ?></div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Contact</div>
                <div class="col-lg-9 col-md-8"><?php echo $contact ?></div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Email</div>
                <div class="col-lg-9 col-md-8"><?php echo $email ?></div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Skills</div>
                <div class="col-lg-9 col-md-8"><?php echo $specialization ?></div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Address</div>
                <div class="col-lg-9 col-md-8"><?php echo $street . " " . $barangay . " " . $city . " ".$province . " (" .$region ; ?> )</div>
            </div>
            <h5 class="card-title"><img src="assets/img/notification.png" style="height: 20px;width: 20px;margin-right: 5px;">Notification</h5>
            <div class="row">
              <div class="col-lg-12 col-md-12 label">Job Notification</div>
              <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $notificationstatus ?></div>
          </div>
          <div class="row">
              <div class="col-lg-12 col-md-12 label">News Notification</div>
              <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $newsnotificationstatus ?></div>
          </div>
          <div class="row">
              <div class="col-lg-12 col-md-12 label">Event Notification</div>
              <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $eventnotificationstatus ?></div>
          </div>

          <h5 class="card-title"  style="display:none;<?php if ($postgraduate != ""){echo "display: block";} ?>"><img src="assets/img/advancestudy.png" style="height: 20px;width: 20px;margin-right: 5px;">Advance Study</h5>
          <div class="row" style="display:none;<?php if ($postgraduate != ""){echo "display: block";} ?>">
              <div class="col-lg-12 col-md-12 label">Enrolled in Graduate or Post Graduate Studies?</div>
              <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $postgraduate ?></div>
          </div>

          <div style="display:none;<?php if ($postgraduate == "Yes"){echo "display: block";} ?>">
              <div class="row" >
                  <div class="col-lg-12 col-md-12 label">Current Status in graduate / post Graduate Studies?</div>
                  <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $postgraduatey1 ?></div>
              </div>
              <div class="row">
                  <div class="col-lg-12 col-md-12 label">What made you pursue advance studies?</div>
                  <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $postgraduatey2 ?></div>
              </div>
          </div>




          <h5 class="card-title" style="display:none;<?php if ($firstjob != ""){echo "display: block";} ?>"><img src="assets/img/jobtype.png" style="height: 20px;width: 20px;margin-right: 5px;">Firstjob</h5>
          <div class="row" style="display:none;<?php if ($firstjob != ""){echo "display: block";} ?>">
              <div class="col-lg-12 col-md-12 label">Do you have your first job after college?</div>
              <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $firstjob ?></div>
          </div>

          <div  style="display:none;<?php if ($firstjob == "Yes"){echo "display: block";} ?>">
              <div class="row">
                  <div class="col-lg-12 col-md-12 label">How did you find your first job?</div>
                  <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $firstjoby1 ?></div>
              </div>
              <div class="row">
                  <div class="col-lg-12 col-md-12 label">Reasons for accepting the first job?</div>
                  <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $firstjoby2 ?></div>
              </div>
              <div class="row">
                  <div class="col-lg-12 col-md-12 label">Level Position in your first job?</div>
                  <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $firstjoby3 ?></div>
              </div>
              <div class="row">
                  <div class="col-lg-12 col-md-12 label">Was the curriculum you had in college relevant to your first job?</div>
                  <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $firstjoby4 ?></div>
              </div>
              <div class="row" style="display:none;<?php if ($firstjoby4 == "Yes"){echo "display: block";} ?>">
                  <div class="col-lg-12 col-md-12 label">If yes, what competencies learned in college did you find very useful  in first job?</div>
                  <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $firstjoby4y1 ?></div>
              </div>
              <div class="row" >
                  <div class="col-lg-12 col-md-12 label">What is your initial gross monthly earning in your first job after college?</div>
                  <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $firstjoby5 ?></div>
              </div>
              <div class="row">
                  <div class="col-lg-12 col-md-12 label">How long did it take you to land your first job?</div>
                  <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $firstjoby6 ?></div>
              </div>
          </div>


          <h5 class="card-title" style="display:none;<?php if ($employed != ""){echo "display: block";} ?>"><img src="assets/img/employmentdata.png" style="height: 20px;width: 20px;margin-right: 5px;">Employment Data</h5>
          <div class="row" style="display:none;<?php if ($employed != ""){echo "display: block";} ?>">
              <div class="col-lg-12 col-md-12 label">Are you presently Employed?</div>
              <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $employed ?></div>
          </div>
          <div style="display:none;<?php if ($employed == "Yes"){echo "display: block";} ?>">
              <div class="row" >
                  <div class="col-lg-12 col-md-12 label">What is your present employment status?</div>
                  <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $employedy1 ?></div>
              </div>
              <div class="row">
                  <div class="col-lg-12 col-md-12 label">Place of work?</div>
                  <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $employedy2 ?></div>
              </div>
              <div class="row">
                  <div class="col-lg-12 col-md-12 label">Present Occupation</div>
                  <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $employedy3 ?></div>
              </div>
              <div class="row">
                  <div class="col-lg-12 col-md-12 label">What is the major line of business of the company you are employed in?</div>
                  <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $employedy4 ?></div>
              </div>
              <div class="row">
                  <div class="col-lg-12 col-md-12 label">Was the curriculum you had in college relevant to your present job?</div>
                  <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $employedy5 ?></div>
              </div>
          </div>

          <div class="row" style="display:none;<?php if ($employed == "No"){echo "display: block";} ?>">
              <div class="col-lg-12 col-md-12 label">Main reason why you are not yet employed?</div>
              <div class="col-lg-12 col-md-12" style="margin-left:10px">- <?php echo $employedn1 ?></div>
          </div>

      </div>

      <div class="tab-pane fade   profile-edit pt-3" id="profile-info">
          <h5 class="card-title">General Information</h5>
          <!-- Profile Edit Form -->
          <form action='profileserver.php' class='form' method="POST" name="contactForm" onsubmit="return validateForm()">
              <input type="hidden" name="course" value="<?php echo $course ?>">
              <input type="hidden" name="college" value="<?php echo $college ?>">
              <div class="row mb-3">
                  <label class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                  <div class="col-md-8 col-lg-9">
                    <div class="col-lg-9 col-md-8"><?php echo $firstname . " " .$middlename . " " . $lastname; ?></div>
                </div>
            </div>
            <div class="row mb-3">
              <label class="col-md-4 col-lg-3 col-form-label">Civil Status</label>
              <div class="col-md-8 col-lg-9">
                <select class="text-input" name="civilstatus"  style="width:100%;padding: 5px;">
                  <option disabled selected value="" >Select</option>
                  <option value="Single" <?php if ($civilstatus == "Single"){echo "selected";} ?>>Single</option>
                  <option value="Married" <?php if ($civilstatus == "Married"){echo "selected";} ?>>Married</option>
                  <option value="Separated" <?php if ($civilstatus == "Separated"){echo "selected";} ?>>Separated</option>
                  <option value="Single Parent" <?php if ($civilstatus == "Single Parent"){echo "selected";} ?>>Single Parent</option>
                  <option value="Widow/er" <?php if ($civilstatus == "Widow/er"){echo "selected";} ?>>Widow/er</option>
              </select>
              <label id="civilstatusErr" class="failed1"></label>
          </div>
      </div>
      <div class="row mb-3">
          <label  class="col-md-4 col-lg-3 col-form-label">Contact</label>
          <div class="col-md-8 col-lg-9">
            <input name="contact" type="text" class="form-control" id="contact" value="<?php echo $contact ?>">
            <label id="contactErr" class="failed1"></label>
        </div>
    </div>
    <div class="row mb-3">
      <label class="col-md-4 col-lg-3 col-form-label">Email</label>
      <div class="col-md-8 col-lg-9">
        <input name="email" type="text" class="form-control" id="email" value="<?php echo $email ?>">
        <label id="emailErr" class="failed1"></label>
    </div>
</div>
<script type="text/javascript">
    var options = document.getElementById('specialization').selectedOptions;
    var values = Array.from(options).map(({ value }) => value);
    console.log(values);
</script>

<div class="row ">
    <label class="col-md-4 col-lg-3 col-form-label">Skills</label>
    <div class="col-md-8 col-lg-9">                              
      <select  id='specialization' name="specialization[]" class="specialization" multiple>
          <option value='Accounting/Finance' <?php if (stripos($specialization, "Accounting/Finance") !== FALSE){echo "selected";} ?>>Accounting/Finance</option>
          <option value='Admin/Human Resources'<?php if (stripos($specialization, "Admin/Human Resources") !== FALSE){echo "selected";} ?>>Admin/Human Resources</option>
          <option value='Sales/Marketing'<?php if (stripos($specialization, "Sales/Marketing") !== FALSE){echo "selected";} ?>>Sales/Marketing</option>
          <option value='Arts/Media/Communications'<?php if (stripos($specialization, "Arts/Media/Communications") !== FALSE){echo "selected";} ?>>Arts/Media/Communications</option>
          <option value='Services'<?php if (stripos($specialization, "Services") !== FALSE){echo "selected";} ?>>Services</option>
          <option value='Hotel/Restaurant'<?php if (stripos($specialization, "Hotel/Restaurant") !== FALSE){echo "selected";} ?>>Hotel/Restaurant</option>
          <option value='Education/Training'<?php if (stripos($specialization, "Education/Training") !== FALSE){echo "selected";} ?>>Education/Training</option>
          <option value='Computer/Information Technology'<?php if (stripos($specialization, "Computer/Information Technology") !== FALSE){echo "selected";} ?>>Computer/Information Technology</option>
          <option value='Engineering'<?php if (stripos($specialization, "Engineering") !== FALSE){echo "selected";} ?>>Engineering</option>
          <option value='Manufacturing'<?php if (stripos($specialization, "Manufacturing") !== FALSE){echo "selected";} ?>>Manufacturing</option>
          <option value='Building/Construction'<?php if (stripos($specialization, "Building/Construction") !== FALSE){echo "selected";} ?>>Building/Construction</option>
          <option value='Sciences'<?php if (stripos($specialization, "Sciences") !== FALSE){echo "selected";} ?>>Sciences</option>
          <option value='Healthcare'<?php if (stripos($specialization, "Healthcare") !== FALSE){echo "selected";} ?>>Healthcare</option>
          <option value='Journalst/Editors'<?php if (stripos($specialization, "Journalst/Editors") !== FALSE){echo "selected";} ?>>Journalst/Editors</option>
          <option value='General Work'<?php if (stripos($specialization, "General Work") !== FALSE){echo "selected";} ?>>General Work</option>
          <option value='Publishing'<?php if (stripos($specialization, "Publishing") !== FALSE){echo "selected";} ?>>Publishing</option>
      </select>
      <label id="specializationErr" class="failed"></label>
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
<h5 class="card-title mt-5">Third Party Account</h5>
<div class="row mb-3">
   <label class="col-md-4 col-lg-3 col-form-label">Facebook Link</label>
   <div class="col-md-8 col-lg-9">
    <input name="facebook" type="url" class="form-control" id="facebook" value="<?php echo $facebook ?>">
</div>
</div>
<div class="row mb-3">
   <label class="col-md-4 col-lg-3 col-form-label">Instagram Link</label>
   <div class="col-md-8 col-lg-9">
    <input name="instagram" type="url" class="form-control" id="instagram" value="<?php echo $instagram ?>">
</div>
</div>
<div class="row mb-3">
   <label class="col-md-4 col-lg-3 col-form-label">Linked In Link</label>
   <div class="col-md-8 col-lg-9">
    <input name="linkedin" type="url" class="form-control" id="linkedin" value="<?php echo $linkedin ?>">
</div>
</div>
<h5 class="card-title">Notification Details</h5>
<div class="row mb-3">
  <label  class="col-md-4 col-lg-12 col-form-label">Do you want to Turn On the Notification for Jobs Avaliable?</label>
  <br>
  <div class="col-md-4 col-lg-12"> 
    <div class="toggleWrapper">
      <input type="checkbox" name="toggle1" value="" checked style="display: none;">
      <input type="checkbox" name="toggle1" class="mobileToggle" id="toggle1" value="Yes" <?php if ($notification == "Yes") {echo "Checked";} ?>>
      <label for="toggle1"></label>
  </div>
</div>
</div>




<div class="row mb-3">
  <label  class="col-md-4 col-lg-12 col-form-label">Do you want to Turn On the Notification for News?</label>
  <br>
  <div class="col-md-4 col-lg-12"> 
      <div class="toggleWrapper">
          <input type="checkbox" name="toggle2" value="" checked style="display: none;">
          <input type="checkbox" name="toggle2" class="mobileToggle" id="toggle2" value="Yes" <?php if ($newsnotification == "Yes") {echo "Checked";} ?>>
          <label for="toggle2"></label>
      </div>
  </div>
</div>
<div class="row mb-3">
  <label  class="col-md-4 col-lg-12 col-form-label">Do you want to Turn On the Notification for Events?</label>
  <br>
  <div class="col-md-4 col-lg-12"> 
      <div class="toggleWrapper">
          <input type="checkbox" name="toggle3" value="" checked style="display: none;">
          <input type="checkbox" name="toggle3" class="mobileToggle" id="toggle3" value="Yes" <?php if ($eventnotification == "Yes") {echo "Checked";} ?>>
          <label for="toggle3"></label>
      </div>
  </div>
</div>




<div class="text-center">
  <button type="submit" class="btn btn-primary" name="submit" style="margin-top: 20px;">Save Changes</button>
</div>
</form><!-- End Profile Edit Form -->

</div>

<!-- EDUCATIONAL ADVANCE STUDY START-->
<div class="tab-pane fade pt-3  " id="profile-study">
  <!-- Change Password Form -->
  <form method="POST" action="profileserver.php" name="advancestudyForm" onsubmit="return validateFormAdvanceStudy()">
    <h5 class="card-title">Advance Study</h5>
    <div class="row mb-3">
      <label  class="col-md-4 col-lg-12 col-form-label">Enrolled in graduate or post graduate studies.</label>
      <br>
      <div class="col-md-4 col-lg-12"> 
          <input type="radio" name="postgraduate" value="" checked style="display: none;">
          <input type="radio"  onclick="javascript:postgraduateCheck();" name="postgraduate"  id="postgraduateyes" value="Yes" style="margin-left: 5%;"<?php if ($postgraduate == "Yes") {echo "checked";} ?>><label style="margin-left:5px;margin-right: 20px;" class="selectlabel;">Yes</label>
          <input type="radio"  onclick="javascript:postgraduateCheck();" name="postgraduate" id="postgraduateno" value="No" <?php if ($postgraduate == "No") {echo "checked";} ?>><label style="margin-left:5px" class="selectlabel;" >No</label>
      </div>
      <label id="postgraduateErr" class="failed"></label>
  </div>


  <div class="row " id='divpostgraduatey1' style="display:none<?php if ($postgraduate == "Yes") {echo "display:block";} ?>">
      <label  class="col-md-4 col-lg-12 col-form-label">Current Status in graduate/ post Graduate Studies.</label>
      <br>
      <div class="col-md-4 col-lg-12"> 
          <select name="postgraduatey1" id="postgraduatey1" class="selectbutton selectlabel" >
            <option selected disabled value="" >Select</option>
            <option value="Doctoral Degree Holder" <?php if ($postgraduatey1 == "Doctoral Degree Holder") {echo "selected";} ?>>Doctoral Degree Holder</option>
            <option value="With Doctoral Degree units" <?php if ($postgraduatey1 == "With Doctoral Degree units") {echo "selected";} ?>>With Doctoral Degree units</option>
            <option value="Masteral Degree Holder" <?php if ($postgraduatey1 == "Masteral Degree Holder") {echo "selected";} ?>>Masteral Degree Holder</option>
            <option value="With Masteral Degree units" <?php if ($postgraduatey1 == "With Masteral Degree units") {echo "selected";} ?>>With Masteral Degree units</option>
        </select>
    </div>
    <label id="postgraduatey1Err" class="failed"></label>
</div>


<div class="row" id="divpostgraduatey2" style="display:none<?php if ($postgraduate == "Yes") {echo "display:block";} ?>">
  <label  class="col-md-4 col-lg-12 col-form-label">What made you pursue advance studies?</label>
  <br>
  <div class="col-md-4 col-lg-12"> 
      <select name="postgraduatey2" id="postgraduatey2" class="selectbutton">
        <option selected disabled value="">Select</option>
        <option value="For promotion" <?php if ($postgraduatey2 == "For promotion") {echo "selected";} ?>>For promotion</option>
        <option value="For professional Development"  <?php if ($postgraduatey2 == "For professional Development") {echo "selected";} ?>>For professional Development</option>
    </select>
</div>
<label id="postgraduatey2Err" class="failed"></label>
</div>
<div class="text-center">
  <button type="submit" class="btn btn-primary" name="submitadvancestudy" style="margin-top: 20px;">Save Changes</button>
</div>
</form>
</div>
<!-- EDUCATIONAL ADVANCE STUDY CLOSING -->

<!-- FIRSTJOB  START-->
<div class="tab-pane fade pt-3  " id="profile-firstjob">
  <!-- Change Password Form -->
  <form method="POST" action="profileserver.php" name="firstjobForm" onsubmit="return validateFormFirstJob()">
    <h5 class="card-title">First Job</h5>
    <div class="row mb-3">
      <label  class="col-md-4 col-lg-12 col-form-label">Do you have your first job after college?</label>
      <br>
      <div class="col-md-4 col-lg-12" > 
        <input type="radio" name="firstjob" value="" checked style="display: none;">
        <input type="radio"  onclick="javascript:firstjobcheck();" name="firstjob"  id="firstjobyes" value="Yes" style="margin-left:5%" <?php if ($firstjob == "Yes") {echo "checked";} ?>><label style="margin-left:5px;margin-right: 20px;" class="selectlabel;">Yes</label>
        <input type="radio"  onclick="javascript:firstjobcheck();" name="firstjob" id="firstjobno" value="No" <?php if ($firstjob == "No") {echo "checked";} ?>><label style="margin-left:5px" class="selectlabel;">No</label>
    </div>
    <label id="firstjobErr" class="failed"></label>
</div>

<div class="row" id="divfirstjoby1" style="display:none<?php if ($firstjob == "Yes") {echo "display:block";} ?>">
  <label  class="col-md-4 col-lg-12 col-form-label">How did you find your first job?</label>
  <br>
  <div class="col-md-4 col-lg-12"> 
      <select name="firstjoby1" id="firstjoby1" class="selectbutton">
        <option selected disabled value="">Select</option>
        <option value="Response to an advertisement"  <?php if ($firstjoby1 == "Response to an advertisement") {echo "selected";} ?>>Response to an advertisement</option>
        <option value="As walk-in applicant"  <?php if ($firstjoby1 == "As walk-in applicant") {echo "selected";} ?>>As walk-in applicant</option>
        <option value="Recommended by someone"  <?php if ($firstjoby1 == "Recommended by someone") {echo "selected";} ?>>Recommended by someone</option>
        <option value="Information from some friendes"  <?php if ($firstjoby1 == "Information from some friendes") {echo "selected";} ?>>Information from some friendes</option>
        <option value="Family Business"  <?php if ($firstjoby1 == "Family Business") {echo "selected";} ?>>Family Business</option>
        <option value="Job Fair/ Public Employment Service Office (PESO)"  <?php if ($firstjoby1 == "Job Fair/ Public Employment Service Office (PESO)") {echo "selected";} ?>>Job Fair/ Public Employment Service Office (PESO)</option>
    </select>
</div>
<label id="firstjoby1Err" class="failed"></label>
</div>

<script type="text/javascript">
    var options = document.getElementById('firstjoby2').selectedOptions;
    var values = Array.from(options).map(({ value }) => value);
    console.log(values);
</script>
<div class="row" id="divfirstjoby2" style="display:none<?php if ($firstjob == "Yes") {echo "display:block";} ?>">
  <label  class="col-md-4 col-lg-12 col-form-label">Reasons for accepting the first job</label>
  <br>
  <div class="col-md-4 col-lg-12" > 
      <select name="firstjoby2[]" id="firstjoby2" class="selectbutton" class="specialization" multiple style="width:10%">
        <option value="Salaries & Benifits" <?php if (stripos($firstjoby2, "Salaries & Benifits") !== FALSE){echo "selected";} ?>>Salaries & Benifits</option>
        <option value="Career Challenge" <?php if (stripos($firstjoby2, "Career Challenge") !== FALSE){echo "selected";} ?>>Career Challenge</option>
        <option value="Related to special skills" <?php if (stripos($firstjoby2, "Related to special skills") !== FALSE){echo "selected";} ?>>Related to special skills</option>
    </select>
</div>
<label id="firstjoby2Err" class="failed"></label>
</div>
<script>
  document.multiselect('#firstjoby2')
  .setCheckBoxClick("checkboxAll", function(target, args) {
      console.log("Checkbox 'Select All' was clicked and got value ", args.checked);
  })
  .setCheckBoxClick("1", function(target, args) {
      console.log("Checkbox for item with value '1' was clicked and got value ", args.checked);
  });

</script>
<div class="row" id="divfirstjoby3" style="display:none<?php if ($firstjob == "Yes") {echo "display:block";} ?>">
  <label  class="col-md-4 col-lg-12 col-form-label">Level Position in your first job</label>
  <br>
  <div class="col-md-4 col-lg-12"> 
      <select name="firstjoby3" id="firstjoby3" class="selectbutton">
        <option selected disabled value="">Select</option>
        <option value="Rank or Clerical" <?php if ($firstjoby3 == "Rank or Clerical") {echo "selected";} ?>>Rank or Clerical</option>
        <option value="Professional, Technical or Supervisory" <?php if ($firstjoby3 == "Professional, Technical or Supervisory") {echo "selected";} ?>>Professional, Technical or Supervisory</option>
        <option value="Managerial/ Executive" <?php if ($firstjoby3 == "Managerial/ Executive") {echo "selected";} ?>>Managerial/ Executive</option>
        <option value="Self-employed" <?php if ($firstjoby3 == "Self-employed") {echo "selected";} ?>>Self-employed</option>
    </select>
</div>
<label id="firstjoby3Err" class="failed"></label>
</div>

<div class="row"  id="divfirstjoby4" style="display:none<?php if ($firstjob == "Yes") {echo "display:block";} ?>">
  <label  class="col-md-4 col-lg-12 col-form-label">Was the curriculum you had in college relevant to your first job?</label>
  <br>
  <div class="col-md-4 col-lg-12" > 
    <input type="radio" name="firstjoby4" value="" checked style="display: none;">
    <input type="radio"  onclick="javascript:firstjoby4check();" name="firstjoby4"  id="firstjoby4yes" value="Yes" style="margin-left:5%" <?php if ($firstjoby4 == "Yes") {echo "checked";} ?>><label style="margin-left:5px;margin-right: 20px;" class="selectlabel;">Yes</label>
    <input type="radio"  onclick="javascript:firstjoby4check();" name="firstjoby4" id="firstjoby4no" value="No" <?php if ($firstjoby4 == "No") {echo "checked";} ?>><label style="margin-left:5px" class="selectlabel;">No</label>
</div>
<label id="firstjoby4Err" class="failed"></label>
</div>
<script type="text/javascript">
    var options = document.getElementById('firstjoby4y1').selectedOptions;
    var values = Array.from(options).map(({ value }) => value);
    console.log(values);
</script>
<div class="row" id="divfirstjoby4y1" style="display:none<?php if ($firstjoby4 == "Yes") {echo "display:block";} ?>">
  <label  class="col-md-4 col-lg-12 col-form-label">If yes, what competencies learned in college did you find very useful  in first job?</label>
  <br>
  <div class="col-md-4 col-lg-12" > 
      <select name="firstjoby4y1[]" id="firstjoby4y1" class="selectbutton" multiple>
        <option value="Communication Skills" <?php if (stripos($firstjoby4y1, "Communication Skills") !== FALSE){echo "selected";} ?>>Communication Skills</option>
        <option value="Human Relation Skills" <?php if (stripos($firstjoby4y1, "Human Relation Skills") !== FALSE){echo "selected";} ?>>Human Relation Skills</option>
        <option value="Entrepreneural Skills" <?php if (stripos($firstjoby4y1, "Entrepreneural Skills") !== FALSE){echo "selected";} ?>>Entrepreneural Skills</option>
        <option value="Information Technology Skills" <?php if (stripos($firstjoby4y1, "Information Technology Skills") !== FALSE){echo "selected";} ?>>Information Technology Skills</option>
        <option value="Problem-solving Skills" <?php if (stripos($firstjoby4y1, "Problem-solving Skills") !== FALSE){echo "selected";} ?>>Problem-solving Skills</option>
        <option value="Critical Thinking Skills" <?php if (stripos($firstjoby4y1, "Critical Thinking Skills") !== FALSE){echo "selected";} ?>>Critical Thinking Skills</option>
    </select>
</div>
<label id="firstjoby4y1Err" class="failed"></label>
</div>
<script>
  document.multiselect('#firstjoby4y1')
  .setCheckBoxClick("checkboxAll", function(target, args) {
      console.log("Checkbox 'Select All' was clicked and got value ", args.checked);
  })
  .setCheckBoxClick("1", function(target, args) {
      console.log("Checkbox for item with value '1' was clicked and got value ", args.checked);
  });

</script>


<div class="row" id="divfirstjoby5" style="display:none<?php if ($firstjob == "Yes") {echo "display:block";} ?>">
  <label  class="col-md-4 col-lg-12 col-form-label">What is your initial gross monthly earning in your first job after college?</label>
  <br>
  <div class="col-md-4 col-lg-12"> 
      <select name="firstjoby5" id="firstjoby5" class="selectbutton">
        <option selected disabled value="">Select</option>
        <option value="Below P5,000.00" <?php if ($firstjoby5 == "Below P5,000.00") {echo "selected";} ?>>Below P5,000.00</option>
        <option value="P5.000.00 to less than P10,000.00" <?php if ($firstjoby5 == "P5.000.00 to less than P10,000.00") {echo "selected";} ?>>P5,000.00 to less than P10,000.00</option>
        <option value="P10,000.00 to less than P15,000.00" <?php if ($firstjoby5 == "P10,000.00 to less than P15,000.00") {echo "selected";} ?>>P10,000.00 to less than P15,000.00</option>
        <option value="P15.000.00 to less than P20,000.00" <?php if ($firstjoby5 == "P15.000.00 to less than P20,000.00") {echo "selected";} ?>>P15,000.00 to less than P20,000.00</option>
        <option value="P20,000.00 to less than P25,000.00" <?php if ($firstjoby5 == "P20,000.00 to less than P25,000.00") {echo "selected";} ?>>P20,000.00 to less than P25,000.00</option>
        <option value="P25,000.00 and above" <?php if ($firstjoby5 == "P25,000.00 and above") {echo "selected";} ?>>P25,000.00 and above</option>

    </select>
</div>
<label id="firstjoby5Err" class="failed"></label>
</div>




<div class="row" id="divfirstjoby6"  style="display:none<?php if ($firstjob == "Yes") {echo "display:block";} ?>">
  <label  class="col-md-4 col-lg-12 col-form-label">How long did it take you to land your first job?</label>
  <br>
  <div class="col-md-4 col-lg-12"> 
      <select name="firstjoby6" id="firstjoby6" class="selectbutton">
        <option selected disabled value="">Select</option>
        <option value="1 to 6 months"<?php if ($firstjoby6 == "1 to 6 months") {echo "selected";} ?>>1 to 6 months</option>
        <option value="7 to 11 months"<?php if ($firstjoby6 == "7 to 11 months") {echo "selected";} ?>>7 to 11 months</option>
        <option value="1 year to less than 2 years"<?php if ($firstjoby6 == "1 year to less than 2 years") {echo "selected";} ?>>1 year to less than 2 years</option>
        <option value="2 years to less than 3 years"<?php if ($firstjoby6 == "2 years to less than 3 years") {echo "2 years to less than 3 years";} ?>>2 years to less than 3 years</option>
        <option value="3 years to less than 4 years"<?php if ($firstjoby6 == "3 years to less than 4 years") {echo "selected";} ?>>3 years to less than 4 years</option>
        <option value="4 years above"<?php if ($firstjoby6 == "4 years above") {echo "selected";} ?>>4 years above</option>

    </select>
</div>
<label id="firstjoby6Err" class="failed"></label>
</div>





<div class="text-center">
    <button type="submit" class="btn btn-primary" name="submitfirstjob" style="margin-top: 20px;">Save Changes</button>
</div>
</form>

</div>
<!-- FIRSTJOB  CLOSING -->
<!-- EDUCATIONAL EMPLOYMENT DATA START-->
<div class="tab-pane fade pt-3  " id="profile-employment">
  <!-- Change Password Form -->
  <h5 class="card-title">Employment Data</h5>
  <form method="POST" action="profileserver.php"  name="employmentForm" onsubmit="return validateFormEmployment()">
    <div class="row mb-3">
      <label  class="col-md-4 col-lg-12 col-form-label">Are you presently Employed?</label>
      <br>
      <div class="col-md-4 col-lg-12"> 
        <input type="radio" name="employed" value="" checked style="display: none;">
        <input type="radio"  onclick="javascript:employedcheck();" name="employed"  id="employedyes" value="Yes" style="margin-left:5%" <?php if ($employed == "Yes") {echo "checked";} ?>><label style="margin-left:5px;margin-right: 20px;" class="selectlabel;">Yes</label>
        <input type="radio"  onclick="javascript:employedcheck();" name="employed" id="employedno" value="No" <?php if ($employed == "No") {echo "checked";} ?>><label style="margin-left:5px" class="selectlabel;">No</label>
    </div>
    <label id="employedErr" class="failed"></label>
</div>

<div class="row" id="divemployedy1" style="display:none <?php if ($employed == "Yes") {echo "display:block";} ?>">
  <label  class="col-md-4 col-lg-12 col-form-label">What is your present employment status?</label>
  <br>
  <div class="col-md-4 col-lg-12"> 
      <select name="employedy1" id="employedy1" class="selectbutton">
        <option selected disabled value="">Select</option>
        <option value="Regular" <?php if ($employedy1 == "Regular") {echo "selected";} ?>>Regular</option>
        <option value="Temporary" <?php if ($employedy1 == "Temporary") {echo "selected";} ?>>Temporary</option>
        <option value="Casual" <?php if ($employedy1 == "Casual") {echo "selected";} ?>>Casual</option>
        <option value="Contractual" <?php if ($employedy1 == "Contractual") {echo "selected";} ?>>Contractual</option>
        <option value="Self-employed" <?php if ($employedy1 == "Self-employed") {echo "selected";} ?>>Self-employed</option>
    </select>
</div>

<label id="employedy1Err" class="failed"></label>
</div>
<div class="row" id="divemployedy2" style="display:none<?php if ($employed == "Yes") {echo "display:block";} ?>">
  <label  class="col-md-4 col-lg-12 col-form-label">Place of work</label>
  <br>
  <div class="col-md-4 col-lg-12"> 
      <select name="employedy2" id="employedy2" class="selectbutton">
        <option selected disabled value="">Select</option>
        <option value="Local" <?php if ($employedy2 == "Local") {echo "selected";} ?>>Local</option>
        <option value="Abroad" <?php if ($employedy2 == "Abroad") {echo "selected";} ?>>Abroad</option>
    </select>
</div>
<label id="employedy2Err" class="failed"></label>
</div>

<div class="row" id="divemployedy3" style="display:none<?php if ($employed == "Yes") {echo "display:block";} ?>">
  <label  class="col-md-4 col-lg-12 col-form-label">Present Occupation</label>
  <br>
  <div class="col-md-4 col-lg-12"> 
      <select name="employedy3" id="employedy3" class="selectbutton">
        <option selected disabled value="">Select</option>
        <option value="Accountant" <?php if ($employedy3 == "Accountant") {echo "selected";} ?>>Accountant</option>
        <option value="Caregiver" <?php if ($employedy3 == "Caregiver") {echo "selected";} ?>>Caregiver</option>
        <option value="Cashier" <?php if ($employedy3 == "Cashier") {echo "selected";} ?>>Cashier</option>
        <option value="Doctor/Nurse/Midwife" <?php if ($employedy3 == "Doctor/Nurse/Midwife") {echo "selected";} ?>>Doctor/Nurse/Midwife</option>
        <option value="Driver" <?php if ($employedy3 == "Driver") {echo "selected";} ?>>Driver</option>
        <option value="Engineer/Architect" <?php if ($employedy3 == "Engineer/Architect") {echo "selected";} ?>>Engineer/Architect</option>
        <option value="Entrepreneur" <?php if ($employedy3 == "Entrepreneur") {echo "selected";} ?>>Entrepreneur</option>
        <option value="Fireman" <?php if ($employedy3 == "Fireman") {echo "selected";} ?>>Fireman</option>
        <option value="Flight Attendant"<?php if ($employedy3 == "Flight Attendant") {echo "selected";} ?>>Flight Attendant</option>
        <option value="Hair & Make-up Artist"<?php if ($employedy3 == "Hair & Make-up Artist") {echo "selected";} ?>>Hair & Make-up Artist</option>
        <option value="Lawyer" <?php if ($employedy3 == "Lawyer") {echo "selected";} ?>>Lawyer</option>
        <option value="Media" <?php if ($employedy3 == "Mediav") {echo "selected";} ?>>Media</option>
        <option value="Pharmacist" <?php if ($employedy3 == "Pharmacist") {echo "selected";} ?>>Pharmacist</option> 
        <option value="Police/Military" <?php if ($employedy3 == "Police/Military") {echo "selected";} ?>>Police/Military</option>
        <option value="Seaman" <?php if ($employedy3 == "Seaman") {echo "selected";} ?>>Seaman</option>
        <option value="Social Worker" <?php if ($employedy3 == "Social Worker") {echo "selected";} ?>>Social Worker</option>
        <option value="Software Developer" <?php if ($employedy3 == "Software Developer") {echo "selected";} ?>>Software Developer</option>
        <option value="Teacher" <?php if ($employedy3 == "Teacher") {echo "selected";} ?>>Teacher</option>
        <option value="Technician" <?php if ($employedy3 == "Technician") {echo "selected";} ?>>Technician</option>
        <option value="Waiter/Bartender/Baker" <?php if ($employedy3 == "Waiter/Bartender/Baker") {echo "selected";} ?>>Waiter/Bartender/Baker</option>
    </select>
</div>
<label id="employedy3Err" class="failed"></label>
</div>

<div class="row" id="divemployedy4" style="display:none<?php if ($employed == "Yes") {echo "display:block";} ?>">
  <label  class="col-md-4 col-lg-12 col-form-label">What is the major line of business of the company you are employed in?</label>
  <br>
  <div class="col-md-4 col-lg-12" > 
      <select name="employedy4" id="employedy4" class="selectbutton">
        <option selected disabled value="">Select</option>
        <option value="Agriculture, Hunting & Forestry" <?php if ($employedy4 == "Agriculture, Hunting & Forestry") {echo "selected";} ?>>Agriculture, Hunting & Forestry</option>
        <option value="Construction" <?php if ($employedy4 == "Construction") {echo "selected";} ?>>Construction</option>
        <option value="Education" <?php if ($employedy4 == "Education") {echo "selected";} ?>>Education</option>
        <option value="Electricty, Gas, & Water Supply" <?php if ($employedy4 == "Electricty, Gas, & Water Supply") {echo "selected";} ?>>Electricty, Gas, & Water Supply</option>
        <option value="Extra-Territorial Organizations & Bodies" <?php if ($employedy4 == "Extra-Territorial Organizations & Bodies") {echo "selected";} ?>>Extra-Territorial Organizations & Bodies</option>
        <option value="Financial INtermidiation" <?php if ($employedy4 == "Financial INtermidiation") {echo "selected";} ?>>Financial INtermidiation</option>
        <option value="Fishing" <?php if ($employedy4 == "Fishing") {echo "selected";} ?>>Fishing</option>
        <option value="Health & Social Works" <?php if ($employedy4 == "Health & Social Works") {echo "selected";} ?>>Health & Social Works</option>
        <option value="Hotels & Restaurants" <?php if ($employedy4 == "Hotels & Restaurants") {echo "selected";} ?>>Hotels & Restaurants</option>
        <option value="Manufacturing" <?php if ($employedy4 == "Manufacturing") {echo "selected";} ?>>Manufacturing</option>
        <option value="Mining & Quarrying" <?php if ($employedy4 == "Mining & Quarrying") {echo "selected";} ?>>Mining & Quarrying</option>
        <option value="Other Community, Social & Personal Service Activities" <?php if ($employedy4 == "Other Community, Social & Personal Service Activities") {echo "selected";} ?>>Other Community, Social & Personal Service Activities</option>
        <option value="Private Household with Employed Persons" <?php if ($employedy4 == "Private Household with Employed Persons") {echo "selected";} ?>>Private Household with Employed Persons</option>
        <option value="Public Administration & Defense; Compulsory Social Security" <?php if ($employedy4 == "Public Administration & Defense; Compulsory Social Security") {echo "selected";} ?>>Public Administration & Defense; Compulsory Social Security</option>
        <option value="Real State, Renting and Business Activities" <?php if ($employedy4 == "Real State, Renting and Business Activities") {echo "selected";} ?>>Real State, Renting and Business Activities</option>
        <option value="Transport Storage & Communication" <?php if ($employedy4 == "Transport Storage & Communication") {echo "selected";} ?>>Transport Storage & Communication</option>

        <option value="Wholesale & Retail Trade, Repair of motor vehicles, motorcycles & personal household goods" <?php if ($employedy4 == "Wholesale & Retail Trade, Repair of motor vehicles, motorcycles & personal household goods") {echo "selected";} ?>>Wholesale & Retail Trade, Repair of motor vehicles, motorcycles&
        personal household goods</option>
    </select>
</div>
<label id="employedy4Err" class="failed"></label>
</div>
<div class="row mb-3" id="divemployedy5" style="display:none<?php if ($employed == "Yes") {echo "display:block";} ?>">
  <label  class="col-md-4 col-lg-12 col-form-label">Was the curriculum you had in college relevant to your present job?</label>
  <br>
  <div class="col-md-4 col-lg-12"> 
      <input type="radio"  name="employedy5"  id="employedy5" value="Yes" style="margin-left: 5%;" <?php if ($employedy5 == "Yes") {echo "Checked";} ?>><label style="margin-left:5px;margin-right: 20px;" class="selectlabel;" >Yes</label>
      <input type="radio"  name="employedy5"  id="employedy5" value="No" style="margin-left:5px" class="selectlabel;" <?php if ($employedy5 == "No") {echo "Checked";} ?>><label style="margin-left:5px;margin-right: 20px;" class="selectlabel;" >No</label>
  </div>
  <label id="employedy5Err" class="failed"></label>
</div>

<div class="row" id="divemployedn1" style="display:none<?php if ($employed == "No") {echo "display:block";} ?>">
  <label  class="col-md-4 col-lg-12 col-form-label">Main reason why you are not yet employed</label>
  <br>
  <div class="col-md-4 col-lg-12"> 
      <select name="employedn1" id="employedn1" class="selectbutton">
        <option selected disabled value="">Select</option>
        <option value="Advance or further study"  <?php if ($employedn1 == "Advance or further study") {echo "selected";} ?>>Advance or further study</option>
        <option value="Family concern & decided not to find a job" <?php if ($employedn1 == "Family concern & decided not to find a job") {echo "selected";} ?>>Family concern & decided not to find a job</option>
        <option value="Health-related reason(s)" <?php if ($employedn1 == "Health-related reason(s)") {echo "selected";} ?>>Health-related reason(s)</option>
        <option value="Lack of work experience" <?php if ($employedn1 == "Lack of work experience") {echo "selected";} ?>>Lack of work experience</option>
        <option value="No job opportunity" <?php if ($employedn1 == "No job opportunity") {echo "selected";} ?>>No job opportunity</option>
        <option value="Did not look for a job" <?php if ($employedn1 == "Did not look for a job") {echo "selected";} ?>>Did not look for a job</option>
    </select>
</div>
<label id="employedn1Err" class="failed"></label>
</div>
<div class="text-center">
  <button type="submit" class="btn btn-primary" name="submitemployment" style="margin-top: 20px;">Save Changes</button>
</div>
</form>
</div>
<!-- EMPLOYMENT DATA CLOSING -->
<!-- Password  start-->
<div class="tab-pane fade pt-3  " id="profile-change-password">
  <!-- Change Password Form -->
  <form method="POST" action="profileserver.php" name="passwordForm" onsubmit="return validateFormPassword()">

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
<!-- closing password -->


</div><!-- End Bordered Tabs -->

</div>
</div>

</div>
</div>
</div>
</section>

</main><!-- End #main -->



<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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

