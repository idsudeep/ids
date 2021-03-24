<?php 

   session_start();
 require('../config.php');

        if(($_GET['action'])=='btn_faculty'){
        $faculty_id = $_GET['faculty_id'];
        $password = $_GET['password'];

       

        $query = "select * from faculty_tbl where faculty_id ='$faculty_id'";
        $runQuery = mysqli_query($connect,$query);
        if($runQuery->num_rows !=0){

         $QueryForPass = "select * from faculty_tbl where faculty_id ='$faculty_id' && password ='$password'";
          $RunQueryOnce = mysqli_query($connect,$QueryForPass);
          if($RunQueryOnce->num_rows != 0){
            echo json_encode(array('msg_id'=>'002','msg'=>'verified'));
               
          }else{
              echo json_encode(array('msg_id'=>'200','msg'=>'Invalid Password'));

          }
          
        }else{
            echo json_encode(array('msg_id'=>'200','msg'=>'ID not exists'));
            die();
        }

       
            

        }else{
            echo json_encode(array('msg_id'=>'200','msg'=>'Bad Access'));
            die();
        }
 
 ?>