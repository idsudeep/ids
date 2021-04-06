
<?php 


    session_start();
    include_once("function.php");
    include_once("../config.php");


   

    if(isset($_POST['f_reg_btn']) &&  $_GET['action']=='f_reg'){

      $email = $_POST['email'];
      $password=$_POST['words'];
      $repassword=$_POST['words_'];
      $depart_ = strtoupper($_POST['depart_']);
      $mobile_no=$_POST['mobileNo'];
      $fname=$_POST['fname'];

      $validation = validateInput(array(
           'Email'=>$email,
           'Password'=>$password,
           'Second password'=>$repassword,
           'Department'=>$depart_,
           'Mobile no'=>$mobile_no,
           'Name'=>$fname   
                                  ));
      if (count($validation)!=0){
        $message="";
        foreach($validation as $errors){
          $message .= $errors."<br/>";
        }
        MsgFlash('error','empty  fields . <br>'.$message);
        header ("location:signUpFaculty.php");
        die();
      }
     
      if($password!=$repassword){
        MsgFlash('error','passwords do not match');
        header("location:signUpfaculty.php");
        die();
      } 
      if(count($validation)==0){

        $QueryLayer ="select *from faculty_tbl where email = '$email'";
        $RunQuerylayer=mysqli_query($connect,$QueryLayer);
       
        if($RunQuerylayer->num_rows !=0){
          MsgFlash('error','Email Already Used by SomeOne.');
          header("location:signUpfaculty.php");
          die();
       }
       if($RunQuerylayer->num_rows<=0){
         $QueryInsertOne="INSERT INTO `faculty_tbl` ( `faculty_name`, `email`, `Words_`, `mobile_no`, `dept_`, `issue_Date`, `status`) VALUES ('$fname', '$email', '$password', '$mobile_no', '$depart_', CURRENT_TIMESTAMP, 'inactive')";
         $RunQueryInsertOne= mysqli_query($connect,$QueryInsertOne);
         if($RunQueryInsertOne){
           MsgFlash('success','Completed 100%.');
           header('location:../index.php');
           die(); } 
      }
  }
      
      

    }

if(isset($_POST['reg_btn']) && $_GET['action']=='register')
    
{
    

    
    $fname = strtoupper($_POST['fname']);
    $reg_no =strtoupper($_POST['reg_no']);
    $email =$_POST['email'];
    $password=$_POST['password'];
    $repassword =$_POST['repassword'];
    $mobile= $_POST['mobile'];
    $d_type = $_POST['d_type'];
    $dd_l    = $_POST['dd_l'];
    $course = strtoupper($_POST['course']);
    $BatchNo = $_POST['BatchNo'];
    $sem = $_POST['sem'];

    
     $validation = validateInput(array(
    
                                           'fname'=>$fname,
                                           'registration'=>$reg_no,
                                            'email'=>$email,
                                            'password'=>$password,
                                            'repassword'=>$repassword,
                                            'mobile'=>$mobile,
                                            'd_type'=>$d_type,
                                            'dd_l'=>$dd_l,
                                            'course'=>$course,
                                            'BatchNo'=>$BatchNo,
                                              )
								);
    
    
     if (count($validation)!=0)
      {
        $message="";
        foreach($validation as $errors)
        {
          $message .= $errors."<br/>";
          
        }
        MsgFlash('error','empty  fields . <br>'.$message);
        header ("location:register.php");
        die();
        
      }
      
	if($password!=$repassword)
      {
        MsgFlash('error','passwords do not match');
        header("location:register.php");
        die();
        
      }
      /*
        SELECT * FROM `device_details` WHERE model_no LIKE '%NT 10.0; Win64; x64) a'
      */
        
   
          
          $query = "SELECT `regno` `email`  FROM `std_details` WHERE regno = '$reg_no' OR email ='$email'";
          
            $sql = mysqli_query($connect,$query);
          
          if($sql->num_rows !=0)
          {
            
            MsgFlash('error', 'User already exits.');
            header("location:register.php");
            die();
          }
            
  if(($d_type!="computer")) 

  {
       $creg = strtoupper($reg_no);
      
      
      $query_insert = "INSERT INTO `std_details` (`regno`, `fname`, `course`, `sem`,`batch_no`, `email`, `password`, `mobile_no`) VALUES ( '$creg', '$fname', '$course', '$sem','$BatchNo', '$email', '$password', '$mobile')";
      $sql = mysqli_query($connect,$query_insert);
       if($sql = TRUE)
       {
         
     $query_insert_dd = "INSERT INTO `device_details` (`model_no`, `d_type`) VALUES ('$dd_l', '$d_type')";
    
    $sql = mysqli_query($connect,$query_insert_dd);
      
    MsgFlash('success', 'welcome !');
		header("location:login.php");
		die();
       }
      
  }
    else
    { 
    MsgFlash('error', 'unsafe Device  </br> mobile phone only acceptable');
		header("location:register.php");
		die();
    }
}



  if(isset($_POST['btn_login']) && $_GET['action']=='login')
      
  {
      
      $email = $_POST['email'];
      $password = $_POST['password'];
      $validation = validateInput(array('email'=>$email,
                                         'password'=>$password
                                        ));
        if(count($validation)!=0)
          {
              $message ='';
            foreach($validation as $errors)
      {
        $message .= $errors."<br/>";
        
      }
      MsgFlash('error','Empty  fields . <br>'.$message);
      header ("location:login.php");
      die();  
          }
      
     /* $sql = "SELECT device_details.model_no, std_details.email, std_details.password FROM std_details LEFT JOIN device_details ON device_details.dd_id = std_details.sd_id AND std_details.email = '$email'";*/
     
      /* $model= find_device();  */  /* make some changes*/
        $model = 'Android 6.0.1; Redmi 3s'; 
      
    

     
      $sql=  "SELECT userid,email,fname ,model_no,status , regno ,password FROM device_details,std_details
             WHERE email = '$email' && password='$password' && model_no like '$model' && device_details.dd_id  = std_details.userid "; 
       
              $query1 = mysqli_query($connect ,$sql);
              $result = mysqli_fetch_assoc($query1);
           $sql_model = "SELECT userid,fname,regno,email, model_no FROM device_details,std_details
                      WHERE email = '$email' && model_no like '$model' && device_details.dd_id  = std_details.userid ";
      
              $query_model = mysqli_query($connect , $sql_model);
            if(mysqli_num_rows($query_model) != 0)
                    {
                      if($result['password']==$password && $result['email']==$email )
                        
                    {       $userid = $result['userid'];
                            $fname = $result['fname'];
                            loginToqrc($userid,$fname);
                        
                            header('location:mob_view.php');
                    }else
                        {
                            /*outer */
                            MsgFlash('error','undefined Email or Password . <br>'.$message);
                            header('location:login.php');
                        }
    }else
      {
            MsgFlash('error','device issues  <br>');
            header('location:login.php');
          
          die();
      }
      
  }
