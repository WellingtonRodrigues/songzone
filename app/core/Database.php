<?php

class Database{
	private static $username = "root";
	private static $password = "";
	
	static function getConnection(){
		try{
			$db = new PDO('mysql:host=localhost;dbname=coverzone;charset=utf8',
						  self::$username, self::$password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			return $db;
		}
		catch(PDOException $ex){
		    echo $ex->getMessage();
		}
	}
}