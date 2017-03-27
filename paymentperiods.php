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

$('#headtoggle').addClass("active"); 

</script>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<!-- content area-->
  <div class="row">
     <div class="col-md-4">
     </div>
     <div class="col-md-4">
        <h4>Payment Periods</h4>
     </div>
     <div class="col-md-4">
     </div>
  </div>
  <div class="row">
      <table id="periodstb" class="table table-striped table-bordered" cellspacing= "0" width="100%">
        <thead>
           <tr>
             <th>Period Name</th>
             <th>Period Desc</th>
             <th>Start Day</th>
             <th>Last Day</th>
           </tr>
        </thead>
        <tfoot>
        <tr>
              <th>Period Name</th>
             <th>Period Desc</th>
             <th>Start Day</th>
             <th>Last Day</th>
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
<script type="text/javascript" src="pagesjs/paymentperiods.js"></script>
<script type="text/javascript" src="pagesjs/shared.js"></script>
<script type="text/javascript" src="myjs/notify.min.js"></script>
<?php


include_once('bottom.php');
?>