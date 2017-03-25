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

$('#tenantTab').addClass("active"); 


</script>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="row top-header container-fluid">
<div class="col-sm-6">
<button id="new" class="btn btn-success glyphicon glyphicon-plus-sign"> New</button>
<button id="edit" class="btn btn-success glyphicon glyphicon-open" disabled="true"> Edit</button>
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
         <input type="text" id="searchTenant" class="form-control" placeholder="Enter first name to search tenant"/>
    </div>
<span class="input-group-btn">
        <button id= "search" class="btn btn-default" type="button" disabled="true">Search</button>
</span>
</div>
</div>
</div>
<hr />
<div class="row header-section">
<!-- name, id, idnumber, Active -->
<div class="col-sm-3 header-col1">
<label>First Name*: </label><input type="text" id="fname" placeholder="First Name" class="form-control"/>
</div>
<div class="col-sm-3 header-col2">
<label>Second Name*: </label><input type="text" id="sname" placeholder="Second Name" class="form-control"/>
</div>
<div class="col-sm-2 header-col3">
<label>ID No.*: </label><input type="number" id="idnum" placeholder="ID Number" class="form-control"/>
</div>
<div class="col-sm-2 header-col3">
<label>Gender*: </label>
<!-- <input type="select" name="gender" class="form-control"/> -->
<select class="form-control" id="gender">
<option  value="None" selected>None</option>
<option  value="1">Male</option>
<option value="0">Female</option>
</select>
</div>
<div class="col-sm-2 header-col4">
<label>Active :</label><input type="checkbox" id="tenantStatus" class="form-control"/>
</div>
</div>
<hr />
<div class="row details-section">
<div class="col-sm-4 tenant-column1">
<h4>Personal details</h4>
<hr />
<label>Email:</label><input type="email" id="ownerEmail" class="tenant-col1-items form-control"/>

<label>Boarding Date:</label><input id="boardingDate" class="tenant-col1-items form-control"/>
<label>Phone No. 1:</label><input type="number" id="pnumber1" class="tenant-col1-items form-control" data-toggle="tooltip" data-placement="top" title="Payment Number"/>
<label>Phone No. 2:</label><input type="number" id="pnumber2" class="tenant-col1-items form-control" data-toggle="tooltip" data-placement="top" title="Alternative Payment Number"/>
</div>
<div class="col-sm-4 column2">
<h4> Next of kin details </h4>
<hr />
<label>First Name</label><input type="text" id="kinfName" class="tenant-col1-items form-control"/>
<label>Second Name:</label><input type="text"  id="kinSName" class="tenant-col1-items form-control"/>
<label>ID No:</label><input type="number" id="kinIdNo" class="tenant-col1-items form-control"/>
<label>Phone No.:</label><input type="number" id="kinPhoneNo" class="tenant-col1-items form-control"/>
</div>
<div class="col-sm-4 column3">
<h4>Payment details</h4>
<hr />
<label>Grace Period</label>
<div class="form form-group">
 <input type="number"  class="form form-control" id="graceperiod"/>
</div>
<label>Deposit Amount:</label>
<div class="input-group">
<span class="input-group-addon">KSH</span>
<input type="text" id="tenantDepositAmt" class="tenant-col1-items form-control"/>
<span class="input-group-addon">.00</span>
</div>
<label>Current Amount:</label>
<div class="input-group">
<span class="input-group-addon">KSH</span>
<input type="text" id="tenantCurrentAmt" class="tenant-col1-items form-control" disabled="true"/>
<span class="input-group-addon">.00</span>
</div>


</div>
</div>
<div class="row container-fluid">
<nav aria-label="...">
<ul class="pager">
<li id="getPrevious" class="previous"><a href="#">Previous</a></li>
<li class="next" id="getNext"><a href="#">Next</a></li>
</ul>
</nav>
</div>
</div>

<script type="text/javascript" src="pagesjs/tenant.js"></script>
<script type="text/javascript" src="pagesjs/shared.js"></script>
<script type="text/javascript" src="myjs/notify.min.js"></script>

<?php
include_once('bottom.php');
?>