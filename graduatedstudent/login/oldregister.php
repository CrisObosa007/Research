    <?php 

    include ('dbhelper.php');
    ?>

<?php require_once "controllerUserEmail.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: index.php');
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
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
        <link href="css/multiselect.css?v=<?php echo time();?>" rel="stylesheet"/>
        <script src="multiselect.min.js?v=<?php echo time();?>"></script>
    </head>
    <style type="text/css">
        #success-hidden input[type="checkbox"]{
            display: None;
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
 overflow: auto;
}
.container-success01{
    position: absolute;
  width: 80%;
  margin-left: 10%;
  margin-right: 10%;
  border-radius: 10px;
  color: rgb(1,82,73);
  top: 5vh;
  bottom: 5vh;
    height: 90vh;
  z-index: 10001;
  font-weight: 700;
  text-align: center;
  padding-bottom: 10px; 
  height: auto; 

  text-align: left;
  background: #fff;
  padding: 25px;
  overflow-y: auto;
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
.labelpreview01{
    width: 90px;
    font-size: 2vmin;
    color: #297fa7;
    float: left;
    text-align: left;


}
.outputpreview01{
    font-size: 1.2em;
    float: left;
    text-align: left;


}
.labelpreview{
    font-size: 1.15em;
    color: #101010;
    float: left;
    font-weight: 600;
    font-family: Roboto, "Helvetica Neue", HelveticaNeue, Helvetica, Arial, sans-serif;


}
.outputpreview{
  font-size: 1.2em;
  line-height: normal;
  width: 90%;
  padding: 1%;
  margin-right: 10%;
  box-sizing: border-box;
  color: #000    ;
  position: relative;
  border-radius: 7px;
  text-align: left;
  padding: 5px;
  margin-top: -15px;
/*  text-transform: uppercase; 
  white-space: nowrap;
  overflow: hidden;*/
  text-overflow: ellipsis;
  font-family: Roboto, "Helvetica Neue", HelveticaNeue, Helvetica, Arial, sans-serif;
  font-weight: 500;


}
.editsubmit:hover{
    transform: translate(0, -3px);
}
//icon
.container-successicon1{
 position: fixed;
 width: 100%;
 top: 0;
 left: 0;
 right: 0;
 bottom: 0;
 background: rgba(86,86,86,.30);
 z-index: 10000;
}
.container-successicon01{
  width: 30%;
  padding: 15px;
  left: 30%;
  margin-left: 5%;
  border-radius: 10px;
  color: rgb(1,82,73);
  background: #fff;
  position: absolute;
  top: 17%;
  box-shadow: 3px 3px 3px #000;
  z-index: 10001;
  font-weight: 700;
  text-align: center;
  padding-bottom: 40px; 
  height: 40%; 
  background: #E9E7E7;
}
.container-successicon01 .close-btn{
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
.container-successicon01 .close-btn:hover{
  color:rgba(255,255,255,0.9);
}
.iconlabel{
  position:absolute;
  left:10px;
  top:48px;
  color:#30A3F1;
  color: #fff;
  padding-right: 5px;
  height: 18px;
  font-size: 17px;
  padding-left: 1px;

}
.requiredlabel{
    font-size: 15px;
    color: red;
}
.container1{
 position: fixed;
 width: 100%;
 top: 0;
 left: 0;
 right: 0;
 bottom: 0;
 background: rgba(86,86,86,.80);
 z-index: 10000;
 display :none;  


}
.container01{

}
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
  background-color: red;

}
#checkboxpopup input[type="checkbox"]{
  display: none;
  margin: 0;
}
#termsandcondition input[type="checkbox"]{
  display: block;
  margin: 0;
}
.popup_table{
  position: absolute;
  width: 60%;
  margin-left: 20%;
  margin-right: 20%;
  z-index: 10001;
  font-weight: 700;
  text-align: left;
  background-color: #fff;



  box-shadow: 5px 5px 5px 5px#696969;

}


/*/*margin-bottom: 50px;
min-height: 80%;*/
/* overflow: auto;
    content: "";*/
    /*  text-align: center;*/
