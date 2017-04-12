<?php
/*session_start();
if(!isset($_SESSION['user']))
{
  header('Location:login.php');
}*/
include_once('top.php');
?>
<script type="text/javascript">

$('#addpaymentTab').addClass("active"); 

</script>
<!-- content area-->
<!-- header -->
<link href="myjs/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
<link href="myjs/remodal-default-theme.css" rel="stylesheet"/>
<link href="myjs/remodal.css" rel="stylesheet"/>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="row top-header container-fluid">
<div class="col-sm-8">
<button id="new" class="btn btn-success glyphicon glyphicon-plus-sign"> New </button>
<button id="save" class="btn btn-success glyphicon glyphicon-floppy-disk" > Save </button>
<button id="cancel" class="btn btn-danger glyphicon glyphicon-remove" disabled="true"> Cancel Payment </button>
<button id="approve" class="btn btn-success glyphicon glyphicon-save" disabled="true"> Approve Payment </button>

<div id="requiredError" data-role="popup" ></div>     
</div>
<div id="dialog-confirm" title="Deleting Record" style="display: none;">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Are you sure you want to delete this record ?</p>
</div>
<div class="col-sm-4">
<div class="input-group">
    <div class="ui-widget">
         <input type="text" id="searchpayment" class="form-control" placeholder="search by ref number.."/>
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
   <div class="col-md-3">
      <div class="form form-group">
        <label>Reference ID *</label>
        <input type="text" class="form form-control" id="refid" data-toggle="tooltip" title="Enter receipt or cheque no. else leave as default" />
      </div>
   </div>
   <div class="col-md-3">
        <div class="form form-group">
        <label>Payment Period</label>
        <select class="form form-control" id="paymentprds">
        </select>
        
      </div>
   </div>
   <div class="col-md-3">
      <div class="form-group">
      <label>Tenant *</label>
          <select id="tenantselect" class="form form-control">
             <option value="None" selected="true">None</option>
           </select>

   </div>
   </div>
   <div class="col-md-3">
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
   <div class="form form-group">
        <label>Payment Method *</label>
        <select class="form form-control" id="pmethodselect">
           <option value="None" selected="true">None
           </option>
           <option value="c">Cheque
           </option>
           <option value="k">Cash
           </option>
           <option value="m">Mpesa
           </option>
        </select>
        
      </div>
   <div class="form-group">
      <label>Account *</label>
      <div class="row">
        <div class="col-md-10">
          <select id="accselect" class="form form-control">
               <option value="None" selected="true">None</option>
          </select>
        </div>
        <div class="col-md-2">
           <button id="accbtn" class="glyphicon glyphicon-edit"></button>
        </div>
      </div>
   </div>
   
   <div class="form form-group">
        <label>Phone No *</label>
        <input type="number" class="form form-control" id="phoneno"/>
   </div>
</div>
<div class="col-md-4">
   <div class="form form-group">
        <label>Amount Tendered: *</label>
     <div class="input input-group">
        <input type="number" class="form form-control" id="amount"/>
        <span class="input input-group-addon">.00</span>
     </div>
   </div>
   <div class="form form-group">
        <label>Transaction Date: *</label>
        <div class="input-group date" id="dt" data-provide="datepicker" data-date-format="dd MM yyyy">
            <input type="text" class="form form-control" id="transdate"/>
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
   </div>
   <div class="form form-group">
   <label id="attachmessage">Attach scanned copy</label>
   <img id="displayimg" src="" hidden="true"/>
     <div class="row">
        <div class="col-md-8">
          <input type="file" id="filecopy" class="form form-control" data-toggle="tooltip" title="Only PNG, JPEG, JPG allowed"/>
        </div>
        <div class="col-md-4">
            <button class="btn btn-info glyphicon glyphicon-eye-open" id="viewbtn"> View </button>
        </div>
       
     </div>
     <div id="imgmessage" class="text-warning"></div>
   </div>
</div>
<div class="col-md-4">
   <div class="form form group">
     <label>Electricity Bill</label>
     <div class="input input-group">
         <input type="number" class="form form-control" id="elecbill" value="0.00"/>
         <span class="input input-group-addon">.00</span>
     </div>
   </div>
   <div class="form form group">
     <label>Water Bill</label>
     <div class="input input-group">
       <input type="number" class="form form-control" id="waterbill" value="0.00"/>
       <span class="input input-group-addon">.00</span>
     </div>
   </div>
   <div class="form form group">
     <label>Extra Costs</label>
     <div class="input input-group">
         <input type="number" class="form form-control" id="addcbill" value="0.00"/>
     <span class="input input-group-addon">.00</span>
     </div>
   </div>
</div>



</div>
<!-- code for confirmation modal window -->
<div data-remodal-id="modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h1 id="modalheader"></h1>
  <hr />
  <p id="modalinfo">
     
  </p>
  <hr />
  <button data-remodal-action="cancel" class="remodal-cancel"> Close </button>
  <button data-remodal-action="confirm" class="remodal-confirm" id="modalconfirm">  </button>
</div>





<!-- end of content area-->
<script type="text/javascript" src="pagesjs/payment.js"></script>
<script type="text/javascript" src="myjs/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="pagesjs/shared.js"></script>
<script type="text/javascript" src="myjs/notify.min.js"></script>
<script type="text/javascript" src="myjs/remodal.min.js"></script>
<?php


include_once('bottom.php');
?>