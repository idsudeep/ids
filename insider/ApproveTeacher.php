<?php
session_start();
 require_once('function.php');
 require_once('../config.php')
?>
<!DOCTYPE html>

<html>
<head>
<script src='../js/popper.min.js'></script>
    <title>faculty pannel</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="../css/bootstrap.css" rel="stylesheet" />
    <link href="../css/Site.css" rel="stylesheet" />
    
  <style> 
    #center_{
       
      
        height:430px;
        background-color:#67734205 ;
        margin-left:98px;
        color:black;
    }
    
    .rightside{
       
        background:#FFF;
        height: 430px;
        margin-left:70px !important;
        padding-left:30px;
        margin-top:25px;
        padding-top:20px;

    
     
    }
    #displayOne {
        width:90%;
        background:#FFF2;
        height: 430px;

    }
  
    .sidenav {
  height: 100%;
  width: 220px;
  position: fixed;
  z-index: 1;
  top: 25px;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 24px;
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  border: none;
  background: none;
  width:100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  color: #f1f1f1;
}

/* Main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

/* Add an active class to the active dropdown button */
.active {
  background-color: green;
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 8px;
}
.dropdown-containers {
  display: none;
  background-color: #262626;
  padding-left: 0px;
}
.alert-info {
    color: #31708f;
    background-color: #d9edf7;
    border-color: #bce8f1;
    width: 40%;
    float: right;
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
                    <li class="hover"><a href="actionOfSysadmin.php?Course=<?php echo $_GET['Course']; ?>"><span class="glyphicon glyphicon-home" style="color:#444488;"></span> Back</a></li>
                 
                </ul>
                 
                <ul class="nav navbar-nav navbar-right">
                    <li style="color:green"><?php
                    if(isset($_SESSION['uId'])){
                        echo '<br>';
                        echo 'UserID :'.$_SESSION['uId'];
                    }
                        ?></li>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> logout</a></li>
               </ul>
            </div>
        </nav>
        </div>
        <div class="row">
                                <span id="removeId">   
                                 <?php if(  $message=MsgFlash('error') ) {?>
                                   	 <div class="alert alert-info">
                                            <div class="container-fluid">
                                              <div class="alert-icon">
                                               
                                              </div>
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="nc-icon nc-simple-remove"></i></span>
                                              </button>
												<span class="nepali-alert np"><?php echo $message; ?></span> 
                                            </div>
                                        </div>
                                    <?php } ?>
								 </span>

</div>
     
            <div id="center_" style="margin-top:20px; padding:2px;">
               
                  
         <div class="sidenav" style="margin-top:26px; padding-left:25px;">
         
<!--              
                <button class="dropdown-btn">Search 's'
                    <i class="fa fa-caret-down"></i>
                </button> -->
                <div class="dropdown-container">
            <!-- <input type="text" name="seach" id="searchid" class="form-control"> -->
              <select id='sem' style="margin-bottom:14px;margin-top:12px;margin-left:0px;width: 96%; height: 40px;" class="form-control"> 
              <option value="1"style="color:red;">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
              <option value="4">Four</option>
              <option value="5">Five</option>
              <option value="6">Six</option>
              </select>
                  
             <button class='btn btn-success' style='margin-bottom:40px; margin-left:45px;'>Submit</button>
                 </div>       
                        <!-- <button class="dropdown-btn">MCA
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-containers">
                            <a href="Course=MCA" style="padding-inline: 20px; font-size:17px;">Student's info</a>
                            <a href="Course=MCA" style="padding-inline: 20px; font-size:18px;">Teacher's info</a>
                        </div> -->
                        <button class="dropdown-btn btn-info" id='teacherBtn' value='Teacher'>Teacher info
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-containers" id='taction'>
                            <a href="ApproveTeacher.php?Course=<?php echo $_GET['Course']; ?>" style="padding-inline: 20px; font-size:17px;" >Add</a>
                            <a href="#" style="padding-inline: 20px; font-size:18px;" >Change</a>
                            <a href="#" style="padding-inline: 20px; font-size:17px;" >View</a>
                            <a href="#" style="padding-inline: 20px; font-size:18px;" >Delete</a>
                            
                        </div>
                        <button class="dropdown-btn btn-primary" id='studentBtn'value='Student'>Student info
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-containers" id='saction'>
                            <a href="#" style="padding-inline: 20px; font-size:17px;">Add</a>
                            <a href="#" style="padding-inline: 20px; font-size:18px;">Change</a>
                            <a href="#" style="padding-inline: 20px; font-size:17px;">View</a>
                            <a href="#" style="padding-inline: 20px; font-size:18px;">Delete</a>
                            
                        </div>
                
                       <button class="dropdown-btn">Admin Setting's
                                <i class="fa fa-caret-down"></i>
                            </button>
                            <div class="dropdown-container">
                                <a href="#">Change Password</a>
                                <a href="#">view Details</a>
                            </div>
                      
            </div>
           
            <div class='rightside'>

            <div id="displayOne">
         
            <span id="ViewStdtbl">
        <span style="color:darkorange; margin-bottom:20px; font-size:26px;" >Approve Teacher's</span>
        <h5 style="margin-left:25px; margin-top:24px; margin-bottom:20px; font-family:monospace; font-size: x-large;"> Teacher's Of <span><?php echo $_GET['Course']; ?> <span style="color:green">Department</span></h5>
        <div id='tableContents'>
           
       
    <?php 
    
         $Ourse = $_GET['Course'];
         $QueryOne = "select faculty_id, faculty_name,mobile_no,issue_Date,status from faculty_tbl where dept_ = '$Ourse' && status ='inactive'";
         $Conect_db = mysqli_connect($servername ='localhost',$username ='root',$password='',$db='update_data');
          $RunQueryOne = mysqli_query($Conect_db,$QueryOne);                         
    ?>

   <?php 
   if($RunQueryOne->num_rows>0)
   {?>
    <table class="table table-bordered" id="tableId" >
               <thead>
                  <tr><th>FullName</th><th>mobile_no</th><th>Data</th><th>status</th><th>Action</th></tr>
               </thead>  
   <?php }else{ echo "<p> Zero Result </p>";}?><?php
   
       
       while($someRow = mysqli_fetch_assoc($RunQueryOne))
       {?> 
        
       
                <tbody>
                    <td><?php echo $someRow['faculty_name'];?></td>
                    <td><?php echo $someRow['mobile_no']; ?></td>
                    <td><?php echo $someRow['issue_Date'];?></td>
                    <td><?php echo $someRow['status']; ?> </td>
                    <td>
                        <a href="action.php?action=ApproveTeacher&facultyid=<?php echo $someRow['faculty_id'];?>&Course=<?php echo $_GET['Course'];?>&DoorKey=001" style="text-decoration:none; color:purple;">Approve</a>
                    </td>
              </tbody>
         
 
        <?php }?>
       
        </table>
              <h5 style="margin-left:25px; float:right; font-family:monospace; font-size: x-large; display:inline;" id="errormsg"> </h5>
       
   </div>
       
        <!-- end of display -->         
        </div>        
        <!-- end of right -->

    </div>
      <!-- end of Container -->
 
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.js"></script>
  
    <script src="../js/bootstrap.js"></script> 
   
</body>
</html>

<script>
      
    var forwhat = `<?php echo $_GET['Course'];?>`;  

    
                    
    function ChangeFacultyInfo(){
      
         var FID = document.getElementById('FID').value;

         var setArr= {'FID':FID,'forwhat':forwhat};
         someresult = validate_input(setArr);
        if(someresult.length <=0){
            $.ajax({
                method:'GET',
                dataType:'json',
                url:'../sys/getFChange.php?action=changefacultyinfo',
                data:setArr,
                success:function(JSONObject)
                {
                    var peopleHTML = "";
                    if(JSONObject.length>0){
                        
                        for (var key in JSONObject) {
  
  if (JSONObject.hasOwnProperty(key)) {
      
     const approve= `<button class='ChangeFaculty btn-sm btn-warning' value='${JSONObject[key]['faculty_id']}' id="Updateid">Update</button>`;
      peopleHTML += "<tr style='border-bottom-style:hidden;'>";
      peopleHTML += `<td> <input type ='text' id='facultyName' style='border: 0px solid #ccc; margin-top:12px;' class="form-control"  Value='${JSONObject[key]['faculty_name']}'</td>`;
       peopleHTML += `<td> <input type ='text' id='dept_'  style='border: 0px solid #ccc; margin-top:12px;'  class="form-control"   Value='${JSONObject[key]['dept_']}'</td>`;
      peopleHTML += `<td> <input type ='text' id='mobileNo' style='border: 0px solid #ccc; margin-top:12px;' class="form-control" Value='${JSONObject[key]['mobile_no']}'</td>`;
      peopleHTML += `<td> <input type ='text' id='status'  style='border: 0px solid #ccc; margin-top:12px;' class="form-control"   Value='${JSONObject[key]['status']}'</td>`;

      peopleHTML += "<td>" +  approve  + "</td>";
     peopleHTML += "</tr>";
  }
}   
                  var thRow = `<tr><th style="width: 25%  !important;">FullName</th><th>Depart</th><th style=" width:20% !important;">mobile_no</th><th style="width:15%  !important;">status</th><th>Action</th></tr>`;  
                  $("#tableId thead").html(thRow);
                  $("#tableId tbody").html(peopleHTML);
                   
              

                    }else{
                        var message = 'NO result Found';
                        $('#errors').html(message);
                        peopleHTML += "";
                        $("#tableId tbody").html(peopleHTML);
                    setTimeout(() => { message ="";
                        $('#errors').html(message);
                      }, 2000);
                    }

                    $('.ChangeFaculty').on('click',function(){
                          var faculty_ID = $(this).val(); /* Update_Btn value from Table change info */
                     
                          var facultyID = document.getElementById('FID').value; /* vaLue from  input Form */
                          var facultyname = document.getElementById('facultyName').value;
                          var mobileno = document.getElementById('mobileNo').value;
                          var dept = document.getElementById('dept_').value;
                         var statuS = document.getElementById('status').value;

                          var propArray = { 'facultyId':facultyID ,'facultyName':facultyname,'mobileNo':mobileno,'dept_':dept,'status':statuS };
                        
                         console.log(propArray);
                          var validate_setArray = validate_input(propArray);                             
               
                          if(validate_setArray.length<=0){
                            var setArray = {'facultyId':faculty_ID ,'facultyName':facultyname,'mobileNo':mobileno,'dept_':dept,'status':statuS};
                              $.ajax({
                                  method:'GET',
                                  data:setArray,
                                  dataType:'json',
                                  url:'../sys/getFChangeReq.php?action=changeFaculty',
                                  success: function(Cdata){
                                        if(Cdata.changed_status_code != ''){
                                            document.getElementById('changed_message').innerHTML='';
                                            document.getElementById('changed_message').innerHTML='Updated Succeed : '+Cdata.changed_status_code;   
                                        }   
                                  }
                              }).done(function(Cdata){
                                  setTimeout(() => {
                                    document.getElementById('changed_message').innerHTML='';
                                  }, 3000);

                              }) 
                            }else{
                                document.getElementById('errors').innerHTML ='';  
                            var i;
                        for( i=0; i<validate_setArray.length; i++){
                            document.getElementById('errors').innerHTML += validate_setArray[i] +',  ';}
                            document.getElementById('errors').style='color:red';
                     setTimeout(() => {
                                    document.getElementById('errors').innerHTML = '' ;
                                    document.getElementById('semester').style='background:none';
                                        }, 2000);
                            }
                            // End condition if(someArr.length<=o)
                        })
     
                }
                // end of success 
            })  
//ajax end 

        }else{
            document.getElementById('errors').innerHTML ='';  
                 var i;
                 for( i=0; i<someresult.length; i++){
                     document.getElementById('errors').innerHTML += someresult[i] +',  ';}
                     document.getElementById('errors').style='color:red';
                     
                        
                     setTimeout(() => {
                                    document.getElementById('errors').innerHTML = '' ;
                                
                                    
                                        }, 2000);
         }

  }

    function ViewAllStd(){
        var batchNo = document.getElementById('BatchNo').value;
         var seMesteR = document.getElementById('seMesteR').value;

         var fixArr= {'batchNo':batchNo,'seMesteR':seMesteR,'forwhat':forwhat};
         somE_rEsult = validate_input(fixArr);

         if(somE_rEsult.length<=0){
            $.ajax({
                method:'GET',
                dataType:'json',
                url:'../sysF/get-Std-ls.php?action=ViewStdinfo',
                data:fixArr,
                success:function(VData)
                {
                    var HTMLele = "";
                    if(VData.length>0){
                        for (var key in VData) {
  
  if (VData.hasOwnProperty(key)) {
     const approve= `<button class='DeleteOneStd btn-sm btn-default' value='${VData[key]['userID']}' id="Updateid">link</button>`;
     HTMLele += "<tr>";
     HTMLele += "<td>" + VData[key]["regno"] + "</td>";
     HTMLele += "<td>" + VData[key]["fname"] + "</td>";
     HTMLele += "<td>" + VData[key]["mobile_no"] + "</td>";
     HTMLele += "<td>" + VData[key]["status"] + "</td>";
     HTMLele += "<td>" + VData[key]["DOJ"] + "</td>";
 

      HTMLele += "<td>" +  approve  + "</td>";
      HTMLele += "</tr>";
  }
}                   $("#tableId tbody").html(HTMLele);
                   
              

                    }else{
                        var message = 'NO result Found';
                        $('#errormsg').html(message);
                        HTMLele += "";
                        $("#tableId tbody").html(HTMLele);
                    setTimeout(() => { message ="";
                        $('#errormsg').html(message);
                      }, 2000);
                    }
                }  

            })
         }else{document.getElementById('errormsg').innerHTML ='';  
                 var i;
                 for( i=0; i<somE_rEsult.length; i++){
                     document.getElementById('errormsg').innerHTML += somE_rEsult[i] +',  ';}
                     document.getElementById('errormsg').style='color:red';
                 setTimeout(() => {document.getElementById('errormsg').innerHTML = '' ; }, 2000);
             
         }
        
    }                               
    function GetDeleteStdInfo(){
        var batchNumber = document.getElementById('batchNumber').value;
         var rEgno = document.getElementById('rEgno').value;

         var setArr= {'batchNo':batchNumber,'regno':rEgno,'forwhat':forwhat};
         SomeResult = validate_input(setArr);
  
        if(SomeResult.length <=0){
            $.ajax({
                method:'GET',
                dataType:'json',
                url:'../sysF/getStdDelete.php?action=DeleteStdinfo',
                data:setArr,
                success:function(DData)
                {
                    var HTMLele = "";
                    if(DData.length>0){
                        for (var key in DData) {
  
  if (DData.hasOwnProperty(key)) {
     const approve= `<button class='DeleteOneStd btn-sm btn-warning' value='${DData[key]['userID']}' id="Updateid">Delete</button>`;
      HTMLele += "<tr>";
      HTMLele += '<td> '+DData[key]['regno']+'</td>';
      HTMLele += '<td> '+DData[key]['fname']+'</td>';
      HTMLele += '<td> '+DData[key]['sem']+'</td>';
      HTMLele += '<td> '+DData[key]['Course']+'</td>';
      HTMLele += '<td> '+DData[key]['mobile_no']+'</td>';
      HTMLele += '<td> '+DData[key]['status']+'</td>';

      HTMLele += "<td>" +  approve  + "</td>";
      HTMLele += "</tr>";
  }
}                   $("#tableId tbody").html(HTMLele);
                   
              

                    }else{
                        var message = 'NO result Found';
                        $('#Delete_message').html(message);
                        HTMLele += "";
                        $("#tableId tbody").html(HTMLele);
                    setTimeout(() => { message ="";
                        $('#Delete_message').html(message);
                      }, 2000);
                    }
                    
                    $('.DeleteOneStd').on('click',function(){
                          var reG = $(this).val();
                          var postD = {'Del_userid':reG};
                       
                          $.ajax({
                                  method:'GET',
                                  data:postD,
                                  dataType:'json',
                                  url:'../sysF/getStdDeleteReq.php?action=DeleteOneStd',
                                  success: function(Deldata){
                                        if(Deldata.Delete_status_code != ''){
                                            document.getElementById('Delete_message').innerHTML='';
                                            document.getElementById('Delete_message').innerHTML='Delete Succeed ';   
                                     setTimeout(() => {document.getElementById('Delete_message').innerHTML = '' ; }, 2000);
                                     var eleH =''
                                     $("#tableId tbody").html(eleH);
                                    }
                                  }
                              })
                        
                        })

              
                }
                // ajax end
            })
    }else{  document.getElementById('Delete_message').innerHTML ='';  
                 var i;
                 for( i=0; i<SomeResult.length; i++){
                     document.getElementById('Delete_message').innerHTML += SomeResult[i] +',  ';}
                     document.getElementById('Delete_message').style='color:red';
                 setTimeout(() => {document.getElementById('Delete_message').innerHTML = '' ; }, 2000);
         }
 }
  function ChangeStdinfo(){
         var batchNo = document.getElementById('batchNo').value;
         var regno = document.getElementById('regno').value;

         var setArr= {'batchNo':batchNo,'regno':regno,'forwhat':forwhat};
         someresult = validate_input(setArr);
        if(someresult.length <=0){
            $.ajax({
                method:'GET',
                dataType:'json',
                url:'../sysF/GetStdChange.php?action=changeStdinfo',
                data:setArr,
                success:function(JSONObject)
                {
                    var peopleHTML = "";
                    if(JSONObject.length>0){
                        for (var key in JSONObject) {
  
  if (JSONObject.hasOwnProperty(key)) {
     const approve= `<button class='ChangeOne btn-sm btn-warning' value='${JSONObject[key]['userID']}' id="Updateid">Update</button>`;
      peopleHTML += "<tr>";
      peopleHTML += `<td> <input type ='text' id='regnO' class="form-control"  Value='${JSONObject[key]['regno']}'</td>`;
      peopleHTML += `<td> <input type ='text' id='fnamE'  class="form-control"    Value='${JSONObject[key]['fname']}'</td>`;
      peopleHTML += `<td> <input type ='text' id='seMesteR' class="form-control"     Value='${JSONObject[key]['sem']}'</td>`;
      peopleHTML += `<td> <input type ='text' id='CoursE'   class="form-control"   Value='${JSONObject[key]['Course']}'</td>`;
      peopleHTML += `<td> <input type ='text' id='mobile_nO' class="form-control" Value='${JSONObject[key]['mobile_no']}'</td>`;
      peopleHTML += `<td> <input type ='text' id='statuS'  class="form-control"   Value='${JSONObject[key]['status']}'</td>`;

      peopleHTML += "<td>" +  approve  + "</td>";
     peopleHTML += "</tr>";
  }
}                   $("#tableId tbody").html(peopleHTML);
                   
              

                    }else{
                        var message = 'NO result Found';
                        $('#errors').html(message);
                        peopleHTML += "";
                        $("#tableId tbody").html(peopleHTML);
                    setTimeout(() => { message ="";
                        $('#errors').html(message);
                      }, 2000);
                    }

                    $('.ChangeOne').on('click',function(){
                          var reG = $(this).val(); /* Update_Btn value from Table change info */
                          var regnO = document.getElementById('regnO').value; /* above Table regno text-box */
                          var regNo = document.getElementById('regno').value; /* vaLue from  input Form */
                          var fullname = document.getElementById('fnamE').value;
                          var mobilenO = document.getElementById('mobile_nO').value;
                          var CoursE = document.getElementById('CoursE').value;
                          var seMesteR = document.getElementById('seMesteR').value;
                          var statuS = document.getElementById('statuS').value;
                          var batchNo = document.getElementById('batchNo').value;

                          var propArray = {'regNo':regNo,'batchNo':batchNo,   'statuS':statuS,'regno':regnO,
                                                         'mobile_no':mobilenO,'sem':seMesteR,
                                                         'forwhat':forwhat ,  'userID':reG,
                                                         'fullname':fullname, 'CoursE':CoursE};
                           var validate_setArray = validate_input(propArray);                             
               
                          if(validate_setArray.length<=0){
                            var setArray = {'batchNo':batchNo, 'statuS':statuS,'regNo':regnO,
                                                        'mobileNo':mobilenO,'seMesteR':seMesteR,
                                                      'forwhat':CoursE ,'userID':reG,'fullName':fullname, };
                              $.ajax({
                                  method:'GET',
                                  data:setArray,
                                  dataType:'json',
                                  url:'../sysF/getStdChangeReq.php?action=changeStd',
                                  success: function(Cdata){
                                        if(Cdata.changed_status_code != ''){
                                            document.getElementById('changed_message').innerHTML='';
                                            document.getElementById('changed_message').innerHTML='Updated Succeed : '+Cdata.changed_status_code;   
                                        }   
                                  }
                              }).done(function(Cdata){
                                  setTimeout(() => {
                                    document.getElementById('changed_message').innerHTML='';
                                  }, 3000);

                              }) 
                            }else{
                                document.getElementById('errors').innerHTML ='';  
                            var i;
                        for( i=0; i<validate_setArray.length; i++){
                            document.getElementById('errors').innerHTML += validate_setArray[i] +',  ';}
                            document.getElementById('errors').style='color:red';
                     setTimeout(() => {
                                    document.getElementById('errors').innerHTML = '' ;
                                    document.getElementById('semester').style='background:none';
                                        }, 2000);
                            }
                            // End condition if(someArr.length<=o)
                        })
     
                }
                // end of success 
            })  
//ajax end 

        }else{
            document.getElementById('errors').innerHTML ='';  
                 var i;
                 for( i=0; i<someresult.length; i++){
                     document.getElementById('errors').innerHTML += someresult[i] +',  ';}
                     document.getElementById('errors').style='color:red';
                     
                        
                     setTimeout(() => {
                                    document.getElementById('errors').innerHTML = '' ;
                                
                                    
                                        }, 2000);
         }

  }


function FunStdChange(){
        var sem = document.getElementById('semester').value;
        var batchNo = document.getElementById('batchNo').value;

        var arr = {'sem':sem,'batchNo':batchNo,'forwhat':forwhat};

        someresult = validate_input(arr);

        console.log(arr);
        if(someresult.length <=0){
            $.ajax({
                method:'GET',
                dataType:'json',
                url:'../sysF/GetStdApprovels.php?action=stdApprove',
                data:arr,
                success:function(JSONObject)
                {
                    if(JSONObject.length>0){
                 
      var peopleHTML = "";
      for (var key in JSONObject) {
  
        if (JSONObject.hasOwnProperty(key)) {
          
 
            const approve= `<button class='ApproveOne btn-sm btn-warning' value='${JSONObject[key]['regno']}' id="Approve">Approve</button>`;
            peopleHTML += "<tr>";
            peopleHTML += "<td>" + JSONObject[key]["regno"] + "</td>";
            peopleHTML += "<td>" + JSONObject[key]["fname"] + "</td>";
            peopleHTML += "<td>" + JSONObject[key]["mobile_no"] + "</td>";
            peopleHTML += "<td>" + JSONObject[key]["status"] + "</td>";
            peopleHTML += "<td>" + JSONObject[key]["DOJ"] + "</td>";
            peopleHTML += "<td>" +  approve  + "</td>";
           peopleHTML += "</tr>";
        }
      } $("#tableId tbody").html(peopleHTML);
    }else{
                    var message = 'NO result Found';
                        $('#errors').html(message);
                        peopleHTML += "";
                        $("#tableId tbody").html(peopleHTML);
                    setTimeout(() => { message +="";
                        $('#errors').html(message);
                      }, 2000);}
           
                      $('.ApproveOne').on('click',function(){
                          var userID = $(this).val();
                          if(userID !='')
                          {
                            
                             var someVal = {'batchNo':batchNo, 'sem':sem,'forwhat':forwhat ,'userID':userID};

                              $.ajax({
                                  method:'GET',
                                  data:someVal,
                                  dataType:'json',
                                  url:'../sysF/getStdAproveReq.php?action=StdApprovel',
                                  success: function(Adata){
                            
                                  }
                              }).done(function(Adata){
                                 if(Adata.approved_status_id != '')
                                 {
                                    $.ajax({
                method:'GET',
                dataType:'json',
                url:'../sysF/GetStdApprovels.php?action=stdApprove',
                data:arr,
                success:function(JSONObject)
                {
                    if(JSONObject.length>0){
                 
      var peopleHTML = "";
      for (var key in JSONObject) {
  
        if (JSONObject.hasOwnProperty(key)) {
          
 
            const approve= `<button class='ApproveOne btn-sm btn-warning' value='${JSONObject[key]['regno']}' id="Approve">Approve</button>`;
            peopleHTML += "<tr>";
            peopleHTML += "<td>" + JSONObject[key]["regno"] + "</td>";
            peopleHTML += "<td>" + JSONObject[key]["fname"] + "</td>";
            peopleHTML += "<td>" + JSONObject[key]["mobile_no"] + "</td>";
            peopleHTML += "<td>" + JSONObject[key]["status"] + "</td>";
            peopleHTML += "<td>" + JSONObject[key]["DOJ"] + "</td>";
            peopleHTML += "<td>" +  approve  + "</td>";
           peopleHTML += "</tr>";
        }
      } $("#tableId tbody").html(peopleHTML);
    } 
  /*  */
  $('.ApproveOne').on('click',function(){
                          var userID = $(this).val();
                          if(userID !='')
                          {
                            
                             var someVal = {'batchNo':batchNo, 'sem':sem,'forwhat':forwhat ,'userID':userID};

                              $.ajax({
                                  method:'GET',
                                  data:someVal,
                                  dataType:'json',
                                  url:'../sysF/getStdAproveReq.php?action=StdApprovel',
                                  success: function(Adata){
                            
                                  }
                              }).done(function(Adata){
                                 if(Adata.approved_status_id != '')
                                 {
                                    $.ajax({
                method:'GET',
                dataType:'json',
                url:'../sysF/GetStdApprovels.php?action=stdApprove',
                data:arr,
                success:function(JSONObject)
                {
                    if(JSONObject.length>0){
                 
      var peopleHTML = "";
      for (var key in JSONObject) {
  
        if (JSONObject.hasOwnProperty(key)) {
          
 
            const approve= `<button class='ApproveOne btn-sm btn-warning' value='${JSONObject[key]['regno']}' >Approve</button>`;
            peopleHTML += "<tr>";
            peopleHTML += "<td>" + JSONObject[key]["regno"] + "</td>";
            peopleHTML += "<td>" + JSONObject[key]["fname"] + "</td>";
            peopleHTML += "<td>" + JSONObject[key]["mobile_no"] + "</td>";
            peopleHTML += "<td>" + JSONObject[key]["status"] + "</td>";
            peopleHTML += "<td>" + JSONObject[key]["DOJ"] + "</td>";
            peopleHTML += "<td>" +  approve  + "</td>";
           peopleHTML += "</tr>";
        }
      } $("#tableId tbody").html(peopleHTML);
    } }})
                                 }
                                
                              });
                          }
                       })
                       //
                       $('.ApproveOne').on('click',function(){
                          var userID = $(this).val();
                          if(userID !='')
                          {
                            
                             var someVal = {'batchNo':batchNo, 'sem':sem,'forwhat':forwhat ,'userID':userID};

                              $.ajax({
                                  method:'GET',
                                  data:someVal,
                                  dataType:'json',
                                  url:'../sysF/getStdAproveReq.php?action=StdApprovel',
                                  success: function(Adata){
                            
                                  }
                              }).done(function(Adata){
                                 if(Adata.approved_status_id != '')
                                 {
                                    $.ajax({
                method:'GET',
                dataType:'json',
                url:'../sysF/GetStdApprovels.php?action=stdApprove',
                data:arr,
                success:function(JSONObj)
                {
       
       
        }}).done(function(JSONObj){
            if(JSONObj.length>0){
                 
                 var peopleHTML = "";
                 for (var key in JSONObj) {
             
                   if (JSONObj.hasOwnProperty(key)) {
                     
            
                       const approve= `<button class='ApproveOne btn-sm btn-warning' value='${JSONObj[key]['regno']}' >Approve</button>`;
                       peopleHTML += "<tr>";
                       peopleHTML += "<td>" + JSONObj[key]["regno"] + "</td>";
                       peopleHTML += "<td>" + JSONObj[key]["fname"] + "</td>";
                       peopleHTML += "<td>" + JSONObj[key]["mobile_no"] + "</td>";
                       peopleHTML += "<td>" + JSONObj[key]["status"] + "</td>";
                       peopleHTML += "<td>" + JSONObj[key]["DOJ"] + "</td>";
                       peopleHTML += "<td>" +  approve  + "</td>";
                      peopleHTML += "</tr>";
                   }
                 } $("#tableId tbody").html(peopleHTML);
               }else{
                   var removeEle ="";
                
                $("#tableId tbody").html(removeEle);

               }
        })
                                 }
                                
                              });
                          }
                       })
}})
                                 }
                                
                              });
                          }
                       })
                    } 
             })
      }else{
            document.getElementById('error_log').innerHTML ='';  
                 var i;
                 for( i=0; i<someresult.length; i++){
                     document.getElementById('error_log').innerHTML += someresult[i] +',  ';}
                     document.getElementById('error_log').style='color:red';
                        
                     setTimeout(() => {
                                    document.getElementById('error_log').innerHTML = '' ;
                          
                                    
                                        }, 2000);
         }
}

                    function GetIdDel(){
                        var delete_input = document.getElementById('delete_input').value;
                        if(delete_input != ''){
                        var wrapval = {'delete_input':delete_input,'forwhat':forwhat};
                        console.log(wrapval);
                        $.ajax({
                            url:'../sys/getDeleteOneInfo.php?action=getDelOneInfo',
                            method:'get',
                            dataType:'json',
                            data:wrapval,
                            success:function(data){
                              
                                HTMLele="";
                         if(data.message !='empty'){
                        for (var key in data) {
  
  if (data.hasOwnProperty(key)) {
      
     const approve= `<button class='DeleteOnefaculty btn-sm btn-default' value='${data[key]['faculty_id']}'>Delete</button>`;
     HTMLele += "<tr>";
     HTMLele += "<td>" + data[key]["faculty_name"] + "</td>";
     HTMLele += "<td>" + data[key]["email"] + "</td>";
     HTMLele += "<td>" + data[key]["dept_"] + "</td>";
     HTMLele += "<td>" + data[key]["mobile_no"] + "</td>";
     HTMLele += "<td>" + data[key]["status"] + "</td>";
     HTMLele += "<td>" + data[key]["DOJ"] + "</td>";
 

      HTMLele += "<td>" +  approve  + "</td>";
      HTMLele += "</tr>";
  }
}                
    var thRow = `<tr><th style="width: 25%  !important;">facultName</th><th style="width: 32%  !important;">Email</th><th style="width: 10% !important;">Dept</th><th style=" width:20% !important;">mobile_no</th><th style="width:15%  !important;">status</th><th>Date_of_join</th><th>Action</th></tr>`;  
                  $("#tableId thead").html(thRow);
                  $("#tableId tbody").html(HTMLele);
                   
              

                    }else{
                        var message = 'NO result Found';
                        $('#derror').html(message);
                        HTMLele += "";
                        thRow +="";
                        $("#tableId thead").html(thRow);
                        $("#tableId tbody").html(HTMLele);
                    setTimeout(() => { message ="";
                        $('#derror').html(message);
                      }, 2000);
                    }

                    $('.DeleteOnefaculty').on('click',function(){
                          var reG = $(this).val();
                          var objD = {'delete-input':reG};
                       
                          $.ajax({
                                  method:'GET',
                                  data:objD,
                                  dataType:'json',
                                  url:'../sys/getDeleteFacultyReq.php?action=DeleteOne',
                                  success: function(Deldata){
                                        if(Deldata.Delete_status_code != ''){
                                            document.getElementById('derror').innerHTML='';
                                            document.getElementById('derror').innerHTML='Delete Succeed ';   
                                     setTimeout(() => {document.getElementById('derror').innerHTML = '' ; }, 2000);
                                     var eleH =''
                                     var thRow ='';
                                     $("#tableId thead").html(thRow);
                                     $("#tableId tbody").html(eleH);
                                    }
                                  }
                              })
                        
                        })

                            }
                        })


                        }else{
                            document.getElementById('derror').innerHTML='inValid input';
                            setTimeout(() => {
                                    document.getElementById('derror').innerHTML = '' ;
                          
                                    
                                        }, 2000);
                        }
                    }
                

                $(function(){

                $('#taction a').click(function(){
                            
                            var getaction = $(this).text();
                            var taction=$('#teacherBtn').val();
                            var ttaction=getaction+taction;
                     if((ttaction !='') && (ttaction =='ChangeTeacher')){
                        $.ajax({
                            method:'get',
                            url:'../sys/getF-ById.html',
                            success:function(data){ $('#displayOne ').load("../sys/getF-ById.html #GetFacultySpan");}
                            });
                   }if((ttaction !='') && (ttaction =='ViewTeacher')){
                    $('#displayOne ').load("../sys/getF-ById.html #viewTeachers");  
                          var objforwhat = {'forwhat':forwhat};
                        $.ajax({
                            url:'../sys/getTeacherls.php?action=view-facultyls',
                            method:'get',
                            dataType:'json',
                            data:objforwhat,
                            success:function(dataT){
                                
                                if(dataT.message !='empty'){
                 
                                                 
                 var peopleHTML = "";
                 for (var key in dataT) {
             
                   if (dataT.hasOwnProperty(key)) {
                     
            
                       const tool= `<button class='ApproveOne btn-sm btn-info' value='${dataT[key]['regno']}' id="link-pass">GO</button>`;
                       peopleHTML += "<tr>";
                       peopleHTML += "<td>" + dataT[key]["faculty_name"] + "</td>";
                       peopleHTML += "<td>" + dataT[key]["email"] + "</td>";
                       peopleHTML += "<td>" + dataT[key]["dept_"] + "</td>";
                       peopleHTML += "<td>" + dataT[key]["mobile_no"] + "</td>";
                       peopleHTML += "<td>" + dataT[key]["status"] + "</td>";
                       peopleHTML += "<td>" + dataT[key]["DOJ"] + "</td>";
                       peopleHTML += "<td>" +  tool  + "</td>";
                      peopleHTML += "</tr>";
                   }
                 }
                   var departname = 'Teacher of  '+ dataT[key]['dept_'] +'  Department';
                   $('#Dept_name').append(departname);
                 var thRow = `<tr><th style="width: 25%  !important;">FullName</th><th>Email</th><th>Dept</th><th style=" width:20% !important;">mobile_no</th><th style="width:15%  !important;">status</th><th style="width: 25%  !important;">Date_of_join</th><th>Action</th></tr>`;  
                  $("#tableId thead").html(thRow);
                 $("#tableId tbody").html(peopleHTML);
                     
               }else{
                               var message = 'NO result Found';
                                   $('#verror').html(message);
                               var peopleHTML = "";
                                   $("#tableId tbody").html(peopleHTML);
                               setTimeout(() => { message +="";
                                   $('#verror').html(message);
                                 }, 2000);}
                            
                                }
                            });
                      }if((ttaction !='') && (ttaction =='DeleteTeacher')){
                        $.ajax({
                            method:'get',
                            url:'../sys/getF-ById.html',
                            success:function(data){ $('#displayOne ').load("../sys/getF-ById.html #facultyDeleteform");}
                            });

                        }
                    });

              

                        $('#saction a').click(function(){
                        var setaction = $(this).text();
                        var ssaction=$('#studentBtn').val();
                        var saction=setaction+ssaction;
                     
                            console.log(saction);
                    
                    if((saction !='') && (saction =='AddStudent')){
                        
                        $.ajax({
                            method:'get',
                            url:'../sysF/GetSpanId.html',
                            success:function(data){ $('#displayOne ').load("../sysF/GetSpanId.html #getFormApprove");}
                            });
                    

                    }if((saction !='')&&(saction =='ChangeStudent')){
                        $.ajax({
                            method:'get',
                            url:'../sysF/GetSpanId.html',
                            
                            success:function(data){$('#displayOne').load("../sysF/GetSpanId.html #getmodifieStd");}
                        })
                        }if((saction !='')&&(saction =='DeleteStudent')){
                        $.ajax({
                            method:'get',
                            url:'../sysF/GetSpanId.html',
                            
                            success:function(data){$('#displayOne').load("../sysF/GetSpanId.html #getDeleteForm");}
                        })
                        }if((saction !='')&&(saction =='DeleteStudent')){
                        $.ajax({
                            method:'get',
                            url:'../sysF/GetSpanId.html',
                         success:function(data){$('#displayOne').load("../sysF/GetSpanId.html #getDeleteForm");}
                            })
                        }if((saction !='')&&(saction =='ViewStudent')){
                        $.ajax({
                            method:'get',
                            url:'../sysF/GetSpanId.html',
                         success:function(data){$('#displayOne').load("../sysF/GetSpanId.html #ViewStdtbl");}
                            })
                        }
                        
                        
                    });

                    })
/*
                           setTimeout(() => {
                                
                                $('#removeId').remove();
                            }, 3000);

*/  
                        var dropdown = document.getElementsByClassName("dropdown-btn");
                        var i;
                            for (i = 0; i < dropdown.length; i++) {
                        dropdown[i].addEventListener("click", function() {
                        this.classList.toggle("active");
                        var dropdownContent = this.nextElementSibling;
                        if (dropdownContent.style.display === "block") {
                        dropdownContent.style.display = "none";
                        } else {
                        dropdownContent.style.display = "block";
                        }
                        });
                        }
                function validate_input(someArray){
                    var holdArray = [];
                        for(const value in someArray){ if(someArray[value]=='' || someArray[value]=='NaN-NaN-NaN'){ holdArray.push(value); }
                        }return holdArray;
                }
  

       </script>