/*  padding-bottom: 40px; */
/*  height: auto; */
/*  border-radius: 10px;
  color: rgb(1,82,73);
*/

  @media screen and (max-width: 1200px) {
      .popup_table{
           width: 60%;
  margin-left: 20%;
  margin-right: 20%;
      }
  }
  @media screen and (max-width: 992px) {
      .popup_table{
       width: 60%;
  margin-left: 20%;
  margin-right: 20%;
      }
  }
  @media screen and (max-width: 768px) {
      .popup_table{
          width: 80%;
          margin-left: 10%;
          margin-right: 10%;
      }
  }
  @media screen and (max-width: 576px) {
      .popup_table{
          width: 80%;
          margin-left: 10%;
          margin-right: 10%;
      }
  }
  @media screen and (max-width: 576px) {
      .popup_table{
          width: 80%;
          margin-left: 10%;
          margin-right: 10%;
      }
  }
  .closingtab{
      width: 100%;
      background-color: transparent;
      padding: 0px;
      height: 40px;
      position: sticky;
      top: 0;
  }
  .labelterm2{
      text-decoration: underline;
      color: #297fa7;
      font-size: 2.5vmin;
      font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
      font-weight: 500;
  }
  .labelterm2:hover{
    color: #0c506f;
}
.labelterm1{

  color: #000;
  font-size: 2.5vmin;
  font-family: Roboto,Helvetica Neue, HelveticaNeue, Helvetica, Arial, sans-serif;
  font-weight: 500;
}
.terms{
    background-color: transparent;
    color: #0010fd  ;
    font-size: 2vmin;
    font-style: italic;
    margin-right: 10px; 
    font-family: Roboto, 'Helvetica Neue', HelveticaNeue, Helvetica, Arial, sans-serif;
    font-weight: 500;
    text-decoration-line: underline;
}
.terms:hover{
    color: #2E3BFD;
}
.disagree{
    color: #5790ff;
    background-color: transparent;
    font-size: 2vmin;
    margin-right: 30px; 

    font-weight: 600;
    border: solid 2px #5790ff;
    padding: 10px 10px 10px 10px;
    margin-top: 20px;
    margin-bottom: 20px;
    border-radius: 2px;
}
.disagree:hover{
    color: #4181FD;
    border-color: #4181FD;
}
.agree{
    color: #fff;
    background-color: #5790ff;
    font-size: 2vmin;
    margin-right: 10px; 
    font-weight: 600;
    border: solid 2px #5790ff;
    padding: 10px 20px 10px 20px;
    margin-top: 20px;
    margin-bottom: 20px;
    border-radius: 2px;
    margin-left: 30px;
}
.agree:hover{
    background-color: #4181FD;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">


</script>
<script type="text/javascript">

    function printError(elemId, hintMsg) {
        document.getElementById(elemId).innerHTML = hintMsg;
    }

    function validateForm() {

        var lastname = document.contactForm.lastname.value;
        var firstname = document.contactForm.firstname.value;
        var middlename = document.contactForm.middlename.value;
        var gender = document.contactForm.gender.value;
        var birthdate = document.contactForm.birthdate.value;
        var civilstatus = document.contactForm.civilstatus.value;
        var idno = document.contactForm.idno.value;
        var contact = document.contactForm.contact.value;
        var email = document.contactForm.email.value;
        var specialization = document.contactForm.specialization.value;
        var specializationvalue = [];
        $.each($(".specialization option:selected"), function(){            
            specializationvalue.push(" "+$(this).val());
        });
        specialization1 = specializationvalue.length;



        var classification = document.contactForm.classification.value;
        var yeargraduated = document.contactForm.yeargraduated.value;
        var course = document.contactForm.course.value;
        var region1 = document.contactForm.region1.value;
        var province1 = document.contactForm.province1.value;
        var city1 = document.contactForm.city1.value;
        var barangay1 = document.contactForm.barangay1.value;
        var house = document.contactForm.house.value;
        var review = document.contactForm.review.value;
        var existingemail = document.contactForm.existingemail.value;
        var agreement = document.contactForm.agreement.value;


        var lastnameErr =  firstnameErr = genderErr = birthdateErr = civilstatusErr = idnoErr = contactErr = emailErr = specializationErr = yeargraduatedErr = classificationErr = courseErr = regionErr = provinceErr = cityErr = barangayErr = houseErr =  true;

    // var specializationErr  =  true;

    // Validate Last Name
        if(lastname == "") {
            printError("lastnameErr", "Enter Last Name");
        } else {

          if(/^[0-9]+$/.test(lastname)){
           printError("lastnameErr", "Enter valid Last Name");
       }else{printError("lastnameErr", "");
       lastnameErr = false;
   }
}
     // Validate First Name
if(firstname == "") {
    printError("firstnameErr", "Enter First Name");
} else {

 if(/^[0-9]+$/.test(firstname)){
   printError("firstnameErr", "Enter valid First Name");
}else{printError("firstnameErr", "");
firstnameErr = false;
}
}
     // Validate Middle Name
    // if(middlename == "") {
    //     printError("middlenameErr", "Enter Middle Name");
    // } else {
    //     if(/^[0-9]+$/.test(middlename)){
    //          printError("middlenameErr", "Enter valid Middle Name");
    //       }else{printError("middlenameErr", "");
    //         middlenameErr = false;
    //       }
    // }
     // Validate Gender
if(gender == "") {
    printError("genderErr", "Select Gender");
} else {
    printError("genderErr", "");
    genderErr = false;
}
     // Validate Date of Birth
if(birthdate == "") {
    printError("birthdateErr", "Select Date of Birth");
} else {
    printError("birthdateErr", "");
    birthdateErr = false;
}
     // 
     // Validate Civil Status
if(civilstatus == "") {
    printError("civilstatusErr", "Select Civil Status");
} else {
    printError("civilstatusErr", "");
    civilstatusErr = false;
}

     // Validate ID Number

if(idno == "") {
    printError("idnoErr", "");
    idnoErr = false;   

} else {
    var regex = /^[0-9]\d{7}$/;
    if(regex.test(idno) === false) {
        printError("idnoErr", "Enter exactly 8 number");
    } else{
        printError("idnoErr", "");
        idnoErr = false;
    }
        // printError("idnoErr", "Enter ID Number");
}

if (classification == "Graduating") {
    if(idno == "") {
        printError("idnoErr", "Enter ID Number");
    } else {
          var regex = /^[0-9]\d{7}$/;
    if(regex.test(idno) === false) {
        printError("idnoErr", "Enter exactly 8 number");
    } else{
        printError("idnoErr", "");
        idnoErr = false;
    }
    }
}
    // Validate Contact Number
if(contact == "") {
    printError("contactErr", "Enter Contact Number");
} else {
    var regex = /^[0-9]\d{10}$/;
    if(regex.test(contact) === false) {
        printError("contactErr", "Enter a valid 11 digit contact number");
    } else{
        printError("contactErr", "");
        contactErr = false;
    }
}
    // Validate name
if(email == "") {
    printError("emailErr", "Enter Email Address");
} else {
        // Regular expression for basic email validation
    var regex = /^\S+@\S+\.\S+$/;
    if(regex.test(email) === false) {
        printError("emailErr", "Enter a valid Email Address");
    } else{

        var str_existingemail = existingemail.split(',');
        var existingemail_validation = 0;

        for(var i = 0; i < str_existingemail.length; i++) {


         if (email == str_existingemail[i]) {
           existingemail_validation = 1;
       }



   }


   if (existingemail_validation != 0) {
    printError("emailErr", "Email Already Used");
}else{
    printError("emailErr", "");
    emailErr = false;
}

existingemail_validation = 0;


}
}
    // Validate specialization
if(specialization == "") {
    printError("specializationErr", "Select atleast one");
} else {
    printError("specializationErr", "");
    specializationErr = false;
}
    // Validate Classification
if(classification == "") {
    printError("classificationErr", "Select Classification");
} else {
    printError("classificationErr", "");
    classificationErr = false;
}
if(yeargraduated == "") {
    printError("yeargraduatedErr", "Select Year Graduated");
} else {
    printError("yeargraduatedErr", "");
    yeargraduatedErr = false;
}
     // Validate Course
if(course == "") {
    printError("courseErr", "Select course");
} else {
    printError("courseErr", "");
    courseErr = false;
}


     // Validate Region
if(region1 == "") {
    printError("regionErr", "Select Region");
} else {
    printError("regionErr", "");
    regionErr = false;
}


     // Validate Province
if(province1 == "") {
    printError("provinceErr", "Select Province");
} else {
    printError("provinceErr", "");
    provinceErr = false;
}


     // Validate City
if(city1 == "") {
    printError("cityErr", "Select City");
} else {
    printError("cityErr", "");
    cityErr = false;
}


     // Validate Barangay
if(barangay1 == "") {
    printError("barangayErr", "Select Barangay");
} else {
    printError("barangayErr", "");
    barangayErr = false;
}
if(house == "") {
    printError("houseErr", "Enter Street/House #");
} else {
    printError("houseErr", "");
    houseErr = false;
}

if (agreement == "") {
    document.getElementById('container1').style.display = 'block'
    return false;;
}






if((lastnameErr || firstnameErr || genderErr || birthdateErr || civilstatusErr || idnoErr || contactErr || emailErr || specializationErr || classificationErr || yeargraduatedErr || courseErr || regionErr || provinceErr || cityErr || barangayErr || houseErr) == true) {
    $(document).ready(function(){
        $(this).scrollTop(0);
    });


    return false;
} 

else {
    if (review == "1") {


    }
    if (review == "") {




        var region = document.getElementById("region");
        var strregion = region.value; // 2
        var strregion = region.options[region.selectedIndex].text;

        var province = document.getElementById("province");
        var strprovince = province.value; // 2
        var strprovince = province.options[province.selectedIndex].text;

        var city = document.getElementById("city");
        var strcity = city.value; // 2
        var strcity = city.options[city.selectedIndex].text

        var barangay = document.getElementById("barangay");
        var strbarangay = barangay.value; // 2
        var strbarangay = barangay.options[barangay.selectedIndex].text



        printError("lastnameInfo",lastname);
        printError("firstnameInfo",firstname);
        printError("middlenameInfo",middlename);
        if (middlename == "") {
            printError("middlenameInfo","N/A");
        }
        printError("genderInfo",gender);
        printError("birthdateInfo",birthdate);
        printError("civilstatusInfo",civilstatus);
        printError("idnoInfo",idno);
        if (idno == "") {
            printError("idnoInfo","N/A");
        }
        printError("contactInfo",contact);
        printError("emailInfo",email);
        // if (specialization1 == '1') {
        //     printError("specializationInfo",specialization);
        // }else{
        //     printError("specializationInfo",specialization + " etc.");

        // }    
            // var allspecializationvalue = "";
            // var str_specializationvalue = specializationvalue.split(',');


            // for(var x = 0; x < str_specializationvalue.length; text++) {

            //  allspecializationvalue = allspecializationvalue + str_specializationvalue[x];

            // }




        printError("specializationInfo",specializationvalue);
        if (classification == "Graduated") {
            classification = "Alumni";
        }
        
        printError("classificationInfo",classification);
        printError("yeargraduatedInfo",yeargraduated);
        printError("courseInfo",course);
        printError("regionInfo",strregion);
        printError("provinceInfo",strprovince);
        printError("cityInfo",strcity);
        printError("barangayInfo",strbarangay);
        printError("houseInfo",house);
        document.getElementById('success-hidden').style.display = 'block';

        return false;

        
    }


}
};


function reviewsubmit(){
    if (document.getElementById('review1').checked) {

        document.getElementById('success-hidden').style.display = 'none';
        document.getElementById("Register").click();
        document.getElementById("Register").disabled=true;



    }
    if (document.getElementById('review0').checked) {
        document.getElementById('success-hidden').style.display = 'none';
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
</style>
<body>
    <div id="loading">
        <img id="loading-image" src="images/loading.gif" alt="Loading..." />
    </div>
    <script type="text/javascript">
      setTimeout(function() {
          $('#success').hide()
      }, 2000);
  </script>

  <script type="text/javascript">
      setTimeout(function() {
          $('#infosuccess').hide()
      }, 10000);
  </script>


  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendor/animsition/js/animsition.min.js"></script>
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="vendor/select2/select2.min.js"></script>
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
  <script src="vendor/countdowntime/countdowntime.js"></script>
  <script src="js/main.js"></script>



  <div class="limiter" id="form2" style="display: block;">
    <div class="container-login100" style="background-color: #07435f;">
        <div class="wrap-login200 p-l-50 p-r-50 p-t-50 p-b-50" style="background-color:#F7F5F5">

           <form action='server.php' class='form' method="POST" name="contactForm" onsubmit="return validateForm()">
            <?php 
            $existingemail = "";
            $sql = "select email from signup";
            $result = $conn-> query($sql);

            while ($row=mysqli_fetch_array($result)){
                $existingemail .= $row['email'] . ",";


            }
            echo "<input type='hidden' name='existingemail' id='existingemail'  value='".$existingemail."'>";             

            ?>







            <div id="success-hidden" style="display: none;">
              <input type="checkbox" id="tablesuccess"><label for="tablesuccess"  class=""></label>
              <div class="container-success1" id="successtransition">
                  <div class="container-success01" style="background-color: #fff;;" >
                      <!--              ---------------------START PRIMARY INFORMATION---------------------------- -->
                      <p class='field whole' style="padding: 0px;margin: 0px;" align="left">
                         <label style="color: #0c506f;font-size: 1.4em;font-family: Avantgarde, TeX Gyre Adventor, URW Gothic L, sans-serif;font-weight: 600;">Primary Information</label>
                     </p> 
                     <p class='field half' style="float:left;">
                        <label class='labelpreview'>ID Number</label>
                        <label id="idnoInfo" class="outputpreview">20181464</label>
                    </p>
                    <p class='field secondhalf 'style="float:left;">
                        <label class='labelpreview'>Course</label>
                        <label id="courseInfo" class="outputpreview">BSIT - BS in Information Technology</label>
                    </p>
                    <p class='field half' style="float:left;">
                        <label class='labelpreview'>Classification</label>
                        <label id="classificationInfo" class="outputpreview">Graduating</label>
                    </p>
                    <p class='field half' style="float:left;">
                        <label class='labelpreview'>Year</label>
                        <label id="yeargraduatedInfo" class="outputpreview">2023</label>
                    </p>
                    <p class='field whole' style="float:left;">
                        <label class='labelpreview'>Specialization</label>
                        <label id="specializationInfo" class="outputpreview">Accounting/Finance, Admin/Human Resources, Sales/Marketing, Arts/Media/Communications, Services, Hotel/Restaurant, Education/Training, Computer/Information Technology, Engineering, Manufacturing, Building/Construction, Sciences, Healthcare, Journalst/Editors, General Work, Publishing</label>
                    </p>



                    <!--              ---------------------END PRIMARY INFORMATION---------------------------- -->


                    <!--              ---------------------START SECONDARY INFORMATION---------------------------- -->
                    <p class='field whole' style="padding: 0px;margin: 0px;" align="left">
                     <label style="color: #0c506f;font-size: 1.4em;font-family: Avantgarde, TeX Gyre Adventor, URW Gothic L, sans-serif;font-weight: 600;width: 100%;margin-top: 10px;">Secondary Information</label>
                 </p> 

                 <p class='field half' style="float:left;">
                    <label class='labelpreview'>Lastname</label>
                    <label id="lastnameInfo" class="outputpreview">OBOSA</label>
                </p>
                <p class='field half' style="float:left;">
                    <label class='labelpreview'>Firstname</label>
                    <label id="firstnameInfo" class="outputpreview">CRIS</label>
                </p>
                <p class='field half' style="float:left;">
                    <label class='labelpreview'>Middlename</label>
                    <label id="middlenameInfo" class="outputpreview">RAGOJOS</label>
                </p>
                <p class='field half' style="float:left;">
                    <label class='labelpreview'>Gender</label>
                    <label id="genderInfo" class="outputpreview">MALE</label>
                </p>
                <p class='field secondhalf' style="float:left;">
                    <label class='labelpreview'>Email</label>
                    <label id="emailInfo" class="outputpreview" style="text-transform:none;">crisuser1234@gmail.com</label>
                </p>
                <p class='field half' style="float:left;">
                    <label class='labelpreview'>Contact</label>
                    <label id="contactInfo" class="outputpreview">09983931427</label>
                </p>
                <p class='field half' style="float:left;">
                    <label class='labelpreview'>Birthdate</label>
                    <label id="birthdateInfo" class="outputpreview">11-21-19999</label>
                </p>
                <p class='field half' style="float:left;">
                    <label class='labelpreview'>Civil Status</label>
                    <label id="civilstatusInfo" class="outputpreview">Single</label>
                </p>

                <!--              --------------------END SECONDARY INFORMATION---------------------------- -->


                <!--              ---------------------START HOME ADDRESS---------------------------- -->
                <p class='field' style="padding: 0px;margin: 0px;" align="left">
                    <label style="color: #0c506f;font-size: 1.4em;font-family: Avantgarde, TeX Gyre Adventor, URW Gothic L, sans-serif;font-weight: 600;width: 100%;margin-top: 10px;">Permanent Home Address</label>
                </p> 
                <p class='field half' style="float:left;">
                    <label class='labelpreview'>Region</label>
                    <label id="regionInfo" class="outputpreview">Region I</label>
                </p> 
                <p class='field half' style="float:left;">
                    <label class='labelpreview'>Province</label>
                    <label id="provinceInfo" class="outputpreview">Pangasinan</label>
                </p>
                <p class='field half' style="float:left;">
                    <label class='labelpreview'>City</label>
                    <label id="cityInfo" class="outputpreview">Manaoag</label>
                </p>
                <p class='field half' style="float:left;">
                    <label class='labelpreview'>Barangay</label>
                    <label id="barangayInfo" class="outputpreview">Pantal</label>   
                </p>
                <p class='field secondhalf' style="float:left;">
                    <label class='labelpreview'>Street/House #</label>
                    <label id="houseInfo" class="outputpreview">Zone 2</label>
                </p>
                <!--              ---------------------END HOME ADDRESS---------------------------- -->
                <br><br><br>



                <p class='field whole' style="text-align:right">
                    <input type="radio" name="review" value=""  id="review0" onclick="javascript:reviewsubmit();" style="display:none">
                    <label for="review0" style="background-color: #07435f;color: #fff;font-size: 2vmin;padding: 10px;border-radius: 5px;margin-right: 10px;  font-family: Roboto, 'Helvetica Neue', HelveticaNeue, Helvetica, Arial, sans-serif;font-weight: 500;" class="editsubmit">Edit Profile</label>
                    <input type="radio" name="review" value="1" id="review1" onclick="javascript:reviewsubmit();" style="display:none">
                    <label for="review1" style="background-color: #07435f;color: #fff;font-size: 2vmin;ont-family: Roboto, 'Helvetica Neue', HelveticaNeue, Helvetica, Arial, sans-serif;font-weight: 500;padding: 10px;border-radius: 5px;margin-right: 10px;" class="editsubmit">Submit</label>
                </p>







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
</div> 







<p class='field whole' style="text-left: center;margin-top: -40px;">
    <label style="font-style: italic;color: #0c506f;font-size: 13px;text-align: justify;"><label style="color: red;">Note:</label> Kindly fill up your true information. Rest assured that the data you provided will be kept strictly confidential and will not be shared with any other company or organization</label>
</p>
<!-- ---------------------------------------------START PRIMARY INFORMATION------------------------------------- -->
<p class='field whole' style="padding: 15px 0px 0px 0px;">
    <label style="color: #0c506f;font-size: 25px;font-family: Avantgarde, TeX Gyre Adventor, URW Gothic L, sans-serif;font-weight: 600;">Primary Information</label>
</p>
<p class='field  half' style="position:relative;;">
    <label class='label' >ID Number</label>
    <input type="number" class='text-input' id='idno' name='idno'  type='number' placeholder="ID Number"  style="color: #fff;background-color: #0c506f;padding-left: 35px;">
    <label id="idnoErr" class="failed"></label>
    <i class="fa fa-id-card iconlabel" style="margin-top: -8px;"></i>
</p>
<p class='field  secondhalf' style="position:relative;">
    <label class='label'>Course/Degree <label class="requiredlabel">*</label></label>
    <select class="text-input" name="course"  style="color: #fff;background-color: #0c506f;padding-left: 35px;">
        <option disabled selected value="">Select</option>
        <?php 

        $sql = "select * from user where college != '' GROUP by course ASC";
        $result = $conn-> query($sql);

        while ($row=mysqli_fetch_array($result)){
            echo "<option value='".$row['course']."'>".$row['course']."</option>";

        }


        ?>

    </select>
    <label id="courseErr" class="failed"></label>
    <i class="fas fa-award iconlabel"></i>
</p>



<style type="text/css">
   #specialization_multiSelect {
       font: inherit;
       width: 100%;
       box-sizing: border-box;
       background: #fff;
       position: relative;
       background-color: transparent;
       border-radius: 7px;
       padding: 0px;
       margin: 0px;
   }
   #specialization_input {
    background-color: #0c506f;
    border-radius: 7px;
    color: #fff;
    width: 100%;
    padding-left: 35px;
    line-height: normal;
    font-size: 15px;
    height: 40px;
}
#specialization_itemList {
    background-color: #0c506f;
    color: #fff;
    width: 100%;
    z-index: 1000;
    font-size: 15px;
}
.multiselect-text{
    font-size: 14px;
}



