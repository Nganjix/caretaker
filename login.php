<?php
session_start();
if (isset($SESSION['user'])) {
	# code...
	header("Location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width initial-scale=1">
<meta name="description" content="">
<meta name="nganj" content="">
<script src="js/vendor/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="sticky-footer.css">
<link rel="stylesheet" type="text/css" href="login.css">

<script type="text/javascript" src="main.js"></script>
    <link rel="icon" href="../../favicon.ico">
	<title> Login Page</title>
</head>
<body>
<div class="container-fliud"> 
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="navbar-header">
		<a class="navbar-brand" href="">Caretaker</a>

	</div>
	 <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right help">
            <li><a href="#" class="text-muted">Help</a></li>
            </ul>
  </nav>

  <div class"row container-fluid">
     <div class="midpanels col-md-9 container-fluid" style="background: url('livingroom.jpg') no-repeat center center fixed; min-height: ;">
     
	   
     </div>

     <div class="sidebar col-md-3 container-fluid">
          <div class="row container-fluid">
          <div id="errmsg"></div>
          <br/>
           <form class="form-horizontal" >
            <div class="form-group">
              <label for="inputUsername" class="col-sm-3 control-label">Username: </label> 
               <div class="col-sm-9">
                  <input id="username" class="form-control" type="text" name="username" placeholder="username"/>
               </div>
            </div> 
            <div class="form-group">
                  <label for="inputPassword" class="col-sm-3 control-label"> Password: </label>
                  <div class="col-sm-9">
                      <input id="password" class="form-control" type="password" name="password" placeholder="password"/>
                  </div>
             </div>
                 <div class="row">
                   <div class="col-md-3">
                   </div>
                   <div class="col-md-3">
                       
                   </div>
                   <div class="col-md-6">
                        <input id="submit" class="btn btn-primary form-control" type="button" value="Sign In"/>
                   </div>
                 </div>
                 <div class="row">
                 
                    <div class="col-md-12">
                    <br />
                    <div  id="timeoutmessage"></div></div>
                   
                 </div>
                  
             </form>
             
           </div>
        
     </div>
  </div>
     <div class="footer" class="row container-fliud">
	      <p id="Copyright" class="text-muted">&copy; <?php $years = getdate(); echo $years["year"]; ?> <a href="http://www.mazecoders.com">Mazecoders.com</a></p>
     </div>	
</div>
<script src="dist/js/bootstrap.min.js" ></script>
<script src="myjs/purl.js"></script>
<script src="js/vendor/holder.min.js"></script>
<script  type="text/javascript">
     var paramData = purl();
    var getData = paramData.attr('query');
    
    if(getData != '' && getData != undefined)
    {
        var matchpat = new RegExp('q=');
        if(matchpat.test(getData))
        {   var getId = getData.split('&');
            var getTime= getId[1];
            var paramValue = getId[0].split('=');
            if(paramValue[1] == 'timeout')
            {
                $('#timeoutmessage').addClass("alert alert-danger");
                $('#timeoutmessage').html('Session Expired: More than '+ (getTime.split('=')[1])/60+ ' minutes of inactivity, please login again');
            }
            
            /*
            */
        }
        
    }
</script>


</body>
</html>