<?php 
session_start();
include 'dbhelper.php';


if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
  //USERNAME LOGIN
  $username = $_SESSION['username'];
  if ($username != "") {
  $username = $_SESSION['username'];
  $sql = "SELECT college FROM college WHERE username='$username'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $college = $row['college'];


    $sql ="SELECT count(*) as total from graduated JOIN employment ON graduated.college = employment.empcollege and graduated.idno = employment.idno WHERE employment.empcollege like '%$college%' ";
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($result)) { 
    $gradtotal  = $row['total']  ;    
    $gradtotal; 
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/tracerlogo.png" rel="icon">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css?v=<?php echo time();?>" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  <img id="loading-image" src="assets/img/loading.gif" alt="Loading..." />
</div>


  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

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
        <a class="nav-link  " href="dashboard.php" style="background-color: #297FA7;">
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
      </li><!-- End Components Nav -->   
 
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

 

      
             <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card" style="background-color: #2BBCFF;">


                <div class="card-body">
                  <form method="POST" action="graduatedlist.php">
                  <button name="employed" id="employed" type="submit" style="background-color:transparent;border: none;">
                  <h5 class="card-title">Employed</h5>
                  </button>
                  </form>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="  fa fa-briefcase" style="color:#297fa7"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                            <?php 
                           $sql ="SELECT count(*) as total FROM graduated JOIN employment ON graduated.college = employment.empcollege WHERE employment.empcollege like '%$college%' and employment.employed = 'Yes' and graduated.idno = employment.idno ";
                                 $result = mysqli_query($conn,$sql);
                                 while ($row = mysqli_fetch_array($result)) { 
                                    $total  = $row['total']  ;    
                                    echo $total;
                                    if ($total != 0) {
                                      $employedpercentage = ($total / $gradtotal) * 100 ;
                                    }else{
                                      $employedpercentage = 0;
                                    }
                                    

                                }
                          ?>

                      </h6>
                      <span class="text-success pt-1 fw-bold" ><label style="color:#fff;" >

                        <script type="text/javascript">
                          var subTotal="<?php echo $employedpercentage  ?>";// can also be int, float, string
                          var subTotalFormatted=parseFloat(subTotal).toFixed(2); //"12.13"
                          document.write(subTotalFormatted);
                        </script>
                        %</label></span> <span class="text-muted small pt-2 ps-1"></span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->
             <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card" style="background-color: #4CDCFF;">


                <div class="card-body" >
                  <form method="POST" action="graduatedlist.php">
                  <button name="notemployed" id="notemployed" type="submit" style="background-color:transparent;border: none;">
                  <h5 class="card-title">Not Employed</h5>
                  </button>
                  </form>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" >
                      <i class="fa fa-cog"></i>
                    </div>
                   <div class="ps-3">
                      <h6>
                            <?php 
                           $sql ="SELECT count(*) as total FROM graduated JOIN employment ON graduated.college = employment.empcollege WHERE employment.empcollege like '%$college%' and employment.employed = 'No' and graduated.idno = employment.idno ";
                                 $result = mysqli_query($conn,$sql);
                                 while ($row = mysqli_fetch_array($result)) { 
                                    $total  = $row['total']  ;    
                                    echo $total;

                                    if ($total != 0) {
                                      $employedpercentage = ($total / $gradtotal) * 100 ;
                                    }else{
                                      $employedpercentage = 0;
                                    }
                                    

                                }
                          ?>

                      </h6>
                      <span class="text-success pt-1 fw-bold" ><label style="color:#fff;" >

                        <script type="text/javascript">
                          var subTotal="<?php echo $employedpercentage  ?>";// can also be int, float, string
                          var subTotalFormatted=parseFloat(subTotal).toFixed(2); //"12.13"
                          document.write(subTotalFormatted);
                        </script>
                        %</label></span> <span class="text-muted small pt-2 ps-1"></span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->
             <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card" style="background-color: #4CDCFF;">


                <div class="card-body">
                  <form method="POST" action="graduatedlist.php">
                  <button name="notupdated" id="notupdated" type="submit" style="background-color:transparent;border: none;">
                  <h5 class="card-title">Not Updated</h5>
                  </button>
                  </form>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fas fa-user-times"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                            <?php 
                           $sql ="SELECT count(*) as total FROM graduated JOIN employment ON graduated.college = employment.empcollege WHERE employment.empcollege like '%$college%' and employment.employed = '' and graduated.idno = employment.idno ";
                                 $result = mysqli_query($conn,$sql);
                                 while ($row = mysqli_fetch_array($result)) { 
                                    $total  = $row['total']  ;    
                                    echo $total;

                                    if ($total != 0) {
                                      $employedpercentage = ($total / $gradtotal) * 100 ;
                                    }else{
                                      $employedpercentage = 0;
                                    }
                                    

                                }
                          ?>

                      </h6>
                      <span class="text-success pt-1 fw-bold" ><label style="color:#fff;" >

                        <script type="text/javascript">
                          var subTotal="<?php echo $employedpercentage  ?>";// can also be int, float, string
                          var subTotalFormatted=parseFloat(subTotal).toFixed(2); //"12.13"
                          document.write(subTotalFormatted);
                        </script>
                        %</label></span> <span class="text-muted small pt-2 ps-1"></span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->
                  <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card" style="background-color: #3BA6D8;">


                <div class="card-body" >
                  <form method="POST" action="graduatedlist.php">
                  <button name="graduated" id="graduated" type="submit" style="background-color:transparent;border: none;">
                  <h5 class="card-title">Alumni</h5>
                  </button>
                  </form>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fas fa-user-graduate" style="font-size:35px;color: #297fa7;"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                          <?php 
                           $sql ="SELECT count(*) as total from graduated JOIN employment ON graduated.college = employment.empcollege and graduated.idno = employment.idno WHERE employment.empcollege like '%$college%' ";
                                 $result = mysqli_query($conn,$sql);
                                 while ($row = mysqli_fetch_array($result)) { 
                                    $gradtotal  = $row['total']  ;    
                                    echo $gradtotal; 
                                }
                          ?>


                      </h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->
             <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4" >
               <div class="card info-card sales-card" style="background-color: #2BBCFF;">


                <div class="card-body">
                  <a href="record/pendingrequest.php"><h5 class="card-title">Pending Request</h5></a>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa fa-users"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                          <?php 
                           $sql ="SELECT count(*) as total from signup where status = 'pending' AND college like '%$college%'";
                                 $result = mysqli_query($conn,$sql);
                                 while ($row = mysqli_fetch_array($result)) { 
                                    $total  = $row['total']  ;    
                                    echo $total; 
                                }
                          ?>
                      </h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->
           
             <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
             <div class="card info-card sales-card" style="background-color: #3BA6D8;">


                <div class="card-body">
                  <a href="jobpost/jobhiring.php"><h5 class="card-title">Job Hiring</h5></a>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa fa-check-square-o"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                           <?php 
                                  $sql ="SELECT count(*) as total from jobpost where jobstatus = 'approved' ";
                                 $result = mysqli_query($conn,$sql);
                                 while ($row = mysqli_fetch_array($result)) { 
                                    $total  = $row['total']  ;    
                                    echo $total; 
                                }
                          ?>
                      </h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->



           

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                
<?php 
date_default_timezone_set('Asia/Manila');
// $todays_date = date("Y-m-d");
// $str2 = date('Y-m-d', strtotime('-7 days', strtotime($todays_date))); 

 $sql ="SELECT yeargrad,count(yeargrad) as total from graduated where college like '%$college%' group by yeargrad asc";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
            $daterecord1[]  = $row['yeargrad']  ;
            $totalone[] = $row['total'];
          }
          $result=mysqli_query($con,"SELECT yeargrad,count(yeargrad) as total from graduated  where college like '%$college%' group by yeargrad asc limit 1");
              while ($row1=mysqli_fetch_array($result)) {
                   $firstdate=$row1['yeargrad'];
                 }
          $result=mysqli_query($con,"SELECT yeargrad,count(yeargrad) as total from graduated where college like '%$college%' group by yeargrad asc limit 1");
              while ($row1=mysqli_fetch_array($result)) {
                   $lastdate=$row1['yeargrad'];
                 }
         
         
