<?php
session_start();
if(isset($_SESSION['userid']))
{
$_SESSION['logintime'] = time();
require_once('includes/dbconnection.php');
$conn = DbConnector::returnconnection();
//separate for each delete
class Tenant
{
    var $tenantid;
    function __construct($id)
    {
        $this->tenantid = $id;
    }
    function returnSqlStmt()
    {
        return "delete from tenant where id = ".$this->tenantid;
    }
}
class Apartment
{
    var $aprtCD;
    function __construct($id)
    {
        $this->aprtCD = $id;
    }
    function returnSqlStmt()
    {
        return "delete from apartment where aprtName = '".$this->aprtCD."'";
    }
    
}
class Users
{
    var $username;
    function __construct($id){
        $this->username = $id;
    }
    function returnUsersSqlStmt()
    {
        return 'delete from users where username ="'.$this->username.'"';
    }

}
class Profile
{
    var $profid;
    function __construct($id)
    {
        $this->profid = $id;
    }
    function returnProfileSqlstmt()
    {
        return 'delete from userdetails where detailsid = "'.$this->profid.'"';
    }
}
class Estate
{
    var $estateid;
    function __construct($id)
    {
        $this->estateid = $id;
    }
    function returnEstateSqlstmt()
    {
        return 'delete from estates where estateId = "'.$this->estateid.'"';
    }
}
class Block
{
    var $blockid;
    function __construct($id)
    {
        $this->blockid = $id;
    }
    function returnBlockSqlstmt()
    {
        return 'delete from blocks where blockId = "'.$this->blockid.'"';
    }
}
class Role
{
    var $usernm;
    var $dtarr;
    function __construct($user, $dtarray)
    {
        $this->usernm = $user;
        $this->dtarr = $dtarray;
    }
    function returnRolesStmt()
    {
        $rolestr = '';
        if(isset($this->dtarr))
        {
            $countofpost = count($this->dtarr) ; 
            
           
                $i = 0;
                foreach($this->dtarr as $key => $val)
                {
                    if($i != $countofpost - 1 && $countofpost > 1)
                    {
                        $rolestr .= $val.', ';
                    }
                    else
                    {
                        $rolestr .= $val;
                    }
                    
                    $i++;
                }
            
          
        }
        return 'delete from roles where screenid in ('.$rolestr.') and userid =(select userid from users where username = "'.$this->usernm.'")';
    }
    
}
class Account
{
    var $accid;
    function __construct($id)
    {
        $this->accid = $id;
    }
    function returnAccSqlstmt()
    {
        return 'delete from accounts where accName = "'.$this->accid.'"';
    }
}
class DeleteItem
{
    function delete($sql)
    {
        global $conn;
        try
        {
            $connresult = $conn->query($sql);
            $connresult->execute();
            echo '200';
        }
        catch (exception $e)
        {
            echo $e->getMessage();
        }
    }
}
//allow to delete multiple pages
function sendObjToDelete($valuestr)
{
    $newDelete = new DeleteItem();
    $newDelete->delete($valuestr);
    
}
//rocket panel where everything is launched
if(isset($_REQUEST['id']))
{
    
$getId = $_REQUEST['id'];
if($_REQUEST['page'] == 'tenant')

{
    
    if($getId != '' && !empty($getId))
    {
        $newTenantDelete = new Tenant($getId);
        sendObjToDelete($newTenantDelete->returnSqlStmt());  
    }
    
}
if($_REQUEST['page'] == 'apartment')
{
   $newAprtDel = new Apartment($getId);
   sendObjToDelete($newAprtDel->returnSqlStmt()); 
}
if($_REQUEST['page'] == 'users')
{
    
    $newUsrDel = new Users($getId);
    sendObjToDelete($newUsrDel->returnUsersSqlStmt());
}
if($_REQUEST['page'] == 'profile')
{
    
    $newProfDel = new Profile($getId);
    sendObjToDelete($newProfDel->returnProfileSqlstmt());
}
if($_REQUEST['page'] == 'estates')
{
    
    $newEstateDel = new Estate($getId);
    sendObjToDelete($newEstateDel->returnEstateSqlstmt());
}
if($_REQUEST['page'] == 'blocks')
{
    
    $newBlockDel = new Block($getId);
    sendObjToDelete($newBlockDel->returnBlockSqlstmt());
}
if($_REQUEST['page'] == 'roles')
{
    
    $newRoleDel = new Role($getId, $_POST);
    sendObjToDelete($newRoleDel->returnRolesStmt());
}
if($_REQUEST['page'] == 'accounts')
{
    
    $newAccDel = new Account($getId);
    sendObjToDelete($newAccDel->returnAccSqlstmt());
}



}


    
}




?>