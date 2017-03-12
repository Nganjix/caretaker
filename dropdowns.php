<?php

/**
 * @author gencyolcu
 * @copyright 2017
 */

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
    if(!empty($_REQUEST["page"]) && isset($_REQUEST["page"]))
    {
        if(isset($_REQUEST['dropdownid']) && !empty($_REQUEST['dropdownid']))
        {
            if($_REQUEST["page"] == 'apartments')
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
                
            }
            
            
            
            
        }
    }
     
}


?>