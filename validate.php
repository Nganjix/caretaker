<?php

require_once('includes/dbconnection.php');
require_once('aside/sessionsmanager.php');
$conn = DbConnector::returnconnection();
//$referrer = $_SERVER['HTTP_REFERER'];
//$regex = '/\w*\.php$/';
//preg_match($regex, $referrer, $array);
//separate the loggin in with logout-check which page requested validate.php
$page = isset($_GET['page']) ? $_GET['page'] : '';
if (CheckScreens::returnScreenStatus($page))
  { 
    //register logging out
    function logOutUser()
    {
        
        global $conn;
        $sql = "update login set logoutDtstamp = ? where Id = ?";
        $updatelogout = $conn->prepare($sql);
        try{
            $updatelogout->execute(array(time(), $_SESSION['sessionUserId']));
        } catch(exception $e){
            echo 'logout err '.$e;
        }
    }
    logOutUser();
    session_unset();
    session_destroy();
    $url2 = isset($_GET['q']) &&  isset($_GET['t']) ? 'Location:login.php?q='.$_GET['q'].'&t='.$_GET['t']  : 'Location:login.php';
    header($url2);
  }

else
  {
   if (isset($_POST['username']) && isset($_POST['password']))
    {
	  if(!empty($_POST['username']) && !empty($_POST['password']))
	   {
		    $usrname = $_POST['username'];
            $pssword = $_POST['password'];
        
        $sql = 'select userid, username, password from users where username ='.'"'.$usrname.'"';
        // $sql= "select * from tablename where id = ? and name = ?
        $query = $conn->query($sql);
        if($query->rowCount() == 1)
        {
           $data = $query->fetch();
           if ($usrname == $data['username'] && password_verify($pssword, $data['password'])) {
           	# code...
          
           if(isset($_SESSION['userid']))
           {
           	//$_SESSION['userid'] += $data['userid'];
           	//$_SESSION['user'] += $data['username'];
           	//echo 'already set '.session_id();
           	
            header('Location:index.php');
            
           }
           else {
           	$_SESSION['userid'] = $data['userid'];
            $_SESSION['user'] = $data['username'];
            //regsiters the login session
            function logLogin()
           {
            global $conn;
            $loginTime = time();
            $_SESSION['logintime'] = $loginTime;
            $useridf = $_SESSION['userid'];
            $useripaddr = $_SERVER['REMOTE_ADDR'];
            session_regenerate_id(true);
            $sessid = session_id();
            $sqlstmt = "insert into login (loginDtstamp,userId,userIp,session) values (?, ?, ?, ?)";
            $querylogin  = $conn->prepare($sqlstmt);
            try{
            $querylogin->execute(array($loginTime, $useridf, $useripaddr, $sessid));
            $_SESSION['sessionUserId'] = $conn->lastInsertId();
            }
            catch(exception $e)
            {
                echo 'logging in err '.$e;
            }
           }
           	//echo 'new setting '.session_id();
            
            logLogin();
            new SetAllowedRoles();
           	echo '200';
           	//header('Location:index.php');
            //exit;
            
           }
           
           }
           else {
           	echo 'username or password do not match';
           }	

         }
         else
         {
         	echo 'User or password not found, please try again';
         }
        
	  }	
   
    }
}
?>