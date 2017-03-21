<?php
/*session_start();
if(!isset($_SESSION['user']))
{
  header('Location:login.php');
}*/
include_once('top.php');
?>
<div class="row">
<p></p>
<p></p>
<p></p>
<hr />
</div>
<div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-8">
      
        <blockquote>
    
         Welcome to the caretaker real estate management system. You have been redirected to this page because you dont have enough 
         permission to access other pages. Things to do:
           <ol>
             <li> Ask your administrator to log in as admin</li>
             <li> Go to the roles screen and add the necessary screens</li>
             <li> All the best </li>
           </ol>

        </blockquote>
      
  </div>
  <div class="col-md-2">
  
  
  
  </div>

</div>





<?php


include_once('bottom.php');
?>