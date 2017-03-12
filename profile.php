<?php
session_start();
if(!isset($_SESSION['user']))
{
  header('Location:login.php');
}
include_once('top.php');
?>
<script type="text/javascript">

$('#ProfileTab').addClass("active"); 

</script>
<?php
include_once('bottom.php');
?>