<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>faculty pannel</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/Site.css" rel="stylesheet" />
    
  
    
    <style> 
   .navbar-inverse .navbar-nav > li > a {
   font-size: 19px;
   
   }
   .navbar-header
   {
       background-color: darkgreen;
   }
   .navbar-inverse {
    background-color: #3c763d;
    border-color: #eee;
}
   #line
   {
      border: 1px solid rebeccapurple;
      height: auto;
      border-bottom-style:none ;
      border-right-style: none;
      border-top-style: none;
      padding-left:15px;
      padding-bottom:15px;


   }

   .self
   {
    
   }

    </style> 
</head>
<body ng-app="myApp" >


    <div class="container" ng-controller="arrCtrl" >
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
                   
                    <li class="hover" style="margin-top: 10px; font-size: larger; color: darkgrey;"><span class="glyphicon glyphicon-home"></span> Digital Attendance</li>

                </ul>
           
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class=""></span>
                     <?php
                        if(isset($_SESSION['facultyName'])){echo $_SESSION['facultyName'];}
                        ?></a></li>
                
                </ul>
            </div>
       
    </nav>
          <br>
          <br>
          <hr>
        </div>
        <div class="col-sm-12">
         

            <div class="col-sm-6" >
                <h6 style="font-size: x-large; font-family: 'Courier New', Courier, monospace;" id="error_ms">Welcome  </h6>
                <hr>
               <div class="row">
                <!-- <img src="img/img2.jpg" style="vertical-align: middle; padding: 5px; margin-left: 15px;"></img>
               -->
                </div>
             <div class="row">
                 <h4 style="font-family: 'Courier New', Courier, monospace; color: darkorange;">Our Story</h4>
                
                    <ul style="color: darkmagenta; font-family: 'Courier New', Courier, monospace;">
                        <li><a href="#">Events</a></li>
                        <li>Programs</li>
                        <li>Community</li>
                        <li>Cover Story</li>
                    </ul>

               
                 
                </div>
          </div>
            <div class="col-sm-6">
                <h6 style="font-size: x-large; font-family: 'Courier New', Courier, monospace; color: brown;">Gateway : faculty |<span><a href="insider/sysadminlogin.php" style=" margin-left:12px;color:purple; text-decoration:none;">Admin login</a></span></h6>
                <hr>
                <div class="col-sm-6">
              <form method="POST" action="#">
                <h5 id="error_log"> </h5>
                <div class="form-group">
                 
                     <label>FacultyID : </label>
                     <input type="email" name="email" id="email" placeholder='Email' class="form-control">
                 </div>
                 <div class="form-group">
                
                     <label>Password : </label>
                     <input type="password" name="password" id="password" class="form-control">
                 </div>
                
                </form>
                <button class="btn btn-success" onclick=" validate_login()"style="width:100%; margin-bottom:28px;" > login </button> <br/>
                <span ><a href="insider/signUpfaculty.php" style="padding:27px; margin-left:25px; color:purple; text-decoration:none;
                font-family:mono space; font-size:17px;">SignUp for Faculty</a></span>
          
              
                         

                          <div class="row" style="margin-bottom:25px;">
                              <h6 style=" margin-top:40px; margin-botton:35px;font-size: 25px; color: darkorange; font-family: 'Courier New', Courier, monospace;">Student Corner</h6>
                                  <a href="insider/login.php" style="color: #3c763d; margin-left: 50px;">Login</a> <span> or <a href ="insider/register.php" style="color: darkorchid;">signup</a></span>
                          </div>
            </div>
             


            </div>
            
        </div>
    </div>
    <!--Section End-->
    <!--Footer Start-->
    <footer class="container-fluid" style="margin-top:0px;">
        <p>© 2016 <a href="http://footline.com/">Footline</a>, All rights reserved.</p>
    </footer>
    <!--Footer End-->

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  
</body>
</html>

<script>
     function validate_login()
     {
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var arr = {email:email,
                   password:password 
                   };
         var result = validate_input(arr);

         if(result.length ==0){
             
            $.ajax({
                method:'GET',
                url:'url/validate.php?action=btn_faculty',
                data:arr,
                dataType:'json'
            }).then(function(data){


                console.log(data);
                if(data.msg_id==002 && data.msg=='verified'){
                    document.getElementById('error_log').innerHTML = 'Sucess ,Processing.......'
                     document.getElementById('error_log').style='color:green';
               setTimeout(function(){
                window.location.replace('insider/setAttendance.php');

               },3000);
                }else{

                    document.getElementById('error_log').innerHTML =''; 
                    document.getElementById('error_log').innerHTML = data.msg;
                     document.getElementById('error_log').style='color:purple';
                        setTimeout(() => {
                                    document.getElementById('error_log').innerHTML = '' ;
                                    
                                        }, 3000);

                }
            })

         }else{
            document.getElementById('error_log').innerHTML ='';  
                 var i;
                 for( i=0; i<result.length; i++){
                     document.getElementById('error_log').innerHTML += result[i] +',  ';}
                     document.getElementById('error_log').style='color:red';
                        setTimeout(() => {
                                    document.getElementById('error_log').innerHTML = '' ;
                                    
                                        }, 2000);
         }
        
    
     }
     function validate_input(someArray){
                    var holdArray = [];
                        for(const value in someArray){ if(someArray[value]=='' || someArray[value]=='NaN-NaN-NaN'){ holdArray.push(value); }
                        }return holdArray;
                }
</script>