<?php
session_start();
 require_once('function.php');
?>
<!DOCTYPE html>

<html>
<head>
    <title>faculty pannel</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="../css/bootstrap.css" rel="stylesheet" />
    <link href="../css/Site.css" rel="stylesheet" />
    
  <style> 
    #center_{
        margin-left:0px;
        margin-right:90px;
        height:430px;
        background-color:#67734205 ;
    }
    #lc{
        width:30%;
        
        float:left;
        background:red;

    }
    .rightside{
        width:66%;
        background:purple;
        height: 430px;
        float:right;
        margin-left:15px;
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

            <div id="someDiv" style="width:100%; height:430px; background: #67734205 !important; margin-bottom:25px;">
            <div id="center_" style="margin-top:20px; padding:2px;">
               
                  
                <div class="sidenav" style="margin-top:26px; padding-left:25px;">
         
             
                <button class="dropdown-btn">Department
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                <a href="actionOfSysadmin.php?Course=MCA" style="padding-inline: 20px; font-size:18px;">MCA</a>
                <a href="actionOfSysadmin.php?Course=MBA" style="padding-inline: 20px; font-size:17px;">MBA</a>
                <a href="actionOfSysadmin.php?Course=BCA" style="padding-inline: 20px; font-size:17px;">BCA</a>
                <a href="actionOfSysadmin.php?Course=BCOM" style="padding-inline: 20px; font-size:17px;">BCOM</a>
                  
                <!-- <button class="dropdown-btn">MCA
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-containers">
                    <a href="Course=MCA" style="padding-inline: 20px; font-size:17px;">Student's info</a>
                    <a href="Course=MCA" style="padding-inline: 20px; font-size:18px;">Teacher's info</a>
                    
             
                </div> -->
               
                
                </div>
                

                <button class="dropdown-btn">Events
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <a href="#">ADD Event</a>
                    <a href="#">Manage Event</a>
             
                </div>
                
                <button class="dropdown-btn">Admin Setting's
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <a href="#">Change Password</a>
                    <a href="#">view Details</a>
             
                </div>
                </div>

                
                <div class='ri'></div>

        
            


            </div>


                </div>
        
        </div> 
      
        </div>
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.js"></script> 
</body>
</html>

<script>

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