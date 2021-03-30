
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
<style>
.navr-bar{
  margin-bottom:0px !important;
}
.Qrcode-box{
  width: 50% ;
  padding:6px;
  height:170px;
  
}


  .tableFixHead {
        overflow-y: auto;
        height: 200px;
      }
      .tableFixHead thead th {
        position: sticky;
        top: 0;
      }
      table {
        border-collapse: collapse;
        width: 100%;
      }


</style>
<body onload ="RefeshWhenLoad()">
<div role="navigation" class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#" class="navbar-brand"></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><span><span style="color:Green; font-family:mono space; padding-left:18px !important;  font-size:19px">Subject Code : </span><span style="font-size:19px;color:purple; font-family:mono space; margin-top:25px; " ><?php if(isset($_GET['sub_code'])){echo $_GET['sub_code'];}?></span></span><a href="#"></a></li>
           
          </ul>
         
        </div> 
      </div>
    </div>
	

	    <div class="container">		
		      <div class="row">
            <!-- <h5 style="color:purple">Scan </h5> -->

             <div class="col-sm-1" hidden >
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
                            <div class="col-sm-3">
                             <div class="Qrcode-box">
                             <div class="showQRCode">
                            </div>
                           </div>
                            </div>
                            <div class="col-sm-8">
                            <div class="tableFixHead">
                       
      <table id="people">
        <thead>
          <tr>
            <th>Regno </th>
            <th>Percentage /Status</th>
            <th>Action</th>
          </tr>
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