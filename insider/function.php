<?php 
        require_once('../config.php');
        require_once('whoami.php');

        function find_device(){
            
            $detect = new Mobile_Detect;
        $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
            $mobile = $detect->getUaHttpHeaders();
            $model = $_SERVER['HTTP_USER_AGENT'];
                
                    $str = substr($model,20,23);
            return $str;
        }

        function whattype(){
            $detect = new Mobile_Detect;
        $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
        return $deviceType;
        }

        function MsgFlash($name , $message=NULL){
            if (isset($_SESSION["$name"])){
        
                $message = $_SESSION["$name"];
            unset($_SESSION["$name"]);
            return $message;
            }elseif ($message != NULL){
                
                $_SESSION["$name"]=$message;
            } else{ return false;}
        }

        function validateinput(array $fields){
            $error = array();
            
            foreach($fields as $field_name => $value){
                if ($value ==""){
                    array_push ($error,$field_name);
                }
            }
            
            return $error;   
        }

        function loginToqrc($userid, $fname)//Login to the application using given parameters
        {
            if(!isset($_SESSION['userid'])&&!isset($_SESSION['fname']))//If user is not already logged in, set session
            {
                $_SESSION['userid'] = $userid;
                $_SESSION['fname'] = $fname;
                
            }

        }


    function isLoggedIn(){
        if(isset($_SESSION['userid'])&&isset($_SESSION['fname'])){
            
            return array(
                "userid" =>$_SESSION['userid'],
                "fname" =>$_SESSION['fname']			
                );
        }
            return FALSE;
    }

    function faculty_loggedIn($faculty_id, $facultyName){
        if(!isset($_SESSION['faculty_id']) && !isset($_SESSION['facultyName'])){
            $_SESSION['faculty_id'] = $faculty_id;
            $_SESSION['facultyName']=$facultyName;}
    }
        function faculty_log_data_return(){
         
            if(isset($_SESSION['faculty_id'])&& isset($_SESSION['facultyName'])){
                return array(
                    'faculty_id' =>$_SESSION['faculty_id'],
                    'facultyName'=>$_SESSION['facultyName']
                                );
            }else{return false;}
        }

        function sysAdminLogged($AccountType,$uId){
            if(!isset($_SESSION['AccountType'])&& !isset($_SESSION['uId'])){
                $_SESSION['AccountType']=$AccountType;
                $_SESSION['uId']=$uId;
            }
        }
function getCheckedSys(){
    if(isset($_SESSION['AccountType'])&& isset($_SESSION['uId'])){
        return array(
            'AccountType'=>$_SESSION['AccountType'],
            'uId'=>$_SESSION['uId']);           
    }else{return false;}
}





?>