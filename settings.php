<?php
/*session_start();
if(!isset($_SESSION['user']))
{
  header('Location:login.php');
}*/
include_once('top.php');
?>
<script type="text/javascript">

$('#headtoggle').addClass("active"); 

</script>
<!-- content area-->
<!-- header -->
<link href="myjs/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
<link href="myjs/remodal-default-theme.css" rel="stylesheet"/>
<link href="myjs/remodal.css" rel="stylesheet"/>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="row top-header container-fluid">
<div class="col-sm-8">
<button class="btn btn-info glyphicon glyphicon-floppy-disk"> Save </button>
<div id="requiredError" data-role="popup" ></div>     
</div>
<div class="col-sm-4">

</div>
</div>
<hr />
<!-- content area-->
<!-- header -->
<!-- endheader -->
<div class="row">
    <div class="col-md-6">
        <h3>Payments Settings</h3>
        <hr />
    <div class="form-group">
        <div class="row">
            <div class="col-md-4"><input type="checkbox" id="useref" class="form-control"/></div>
            <div class="col-md-8"><b>Use Auto-Numbering for Reference ID </b> </div>
        </div>
        
    </div>
    <hr />
    <button class="btn btn-info"> Generate New Periods</button>
    <hr />
    </div>
    <div class="col-md-6">

    </div>

</div>




<!-- end of content area-->
<?php


include_once('bottom.php');
?>