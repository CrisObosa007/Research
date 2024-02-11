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
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <style type="text/css">

      input[type="checkbox"]{
        display: none;
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
     }
     .container01{
  border-radius: 5px;
overflow-y: scroll;
overflow-x: hidden;
position: absolute;
top:10vh;height:80vh;
background: #fff;
box-shadow: 5px 5px 5px 5px#696969;
margin-left: 20%;
margin-right: 20%;
width: 60%;}
.container01 .close-btn1{
  position: absolute;
  right: 10px;
  top: 4px;
  font-size: 2.5vmin;
  cursor: pointer;
  color: #fff;
  background-color: #0c506f;
  padding: 1vmin 1.2vmin 1vmin 1.2vmin;
  text-align: center;

}
.container01 .close-btn1:hover{
  color:rgba(255,255,255,0.9);
  /*transform: translate(0, -3px);*/
  background-color: red;

}


/*//asdsa*/
.container2{
  position: fixed;
  width: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(86,86,86,.30);
  z-index: 10000;
  display :none;    
}
.container02{
  width: 30%;
  height: 25% ;
  padding: 15px;
  left: 30%;
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
}
.container02 .close-btn{
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
.container02 .close-btn:hover{
  color:rgba(255,255,255,0.9);
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
  width: 45%;
  padding: 15px;
  left: 20%;
  margin-left: 5%;
  border-radius: 10px;
  color: rgb(1,82,73);
  background: #fff;
  position: absolute;
  top: 20%;
  /*box-shadow: 5px 5px 5px #000;*/
  box-shadow:#E5E5E5;
  z-index: 10001;
  font-weight: 700;
  text-align: center;
  padding-bottom: 40px;  
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
/*start sucessfully*/
.container-success1{
 position: fixed;
 width: 100%;
 top: 0;
 left: 0;
 right: 0;
 bottom: 0;
 background: rgba(86,86,86,.30);
 z-index: 10000;
}
.container-success01{
  width: 35%;
  padding: 15px;
  left: 30%;
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
  height: 40%; 
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
table tbody tr td{
 border-color: #696969;
}
.table-responsive{
  padding-top: 30px;
}
.icon-success:hover{
  transform: translate(0, -3px);
}
.icon-delete:hover{
  transform: translate(0, -3px);
}
.approveyes:hover{
  transform: translate(0, -3px);
}
.approveno:hover{
  transform: translate(0, -3px);
}
.deleteyes:hover{
  transform: translate(0, -3px);
}
.deleteno:hover{
  transform: translate(0, -3px);
}
.classview:hover{
 transform: translate(0, -3px);
}
.infolabel1{
    font-size: 2.5vmin;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
  font-weight: 600;
  color: #000;
  padding-left: 10px;
}
.infolabel2{
  font-size: 2.3vmin;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
  font-weight: 500;
  color: #000;
  padding-left: 20px;
  background-color: transparent;
  border: none;

}
.infotd1{
  width: 30%;
}
.infotd2{
  width: 70%;
}
.closingtab{
  width: 100%;
  background-color: transparent;
  padding: 0px;
  height: 40px;
  position: sticky;
  top: 0;
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
.popup_table{


}
@media only screen and (max-width: 600px) {
  .popup_table{
    width: 80%;
    margin-left: 10%;
    margin-right: 10%;
  }
}
.table_td{
  font-size: 1.7vmin;
}
</style>
<head>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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

  <title>News</title>
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
<script type="text/javascript">
  setTimeout(function() {
    $('#success-hidden').hide()
  }, 1600);
</script>
<script type="text/javascript">
  setTimeout(function() {
    $('#delete-hidden').hide()
  }, 3000);
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
  #myTable_length label{
    font-size: 2vmin;
    font-family:Nunito, sans-serif;
    font-weight: 700;
  }
  #myTable_filter label {
    font-size: 2vmin;
    font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
    font-weight: 500;
    color: #07435f;
  }
  #myTable_filter input{
    border-radius: 5px;
    padding: 3px 10px 3px 10px;
    border: solid 2px #0c506f;
    outline-width: 0;
    color: #000;
    background-color:#fff;

  }
  #myTable_info{
    font-size: 2vmin;
    font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
    font-weight: 500;
  }
  #myTable_paginate{
    font-size: 2vmin;
    font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
    font-weight: 500;
    color: #000;
  }
/*table2*/
#myTable2_length label{
  font-size: 2vmin;
  font-family:Nunito, sans-serif;
  font-weight: 700;
}
#myTable2_filter label {
  font-size: 2vmin;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
  font-weight: 500;
  color: #07435f;
}
#myTable2_filter input{
  border-radius: 5px;
  padding: 3px 10px 3px 10px;
  border: solid 2px #0c506f;
  outline-width: 0;
  color: #000;
  background-color:#fff;

}
#myTable2_info{
  font-size: 2vmin;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
  font-weight: 500;
}
#myTable2_paginate{
  font-size: 2vmin;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
  font-weight: 500;
  color: #000;
}

