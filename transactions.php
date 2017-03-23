<?php
/*
session_start();
if(!isset($_SESSION['user']))
{
  header('Location:login.php');
}*/
include_once('top.php');
?>
<script type="text/javascript">

$('#transTab').addClass("active"); 

</script>
<!-- content area-->
 --- assign apartment
 --- reconcile payments i.e assign mpesa payments without known user to a tenant
 -- reverse payment
 --- create a payment from the online system
 --- view all payments
 ---  

<!-- end of content area-->
<script type="text/javascript" src="pagesjs/shared.js"></script>
<script type="text/javascript" src="myjs/notify.min.js"></script>
<?php


include_once('bottom.php');
?>