</style>
<script type="text/javascript">
 var options = document.getElementById('specialization').selectedOptions;
 var values = Array.from(options).map(({ value }) => value);
 console.log(values);
</script>
<p class='field half' style="height:97px;background-color: transparent;position: relative;" >
    <label class='label'>specialization <label class="requiredlabel">*</label></label>  
    <select  id='specialization' name="specialization[]" class="specialization"  style="color: #fff;background-color: #0c506f;" class="text-input" multiple>
        <option value='Accounting/Finance'>Accounting/Finance</option>
        <option value='Admin/Human Resources'>Admin/Human Resources</option>
        <option value='Sales/Marketing'>Sales/Marketing</option>
        <option value='Arts/Media/Communications'>Arts/Media/Communications</option>
        <option value='Services'>Services</option>
        <option value='Hotel/Restaurant'>Hotel/Restaurant</option>
        <option value='Education/Training'>Education/Training</option>
        <option value='Computer/Information Technology'>Computer/Information Technology</option>
        <option value='Engineering'>Engineering</option>
        <option value='Manufacturing'>Manufacturing</option>
        <option value='Building/Construction'>Building/Construction</option>
        <option value='Sciences'>Sciences</option>
        <option value='Healthcare'>Healthcare</option>
        <option value='Journalst/Editors'>Journalst/Editors</option>
        <option value='General Work'>General Work</option>
        <option value='Publishing'>Publishing</option>
    </select>
    <label id="specializationErr" class="failed" style="margin-top: 5px;"></label>
    <i class="fa fa-cogs iconlabel" style="padding-top: 5px;margin-top: -10px;"></i>
