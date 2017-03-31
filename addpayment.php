<?php
/*session_start();
if(!isset($_SESSION['user']))
{
  header('Location:login.php');
}*/
include_once('top.php');
?>
<script type="text/javascript">

$('#blocksTab').addClass("active"); 

</script>
<!-- content area-->
<!-- header -->
<link href="myjs/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="row top-header container-fluid">
<div class="col-sm-8">
<button id="new" class="btn btn-success glyphicon glyphicon-plus-sign" disabled="true"> New</button>
<button id="cancel" class="btn btn-danger glyphicon glyphicon-trash" disabled="true"> Cancel Payment</button>
<button id="approve" class="btn btn-success glyphicon glyphicon-save"> Approve Payment </button>
<button id="refresh" class="btn btn-info glyphicon glyphicon-plus-sign"> Upload Document</button>
<div id="requiredError" data-role="popup" ></div>     
</div>
<div id="dialog-confirm" title="Deleting Record" style="display: none;">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Are you sure you want to delete this record ?</p>
</div>
<div class="col-sm-4">
<div class="input-group">
    <div class="ui-widget">
         <input type="text" id="searchblocks" class="form-control" placeholder="search with name.."/>
    </div>
<span class="input-group-btn">
        <button id= "search" class="btn btn-default" type="button" disabled="true">Search</button>
</span>
</div>
</div>
</div>
<hr />
<!-- end header -->
<div class="row">
   <div class="col-md-4">
      <div class="form form-group">
        <label>Reference ID</label>
        <input type="text" class="form form-control" id="refid"/>
      </div>
   </div>
   <div class="col-md-4">
        <div class="form form-group">
        <label>Payment Method</label>
        <select class="form form-control" id="statusselect">
           <option value="c">Cheque
           </option>
           <option value="k">Cash
           </option>
           <option value="m">Mpesa
           </option>
        </select>
        
      </div>
   </div>
   <div class="col-md-4">
        <div class="form form-group">
        <label>Status</label>
        <select id='statusselect' class="form form-control">
          <option value="0">On Hold</option>
          <option value="1">Approved</option>
          <option value="2">Cancelled</option>
        </select>
        
      </div>
   </div>
</div>
<hr />
<div class="row">
<div class="col-md-4">
   <div class="form-group">
      <label>Account </label>
      <div class="row">
        <div class="col-md-10">
          <select id="accselect" class="form form-control">
               <option value="none">None</option>
          </select>
        </div>
        <div class="col-md-2">
           <button id="accbtn" class="glyphicon glyphicon-edit"></button>
        </div>
      </div>
   </div>
   <div class="form-group">
      <label>Tenant </label>
      <div class="row">
        <div class="col-md-10">
          <select id="tenantselect" class="form form-control">
             <option value="none">None</option>
           </select>
         </div>
         <div class="col-md-2">     
            <button id="tenantbtn" class="glyphicon glyphicon-edit"></button>
         </div>
      </div>

   </div>
   <div class="form form-group">
        <label>Phone No</label>
        <input type="number" class="form form-control" id="phoneno"/>
   </div>
</div>
<div class="col-md-4">
   <div class="form form-group">
        <label>Amount:</label>
        <input type="number" class="form form-control" id="amount"/>
   </div>
   <div class="form form-group">
        <label>Transaction Date:</label>
        <div class="input-group date" id="dt" data-provide="datepicker" data-date-format="dd MM yyyy">
            <input type="text" class="form form-control" id="amount"/>
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
   </div>
</div>
<div class="col-md-4">
</div>



</div>






<!-- end of content area-->
<script type="text/javascript" src="pagesjs/payment.js"></script>
<script type="text/javascript" src="myjs/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="pagesjs/shared.js"></script>
<script type="text/javascript" src="myjs/notify.min.js"></script>
<?php


include_once('bottom.php');
?>