<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="bootstrap/favicon.ico">

    <title>Dashboard - Caretaker</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <link href="sticky-footer.css" rel="stylesheet">
    <script src="js/vendor/jquery.min.js"></script>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="bootstrap/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <script type="text/javascript" src="myjs/jquery-ui.js"></script>
<link href="main.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="myjs/jquery-ui.css">

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Caretaker</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo ' '.$_SESSION['user'].'   ' ?>
              <span class="badge">4</span>
            </a>
               <ul class="dropdown-menu">
                 <li><a href="validate.php">Logout</a></li>             
               </ul>
            </li>
            <li><a href="#">Help</a></li>
          </ul>
          <!-- <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form> -->
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li id="indexTab"><a href="index.php">Overview <span class="sr-only">(current)</span></a></li>
            <li id="transTab"><a href="transactions.php">Transactions<span class="sr-only">(current)</span></a></li>
            <li id="tenantTab"><a href="tenant.php">Tenant <span class="sr-only">(current)</span></a></li>
            <li id="apartmentTab"><a href="apartment.php">Apartment</a></li>
            <li id="ProfileTab"><a href="profile.php">Profile<span class="sr-only">(current)</span></a></li>
            <li id="rolesTab"><a href="roles.php">Roles<span class="sr-only">(current)</span></a></li>
            <li id="accountsTab"><a href="accounts.php">Accounts<span class="sr-only">(current)</span></a></li>
            <li id="estatesTab"><a href="estates.php">Estates<span class="sr-only">(current)</span></a></li>
            <li id="blocksTab"><a href="blocks.php">Blocks<span class="sr-only">(current)</span></a></li>
            <li id="reportsTab"><a href="reports.php">Reports<span class="sr-only">(current)</span></a></li>
            <li class="dropdown">
               <a class="dropdown-toggle" data-toggle="dropdown" href="">Miscellenous <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="">Payment Periods</a></li>
                  <li class="divider"></li>
                  <li><a href="users.php" id="users">Users</span></a></li>
                  <li class="divider"></li>
                  <li><a href="">Company</li>
                  <li class="divider"></li>
                  <li id="notificationsTab"><a href="">Notifications</a></li>
                  <li class="divider"></li>
                  <li><a href="">Notification Templates</a></li>

                </ul>
             </li>
          </ul>
          
        </div>   