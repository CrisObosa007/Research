<?php
session_start();
include '../dbhelper.php'; 
 $username = $_SESSION['username'];
  if ($username != "") {
  $username = $_SESSION['username'];
  $sql = "SELECT * FROM college WHERE username='$username'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $college = $row['college'];

}
// --------------------------news1 start-----------------------------------------------------
if (isset($_POST['export_excel_event1'])) {

 $sql = "SELECT * FROM event  order by eventdate ASC";


      $output;
      $output = "<table>
      <th>Date Uploaded</th>
         <th>Event Title</th>  
        <th>Start Date</th>  
        <th>End Date</th>  
        <th>Start Time</th>  
        <th>End Time</th>  
        <th>Venue</th>  
        <th>Address</th>  
        <th>Description</th>  
        <th>Event Type</th>  
        <th>Organizer</th>  
        <th>Sponsor</th>  
        <th>Interested</th>  
        <th>Not Interested</th>  
 
         "     ;
       $result = $conn-> query($sql);
        if ($result-> num_rows > 0 ){
        while ($row=mysqli_fetch_array($result)){


         $interested = $row['interested'];
                            $interestedresult = 0; 
                            $splitinterested = explode(',', $interested);  
                            for($i=0; $i<sizeof($splitinterested); $i++){
                              if ($splitinterested[$i] != "") {
                               $interestedresult++;
                             }

                           }

                           $notinterested = $row['notinterested'];
                           $notinterestedresult = 0; 
                           $notsplitinterested = explode(',', $notinterested);  
                           for($i=0; $i<sizeof($notsplitinterested); $i++){
                            if ($notsplitinterested[$i] != "") {
                             $notinterestedresult++;
                           }

                         }
              $eventdate = $row['eventdate'];
                            $eventdate = strtotime($eventdate);
                            $eventdate= date("F d Y" , $eventdate);


        $output .= "
        <tr>
        <td>".$eventdate."</td>
        <td>".$row['eventdetail']."</td>
        <td>".$row['startdate']."</td>
        <td>".$row['enddate']."</td>
            <td>".$row['starttime']."</td>
        <td>".$row['endtime']."</td>
        <td>".$row['venue']."</td>
            <td>".$row['address']."</td>
        <td>".$row['description']."</td>
        <td>".$row['eventtype']."</td>
            <td>".$row['organizer']."</td>
        <td>".$row['sponsor']."</td>
           <td>".$interestedresult."</td>
           <td>".$notinterestedresult."</td>




        </tr>";
            }
        }

      $output .= "</table>";
      header("Content-Type: application/xls");
      header("Content-Disposition: attachment; filename=event.xls");
      echo $output;

      ;
}
if (isset($_POST['export_excel_event2'])) {

 $sql = "SELECT * FROM event where uploadedevent = '$college' order by eventdate ASC";




      $output;
      $output = "<table>
      <th>Date Uploaded</th>
         <th>Event Title</th>  
        <th>Start Date</th>  
        <th>End Date</th>  
        <th>Start Time</th>  
        <th>End Time</th>  
        <th>Venue</th>  
        <th>Address</th>  
        <th>Description</th>  
        <th>Event Type</th>  
        <th>Organizer</th>  
        <th>Sponsor</th>  
        <th>Interested</th>  
        <th>Not Interested</th>  
 
         "     ;
       $result = $conn-> query($sql);
        if ($result-> num_rows > 0 ){
        while ($row=mysqli_fetch_array($result)){

              $eventdate = $row['eventdate'];
                            $eventdate = strtotime($eventdate);
                            $eventdate= date("F d Y" , $eventdate);
                             
         $interested = $row['interested'];
                            $interestedresult = 0; 
                            $splitinterested = explode(',', $interested);  
                            for($i=0; $i<sizeof($splitinterested); $i++){
                              if ($splitinterested[$i] != "") {
                               $interestedresult++;
                             }

                           }

                           $notinterested = $row['notinterested'];
                           $notinterestedresult = 0; 
                           $notsplitinterested = explode(',', $notinterested);  
                           for($i=0; $i<sizeof($notsplitinterested); $i++){
                            if ($notsplitinterested[$i] != "") {
                             $notinterestedresult++;
                           }

                         }

        $output .= "
        <tr>
        <td>".$eventdate."</td>
        <td>".$row['eventdetail']."</td>
        <td>".$row['startdate']."</td>
        <td>".$row['enddate']."</td>
            <td>".$row['starttime']."</td>
        <td>".$row['endtime']."</td>
        <td>".$row['venue']."</td>
            <td>".$row['address']."</td>
        <td>".$row['description']."</td>
        <td>".$row['eventtype']."</td>
            <td>".$row['organizer']."</td>
        <td>".$row['sponsor']."</td>
                 <td>".$interestedresult."</td>
           <td>".$notinterestedresult."</td>



        </tr>";
            }
        }

      $output .= "</table>";
      header("Content-Type: application/xls");
      header("Content-Disposition: attachment; filename=event.xls");
      echo $output;

      ;
}
// --------------------------news1 close-----------------------------------------------------
  ?>