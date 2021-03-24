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
                    <li class="hover"><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
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
          <br>
          <br>
          <hr>
        </div>
        <div class="row">
         

            <div class="col-sm-6" >
                <h6 style="font-size: x-large; font-family: 'Courier New', Courier, monospace;" id="error_ms"> Assign a Task </h6>
                <hr>
                <span id="error_msg"></span>
               <form method="POST" action="action.php?action=sub_value">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Course</label>
                        <select class="form-control" id="course" name="course">
                            <option>MCA</option>
                            <option>BCA</option>
                        </select>
                        <input type="hidden" name='facultyID' value="<?php echo $_SESSION['faculty_id']; ?>">
                    </div>
                </div>
               
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Semester's</label>
                        <select class="form-control" id="sem" onchange="onoff()" name="sem" required>
                           <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                           
                         
                            
                        </select>
                    </div>
                </div>
              
                <div class="col-sm-3">
                  
                        <div class="form-group">
                            <label>Subject's</label>
                         <div id="list-item" style="margin-top: 16px;">


                         </div>
                    
                    </div>
                </div>
            <span id="taken" hidden> <input type="submit" class="btn btn-primary" name="btn-assign" id="take" style="float:right;" value ="take"></span> 

               </form>

               <span>
                <button class="btn btn-success " style="
                margin-left: 19px;
                padding: 5px;
                margin-bottom: 10px;" onclick="subV()" id="dis">search</button>
            </span>
            <span style="float: right;"><button class="btn btn-warning self" name="btn-status" id="statusEvent">Status</button></span>
            </div>
            <div class="col-sm-6">
                <h6 style="font-size: x-large; font-family: 'Courier New', Courier, monospace; color: brown;"> Remove a Task </h6>
                <hr>
                <div id="line">
                    
                    <h6 id="errormsg" style="color: sandybrown; font-family: 'Courier New', Courier, monospace;"></h6>
                    <h6 id="sub_msg" style="color: sandybrown; font-family: 'Courier New', Courier, monospace;"></h6>
                    <h6 id="takenby" style="color: sandybrown; font-family: 'Courier New', Courier, monospace;"></h6>
                    <h6 id="last_taken_date" style="color: sandybrown; font-family: 'Courier New', Courier, monospace;"></h6>
                  
                    <h6 id="present_data" style="color:sandybrown ; font-family: 'Courier New', Courier, monospace;"></h6> 

                    <span id="junk-bag"></span>
                    <h6 id="after-update" style="color:rgb(57, 7, 63) ; font-family: 'Courier New', Courier, monospace;"></h6> 

                    <span id="update-hidden" hidden><button class="btn btn-success">Update</button></span> 
                    <span id="clear-db" hidden><button class="btn btn-success">Clear_DB</button></span> 
                  
                </div>

            </div>
            
        </div>
    </div>
    <!--Section End-->
    <!--Footer Start-->
    <footer class="container-fluid" style="margin-top:400px;">
        <p>© 2016 <a href="http://footline.com/">Footline</a>, All rights reserved.</p>
    </footer>
    <!--Footer End-->

    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <!-- <script src="../js/angular.min.js" type="text/javascript"></script> -->
   
