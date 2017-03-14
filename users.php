<?php
session_start();
if(!isset($_SESSION['user']))
{
  header('Location:login.php');
}
include_once('top.php');
?>
<script type="text/javascript">

$('#users').addClass("active"); 

</script>
</script>
<link href="apartment.css" rel="stylesheet"/>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="row top-header container-fluid">
<div class="col-sm-6">
<button id="new" class="btn btn-success glyphicon glyphicon-plus-sign" disabled="true"> New</button>
<button id="edit" class="btn btn-success glyphicon glyphicon-edit" disabled="true"> Edit</button>
<button id="save" class="btn btn-info glyphicon glyphicon-save"> Save</button>
<button id="delete" class="btn btn-danger glyphicon glyphicon-trash" disabled="true"> Delete</button>
<div id="requiredError" data-role="popup" ></div>     
</div>
<div id="dialog-confirm" title="Deleting Record" style="display: none;">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Are you sure you want to delete this record ?</p>
</div>
<div class="col-sm-6">
   <row>
   

     <div class="col-md-4"></div>
     <div class="col-md-4"><button id="resetbtn" class="btn btn-info" disabled="true">Reset Password</button></div>
     <div class="col-md-4"></div>
   </row>
</div>
</div>
<hr />
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-3">
    

    <div class="form-group">
       <label>Username: </label>
        <input id="usernm" class="form-control" type="text" placeholder="username" value=" " >
    </div>
    <div class="form-group">
       <label>Password: </label>
        <input id="password1" class="form-control" type="password" value="">
    </div>
    <div id="confirmpassword" class="form-group">
       <label id="confirmpassword">Confirm Password: </label>
        <input id="confirmpassrd" class="form-control" type="password" value="" disabled="true">
    </div>
    <div id='passwordMatchError'></div>
    


</div>
<div class="col-md-5">
  
</div>
</div>

<script type="text/javascript" src="pagesjs/shared.js"></script>
<script type="text/javascript" src="myjs/notify.min.js"></script>
<script type="text/javascript" src="pagesjs/users.js"></script>
<?php
include_once('bottom.php');
?>