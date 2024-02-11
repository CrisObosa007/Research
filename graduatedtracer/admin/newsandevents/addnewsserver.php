<?php 
session_start();
include '../dbhelper.php';



 if(isset($_POST['submit'])){


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

     echo $allfiles;
// ---------------------saving data ------------------
      $result = mysqli_query($conn,"INSERT INTO news (newscollege,newsdetail,description,newsimage,newsdate,newstime) values ('admin','$newsdetail','$description','$allfiles','$newsdate','$time')");

          $result = mysqli_query($conn,"INSERT INTO alnews (newscollege,newsdetail,description,newsimage,newsdate,newsstatus,newstime) values ('admin','$newsdetail','$description','$allfiles','$newsdate','upload','$time')");



        require "../mail.php";

                          $sql = "SELECT * FROM graduated where newsnotification = 'Yes'order by id DESC limit 3 ";
                          $result = mysqli_query($conn,$sql);
                            if ($result-> num_rows > 0 ){
                                while ($row=mysqli_fetch_array($result)){
                                $email = $row['email'];
                                $firstname = $row['firstname'];
                                $lastname = $row['lastname'];

                                             


      $subject = $firstname . " " .$lastname ;



      $recipient = $email;  
       ob_start();
      include("newsemail.php");
      $message = ob_get_contents();
        ob_get_clean();

      if(send_mail($recipient,$subject, $message)){

      }


                                        
                                      }
















                    $_SESSION['adminnewssucess'] = "asdasdsa";
                    header("Location: addnews.php");
                  



            // }else{
            //   echo "Your file is too big!!!";
            // }


}

}

?>