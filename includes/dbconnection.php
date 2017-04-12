<?php
/**
* 3307 - mysql port
*/
class DbConnector
{
	
	public static function returnconnection()
	{
		try 
		{
		$handler = new PDO('mysql:host=localhost;dbname=caretaker;charset=utf8', 'root', '', [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES   => false]);
		$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		 if($handler)
         {
     	    return $handler;
         }
	    }
	       catch(PDOException $e)
	       {
	       	echo $e->getMessage();
	       	die();
	       	return FALSE;
	       }
     }
}
//prepare statement
// $sql= "select * from tablename where id = ? and name = ?
//$query = $connector->prepare($sql)
//$query->execute(array($id, $name));
?>