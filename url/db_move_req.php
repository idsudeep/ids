<?php 
 
  require '../vendor/autoload.php';
  require '../config.php';

if($_GET['action'] == 'update_btn')

{       $sem= $_GET['sem']; 
        $course = $_GET['course'];
        $sub_code = $_GET['sub_code'];
        $faculty_id = $_GET['facultyID'];


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
       
         if(!empty($bugs_array)){

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

 
            foreach ($bugs_array as $key => $value){
                $query_arr[] = "( '" . $value["regno"] . "', '" . $value["sub_code"] . "', '" . $value["issue_date"] . "', '" . $value["status"] . "')";
            }
           
            $query_insert = ("INSERT INTO attendance_tbl (regno,sub_code,issue_date,status)VALUES " . implode(', ', $query_arr)); 

   
          $query_connect = mysqli_query($connect,$query_insert);     
          
          if($query_connect){
                 $success_message = array('success_code'=>'s93',
                                    'success_name'=>'success , clear_DB, for  New Attendance');

                $success_json = json_encode($success_message);
                echo $success_json;}
                if($query_connect){

                  $date = new DateTime();
                  $date_time = $date->format('Y-m-d');
                       $sqlQuery = "select * from class_tbl  where recent_date ='$date_time' && sub_code = '$sub_code'"; 
                       $runQuery = mysqli_query($connect, $sqlQuery);
                 if($runQuery->num_rows ==0){
      
                         $Query_ = "select total_no_of_class from class_tbl where faculty_id= '$faculty_id' && sub_code ='$sub_code'";
                         $Query__exe = mysqli_query($connect,$Query_);
                        
                          $set_total_no_of_cls = mysqli_fetch_assoc($Query__exe);
                          $set_no_of_cls = $set_total_no_of_cls['total_no_of_class']+1; 
                          $CheckBeforeInsertQuery = "select * from class_tbl where sub_code ='$sub_code' && (recent_date !='$date_time' || recent_date='') ";
                          $RunCheckBeforeQuery = mysqli_query($connect,$CheckBeforeInsertQuery);
              
                                 
                        if($RunCheckBeforeQuery->num_rows==0){
                          $keyword = substr($date_time,0,4);
                            $QueryInsertOne = "insert into class_tbl (faculty_id,sub_code,start_date,recent_date,total_no_of_class,keyword) values('$faculty_id','$sub_code','$date_time','$date_time','$set_no_of_cls','$keyword') ";
                            $QueryExecute = mysqli_query($connect,$QueryInsertOne);
                            
                          }
                        
                        }
      
                       $QueryForTotal_no_of_cls = "select * from class_tbl where faculty_id = '$faculty_id' && sub_code='$sub_code' ";
                       $runQuery_no_of_cls = mysqli_query($connect , $QueryForTotal_no_of_cls); 
                      if($runQuery_no_of_cls->num_rows!=0){
                        $Query__ = "select total_no_of_class from class_tbl where faculty_id= '$faculty_id' && sub_code ='$sub_code'";
                        $someQuery = mysqli_query($connect ,$Query__);
                        $no_of_class = mysqli_fetch_assoc($someQuery);
                        $total_cls =  $no_of_class['total_no_of_class']+1;
                        $OneMoreLayer = "select * from class_tbl where faculty_id = '$faculty_id' && sub_code='$sub_code' && recent_date !='$date_time'";
                        $RunOneMoreQuery = mysqli_query($connect,$OneMoreLayer);
                    
                        if($RunOneMoreQuery->num_rows ==0){
                        $UpdateQuery_no_of_cls = "UPDATE class_tbl SET total_no_of_class = '".$total_cls."' , recent_date = '$date_time'  WHERE class_tbl.sub_code = '$sub_code' && recent_date !='$date_time'";
                  
                        $runUpdateQuery= mysqli_query($connect, $UpdateQuery_no_of_cls);
                        } 
                      } 
             }    
          
        
        }else{
                $error_message = array('error_code'=>'e93',
                                'error_message'=>'Data upto Date, Clear DB ');
                $error_json = json_encode($error_message);
          echo $error_json;}
    }
          
     
        

                

        
            
   

          

      }else{
        $error_message = array('error_code'=>'e93',
        'error_message'=>'Empty Slot, MDB ');
        $error_json = json_encode($error_message);
        echo $error_json;
      }
  }
  else
  {
    echo'NOT Required';
  }
  





  }else{
    echo 'Hello Hello on otherside';
  }


?>