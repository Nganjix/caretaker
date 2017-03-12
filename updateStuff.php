<?php
session_start();
if (isset($_SESSION['user']) && !empty($_SESSION['user']))
{  
require_once('includes/dbconnection.php');
$conn =  DbConnector::returnconnection();
    
    class Tenant
    {
      var $mappings;
      function __construct()
      {
             $this->mappings = array(  'id' => 'id', 
                    'firstName'=>'fname',
                    'secondName'=>'sname',
                    'idNumber'=>'idnum',
                    'gender'=>'gender',
                    'isActive'=> 'tenantStatus',
                    'email'=>'ownerEmail',
                    'boardingDate'=>'boardingDate',
                    'paymentPhoneNo1'=>'pnumber1',
                    'paymentPhoneNo2'=>'pnumber2',
                    'nextOfKinFname'=>'kinfName',
                    'nextOfKinSname'=>'kinSName',
                    'nextOfKinIdNo'=>'kinIdNo',
                    'nextOfKinPhoneId'=>'kinPhoneNo',
                    'depositNumber'=>'tenantDepositAmt',
       );   
    }
   public function returnFieldsObjects()
   {
        return $this->mappings;
    
    }
        
    }
    class Apartment
    {
        var $aprtmappings;
        /*var $aprtName;
        var $aprtDesc;
        var $accID;
        var $tenantId;
        var $blockId;
        var $costPerMonth;
        var $waterBill;
        var $elecBill;
        var $additionalCost;
        */
        
        
        function __construct()
        {
            
            $this->aprtmappings = array(
        'aprtName' => 'apartmentname',
        'aprtDesc' => 'apartmentdesc',
        'accID' => 'apartmentacc',
        'tenantId' => 'tenantname',
        'blockId' => 'blockname',
        'costPerMonth' => 'apartmentbill',
        'additionalCost' => 'additonalcost'
        );
                /*$this->aprtName =$requestObj['apartmentname'];
                $this->aprtDesc = $requestObj['apartmentdesc'];
                $this->accID = $requestObj['apartmentacc'];
                $this->tenantId = $requestObj['tenantname'];
                $this->blockId = $requestObj['blockname'];
                $this->costPerMonth = $requestObj['apartmentbill'];
                $this->additionalCost = $requestObj['additonalcost'];
                */
                
        }
        function returnAprtFields()
        {
            return $this->aprtmappings;
        }
    }
    class Update
    {
        var $sqlstmt;
        function __construct($sqlscript)
        {
            $this->sqlstmt = $sqlscript;
        }
        function inserttodb()
        {
            global $conn;
            try
            {
              $querystmt = $conn->query($this->sqlstmt);
              $querystmt->execute();
              echo '200';
              }
              catch(exception $e)
              {
                echo $e->getMessage();
              }
        }
        
        
    }
    class ProcessUpdateRequest
    {
        var $wholesqlstr;
        var $fieldmappings;
        
        function __construct($getDbFields, $primarycd)
        {
            $this->fieldmappings = $getDbFields;
            if(!empty($_REQUEST))
                {
                 $updatetb = $_REQUEST['page'];
                 $currentid =  $_REQUEST['id'];
                 $vals = '';
                  foreach($_REQUEST as $key => $value)
                   {
                      foreach($this->fieldmappings as $db => $jscript)
                      {
                        if ($key == $jscript && $key != 'id')
                         {
                            if($vals == '')
                            {
                                $vals = $db." = '".$value."'";
                            }
                            else
                            {
                                $vals = $vals.','.$db." = '".$value."'"; 
                            }
                            
                          }
                      }
                      
                   }
                  $this->wholesqlstr =  "update $updatetb set $vals where ".$primarycd." = '".$currentid."'";
                 }
         }
         function returnSqlQuery()
         {
            return $this->wholesqlstr;
         } 
    
     }
     //dashboard
     if(isset($_REQUEST['page']))
     {
        function executeUpdate($executeObj, $primarykey)
        {
            $processObj = new ProcessUpdateRequest($executeObj, $primarykey);
            $updateObj = new Update($processObj->returnSqlQuery());
            $updateObj->inserttodb();
        }
        $page = $_REQUEST['page'];
        if($page == 'tenant')
        {
            $tenantobj = new Tenant();
            executeUpdate($tenantobj->returnFieldsObjects(), 'id');
            
        }
        if($page == 'apartment')
        {
            $aprtObj = new Apartment();
            executeUpdate($aprtObj->returnAprtFields(), 'aprtName');            
        }
        
     }
     
}
?>