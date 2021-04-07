<?php
    require('../config.php');

if($_GET['action']=='DeleteOneStd' && $_GET['action'] !== NULL){
    $userID = $_GET['Del_userid'];
    
  

    $QueryLayer = "select userid from std_details where userid='$userID'";
    $runQueryLayer = mysqli_query($connect,$QueryLayer);


    if($runQueryLayer->num_rows !=0){
 
        $queryUpdateOne ="DELETE FROM std_details WHERE `std_details`.`userid` = '$userID'";
                                                        
        $queryUpdateOne = mysqli_query($connect,$queryUpdateOne);
    if($queryUpdateOne){echo json_encode(array('Delete_status_code'=>$userID)); }
    }else{
        echo  json_encode(array('Delete_status_code'=>'offline'));
        
    }
    
}else{
    echo json_encode(array('CaseFile.php?Action=suspend'));
}

?>