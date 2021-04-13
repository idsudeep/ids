<?php
    require('../config.php');

if($_GET['action']=='changefacultyinfo' && $_GET['action'] !== NULL){
    $FID = $_GET['FID'];
    $dept = $_GET['forwhat'];
   

    $QueryLayer = "select faculty_id, faculty_name,dept_,email ,status,mobile_no from faculty_tbl where dept_ ='$dept'&& faculty_id ='$FID' ";
    $runQueryLayer = mysqli_query($connect,$QueryLayer);
      
      
      $someArr=[];
 
      if($runQueryLayer->num_rows >0)
      {      
   
       while($result = mysqli_fetch_array($runQueryLayer)){
        array_push($someArr,[
            'faculty_id'=>$result['faculty_id'],
            'faculty_name'=>$result['faculty_name'],
            'dept_'=>$result['dept_'],
            'email'=>$result['email'],
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