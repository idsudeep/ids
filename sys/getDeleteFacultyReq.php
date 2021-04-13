<?php
    require('../config.php');

if($_GET['action']=='DeleteOne' && $_GET['action'] !== NULL){
    $delete_input = $_GET['delete-input'];
    
  

    $QueryLayer = "select faculty_id , email from faculty_tbl where faculty_id='$delete_input' || email ='$delete_input'";
    $runQueryLayer = mysqli_query($connect,$QueryLayer);


    if($runQueryLayer->num_rows !=0){
 
        $queryUpdateOne ="DELETE FROM faculty_tbl WHERE `faculty_tbl`.`faculty_id` = '$delete_input'";
                                                        
        $queryUpdateOne = mysqli_query($connect,$queryUpdateOne);
    if($queryUpdateOne){echo json_encode(array('Delete_status_code'=>$delete_input)); }
    }else{
        echo  json_encode(array('Delete_status_code'=>'offline'));
        
    }
    
}else{
    echo json_encode(array('CaseFile.php?Action=suspend'));
}

?>