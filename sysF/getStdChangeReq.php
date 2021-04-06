<?php
    require('../config.php');

if($_GET['action']=='changeStd' && $_GET['action'] !== NULL){
    $userID = $_GET['userID'];
    $sem =$_GET['seMesteR'];
    $Course = $_GET['forwhat'];
    $batchNo = $_GET['batchNo'];
    $status = $_GET['statuS'];
    $regno =$_GET['regNo'];
    $mobile_no=$_GET['mobileNo'];
    $fname = $_GET['fullName'];

    $QueryLayer = "select userid from std_details where userid='$userID'";
    $runQueryLayer = mysqli_query($connect,$QueryLayer);


    if($runQueryLayer->num_rows !=0){
 
        $queryUpdateOne ="UPDATE `std_details` SET `status` = '$status',`batch_no`=$batchNo,
                                                    `sem`='$sem',`fname`='$fname',`regno`='$regno' ,
                                                    `course`='$Course',`mobile_no`='$mobile_no'
                                                    WHERE `std_details`.`userid` = '$userID'";
                                                        
        $queryUpdateOne = mysqli_query($connect,$queryUpdateOne);
    if($queryUpdateOne){echo json_encode(array('changed_status_code'=>$userID)); }
    }else{
        echo  json_encode(array('Changed_status_code'=>'offline'));
        
    }
    
}else{
    echo json_encode(array('CaseFile.php?Action=suspend'));
}

?>