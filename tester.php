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
<br />
<font size='1'><table class='xdebug-error xe-notice' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
<tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Notice: Array to string conversion in C:\wamp\www\docs\examples\dashboard\deleteStuff.php on line <i>41</i></th></tr>
<tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
<tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>
<tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.0000</td><td bgcolor='#eeeeec' align='right'>266720</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='C:\wamp\www\docs\examples\dashboard\deleteStuff.php' bgcolor='#eeeeec'>...\deleteStuff.php<b>:</b>0</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>2</td><td bgcolor='#eeeeec' align='center'>0.0000</td><td bgcolor='#eeeeec' align='right'>281440</td><td bgcolor='#eeeeec'>Users->returnUsersSqlStmt(  )</td><td title='C:\wamp\www\docs\examples\dashboard\deleteStuff.php' bgcolor='#eeeeec'>...\deleteStuff.php<b>:</b>94</td></tr>
</table></font>
