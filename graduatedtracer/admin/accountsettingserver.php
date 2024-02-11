<?php 
  session_start();
  include 'dbhelper.php';
  $username = $_SESSION['username'];

  if (isset($_POST['submitprofile'])) {
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $result=mysqli_query($conn,"UPDATE college set contact='$contact',email = '$email' where username='$username'");

    if ($result) {
       $_SESSION['success'] = 'sdadsadas';
      header("Location: accountsetting.php");
    }
  
  }

  if (isset($_POST['passwordsubmit'])) {
    $newpassword = $_POST['newpassword'];
    $result=mysqli_query($conn,"UPDATE college set userpassword='$newpassword' where username='$username'");
    if ($result) {
     
      $_SESSION['passwordsuccess'] = 'sdadsadas';
      header("Location: accountsetting.php");
    }
  
  }
  if (isset($_POST['submitimage'])) {
        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.' , $fileName);
        $fileActualExt = strtolower(end($fileExt));


        $allowed = array('jpg', 'jpeg', 'png', 'pdf');

        if (in_array($fileActualExt, $allowed)) {
          if ($fileError === 0 ) {
    
              $fileNameNew = uniqid('', true).".".$fileActualExt;
              $fileDestination = 'assets/img/'.$fileNameNew;
              move_uploaded_file($fileTmpName, $fileDestination);
              echo $fileDestination;
              $result=mysqli_query($conn,"UPDATE college set image='$fileNameNew' where username='$username'");
              if ($result) {
              $_SESSION['profilesuccess'] = 'sdadsadas';
              header("Location: accountsetting.php");
            }
         
          }else {
            echo "There was an error uploading your file!!!";
          }
        }else{
          echo "You cannot upload file of this type!!!";
        }

      }
?>