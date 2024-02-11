<?php 
session_start();
include '../dbhelper.php';



 if(isset($_POST['submit'])){
  $newsid = $_POST['newsid'];


  $newsdetail = $_POST['newsdetail'];
  $newsdetail = addslashes($newsdetail);


  $description = $_POST['description'];
  $description = addslashes($description);

  date_default_timezone_set('Asia/Manila');
  $time = date('g:i a');
 $newsdate= date("Y-m-d");


  
 



        $allfiles = "";
        $file = $_FILES['file'];

        $filecount = count($_FILES['file']['name']);


        for ($i=0; $i <$filecount ; $i++) { 
        $_FILES['file']['name'][$i];
        $fileName = $_FILES['file']['name'][$i];
        $fileTmpName = $_FILES['file']['tmp_name'][$i];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.' , $fileName);
        $fileActualExt = strtolower(end($fileExt));


      
        $fileNameNew = "news" . uniqid('', true).".".$fileActualExt;
              $fileDestination = '../../uploadimage/'.$fileNameNew;
              move_uploaded_file($fileTmpName, $fileDestination);
              $fileDestination;
              $allfiles .=  $fileNameNew.", ";
              
    
          


        }
                 $allfiles = ", " . $allfiles;
     $allfiles = substr_replace($allfiles ,"", -2);
// ---------------------saving data ------------------

          if ($fileName == "") {
                     $result = mysqli_query($conn,"UPDATE news SET newsdetail = '$newsdetail', description = '$description' where newsid = '$newsid'");

                    $sql = "SELECT * FROM news WHERE newsid='$newsid'";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result);
                    $newsimage = $row['newsimage'];



                    $result1 = mysqli_query($conn,"INSERT INTO alnews (newscollege,newsdetail,description,newsimage,newsdate,newsstatus,newstime) values ('$college','$newsdetail','$description','$newsimage','$newsdate','update','$time')");


        
              }else{
                                           $result = mysqli_query($conn,"UPDATE news SET newsdetail = '$newsdetail', description = '$description', newsimage='$allfiles' where newsid = '$newsid'");



                               $result1 = mysqli_query($conn,"INSERT INTO alnews (newscollege,newsdetail,description,newsimage,newsdate,newsstatus,newstime) values ('$college','$newsdetail','$description','$allfiles','$newsdate','update','$time')");
  
              }








                    $_SESSION['editdepartmentnewssucess'] = "asdasdsa";
                    header("Location: editnews.php");
                  



}

?>