</body>
</html>

                        <script>
                           
                        /*
                        update
                        */    
            $('#update-hidden').click(function()
            {

              
                var sem = document.getElementById('sem').value;
                var course = document.getElementById('course').value;
                var sub_code = document.querySelector('select#list-i.dynamic-li option').name;

                var query = {'sem':sem,
                           'course':course,
                          'sub_code':sub_code};

              $.ajax({
                            type:'GET',
                            url: '../url/db_move_req.php?action=update_btn',
                            data: query,
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",
                            success:function(data)
                            {  
                                if(data.error_code == 'e93')
                                {
                                    document.getElementById('after-update').innerHTML= data.error_message;
                                    $('#clear-db').removeAttr('hidden');
                                    $('#after-update').css({'color':'red'});
                                    
                                }
                                if(data.success_code =='s93')
                                {
                                    document.getElementById('after-update').innerHTML=data.success_name;
                                    $('#after-update').css({'color':'green'});
                                    $('#clear-db').removeAttr('hidden');
                                }
                                     
                                if(data !=undefined)
                                {
                                    $('#clear-db').click(function(){

                                        $.ajax({
                                            method:'GET',
                                            url:'../url/clear_db_req.php?action=clear_db_req',
                                            data:query,
                                            contentType:"application/json; charset=utf-8",
                                            dataType:'json',
                                            success:function(err_data)
                                            {
                                            
                                                if(err_data)
                                                {
                                                    console.log(err_data);
                                                }
                                            }

                                      })
                                    })
                                }
                            }
                  
              })


            })

                        
              $('#statusEvent').click(function() {
              var clicks = $(this).data('clicks');
             var sem = document.getElementById('sem').value;
              var is_not = document.getElementById('list-i');
              var course = document.getElementById('course').value;

            

            
           

              if(is_not != null)
              {

                setTimeout(() => {
           // var sub_code = document.querySelector('select#list-i.dynamic-li option').name;
                var subCode = document.getElementById('list-i').value;
                    var load = {'sem':sem,
                                'course':course,
                                'sub_code':subCode};

                                console.log(load);


                    $.ajax({
                            type:'GET',
                            url: '../url/before_assign.php?action=getStatus',
                            data: load,
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",
                            success:function(data)
                            {  

                        // var mydata = JSON.stringify(data);
                      

                    
                        if(data[0].sub_code != undefined)
                        {
                            
                            document.getElementById('takenby').innerHTML='Taken ID :' +data[0].faculty_id;
                            document.getElementById('sub_msg').innerHTML='Subject Code :'+data[0].sub_code;
                            document.getElementById('last_taken_date').innerHTML='Last_Taken_Date :'+ data[0].last_taken_date;
                            document.getElementById('present_data').innerHTML ='Present Row :'+ data.no_of_row;

                            if(data.no_of_row >=1)
                            {
                                
                                $('#update-hidden').removeAttr('hidden');
                                $('#clear-db').removeAttr('hidden');

                 $('#clear-db').click(function(){

                        var query = {'sem':sem,
                           'course':course,
                          'sub_code':sub_code};

              $.ajax({
                            type:'GET',
                            url: '../url/clear_db_req.php?action=clear_db_req',
                            data: query,
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",
                            success:function(data)
                            {  
                                console.log(data);
                                if(data.remove_id == 'r93')
                                {
                                  
                                    document.getElementById('error_ms').innerHTML= data.remove_success;
                                    
                                    setTimeout(() => {
                                        location.reload();
                                        
                                    }, 5000);

                              
                                    
                                }
                           
                            }
                        })

                                })
                            }
                        
                        }
                         else if (data[0].status_code != undefined)
                         {
                             

                            // error message php generator
                            document.getElementById('errormsg').innerHTML=data[0].errormsg;
                         
                            

                         }
            
                            }
                    
                        })
                    
                }, 3000);
              }
              else
              {
               
                 document.getElementById('error_ms').innerHTML = ' Input required for Status ';
                document.getElementById('error_ms').style="color:red; font-size:20px; font-family: 'Courier New', Courier, monospace; " ;
              }

                            
                            if (clicks) {

                            
                                // odd clicks
                            } 
                                        
                            else {
                                // even clicks
                                // console.log('even');
                            }

                            $(this).data("clicks", !clicks);
                            });

                
                  $("#statusEvent").on('click', function(e){

                                  e.preventDefault();
                                setTimeout(() => {
                      $('#taken').removeAttr('hidden');
                                    
                                },3000);      
                            });

                                 
                            
                            
                            


           

                                             
                        function subV()
                        {

                            var sem = document.getElementById('sem').value;
                            var course = document.getElementById('course').value;
                            /*  creating array key format for sea*/  
                             var key_arr = Array();
                             var key = course;
                             var obj = {};
                             obj[key] = sem;
                             key_arr.push(obj);


                          
                             var subjects = [

                            {"MCA" : "3", "code":"MCA301T",    "name":"File Structure"},
                            {"MCA" : "3", "code":"MCA302T",    "name":"Obj-oriented Analysis and Design"},
                            {"MCA" : "3", "code":"MCA303T",    "name":"Theory Of Computation"},
                            {"MCA" : "3", "code":"MCA304T",    "name":"Statistical Analysis"},
                            {"MCA" : "3", "code":"MCA305P",    "name":"File structure Lab"},
                            {"MCA" : "3", "code":"MCA306P",    "name":"Design using UML Lab"},
                            {"MCA" : "3", "code":"MCA307T",    "name":"Soft_core -QTRA"},

                            {"MCA" : "5", "code":"MCA501T",     "name":"Advanced Web Programming"},
                            {"MCA" : "5", "code":"MCA502T",     "name":"Ad-DataBase management System"},
                            {"MCA" : "5", "code":"MCA503T",     "name":"Artifical intelligence"},

                            {"MCA" :"5", "code":"MCA504T" ,     "name":"Open Elective"},
                            {"MCA" :"5", "code":"MCA505P",      "name":"Advance Webprogramming"},
                            {"MCA" :"5", "code":"MCA506P",      "name":"Mini Project"}

                            ];


                        function where(collection, constraint){
                        // filter creates an array of items whose callback returns true for them
                        return collection.filter(function(collectionItem){
                        // every returns true when every item's callback returns true
                        return Object.keys(constraint).every(function(key){
                        return collectionItem.hasOwnProperty(key) && constraint[key] === collectionItem[key];
                        });
                        });
                        }
                        var i;
                      
                        
                        for(i=0; i<=subjects.length; i++)
                        {
                        var a = where(subjects,key_arr[0]);
                       

                    
                        }
                       

                        var mainlist = document.body;
                       
                        var listelement = document.createElement('select');

                            listelement.id = "list-i";
                            listelement.name="sub_code";
                            listelement.className="dynamic-li";
                            mainlist.appendChild(listelement);


                        // loop in object and logical element for html
                        for (var key in a) {
                     if (a.hasOwnProperty(key)) {

                                    var option = document.createElement('option');
                                    option.value = a[key]['code'];
                                    option.name= a[key]['code'];
                                    option.text = a[key]['name'];
                                    

                                    listelement.appendChild(option);

                                  

                               
                                    document.getElementById('list-item').appendChild(listelement);
                                    

                                
                                
                                    
                          
                                                     }
                                              }


                            
      
                       
                        json_list = JSON.stringify(a);
                      
                        // document.write(JSON.stringify( json_list));

                    
                        }

                        function onoff()
                        {

                            var list= document.getElementById('list-i');

                        
                            
                            if(list != null)
                            {
                                console.log('not equal to blank');

                                location.reload();
                            }
                           
                       

                            
                        }

                        
                        $('#dis').on('click', function() {  
                            $(this).attr('disabled','disabled');
                        });
                        
              

                            </script>