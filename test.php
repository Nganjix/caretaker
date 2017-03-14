<?php 
$stri = '2016-09-27';
function convertDate($striker){
$datearray = explode('-', $striker);
//$datearray[1],$datearray[2], $datearray[0]
 return strtotime('2016-10-29');
}
$lol = array( "lol"=>"lol");
print_r($lol);


//echo convertDate($stri).' '.strlen(convertDate($stri)).' time: '.time().' '.strlen(time()).'<br/> ';
//print_r(getdate(1477220196));
$rs = 'lol';
$d = 'haha ';
$d =  $d.$rs;
echo $d;

echo 'loooooooooooooooooooooool';
echo('<br/>');
$t = password_hash("james", PASSWORD_BCRYPT);
echo $t;
echo('<br/>');
echo $t == password_verify("rasmuslerdorf", $t);
?>

<p></p>
<!DOCTYPE html>
<html>
<head>
<title></title>
<script src="js/vendor/jquery.min.js"></script>
<script type="text/javascript" src="myjs/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="myjs/jquery-ui.css">
</head>
<body>
<br />
<input id="daterz" type="text" value="_"/>
<input type="checkbox" id="tenantStatus" class="form-control"/><br />
<input id="dater" type="text" value="user"/>
<select class="form-control" id="gender">
<option  value="1" selected>Male</option>
<option value="0">Female</option>
</select>
<button id="test1">click us</button>
<button id="test">click</button>

<script type="text/javascript">
$(document).ready(
function()
{$('#dater').datepicker();
   //$('#test1').attr('disabled', 'true');
    $("#test").click(function(event){
        //console.log($('#tenantStatus').is(':checked'));
    //vg = $(this).find("#gender").each(function () { $(this).find('option:selected').text();});
        console.log($('#daterz').val());
        //$('#tenantStatus').prop('checked', false);
        //console.log("start");
        //console.log($("#dater").val());
        
        //var dt = new Date('10/03/2016');
        //m = dt.valueOf();
        //console.log(dt.valueOf());
        
        //var dtm = new Date(m);
        //console.log(dtm.toLocaleString());
        //console.log("end")
    });
    
});

</script>

</body>
</html>

