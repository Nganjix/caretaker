<?php
session_start();
if (isset($_SESSION['user']) && !empty($_SESSION['user']))
{  
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
            $this->profilemappings = array('firstName'=>'fname','secondName'=>'sname','lastName'=>'lname','email'=>'email','phone'=>'phoneno','postalAddress'=>'postaladdr','idNo'=>'idno','roleId'=>'roleid','userID'=>'userid','isActive'=>'useractive', 'profilePhoto'=> 'profPhoto');
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
    class Update
    {
        var $sqlstmt;
        var $profimg;
        function __construct($sqlscript, $profileimgname)
        {
            $this->sqlstmt = $sqlscript;
            $this->profimg = $profileimgname;
        }
        function inserttodb()
        {
            global $conn;
            try
            {
              $querystmt = $conn->query($this->sqlstmt);
              $querystmt->execute();
              echo '200';
              if($this->profimg != '' && isset($_FILES['filename']['name']))
               {           
                 $imgprocess = new ProcessImage($_FILES, $this->profimg, './images/profile/');
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
        function __construct($getDbFields, $primarycd)
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
                   if(isset($_FILES['filename']['name']) && $_REQUEST['page'] == 'userdetails')
                   {
                     $profilephoto = $_FILES['filename']['name'] != '' ? time().'_'.str_replace(' ', '_',$_FILES['filename']['name']) : '';
                     $this->profileimg = $profilephoto;
                     if(count($_REQUEST) == 2)
                     {
                        $vals .= " profilePhoto ='".$this->profileimg."'";
                      }
                      else
                     { 
                       $vals .= ", profilePhoto ='".$this->profileimg."'";
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
        function executeUpdate($executeObj, $primarykey)
        {
            $processObj = new ProcessUpdateRequest($executeObj, $primarykey);
            $updateObj = new Update($processObj->returnSqlQuery(), $processObj->returnProfileImgName());
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
          executeUpdate($profileObj->returnProfileFields(), 'detailsId');
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
     }
     
}
?>