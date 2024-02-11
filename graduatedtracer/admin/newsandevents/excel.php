<?php
session_start();
include '../dbhelper.php'; 

if (isset($_POST['export_excel_news1'])) {
        $output;
      $output = "<table>
          <th style='border-bottom:solid 1px;width: 18%;'>Uploaded</th>  
      <th style='border-bottom:solid 1px;width: 18%;'>News Title</th>  
        <th style='border-bottom:solid 1px;width: 18%;'>Description</th>  " ;
        $sql = "SELECT * FROM news order by newsdate ASC";
        $result = $conn-> query($sql);
      if ($result-> num_rows > 0 ){
      while ($row=mysqli_fetch_array($result)){

        $output .= "
        <tr>
        <td>".$row['newscollege']."</td>
        <td>".$row['newsdetail']."</td>
        <td>".$row['description']."</td>

        </tr>";

          
    }
  }

      $output .= "</table>";
      header("Content-Type: application/xls");
      header("Content-Disposition: attachment; filename=AllNews.xls");
      echo $output;

      ;

}
if (isset($_POST['export_excel_news2'])) {
        $output;
      $output = "<table>
          <th style='border-bottom:solid 1px;width: 18%;'>Uploaded</th>  
      <th style='border-bottom:solid 1px;width: 18%;'>News Title</th>  
        <th style='border-bottom:solid 1px;width: 18%;'>Description</th>  " ;
        $sql = "SELECT * FROM news where newscollege = 'admin' order by newsdate ASC";
        $result = $conn-> query($sql);
      if ($result-> num_rows > 0 ){
      while ($row=mysqli_fetch_array($result)){

        $output .= "
        <tr>
        <td>".$row['newscollege']."</td>
        <td>".$row['newsdetail']."</td>
        <td>".$row['description']."</td>

        </tr>";

          
    }
  }

      $output .= "</table>";
      header("Content-Type: application/xls");
      header("Content-Disposition: attachment; filename=UploadedNews.xls");
      echo $output;

      ;

}
if (isset($_POST['export_excel_event1'])) {
        $output;
      $output = "<table>
          <th>Uploaded</th>
          <th>College_Event</th>
          <th>Event_Title</th>
          <th>Start_Date</th>
          <th>Start_Time</th>
          <th>End_Date</th>
          <th>End_Time</th>
          <th>Venue</th>
          <th>Address</th>
          <th>Event_Type</th>
          <th>Description</th>
          <th>Organizers</th>
          <th>Sponsors</th>
          <th>Uploaded_Date</th>
          <th>Interested</th>
          <th>Not_Interested</th>


         " ;
        $sql = "SELECT * FROM event";
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


        $output .= "
        <tr>
        <td>".$row['uploadedevent']."</td>
        <td>".$row['eventcollege']."</td>
        <td>".$row['eventdetail']."</td>
        <td>".$row['startdate']."</td>
        <td>".$row['starttime']."</td>
        <td>".$row['enddate']."</td>
        <td>".$row['endtime']."</td>
        <td>".$row['venue']."</td>
        <td>".$row['address']."</td>
        <td>".$row['eventtype']."</td>
        <td>".$row['description']."</td>
        <td>".$row['organizer']."</td>
        <td>".$row['sponsor']."</td>
        <td>".$row['eventdate']."</td>
        <td>".$interestedresult."</td>
        <td>".$notinterestedresult."</td>

        </tr>";

          
    }
  }

      $output .= "</table>";
      header("Content-Type: application/xls");
      header("Content-Disposition: attachment; filename=AllEvents.xls");
      echo $output;

      ;

}
if (isset($_POST['export_excel_event2'])) {

        $output;
      $output = "<table>
          <th>Uploaded</th>
          <th>College_Event</th>
          <th>Event_Title</th>
          <th>Start_Date</th>
          <th>Start_Time</th>
          <th>End_Date</th>
          <th>End_Time</th>
          <th>Venue</th>
          <th>Address</th>
          <th>Event_Type</th>
          <th>Description</th>
          <th>Organizers</th>
          <th>Sponsors</th>
          <th>Uploaded_Date</th>
          <th>Interested</th>
          <th>Not_Interested</th>


         " ;
        $sql = "SELECT * FROM event where uploadedevent = 'admin' order by eventdate ASC";
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
        $output .= "
        <tr>
        <td>".$row['uploadedevent']."</td>
        <td>".$row['eventcollege']."</td>
        <td>".$row['eventdetail']."</td>
        <td>".$row['startdate']."</td>
        <td>".$row['starttime']."</td>
        <td>".$row['enddate']."</td>
        <td>".$row['endtime']."</td>
        <td>".$row['venue']."</td>
        <td>".$row['address']."</td>
        <td>".$row['eventtype']."</td>
        <td>".$row['description']."</td>
        <td>".$row['organizer']."</td>
        <td>".$row['sponsor']."</td>
        <td>".$row['eventdate']."</td>
        <td>".$interestedresult."</td>
        <td>".$notinterestedresult."</td>

        </tr>";

          
    }
  }

      $output .= "</table>";
      header("Content-Type: application/xls");
      header("Content-Disposition: attachment; filename=AllEvents.xls");
      echo $output;

      ;

}
  ?>