/*
  student login end 
*/ 



  if(isset($_POST['btn-assign']) && $_GET['action']== 'sub_value')
      
  {
      
   

    /* mongodb://heroku_gtz0xx3x:b8g6cgtdcg3ucqehpmpfk7nmui@ds137283.mlab.com:37283/heroku_gtz0xx3x */   
      $sub_code = $_POST['sub_code'];
      $sem =$_POST['sem'];
      $course = $_POST['course'];
 
      
      $faculty_id = $_POST['facultyID'];
      
      $coll_name = $course.$sem."_".$sub_code;
    
       require '../vendor/autoload.php';
      
      /* $uri = "mongodb://heroku_gtz0xx3x:b8g6cgtdcg3ucqehpmpfk7nmui@ds137283.mlab.com:37283/heroku_gtz0xx3x?retryWrites=false";*/
       
          $uri = 'mongodb://localhost';
          $client = new MongoDB\Client($uri);
      
          $collection = $client->heroku_gtz0xx3x->$coll_name;
          $criteria = array('faculty_id' =>$faculty_id);
          $cursor= $collection->findOne($criteria);  
          $date = new DateTime();
          $date_time = $date->format('Y-m-d');
      
    
            foreach ($cursor as $cur) {}  
                      if(empty($cur))
                        {
                              $code = rand();
                              $document = array(
                              "faculty_id"=>$faculty_id,
                              "sub_code"=>$sub_code,
                              "date"=>$date_time,
                              "status"=>"A",
                              "qrcode"=>$code);
                      
                $insert = $collection->insertOne($document);

                    
          if($insert){

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
                      $QueryInsertOne = "insert into class_tbl (faculty_id,sub_code,start_date,recent_date,total_no_of_class) values('$faculty_id','$sub_code','$date_time','$date_time','$set_no_of_cls') ";
                      $QueryExecute = mysqli_query($connect,$QueryInsertOne);
                      echo 'insert part';  
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
                  if($OneMoreLayer->mysqli_num_rows ==0){
                  $UpdateQuery_no_of_cls = "UPDATE class_tbl SET total_no_of_class = '".$total_cls."' , recent_date = '$date_time'  WHERE class_tbl.sub_code = '$sub_code' && recent_date !='$date_time'";
                  echo "UPdate part";
                  $runUpdateQuery= mysqli_query($connect, $UpdateQuery_no_of_cls);
                  } 
                } 
       }
       header("location:../generator/qrcode_gen.php?collect=".$coll_name.'&sub_code='.$sub_code);
      }else{
        //    $deleteResult = $collection->deleteMany($document);
        header("location:../generator/qrcode_gen.php?collect=".$coll_name.'&sub_code='.$sub_code);
              echo "successfully deleted ";
            die();
      }
  }

// sysadmin  

if(isset($_POST['sysadmin_login_btn']) && $_GET['action']=='sysadmin1@@%'){

  $email = $_POST['email'];
  $password= $_POST['words'];

  $validation = validateInput(array(
                              'email '=>$email,
                              'password'=>$password
  ));

  if(count($validation)!=0){
    $message="";
    foreach($validation as $errors){
      $message .= $errors."<br/>";
    }
    MsgFlash('error',' '.$message);
    header ("location:sysadminLogin.php");
    die();

  }

  if(count($validation)==0){

    $query = "select * from admin_pannel where email ='$email'";
    $runQuery = mysqli_query($connect,$query);
    if($runQuery->num_rows !=0){

     $QueryForPass = "select * from admin_pannel where email ='$email' && Words='$password'";

    
  
      $RunQueryOnce = mysqli_query($connect,$QueryForPass);
      $arr_res = mysqli_fetch_object($RunQueryOnce);
      if($RunQueryOnce->num_rows != 0){

        
        $AccountType = $arr_res->AccountType; 
        $uId =$arr_res->userid;
        sysAdminLogged($AccountType,$uId);
        
        MsgFlash('error',' logged In. <br>'.$message);
        header ("location:sysAdminPannel.php");
        die();
      }else{
        MsgFlash('error','Wrong Password'. '<br>'.$message);
        header ("location:sysadminLogin.php");
        die();
      }
   
  }else{
    MsgFlash('error','invalid Email. <br>'.$message);
    header ("location:sysadminLogin.php");
    die();
  }




}
}


?>