?>
             <div style="width: 95%;height: 70%">
            <div style="width:100%;text-align: center;">
           <label  style="font-size: 28px;font-family:Segoe UI;background: none;padding:10px;font-weight: 600;" >ALUMNI RECORD</label>
           </div>
           <!-- <div style="float: right">

            <table>
            
              <tr>
                <td><span style="font-family:calibri;background:none;margin-top:10px">Start</span><br>
                  <select style="border: 1px solid #ccc;height: 25px;border-radius:3px;width:110px;" id="startdate" onchange='filterData()'>
                               <option disabled selected><?php echo $firstdate  ; ?></option>
                              
                              
                                <?php
          
                                $records = mysqli_query($con, "SELECT yeargrad From graduated group by yeargrad asc ");  

                                while($data = mysqli_fetch_array($records)){
                                 echo "<option value='".$data['yeargrad']."'>" .$data['yeargrad']."</option>";  // displaying data in option menu
                                  } 
                                ?>  
                               </select>


                </td>
                <td>
                   <span style="font-family:calibri;background: none">End</span><br>
                   <select style="border: 1px solid #ccc;height: 25px;border-radius:3px;width:110px;"   id="enddate" onchange='filterData()'>
                               <option disabled selected><?php echo $lastdate ; ?></option>
                              
                              
                                <?php
          
                                $records = mysqli_query($con, "SELECT yeargrad From graduated group by yeargrad desc");  

                                while($data = mysqli_fetch_array($records)){
                                 echo "<option value='".$data['yeargrad']."'>" .$data['yeargrad']."</option>";  // displaying data in option menu
                                  } 
                                ?>  
                  </select>

                </td>
              </tr>
            </table>
          
           

           </div> -->
            <canvas id="myChart" height="137px"></canvas>
        </div>
   
      
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    // setup 
    const dates = <?php echo json_encode($daterecord1); ?> ;
    const datapoints = <?php echo json_encode($totalone); ?> ;
    const data = {
      labels: dates,
      datasets: [{
        label: 'Total',
        data: datapoints,
        backgroundColor: [
          'rgba(75,235,222)',
          'rgba(54, 162, 235)',
          'rgba(255, 206, 86)',
          'rgba(75, 192, 192)',
          'rgba(153, 102, 255)',
          'rgba(255, 159, 64)',
          'rgba(0, 0, 0,)',
          'rgba(255, 195, 0)'
          
        ],
        borderColor: [
          'rgba(75,235,222, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(0, 0, 0, 1)'
        ],
        borderWidth: 1
      }]
    };

    // config 
    const config = {
      type: 'bar',
      data,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };

    // render init block
    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );

    function filterData(){
      const dates2 = [...dates];
     
      const startdate = document.getElementById('startdate');
      const enddate = document.getElementById('enddate');

      const indexstartdate=dates2.indexOf(startdate.value);
      const indexenddate=dates2.indexOf(enddate.value);
      // console.log(indexstartdate);

      const filterDate =dates2.slice(indexstartdate, indexenddate + 1);

      myChart.config.data.labels = filterDate;


      //datapoints
      const datapoints2 =[...datapoints];
      const filterDatapoints = datapoints2.slice(indexstartdate, indexenddate + 1);
       myChart.config.data.datasets[0].data = filterDatapoints;


      myChart.update();

    }
    </script>

 <?php if (empty($total4) && empty($total3) && empty($total2) && empty($total1)) {

        }elseif (!empty($total4) || !empty($total3) || !empty($total2) || !empty($total1)) {
        ?>
    
    <script>
     
   
    
    const datapie = {
      labels: ['Brgy. Clearance','Cert. of Indigency','Cert. of Residency','Business Permit'],
      datasets: [{
        label: 'Total',
        data: [<?php echo json_encode($total1); ?>,<?php echo json_encode($total2); ?>,<?php echo json_encode($total3); ?>,<?php echo json_encode($total4); ?>],
        backgroundColor: [
          'rgba(255, 26, 104)',
          'rgba(54, 162, 235)',
          'rgba(255, 206, 86)',
          'rgba(75, 192, 192)',
          
          
        ],
        borderColor: [
          'rgba(255, 26, 104, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          
        ],
        borderWidth: 1
      }]
    };

    // config 
    const configpie = {
      type: 'pie',
      data:datapie,
      options: {
        
      }
    };

    // render init block
    const pieChart = new Chart(
      document.getElementById('pieChart'),
      configpie
    );
    </script>
   <?php } ?>


              </div>
            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

        

          <!-- Budget Report -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>


          <!-- News & Updates Traffic -->
          <div class="card">


            <div class="card-body pb-0">
              <h5 class="card-title">News <span>| Latest</span></h5>

                    <?php 
              $sql = "select * from news  order by newsid desc limit 3";
              $result = $conn-> query($sql);
              if ($result-> num_rows > 0 ){
              while ($row=mysqli_fetch_array($result)){
                            $newsimagesplit = "";
                            $newsimagesplitsmall = "";
                            $newsimage = $row['newsimage'];  
                            $spesplit = explode(', ', $newsimage);  
            

                
              echo "
              <div class='news'>
                <div class='post-item clearfix'>
                  <img src='../uploadimage/".$spesplit[1]."' alt='' style='width:70px;height:70px;'>
                  <h4><a href='newsandevents/news.php''>".$row['newsdetail']."</a></h4>
                  <p>
                  ";
                  if(strlen($row['description']) > 50){
                    echo    substr_replace($row['description'], "...", 50);
                  }
                  else{
                    echo $row['description'];
                  }

                 echo "</p>

                </div>
              </div>

              ";
          }
        }
          ?>
          <h5 class="card-title">Events <span>| Latest</span></h5>

               <?php 
              $sql = "select * from event order by eventid desc limit 3";
              $result = $conn-> query($sql);
              if ($result-> num_rows > 0 ){
              while ($row=mysqli_fetch_array($result)){
                      $newsimagesplit = "";
                            $newsimagesplitsmall = "";
                            $newsimage = $row['eventimage'];  
                            $spesplit = explode(', ', $newsimage);  

              echo "
              <div class='news'>
                       <div class='post-item clearfix'>
                  <img src='../uploadimage/".$spesplit[1]."' alt='' style='width:70px;height:70px;'>
                  <h4><a href='newsandevents/news.php''>".$row['eventdetail']."</a></h4>
                  <p>
                  ";
                  if(strlen($row['description']) > 50){
                    echo    substr_replace($row['description'], "...", 50);
                  }
                  else{
                    echo $row['description'];
                  }

                 echo "</p>

                </div>
              </div>

              ";





          }
        }
          ?>








            </div>
          </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

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