</p>

<script>
    document.multiselect('#specialization')
    .setCheckBoxClick("checkboxAll", function(target, args) {
        console.log("Checkbox 'Select All' was clicked and got value ", args.checked);
    })
    .setCheckBoxClick("1", function(target, args) {
        console.log("Checkbox for item with value '1' was clicked and got value ", args.checked);
    });


</script>


<p class='field half' style="background-color:transparent;position: relative;">
    <label class='label'>Classification <label class="requiredlabel">*</label></label>
    
    <select class="text-input" name="classification" id="classification"  style="color: #fff;background-color: #0c506f;padding-left: 35px;">
        <option disabled selected value="">Select</option>
        <option value="Graduated">Alumni</option>
        <option value="Graduating">Graduating</option>
    </select>
    <label id="classificationErr" class="failed"></label>
    <i class="fa fa-graduation-cap iconlabel"></i>
</p>
<script type="text/javascript">
  $("#classification").change(function() {
      if ($(this).val() == "Graduated") {
        $('.graduated1').show();
        $('.graduated2').hide();
        document.getElementById("yearselected").selected = "true";
    } 
    if ($(this).val() == "Graduating") {
        $('.graduated1').hide();
        $('.graduated2').show();
        document.getElementById("yearselected").selected = "true";
    } 
});
  $("#classification").trigger("change");


