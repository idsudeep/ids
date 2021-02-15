<?php 

    require '../vendor/autoload.php';
    require '../config.php';
   
  
    if(isset($_GET['sub_code']) && $_GET['action']=='getStatus')
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

    
?>

