<?php
session_start();
if(isset($_SESSION['user']))
{
require_once('../includes/dbconnection.php');
require_once('../includes/processimage.php');

class Company
{
    //database fields => website files
    var $companyfields = array(
      'companyName' => 'companyname',
       'vatPinId' => 'vatpin',
       'systemEmail' => 'systememail',
       'contactPerson' => 'contactperson',
       'telephone' => 'telephone',
       'mainLocation' => 'location',
       'postalAddress' => 'postaladdress',
       'mpesaNoId' => 'mpesamerchantid',
       'logoname' => 'imgnameplaceholder'
    );
    var $fieldstr = '';
    var $fieldquestion = '';
    var $updatestr = '';
    var $dataarray = array();
    var $connectdb;
    var $logo;
    function __construct()
    {
        $this->connectdb = DbConnector::returnconnection();
        $datagetter = $this->connectdb->query('select companyId from company');
        $coid = $datagetter->fetch(PDO::FETCH_ASSOC);
        $this->logo =  isset($_FILES['filename']['name']) ? time().'_'.str_replace(' ', '_',$_FILES['filename']['name']) : '';
        //companyId
        if(isset($_GET['op']))
        {
            $this->returnCompanyData();
        }
        else
        {
            if(count($_POST) > 0 || isset($_FILES['filename']['name']))
            {
                $this->createStmts($coid['companyId']); 
                if($coid['companyId'] != '')
                {
                   //update
             
                   $this->updateCompany($coid['companyId']);
                }
                else
                {
                    //insert
                    $this->saveCompany($coid['companyId']);
            
                }
             }
            
        }
        
        
           
            
    } 
    function saveCompany()
    {

        $query = 'insert into company ('.$this->fieldstr.') values ('.$this->fieldquestion.')';
        $preparedstmt = $this->connectdb->prepare($query);
        if($preparedstmt->execute($this->dataarray))
        {
            echo '200';
            if(isset($_FILES) && isset($_FILES['filename']['name']))
            {
               $imgprocess = new ProcessImage($_FILES, $this->logo, '../images/company/');
               $imgprocess->moveImg();
            }
        }
        else
        {
            echo '400';
        }
    }
    function updateCompany($comId)
    {
           
        $updatequery = 'update company set '.$this->updatestr.' where companyId ="'.$comId.'"'; 
        $preparedstmt = $this->connectdb->prepare($updatequery);
        if($preparedstmt->execute($this->dataarray))
        {
            echo '200';
            if(isset($_FILES) && isset($_FILES['filename']['name']))
            {
               $imgprocess = new ProcessImage($_FILES, $this->logo, '../images/company/');
               $imgprocess->moveImg();
            }
        }
        else
        {
            echo '400';
        }
        
    }
    function createStmts($comId)
    {
        
            $i = 0;
            foreach($this->companyfields as $key => $value)
            {
                
                if(isset($_POST[$value]))
                {    
                    $totalvalues = count($_POST);
                     
                      if($totalvalues > 1 && $i != $totalvalues - 1)
                      {
                         $this->fieldstr .= $key.', ';
                         $this->fieldquestion .= '?, ';
                         $this->updatestr .= $key.' = ?, ';
                         
                      }
                      if($i == $totalvalues - 1 || $totalvalues == 1)
                      {
                         $this->fieldstr .= $key;
                         $this->fieldquestion .= '?';
                         $this->updatestr .= $key.' = ?';
                      }
                      
                      array_push($this->dataarray, $_POST[$value]);
                      
                      
                      $i++; 
                    
                }
               
            }
           if(isset($_FILES) && isset($_FILES['filename']['name']))
           {
            if(count($_POST) > 0)
            {
            $this->fieldstr .= ' , logoname ';
            $this->fieldquestion .= ', ?';
            $this->updatestr .= ', logoname = ? '; 
            
            
          }
         else
         {
            $this->fieldstr .= ' logoname ';
            $this->fieldquestion .= ' ? ';
            $this->updatestr .= ' logoname = ? ';
            
         }
         
         array_push($this->dataarray, $this->logo); 
        } 
    }
    function returnCompanyData()
    {
        
        $dtgetter = $this->connectdb->query('select companyName ,vatPinId ,systemEmail,contactPerson,telephone ,mainLocation,postalAddress,mpesaNoId,logoname from company' );
        echo(json_encode($dtgetter->fetch(PDO::FETCH_NUM)));
    }
    
    
    
}

new Company();

}

?>