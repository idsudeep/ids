<?php 
 
   session_start();
 require('../config.php');
 require('../insider/function.php');

        if(($_GET['action'])=='btn_faculty'){
        $email = $_GET['email'];
        $password = $_GET['password'];

       

        $query = "select * from faculty_tbl where email ='$email'";
        $runQuery = mysqli_query($connect,$query);
        if($runQuery->num_rows !=0){

         $QueryForPass = "select * from faculty_tbl where email ='$email' && Words_='$password'";

        
      
          $RunQueryOnce = mysqli_query($connect,$QueryForPass);
          $arr_res = mysqli_fetch_object($RunQueryOnce);
       
            if($RunQueryOnce->num_rows != 0){
            $facultyName = $arr_res->faculty_name; 
            $fId =$arr_res->faculty_id;
            
              faculty_loggedIn($fId,$facultyName);
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