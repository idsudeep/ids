<?php 
    require_once ("dbc.php");
    class Student
    {
        private $db_handle;
        
        function __construct() {
                $this->db_handle = new DBController(); }



        function getTotalNoOfCls($sub_code ,$start_date){

            $keyword = substr($start_date,0,4);
            $Query_Once = "select total_no_of_class from class_tbl where sub_code ='$sub_code' && keyword ='$keyword'";
            $resultOnce = $this->db_handle->runBaseQuery($Query_Once);
            foreach($resultOnce as $key){
                if($key["total_no_of_class"] > 0){
                    return $key["total_no_of_class"];}
                    else{
                        return 0;
                    }
             
        }   
        }    
        function get_attendance_percentage($regno , $sub_code,$start_date,$end_date){ 

            $t_no_cls = $this->getTotalNoOfCls($sub_code,$start_date);
            $query ="SELECT ROUND((SELECT COUNT(*) FROM attendance_tbl 
                    WHERE status = 'P' AND regno = '".$regno."'AND sub_code ='".$sub_code."'
                    AND issue_date BETWEEN '".$start_date."' AND '".$end_date."' ) * 100) / $t_no_cls AS percentage ";
                        
                    $result = $this->db_handle->runBaseQuery($query);
                            foreach($result as $row){
                                if($row["percentage"] > 0){
                                    return $row["percentage"] . '%';}
                                        else{
                                                return 'NQ';
                        
                            }
                        }
        }

        function getAllStudentRegno($course, $sem ,$batch_no){

            $sql = "SELECT * FROM std_details where course=? AND sem =? AND batch_no =?";
            $paramType='sii';
            $paramValue=array(
                $course,
                $sem,
                $batch_no
            );
                $find_one_query = $this->db_handle->runQuery($sql, $paramType, $paramValue);
                $somearray = array();
                        foreach($find_one_query as $somekey => $someval){
                                array_push($somearray , array('regno'=>$someval['regno']));}
                                    return $somearray;
        }

        function getTotalPresentDays($regno, $sub_code, $start_date, $end_date){

            $query = "SELECT(SELECT COUNT(*) FROM `attendance_tbl` WHERE regno ='".$regno."' 
                    AND sub_code ='".$sub_code."' AND  issue_date BETWEEN '".$start_date."' 
                    AND '".$end_date."')AS content";
            
                        $res = $this->db_handle->runBaseQuery($query);
                        $arrays = array();
                            foreach($res as $val){
                                array_push($arrays,$val);}
                                    return $arrays;
        }
    

        function getAllStudentByPer($sem, $course, $sub_code, $start_date, $end_date, $batch_no){
            
            $get_data = $this->getAllStudentRegno($course, $sem ,$batch_no);
            
            $no_cls = $this->getTotalNoOfCls($sub_code,$start_date);
           
        
            $returnSome = array();
            
            foreach ($get_data as $item){ 
            $daysCount = $this->getTotalPresentDays($item['regno'],$sub_code,$start_date,$end_date);

         
                $getsomeval = $this->get_attendance_percentage($item['regno'],$sub_code,$start_date,$end_date);
                        array_push($returnSome,array(['regno'=>$item['regno'],'t_no_cls'=>$no_cls,'per'=>$getsomeval,'total_days'=>$daysCount[0]['content']]));}
                                $encode_data = json_encode($returnSome);
                                    return $encode_data;
            }
            
        function getAllStudentSubCodePer($course, $sem, $start_date, $end_date ,$batch_no){
                  
                     $myarray = array();
                  
                    
                     $getStudentsRegno = $this->getAllStudentRegno($course,$sem,$batch_no);
                
                foreach($getStudentsRegno as $key => $data) {
    $basequery = "SELECT DISTINCT sub_code FROM `attendance_tbl` WHERE regno = '".$data['regno']."' ORDER BY `attendance_tbl`.`sub_code` ASC";
                        $request = $this->db_handle->runBaseQuery($basequery);
                          $myarray['reg'] = array($data['regno']);    
                          foreach($request as $da){

                      
                        
                            array_push($myarray,array(
                            $da['sub_code']=>$getAllStudentsPer = $this->get_attendance_percentage($data['regno'],
                            $da['sub_code'],$start_date,$end_date)
                               ));
                     

                                
                    }
                     return $myarray;  
            
                 
                } 
                
                
                              
         }

function getSubCodeByReg($regno){

           $returnSubCode = array();
    $queryOne = "SELECT DISTINCT sub_code FROM `attendance_tbl` WHERE regno = '".$regno."' ORDER BY `attendance_tbl`.`sub_code` ASC";
    $req_queryOne = $this->db_handle->runBaseQuery($queryOne);     

           foreach($req_queryOne as $key => $val){
                 if(!empty($val)){
                     array_push($returnSubCode ,array('sub_code'=>$val['sub_code']));}
        }

        return $returnSubCode;



}
function get_SubCode_Per($regno ,$sub_code){

    $returnPer = array();
    $start_date ='2021';
    $t_no_cls = $this->getTotalNoOfCls($sub_code,$start_date);

     
 
    $oneQuery ="SELECT ((SELECT COUNT(*) FROM attendance_tbl 
    WHERE status = 'P' AND regno = '".$regno."'AND sub_code ='".$sub_code."' ) * 100) / $t_no_cls AS percentage ";
        


    $resOne = $this->db_handle->runBaseQuery($oneQuery);

    print_r(round($resOne));
            foreach($resOne as $returnPer){
                if($returnPer["percentage"] > 0){
                    $val = $returnPer['percentage'];
                    $val_convert = intval($val);
                    
                    
                    return $val_convert. '%';}
                        else{
                                return 'NQ';
        
            }
        }


}
function getSubCodeByPer($reg){

        $returnSubCodeByPer = array();

        $get_codefn = $this->getSubCodeByReg($reg);
  
         foreach($get_codefn as $id => $dat){

            array_push($returnSubCodeByPer, array('someOne'=> $this->get_SubCode_Per($reg,$dat['sub_code'])));

         }
         return $returnSubCodeByPer;

}






        function getAlls($course, $sem, $start_date, $end_date ,$batch_no){
                  
            $somearray = array();
           $getStudentsRegno = $this->getAllStudentRegno($course,$sem,$batch_no);
         
           foreach($getStudentsRegno as $key => $data) {
            //    $basequery = "select DISTINCT sub_code from attendance_tbl where regno = '".$data['regno']."' ";
               $basequery = "SELECT DISTINCT sub_code FROM `attendance_tbl` WHERE regno = '".$data['regno']."' ORDER BY `attendance_tbl`.`sub_code` ASC";
                   $request = $this->db_handle->runBaseQuery($basequery);


           
               
               $somearray[] = array("regno"=>$data['regno']);

               

              foreach ($request as $da)
              {

                
                   array_push($somearray,array(

                    $da['sub_code']=>$getAllStudentsPer = $this->get_attendance_percentage($data['regno'],
                    $da['sub_code'],$start_date,$end_date)
                                ));


              }

           
               
             }

          return json_encode($somearray);


    }
}

    
?>