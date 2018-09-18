<?php

require 'dbconfig.php';

const CONSUMER_KEY = '80613-1e78f4859bf18a4fd2acd8b0';

try
{
	$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";";
	$con = new PDO($dsn,DB_USER,DB_PASS);
	$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
	echo $e->getMessage();
}

function queryPDOMysql($query)
{
    global $con;
	try
	{
		$result = $con->query($query);
		return $result;
	}
   	catch (PDOException $e)
	{
		echo $e->getMessage();
		return false;
	}

}
