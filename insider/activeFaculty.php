<?php
session_start();
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
                    <li class="hover"><a href="../dbc/attendance_view.php"><span class="glyphicon glyphicon-home"></span> Attendance viewport</a></li>
                </ul>
                 
                <ul class="nav navbar-nav navbar-right">
                    <li style="color:green"><?php
                    if(isset($_SESSION['facultyName'])){
                        echo '<br>';
                        echo $_SESSION['facultyName'];
                    }
                        ?></li>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> logout</a></li>
               </ul>
            </div>
        </nav>
        </div>
        </div>
            
    <!--Footer Start-->
    <footer class="container-fluid" style="margin-top:520px"; >
        <p style="margin-top:16px; font-family:mono space; color:White;">© 2019 <a href="#">Footline</a>, All rights reserved.</p>
        <p style="margin-top:16px; font-family:mono space; color:white;">Contact's us <a href="#">900000090</a> #100 ft, ellDo, 06.</p>
                      
    </footer>
    <!--Footer End-->

    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>

   
</body>
</html>