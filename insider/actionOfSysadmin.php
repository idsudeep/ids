<?php
session_start();
 require_once('function.php');
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
                    <li class="hover"><a href="../index.php"><span class="glyphicon glyphicon-home" style="color:#444488;"></span> Home</a></li>
                 
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
                            <a href="#" style="padding-inline: 20px; font-size:17px;" >Add</a>
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
    } }})
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




                $(function(){

                $('#taction a').click(function(){
                            
                            var getaction = $(this).text();
                            var taction=$('#teacherBtn').val();
                            var taction=getaction+taction;
                    });
                        $('#saction a').click(function(){
                        var setaction = $(this).text();
                        var saction=$('#studentBtn').val();
                        var saction=setaction+saction;
                    
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