.buttonleft, .buttonright{
  font-size: 2.7vmin;
  border: none;
  color: #000;
  background-color: #BEBEBE;
}
.buttonleft:hover, .buttonright:hover{
  background-color: #000;
  color: #fff;
}
.countimage{
  font-size: 1.8vmin;
  background: #181818;
  color: #fff;
  padding: 2px 7px 2px 7px;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
  font-weight: 500;
}
.newsdetail{
  text-align: center;
  width:100%;
  font-size:3.5vmin;
  color:#0c506f;
  margin:0;
  padding:0;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
}
.description{
  font-size: 2.3vmin;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
  font-weight: 500;
  color: #000;
  padding-right: 5px;
  background-color: transparent;
  border: none;
  text-align: justify;
  text-justify: inter-word;
}
.active,.column:hover{ opacity: 1 !important;!important}
.container3{
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
}
.container3{

}
.container3 .close-btn3{
  position: absolute;
  right: 10px;
  top: 4px;
  font-size: 2.5vmin;
  cursor: pointer;
  color: #fff;
  background-color: #0c506f;
  padding: 1vmin 1.2vmin 1vmin 1.2vmin;
  text-align: center;

}
.container3 .close-btn3:hover{
  color:rgba(255,255,255,0.9);
  /*transform: translate(0, -3px);*/
  background-color: red;

}
.popup_table3{
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

}
@media only screen and (max-width: 600px) {
  .popup_table3{
  width: 80%;
  margin-left: 10%;
  margin-right: 10%;
  }
}
.closingtab3{
  width: 100%;
  background-color: transparent;
  padding: 0px;
  height: 40px;
  position: sticky;
  top: 0;
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
.excel:hover{
  background-color: transparent !important;
  border: solid 2px green !important;
  color: green !important;

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
      <span>Record</span>
    </li>
    <li class="nav-item">

      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse">
        <i class="fa fa-graduation-cap"></i><span>Record</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="../record/pendingrequest.php">
            <i class="bi bi-circle"></i><span>Pending Request (Department)</span>
          </a>
        </li>
        <li>
          <a href="../record/graduated.php">
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


  <main id="main" class="main">
    <div class="pagetitle">
      <div class="row">
        <div class="col-12">
          <div class="col-xxl-5 col-md-5">
            <h1>News</h1>
            <nav>
              <ol class="breadcrumb" >
                <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">News List</li>
              </ol>
            </nav>
          </div><!-- End Page Title -->
          <div class="col-xxl-7 col-md-7" align="right">
            <a href="addnews.php" >  <label style='background-color:#07435f;color:#fff;font-size:1.7vmin;margin:0;padding: 1vmin 1.5vmin 1vmin 1.5vmin;border-radius:3px;margin-top: 20px;' class='addnews'>
             <i class='fa fa-plus' style='font-size:13px;font;font-weight: bold;'>
               <label style=' font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;padding: 0px .3vmin 0px .3vmin;font-weight:600'>Add News</label>
             </i></label></a>
           </div>


         </div>
       </div>
     </div>
    <form action="excel.php" method="POST" style="width: auto;margin: 0px 0px 10px 0px;padding: 0;">
                        <input type="submit" id="export_excel_news1" name="export_excel_news1" class="excel" value="Download Excel" style="background-color: green;border: none;padding: 5px 10px 5px 10px;color:#fff;border-radius: 5px;border: solid 2px green;width: auto;font-size: 1.7vmin;" />
                          <input type="submit" id="export_excel_news2" name="export_excel_news2" class="excel" value="Download Excel" style="background-color: green;border: none;padding: 5px 10px 5px 10px;color:#fff;border-radius: 5px;border: solid 2px green;width: auto;font-size: 1.7vmin;display: none;" />
                        </form>

     <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">



            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>
                <div class="card-body" style="border-top: 3px solid #297fa7;">
                  <ul class="nav nav-tabs nav-tabs-bordered">

                    <li class="nav-item">
                      <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" onclick="MyAllNews()" style="font-size: 2.2vmin;">All News</button>
                    </li>

                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" onclick="MyNewsList()"  style="font-size: 2.2vmin;">Uploaded News</button>
                    </li>
                  </ul>
                  <script type="text/javascript">
                    function MyAllNews() {
                      document.getElementById("table-responsive2").style.display = "none";
                      document.getElementById("table-responsive1").style.display = "block";
                      document.getElementById("export_excel_news1").style.display = "block";
                      document.getElementById("export_excel_news2").style.display = "none";
                    }
                    function MyNewsList() {
                      document.getElementById("table-responsive1").style.display = "none";
                      document.getElementById("table-responsive2").style.display = "block";
                       document.getElementById("export_excel_news1").style.display = "none";
                      document.getElementById("export_excel_news2").style.display = "block";
                    }
                  </script>


                  <style type='text/css'>


                  </style>
                  <div class="table-responsive" id="table-responsive1">
                    <!-- first table start -->
                    <table id="myTable" class="table table-striped" width="100%" style=""> 
                      <thead>  
                        <tr>  
                          <th style="border-bottom:solid 1px;width: 25%;font-size: 1.7vmin;">News Date</th>  
                          <th style="border-bottom:solid 1px;width: 50%;font-size: 1.7vmin;">News Title</th>  
                          <th style="border-bottom:solid 1px;width: 25%;font-size: 1.7vmin;">Action</th>  
                        </tr>  
                      </thead>  
                      <tbody>  
                        <?php 
                        $sql = "select * from news";
                        $result = $conn-> query($sql);
                        if ($result-> num_rows > 0 ){
                          while ($row=mysqli_fetch_array($result)){
                            $newsdate = $row['newsdate'];
                            $newsdate = strtotime($newsdate);
                            $newsdate= date("M d Y" , $newsdate);

                            $newsimagesplit = "";
                            $newsimagesplitsmall = "";
                            $newsimage = $row['newsimage'];  
                            $spesplit = explode(', ', $newsimage);  
                            for($i=1; $i<sizeof($spesplit); $i++){
                              $atotalofimage = "";
                              $atotalofimage = sizeof($spesplit) - 1;
                              $startcount = $i;
                              echo "";
                              $newsimagesplit .= "
                              <div class='w3-display-container  amySlides".$row['newsid']."'>
                              <img src='../../uploadimage/".$spesplit[$i]."' style='width:100%;height:30vmin' id='amyImg".$row['newsid'].$i."'>
                              <div class='w3-display-topleft countimage'>
                              ".$startcount."/".$atotalofimage."
                              </div>
                              </div>


                              ";

                            }



                            $spesplit = explode(', ', $newsimage);  
                            for($i=1; $i<sizeof($spesplit); $i++){
                              $startcount = $i;
                              $newsimagesplitsmall .= "
                              <div class='column' style='background-color:transparent;position:relative;display:inline-block;width:20%;margin-top:15px;opacity:0.8'>
                              <img class='demo".$row['newsid']." cursor' src='../../uploadimage/".$spesplit[$i]."'  style='width:50px;height:50px;' onclick='acurrentSlide".$row['newsid']."($i)' 
                              >
                              </div>

                              ";



                              echo "<div id='amyModal".$row['newsid'].$i."' class='amodal".$row['newsid'].$i."'>
                              <span class='aclose".$row['newsid'].$i."'>&times;</span>
                              <img class='amodal-content".$row['newsid'].$i."' id='aimg01".$row['newsid'].$i."'>
                              <div id='acaption".$row['newsid'].$i."'></div>
                              </div>







                              ";
                            }

                            echo "
                            <tr>
                            <td  class='table_td'>".$newsdate."</td>
                            <td  class='table_td'>".$row['newsdetail']."</td>
                            <td align='center'>
                            <input type='checkbox' id='a".$row['newsid']."' onclick='amyFunction".$row['newsid']."()'>

                            <label for='a".$row['newsid']."' style='background-color:#07435f;color:#fff;font-size:1.7vmin;margin:0;padding: 1vmin 1.5vmin 1vmin 1.5vmin;border-radius:3px' class='classview'>
                            <i class='fa fa-eye' style='font-size:1.7vmin;font;font-weight: bold;'>
                            <label style=' font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;padding: 0px .3vmin 0px .3vmin;font-weight:600' for='a".$row['newsid']."'>View</label>
                            </i></label>


                            <div class='container1'>

                            <div class='container01'>

                            <div align='left' style='padding:10px;'>

                            <table class='popup_table' style='background-color:#000'>
                            <tr>
                            <td colspan='2' >
                            <div class='closingtab'>
                            <label for='"."a".$row['newsid']."' class='close-btn1 fas fa-times' title='close'></label><br>
                            </div>
                            </td>
                            </tr>
                            <tr>
                            <td colspan='2' >
                            <label class='newsdetail'>".$row['newsdetail']."</label>
                            </td>
                            </tr>
                            
                            






                            <tr>
                            <td style='padding-bottom:30px'>
                            <div class='col-xl-4  col-md-4 col-sm-12 mt-2'  align='center'>

                            <div class='w3-content w3-display-container' style='background-color:#BEBEBE'>
                            ".$newsimagesplit."
                            <button class='w3-display-left buttonleft' id='imageback".$row['newsid']."'  onclick='aplusDivs".$row['newsid']."(-1)'>&#10094;</button>
                            <button class='w3-display-right buttonright' id='imagenext".$row['newsid']."' onclick='aplusDivs".$row['newsid']."(1)'>&#10095;</button>
                            </div>
                            <div class='row'>
                            ".$newsimagesplitsmall."
                            </div>
                            </div>






                            <div class='col-xl-8  col-md-4 col-sm-12 mt-2'  align='left'>
                            <label class='description'>".$row['description']."</label>
                            </div>
                            </td>
                            </tr>

                            </table>



                            </div>
                            </div>
                            </div>
                            <style>#a".$row['newsid'].":checked ~ .container1{display: block;visibility: visible;}</style>




                            </td>


                            </tr>";


                            echo "



                            ";






                          }
                        }
                        ?>  

                      </tbody>  
                    </table>


                    <?php 
                    $sql = "select * from news ";
                    $result = $conn-> query($sql);
                    if ($result-> num_rows > 0 ){
                      while ($row=mysqli_fetch_array($result)){
                        $newsimage = $row['newsimage'];  
                        $spesplit = explode(', ', $newsimage);  
                        for($i=1; $i<sizeof($spesplit); $i++){



                          echo "  

                          <style>
            #amyImg".$row['newsid'].$i." {
                          border-radius: 5px;
                          cursor: pointer;
                          transition: 0.3s;
                        }

            #amyImg".$row['newsid'].$i.":hover {opacity: 0.7;}

                        .amodal".$row['newsid'].$i." {
                          position: fixed;
                          width: 100%;
                          top: 0;
                          left: 0;
                          right: 0;
                          bottom: 0;
                          background: rgba(86,86,86,.8);
                          z-index: 100000;
                          overflow: auto;
                          display :none; 
                          background-color: rgb(0,0,0);
                          background-color: rgba(0,0,0,0.9); 
                        }


                        .amodal-content".$row['newsid'].$i." {
                          margin: auto;
                          display: block;
                          width: 60vmin;
                          height:60vmin;
                          position: fixed;
                          top: 50%;
                          left: 50%;
                          transform: translate(-50%, -50%);
                          background-color:#fff; 
                        }


            #acaption".$row['newsid'].$i." {
                        margin: auto;
                        display: block;
                        width: 80%;
                        max-width: 700px;
                        text-align: center;
                        color: #ccc;
                        padding: 10px 0;
                        height: 150px;
                      }


                      .amodal-content".$row['newsid'].$i.", #acaption".$row['newsid'].$i." {  
                        -webkit-animation-name: zoom;
                        -webkit-animation-duration: 0.6s;
                        animation-name: zoom;
                        animation-duration: 0.6s;
                      }




                      .aclose".$row['newsid'].$i." {
                        position: absolute;
                        top: 15px;
                        right: 35px;
                        color: #f1f1f1;
                        font-size: 40px;
                        font-weight: bold;
                        transition: 0.3s;
                      }

                      .aclose".$row['newsid'].$i.":hover,
                      .aclose".$row['newsid'].$i.":focus {
                        color: #bbb;
                        text-decoration: none;
                        cursor: pointer;
                      }


                      </style>


                      <script>
                      var amodal".$row['newsid'].$i." = document.getElementById('amyModal".$row['newsid'].$i."');


                      var aimg".$row['newsid'].$i." = document.getElementById('amyImg".$row['newsid'].$i."');
                      var amodalImg".$row['newsid'].$i." = document.getElementById('aimg01".$row['newsid'].$i."');
                      aimg".$row['newsid'].$i.".onclick = function(){
                        amodal".$row['newsid'].$i.".style.display = 'block';
                        amodalImg".$row['newsid'].$i.".src = this.src;
                        acaptionText".$row['newsid'].$i.".innerHTML = this.alt;
                      }

                      var aspan".$row['newsid'].$i." = document.getElementsByClassName('aclose".$row['newsid'].$i."')[0];


                      aspan".$row['newsid'].$i.".onclick = function() { 
                        amodal".$row['newsid'].$i.".style.display = 'none';
                      }
                      </script>  "; 



                    }



                    echo "

                    <script>
                    let slideIndex".$row['newsid']." = 1;
                    showSlides".$row['newsid']."(slideIndex".$row['newsid'].");

                    function aplusDivs".$row['newsid']."(n".$row['newsid'].") {
                      showSlides".$row['newsid']."(slideIndex".$row['newsid']." += n".$row['newsid'].");
                    }

                    function acurrentSlide".$row['newsid']."(n".$row['newsid'].") {
                      showSlides".$row['newsid']."(slideIndex".$row['newsid']." = n".$row['newsid'].");
                    }

                    function showSlides".$row['newsid']."(n".$row['newsid'].") {
                      let i".$row['newsid'].";
                      let slides".$row['newsid']." = document.getElementsByClassName('amySlides".$row['newsid']."');
                      let dots".$row['newsid']." = document.getElementsByClassName('demo".$row['newsid']."');
                      let captionText".$row['newsid']." = document.getElementById('caption".$row['newsid']."');
                      if (n".$row['newsid']." > slides".$row['newsid'].".length) {slideIndex".$row['newsid']." = 1}
                      if (n".$row['newsid']." < 1) {slideIndex".$row['newsid']." = slides".$row['newsid'].".length}
                      for (i".$row['newsid']." = 0; i".$row['newsid']." < slides".$row['newsid'].".length; i".$row['newsid']."++) {
                        slides".$row['newsid']."[i".$row['newsid']."].style.display = 'none';
                      }
                      for (i".$row['newsid']." = 0; i".$row['newsid']." < dots".$row['newsid'].".length; i".$row['newsid']."++) {
                        dots".$row['newsid']."[i".$row['newsid']."].className = dots".$row['newsid']."[i".$row['newsid']."].className.replace(' active', '');
                      }
                      slides".$row['newsid']."[slideIndex".$row['newsid']."-1].style.display = 'block';
                      dots".$row['newsid']."[slideIndex".$row['newsid']."-1].className += ' active';
                      captionText".$row['newsid'].".innerHTML = dots".$row['newsid']."[slideIndex".$row['newsid']."-1].alt;
                    }
                    </script>";

                  }

                }

                ?>

              </div>
              <script>
                $(document).ready(function(){
                  $('#myTable').dataTable();
                });
              </script>
              <!-- closing first table -->
              <!-- second table start -->
                 <div class="table-responsive" id="table-responsive2" style="display: none;">
                    <!-- first table start -->
                    <table id="myTable2" class="table table-striped" width="100%" style=""> 
                      <thead>  
                        <tr>  
                          <th style="border-bottom:solid 1px;width: 25%;font-size: 1.7vmin;">News Date</th>  
                          <th style="border-bottom:solid 1px;width: 50%;font-size: 1.7vmin;">News Title</th>  
                          <th style="border-bottom:solid 1px;width: 25%;font-size: 1.7vmin;">Action</th>  
                        </tr>  
                      </thead>  
                      <tbody>  
                        <?php 
                        $sql = "select * from news where newscollege = '$college'";
                        $result = $conn-> query($sql);
                        if ($result-> num_rows > 0 ){
                          while ($row=mysqli_fetch_array($result)){
                            $newsdate = $row['newsdate'];
                            $newsdate = strtotime($newsdate);
                            $newsdate= date("M d Y" , $newsdate);

                            $newsimagesplit = "";
                            $newsimagesplitsmall = "";
                            $newsimage = $row['newsimage'];  
                            $spesplit = explode(', ', $newsimage);  
                            for($i=1; $i<sizeof($spesplit); $i++){
                              $atotalofimage = "";
                              $atotalofimage = sizeof($spesplit) - 1;
                              $startcount = $i;
                              echo "";
                              $newsimagesplit .= "
                              <div class='w3-display-container  bmySlides".$row['newsid']."'>
                              <img src='../../uploadimage/".$spesplit[$i]."' style='width:100%;height:30vmin' id='bmyImg".$row['newsid'].$i."'>
                              <div class='w3-display-topleft countimage'>
                              ".$startcount."/".$atotalofimage."
                              </div>
                              </div>


                              ";

                            }



                            $spesplit = explode(', ', $newsimage);  
                            for($i=1; $i<sizeof($spesplit); $i++){
                              $startcount = $i;
                              $newsimagesplitsmall .= "
                              <div class='bcolumn' style='background-color:transparent;position:relative;display:inline-block;width:20%;margin-top:15px;opacity:0.8'>
                              <img class='bdemo".$row['newsid']." cursor' src='../../uploadimage/".$spesplit[$i]."'  style='width:50px;height:50px;' onclick='bcurrentSlide".$row['newsid']."($i)' 
                              >
                              </div>

                              ";



                              echo "<div id='bmyModal".$row['newsid'].$i."' class='bmodal".$row['newsid'].$i."'>
                              <span class='bclose".$row['newsid'].$i."'>&times;</span>
                              <img class='bmodal-content".$row['newsid'].$i."' id='bimg01".$row['newsid'].$i."'>
                              <div id='bcaption".$row['newsid'].$i."'></div>
                              </div>







                              ";
                            }

                            echo "
                            <tr>
                            <td  class='table_td'>".$newsdate."</td>
                            <td  class='table_td'>".$row['newsdetail']."</td>
                            <td align='center'>
                            <input type='checkbox' id='b".$row['newsid']."' onclick='bmyFunction".$row['newsid']."()'>

                            <label for='b".$row['newsid']."' style='background-color:#07435f;color:#fff;font-size:1.7vmin;margin:0;padding: 1vmin 1.5vmin 1vmin 1.5vmin;border-radius:3px' class='classview'>
                            <i class='fa fa-eye' style='font-size:1.7vmin;font;font-weight: bold;'>
                            <label style=' font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;padding: 0px .3vmin 0px .3vmin;font-weight:600' for='b".$row['newsid']."'>View</label>
                            </i></label>


                        <form method='POST' action='editnews.php' style='width:auto;position:relative;display:inline-block'>
                        <input type='hidden' id='".$row['newsid']."' name='newsid' value='".$row['newsid']."'>

                        <label style='background-color:#009933;color:#fff;font-size:1.7vmin;margin:0;padding: 1vmin 1.5vmin 1vmin 1.5vmin;border-radius:3px' class='classview'>
                        <i class='fa fa-refresh' style='font-size:1.7vmin;font;font-weight: bold;'>
                        <button style='display:none' name='editbutton' id='editbutton".$row['newsid']."'></button>
                        <label style=' font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;padding: 0px .3vmin 0px .3vmin;font-weight:600' for='editbutton".$row['newsid']."'>Update</label>
                        </i></label>
                        </form>

                            <div class='container1'>

                            <div class='container01'>

                            <div align='left' style='padding:10px;'>

                            <table class='popup_table' style='background-color:#000'>
                            <tr>
                            <td colspan='2' >
                            <div class='closingtab'>
                            <label for='"."b".$row['newsid']."' class='close-btn1 fas fa-times' title='close'></label><br>
                            </div>
                            </td>
                            </tr>
                            <tr>
                            <td colspan='2' >
                            <label class='newsdetail'>".$row['newsdetail']."</label>
                            </td>
                            </tr>
                            
                            






                            <tr>
                            <td style='padding-bottom:30px'>
                            <div class='col-xl-4  col-md-4 col-sm-12 mt-2'  align='center'>

                            <div class='w3-content w3-display-container' style='background-color:#BEBEBE'>
                            ".$newsimagesplit."
                            <button class='w3-display-left buttonleft' id='bimageback".$row['newsid']."'  onclick='bplusDivs".$row['newsid']."(-1)'>&#10094;</button>
                            <button class='w3-display-right buttonright' id='bimagenext".$row['newsid']."' onclick='bplusDivs".$row['newsid']."(1)'>&#10095;</button>
                            </div>
                            <div class='row'>
                            ".$newsimagesplitsmall."
                            </div>
                            </div>






                            <div class='col-xl-8  col-md-4 col-sm-12 mt-2'  align='left'>
                            <label class='description'>".$row['description']."</label>
                            </div>
                            </td>
                            </tr>

                            </table>



                            </div>
                            </div>
                            </div>
                            <style>#b".$row['newsid'].":checked ~ .container1{display: block;visibility: visible;}</style>

                                <form method='POST' action='editpendingjob.php' style='width:auto;position:relative;display:inline-block'>
            <input type='hidden' id='".$row['newsid']."' name='newsid' value='".$row['newsid']."'>




    
           </form>


              <input type='checkbox' id='c".$row['newsid']."'>
              <label for='c".$row['newsid']."' style='background-color:#CC0000;color:#fff;font-size:1.7vmin;margin:0;padding: 1vmin 1.5vmin 1vmin 1.5vmin;border-radius:3px;margin-left:-3px' class='classview'>
           <i class='fa fa-times' style='font-size:1.7vmin;font;font-weight: bold;'>
           <label style=' font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;padding: 0px .3vmin 0px .3vmin;font-weight:600' for='c".$row['newsid']."'>Remove</label>
           </i></label>

                      <div class='container3'>

                          <div class='container03'>
                                                         
                    
                              
                            <table class='popup_table3' style='background-color:#000;  border-collapse: collapse'>
                            <tr>
                              <td colspan='2'>
                              <div class='closingtab3'>
                                <label for='"."c".$row['newsid']."' class='close-btn3 fas fa-times' title='close'></label><br>
                              </div>
                               <label style='text-align: center;width:100%;font-size:3.5vmin;color:#0c506f;margin:0;padding:0;font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;'>".$row['newsdetail']."</label>
                              </td>
                                <tr>
                              <td  colspan='2' style='border-top:solid #0c506f 2px;'>
                              </td>
                            </tr>
                            <tr>
                                                          <td colspan='2'>
                                <div class='col-xl-12  col-md-12 mt-2'  align='center' style='box-shadow: rgba(0, 0, 0, 0.15) 0px 2px 8px;margin-bottom:20px'>
                                 <div class='p-3' style='background-color:white;width:100%;' >

                                      <form action='newsserver.php' method='POST' id='deletepopup' name='deletepopup' onsubmit='return validateReason()'>
                                      <input type='hidden' name='newsid' value=".$row['newsid'].">
                
                                      <div style='width:100%' align='left'class='form-group options'>
                                          <label class='infolabel1' style='font-size:2.3vmin'>Reason for Removing? <label style='color:red'>*</label></label>
                                            
                                             <div style='width:100%'>
                                              <input type='checkbox' name='reasons[]' value='Not clear details' style='display:inline-block;position: relative;height:2.1vmin;width:2.1vmin;margin:5px 0px 0px 5px' required>
                                              <label class='infolabel2'>Not clear details</label>
                                            </div>
                                           <div style='width:100%'>
                                              <input type='checkbox' name='reasons[]' value='The posting is copyright' style='display:inline-block;position: relative;height:2.1vmin;width:2.1vmin;margin:5px 0px 0px 5px' required>
                                              <label class='infolabel2'>The posting is copyright</label>
                                            </div>
                                            <div style='width:100%'>
                                              <input type='checkbox' name='reasons[]' value='Repeated information details' style='display:inline-block;position: relative;height:2.1vmin;width:2.1vmin;margin:5px 0px 0px 5px' required>
                                              <label class='infolabel2'>Repeated information details</label>
                                            </div>
                                            <div style='width:100%' style='display:inline-block;position: relative;'>
                                            <input type='checkbox' name='reasons[]' value='otherreason' style='display:inline-block;position: relative;height:2.1vmin;width:2.1vmin;margin:5px 0px 0px 5px' required id='otherreason".$row['newsid']."' onclick='javascript:postgraduateCheck".$row['newsid']."();'>

                                              <label class='infolabel2' style='width:auto'>Other Reason</label>
                                              <input type='text' name='otherreason' value='' style='width:60%;padding:2px 5px 2px 5px;color:#000;font-family: Roboto, HelveticaNeue, Helvetica, Arial, sans-serif;font-weight:500;font-size:2vmin;visibility:hidden;' id='textOther".$row['newsid']."'>
                                              
                                            </div>
                                                  <script>
                                                     function postgraduateCheck".$row['newsid']."() {
                                                      if (document.getElementById('otherreason".$row['newsid']."').checked) {
                                                             textOther".$row['newsid'].".style.visibility = 'visible';
                                                            document.getElementById('textOther".$row['newsid']."').required = true;

                                                      }else{
                                                           textOther".$row['newsid'].".style.visibility = 'hidden';
                                                          document.getElementById('textOther".$row['newsid']."').required = false;

                                                      }
                                                    }
                                                    </script>
                                         
                                      </div>
                                      <br>



                                     <label style='width:100%;text-align:right;font-size:2vmin;color:#F1F4F2;margin-right:7px;'><button type='submit' name='removeinfo' class='approveno' id='removeinfo' style='padding:8px;padding-left:15px;padding-right:15px;border:none;background-color:#CC0000;border-radius:3px;'>Submit</button></label>
                                      </form>

                                 </div>
                              </div>
                              </td>
                            </tr>

                            </table>
                                  
                                  

  
                          </div>
                    </div>
          <style>#c".$row['newsid'].":checked ~ .container3{display: block;visibility: visible;}</style>


                            </td>


                            </tr>";


                            echo "



                            ";






                          }
                        }
                        ?>  

                      </tbody>  
                    </table>


                    <?php 
                    $sql = "select * from news";
                    $result = $conn-> query($sql);
                    if ($result-> num_rows > 0 ){
                      while ($row=mysqli_fetch_array($result)){
                        $newsimage = $row['newsimage'];  
                        $spesplit = explode(', ', $newsimage);  
                        for($i=1; $i<sizeof($spesplit); $i++){



                          echo "  

                          <style>
            #bmyImg".$row['newsid'].$i." {
                          border-radius: 5px;
                          cursor: pointer;
                          transition: 0.3s;
                        }

            #bmyImg".$row['newsid'].$i.":hover {opacity: 0.7;}

                        .bmodal".$row['newsid'].$i." {
                          position: fixed;
                          width: 100%;
                          top: 0;
                          left: 0;
                          right: 0;
                          bottom: 0;
                          background: rgba(86,86,86,.8);
                          z-index: 100000;
                          overflow: auto;
                          display :none; 
                          background-color: rgb(0,0,0);
                          background-color: rgba(0,0,0,0.9); 
                        }


                        .bmodal-content".$row['newsid'].$i." {
                          margin: auto;
                          display: block;
                          width: 60vmin;
                          height:60vmin;
                          position: fixed;
                          top: 50%;
                          left: 50%;
                          transform: translate(-50%, -50%);
                          background-color:#fff; 
                        }


            #bcaption".$row['newsid'].$i." {
                        margin: auto;
                        display: block;
                        width: 80%;
                        max-width: 700px;
                        text-align: center;
                        color: #ccc;
                        padding: 10px 0;
                        height: 150px;
                      }


                      .bmodal-content".$row['newsid'].$i.", #bcaption".$row['newsid'].$i." {  
                        -webkit-animation-name: zoom;
                        -webkit-animation-duration: 0.6s;
                        animation-name: zoom;
                        animation-duration: 0.6s;
                      }




                      .bclose".$row['newsid'].$i." {
                        position: absolute;
                        top: 15px;
                        right: 35px;
                        color: #f1f1f1;
                        font-size: 40px;
                        font-weight: bold;
                        transition: 0.3s;
                      }

                      .bclose".$row['newsid'].$i.":hover,
                      .bclose".$row['newsid'].$i.":focus {
                        color: #bbb;
                        text-decoration: none;
                        cursor: pointer;
                      }


                      </style>


                      <script>
                      var bmodal".$row['newsid'].$i." = document.getElementById('bmyModal".$row['newsid'].$i."');


                      var bimg".$row['newsid'].$i." = document.getElementById('bmyImg".$row['newsid'].$i."');
                      var bmodalImg".$row['newsid'].$i." = document.getElementById('bimg01".$row['newsid'].$i."');
                      bimg".$row['newsid'].$i.".onclick = function(){
                        bmodal".$row['newsid'].$i.".style.display = 'block';
                        bmodalImg".$row['newsid'].$i.".src = this.src;
                        bcaptionText".$row['newsid'].$i.".innerHTML = this.alt;
                      }

                      var bspan".$row['newsid'].$i." = document.getElementsByClassName('bclose".$row['newsid'].$i."')[0];


                      bspan".$row['newsid'].$i.".onclick = function() { 
                        bmodal".$row['newsid'].$i.".style.display = 'none';
                      }
                      </script>  "; 



                    }



                    echo "

                    <script>
                    let bslideIndex".$row['newsid']." = 1;
                    bshowSlides".$row['newsid']."(bslideIndex".$row['newsid'].");

                    function bplusDivs".$row['newsid']."(bn".$row['newsid'].") {
                      bshowSlides".$row['newsid']."(bslideIndex".$row['newsid']." += bn".$row['newsid'].");
                    }

                    function bcurrentSlide".$row['newsid']."(bn".$row['newsid'].") {
                      bshowSlides".$row['newsid']."(bslideIndex".$row['newsid']." = bn".$row['newsid'].");
                    }

                    function bshowSlides".$row['newsid']."(bn".$row['newsid'].") {
                      let bi".$row['newsid'].";
                      let bslides".$row['newsid']." = document.getElementsByClassName('bmySlides".$row['newsid']."');
                      let bdots".$row['newsid']." = document.getElementsByClassName('bdemo".$row['newsid']."');
                      let bcaptionText".$row['newsid']." = document.getElementById('bcaption".$row['newsid']."');
                      if (bn".$row['newsid']." > bslides".$row['newsid'].".length) {bslideIndex".$row['newsid']." = 1}
                      if (bn".$row['newsid']." < 1) {bslideIndex".$row['newsid']." = bslides".$row['newsid'].".length}
                      for (bi".$row['newsid']." = 0; bi".$row['newsid']." < bslides".$row['newsid'].".length; bi".$row['newsid']."++) {
                        bslides".$row['newsid']."[bi".$row['newsid']."].style.display = 'none';
                      }
                      for (bi".$row['newsid']." = 0; bi".$row['newsid']." < bdots".$row['newsid'].".length; bi".$row['newsid']."++) {
                        bdots".$row['newsid']."[bi".$row['newsid']."].className = bdots".$row['newsid']."[bi".$row['newsid']."].className.replace(' active', '');
                      }
                      bslides".$row['newsid']."[bslideIndex".$row['newsid']."-1].style.display = 'block';
                      bdots".$row['newsid']."[bslideIndex".$row['newsid']."-1].className += ' active';
                      bcaptionText".$row['newsid'].".innerHTML = bdots".$row['newsid']."[bslideIndex".$row['newsid']."-1].alt;
                    }
                    </script>";

                  }

                }

                ?>

              </div>
                        <script type="text/javascript">
           $(function(){
        var requiredCheckboxes = $('.options :checkbox[required]');
        requiredCheckboxes.change(function(){
            if(requiredCheckboxes.is(':checked')) {
                requiredCheckboxes.removeAttr('required');
            } else {
                requiredCheckboxes.attr('required', 'required');
            }
        });
    });
     </script>
              <script>
                $(document).ready(function(){
                  $('#myTable2').dataTable();
                });
              </script>
              <!-- closing second table -->
            </div>

          </div>
        </div><!-- End Recent Sales -->

      </div>
    </div><!-- End Left side columns -->
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