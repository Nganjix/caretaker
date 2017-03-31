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

$('#transactionsTab').addClass("active"); 

</script>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="row top-header container-fluid">
<div class="col-sm-6">
<button id="newPayment" class="btn btn-info glyphicon glyphicon-plus-sign"> Add New Payment </button>
<button id="recalc" class="btn btn-info glyphicon glyphicon-refresh"> Recalculate Balances </button>
</div>
<div class="col-sm-6">

</div>
</div>
<hr />
 <div class="table-responsive">
 <table id="trans" class="table display table-striped table-bordered" cellspacing= "0" width="100%">
    <thead>
       <tr>
         <th>Ref. ID</th>
         <th>Trans. Type</th>
         <th>Account Name</th>
         <th>Tenant</th>
         <th>Phone No.</th>
         <th>Amount</th>
         <th>Status</th>
         <th>Payment Periods</th>
       </tr>
    </thead>
    <tfoot>
      <tr>
         <th>Ref. ID</th>
         <th>Trans. Type</th>
         <th>Account Name</th>
         <th>Tenant</th>
         <th>Phone No.</th>
         <th>Amount</th>
         <th>Status</th>
         <th>Payment Periods</th>
      </tr>
    </tfoot>
    <tbody>
    </tbody>
 </table>
 </div>


<!-- end of content area-->
<link rel="stylesheet" href="myjs/dataTables.bootstrap.min.css"/>
<script type="text/javascript" src="myjs/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="myjs/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="pagesjs/transactions.js"></script>
<script type="text/javascript" src="pagesjs/shared.js"></script>
<script type="text/javascript" src="myjs/notify.min.js"></script>
<?php


include_once('bottom.php');
?>



