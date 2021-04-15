<?php 
require_once('students.php');

$getSubCode = new Student();


$regno = $_GET['regno'];
$resultSubcode = $getSubCode->getSubCodeByReg($regno);
$resultSubCodeByPer = $getSubCode->getSubCodeByPer($regno);

?>
<!DOCTYPE html>
<html>
<head>
    <title>BySubjects</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="../css/bootstrap.css" rel="stylesheet" />
    <link href="../css/Site.css" rel="stylesheet" />
    
  
    
    <style> 
   .center-inner
   {
    margin-top: 12px;
    margin-left: 25px;
    margin-right: 25px;
  ;
    padding-left: 34px;
    letter-spacing: 1px;
    height: 200px;
    padding-top: 27px;
    text-align: center;

   }
 
    </style> 
</head>
<body>


    <div class="container">
      <div class="row">
          <nav class="navbar navbar-inverse container-fluid navbar-fixed-top">
      
            <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="true">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
              
                </div>
                 <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
   
                        <li class="hover"><a href="../dbc/attendance_view.php"><span class="glyphicon glyphicon-home"></span>Back</a></li>

                    </ul>
            
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../insider/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    
                    </ul>
                </div>
            </nav>
             <hr>
        </div>

        <div class="row">

            <div class="col-sm-12">
                <div class="center-inner">
                <div class ="table-row" style='padding-left:40px;'>
           <div class='jumbotron'>
           <h4 class='display-4'> Attendance Details </h4>
               <span style='font-family:monospace; font-size:19px; color:green; '> Student's ID </span>:<span style="color:purple; font-family:monospace; font-size:19px;  padding-bottom:25px;">
                     <?php if(isset($_GET['regno'])){ echo $_GET['regno'];} ?>
                </span>
           </div>
        
                <table  class="table table-bordered " style="margin-top:25px; margin-left:110px; width:auto;" >
                <tr>
                        <th>Subject</th>
                    <?php
                        $resultSubcode = $getSubCode->getSubCodeByReg($regno);
                   
                        foreach($resultSubcode as $key => $item)
                        {?> 
                        <th><?php echo $item['sub_code']; ?></th> 
                 
                    
                  <?php }?>
                </tr>
                <tr>
                    <td>Percentage :</td>
                <?php 
                  foreach($resultSubCodeByPer as $id => $dat)
                {?>
                  <td><?php echo $dat['someOne']; ?></td>
      
         

                    <?php }?>

                    </tr>
            </table> 
                 
                </div>

            </div>  

        </div>  
    
   
    </div>
   

    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
  
</body>
</html>

   <script>
</script>