</script>
<p class='field half'  style="position:relative;">
    <label class='label'>Year Graduated <label class="requiredlabel">*</label></label>
    <?php
    date_default_timezone_set('Asia/Manila');
    $time = date('g:i a');
    $date= date("Y");;
    ?>
    <select class="text-input" name="yeargraduated"  style="color: #fff;background-color: #0c506f;padding-left: 35px;">
        <option disabled selected value="" id="yearselected">Select</option>
        <?php

        for ($i = $date; $i > 1980; $i--)  {
            $ii = $i - 1;
            echo "<option value='".$ii."' style='display:none' class='graduated1'>".$ii."</option>";
        }

        date_default_timezone_set('Asia/Manila');
        $time = date('g:i a');
        $date= date("Y") + 1;
        $date2 = $date + 2;
        for ($i = $date; $i < $date2; $i++)  {
            $ii = $i - 1;
            echo "<option value='".$ii."' style='display:none' class='graduated2'>".$ii."</option>";
        }
        
        ?>
    </select>
    <label id="yeargraduatedErr" class="failed"></label>
    <i class="fa fa-calendar iconlabel"></i>
</p>

<!-- ---------------------------------------------END PRIMARY INFORMATION------------------------------------- -->


<!-- ---------------------------------------------START SECONDARY INFORMATION------------------------------------- -->
<p class='field whole' style="padding: 0px;margin: 0px;">
    <label style="color: #0c506f;font-size: 25px;font-family: Avantgarde, TeX Gyre Adventor, URW Gothic L, sans-serif;font-weight: 600;">Secondary Information</label>
