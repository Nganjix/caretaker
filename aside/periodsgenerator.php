<?php
require_once('includes/dbconnection.php');
class PeriodGenerator
{
    var $query = 'insert into paymentperiods (periodName, periodDesc, startDay, lastDay, year) values (?,?,?,?,?)';
    var $dt;
    function __construct($insertyr)
    {
        $febdays = date('L', strtotime("$insertyr-01-01")) ? 29 : 28;
        
        $this->dt = [[1, "january", 1, 31, $insertyr],[2, "february", 1, $febdays, $insertyr],[3, "march", 01, 31, $insertyr],
                [4, "april", 01, 30, $insertyr],[5, "may", 1, 31, $insertyr],[6, "june", 01, 30, $insertyr],
                [7, "july", 1, 31, $insertyr],[8, "august", 1, 31, $insertyr],[9, "september", 1, 30, $insertyr],[10, "october", 1, 31, $insertyr],[11, "november", 1, 30, $insertyr],[12, "december", 1, 31, $insertyr]];
        
    }
    function createNewPeriods()
    {
        $conn = Dbconnector::returnconnection();
        $conn->beginTransaction();
        foreach($this->dt as $row)
        {
            $preparedqry= $conn->prepare($this->query);
            try
            {
              $affectedrows =  $preparedqry->execute($row);
            }
            catch(PDOException $ex)
            {
                echo $ex->getMessage();
            }
        }
        $conn->commit();
        return $affectedrows;
    }
}


?>