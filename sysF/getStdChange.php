<?php
    require('../config.php');

if($_GET['action']=='changeStdinfo' && $_GET['action'] !== NULL){
    $userID = $_GET['regno'];
    $Course = $_GET['forwhat'];
    $batchNo = $_GET['batchNo'];

    $QueryLayer = "select userid, regno,Course,sem, fname ,status,mobile_no from std_details where regno='$userID' && batch_no= '$batchNo'";
    $runQueryLayer = mysqli_query($connect,$QueryLayer);
      
      
      $someArr=[];
 
      if($runQueryLayer->num_rows >0)
      {      
   
       while($result = mysqli_fetch_array($runQueryLayer)){
        array_push($someArr,[
            'regno'=>$result['regno'],
            'userID'=>$result['userid'],
            'fname'=>$result['fname'],
            'sem'=>$result['sem'],
            'Course'=>$result['Course'],
            'mobile_no'=>$result['mobile_no'],
            'status'=>$result['status']
            
        ]);
       }
       
         $jdata=  json_encode($someArr);
         echo $jdata;
      }else{
          echo json_encode(array('message'=>'No results Founds'));
      }
    
}

?>