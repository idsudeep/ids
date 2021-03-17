        <?php
    require_once("students.php");

    $instance_once = new Student();

    if($_GET['action']=='btn_getAllStudent'){

        $course = $_GET['course'];
        $sem = $_GET['sem'];
        $start_date= $_GET['start_date'];
        $end_date = $_GET['end_date'];
        $batch_no = $_GET['batch_no'];
        

        $getAlls = $instance_once->getAlls($course,$sem,$start_date,$end_date,$batch_no);






     echo $getAlls;

    }

   

        ?>