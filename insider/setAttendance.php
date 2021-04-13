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
                    <li class="hover"><a href="sysAdminPannel.php"><span class="glyphicon glyphicon-home" style="color:#444488;"></span> Admin Pannel</a></li>
                 
                </ul>
                 
                <ul class="nav navbar-nav navbar-right">
                    <li style="color:green"><?php
                    if(isset($_SESSION['facultyName'])){
                        echo '<br>';
                        echo 'UserID :'.$_SESSION['facultyName'];
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
                        <button class="dropdown-btn btn-info" id='attend_btn' value='Attendance'> Attendance
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-containers" id='getAction'>
                            <a href="addA.php" style="padding-inline: 20px; font-size:18px;" >Add /Remove</a>
                         
                            
                        </div>
                        <button class="dropdown-btn btn-primary" id='studentBtn'value='Student'>View Attendance
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-containers" id='saction'>
         <a href="../dbc/attendance_view.php" style="padding-inline: 20px; font-size:17px;">Get Attendance</a>
     <a href="../dbc/getAllStudent.php" style="padding-inline: 20px; font-size:18px;">View AS JOSN </a>
                            
                        </div>
                
                      
            </div>
           
            <div class='rightside'>

            <div id="displayOne">

            <h5 style="color:blue; font-family:monospace; font-size:18px;"> Assign Subject to Faculty </h5>
         

        
       
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
$(function(){

    
    $('#getAction a').click(function(){
                        var setaction = $(this).text();
                        var ssaction=$('#attend_btn').val();
                        let Action = setaction+ssaction;
                        console.log(Action);   
                        if(Action != '' && Action =='AddAttendance'){
                          
                            $('#displayOne').load('../reqHtml/process.php #firstOne');

                       /*
                          $.ajax({
                              method:'get',
                              url:'../reqHtml/process.html',
                              dataType:'text/html',
                              success:function(htmdata){

                               
                              }
                          })

                       */
                        }
        
    })

    
})
   setTimeout(() => {
       
    $('#removeId').remove();
   }, 3000);

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
</script>
