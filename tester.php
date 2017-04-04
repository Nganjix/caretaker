<?php
require_once('aside/sessionsmanager.php');
$str = '90';
 $n = str_repeat('0', 8 - strlen($str));
 echo $str + 6;
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
//echo(sessiom_id());

?>
<!DOCTYPE html>
<html >
<head>
<title>
</title>
</head>
<body>
<script src="js/vendor/jquery.min.js"></script>
<script src="myjs/purl.js"></script>
<script>
    var paramData = purl();
    var getData = paramData.attr('query');
    
    if(getData != '' && getData != undefined)
    {
        var matchpat = new RegExp('id=');
        if(matchpat.test(getData))
        {   var getId = getData.split('&');
            var paramValue = getId[0].split('=');
            if(paramValue[1] != '')
            {
                console.log('sendBackStuff.php?page=apartments&'+paramValue[0]+'='+paramValue[1].trim());
                $.ajax({
                    url: 'sendBackStuff.php?page=apartments&'+paramValue[0]+'='+paramValue[1].trim(),
                     success: function(data){ 
                               console.log('pap'+ data);
             
            } 
            
            });
            
            }
            
            /*
            */
        }
        
    }
</script>






</body>
</html>

<!--
pisa reg details<div id="txt"></div>
<input type="file" name="filen" id="filename">
<button id="submit" >submit</button>
-->
<!--
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
-->
<br />
<font size='1'><table class='xdebug-error xe-catchable-fatal-error' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
<tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Catchable fatal error: Object of class CheckImgType could not be converted to string in C:\wamp\www\docs\examples\dashboard\validateimages.php on line <i>49</i></th></tr>
<tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
<tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>
<tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.0190</td><td bgcolor='#eeeeec' align='right'>260336</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='C:\wamp\www\docs\examples\dashboard\validateimages.php' bgcolor='#eeeeec'>...\validateimages.php<b>:</b>0</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>2</td><td bgcolor='#eeeeec' align='center'>0.0200</td><td bgcolor='#eeeeec' align='right'>265328</td><td bgcolor='#eeeeec'>Run->verifyImg(  )</td><td title='C:\wamp\www\docs\examples\dashboard\validateimages.php' bgcolor='#eeeeec'>...\validateimages.php<b>:</b>76</td></tr>
</table></font>