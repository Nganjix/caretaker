<?php
session_start();
if(isset($_SESSION['userid']))
{
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
}


    
}




?>