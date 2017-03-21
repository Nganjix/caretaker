<?php
session_start();
require_once('includes/dbconnection.php');

class DatabaseHandler
{
    var $connector;
    public function __construct()
    {
       $this->connector = Dbconnector::returnconnection();
        
    }
    public function returnSelectData($query)
    {

        return $this->connector->query($query);
        
        
    }
    public function returnUpdateStatus($sqlstmt ,$data)
    {
        $preparer = $this->connector->prepare($sqlstmt);
        return $preparer->execute($data);
        
    }
    public function returnInsertStatus($sqlstmt, $data)
    {
        $preparer = $this->connector->prepare($sqlstmt);
        return $preparer->execute($data);
    }
    public function returnDelStatus($stmt)
    {
        $this->connector->execute($stmt);
    }
    
}
class RolesVerifier extends DatabaseHandler
{
    //verify if user is allowed access
    public $currentpage;
    public $langtypeext; 
    var $pgallowed =FALSE;
    function __construct()
    {
        parent::__construct();
        $page = $_SERVER['SCRIPT_FILENAME'];
        $regex = '/\w*\.php$/';
        preg_match($regex, $page, $matcharray);
        $this->currentpage =  trim(explode('.', $matcharray[0])[0]);
        $this->langtypeext = trim(explode('.', $matcharray[0])[1]);
    }
    public function checkIfAllowedPage()
    {
        $allowedpgs = array();
        $stmt = 'select id from screens where name= "'.$this->currentpage.'" and langtype = "'.$this->langtypeext.'"';
        $getter  = $this->returnSelectData($stmt);
        $screenrecord = $getter->fetch(PDO::FETCH_ASSOC);
        $id = isset($screenrecord['id']) ? $screenrecord['id'] : '';
        if(isset($_SESSION['userroles']))
        {
            if($id != '')
            {
    
                $this->pgallowed = in_array($ideal , $_SESSION['userroles']);
            }

        }
        return $this->pgallowed; 
        
    }
    //public function  
}
class SetAllowedRoles extends DatabaseHandler
{
    
    function __construct()
    {
        parent::__construct();
        $stmt = 'select screenid from roles where userid ="'.$_SESSION['userid'].'"';
        $getdata = $this->returnSelectData($stmt);
        unset($_SESSION['userroles']);
        foreach($getdata->fetchAll(PDO::FETCH_NUM) as $key => $val)
        {
            $_SESSION['userroles'][] = $val[0];
            
        }
                //array_push(, $rolesarray);
     
    } 
     
}
class CheckScreens extends DatabaseHandler
{
    public static function returnScreenStatus($page)
    {
        if($page != '')
        {
           $stmt = 'select name from screens where name = "'.$page.'"';
           $getdt = Dbconnector::returnconnection()->query($stmt);
           if(count($getdt->fetch(PDO::FETCH_NUM)) > 0 )
           {
              return true;
           }
           else
           {
              return false;
           }
        }
        else
        {
            return false;
        }
        
        
        
    }
}
class SessionManager
{
    var $userset;
    var $pageallowed;
    public function __construct()
    {

        $this->userset = isset($_SESSION['user']) ? true : false;
        //check if user authorized to access this page
        $verifierobj = new RolesVerifier();
        $this->pageallowed = $verifierobj->checkIfAllowedPage();
    
        
    }
    function runForce($callbackfunction = NULL)
    {
        if($this->userset && $this->pageallowed)
        {
            if(!$callbackfunction)
            {
                
            }
            else
            {
                //will call the main function for each page after validation has been done
                $callbackfunction();
            }
            
            
        }
        else if($this->userset && $this->pageallowed == false)
        {
            
            header('Location:default.php');
        }
        else
        {
            header('Location:login.php');
        }
        
        
    }
}


?>