<?php 
session_start();
require_once('function.php');


?>


<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="../css/bootstrap.css" rel="stylesheet" />
    <link href="../css/Site.css" rel="stylesheet" />
    
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

</head>
<body>

    <!--Header End-->
    <nav class="navbar navbar-inverse container-fluid navbar-fixed-top">
        <div>
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.html">QrCode</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  
                    <li><a href="login.php"><span class="glyphicon glyphicon-king"></span>  Login</a></li>

                </ul>
           
            
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <!--Section Start-->
    <div class="container">
   
        <div class="row">
            	<div class="col-sm-3">
								    <?php
								   	
								    if(  $message=MsgFlash('error') ) {?>
                                   	
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
								   
								   </div>
            
            <div class="col-sm-6 offset-3">
              
                
<div class="mainreg" style="height: auto !important; margin-bottom:8px;">
    <p class="sign" align="center" style="color:#444488; font-family:mono space; ">Faculty Registration's</p>
    
    
    <form class="form1" method="post" action="action.php?action=f_reg">
      
        <input class="un" type="text" align="center" placeholder="FullName" name="fname">
        <input class="un" type="text" align="center" placeholder="Department(MCA/MBA/MFA)" name="depart_">
  
            
        <input class="un" type="number" align="center" placeholder="Mobile no" name="mobileNo">
        <input class="un" type="email" align="center" placeholder="Email" name="email">
      <input class="pass" type="password" align="center" placeholder="Password" name="words">
      <input class="pass" type="password" align="center" placeholder="Second password" name="words_">
      <button class="submit" align="center" name="f_reg_btn" style="margin-bottom:8px;">Register's</button>
        <br>
            
    </form>      
    </div>
   
            
              
            </div>

            
        </div>
        </div>
    
 

    <!--Section End-->
    <!--Footer Start-->
    <div class="container-fluid">
        <footer>
        <p>© 2019 <a href="http://footline.com/">Footline</a>, All rights reserved.</p>
    </footer>
        
    </div>
    <!--Footer End-->

    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
