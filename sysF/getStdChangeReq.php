<?php
    require('../config.php');

if($_GET['action']=='ChangeStd' && $_GET['action'] !== NULL){
    $userID = $_GET['userID'];
    $sem =$_GET['sem'];
    $Course = $_GET['forwhat'];
    $batchNo = $_GET['batchNo'];
    $status = $_GET['status'];
 echo $userID;
    die();

    $QueryLayer = "select status from std_details where regno='$userID' && batch_no= '$batchNo'";
    $runQueryLayer = mysqli_query($connect,$QueryLayer);
    $getResult_arr = mysqli_fetch_object($runQueryLayer);   

    if($getResult_arr->status !="active"){
 
        $queryUpdateOne ="UPDATE `std_details` SET `status` = 'active' WHERE 
                                                                    `std_details`.`regno` = '$userID' && 
                                                                    Course='$Course'&& batch_no ='$batchNo'";
                                                        
        $queryUpdateOne = mysqli_query($connect,$queryUpdateOne);
    if($queryUpdateOne){echo json_encode(array('approved_status_id'=>'Approved_'.$userID)); }
    }
    
}

?>