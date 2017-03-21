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

$('#rolesTab').addClass("active"); 

</script>
<!-- content area -->
<!-- content header -->
<script src="myjs/jquery.bootstrap-duallistbox.min.js"></script>
<link rel="stylesheet" type="text/css" href="myjs/bootstrap-duallistbox.min.css">
<link rel="stylesheet" type="text/css" href="role.css">
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="row top-header container-fluid">
   <div class="col-sm-6">
       <div class="row">
        <div class="col-sm-8">
           <input type="text" name="userp" id="userp" class="form form-control" placeholder="search or type user to change permissions for" />
        </div>
        <div>
           <button id="save" class="btn btn-success glyphicon glyphicon-save"> Save </button>
        </div>
   </div>
<div id="requiredError" data-role="popup" ></div>     
</div>
<div class="col-sm-6">
     <div>Changing permissions for User >> </div>
     <div class="loader"></div>
</div>
</div>
<hr />

<div class="row">
       <div class="col-md-2"></div>
       <div class="col-md-8">
	        <select id="roleslistbox" name = 'roleslistbox' multiple="true" disabled="true">
           </select>
        </div>
        <div class="col-md-2">
	
         </div>

</div>


<!-- end of content area-->

<script type="text/javascript" src="pagesjs/shared.js"></script>
<script type="text/javascript" src="pagesjs/role.js"></script>
<script type="text/javascript" src="myjs/notify.min.js"></script>
<?php


include_once('bottom.php');
?>