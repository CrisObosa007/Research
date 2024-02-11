<?php 
session_start();
include '../dbhelper.php';


if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
  //USERNAME LOGIN
  $username = $_SESSION['username'];
  if ($username == "admin") {
    $course = 'Admin';

      if (isset($_POST['editbutton'])) {
          $_SESSION['eventid'] = $_POST['eventid'];
      }


      if (isset($_SESSION['eventid'])) {
          $eventid = $_SESSION['eventid'];
          $sql = "SELECT * FROM event WHERE eventid='$eventid'";
          $result = mysqli_query($conn,$sql);
          $row = mysqli_fetch_array($result);
          $eventdetail = $row['eventdetail'];
          $description = $row['description'];
          $eventimage = $row['eventimage'];
          $startdate = $row['startdate'];
          $enddate = $row['enddate'];
          $starttime = $row['starttime'];
          $endtime = $row['endtime'];
          $address = $row['address'];
          $venue = $row['venue'];
          $organizer = $row['organizer'];
          $sponsor = $row['sponsor'];

           $eventcollege = $row['eventcollege'];


               $newsimagesplit = "";
      $newsimage = $row['eventimage'];  
      $spesplit4 = explode(', ', $newsimage);  
      for($i=0; $i<sizeof($spesplit4); $i++){
        if ($spesplit4[$i] != "") {
          $newsimagesplit .= "  <div class='image'> <img src='../../uploadimage/".$spesplit4[$i]."'></div>";
        }


      }

          $listorganizer = "";
          $spesplit = explode(',,,', $organizer);  
          for($i=1; $i<sizeof($spesplit); $i++){
              $listorganizer .= "
              <div class='d-flex align-items-cente p-2' style='background-color: #fff;color: #000;''>
              <input type='text' name='organizer[]'  placeholder='Organizer' class='labelinputplus' value='".$spesplit[$i]."'>
              <button type='button' class='btn addmore'>+</button>
              <button type='button' class='remove btn btn-danger removemore'>-</button>    
              </div>";
          }

          $i = 0;
          $listsponsor = "";
          $spesplit2 = explode(',,,', $sponsor);  
          for($i=1; $i<sizeof($spesplit2); $i++){
              $listsponsor .= "
              <div class='d-flex align-items-cente p-2' style='background-color: #fff;color: #000;''>
              <input type='text' name='sponsors[]'  placeholder='Sponsor' class='labelinputplus' value='".$spesplit2[$i]."'>
              <button type='button' class='btn2 addmore2'>+</button>
              <button type='button' class='remove2 btn2 btn-danger2 removemore2'>-</button>    
              </div>";
          }


      }

      ?>




















      <!DOCTYPE html>
      <html lang="en">
      <style type="text/css">


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
       overflow: auto;   
   }
   .containerselectgrad01{
      width: 60%;
      margin-left: 20%;
      margin-right: 20%;
      border-radius: 10px;
      color: rgb(1,82,73);
      margin-top : 50px;
      z-index: 10001;
      font-weight: 700;
      text-align: center;
      padding-bottom: 10px; 
      height: auto; 
      margin-bottom: 20px;
      text-align: left;
      background: #fff;  
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
  margin-top : 50px;
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

@media only screen and (max-width: 1200px) {
  .container-success01{
      width: 70%;
      margin-left: 15%;
      margin-right: 15%;
  }
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
  font-size: 15px;
}
.labelpreview01{
    font-size: 1.6vmin;
    float: left;
    color: #000;
    text-align: left;
    padding:  2px 10px 2px 10px;
    font-weight: 600;
    font-family: Roboto, "Helvetica Neue", HelveticaNeue, Helvetica, Arial, sans-serif;
}
.outputpreview01{
    font-size: 2vmin;
    font-weight: 500;
    float: left;
    color: #000 ;
    text-align: left;
    font-family: Roboto, "Helvetica Neue", HelveticaNeue, Helvetica, Arial, sans-serif;
    background-color: transparent;
    border: none;
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
.addevents{
 margin-top: 15px;
 font-size: 15px;
 background-color: #0c506f;
 color: #fff;
 padding: 5px 10px 5px 10px;
}
.addevents:hover{
  transform: translate(0, -3px);
}
.editsubmit:hover{
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
    width: 12% ;
}
.description_mobile2 {
   width: 88% ;
   text-align:justify;
}
@media only screen and (max-width: 800px) {
  .description_mobile1 {
    width: 25% ;
}
.description_mobile2 {
   width: 75% ;
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
         <link href="multiselect.css?v=<?php echo time();?>" rel="stylesheet"/>
  <script src="multiselect.min.js?v=<?php echo time();?>"></script>
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

    <title>Event Upload</title>
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

        var eventdetail = document.contactForm.eventdetail.value;
        var eventday = document.contactForm.eventday.value;
        var startdate = document.contactForm.startdate.value;
        var daterange = document.contactForm.daterange.value;
        var starttime = document.contactForm.starttime.value;
        var endtime = document.contactForm.endtime.value;
        var venue = document.contactForm.venue.value;
        var address = document.contactForm.address.value;
        var description = document.contactForm.description.value;
        var organizer = document.getElementsByName('organizer[]');
        var k;

        for (var i = 0; i < organizer.length; i++) {
            var a = organizer[i];
            var b;
            b = b + a.value ;
            if (b != "") {
                k = k + a.value + "<br>• ";
                b = "";
            }
        }

        if (organizer == "undefined<br>• ") {
          var organizer = "";
      }else{
       var organizer = k.substring(15);



   }


   var sponsors = document.getElementsByName('sponsors[]');
   var kk;

   for (var ii = 0; ii < sponsors.length; ii++) {
    var aa = sponsors[ii];
    var bb;
    bb = bb + aa.value ;
    if (bb != "") {
        kk = kk + aa.value + "<br>• ";
        bb = "";
    }
}

if (sponsors == "undefined<br>• ") {
  var sponsors = "";
}else{
   var sponsors = kk.substring(15);
}









var file = document.contactForm.file.value;
var review = document.contactForm.review.value;


var eventcoursevalue = [];
$.each($(".eventcourse option:selected"), function(){            
    eventcoursevalue.push($(this).val());
});
eventcourse = eventcoursevalue.join("<br> • ");



var eventcourseErr = eventdetailErr = eventdayErr =startdateErr = starttimeErr  = endtimeErr = venueErr = addressErr = descriptionErr   = organizerErr = sponsorsErr = fileErr = true;

if(eventcourse == "") {
    printError("eventcourseErr", "Enter Course");
} else {
    printError("eventcourseErr", "");
    eventcourseErr = false;
}


if(eventdetail == "") {
    printError("eventdetailErr", "Enter Event Title");
} else {
    printError("eventdetailErr", "");
    eventdetailErr = false;
}
if(eventday == "") {
    printError("eventdayErr", "Select Event Day/s");
    document.getElementById('eventdayErr').style.display = 'block';
} else {
    printError("eventdayErr", "");
     document.getElementById('eventdayErr').style.display = 'none';
    eventdayErr = false;
}
    //
if (eventday == "1") {
   if(startdate == "") {
    printError("startdateErr", "Select Starting Date");
} else {
    printError("startdateErr", "");
    startdateErr = false;
}
}else{
    printError("startdateErr", "");
    startdateErr = false;
}

    //
if(starttime == "") {
    printError("starttimeErr", "Select Starting time");
} else {
    printError("starttimeErr", "");
    starttimeErr = false;
}
    //
if(endtime == "") {
    printError("endtimeErr", "Select End Time");
} else {
    printError("endtimeErr", "");
    endtimeErr = false;
}
    //
if(venue == "") {
    printError("venueErr", "Enter Venue");
} else {
    printError("venueErr", "");
    venueErr = false;
}
    //
if(address == "") {
    printError("addressErr", "Enter Address");
} else {
    printError("addressErr", "");
    addressErr = false;
}
    //
if(description == "") {
    printError("descriptionErr", "Enter Description");
} else {
    printError("descriptionErr", "");
    descriptionErr = false;
}
    //


if(organizer == "") {
    printError("organizerErr", "Enter Organizer");
} else {
    printError("organizerErr", "");
    organizerErr = false;
}
    //
if(sponsors == "") {
    printError("sponsorsErr", "Enter Sponsor");
} else {
    printError("sponsorsErr", "");
    sponsorsErr = false;
}
    //
  printError("fileErr", "");
  fileErr = false;




if((eventcourseErr || eventdetailErr || eventdayErr ||startdateErr || starttimeErr || endtimeErr || venueErr || addressErr || descriptionErr  || organizerErr || sponsorsErr || fileErr) == true) {
   return false;
} else {
    if (review == "1") {
    }
    if (review == "") {

       printError("eventcourseInfo",eventcourse);
       eventcourse = " • " + eventcourse;
       printError("eventcourseInfo",eventcourse);
       eventcourse = "• " + eventcourse;

       starttime = moment(starttime, ["HH.mm"]).format("hh:mm a");
       endtime = moment(endtime, ["HH.mm"]).format("hh:mm a");
       startdate = startdate + " (" + starttime + " to " + endtime + ")" ;
       printError("scheduleInfo",startdate);

       if (eventday != "1") {
        startdate = daterange + " (" + starttime + " to " + endtime + ")" ;
        printError("scheduleInfo",startdate);
    }

    printError("eventdetailInfo",eventdetail);
    printError("venueInfo",venue);
    printError("addressInfo",address);
    printError("descriptionInfo",description);
    organizer = "• " + organizer;
    organizer = organizer.slice(0, -2);
    printError("organizerInfo",organizer);
    sponsors = "• " + sponsors;
    sponsors = sponsors.slice(0, -2);
    printError("sponsorsInfo",sponsors);
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
<?php if(isset($_SESSION['adminditeventsuccess'])) {?>
    <div id="undo-hidden">
      <input type="checkbox" id="tableundo"><label for="tableundo"  class=""></label>
      <div class="container-undo1">
          <div class="container-undo01" align="center">

            <label class="title_info">
                <img src="../assets/img/success.gif" style="width: 40%;height: 40%;" />
                <br>
                <label style="font-size: 2em;margin-top: 20px;">EVENT UPDATED!</label>
            </label><br>
        </div>
    </div>
    <?php echo" <style>#tableundo:checked ~ .container-undo1{display: block;}</style>";?> 
</div> 

<?php 
}
unset($_SESSION['adminditeventsuccess']);
?>









 <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">





   <?php if(isset($_SESSION['canceledadminnewssucess'])) {?>
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
unset($_SESSION['canceledadminnewssucess']);
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
      <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse" style="background-color: #297FA7;">
        <i class="fa fa-newspaper-o"></i><span >News & Events</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav22" class="nav-content  " data-bs-parent="#sidebar-nav">
        <li>
          <a href="news.php">
            <i class="bi bi-circle"></i><span >News</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bi bi-circle"></i><span style="color:#ADADAD" >Events</span>
          </a>
        </li>
      </ul>
    </li><!-- End Components Nav -->
              <li style="color: #B5B5B5;margin-left: 10px;padding: 7px;font-size: 13px;">
          <span>Activity Log</span>
      </li>
    <li class="nav-item">

      <a class="nav-link collapsed" data-bs-target="#components-nav5" data-bs-toggle="collapse" >
        <i class="fa fa-history"></i><span>Activity Log</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav5" class="nav-content  collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="../activitylog/record.php">
            <i class="bi bi-circle"></i><span>Activity Log</span>
          </a>
        </li>

      </ul>
    </li><!-- End Components Nav --> 
  </aside><!-- End Sidebar-->


<form action="editeventserver.php" method="POST" name="contactForm" onsubmit="return validateForm()" id="formulario"  enctype="multipart/form-data">
  <input type="text" name="eventid" value="<?php echo $eventid ?>">
  <input type="text" name="college" value="<?php echo $college ?>" style='display: none;'>
 <main id="main" class="main">


    <div id="success-hidden"  style="display: none;">
      <input type="checkbox" id="tablesuccess"><label for="tablesuccess"  class=""></label>
      <div class="container-success1" id="successtransition" >
          <div class="container-success01">

              <div class="row">
                  <div class="col-xxl-12  col-md-12" style="margin-top: 20px;" align="center">
                    <h2 style="font-weight: 800;font-size: 3vmin;color: #0c506f;background-color;border-bottom:solid 2px #0c506f;padding-bottom: 20px;">EVENT INFORMATION</h2>
                </div>

                <div class="col-xxl-12 col-xl-12 col-md-12 col-12" style="margin-top: 5px;">
  <div class="d-flex align-items-cente p-2" style="background-color:white;width: 100%;">
      <div class="align-items-center ">
          <label class='labelpreview01'>College Name :</label>
          <label id="eventcourseInfo" class="outputpreview01"></label>
      </div>              
  </div>
</div>
                <div class="col-xxl-5 col-xl-5 col-md-5 col-12" style="margin-top: 10px;" >
                   <div class="d-flex align-items-cente p-2" style="background-color:white">
                    <label class='labelpreview01'>Event Title :</label>   
                    <label id="eventdetailInfo" class="outputpreview01"></label>   
                </div>
            </div>



        <div class="col-xxl-7 col-xl-7 col-md-7 col-12" style="margin-top: 5px;">
      <div class="d-flex align-items-cente p-2" style="background-color:white">
          <div class="align-items-center">
             <label class='labelpreview01'>Schedule :</label>
             <label id="scheduleInfo" class="outputpreview01"></label>

         </div>              
     </div>
 </div>


<div class="col-xxl-12 col-xl-12 col-md-12 col-12" style="margin-top: 5px;">
  <div class="d-flex align-items-cente p-2" style="background-color:white;width: 100%;">
      <div class="align-items-center ">
          <label class='labelpreview01'>Description</label>
          <label id="descriptionInfo" class="outputpreview01"></label>
      </div>              
  </div>
</div>




 <div class="col-xxl-6 col-xl-6 col-md-6 col-12" style="margin-top: 5px;">
  <div class="d-flex align-items-cente p-2" style="background-color:white">
      <div class="align-items-center">
         <label class='labelpreview01'>Address :</label>
         <label id="addressInfo" class="outputpreview01"></label>
     </div>              
 </div>
</div>


<div class="col-xxl-6 col-xl-6 col-md-6 col-12" style="margin-top: 5px;">
  <div class="d-flex align-items-cente p-2" style="background-color:white">
      <div class="align-items-center">
        <label class='labelpreview01'>Venue :</label>
         <label id="venueInfo" class="outputpreview01"></label>
     </div>              
 </div>
</div>


<div class="col-xxl-6 col-xl-6 col-md-6 col-12" style="margin-top: 5px;">
  <div class="d-flex align-items-cente p-2" style="background-color:white">
      <div class="align-items-center">
         <label class='labelpreview01'>Organizer</label>
         <br>
         <label id="organizerInfo" class="outputpreview01"  style="padding-left: 20px;"></label>
     </div>              
 </div>
</div>


<div class="col-xxl-6 col-xl-6 col-md-6 col-12" style="margin-top: 5px;">
  <div class="d-flex align-items-cente p-2" style="background-color:white">
      <div class="align-items-center">
         <label class='labelpreview01'>Sponsor</label>
         <br>
         <label id="sponsorsInfo" class="outputpreview01" style="padding-left: 20px;"></label>
     </div>              
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
          <div class="col-xxl-5 col-md-5">
              <h1>Event</h1>
              <nav>
                <ol class="breadcrumb" >
                  <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
                  <li class="breadcrumb-item active">Event Upload</li>
              </ol>
          </nav>
      </div><!-- End Page Title -->
      <div class="col-xxl-7 col-md-7" align="right">
        <a href="events.php"><label class="addevents">Event List</label></a>
    </div>


</div>
</div>
</div>



<div class="col-xxl-6 col-xl-6 col-md-6 col-12" style="width: 100%;margin-bottom: 100px;" >


 <!-- Sales Card -->
 <div class="col-xxl-12  col-md-12" style="color:#000">

  <div class="col-xxl-7 col-xl-7 col-md-7 col-12" style="background-color: #fff;margin-top: 20px;">
       <script type="text/javascript">
       var options = document.getElementById('eventcourse').selectedOptions;
        var values = Array.from(options).map(({ value }) => value);
        console.log(values);
    </script>

            <div class="d-flex align-items-cente p-2 ">
          <div class="align-items-center" style="width: 100%;margin-left: 13px;margin-right: 13px;margin-top: 10px">
              <label class='labelguild'>College</label>
                            <br>
                            <select  id='eventcourse' name="eventcourse[]" class="eventcourse" value="" multiple>
                             <?php 

                                    $sql = "select * from college where college != '' order by college ASC";
                                    $result = $conn-> query($sql);
                    
                                    while ($row=mysqli_fetch_array($result)){
                                    $selectedcollege;    
                                    $collegesplit = explode(',,,', $eventcollege);  
                                                            for($i=0; $i<sizeof($collegesplit); $i++){

                                                                    if ($collegesplit[$i] == $row['college']) {
                                                                     $selectedcollege = "selected";
                                                                    }

                                                            }
                                                            echo "<option value='".$row['college']."'".$selectedcollege.">".$row['college']."</option>";
                                                            $selectedcollege = "";
                                        }

                                
                                    ?>
                            </select>
                            <br>
                            <label id="eventcourseErr" class="failed"></label>
        </div>      
    </div>
          <script>
                        document.multiselect('#eventcourse')
                            .setCheckBoxClick("checkboxAll", function(target, args) {
                                console.log("Checkbox 'Select All' was clicked and got value ", args.checked);
                            })
                            .setCheckBoxClick("1", function(target, args) {
                                console.log("Checkbox for item with value '1' was clicked and got value ", args.checked);
                            });


                </script>

     <div class="d-flex align-items-cente p-2 ">
      <div class="align-items-center" style="width: 100%;margin-left: 13px;margin-right: 13px;margin-top: 10px">
        <label class='labelguild'>Event Title</label>
        <br>
        <input type="text" name="eventdetail"  style="width: 100%;" class="labelinput" placeholder="Event Title"  value="<?php echo $eventdetail; ?>">
        <label id="eventdetailErr" class="failed"></label>
    </div>      
</div>

<div class="d-flex align-items-cente p-2 ">
  <div class="align-items-center" style="width: 100%;margin-left: 13px;margin-right: 13px;">
    <label class='labelguild'>Event Day/s</label>
    <br>
    <select name="eventday" id="eventday" style="width: 100%;color: #000;" class="labelinput">
        <option selected disabled value="">Select</option>
        <option value="1" <?php if ($enddate == "") { echo "selected";} ?>>1 Day</option>
        <option value="2" <?php if ($enddate != "") { echo "selected";} ?>>2 or More Days</option>
    </select>
    <label id="eventdayErr" class="failed"></label>
</div>      
</div>




<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<div class="d-flex align-items-cente p-2" >
    <div class="col-xxl-12  col-md-12" style="padding:0px;width: 100%;">
        <div  id="date1" name="date1" style="display:none; <?php if ($enddate == "") { echo "display:block;";} ?>">
            <div class="col-xxl-6 col-xl-6 col-md-6 col-12" > 
              <div class="align-items-center">
                <label class='labelguild'>Start Date 1</label>
                <br>
                <input type="date" name="startdate"  style="width: 100%;" class="labelinput" value="<?php if ($enddate == "") { echo $startdate;} ?>">
                <label id="startdateErr" class="failed"></label>
            </div> 
        </div>
    </div>  

    <div  id="date2" name="date2" style="display: none; <?php if ($enddate != "") { echo "display:block;";} ?>">
      <div class="col-xxl-6 col-xl-6 col-md-6 col-12" > 
          <div class="align-items-center" style="">
            <label class='labelguild'>Start Date 2</label>
            <br>
            <input type="text" name="daterange"  id="daterange" class="labelinput"  style="width:100%"  value="<?php if ($enddate != "") {echo $startdate . " - " . $enddate;}?>"  />
            <label id="daterangeErr" class="failed"></label>
        </div> 
    </div>
</div>
<div class="selecteddate" id="selecteddate">
  <div class="col-xxl-3 col-xl-3 col-md-3 col-12" > 
      <div class="align-items-center" style="width: 100%;">
        <label class='labelguild'>Start Time</label>
        <br>
        <input type="time" name="starttime"  style="width: 100%;" class="labelinput" value="<?php  echo $starttime; ?>">
        <label id="starttimeErr" class="failed"></label>
    </div> 
</div>
<div class="col-xxl-3 col-xl-3 col-md-3 col-12" > 
  <div class="align-items-center" style="width: 100%;">
    <label class='labelguild'>End Time</label>
    <br>
    <input type="time" name="endtime"  style="width: 100%;" class="labelinput" value="<?php  echo $endtime; ?>">
    <label id="endtimeErr" class="failed"></label>
</div> 
</div>

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
</div>

<script>
    $(document).ready(function(){
        $('#eventday').on('change', function(){
            var selectedDate = $(this).val(); 
            if (selectedDate == 1) {
             document.getElementById('selecteddate').style.display = 'block';
             document.getElementById('date1').style.display = 'block';
             document.getElementById('date2').style.display = 'none';
         }
         else if (selectedDate == 2) {
             document.getElementById('selecteddate').style.display = 'block';
             document.getElementById('date1').style.display = 'none';
             document.getElementById('date2').style.display = 'block';

         }
     });
    });
</script> 

<div class="d-flex align-items-cente p-2">
    <div class="col-xxl-12  col-md-12" style="padding:0px;width: 100%;">
      <div class="col-xxl-6 col-xl-6 col-md-6 col-12" > 
          <div class="align-items-center" style="width: 100%;">
            <label class='labelguild'>Venue</label>
            <br>
            <input type="text" name="venue"  style="width: 100%;" class="labelinput" placeholder="Venue"  value="<?php echo $venue; ?>">
            <label id="venueErr" class="failed"></label>
        </div> 
    </div>
    <div class="col-xxl-6 col-xl-6 col-md-6 col-12" > 
      <div class="align-items-center" style="width: 100%;">
        <label class='labelguild'>Address</label>
        <br>
        <input type="text" name="address"  style="width: 100%;" class="labelinput" placeholder="Address"  value="<?php echo $address; ?>">
        <label id="addressErr" class="failed"></label>
    </div> 
</div>
</div>          
</div>
<div class="d-flex align-items-cente p-3 ">
  <div class="align-items-center" style="width: 100%;margin-left: 13px;margin-right: 13px;">
    <label class='labelguild'>Description</label>
    <br>
    <textarea name="description" id="description" class="inputtextarea"><?php echo $description ?></textarea>
    <br>
    <label id="descriptionErr" class="failed"></label>
</div>         
</div>
      <div class="d-flex align-items-cente p-1" style="width: 100%;background-color: #fff;">
        <div class="align-items-center" style="width: 100%;margin-left: 13px;margin-right: 13px;">
          <label class='labelguild'>Event Image</label>
          <br>
          
          <div class="card" style="box-shadow: none;border:solid 1px #000;border-radius: 0px;margin-bottom: 0px;">

            <div class="drag-area">
              <span class="visible">
                <span class="select" role="button">

                </span>
              </span>
              <span class="on-drop">Drop images here</span>
              <input name="file[]" type="file" id="file" value="1"  class="file" multiple onclick="MyLastestImage()" style="display:none" accept="image/png, image/jpeg, image/jpg, image/gif"/>
              <label for='file' style="" class="imageupload">Upload Image</label>


            </div>

            <!-- IMAGE PREVIEW CONTAINER -->
            <div class="container">
              <?php echo $newsimagesplit ?>

            </div>

          </div>

          <script src="app.js?v=<?php echo time();?>"></script>
          <label id="fileErr" class="failed"></label>
        </div>
      </div>






    </div>
    <div class="col-xxl-5 col-xl-5 col-md-5 col-12" style="margin-top:20px">

<div class="d-flex align-items-cente p-2"style="background-color: #fff">
  <div class="align-items-center" style="width: 100%;margin-left: 13px;margin-right: 13px;  " >
    <label class='labelguild'>Organizer</label>
</div>                 
</div>
<style type="text/css">
  .labelinputplus{
    margin-left: 13px;
    font-size: 2vmin;
    height: 35px;
    padding-left: 10px;
    width: 70%;
}
.addmore{
  width:50px;
  text-align: left;
  margin-left: 5px;
  font-size: 20px;
  color: #fff;
  text-align: center;
  height: 37px; 
  background-color: gray;
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
.addmore2{
  width:50px;
  text-align: left;
  margin-left: 5px;
  font-size: 20px;
  color: #fff;
  text-align: center;
  height: 37px; 
  background-color: gray;
  border: none;
}
.addmore2:hover{
  color: black;
}
.removemore2{
  width:50px;
  text-align: left;
  background-color: gray;
  margin-left: 5px;
  font-size: 20px;
  color: #fff;
  text-align: center;
  height: 100%;
  height: 37px;
  border: solid 1px red;
}
</style>
<div class="clonehide">
    <div class="d-flex align-items-cente p-2"style="background-color: #fff;color: #000;" id="clone">
        <input type="text" name="organizer[]" id="" placeholder="Organizer" class="labelinputplus" >
        <button type="button" class="btn addmore">+</button>
        <button type="button" class="remove btn btn-danger removemore">-</button>              
    </div>
</div>
<div class="d-flex align-items-cente p-2"style="background-color: #fff;color: #000;">
    <input type="text" name="organizer[]" id="" placeholder="Organizer" class="labelinputplus"  value="<?php echo $spesplit[0]; ?>">
    <button type="button" class="btn addmore">+</button>
    <button type="button" class="remove btn btn-danger removemore" style="opacity: 0;" disabled>-</button>    
</div>
<?php
echo $listorganizer;
?>
<div id="clone_div1">
</div>

<div class="d-flex align-items-cente p-2"style="background-color: #fff;color: #000;">
  <div class="align-items-center" style="width: 100%;margin-left: 13px;margin-right: 13px;">
    <label id="organizerErr" class="failed"></label>
</div>                 
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



<div class="d-flex align-items-cente p-2"style="background-color: #fff">
  <div class="align-items-center" style="width: 100%;margin-left: 13px;margin-right: 13px;  " >
    <label class='labelguild'>Sponsors</label>
</div>                 
</div>
<div class="clonehide2">
    <div class="d-flex align-items-cente p-2"style="background-color: #fff" id="clone2">
        <input type="text" name="sponsors[]" id="" placeholder="Sponsors" class="labelinputplus"> 
        <button type="button" class="btn2 addmore2">+</button>
        <button type="button" class="remove2 btn2 btn-danger removemore2">-</button>              
    </div>
</div>
<div class="d-flex align-items-cente p-2"style="background-color: #fff;">
    <input type="text" name="sponsors[]" id="" placeholder="Sponsors" class="labelinputplus" value="<?php echo $spesplit2[0]; ?>">
    <button type="button" class="btn2 addmore2">+</button>
    <button type="button" class="remove btn btn-danger removemore" style="opacity: 0;" disabled>-</button>   
</div>
<?php
echo $listsponsor;
?>
<div id="clone_div2">
</div>





<script type="text/javascript">

   $(document).on('click', '.addmore2', function (ev) {
      var $clone = $("#clone2").clone(true);
      var $newbuttons = "<button type='button' class='remove2 btn2 btn-danger2'> Remove</button>";
      $clone.find('.tn-buttons2').html($newbuttons).end().appendTo($('#clone_div2'));
  });

   $(document).on('click', '.remove2', function (ev) {
      $(this).parent().remove();
  });
</script>


<div class="d-flex align-items-cente p-2"style="background-color: #fff">
  <div class="align-items-center" style="width: 100%;margin-left: 13px;margin-right: 13px;">
    <label id="sponsorsErr" class="failed"></label>
</div>                 
</div>


<div class="d-flex align-items-cente p-2 " style="text-align: right;background-color: #fff;">
  <div class="align-items-center" style="width: 100%;margin-left: 13px;margin-right: 13px;">
    <input type="submit" name="submit" id="submit" style="display:none">
    <label for='submit' style="background-color: #E8E8E8;color: #0c506f;font-size: 15px;padding: 10px;border-radius: 5px;margin-right: 10px;" class="editsubmit">Submit</label>
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