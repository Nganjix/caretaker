<?php
session_start();
if(isset($_SESSION['user'])){
include_once('includes/dbconnection.php');
$connector = DbConnector::returnconnection();
//echo $_GET['page'].' '.$_GET['id'];
if(isset($_GET) && !empty($_GET))
{
      
    class SetupTables
    {
    // create the sql    
    var $varID;
    var $tablename;
    function __construct($getObj)
    {
        $this->varID = $getObj['id'];
        $this->tablename = $getObj['page'];
    }
    public function returnTenantSql()
    {
        //tenant
        return "select id, firstName,secondName,idNumber,gender,isActive,email,boardingDate,paymentPhoneNo1,paymentPhoneNo2,
        nextOfKinFname,nextOfKinSname, nextOfKinIdNo, nextOfKinPhoneId,depositNumber,currentAmount from ".$this->tablename." where id=".$this->varID;
    }
    public function returnApartmentsSql()
    {
        /* select a.aprtName, a.costPerMonth, a.aprtDesc, b.accName, concat(c.firstName, ' ', c.secondName), a.additionalCost, d.blockName from apartment 
        a left join accounts b on a.accId = b.accId left join tenant c on a.tenantId = c.Id left join blocks d on a.blockId = d.blockId where a.aprtName
         = '".$this->varID."'"; */
     
        return "select aprtName, costPerMonth, aprtDesc,accId, tenantId, additionalCost, blockId from apartment where aprtName = '".$this->varID."'";
    }
    public function returnUsersSql()
    {
        return "select username, password from users where username = '".$this->varID."'";
    }
    public function returnProfileSql()
    {
        return 'select firstName,secondName,lastName,email,phone,postalAddress,idNo,roleId,userID,isActive, profilePhoto from userdetails where detailsid = "'.$this->varID.'"';
    }
    public function returnEstatesSql()
    {
        return 'select estateName, estateDesc, estateLocation from estates where estateId ="'.$this->varID.'"';
    }
    public function returnBlocksSql()
    {
        return 'select blockName, blockDesc, estateId from blocks where blockId ="'.$this->varID.'"';
    } 
    public function returnRolesScreen()
    {
       return 'select id, name from screens where allowed  = 1'; 
    }
    public function returnUsersRoles()
    {
        return 'select screenid from roles where userid = (select userid from users where username="'.$this->varID.'")';
    }
}    
    class SendBackData
    {
        //senddata back
        var $mainSql;
        function __construct($genSql)
        {
            $this->mainSql = $genSql; 
        }
        public function returnJsonData()
        {
            global $connector;
            try{
                $arraytosend = array();
            $querier = $connector->query($this->mainSql);
            $result = $querier->setFetchMode(PDO::FETCH_NUM);
            while($row = $querier->fetch())
            {
                $arraytosend = $row;
            }
            if($arraytosend != [])
              {
                echo json_encode($arraytosend);
              }
              else
              {
                 echo '300'; //data not found
               }
            }
            catch (exception $e){
                echo($e);
                echo '400 '; //error found
            }
            
            
        }
    }
    $newTableSetup = new SetupTables($_GET);
    
    //dashboad of sendbackstuff
    function runQueries($query)
    {
        $newSendData = new SendBackData($query);
        $newSendData->returnJsonData();
    }
    if($_GET['page'] == 'tenant')
    {
        if(isset($_GET['statusPN']))
        {  
            //send data when Prev, Next button clicked
            $seltedqry = '';
            if($_GET['id'] != 'NoID') //check if id given
            {
                //if id exists return next record that matches
                if ($_GET['statusPN'] == 'Next')
                {
                $seltedqry = "select id, firstName,secondName,idNumber,gender,isActive,email,boardingDate,paymentPhoneNo1,paymentPhoneNo2,
        nextOfKinFname,nextOfKinSname, nextOfKinIdNo, nextOfKinPhoneId,depositNumber,currentAmount from ".$_GET['page']." where id > ".$_GET['id']." order by id limit 1";
             
                  
                }
               else
               {
                //else return previous record
                $seltedqry = "select id, firstName,secondName,idNumber,gender,isActive,email,boardingDate,paymentPhoneNo1,paymentPhoneNo2,
        nextOfKinFname,nextOfKinSname, nextOfKinIdNo, nextOfKinPhoneId,depositNumber,currentAmount from ".$_GET['page']." where id < ".$_GET['id']." order by id limit 1";
        
               }
        
           }
        else {
            //else return 1st record
            
               $seltedqry = "select id, firstName,secondName,idNumber,gender,isActive,email,boardingDate,paymentPhoneNo1,paymentPhoneNo2,
        nextOfKinFname,nextOfKinSname, nextOfKinIdNo, nextOfKinPhoneId,depositNumber,currentAmount from ".$_GET['page']." order by id limit 1";
                  
             }
             runQueries($seltedqry);
            
            
        }
        else
        {
            
        $newSendData = new SendBackData($newTableSetup->returnTenantSql());
        $newSendData->returnJsonData();
        }
        
    }
    if($_GET['page'] == 'apartments')
    {
        
        if(isset($_GET['statusPN']))
        {
            $selectedqry  = '';
            if($_GET['id'] == 'NoID')
            {
                $selectedqry = 'select aprtName, costPerMonth, aprtDesc,accId, tenantId, additionalCost, blockId from apartment order by aprtName limit 1';
                
            }
            else
            {
                if($_GET['statusPN'] == 'Next')
                {
                    $selectedqry = "select aprtName, costPerMonth, aprtDesc,accId, tenantId, additionalCost, blockId from apartment where aprtName > '".$_GET['id']."' order by aprtName limit 1";
                }
                else
                {
                    $selectedqry = "select aprtName, costPerMonth, aprtDesc,accId, tenantId, additionalCost, blockId from apartment where aprtName < '".$_GET['id']."'order by aprtName limit 1";
                }
            }
            runQueries($selectedqry);
        }
        
        else
        {
            runQueries($newTableSetup->returnApartmentsSql()); 
        }
       
       
    }
    if($_GET['page'] == 'users')
    {
        $newSendData = new SendBackData($newTableSetup->returnUsersSql());
        $newSendData->returnJsonData();
    }
    if($_GET['page'] == 'profile')
    {
        if(isset($_REQUEST['statusPN']))
        {
            
        }
        else
        {
            $newSendData = new SendBackData($newTableSetup->returnProfileSql());
            $newSendData->returnJsonData();
        }
        
    }
    if($_GET['page'] == 'estates')
    {
        if(isset($_REQUEST['statusPN']))
        {
            
        }
        else
        {
            $newSendData = new SendBackData($newTableSetup->returnEstatesSql());
            $newSendData->returnJsonData();
        }
        
    }
    if($_GET['page'] == 'blocks')
    {
        if(isset($_REQUEST['statusPN']))
        {
            
        }
        else
        {
            $newSendData = new SendBackData($newTableSetup->returnBlocksSql());
            $newSendData->returnJsonData();
        }
        
    }
    if($_GET['page'] == 'roles')
    {
        //have to create separate db connection - different data requirements
        global $connector;
        $datasent = array();
        //print_r($_REQUEST);
        if($_GET['q'] == 'allpages')
        {
            
            $newGetter = $connector->query($newTableSetup->returnRolesScreen());
            foreach($newGetter->fetchAll(PDO::FETCH_NUM) as $key => $val)
            {
                $datasent[] = $val;
                
            }
            
            
        }
        if($_GET['q'] == 'onlyusers')
        {
            $newuserpagesgetter = $connector->query($newTableSetup->returnUsersRoles());
            foreach($newuserpagesgetter->fetchAll(PDO::FETCH_NUM) as $key => $val)
            {
                $datasent[] = $val;
                
            }
        }
        echo(json_encode($datasent));
    }
    
}
}
?>