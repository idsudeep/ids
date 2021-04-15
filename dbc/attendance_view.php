<?php 
require_once('students.php');


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

.option-li
{
    width:50%;
}
#btn-id
{
    border:1px solid yellow;
    color:black;
}
#dyn-btn{
    color:black !important;
    text-decoration:none !important;
}
#Clear
{
    float:left;
    color: red;
}
.self-div
{
margin-left:260px;
margin-right:260px;
background-color:white;
font-family:monospace;

height:200px;

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
                    <li class="hover"><a href="../insider/setAttendance.php"><span class="glyphicon glyphicon-home"></span> Back</a></li>
                   
                </ul>
           
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../insider/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                
                </ul>
            </div>
         </nav>
        
       <hr>
        </div>
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
                   <option>MBA</option>
         
                  
                </select>   
                </div>

                <div class="col-md-2">
               
               <label>Semester's </label>
              <select  name="sem" id="sem" class="form-control">
                 <option value="3">Three</option>
                  <option value="5">Five</option>
                 
                </select>
               
            </div>
            <span style="width:20%">
               <label>Batch'no </label>
                <select  name="batch_no" id="batch_no" >
              
                   <option value="18">Eighteen</option>
                   <option value="19">nineteen</option>
                   <option value="20">Twenty</option>
                   <option value="21">TwentyOne</option>
               
             
                </select>
             
               </span>

            <div class="col-sm-2">
            <label>Starting Date  : </label>
            <input type="Date" name="start_date" id="start_date" class="form-control" placeholder="starting Date">
        
            </div>     
        <div class="col-sm-2">
            <label>Ending Date :</label>
            <input type="Date" name="end_date" id="end_date" class="form-control" placeholder="starting Date">
        
        </div>      
          <div class="col-sm-2">
         
         <a href="#"> <h6 id="subject-list" style="color:purple; font-family:monospace">Click For subjects</h6></a>
        
          <h6 id="Clear" hidden>clear</h6>
          <div id="list-item">
    
        </div>
        </div> 
        </form> 
        <div class="col-sm-2">

       
        <input type="submit" id="btn_Query" name="btn_Query" value="Query" class="btn btn-primary pull-right">
        </div>

  
    </div>

    <div class="second-row">
  
    <div class="row">
<hr>
    
   <div class="self-div">

<table class="table table-bordered " id="tableData" hidden>
    <th>Student's ID </th>
    <th>Present Days/<span style="color:green"> Total classs :</span> <span id='t_no_cls' style='font-family:monospace; color:purple; font-size:17px;'></span></th>
    <th>Total Percentage</th>
    
    

</table>



</div>
</div>
</div>
<!-- end of second-row -->
        </div>
    </div>
    <!--Section End-->
    <!--Footer Start-->
 
    <!--Footer End-->

    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <!-- <script src="../js/angular.min.js" type="text/javascript"></script> -->
   
</body>
</html>

   <script>


     $('#dyn-btn').on('click',function(){

        console.log(this.value);


     });
        

    $('#btn_Query').on('click',function(e){

                e.preventDefault();

                var sub_code = document.getElementById('sub_code').value;
                var sem = document.getElementById('sem').value;
            const course = document.getElementById('course').value;
            const start_date = formatDate(document.getElementById('start_date').value);
            const end_date =  formatDate(document.getElementById('end_date').value);
            const batch_no = document.getElementById('batch_no').value;
        

            const someArray ={'sem':sem,
                            'course':course,
                        'sub_code':sub_code,
                        'start_date':start_date,
                        'end_date':end_date,
                            'batch_no':batch_no };

                        
            var some = validate_input(someArray);

            console.log(someArray);
          
            if(some.length<=0){
               
                   
                    
                        $.ajax({method:'GET',
                                url: 'req_res.php?action=btn_Query',
                                data: {'sem':sem,
                                    'course':course,
                                'sub_code':sub_code,
                                'start_date':start_date,
                                'end_date':end_date,
                                    'batch_no':batch_no },
                                contentType: "application/json; charset=utf-8",
                                    dataType: "json",
                                    success:function(data){ 
                                    var t_no_cls ='';
                             
                                  
                                    if(data != undefined){
                                     
                                            $('#tableData td').remove();
                                         $.each(data, function(index , val){
                                     if(val){  var  row= "";
                                        $('#tableData').removeAttr('hidden');         
row = $("<tr><td id='dyn-btn'><a href=viewAllSubByRegno.php?regno="+ val[0].regno +"> " + val[0].regno + "</td><td>" + val[0].total_days + "</td><td>"+val[0].per+"</td><a/></tr>");
                      $("#tableData").append(row);  
                                       t_no_cls = val[0].t_no_cls;
                                        }
                                                       
                                         })

                                         $('#t_no_cls').html(t_no_cls);
                                        
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
                        {"MCA" : "3", "code":"MCA307T",    "name":"Soft_core QTRA"},

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
