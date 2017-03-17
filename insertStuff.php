<?php

session_start();
if(isset($_SESSION['user']) && !empty($_SESSION['user']))
{

require_once('includes/dbconnection.php');
require_once('includes/processimage.php');
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
    $insertdata = new InsertData($this->insertTenantSql(), $this->getData(), '');
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
    function __construct($stmt, $data, $profileimg){
        global $tenantconn;
        $query = $tenantconn->prepare($stmt);
        try{
        $query->execute($data);
        echo '200';
        if($profileimg != '' && isset($_REQUEST['page']))
        {           
           $imgprocess = new ProcessImage($_FILES, $profileimg);
           $imgprocess->moveImg(); 
        }
        
         
        }
        catch(exception $e){
         echo $e -> getMessage();   
        }
        
        
  } 
}

function createInsertQuestionMarks($darray)
{
            //create question marks for sql
            $qstr = '';
            $arraycount = count($darray);
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
        
        $fieldstr = implode(',', $this->fieldsarray);
        $stmt = 'insert into apartment ( '.$fieldstr.' ) values ( '.createInsertQuestionMarks($this->datarray).' )';
        new InsertData($stmt, $this->datarray, '');
 
    }
    
    
}
class Users
{
    var $username;
    var $password;
    function __construct($fData)
    {

        
        $this->username = $_POST['usernm'];
        $this->password = $_POST['password1'];

    }
    function createStmt()
    {
        return 'insert into users (username, password) values (?, ?)';
    }
    function runUsers()
    {
        if(($this->username == '' || $this->username == 'undefined' || $this->username == ' ')  ||  ($this->password == '' || $this->password == 'undefined' || $this->password == ' '))
        {
            
            echo '400';

        }
        else
        {

            new InsertData($this->createStmt(), [trim($this->username), password_hash($this->password, PASSWORD_BCRYPT)], '');
        }
        
    }
}
class Profile
{
    var $dataarray = array();
    var $fieldsarray = array();
    var $profilephoto;
    var $profilemappings = array('fname'=>'firstName','sname'=>'secondName','lname'=>'lastName','email'=>'email','phoneno'=>'phone','postaladdr'=>'postalAddress','idno'=>'idNo','roleid'=>'roleId','userid'=>'userID','useractive'=>'isActive');
    function __construct()
    {
         
         $this->profilephoto =  isset($_FILES['filename']['name']) && $_FILES['filename']['name'] != '' ? time().'_'.str_replace(' ', '_',$_FILES['filename']['name']) : '';
        
    }
    function setUpdateFields()
    {
        //check fields with value and add them to array
        foreach($this->profilemappings as $key => $value)
        {
            if($_REQUEST[$key] != '' && $_REQUEST[$key] != 'None')
            {
                array_push($this->dataarray, $_REQUEST[$key]);
                array_push($this->fieldsarray, $value);
            }
        }
        
    }
    function runProfileSql()
    {
        $this->setUpdateFields();
        $fieldstr = implode(',', $this->fieldsarray);
        $fieldstr .= ', profilePhoto';
        $stmt = 'insert into userdetails ( '.$fieldstr.' ) values ( '.createInsertQuestionMarks($this->dataarray).', ?)';
        array_push($this->dataarray, $this->profilephoto);
        
        new InsertData($stmt, $this->dataarray, $this->profilephoto);
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

            $newUser = new Users($_POST);
            $newUser->runUsers();

         }
         if($_GET['page'] == 'profile')
         {
            $newprofile = new Profile();
            $newprofile->runProfileSql();
         }
    }
    else
    {
        echo('400');
    }
}
}




?>