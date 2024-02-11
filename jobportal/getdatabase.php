<?php
session_start();
require "DataBase.php";
include ('dbconnect.php');
$response = array();
$courses = "";
$region = "";
$regioncode1 = "";
$province = "";
$provincecode1 = "";
$provincecode2 = "";
$city = "";
$citycode1 = "";
$citycode2 = "";
$citycode3 = "";
$barangay = "";
$barangaycode1 = "";
$barangaycode2 = "";
$barangaycode3 = "";

                $sql = "select * from user where college != '' GROUP by course ASC";
                $result = $conn-> query($sql);
                while ($row=mysqli_fetch_array($result)){
                $courses .= $row['course'] . ",";
                }
         
                //region
                $sql = "select * from refregion order by regDesc";
                $result = $conn-> query($sql);
                while ($row=mysqli_fetch_array($result)){
                $region .= $row['regDesc'] . ",";
                }
                //region code
                $sql = "select * from refregion order by regCode";
                $result = $conn-> query($sql);
                while ($row=mysqli_fetch_array($result)){
                $regioncode1 .= $row['regDesc'] ."/".$row['regCode']. ",";
                }
                //province
                $sql = "select * from refprovince order by regCode";
                $result = $conn-> query($sql);
                while ($row=mysqli_fetch_array($result)){
                $province .= $row['provDesc'] . ",";
                }
                //provincecode1
                $sql = "select * from refprovince order by regCode";
                $result = $conn-> query($sql);
                while ($row=mysqli_fetch_array($result)){
                $provincecode1 .= $row['provDesc']."/".$row['regCode']. ",";
                }
                //provincecode2
                $sql = "select * from refprovince order by regCode";
                $result = $conn-> query($sql);
                while ($row=mysqli_fetch_array($result)){
                $provincecode2 .= $row['provDesc']."/".$row['provCode']. ",";
                }
                //city
                $sql = "select * from refcitymun order by citymunCode";
                $result = $conn-> query($sql);
                while ($row=mysqli_fetch_array($result)){
                $city .= $row['citymunDesc'] . ",";
                }
                //citycode1
                $sql = "select * from refcitymun order by citymunCode";
                $result = $conn-> query($sql);
                while ($row=mysqli_fetch_array($result)){
                $citycode1 .= $row['citymunDesc'] . "/" . $row['regDesc']. "," ;
                }
                //citycode2
                $sql = "select * from refcitymun order by citymunCode";
                $result = $conn-> query($sql);
                while ($row=mysqli_fetch_array($result)){
                $citycode2 .= $row['citymunDesc'] . "/" . $row['provCode']. "," ;
                }
                //citycode3
                $sql = "select * from refcitymun order by citymunCode";
                $result = $conn-> query($sql);
                while ($row=mysqli_fetch_array($result)){
                $citycode3 .= $row['citymunDesc'] . "/" . $row['citymunCode']. "," ;
                }
                //barangay
                $sql = "select * from refbrgy order by citymunCode";
                $result = $conn-> query($sql);
                while ($row=mysqli_fetch_array($result)){
                $barangay .= $row['brgyDesc'] . ",";
                }
                //barangaycode1
                $sql = "select * from refbrgy order by citymunCode";
                $result = $conn-> query($sql);
                while ($row=mysqli_fetch_array($result)){
                $barangaycode1 .= $row['brgyDesc'] . "/" . $row['regCode'].",";
                }
                //barangaycode2
                $sql = "select * from refbrgy order by provCode";
                $result = $conn-> query($sql);
                while ($row=mysqli_fetch_array($result)){
                $barangaycode2 .= $row['brgyDesc'] . "/" . $row['provCode'].",";
                }
                //barangaycode3
                $sql = "select * from refbrgy order by provCode";
                $result = $conn-> query($sql);
                while ($row=mysqli_fetch_array($result)){
                $barangaycode3 .= $row['brgyDesc'] . "/" . $row['citymunCode'].",";
                }





            $response['courses'] = $courses;
            $response['region'] = $region;
            $response['regioncode1'] = $regioncode1;
            $response['province'] = $province;
            $response['provincecode1'] = $provincecode1;
            $response['provincecode2'] = $provincecode2;
            $response['city'] = $city;
            $response['citycode1'] = $citycode1;
            $response['citycode2'] = $citycode2;
            $response['citycode3'] = $citycode3;
            $response['barangay'] = $barangay;
            $response['barangaycode1'] = $barangaycode1;
            $response['barangaycode2'] = $barangaycode2;
            $response['barangaycode3'] = $barangaycode3;








            $response['error'] = false; 
            $response['message'] = ""; 

echo json_encode($response);



?> 