</p>
<p class='field  half' style="position:relative;">
    <label class='label' >Last Name <label class="requiredlabel">*</label></label>
    <input class='text-input' id='lastname' name='lastname' placeholder="Last Name" style="color: #fff;background-color: #0c506f;padding-left: 35px;">
    <label id="lastnameErr" class="failed"></label>
    <i class="fa fa-user iconlabel"></i>
</p>
<p class='field half' style="position:relative;">
    <label class='label'>First Name <label class="requiredlabel">*</label></label>
    <input class='text-input' id='firstname' name='firstname' placeholder="First Name"  style="color: #fff;background-color: #0c506f;padding-left: 35px;">
    <label id="firstnameErr" class="failed"></label>
    <i class="fa fa-user iconlabel"></i>
</p>
<p class='field half 'style="position:relative;">
    <label class='label'>Middle Name</label>
    <input class='text-input' id='middlename' name='middlename' placeholder="Middle Name"  style="color: #fff;background-color: #0c506f;padding-left: 35px;">
    <label id="middlenameErr" class="failed"></label>
    <i class="fa fa-user iconlabel" style="margin-top: -8px;"></i>
</p>
<p class='field  half' style="position:relative;">
    <label class='label'>Gender <label class="requiredlabel">*</label></label>
    <input type="radio" name="gender" value="Male" style="height: 15px;width: 15px;margin-right: 5px;">
    <label style="font-size: 17px;color: #0c506f;margin-right: 20px;">Male</label>
    <input type="radio" name="gender" value="Female" style="height: 15px;width: 15px;margin-right: 5px;">
    <label style="font-size: 17px;color: #0c506f;">Female</label><br>
    <label id="genderErr" class="failed"></label>
</p>
<p class='field  secondhalf' style="position:relative;">
    <label class='label' >Email <label class="requiredlabel">*</label></label>
    <input type="text" class='text-input' id='email' name='email' placeholder="eg.ucu@gmail.com"  style="color: #383838;background-color: #E8E8E8;padding-left: 35px;" value="<?php echo $email; ?>" readonly>
    <label id="emailErr" class="failed"></label>
    <i class="fa fa-envelope iconlabel" style="color:#A8A8A8"></i>
</p>
<p class='field  half' style="position:relative;">
    <label class='label' >Contact # <label class="requiredlabel">*</label></label>
    <input type="number" class='text-input' id='contact' name='contact'  placeholder="eg. 09919290121"  style="color: #fff;background-color: #0c506f;padding-left: 35px;">
    <label id="contactErr" class="failed"></label>
    <i class="fa fa-address-book iconlabel"></i>
