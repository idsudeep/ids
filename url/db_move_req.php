<?php 
 
  require '../vendor/autoload.php';
  require '../config.php';

if($_GET['action'] == 'update_btn')

{       $sem= $_GET['sem']; 
        $course = $_GET['course'];
        $sub_code = $_GET['sub_code'];


  if(!empty($sem || $course || $sub_code))
  {
   $uri = "mongodb://localhost";
          $client = new MongoDB\client ($uri);
          $colcon = $course.$sem.'_'.$sub_code;
    
          $mongo_con = $client->heroku_gtz0xx3x->$colcon;
          $query_key = array('sub_code'=>$sub_code);
          $query = new MongoDB\Driver\Query($query_key);
          $bug = $mongo_con->find($query);
          $bugs_array = array();
    foreach ( $bug as $bug_id => $bugs)
        {
            if($bugs['status'] =='P')
            {
                array_push($bugs_array , array('regno'=> $bugs['std_id'],
                                                'sub_code'=>$bugs['sub_code'],
                                                'issue_date'=>$bugs['date'],
                                                'status'=>$bugs['status']));
            }
         }
        
           
         if(!empty($bugs_array))
         {

         $query_arr = array();
         $pack_array = array('regno','sub_code','issue_date','status');
         $key_i = $bugs_array[0];
         $key_name = $key_i['issue_date'];
        
          if($connect)
         {

          $conn_query = "select issue_date ,sub_code from attendance_tbl where issue_date = '$key_name' AND sub_code = '$sub_code'" ;
          $quer = mysqli_query($connect,$conn_query);


          if($quer->num_rows == 0)
          {

 
            foreach ($bugs_array as $key => $value)
            {
                $query_arr[] = "( '" . $value["regno"] . "', '" . $value["sub_code"] . "', '" . $value["issue_date"] . "', '" . $value["status"] . "')";
            }
           
          
            
            $query_insert = ("INSERT INTO attendance_tbl (regno,sub_code,issue_date,status)VALUES " . implode(', ', $query_arr)); 

     
          $query_connect = mysqli_query($connect,$query_insert);     
          
          if($query_connect)

          {
                 $success_message = array('success_code'=>'s93',
                                    'success_name'=>'success , clear_DB, Take Attendance');

                $success_json = json_encode($success_message);
                
                echo $success_json;
          }
          
        
        }
        else

        {
          $error_message = array('error_code'=>'e93',
                                'error_message'=>'Data upto Date, Clear DB ');

           $error_json = json_encode($error_message);

           echo $error_json;
            
        }
    }
          
     
        

                

        
            
   

          

      }
  }
  else
  {
    echo'NOT Required';
  }
  





  }


?>