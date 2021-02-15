<?php 
    require_once ("dbc.php");
    class Student
    {
        private $db_handle;
        
        function __construct() {
                $this->db_handle = new DBController(); }


    function get_attendance_percentage($regno , $sub_code,$start_date,$end_date){ 

        $query ="SELECT ROUND((SELECT COUNT(*) FROM attendance_tbl 
                WHERE status = 'P' AND regno = '".$regno."'AND sub_code ='".$sub_code."'
                AND issue_date BETWEEN '".$start_date."' AND '".$end_date."' ) * 100) / 128 AS percentage ";
                    
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
        $returnSome = array();
        foreach ($get_data as $item){ 
           $daysCount = $this->getTotalPresentDays($item['regno'],$sub_code,$start_date,$end_date);
              $getsomeval = $this->get_attendance_percentage($item['regno'],$sub_code,$start_date,$end_date);
                    array_push($returnSome,array(['regno'=>$item['regno'],'per'=>$getsomeval,'total_days'=>$daysCount[0]['content']]));}
                            $encode_data =json_encode($returnSome);
                                return $encode_data;
        }
     }
    
?>