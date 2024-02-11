<?php 
session_start();
include 'dbhelper.php';


if (isset($_SESSION['idno']) && isset($_SESSION['password'])) {
  //USERNAME LOGIN
  $idno = $_SESSION['idno'];
  $sql = "SELECT * from graduated where idno = '$idno'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $skill  = $row['specialization'];
  $course = $row['course'];
  $yeargrad = $row['yeargrad'];
  $firstname = $row['firstname'];
  $middlename = $row['middlename'];
  $lastname = $row['lastname'];
  $graduatedimage = $row['graduatedimage'];



  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>

    <script type="text/javascript">
      window.alert = function() {};

// or simply
      alert = function() {};

    </script>
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
    <meta content="width=device-width, initial-scale=1.0" name="viewport">  <title>News</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->

    <link rel="icon" type="image/png" href="assets/img/tracerlogo.png">

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css?v=<?php echo time();?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/paginationcss.css?v=<?php echo time();?>">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->


</head>
<style type="text/css">

.tdsize{
  height: auto;
  text-align: left;
  margin-bottom: 23px;
  margin: 0;
  padding: 0;

}
.newstitle{
  padding: 0;
  margin: 0;
  padding: 0px 20px 0px 20px;
  color: #000;
  width: 100%;
  font-size: 2.5vmin;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  margin-top: 10px;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;font-weight: 600;

}
.company{
 padding: 0;
 margin: 0;
 padding: 0px 10px 0px 20px;
 color: #202020;
 width: 100%;
 font-size: 2.3vmin;
 margin-bottom: 10px;
 font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;font-weight: 500;
}
.jobtype{
  padding: 0px 20px 0px 20px;
  font-size: 1.7vmin;
  width: 100%;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;font-weight: 500;
  color: #202020;
}
.qualification{
  padding: 0px 20px 0px 20px;
  width: 55vmin;
  font-size: 1.7vmin;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;font-weight: 500;

}
</style>
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
  #myTable_length label,  #myTable2_length label{
    font-size: 2vmin;
    font-family:Nunito, sans-serif;
    font-weight: 700;
  }
  #myTable_filter label, #myTable2_filter label {
    font-size: 2vmin;
    font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
    font-weight: 500;
    color: #07435f;
  }
  #myTable_filter input,#myTable2_filter input{
    border-radius: 5px;
    padding: 3px 10px 3px 10px;
    border: solid 2px #0c506f;
    outline-width: 0;
    color: #000;
    background-color:#fff;

  }
  #myTable_info, #myTable2_info{
    font-size: 2vmin;
    font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
    font-weight: 500;
  }
  #myTable_paginate, #myTable2_paginate{
    font-size: 2vmin;
    font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
    font-weight: 500;
    color: #000;
  }

.buttonleft, .buttonright{
  font-size: 2.7vmin;
  border: none;
  color: #fff;
  background-color: #A9A9A9;

}
.buttonleft:hover, .buttonright:hover{
  background-color: #808080;
  color: #fff;
}
.active,.column:hover{ opacity: 1 !important;!important}
.even{
  background-color: red;
}
.newsdetail{
      font-size: 3vmin;
    font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
    font-weight: 600;
    color: #0c506f;
    padding: 0;
    margin: 0;
    width: 100%;

}
.newsdate{
      font-size: 1.8vmin;
    font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
    font-weight: 600;
    color: #D82020;
    padding: 0px;
    margin: 0px 0ox 15px 0px;

   width: 100%; 
}
.description{
      font-size: 2.3vmin;
    font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
    font-weight: 500;
    color: #343433;
    padding: 0;
    margin: 0;
    width: 100%;
     text-align: justify;
  text-justify: inter-word;

}
.countimage{
  background-color: #A9A9A9;
  padding: 3px 5px 3px 5px;
  color: #fff;
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
        <a class="nav-link  " href="jobpost.php" >
          <i class="fa fa-bullhorn"></i>
          <span>Job Post</span>
        </a>
      </li>
      <li style="color: #B5B5B5;margin-left: 10px;padding: 7px;font-size: 13px;">
        <span>News</span>
      </li>

      <li class="nav-item ">
        <a class="nav-link  " href="news.php" style="background-color: #297FA7;">
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

    <section class="section dashboard">
      <div class="row">
        <!-- Sales Card -->
        <div class="col-xxl-3 col-md-4">
          <div class="pagetitle">
            <h1>News</h1>
            <nav >
              <ol class="breadcrumb" style="background-color:transparent;">
                <li class="breadcrumb-item"><a href="jobpost.php">Home</a></li>
                <li class="breadcrumb-item active">News</li>
              </ol>
            </nav>
          </div><!-- End Page Title -->

        </div><!-- End Sales Card -->




      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">


         <div class="col-xxl-2 col-xl-2 col-md-1 col-sm-12">
         </div>
         <!-- Recent Sales -->
         <div class="col-xxl-8 col-xl-8 col-md-10 col-sm-12">
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

            <!-- //closing table -->
            <div class="card-body" style="border-top: 3px solid #297fa7;background-color: #F5F5F5;">

<!-- -------------first table ------------------------ -->
              <div class="table-responsive" id="table-responsive1" style="padding-top:20px;background-color: transparent;">

                <table id="myTable" width="100%" style="padding-bottom: 30px;background-color: transparent;"> 
                  <thead style="display:none">  
                    <tr>  
                      <th style="border-bottom:solid 1px;" style="width: 20%;">Photo</th>
                      <th style="border-bottom:solid 1px;" style="width: 10%;">Date</th>    
                      <th style="border-bottom:solid 1px;" style="width: 20%;">Event Type</th>  
                      <th style="border-bottom:solid 1px;" style="width: 40%;">Event Topic</th>  
                      <th style="border-bottom:solid 1px;" style="width: 10%;">Action</th>  
                    </tr> 
                  </thead>  

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
                              <img src='../../graduatedtracer/uploadimage/".$spesplit[$i]."' style='width:100%;height:30vmin' id='amyImg".$row['newsid'].$i."'>
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
                              <div class='column' style='background-color:transparent;position:relative;display:inline-block;width:23%;margin-top:15px;opacity:0.8'>
                              <img class='demo".$row['newsid']." cursor' src='../../graduatedtracer/uploadimage/".$spesplit[$i]."'  style='width:50px;height:50px;' onclick='acurrentSlide".$row['newsid']."($i)' 
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
                            <td style='padding-bottom:30px;background-color:#f5f5f5'>
                            <div class='row'>

                              <div  style='background-color:#fff;border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;;margin:0;padding:10px 0px 10px 0px'>

                             <div class='col-xl-12  col-md-12 col-sm-12 mt-2'  align='center'>
                              <label class='newsdetail'>".$row['newsdetail']."</label>
                             </div>
                              <div class='col-xl-12  col-md-12 col-sm-12 mt-2'  align='center'>
                              <label class='newsdate'>".$newsdate."</label>
                             </div>
                          

                            <div class='col-xl-4  col-md-4 col-sm-12 mt-2'  align='center'>

                            <div class='w3-content w3-display-container' style='background-color:#fff;box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;'>
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
                        



                            </div>
          

                             </div>
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

            #amyImg".$row['newsid'].$i.":hover {opacity: .8;}

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

                      </tbody>  
                    </table>

              </div>
              <script>
                $(document).ready(function(){
                  $('#myTable').dataTable();
                });
              </script>



            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- close table -->
    
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
 header("Location: ../../login/index.php");
 exit();
}



?>