</p>
<p class='field half' style="position:relative;">
    <label class='label' >Date of Birth <label class="requiredlabel">*</label></label>
    <input class='text-input' id='date' name='birthdate' type='date'  style="color: #fff;background-color: #0c506f;color-scheme: dark;">
    <label id="birthdateErr" class="failed"></label>
</p>
<p class='field half ' style="position:relative;">
    <label class='label'>Civil Status <label class="requiredlabel">*</label></label>
    <select class="text-input" name="civilstatus"  style="color: #fff;background-color: #0c506f;padding-left: 35px;">
        <option disabled selected value="" >Select</option>
        <option value="Single">Single</option>
        <option value="Married">Married</option>
        <option value="Separated">Separated</option>
        <option value="Single Parent">Single Parent</option>
        <option value="Widow/er">Widow/er</option>
    </select>
    <label id="civilstatusErr" class="failed"></label>
    <i class="fa fa-list iconlabel"></i>
</p>
<p class='field half '>
</p>


<!-- ---------------------------------------------END SECONDARY INFORMATION------------------------------------- -->


<!-- ---------------------------------------------START HOME ADDRESS------------------------------------- -->
<p class='field whole' style="padding: 15px 0px 0px 0px;margin: 0px;">
    <label style="color: #0c506f;font-size: 20px;font-family: Avantgarde, TeX Gyre Adventor, URW Gothic L, sans-serif;font-weight: 600;">Permanent Home Address</label>
</p>
<p class='field half' style="position:relative;">
    <label class='label'>Region <label class="requiredlabel">*</label></label>
    <input type="hidden" name="region"/>
    <select id="region" class="text-input" name="region1"  style="color: #fff;background-color: #0c506f;padding-left: 35px;"></select>
    <label id="regionErr" class="failed"></label>
    <i class="fa fa-map-marker iconlabel"></i>
</p>
<p class='field half' style="position:relative">
    <label class='label'>Province <label class="requiredlabel">*</label></label>
    <input type="hidden" name="province"/><select id="province" class="text-input" name="province1"  style="color: #fff;background-color: #0c506f;padding-left: 35px;"></select>
    <label id="provinceErr" class="failed" ></label>
    <i class="fa fa-map-marker iconlabel"></i>
</p>

<p class='field half' style="position:relative;">
    <label class='label'>City <label class="requiredlabel">*</label></label>
    <input type="hidden" name="city"/>
    <select id="city" class="text-input" name="city1"  style="color: #fff;background-color: #0c506f;padding-left: 35px;"></select>
    <label id="cityErr" class="failed"></label>
    <i class="fa fa-map-marker iconlabel"></i>
</p>

<p class='field half' style="position:relative;">
    <label class='label'>Barangay <label class="requiredlabel">*</label></label>
    <input type="hidden" name="barangay"/><select id="barangay" class="text-input" name="barangay1"  style="color: #fff;background-color: #0c506f;padding-left: 35px;"></select>
    <label id="barangayErr" class="failed"></label>
    <i class="fa fa-map-marker iconlabel"></i>
</p>
<p class='field  secondhalf' style="position:relative">
    <label class='label' >Street/House # <label class="requiredlabel">*</label></label>
    <input type="text" class='text-input' id='house' name='house'  type='number' placeholder="Street/House #"  style="color: #fff;background-color: #0c506f;padding-left: 35px;">
    <label id="houseErr" class="failed"></label>
    <i class="fa fa-map-marker iconlabel"></i>
</p>


<!-- ---------------------------------------------END HOME ADDRESS------------------------------------- -->
<!-- ---------------------------------------------START CHECK VALIDATION------------------------------------- -->
<p class='field  whole' style="position:relative">

    <div class="" style="width: auto;position: relative;"><label class="labelterm1"></label>
        <div id="checkboxpopup" style="position: relative;width: auto;display: inline;">

         <input type='checkbox' id='apopup'>
         <!-- <label for='apopup' class="labelterm2">Terms and Condition.</label> -->
         <input type="radio" name="termshow1" value=""  id="termshow1" onclick="javascript:showterms();" style="display:none">
         <div style="width:100%; display: flex;">

            <img src="images/agree.png" style="width:15px;height: 15px;margin-right: 5px;display: none;" id="imageagree">

            <img src="images/disagree.png" style="width:15px;height: 15px;margin-right: 5px;display: none;" id="imagedisagree"> 

            <label for="termshow1"class="terms"style='display: inline-block' >Read & accept the terms and Conditions.</label>
        </div>




        <div class='container1' id="container1">

          <div class='container01'>


            <table class='popup_table'>


                <tr>
                  <td style="background-color: #fff;border-radius: 10px;">
                    <!-- <div class='closingtab'> -->
                        <!-- <label for='apopup' class='close-btn1 fas fa-times' title='close'></label> -->

<!--                             <input type="radio" name="termshide" value=""  id="termshide1" onclick="javascript:hideterms();" style="display:none">
    <label for="termshide1" style="background-color: #07435f;color: #fff;font-size: 2vmin;padding: 10px;border-radius: 5px;margin-right: 10px;  font-family: Roboto, 'Helvetica Neue', HelveticaNeue, Helvetica, Arial, sans-serif;font-weight: 500;" class="editsubmit">Edit Profile</label> -->

<!-- </div> -->
<?php
include('termsandcondition.php');
?>

</td>
</tr>


