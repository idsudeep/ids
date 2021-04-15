<?php

require_once('students.php');


$instance_student = new student();
  
  
   if($_GET['action']=='btn_Query')
   {
    $sub_code= $_GET['sub_code'];
    $start_date=$_GET['start_date'];
    $end_date= $_GET['end_date'];
     $sem = $_GET['sem'];
     $course = $_GET['course'];
     $batch_no=$_GET['batch_no'];

    
     
    
     $get_a = $instance_student->getAllStudentByPer($sem, $course, $sub_code, $start_date, $end_date, $batch_no);
 
   if(!empty($get_a))
     {
        echo $get_a;  

     }else{
         echo ' Request Blocked ';
         die();
     }
  

   
 
     
  
   }




?>