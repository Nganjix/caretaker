<?php
$stri = 'pisa reg details';
$newstr = str_replace(' ', '_', $stri);
echo($newstr);




?>
<script src="js/vendor/jquery.min.js"></script>
<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>
pisa reg details<div id="txt"></div>
<input type="file" name="filen" id="filename">
<button id="submit" >submit</button>
<script type="text/javascript">

	$(document).ready(function(){
       /* $('#filename').bind('change', function()
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
       
       */
	   $('#submit').click(function(event){
	       console.log('looooooooooool')
          
           console.log($('#filename')[0].files[0])
           
	   });
	});

</script>
