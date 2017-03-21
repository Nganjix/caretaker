<?php
/*session_start();
if(!isset($_SESSION['user']))
{
  header('Location:login.php');
}*/
include_once('top.php');
?>
<script type="text/javascript">

$('#apartmentTab').addClass("active"); 

</script>
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
         <input type="text" id="searchApartment" class="form-control" placeholder="Enter apartment name.."/>
    </div>
<span class="input-group-btn">
        <button id= "search" class="btn btn-default" type="button" disabled="true">Search</button>
</span>
</div>
</div>
</div>
<hr />
<div class="row">
      <div class="col-sm-2">
         <label>Apartment Name:</label>
      </div>
       <div class="col-sm-4">
         <input class="form-control" id="apartmentname" type="text"/>
      </div>
      <div class="col-sm-2">
         <label>Monthly Bill:</label>
      </div>
      <div class="col-sm-4">
         <div class="input-group">
             <span class="input-group-addon">Ksh</span>
             <input class="form-control" id="apartmentbill" type="number"/>
             <span class="input-group-addon">.00</span>
         </div>
      </div>
      
</div>
<div class="row">
      <div class="col-sm-2">
         <label>Apartment Desc:</label>
      </div>
       <div class="col-sm-4">
         <textarea class="form-control" id="apartmentdesc" ></textarea>
      </div>
      <div class="col-sm-2">
         <label>Water Bill:</label>
      </div>
      <div class="col-sm-4">
         <div class="input-group">
              <span class="input-group-addon">Ksh</span>
              <input class="form-control" id="apartmentwaterbill" type="number" disabled="true"/>
              <span class="input-group-addon">.00</span>
         </div>
      </div>
      
</div>
<div class="row">
      <div class="col-sm-2">
         <label>Mpesa Account:</label>
      </div>
       <div class="col-sm-4">
          <div class="row">
              <div class="col-sm-10">
                   <select class="form-control"  id="apartmentacc">
                   </select>
               </div>
               <div class="col-sm-2">
                  <button class="glyphicon glyphicon-edit" id="editacc"></button>
                </div>
           </div>
      </div>
      <div class="col-sm-2">
         <label>Electrical Bill:</label>
      </div>
      <div class="col-sm-4">
           <div class="input-group">
             <span class="input-group-addon">Ksh</span>
             <input class="form-control" id="apartmentelecbill" type="number" disabled="true"/>
             <span class="input-group-addon">.00</span>
           </div>
      </div>
      
</div>
<div class="row">
      <div class="col-sm-2">
         <label>Tenant Name:</label>
      </div>
       <div class="col-sm-4">
             <div class="row">
                 <div class="col-sm-10">
                      <select class="form-control" id="tenantname"> </select>
                 </div>
                 <div class="col-sm-2">
                       <button class="glyphicon glyphicon-edit" id="edittenant"></button>
                 </div>
             </div>
             
      </div>
      <div class="col-sm-2">
         <label>Additional Cost:</label>
      </div>
      <div class="col-sm-4">
         <div class="input-group"> 
            <span class="input-group-addon">Ksh</span>
            <input class="form-control" id="additonalcost" type="number"/>
            <span class="input-group-addon">.00</span>
         </div>
      </div>
      
</div>
<div class="row">
      <div class="col-sm-2">
         <label>Block Name:</label>
      </div>
       <div class="col-sm-4">
         <div class="row">
             <div class="col-sm-10">
                <select class="form-control" id="blockname"> </select>
             </div>
             <div class="col-sm-2">
                <button class="glyphicon glyphicon-edit" id="editblock"></button>
             </div>
         </div>
      </div>
      
</div>
<div class="row">
<nav aria-label="...">
<ul class="pager">
<li id="getPrevious" class="previous"><a href="#">Previous</a></li>
<li class="next" id="getNext"><a href="#">Next</a></li>
</ul>
</nav>

</div>
<script type="text/javascript" src="pagesjs/shared.js"></script>
<script type="text/javascript" src="pagesjs/apartment.js"></script>
<script type="text/javascript" src="myjs/notify.min.js"></script>
<?php
include_once('bottom.php');
?>