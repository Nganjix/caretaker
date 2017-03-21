<?php
require_once('aside/sessionsmanager.php');
/*
include_once('includes/dbconnection.php');                                                                                                                                                                                  
$conn = Dbconnector::returnconnection();
$row = $conn->query('select * from roles');
//echo $row->fetch(PDO::FETCH_NUM)[0] != '';
foreach($row->fetchAll(PDO::FETCH_ASSOC) as $key => $value)
{
    echo($value);
    echo('</br>');
}

echo('looooooooooooool');
*/

//new SessionManager(function(){ echo 'looooooooooool'; });

//$k = new RolesVerifier();
new SetAllowedRoles();
//echo($k->checkIfAllowedPage());
//echo('run force<br/>');
//print_r([5,6,7,4,3,8,9]);
var_dump($_SESSION);

?>

<!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<script src="js/vendor/jquery.min.js"></script>
	<script src="myjs/jquery.bootstrap-duallistbox.min.js"></script>
	<link rel="stylesheet" type="text/css" href="myjs/bootstrap-duallistbox.min.css">
	<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="sticky-footer.css" rel="stylesheet">
    <!--  <script src="js/vendor/jquery.min.js"></script> -->
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="bootstrap/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap/assets/js/ie-emulation-modes-warning.js"></script>

</head>
<body>
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
	<select id="selecttest" name = 'duallistbox_demo1[]' multiple="true">
	<option value="opt1">opt 1</option>
	<option value='opt2'>opt 2</option>
	<option value='opt3'>opt 3</option>
	<option value='opt4'>opt 4</option>
</select>
</div>
<div class="col-md-3">
	
</div>


</div>
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-3"></div>
<div class="col-md-3">
    <br/>
	<button id="test" class="btn btn-info">test</button>
</div>
<div class="col-md-3"></div>	
</div>
<script type="text/javascript">
    var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox(
    	{
    		nonSelectedListLabel: 'All screens',
            selectedListLabel: 'Selected screens',
    		moveOnSelect : false,
    		selectorMinimalHeight : 300
    	});
     $('#test').click(function(event){
     	console.log(demo1.val());
     });
</script>

</body>
</html>

<!--
pisa reg details<div id="txt"></div>
<input type="file" name="filen" id="filename">
<button id="submit" >submit</button>
-->

<script type="text/javascript">
	/*$(document).ready(function(){
        $('#filename').bind('change', function()
       {
        var formData = new FormData();
           formData.append('filename', $('#filename')[0].files[0]);
           formData.append('dope', 'hello');
	       $.ajax(
           {
            url : 'test.php',
            type : 'POST',
            processData : false,
            contentType : false,
            data : formData,
            success : function(data){ $('#txt').html(data); },
            error : function(error){ console.log('an error occurred'); }
           });
        
       });
       
       
	   $('#submit').click(function(event){
	       console.log('looooooooooool')
          
           console.log($('#filename')[0].files[0])
           
	   });
	});
*/
</script>

