<?php 

    require '../vendor/autoload.php';
    require '../config.php';
   
  
    if(isset($_GET['sub_code']))
    {
      error_reporting(0);

      $sem= $_GET['sem']; 
      $course = $_GET['course'];
      $sub_code = $_GET['sub_code'];
      
  
  
      $coll_name = $course.$sem.'_'.$sub_code;  
  
      
      $uri = 'mongodb://localhost';
      $client = new MongoDB\Client($uri);
        
      $collection = $client->heroku_gtz0xx3x->$coll_name;
  
  
      /*fetching qrcode details from collections for validation*/
  
      /*
          $filter= ['limit' => 1];
         
      
      */
      $count_key=array('status'=>'P');
      
      $key= array("status"=>'A');

  
      $query= new MongoDB\Driver\Query($key);
  
     
     
      $cursor = $collection->find($key);
  
      $cur = $collection->find($count_key);
      $no_of_col = count(iterator_to_array($cur));


      $count_array = array("no_of_row"=>$no_of_col);
 
      $listArray = array();
      $merge_array = array();

    
    foreach ($cursor as $key=> $data){}


  
  
            if($data != NULL)
            {

           

              
                      array_push($listArray, array(
                                      'faculty_id'=>$data['faculty_id'],
                                      'last_taken_date'=>$data['date'],
                                      'sub_code'=>$data['sub_code']));

                

                       
          // $someJSON = json_encode($listArray);
          // $no_of_col = json_encode(array("no_of_row"=>$no_of_col));

          $merge_array = array_merge_recursive($listArray ,$count_array);

          $some_json = json_encode($merge_array);

         echo $some_json;
            
              
            }
            else
            {
            
              $error_msg=array();
              $msg = ['errormsg' => 'Zero Results TAKE attendance',
                      'status_code'=>'001'];

              array_push($error_msg ,$msg);

              $err_json = json_encode ($error_msg);

              echo stripslashes($err_json) ;


              

            }


  }

    else
    {
      echo "No access subject code missing";
      header("location:process.html");
      die();
    }

    if($_GET['action'] == 'update')

    {

   

      
      $sem= $_GET['sem']; 
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
            
              
             $query_arr = array();
             $pack_array = array('regno','sub_code','issue_date','status');
             $key_i = $bugs_array[0];
             $key_name = $key_i['issue_date'];
            
          if($connect)
             {

              $conn_query = "select issue_date from attendance_tbl where issue_date = '$key_name'";
              

              $quer = mysqli_query($connect,$conn_query);
             

              if($quer->num_rows != 1);
              {

                foreach ($bugs_array as $key => $value)
                {
                    $query_arr[] = "('" . $pack_array[0] . "', '" . $pack_array[1]. "', '" . $pack_array[2] . "', '" . $pack_array[3] . "', '" . $value["regno"] . "', '" . $value["sub_code"] . "', '" . $value["issue_date"] . "', '" . $value["status"] . "')";
                }
               
                
                $query_insert =  ("INSERT INTO attendance_tbl (regno, sub_code, issue_date, status) VALUES " . implode(', ', $query_arr)); 
                
                


              }
          


              

             }
              
         
              // print_r($query);



              
              if(!empty($bugs_array))
                {

                    

            
                
                 
                  $table_name = 'attendance_tbl';
                  $table_columns = array('regno' , 'sub_code' ,'issue_date', 'status');
             
             
                 $resc= multiple_insert($table_name , $table_columns , $bugs_array );

                print_r($resc);

              

          }
      }
      else
      {
        echo'NOT Required';
      }
      

    



      }

    
?>

