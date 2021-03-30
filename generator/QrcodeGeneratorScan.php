
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/bootstrap.css">
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<!-- jQuery -->
<title>Success</title>
<link rel="stylesheet" href="../css/style.css">
<link href="../css/Site.css" rel="stylesheet">    
<script src="script/ajax_generate_code.js"></script>
</head>

<Style>
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
    </style>
<body onload ="RefeshWhenLoad()">

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
                   
                    <li class="hover" style="margin-top: 10px; font-size: larger; color: darkgrey;"><span></span> Digital Attendance</li>

                </ul>
           
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class=""></span>
                     <?php
                        if(isset($_SESSION['facultyName'])){echo $_SESSION['facultyName'];}
                        ?></a></li>
                
                </ul>
            </div>
       
    </nav>
 </div>
	

	<div class="container">		
		<div class="row">
            <h2 style="color:purple">Scan </h2>


			<div class="col-sm-4"  style="height:200px">
		        <form class="form-horizontal" method="post" id="codeForm" onsubmit="return false">
		            <div class="form-group">
		            	<label class="control-label">Code Content : </label>
		            	<input class="form-control col-xs-1" id="content" type="text" required="required">
		            </div>
		            <div class="form-group">
		            	<label class="control-label">Code Level (ECC) : </label>
		            	<select class="form-control col-xs-10" id="ecc">
		            		<option value="H">H - best</option>
		            		<option value="M">M</option>
		            		<option value="Q">Q</option>
		            		<option value="L">L - smallest</option>       		            
		            	</select>
		            </div>
		            <div class="form-group">
		            	<label class="control-label">Size : </label>
		            	<input type="number" min="1" max="10" step="1" class="form-control col-xs-10" id="size" value="5">
		            </div>
		            <div class="form-group">
		            	<label class="control-label"></label>
		            	<input type="submit" name="submit" id="submit" class="btn btn-success" value="Generate QR Code">
		            </div>
		        </form>
	       </div>

                <div class="col-sm-6">
	    		    <div class="showQRCode">
                 </div>
	    	   </div>
            
          
      </div>
            <div class="row">
            <div class="col-sm-8" style="float:right">
                    <h4>scanned user</h4>
                    
                    <table id="people"class="table table-border ">
                    <thead>
                    <th>Regno</th>
                    <th>status</th>
                        <th>Action</th>
                </thead>
        <tbody>

        </tbody>
        </table>
                    
                    </div>
            </div>     
                    
 </div>
  
	
    
    </body>
</html>

  
<script>

    
    
       var collection = '<?php echo $_GET['collect']?>'; 
    function RefeshWhenLoad() {
  setInterval(function(){ 
      
          $.ajax({
       
        url: '../url/get_qrcode_db.php',
        method: 'POST',
        dataType:'json',
        data: {collection:collection},
        success: function(msg) {
      
            
            var code = msg;
            
           console.log(msg);
            document.getElementById("content").value =code; /*passing response data to generator*/
                 }
    });
      $("#submit").submit(); 
     
        $.ajax({
        url:'../url/get_table.php',
        data:{collection:collection},
        method:'POST',
       dataType: "json",
    success: function(JSONObject) {
      var peopleHTML = "";
      
      // Loop through Object and create peopleHTML
      for (var key in JSONObject) {


        if (JSONObject.hasOwnProperty(key)) {
          
     
          
            const remove= `<button class='removeOne btn-sm btn-danger' value='${JSONObject[key]['std_id']}'>Remove</button>`;
            peopleHTML += "<tr>";
            peopleHTML += "<td class='stdID'>" + JSONObject[key]["std_id"] + "</td>";
            peopleHTML += "<td>" + JSONObject[key]["status"] + "</td>";
            peopleHTML += "<td>" + remove  + "</td>";
            peopleHTML += "</tr>";
        }
      }
         $("#people tbody").html(peopleHTML);

        $(".removeOne").on('click',function(){
             /*
              find the id Value  from the same row 
            var dynbutton = $(this),
                        tr = dynbutton.closest('tr');
             var regno  = tr.find('td.stdID').text();

             */
                var regno = $(this).val();
             console.log(regno + 'this value .');

          if(regno != ''){

            var someData ={'regno':regno,
                      'collection':collection};
            $.ajax({
                    method:'GET',
                      url:'../url/req_removeOne.php?action=Req_removeOne',
              contentType:'application/json',    
                  dataType:'json',
                      data:someData,
                  success:function(removeOnereq){

                  console.log(removeOnereq);

                  },
                    error:function(error){
                 

                  }
                });
          }
        });
          
    }
    
    });                  
      
                        }, 3000);
}
    
 
    

</script>