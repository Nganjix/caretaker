<?php

session_start();
if(isset($_SESSION['user']))
{

   include_once('includes/dbconnection.php');
   $conn = DbConnector::returnconnection();
   
    class databaseops
    {
        var $table;
        var $fields;
        var $params;
        function __construct($tablename, $fields, $params)
        {
            
            $this->table = $tablename;
            $this->fields = $fields;
            $this->params = $params;
        }
        function buildQuery()
        {
            if($this->params == 'None')
            {
                return 'select '.$this->fields.' from '.$this->table;
            }
            else
            {
                return 'select '.$this->fields.' from '.$this->table.' where '.$this->params;
            }
            
        }
        function returnData(){
         global $conn;
         $queryObj = $conn->query($this->buildQuery());  
         $queryObj->setFetchMode(PDO::FETCH_NUM);
         $arrayObj = array();
         while($row = $queryObj->fetch())
         {
            array_push($arrayObj, $row);
         } 
         return $arrayObj;
        }
        
        
    }
    class accounts
    {
        
        var $dropdown;
        function __construct($requestObj)
        {
            $this->dropdown = $requestObj;
        }
        function returnAccounts()
        {
            $field = 'accId, accName';
            $db = new databaseops($this->dropdown, $field, 'None');
            echo(json_encode($db->returnData()));
            
        } 
        
    }
    class tenant
    {
        var $dropdown;
        function __construct($requestObj)
        {
            //sets table name
           $this->dropdown = $requestObj;
        }
        function returnTenant()
        {
            $field = 'id, firstName, secondName';
            $db = new databaseops($this->dropdown, $field, 'None');
            echo(json_encode($db->returnData())); 
            
        }   
    }
    class blocks
    {
        var $dropdown;
        function __construct($requestObj)
        {
           $this->dropdown = $requestObj;
        }
        function returnBlocks()
        {
            $field = 'blockId, blockName';
            $db = new databaseops($this->dropdown, $field, 'None');
            echo(json_encode($db->returnData())); 
            
        }   
    }
    class Roles
    {
        var $tablename;
        function __construct()
        {
            $this->tablename = 'roles';
            
        }
        function returnRoles()
        {
            $fields = 'id, name';
            $db = new databaseops($this->tablename, $fields, 'None');
            echo(json_encode($db->returnData()));
            
        } 
    }
    class Users
    {
        var $tablename;
        function __construct()
        {
            $this->tablename = 'users';
            
        }
        function returnUsers()
        {
            $fields = 'userid, username';
            $db = new databaseops($this->tablename, $fields, 'None');
            echo(json_encode($db->returnData()));
            
        } 
    }
    if(!empty($_REQUEST["page"]) && isset($_REQUEST["page"]))
    {
        if(isset($_REQUEST['dropdownid']) && !empty($_REQUEST['dropdownid']))
        {
            $pagesarray = array('apartments', 'profile');
            if(in_array($_REQUEST["page"],$pagesarray))
            {
                if($_REQUEST["dropdownid"] == 'accounts')
                {
                    
                    $accounts = new accounts($_REQUEST["dropdownid"]);
                    $accounts->returnAccounts();
                }
                if($_REQUEST["dropdownid"] == 'tenant')
                {

                    $tenant = new tenant($_REQUEST["dropdownid"]);
                    $tenant->returnTenant();
                }
                if($_REQUEST["dropdownid"] == 'blocks')
                {
                    $block = new blocks($_REQUEST["dropdownid"]);
                    $block->returnBlocks();
                }  
                if($_REQUEST["dropdownid"] == 'roleid')
                {
                    $role = new Roles($_REQUEST["dropdownid"]);
                    $role->returnRoles();
                } 
                if($_REQUEST["dropdownid"] == 'userid')
                {
                    
                    $user = new Users($_REQUEST["dropdownid"]);
                    $user->returnUsers();
                }  
                
            }
            
            
            
            
        }
    }
     
}


?>