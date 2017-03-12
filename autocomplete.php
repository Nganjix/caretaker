<?php
session_start();
if(isset($_SESSION['user']))
{ 

require_once('includes/dbconnection.php');
$connectdb = DbConnector::returnconnection();
if(isset($_GET['page']) && !empty($_GET['page']))
{
    //get data from db
    function getTermInDb($sqlstmt){
        global $connectdb;
        $dataPrepareAndGet = $connectdb ->query($sqlstmt);
        $dataPrepareAndGet->setFetchMode(PDO::FETCH_NUM);
        return $dataPrepareAndGet;
    }
    $termRequest = trim($_GET['term']);
    if($_GET['page'] == 'tenant')
    {
        if(isset($_GET['term']) && !empty($_GET['term']))
        {
            
            $getData = "select id, firstName, secondName from tenant where firstName LIKE '%".$termRequest."%' ORDER BY firstName asc LIMIT 10";
            //where firstName LIKE %".$termRequest."% LIMIT 10, ORDER BY firstName asc
            $newarray1 = array();
            $datavar = getTermInDb($getData);
            while ($row = $datavar->fetch()) 
            {
                array_push($newarray1, $row[0].". ".$row[1]." ".$row[2]);
            }
         }
         //echo $_GET['term'];
         echo json_encode($newarray1);
    }
     if($_GET['page'] == 'apartments')
     {
            $sqlstmt = 'select a.aprtName, b.blockName, c.estateName from apartment a left join blocks b on a.blockid = b.blockid left join estates c on b.estateid = c.estateid where a.aprtName like "%'.$termRequest.'%" Order by a.aprtName asc LIMIT 10';       
            $aprtarray = array();
            $aprtdatavar = getTermInDb($sqlstmt);
            while ($row = $aprtdatavar->fetch()) 
            {
                $extradet = '';
                if($row[1] != null && $row[1] != '')
                {
                    $extradet .= $row[1].' '.$row[2]; 
                }
                array_push($aprtarray, $row[0].' '.$extradet);
            }
         
         //echo $_GET['term'];
         echo json_encode($aprtarray);
     }
     if($_GET['page'] == 'users')
    {
        if(isset($_GET['term']))
        {
            $sqlstmt = 'select username from users where username like "%'.$termRequest.'%"';
            $usrarray = array();
            $usrdtvar = getTermInDb($sqlstmt);
            while($row = $usrdtvar->fetch())
            {
                array_push($usrarray, $row[0]);
            }
            echo json_encode($usrarray);
        }
    }    
    }
    
}

?>