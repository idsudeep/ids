<?php 
require_once('../dbc/students.php');

$getSubCode = new Student();
$stdProfile = new Student(); 

$regno = $_GET['regno'];

$resultSubcode = $getSubCode->getSubCodeByReg($regno);
$resultSubCodeByPer = $getSubCode->getSubCodeByPer($regno);
$profileD = $getSubCode->getStdProfile($regno);
$totalCls= $stdProfile->getTotalNoclsBy($regno);
$tPresent_days = $stdProfile->getTotalPresentDaysForProfile($regno);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Student Profile Page Design Example</title>

    <meta name="author" content="#" />
 
    <!--Only for demo purpose - no need to add.-->
    <link rel="stylesheet" href="../css/demo.css" />
    
	    <link rel="stylesheet" href="../css/Pstyle.css">
</head>
<body style='zoom:80%;'>
		
<div class="ScriptTop">
    <div class="rt-container">
        <div class="col-rt-4" id="float-right">
 
            <!-- Ad Here -->
            
        </div>
        <div class="col-rt-2">
            <ul>
                <li><a href="mob_view.php" title="Back to tutorial page">Back </a></li>
            </ul>
        </div>
    </div>
</div>

<header class="ScriptHeader">
    <div class="rt-container">
    	<div class="col-rt-12">
        	<div class="rt-heading">
            	<h1>Student Profile</h1>
                <p style="margin-top: 18px; font-family: monospace; font-size: x-large;"> Attendance Details</p>
            </div>
        </div>
    </div>
</header>

<section>
    <div class="rt-container">
          <div class="col-rt-12">
              <div class="Scriptcontent">
              
<!-- Student Profile -->
<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <img class="profile_img" src="#" alt="student dp">
            <h3><?php echo $profileD[0]['fname']; ?></h3>
          </div>
          <div class="card-body">
            <p class="mb-0"><strong class="pr-1">UserID:</strong> <?php echo $profileD[0]['userid']; ?></p>
            <p class="mb-0"><strong class="pr-1">DOJ:</strong><?php echo $profileD[0]['date_of_join'];?></p>
           
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
            <tr>
                <th width="30%">Regno</th>
                <td width="2%">:</td>
                <td><?php echo $profileD[0]['regno'];?></td>
              </tr>
              <tr>              
                <th width="30%">Academic Year	</th>
                <td width="2%">:</td>
                <td><?php  echo '20'.$profileD[0]['batch_no'];?></td>
              </tr>
              <tr>
                <th width="30%">Course</th>
                <td width="2%">:</td>
                <td><?php echo $profileD[0]['course'];?></td>
              </tr>
            
              <tr>
                <th width="30%">semester's</th>
                <td width="2%">:</td>
                <td><?php echo $profileD[0]['sem'];?></td>
              </tr>
            </table>
          </div>
        </div>
          <div style="height: 26px"></div>
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Attendance Details</h3>
          </div>
          <div class="card-body pt-0">
          <table  class="table table-bordered " style="margin-top:25px;width:auto; float:left;" >
              
                <tr><th>Subject</th>
                <?php
                        $resultSubcode = $getSubCode->getSubCodeByReg($regno);
                   
                        foreach($resultSubcode as $key => $item)
                        {?> 
                        <td><?php echo $item['sub_code']; ?></td> 
                       
                 
                  
                  <?php }?>
                        </tr>
                        <tr>
                  <th> Percentage</th> 
                <?php 
                  foreach($resultSubCodeByPer as $id => $dat)
                {?>
                  <td><?php echo $dat['someOne']; ?></td>
         
      
         

                    <?php }?>
                </tr>
                <tr>
                  <th>Present Days </th>
                  <?php 
                  $decode_arr = json_decode($tPresent_days);
                  foreach($decode_arr as $l => $d )
                {?>
                  <td><?php echo $d[0][0]->content ;?></td>
         <?php }?>
               
          </tr>
                <tr>
                  <th>Total Class </th>
                  <?php 
                  $js = json_decode($totalCls);
                  foreach($js as $i => $k )
                {?>
                  <td><?php echo $k[0][0]->total_no_of_class ;?></td>
         <?php }?>
               
          </tr>
            </table> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- partial -->
           
    		</div>
		</div>
    </div>
</section>
     


    <!-- Analytics -->

	</body>
</html>