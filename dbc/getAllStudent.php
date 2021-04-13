                        <?php 
                        require_once('students.php');


                        ?>
<!DOCTYPE html>
<html>
    <head>
                                        <title>GetAllStudent's</title>
                                        <meta charset="utf-8" />
                                        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
                <link href="../css/bootstrap.css" rel="stylesheet" />
                <link href="../css/Site.css" rel="stylesheet" />
            
                    <style>                 
                            #line   {border: 1px solid rebeccapurple;height:auto;border-bottom-style:none;border-right-style: none;
                                     border-top-style: none;padding-left:15px;padding-bottom:15px;}
                        .option-li  {width:50%;}
                           #btn-id  {border:1px solid yellow;}
                            #Clear  {float:left;color: red;}
                         .self-div  {margin-left:260px; margin-right:260px;background-color:white;font-family:monospace;}
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
                                        <li class="hover"><a href="../insider/setAttendance.php"><span class="glyphicon glyphicon-home"></span> Back</a></li>
                                           </ul>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
            
                <hr>
                            <div class="row">
                                <div id="error_messages">
                                    <h5 id="error_message" style="color:red; padding-left:8px;"></h5>
                                </div>
                            </div>

                <div class="row">
                    <form id="serialized">
                                    <div class="col-sm-2">
                                        <label>Course </label>
                                        <select style=" ;text-align:center" placeholder="Course" name="course" id="course" class="form-control">
                                            <option>MCA</option>
                                     
                                        </select>   
                                    </div>

                                        <div class="col-sm-2">
                                            <label>Semester's </label>
                                            <select  name="sem" id="sem" class="form-control">
                                                <option value="3">Three</option>
                                                <option value="5">Five</option>
                                             </select>
                                        </div>
                                    <!-- I don't Know Why Iam using Span Here  -->
                                        <div class="col-sm-2">
                                             <label>Batch'no </label>
                                            <select  name="batch_no" id="batch_no" class="form-c">
                                                <option value="18">Eighteen</option>
                                                <option value="19">nineteen</option>
                                                <option value="20">Twenty</option>
                                                <option value="21">TwentyOne</option>
                                            </select>
                                         </div>

                            <div class="col-sm-2">
                                    <label>Starting Date  : </label>
                                    <input type="Date" name="start_date" id="start_date" class="form-control">
                            </div>  

                                <div class="col-sm-2">
                                    <label>Ending Date :</label>
                                    <input type="Date" name="end_date" id="end_date" class="form-control" >
                                </div>     
                                
                    </form> 
                                    <!--  Query_btn -->
                                <div class="col-sm-2">
                                        <input type="submit" id="btn_getAllStudent" name="btn_getAllStudent" value="getAllStudent" class="btn btn-primary pull-right">
                                </div>
                 </div>

                        <!-- table Data -->
                        <div class="second-row">
                            <div class="row">
                                        <hr>
                                <div class="col-sm-12 offset-2 " style="float:left ;  ;letter-spacing:0.78%;">
                                    <table class="table table_border strive" id="mytable">
                                        <th>Student's Details </th>
                                       
                                      
                                     
                                       
                                    </table>
                                </div>
                            </div>
                        </div>

                
        </div>
            <!--End of container-->
    </body>
</html>

                                                                <script src="../js/jquery-3.2.1.min.js"></script>
                                                                <script src="../js/bootstrap.js"></script>
                                                            
<script>
    $('#btn_getAllStudent').on('click',function(e){

                e.preventDefault();

            /*      var sub_code = document.getElementById('sub_code').value; */ 
                var sem = document.getElementById('sem').value;
            const course = document.getElementById('course').value;
            const start_date = formatDate(document.getElementById('start_date').value);
            const end_date =  formatDate(document.getElementById('end_date').value);
            const batch_no = document.getElementById('batch_no').value;
        

            const someArray ={' sem':sem,
                            'course':course,
                        'start_date':start_date,
                          'end_date':end_date,
                          'batch_no':batch_no };

                        
            var some = validate_input(someArray);
             var item = [];
            console.log(someArray);
          
            if(some.length<=0){
               
                    console.log(this.click);
                    
                        $.ajax({type:'GET',
                                url: 'getAllStudent_res.php?action=btn_getAllStudent',
                                data: {'sem':sem,
                                    'course':course,
                            'start_date':start_date,
                                'end_date':end_date,
                                    'batch_no':batch_no },
                                contentType: "application/json; charset=utf-8",
                                    dataType: "json",
                                    success:function(data){ 


                                    
                                        var jdata = JSON.stringify(data);
                             

                                  for(var i=0; i< data.length; i++){
                                    $('#mytable').html(jdata);
                                    $.each(data, function(i ,v){
                                      if(v.regno){ /*think */ }
                                       
                                    })
                                    

                                  }
                                     
                                  
                            }
                        
                        }) 
            }
            else{
              
                document.getElementById('error_message').innerHTML ='';  
                 var i;
                 for( i=0; i<some.length; i++){
                     document.getElementById('error_message').innerHTML += some[i] +',  ';}

                        setTimeout(() => {
                                    document.getElementById('error_message').innerHTML = '' ;
                                    
                                        }, 2000);
                 }    
        });

    
  

        $('#subject-list').on('click',function(){                      
                           
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
                        for(i=0; i<=subjects.length; i++){
                        
                            var a = where(subjects,key_arr[0]); }
                   
                           var mainlist = document.body;
                           var listelement = document.createElement('select');
                          
                           listelement.id = "sub_code";
                           listelement.name="sub_code";
                           listelement.className="sub-code";
                           mainlist.appendChild(listelement);
                     // loop in object and logical element for html

            for (var key in a){

                    if(a.hasOwnProperty(key)){

                                var option = document.createElement('option');
                                option.value = a[key]['code'];
                                option.name= a[key]['code'];
                                option.text = a[key]['name'];
                         
                            listelement.appendChild(option);
                            $('#sub_code').remove();
                            document.getElementById('list-item').appendChild(listelement); }
            } 
                $('#Clear').removeAttr('hidden');
                $('#subject-list').attr('display','none');
        });

          $('#Clear').on('mouseenter',function(){  $('#list-item').parent().remove();
            location.reload(); });

    
         
            /*
                    Function section 
            */ 

                function validate_input(someArray){
                    var holdArray = [];
                        for(const value in someArray){ if(someArray[value]=='' || someArray[value]=='NaN-NaN-NaN'){ holdArray.push(value); }
                        }return holdArray;
                }


                function formatDate(date) {
                    var d = new Date(date),
                        month = '' + (d.getMonth() + 1),
                        day = '' + d.getDate(),
                        year = d.getFullYear();

                    if (month.length < 2) month = '0' + month;
                    if (day.length < 2) day = '0' + day;

                    return [year, month, day].join('-');
                 }
</script>
