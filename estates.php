<?php
session_start();
if(!isset($_SESSION['user']))
{
  header('Location:login.php');
}
include_once('top.php');
?>
<script type="text/javascript">

$('#estatesTab').addClass("active"); 

</script>
<!-- content area-->
<link href="apartment.css" rel="stylesheet"/>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="row top-header container-fluid">
<div class="col-sm-6">
<button id="new" class="btn btn-success glyphicon glyphicon-plus-sign" disabled="true"> New</button>
<button id="edit" class="btn btn-success glyphicon glyphicon-edit" disabled="true"> Edit</button>
<button id="save" class="btn btn-success glyphicon glyphicon-save"> Save</button>
<button id="refresh" class="btn btn-info glyphicon glyphicon-refresh"> Refresh</button>
<button id="delete" class="btn btn-danger glyphicon glyphicon-trash" disabled="true"> Delete</button>
<div id="requiredError" data-role="popup" ></div>     
</div>
<div id="dialog-confirm" title="Deleting Record" style="display: none;">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Are you sure you want to delete this record ?</p>
</div>
<div class="col-sm-6">
<div class="input-group">
    <div class="ui-widget">
         <input type="text" id="searchEstate" class="form-control" placeholder="search with name.."/>
    </div>
<span class="input-group-btn">
        <button id= "search" class="btn btn-default" type="button" disabled="true">Search</button>
</span>
</div>
</div>
</div>
<hr />
<div class="row">
   <div class="col-md-3">
   </div>
   <div class="col-md-3">
      <div class="form form-group">
          <label>Estate Name: </label>
          <input type="text" id="estateName" class="form form-control"/>
     </div>
     <div class="form form-group">
          <label>Estate Description: </label>
          <textarea id="estateDesc" class="form form-control"></textarea>
     </div>
     <div class="form form-group">
          <label>Location: </label>
          <input type="text" id="location" class="form form-control"/>
     </div>
     
   </div>
   <div class="col-md-3">
   </div>
</div>


<!-- end of content area-->
<script type="text/javascript" src="pagesjs/estate.js"></script>
<script type="text/javascript" src="pagesjs/shared.js"></script>
<script type="text/javascript" src="myjs/notify.min.js"></script>
<?php


include_once('bottom.php');
?>