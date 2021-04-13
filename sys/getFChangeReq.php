            
            
<?php
    require('../config.php');

if($_GET['action']=='changeFaculty' && $_GET['action'] !== NULL){
    $FID = $_GET['facultyId'];
    $dept = $_GET['dept_'];
    $status = $_GET['status'];
    $mobile_no=$_GET['mobileNo'];
    $facultyName = $_GET['facultyName'];


    $QueryLayer = "select faculty_id from faculty_tbl where faculty_id='$FID'";
    $runQueryLayer = mysqli_query($connect,$QueryLayer);

   

    if($runQueryLayer->num_rows !=0){
 
    $queryUpdateOne ="UPDATE `faculty_tbl` SET `status` = '$status',
    `faculty_name`='$facultyName',`dept_`='$dept' ,`mobile_no`='$mobile_no' WHERE `faculty_tbl`.`faculty_id` = '$FID'";
   
        $queryUpdateOne = mysqli_query($connect,$queryUpdateOne);
    if($queryUpdateOne){echo json_encode(array('changed_status_code'=>$FID)); }
    }else{
        echo  json_encode(array('Changed_status_code'=>'offline'));
        
    }
    
}else{
    echo json_encode(array('CaseFile.php?Action=suspend'));
}

?>