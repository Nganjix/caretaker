<?php
session_start();
if (isset($_SESSION['user']) && !empty($_SESSION['user']))
{ 
$_SESSION['logintime'] = time();
require_once('aside/paymentsmanager.php');
require_once('includes/dbconnection.php');
require_once('includes/processimage.php');
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
                    'graceperiod'=>'graceperiod',
                    'monthlyrent'=>'tenantMonthlyRent'
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
        'tenantId' => 'tenantname',
        'blockId' => 'blockname',
        'costPerMonth' => 'apartmentbill'
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
    class Users
    {
      var $usersmappings;
      function __construct()
      {
        $this->usersmappings = array('username' => 'usernm', 'password' => 'password1');

      }
      function returnUsersFields()
      {
        return $this->usersmappings;

      }
    }
    class Profile
    {
        var $profilemappings;
        function __construct()
        {
            $this->profilemappings = array('firstName'=>'fname','secondName'=>'sname','lastName'=>'lname','email'=>'email','phone'=>'phoneno','postalAddress'=>'postaladdr','idNo'=>'idno','userID'=>'userid','isActive'=>'useractive', 'profilePhoto'=> 'profPhoto');
        }
        function returnProfileFields()
        {
            return $this->profilemappings;
        }
        
    }
    class Estate
    {
        var $estateMapping;
        function __construct()
        {
            $this->estateMapping = array('estateName'=>'estateName', 'estateDesc'=>'estateDesc', 'estateLocation'=>'location');
        }
        function returnEstateFields()
        {
            return $this->estateMapping;
        }
    }
    class Block
    {
        var $blockMapping;
        function __construct()
        {
            $this->blockMapping = array('blockName'=>'blockname', 'blockDesc'=>'blockdesc', 'estateId'=>'estateid');
        }
        function returnBlockFields()
        {
            return $this->blockMapping;
        }
    }
    class Account
    {
        var $accmappings;
        function __construct()
        {
            $this->accmappings = array('accName' => 'accname', 'accDesc' => 'accdesc', 'active' => 'accstatus');
        }
        function returnAccMapings()
        {
            return $this->accmappings;
        }
    }
    class Payments
    {
        var $paymentfields;
        function __construct()
        {
           $this->paymentfields = array('transId'=> 'refid', 'tranDesc'=> 'pmethodselect' , 'accid'=> 'accselect' , 'tenantId'=> 'tenantselect', 'phoneNo'=> 'phoneno', 'paymentAmount'=> 'amount', 
	   'Status'=> 'statusselect' , 'paymentPeriod'=> 'paymentprds', 'paymentDate' => 'transdate', 'waterbill'=>'waterbill', 'elecbill'=>'elecbill', 'extracosts'=>'addcbill');
       	   
        }
        function returnPaymentMappings()
        {
            return $this->paymentfields;
        }
    }
    class Update
    {
        var $sqlstmt;
        var $profimg;
        var $docpath;
        function __construct($sqlscript, $profileimgname, $docpath='')
        {
            $this->sqlstmt = $sqlscript;
            $this->profimg = $profileimgname;
            $this->docpath = $docpath;
        }
        function inserttodb()
        {
            global $conn;
            try
            {
              $querystmt = $conn->query($this->sqlstmt);
              if($querystmt->execute())
              {
                echo '200';
              }
              
              if($this->profimg != '' && isset($_FILES['filename']['name']))
               {           
                 $imgprocess = new ProcessImage($_FILES, $this->profimg, $this->docpath);
                 $imgprocess->moveImg(); 
                }      
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
        var $profileimg = '';
        function __construct($getDbFields, $primarycd, $fieldname = '')
        {
            $this->fieldmappings = $getDbFields;
            if(!empty($_REQUEST))
                {
                 $updatetb = $_REQUEST['page'];
                 $currentid =  $_REQUEST['id'];
                 if($_REQUEST['page'] == 'users')
                  {
                    $password = $_REQUEST['password1'];
                    $_REQUEST['password1'] = password_hash($password, PASSWORD_BCRYPT);
                    
                  }
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
                   //append photphane to the values to be updated
                   if(isset($_FILES['filename']['name']) && ($_REQUEST['page'] == 'userdetails' ||  $_REQUEST['page'] == 'payments'))
                   {
                     $profilephoto = $_FILES['filename']['name'] != '' ? time().'_'.str_replace(' ', '_',$_FILES['filename']['name']) : '';
                     $this->profileimg = $profilephoto;
                     if(count($_REQUEST) == 2)
                     {
                        $vals .= $fieldname." ='".$this->profileimg."'";
                      }
                      else
                     { 
                       $vals .= ", ".$fieldname." ='".$this->profileimg."'";
                      }
                   }
                   
                   

                  $this->wholesqlstr =  "update $updatetb set $vals where ".$primarycd." = '".$currentid."'";
                  
                 }
         }
         function returnSqlQuery()
         {
            return $this->wholesqlstr;
         }
         function returnProfileImgName()
         {
            return $this->profileimg;
         }  
    
     }
     //dashboard
     if(isset($_REQUEST['page']))
     {
        function executeUpdate($executeObj, $primarykey, $fieldn= '', $docpath='')
        {
            $processObj = new ProcessUpdateRequest($executeObj, $primarykey,$fieldn );
            $updateObj = new Update($processObj->returnSqlQuery(), $processObj->returnProfileImgName(), $docpath);
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
        if($page == 'users')
        {
          $usrObj = new Users();
          executeUpdate($usrObj->returnUsersFields(), 'username');
        }
        if($page == 'userdetails')
        {
          
          $profileObj = new Profile();
          executeUpdate($profileObj->returnProfileFields(), 'detailsId', 'profilePhoto', './images/profile/');
        }
        if($page == 'estates')
        {
          $estatesObj = new Estate();
          executeUpdate($estatesObj->returnEstateFields(), 'estateId');
        }
        if($page == 'blocks')
        {
          $blockObj = new Block();
          executeUpdate($blockObj->returnBlockFields(), 'blockId');
        }
        if($page == 'accounts')
        {
          $accObj = new Account();
          executeUpdate($accObj->returnAccMapings(), 'accName');
        }
        if($page == 'payments')
        {
          $payObj = new Payments();
          executeUpdate($payObj->returnPaymentMappings(), 'transId', 'documentname', './images/documents/');
        }
     }
     
}
?>