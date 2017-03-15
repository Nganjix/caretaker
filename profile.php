<?php
session_start();
if(!isset($_SESSION['user']))
{
  header('Location:login.php');
}
include_once('top.php');
?>
<script type="text/javascript">

$('#ProfileTab').addClass("active"); 

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
         <input type="text" id="searchApartment" class="form-control" placeholder="search with name.."/>
    </div>
<span class="input-group-btn">
        <button id= "search" class="btn btn-default" type="button" disabled="true">Search</button>
</span>
</div>
</div>
</div>
<hr />
<div class="row">
    <div class="col-md-1"></div>
	<div class="col-md-3">
	<div class="form-group">
		<img src="images/profileplaceholder.png">
		<input type="file" name="uploadprofileimg">
	</div>
	
	</div>
	<div class="col-md-8">
	  <div class="row">
	  <div class="col-md-6">
	  <div class="form form-group">
	  	<label>First Name *</label>
	  	<input type="text" name="firstName" id='fname' class="form form-control "/>
	  </div>
	  <div class="form form-group">
	    <label>Second Name</label>
	  	<input type="text" name="secondName" id='sname' class="form form-control "/>
	  </div>
	  <div class="form form-group">
	    <label>Last Name *</label>
	  	<input type="text" name="lastName" id='lname' class="form form-control "/>
	  </div>
	  <div class="form form-group">
	    <label>Email </label>
	  	<input type="email" name="email" id='email' class="form form-control "/>
	  </div>
	  <div class="form form-group">
	    <label>Phone</label>
	  	<input type="text" name="phoneno" id='phoneno' class="form form-control "/>
	  </div>
	 </div>
	 <div class="col-md-6">
	 	<div class="form form-group">
	  	  <label>Postal Address</label>
	  	  <input type="text" name="postaladdr" id='postaladdr' class="form form-control "/>
	    </div>
	    <div class="form form-group">
	  	  <label>ID No</label>
	  	  <input type="text" name="idno" id='idno' class="form form-control "/>
	    </div>
	    <div class="form form-group">
	  	  <label>Role *</label>
	  	  <div class="row">
	  	    <div class="col-md-10">
	  	      <select class="form form-control" id='roleid'>	
	  	      </select>
	  	     </div>
	  	     <div class="col-md-2">
	  	     	<button id="addRole"> + </button>
	  	     </div>
	  	  
	  	  </div>
	    </div>
	    <div class="form form-group">
	  	  <label>User</label>
	  	  <div class="row">
	  	    <div class="col-md-10">
	  	      <select class="form form-control" id='user'>	
	  	      </select>
	  	    </div>
	  	    <div class="col-md-2">
	  	    	<button id="addUser"> + </button>
	  	    </div>
	  	  
	    </div>
	    
	 </div>
	         <div class="form form-group">
	           <div class="row">
	            <div class="col-md-8">
	        	<label>Active</label>
	             </div>
	              <div class="col-md-4">
	      	    <input type="checkbox" name="useractive" id='useractive' class="form form-control "/>
	      	</div>
	    </div>	      		   
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
<script type="text/javascript" src="pagesjs/profile.js"></script>
<script type="text/javascript" src="pagesjs/shared.js"></script>
<?php


include_once('bottom.php');
?>
