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
//new SetAllowedRoles();
//echo($k->checkIfAllowedPage());
//echo('run force<br/>');
//print_r([5,6,7,4,3,8,9]);
//var_dump($_SESSION);

?>
<br />
<font size='1'><table class='xdebug-error xe-warning' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
<tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Warning: Missing argument 3 for InsertData::__construct(), called in C:\wamp\www\caretaker\insertStuff.php on line 350 and defined in C:\wamp\www\caretaker\insertStuff.php on line <i>93</i></th></tr>
<tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
<tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>
<tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.6963</td><td bgcolor='#eeeeec' align='right'>208528</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='C:\wamp\www\caretaker\insertStuff.php' bgcolor='#eeeeec'>..\insertStuff.php<b>:</b>0</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>2</td><td bgcolor='#eeeeec' align='center'>0.8628</td><td bgcolor='#eeeeec' align='right'>224016</td><td bgcolor='#eeeeec'>Account->runAccounts(  )</td><td title='C:\wamp\www\caretaker\insertStuff.php' bgcolor='#eeeeec'>..\insertStuff.php<b>:</b>404</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>3</td><td bgcolor='#eeeeec' align='center'>0.8628</td><td bgcolor='#eeeeec' align='right'>224496</td><td bgcolor='#eeeeec'>InsertData->__construct(  )</td><td title='C:\wamp\www\caretaker\insertStuff.php' bgcolor='#eeeeec'>..\insertStuff.php<b>:</b>350</td></tr>
</table></font>
200<br />
<font size='1'><table class='xdebug-error xe-notice' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
<tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Notice: Undefined variable: profileimg in C:\wamp\www\caretaker\insertStuff.php on line <i>99</i></th></tr>
<tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
<tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>
<tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.6963</td><td bgcolor='#eeeeec' align='right'>208528</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='C:\wamp\www\caretaker\insertStuff.php' bgcolor='#eeeeec'>..\insertStuff.php<b>:</b>0</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>2</td><td bgcolor='#eeeeec' align='center'>0.8628</td><td bgcolor='#eeeeec' align='right'>224016</td><td bgcolor='#eeeeec'>Account->runAccounts(  )</td><td title='C:\wamp\www\caretaker\insertStuff.php' bgcolor='#eeeeec'>..\insertStuff.php<b>:</b>404</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>3</td><td bgcolor='#eeeeec' align='center'>0.8628</td><td bgcolor='#eeeeec' align='right'>224496</td><td bgcolor='#eeeeec'>InsertData->__construct(  )</td><td title='C:\wamp\www\caretaker\insertStuff.php' bgcolor='#eeeeec'>..\insertStuff.php<b>:</b>350</td></tr>
</table></font>

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

