
<?php
include 'dbconnect.php';
    $json = json_decode(file_get_contents('php://input'),true);
    
    
    $name = $json["naame"]; //within square bracket should be same as Utils.imageName & Utils.image
    $image = $json["imaage"];
   // $mac_address = $json["mac_address"];
 
    $response = array();
 
    $decodedImage = base64_decode("$image");
 
    $return = file_put_contents($dblink."graduatedstudent/graduatedimage/".$name.".JPG", $decodedImage);
    // $return = file_put_contents("http://192.168.1.105/GraduatedTracer/GraduatedStudent/graduatedimage/".$name.".JPG", $decodedImage);
    // $return = file_put_contents("http://176.100.141.207/GraduatedTracer/GraduatedStudent/graduatedimage/".$name.".JPG", $decodedImage);
 
    if($return !== false){
      
        
        
        $store_path = $name.".JPG";
        $response['success'] = 1;
        $response['message'] = "Image Uploaded Successfully";
        
         
        
    }else{
        $response['success'] = 0;
        $response['message'] = "Image Uploaded Failed";
    }
 
    echo json_encode($response);




?>