<?php
/*session_start();
if(!isset($_SESSION['user']))
{
  header('Location:login.php');
}
*/
include_once('top.php');
?>
<script>
$('#headtoggle').addClass("active"); 
</script>

<!-- content area-->
<!-- header -->
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="row top-header container-fluid">
<div class="col-sm-6">
<button id="edit" class="btn btn-success glyphicon glyphicon-edit"> Edit</button>
<button id="save" class="btn btn-success glyphicon glyphicon-save" > Save</button>
<div id="requiredError" data-role="popup" ></div>     
</div>
<div class="col-sm-6">
</div>
</div>
<hr />
<!-- end header -->
<div class="row">
   <div class="col-md-6">
       <div class="form form-group">
         <label>Company Name</label>
         <input type="text" name="companyname" id="companyname" class="form form-control"/>
       </div>
       <div class="form form-group">
         <label>VAT Pin</label>
           <div class="row">
              <div class="col-md-6">
                  <input type="text" name="vatpin" id="vatpin" class="form form-control" />
              </div>
              <div class="col-md-6">
              </div>
           </div>
         
       </div>
       <div class="form form-group">
         <label>System Email:</label>
         <div class="row">
             <div class="col-md-6">
                  <input type="text" name="systememail" id="systememail" placeholder="used to send mail to system users" class="form form-control" />
             </div>
             <div class="col-md-6">
             </div>
         </div>
       </div>
       <div class="form form-group">
         <label>Contact Person:</label>
            <div class="row">
               <div class="col-md-6">
                  <input type="text" name="contactperson" id="contactperson" class="form form-control" />
               </div>
               <div class="col-md-6">
               </div>
            </div>
       </div>
       <div class="form form-group">
         <label>Telephone:</label>
            <div class="row">
               <div class="col-md-6">
                  <input type="number" name="telephone" id="telephone" class="form form-control" />
               </div>
               <div class="col-md-6">
               </div>
            </div>
       </div>
      
       
       
       
   </div> 
   <div class="col-md-6">
         <div class="form form-group">
         <label>Postal Address:</label>
            <div class="row">
               <div class="col-md-6">
                  <input type="text" name="postaladdress" id="postaladdress" class="form form-control" />
               </div>
               <div class="col-md-6">
               </div>
            </div>
          </div>
          <div class="form form-group">
         <label>Location:</label>
            <div class="row">
               <div class="col-md-6">
                  <input type="text" name="location" id="location" class="form form-control" />
               </div>
               <div class="col-md-6">
               </div>
            </div>
          </div>
          <div class="form form-group">
          <label>Mpesa Merchant ID:</label>
            <div class="row">
               <div class="col-md-6">
                  <input type="text" name="mpesamerchantid" id="mpesamerchantid" class="form form-control" />
               </div>
               <div class="col-md-6">
               </div>
            </div>
          </div>
       
        <div class="form form-group">
          <label>Logo Name:</label>
            <div class="row">
               <div class="col-md-6">
               <input type="text" disabled="true" class="form form-control" id="imgnameplaceholder"/>
               <br />
                  <input type="file" name="logoname" id="logoname" class="form form-control" />
                  <br />
                  <div id="imgmessage" class="text-warning"></div>
               </div>
               <div class="col-md-6">
               </div>
            </div>
       </div>
       
       
       
       
       
       
    
       
   </div> 
</div>
<!-- end of content area-->
<script type="text/javascript" src="pagesjs/company.js"></script>
<script type="text/javascript" src="pagesjs/shared.js"></script>
<script type="text/javascript" src="myjs/notify.min.js"></script>
<?php


include_once('bottom.php');
?>