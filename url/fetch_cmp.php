<?php 

require '../vendor/autoload.php';

        
    $coll_name = $_POST['collection'];
   /* $uri = "mongodb://heroku_gtz0xx3x:b8g6cgtdcg3ucqehpmpfk7nmui@ds137283.mlab.com:37283/heroku_gtz0xx3x?retryWrites=false";*/
      
 $uri = 'mongodb://localhost';

      $client = new MongoDB\Client($uri);
      
      
 
            $collection = $client->heroku_gtz0xx3x->$coll_name;



/*fetching qrcode details from collections for validation*/

$filter= ['limit' => 1];

$query= new MongoDB\Driver\Query($filter);


$db = new MongoDB\Client('mongodb://localhost'); /* undeline*/
 $cursor= $collection->find($query);

$someArray = array();
  foreach ($cursor as $key=> $value)
      
      
  {
     
  }
 array_push($someArray,['qrcode'=>$value['qrcode'],
                             'sub_code'=>$value['sub_code']]);

 $someJSON = json_encode($someArray);
  echo $someJSON;
    
?>

