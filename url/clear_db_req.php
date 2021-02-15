
<?php
    require '../vendor/autoload.php';
    require '../config.php';

    
    
    if(isset($_GET['action'])=='clear_db_req')
   
    {

    
        $sem = $_GET['sem'];
        $course =$_GET['course'];
        $sub_code = $_GET['sub_code'];

        if(!empty($sem || $course || $sub_code))
        {
            $uri ="mongodb://localhost";
            $client = new MongoDB\client($uri);
            $colcon = $course.$sem.'_'.$sub_code;
            $q_key = array('sub_code'=>$sub_code);
            $mongodb_connect = $client->heroku_gtz0xx3x->$colcon;
            
            $booms = $mongodb_connect->find($q_key);

            

            foreach($booms as $boom_id => $boom)
            {}


      
            
        if(!empty($boom['std_id']))
        {
            $del_query = $mongodb_connect->deleteMany($q_key);

            if($del_query)
            {
                $boom_array = ["remove_id"=>"r93",
                                    "remove_success"=>"Take attendance , remove_success"];

                $boom_encode = json_encode($boom_array);
               
                
               echo ($boom_encode);

            //    header('location:../insider/process.html');
            }
            else
            {
                $err_array = ['errorid'=>'e93',
                'remove_error'=>'Take attendance , 0 Data. '];

                $err_encode = json_encode($err_array);
          

                echo $err_encode;
            }

        }

        }

        else 
        {
            die();
        }

    }





?>