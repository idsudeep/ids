<?php 
require_once('../config.php');

if($_GET['action']=='stdApprove'){


    $sem = $_GET['sem'];
    $batchNo = $_GET['batchNo'];
    $course = $_GET['forwhat'];

    $queryOne = "select regno, fname, mobile_no, status,date_of_join from std_details where status ='inactive' && sem = '$sem' && batch_no='$batchNo' limit 5";
    $run_query = mysqli_query($connect,$queryOne);  
    
    $someArr=[];
  
   if(mysqli_num_rows($run_query)>0)
   {      

    while($result = mysqli_fetch_array($run_query)){
     array_push($someArr,[
         'regno'=>$result['regno'],
         'fname'=>$result['fname'],
         'mobile_no'=>$result['mobile_no'],
         'DOJ'=>$result['date_of_join'],
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