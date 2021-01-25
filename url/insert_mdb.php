<?php 

$qrcode =$_POST['qrcode'];

$std_id = $_POST['std_id'];
 $sub_code= $_POST['sub_code'];
 $coll_name = $_POST['collection'];

                            require '../vendor/autoload.php';

   /* $uri = "mongodb://heroku_gtz0xx3x:b8g6cgtdcg3ucqehpmpfk7nmui@ds137283.mlab.com:37283/heroku_gtz0xx3x?retryWrites=false";*/
   $uri = 'mongodb://localhost';
                        
                        $client = new MongoDB\Client($uri);
                        $collection = $client->heroku_gtz0xx3x->$coll_name;



                         $criteria = array('std_id' =>$std_id);
                      /*  Searching inside student list  exits or not */

   $cursor= $collection->findOne($criteria); 


                    $options=['sort' => ['std_id' => -1]] ;
                    $filter= ['limit' => 1];
                    $query= new MongoDB\Driver\Query($filter,$options);
            
                    $qrcode_query = $collection->find($query);

                    $date = new DateTime();
        
                    $date_time = $date->format('Y-m-d');
                  

            /* finding One set */
        foreach ($qrcode_query as $lqrcode) 
        
        {}
    if(empty($cursor))
   
        {if(($lqrcode['qrcode']==$qrcode)) 
            {  
                $code = rand();
        $document = array(
            "std_id"=>$std_id,
            "sub_code"=>$sub_code,
            "date"=>$date_time,"status"=>"P",
            "qrcode"=>$code);
            
                $insert = $collection->insertOne($document);
         
                    echo "successfully update";
                        die();
             }
        else
        {
               echo "qrcode invalid retry";
            }
        }

        else
        {
             echo "already exits"; 
        }
?>

