<?php 
 if(isset($_GET['action'])=='Req_removeOne')
 {

    require '../vendor/autoload.php';
    $uri = 'mongodb://localhost';

    $std_id = $_GET['regno'];
 $coll_name = $_GET['collection'];
                        
                        $client = new MongoDB\Client($uri);
                        $collection = $client->heroku_gtz0xx3x->$coll_name;



                         $criteria = array('std_id' =>$std_id);
                      

   if($cursor= $collection->deleteOne($criteria)){
    echo json_encode(array('Deleted'));
   }

 
     
 }else{
     echo json_encode(array(' Request Blocked'));
     die();
 }

?>