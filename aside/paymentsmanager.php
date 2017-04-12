<?php
require_once('includes/dbconnection.php');
require_once('aside/periodsgenerator.php');
class PayDatabaseHandler
{
    var $dbconnect;
    function __construct()
    {
        $this->dbconnect = DbConnector::returnconnection();
    }
    function returnQueryDt($query)
    {
        return $this->dbconnect->prepare($query);
    }
    
    
    
}
class RecordDetails extends PayDatabaseHandler
{
    //checks if record is approved
    var $tenantid; //gets tenantid
    var $recordstatus;//approved will initiate addition revert will initiate deduction
    var $monthlybill;//gets monthly bill from tenant
    var $periodisactive; //checks if period in cumulative amounts is active 
    var $paidamount = 0;
    var $periodid = '';
    var $periodname = '';
    var $year = '';
    var $elecamt = 0;
    var $waterbill = 0;
    var $extracosts = 0;
    
    public function __construct()
    {
        parent::__construct();
        $this->tenantid = isset($_REQUEST['tenantselect']) ? $_REQUEST['tenantselect'] : '';
        $this->recordstatus = isset($_REQUEST['statusselect']) ? $_REQUEST['statusselect'] : '';
        $this->paidamount = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : 0;
        $this->periodid = isset($_REQUEST['paymentprds']) ? $_REQUEST['paymentprds'] : '';
        $this->elecamt = isset($_REQUEST['elecbill']) ? $_REQUEST['elecbill'] : 0;
        $this->waterbill = isset($_REQUEST['waterbill']) ? $_REQUEST['waterbill'] : 0;
        $this->extracosts = isset($_REQUEST['addcbill']) ? $_REQUEST['addcbill'] : 0;
        
    }
    public function setPeriodYearName()
    {
        $stmt = 'select periodName, year from paymentperiods where Id = ?';
        $pddata = $this->returnQueryDt($stmt)->execute([$this->periodid]);
        $queried = $pddata->fetch(PDO::FETCH_NUM);
        if($queried)
        {
            $this->periodname = $queried[0];
            $this->year = $queried[1];
        }
        
    } 
    public function setMonthlyBill()
    {
        if($this->tenantid != '')
        {
            $stmt = 'select monthlyrent from tenant where id = ?';
            $dt = $this->returnQueryDt($stmt)->execute([$this->tenantid]);
            $this->monthlybill = $dt->fetchColumn();
        }
        
    }
    
    public function createNewPeriod()
    {
        if($this->periodname <= 12)
        {
          $insertstmt =  'insert into cumulativepayments (paymentperiod, tenantid, active, year, cumullamt, eleccost, watercost, extracosts) values (?,?,?,?,?,?,?,?)';
          $prepareddt = $this->dbconnect->prepare($insertstmt);
          if($prepareddt->execute([$this->periodname, $this->tenantid, $this->periodisactive, $this->year, $this->paidamount, $this->elecamt, $this->waterbill, $this->extracosts]))
          {
            echo('inserted successfully');
          } 
          else
          {
            echo('error ocurred when adding payment to system');
          } 
        }
        else
        { 
            //populate next years periods
            $periodGenObj = new PeriodGenerator($this->year + 1);
            $this->periodname = 1;
            $this->year += 1;
                        
        }
        
    }

}
class PaymentCalculations extends RecordDetails
{
    //performs the calcations to the payments table
    var $previouspayment = 0; ///tenant had paid but not full amount
    var $prevelecbill = 0;
    var $prevwaterbill = 0;
    var $prevextracosts = 0;
    var $totalamt = 0;
    var $cumulativeid;
    var $numofmonths;
    var $periodexists;
    public function __construct()
    {
        parent::__construct();
        $this->setMonthlyBill();
        $this->setPeriodYearName();
        $this->checkPaidAmount();
        $this->setCheckPeriodExists();
        
        
    }
    public function addToCumulative($activationstatus)
    {
        //add payment to cumulative payment
            if($this->periodexists && $this->periodisactive && $activationstatus)
            {
                $stmt = 'update cumulativepayments set active = ?, cumullamt = ?, eleccost = ? , watercost = ? , extracosts = ? where paymentperiod = ? and tenantid = ? and year = ?';
                $data = [$activationstatus, $this->totalamt, $this->prevelecbill + $this->elecamt, $this->prevwaterbill + $this->waterbill, 
                $this->prevextracosts + $this->extracosts, $this->periodname, $this->tenantid, $this->year];
                $dtthings = $this->returnQueryDt($stmt)->execute($data);
                if($dtthings->rowCount()) echo('amount updated successfully');
            }
            else
            {
                //create new period
                
                if($activationstatus)
                {
                    //if activation status is true we wont increment period
                    $this->createNewPeriod();
                }
                else
                {
                    $this->elecamt = 0;
                    $this->waterbill = 0;
                    $this->extracosts = 0;
                    $this->periodisactive = false;
                    $this->createNewPeriod();
                    $this->periodname += 1;
                }
                
            
            }
        
        
        
    }
    public function deductFromCumulative()
    {
        //add payment to cumulative payment
    }
    public function  setCheckPeriodExists()
    {
        if($this->periodid != '' )
        {
            $stmt = 'select b.active, b.id, b.cullamt, b.eleccost, b.watercost, b.extracosts  from  cumulativepayments b where b.paymentperiod = ? and b.year = ? and b.tenantid = ?';
            $dtgetter = $this->returnQueryDt($stmt)->execute([$this->periodname, $this->year], $this->tenantid);
            $periodDt = $dtgetter->fetch(PDO::FETCH_ASSOC);
            if($periodDt)
            {
                $this->periodexists = true;
                $this->periodisactive = $periodDt['active'];
                $this->cumulativeid = $periodDt['id'];
                $this->previouspayment = $periodDt['cullamt'];
                $this->prevelecbill = $periodDt['eleccost'];
                $this->prevwaterbill =$periodDt['watercost'];
                $this->prevextracosts = $periodDt['extracosts'];
                          
            
            }
            else
            {
                //no period exists
                $this->periodexists = false; //add new period
            }
            
            //things to check -> when user enters adds  rent
            // first take the amount and divide it by rent see the number of months 
            //then if amount more than a months rent, add to 1st month, set it to inactive, add second month set it to inactive e.t.c
           
        }
    }
    public function checkPaidAmount()
    {
        $this->totalamt = $this->paidamount + $this->previouspayment;
        $this->numofmonths = $this->monthlybill > 0 ? round((float)(($this->totalamt)/$this->monthlybill), 2) : 0;
        //$additionalamt = $this->paidamount - ((int)$numofmonths * $this->monthlybill);//check additional amt adnd append 
    }
    public function runPaymentProcess()
    {
        if($this->perioname != '' && $this->tenantid != '' && $this->year != '' && $paidamount >= 0)
        {
               
               
               if($this->numofmonths > 0 && $this->numofmonths < 1)
               {
                       $this->addToCumulative(true);
               }
               else if($this->numofmonths == 1)
               {
                      $this->addToCumulative(false);
               }
               else
               {
                      
                      while($numofmonths > 1)
                       {
                        $this->addToCumulative(false);
                        $this->numofmonths -= 1;
                        $this->totalamt -= $this->monthlybill;
                        runPaymentProcess();
                       }
                         
                       
               }
        }
            
        
    }
    /*if($this->periodisactive)
                {
                    
                    $this->addToCumulative();
                }  
                else
                {
                    //if record exists but no period is active create new period
                    if($this->perioname != 12)
                    {
                        $this->perioname += 1;
                        $this->createNewPeriod();
                    }
                }
    */

}



?>