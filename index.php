<?php
session_start();
if(!isset($_SESSION['user']))
{
  header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Dashboard - Caretaker</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <link href="sticky-footer.css" rel="stylesheet">
    <!-- <script src="js/vendor/jquery.min.js"></script> -->
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Caretaker</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['user'] ?>
              <span class="caret"></span>
            </a>
               <ul class="dropdown-menu">
                 <li><a href="validate.php">Logout</a></li>             
               </ul>
            </li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="tenant.php">Tenant<span class="sr-only">(current)</span></a></li>
            <li><a href="apartment.php">Apartment<span class="sr-only">(current)</span></a></li>
            <li id="ProfileTab"><a href="profile.php">Profile<span class="sr-only">(current)</span></a></li>
            <li><a href="#">Notifications<span class="sr-only">(current)</span></a></li>
            <li><a href="">Reports<span class="sr-only">(current)</span></a></li>
            <li class="dropdown">
               <a class="dropdown-toggle" data-toggle="dropdown" href="">Miscellenous <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="">Payment Periods</a></li>
                  <li class="divider"></li>
                  <li><a href="">Estates</a></li>
                  <li class="divider"></li>
                  <li><a href="users.php" id="users">Users</span></a></li>
                  <li class="divider"></li>
                  <li><a href="">Blocks</a></li>
                  <li class="divider"></li>
                  <li><a href="">Accounts</a></li>
                  <li class="divider"></li>
                  <li><a href="">Company</li>
                  <li class="divider"></li>
                  <li><a href="">Notification Templates</a></li>

                </ul>
             </li>
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder" >
              <a href="tenant.php"><img src="images/tenant.gif" width="200" height="200" class="img-responsive"></a>
              <h4>Add Tenant</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="images/payment.gif" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>New Payment</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Unpaid Houses</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Settings</h4>
              <span class="text-muted">Something else</span>
            </div>
          </div>

          <h2 class="sub-header"> Recent Payments</h2>
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1,001</td>
                  <td>Lorem</td>
                  <td>ipsum</td>
                  <td>dolor</td>
                  <td>sit</td>
                </tr>
                <tr>
                  <td>1,002</td>
                  <td>amet</td>
                  <td>consectetur</td>
                  <td>adipiscing</td>
                  <td>elit</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>Integer</td>
                  <td>nec</td>
                  <td>odio</td>
                  <td>Praesent</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>libero</td>
                  <td>Sed</td>
                  <td>cursus</td>
                  <td>ante</td>
                </tr>
                <tr>
          
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
      
    </div>
   <div class="footer" class="row container-fluid">
       <div class="col-md-3 ">
    	<p class="text-muted"><br/>Caretaker</p>
        </div>
        <div class="col-md-3"><p class="text-muted"><br/><?php $date = getdate(); echo 'Date: '.$date['mday'].' '.$date['month'].' '.$date['year'];?></p></div>
        <div class="col-md-3"><p class="text-muted"><br/>Notifications</p></div>
        <div class="col-md-3"><p class="text-muted"><br/><?php echo 'Server Address: '.$_SERVER['SERVER_ADDR']; ?></p></div>
    </div> 

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
