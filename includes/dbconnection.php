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
		$handler = new PDO('mysql:host=localhost;dbname=caretaker', 'root', '');
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