<?php
session_start();
if(isset($_SESSION['user']) && !empty($_SESSION['user']))
{
require_once('includes/dbconnection.php');
$tenantconn = DbConnector::returnconnection();

class Tenant
{
//mapping of the database fields 
//var $tenantId;
var $formdata;
var $firstName;
var $secondName;
//var $lastName;
var $idNumber;
var $gender;
var $isActive;
var $email;
var $boardingDate;
//var $isPaymentPeriods;
//var $paymentPeriodId;
var $paymentPhoneNo1;
var $paymentPhoneNo2;
var $nextOfKinFname;
var $nextOfKinSname;
var $nextOfKinIdNo;
var $nextOfKinPhoneId;
var $depositNumber;
//var $currentAmount;
//var $address;
//var $pinvatno;
function convertDate($strdate){
$datearray = explode('-', $strdate);
return mktime($datearray[1],$datearray[2], $datearray[0]);
}
function __construct($formData)
{
    $this -> firstName = $formData['fname'];
    $this -> secondName = $formData['sname'];
    $this -> idNumber = $formData['idnum'];
    $this -> gender = $formData['gender'];
    $this -> isActive = $formData['tenantStatus']; 
    $this -> email = $formData['ownerEmail'];
    $this -> boardingDate =  $formData['boardingDate'];
    $this -> paymentPhoneNo1 =$formData['pnumber1'];
    $this -> paymentPhoneNo2 = ($formData['pnumber2'] != null && $formData['pnumber2'] != "") ? $formData['pnumber2'] : 0; //optional
    $this -> nextOfKinFname = $formData['kinfName'];
    $this -> nextOfKinSname = $formData['kinSName'];
    $this -> nextOfKinIdNo = $formData['kinIdNo'];
    $this -> nextOfKinPhoneId = $formData['kinPhoneNo'];
    $this -> depositAmount = ($formData['tenantDepositAmt'] != null && $formData['tenantDepositAmt'] != "") ? $formData['tenantDepositAmt']: 0 ; //optional
    }
function insertTenantSql()
{
    $sqlstmt = "insert into tenant (firstName,secondName,idNumber,gender,isActive,email,boardingDate,
paymentPhoneNo1,paymentPhoneNo2,nextOfKinFname,nextOfKinSname, nextOfKinIdNo,
nextOfKinPhoneId,depositNumber) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
return $sqlstmt;
}
function getData(){
    return array($this ->firstName, $this ->secondName, $this ->idNumber, $this ->gender, $this ->isActive, $this ->email, $this ->boardingDate,$this ->paymentPhoneNo1, $this ->paymentPhoneNo2, $this ->nextOfKinFname, $this ->nextOfKinSname, $this ->nextOfKinIdNo, $this ->nextOfKinPhoneId, $this ->depositAmount);
}  
function runTenant()
{
    $insertdata = new InsertData($this->insertTenantSql(), $this->getData());
}  
}
class VerifyFormData
{
    var $insertedData;
    function __construct($getFormDate)
    {    
            $this->insertedData = $getFormDate;
    }
    function returnVerifiedData()
    {
        if(isset($this->insertedData) && !empty($this->insertedData))
        {
            return $this->insertedData;
        }
        else
        {
            return false;
        }                                         
    }
}
class InsertData
{
    function __construct($stmt, $data){
        global $tenantconn;
        $query = $tenantconn->prepare($stmt);
        try{
        $query->execute($data);
        echo '200';
        }
        catch(exception $e){
         echo $e -> getMessage();   
        }
        
        
  } 
}
class Apartment
{
    var $mappings = array("apartmentname"=>"aprtName", "apartmentbill"=>"costPerMonth", "apartmentdesc"=>"aprtDesc", "apartmentacc"=>"accId","tenantname"=>"tenantId", 
	"additonalcost"=>"additionalCost", "blockname"=>"blockId");
     var $datarray = array();
     var $fieldsarray = array(); 
    function __construct($formData)
    {
        foreach($this->mappings as $key => $value)
        {
            if($formData[$key] != '' && $formData[$key] != 'None')
            {
                array_push($this->datarray, $formData[$key]);
                array_push($this->fieldsarray, $value);
            }
            //$this->datarray[$value] = ; 
        }
    }
    function runApartment() 
    {
        $valsstr = function()
        {
            //create question mark screen
            $qstr = '';
            $arraycount = count($this->datarray);
            for ($i = 0; $i < $arraycount; $i++)
            {
             if($i != ($arraycount - 1))
             {
                $qstr .= '?, ';
             }
             else
             {
                $qstr .= '?';
             }   
            }
            return $qstr;
        };
        $fieldstr = implode(',', $this->fieldsarray);
        $stmt = 'insert into apartment ( '.$fieldstr.' ) values ( '.$valsstr().' )';
        $insertdata = new InsertData($stmt, $this->datarray);
 
    }
    
    
}
class Users
{
    var $username;
    var $password;
    function __contruct($formData)
    {
        $this->username = $formData['usernm'];
        $this->password = $formData['password1'];

    }
    function createStmt()
    {
        return 'insert into users (username, password) values (?, ?)';
    }
    function runUsers()
    {
        if(($this->username == '' || $this->username == None || $this->username == ' ')  ||  ($this->password == '' || $this->password == None || $this->password == ' '))
        {
            echo '400';
        }
        {

            InsertData(createStmt(), [trim($this->username), password_hash($this->password, PASSWORD_BCRYPT)]);
        }
        
    }
}
if(isset($_GET['page']) && !empty($_GET['page']))
{
    
    $verifyData = new VerifyFormData($_POST);
    if($verifyData->returnVerifiedData())
    {
         if($_GET['page'] == 'tenant')
         {
            $newtenant = new Tenant($_POST);
            $newtenant->runTenant();
         }
         if($_GET['page'] == 'apartment')
         {
            $newApartment = new Apartment($_POST);
            $newApartment->runApartment();
         }
         if($_GET['page'] == 'users')
         {
            echo json_encode($_REQUEST); 
            //$newUser = new Users($_POST);
            //$newUser->runUsers();

         }
    }
    else
    {
        echo('400');
    }
}
}

else
{
    echo('400');

}



?>