</table>
<script type="text/javascript">
    function disagreeterms(){
        document.getElementById('imagedisagree').style.display = 'block';
        document.getElementById('imageagree').style.display = 'none';
        document.getElementById('container1').style.display = 'none';

    }
    function agreeterms(){
        document.getElementById('imagedisagree').style.display = 'none';
        document.getElementById('imageagree').style.display = 'block';
        document.getElementById('container1').style.display = 'none';

    }
    function showterms(){
      document.getElementById('container1').style.display = 'block';

  }
</script>
</div>
</div>
<style>#apopup:checked ~ .container1{display: block;visibility: visible;}</style>


</div>
</div>

</p>
<!-- ---------------------------------------------END CHECK VALIDATION------------------------------------- -->

















<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
<script src="js/jquery.ph-locations-v1.0.1.js"></script>
<!--  <script type="text/javascript" src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations.js"></script> -->
<!--   <script src="js/jquery.ph-locations.js"></script>
    <script src="js/jquery.ph-locations-v1.0.0.js"></script> -->

    <!-- <script src="js/jquery-3.4.1.min.js"></script> -->

    <script type="text/javascript">

        var my_handlers = {

            fill_provinces:  function(){

                var region_code = $(this).val();
                $('#province').ph_locations('fetch_list', [{"region_code": region_code}]);

            },

            fill_cities: function(){

                var province_code = $(this).val();
                $('#city').ph_locations( 'fetch_list', [{"province_code": province_code}]);
            },


            fill_barangays: function(){

                var city_code = $(this).val();
                $('#barangay').ph_locations('fetch_list', [{"city_code": city_code}]);
            }
        };

        $(function(){
            $('#region').on('change', my_handlers.fill_provinces);
            $('#province').on('change', my_handlers.fill_cities);
            $('#city').on('change', my_handlers.fill_barangays);

            $('#region').ph_locations({'location_type': 'regions'});
            $('#province').ph_locations({'location_type': 'provinces'});
            $('#city').ph_locations({'location_type': 'cities'});
            $('#barangay').ph_locations({'location_type': 'barangays'});

        });
    </script>
    <script type="text/javascript">
        $(function(){
           $('#region').on('change', function(){
               var selected_caption = $("#region option:selected").text();
               $('input[name=region]').val(selected_caption);
           }).ph_locations('fetch_list');});

        $(function(){
           $('#province').on('change', function(){
               var selected_caption = $("#province option:selected").text();
               $('input[name=province]').val(selected_caption);
           }).ph_locations('fetch_list');});

        $(function(){
           $('#city').on('change', function(){
               var selected_caption = $("#city option:selected").text();
               $('input[name=city]').val(selected_caption);
           }).ph_locations('fetch_list');});

        $(function(){
           $('#barangay').on('change', function(){
               var selected_caption = $("#barangay option:selected").text();
               $('input[name=barangay]').val(selected_caption);
           }).ph_locations('fetch_list');});


       </script>


       <p class='field whole'>
           <style type="text/css">
            .register{

            }
            .register:hover{
                background-color: #004002;
                box-shadow: 0px 3px 10px rgba(0, 0, 0, 0);
                color: #fff;
                transform: translateY(-4px);

            }
        </style>
        <input class='button register' type='submit' value='Register' id="Register" name="send" style="background-color: #003C58;color: #fff;margin-top: 20px;">
    </p>
</form>
<script type="text/javascript">       
    class magicFocus

    constructor: (@parent) ->

    return unless @parent

    @focus = document.createElement 'div'
    @focus.classList.add 'magic-focus'
    @parent.classList.add 'has-magic-focus'
    @parent.appendChild @focus

    for input in @parent.querySelectorAll('input, textarea, select')      
      input.addEventListener 'focus', ->
  window.magicFocus.show()
  input.addEventListener 'blur', ->
  window.magicFocus.hide()

  show: =>

  return unless ['INPUT','SELECT','TEXTAREA'].includes? (el = document.activeElement).nodeName

  clearTimeout(@reset)

  el = document.querySelector("[for=#{el.id}]") if ['checkbox', 'radio'].includes? el.type

  @focus.style.top = "#{el.offsetTop||0}px"
  @focus.style.left = "#{el.offsetLeft||0}px"
  @focus.style.width = "#{el.offsetWidth||0}px"
  @focus.style.height = "#{el.offsetHeight||0}px"

  hide: =>

  @focus.style.width = 0 unless ['INPUT','SELECT','TEXTAREA', 'LABEL'].includes? (el = document.activeElement).nodeName

  @reset = setTimeout ->
  window.magicFocus.focus.removeAttribute('style')
  , 200

  # initialize

  window.magicFocus = new magicFocus document.querySelector('.form')

  $ ->
$('.select').customSelect()</script>
</div>
</div>
</div>
<div class="limiter" id="form3" style="display:none">
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login100 p-l-50 p-r-50 p-t-50 p-b-50">
            <form class="login100-form validate-form" style="text-align:center;" method="POST" action="server.php">
                <span style="text-align:center;">
                    <img src="images/ucu.png" style="width:100px;">
                </span>
                <div class="wrap-input100 validate-input" data-validate="Password is required" style="text-align:left">
                    <span class="label-input100">Email</span>
                    <input class="input100" type="text" name="emailrecovery" placeholder="Enter Email">
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                </div>


                <div class="container-login100-form-btn m-t-40">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="submitrecovery">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
  $(window).on('load', function () {
    $('#loading').hide();
}) 
</script>
</body>
</html>