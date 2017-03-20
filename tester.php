<?php
//include_once('includes/dbconnection.php');                                                                                                                                                                                  
//$conn = Dbconnector::returnconnection();
//$row = $conn->query('select * from company');
//echo $row->fetch(PDO::FETCH_NUM)[0] != '';
//foreach($row->fetch(PDO::FETCH_ASSOC) as $key => $value)
//{
//    echo(json_encode($value['session']));
//    echo('</br>');
//}




?>
<script src="js/vendor/jquery.min.js"></script>
<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>
<!--
pisa reg details<div id="txt"></div>
<input type="file" name="filen" id="filename">
<button id="submit" >submit</button>
-->
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
<font size='1'><table class='xdebug-error xe-warning' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
<tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Warning: move_uploaded_file(./images/company/1490001481_pisa_reg_details.PNG): failed to open stream: No such file or directory in C:\wamp\www\docs\examples\dashboard\includes\processimage.php on line <i>17</i></th></tr>
<tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
<tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>
<tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.0010</td><td bgcolor='#eeeeec' align='right'>278664</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='C:\wamp\www\docs\examples\dashboard\aside\companyops.php' bgcolor='#eeeeec'>...\companyops.php<b>:</b>0</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>2</td><td bgcolor='#eeeeec' align='center'>0.0050</td><td bgcolor='#eeeeec' align='right'>292648</td><td bgcolor='#eeeeec'>Company->__construct(  )</td><td title='C:\wamp\www\docs\examples\dashboard\aside\companyops.php' bgcolor='#eeeeec'>...\companyops.php<b>:</b>167</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>3</td><td bgcolor='#eeeeec' align='center'>0.0250</td><td bgcolor='#eeeeec' align='right'>304048</td><td bgcolor='#eeeeec'>Company->updateCompany(  )</td><td title='C:\wamp\www\docs\examples\dashboard\aside\companyops.php' bgcolor='#eeeeec'>...\companyops.php<b>:</b>48</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>4</td><td bgcolor='#eeeeec' align='center'>0.1140</td><td bgcolor='#eeeeec' align='right'>305904</td><td bgcolor='#eeeeec'>ProcessImage->moveImg(  )</td><td title='C:\wamp\www\docs\examples\dashboard\aside\companyops.php' bgcolor='#eeeeec'>...\companyops.php<b>:</b>95</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>5</td><td bgcolor='#eeeeec' align='center'>0.1140</td><td bgcolor='#eeeeec' align='right'>306072</td><td bgcolor='#eeeeec'><a href='http://www.php.net/function.move-uploaded-file' target='_new'>move_uploaded_file</a>
(  )</td><td title='C:\wamp\www\docs\examples\dashboard\includes\processimage.php' bgcolor='#eeeeec'>...\processimage.php<b>:</b>17</td></tr>
</table></font>
<br />
<font size='1'><table class='xdebug-error xe-warning' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
<tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Warning: move_uploaded_file(): Unable to move 'C:\wamp\tmp\php7F17.tmp' to './images/company/1490001481_pisa_reg_details.PNG' in C:\wamp\www\docs\examples\dashboard\includes\processimage.php on line <i>17</i></th></tr>
<tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
<tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>
<tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.0010</td><td bgcolor='#eeeeec' align='right'>278664</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='C:\wamp\www\docs\examples\dashboard\aside\companyops.php' bgcolor='#eeeeec'>...\companyops.php<b>:</b>0</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>2</td><td bgcolor='#eeeeec' align='center'>0.0050</td><td bgcolor='#eeeeec' align='right'>292648</td><td bgcolor='#eeeeec'>Company->__construct(  )</td><td title='C:\wamp\www\docs\examples\dashboard\aside\companyops.php' bgcolor='#eeeeec'>...\companyops.php<b>:</b>167</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>3</td><td bgcolor='#eeeeec' align='center'>0.0250</td><td bgcolor='#eeeeec' align='right'>304048</td><td bgcolor='#eeeeec'>Company->updateCompany(  )</td><td title='C:\wamp\www\docs\examples\dashboard\aside\companyops.php' bgcolor='#eeeeec'>...\companyops.php<b>:</b>48</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>4</td><td bgcolor='#eeeeec' align='center'>0.1140</td><td bgcolor='#eeeeec' align='right'>305904</td><td bgcolor='#eeeeec'>ProcessImage->moveImg(  )</td><td title='C:\wamp\www\docs\examples\dashboard\aside\companyops.php' bgcolor='#eeeeec'>...\companyops.php<b>:</b>95</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>5</td><td bgcolor='#eeeeec' align='center'>0.1140</td><td bgcolor='#eeeeec' align='right'>306072</td><td bgcolor='#eeeeec'><a href='http://www.php.net/function.move-uploaded-file' target='_new'>move_uploaded_file</a>
(  )</td><td title='C:\wamp\www\docs\examples\dashboard\includes\processimage.php' bgcolor='#eeeeec'>...\processimage.php<b>:</b>17</td></tr>
</table></font>

