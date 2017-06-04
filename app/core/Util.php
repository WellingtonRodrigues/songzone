<?php

class Util{
	private static $errors = array(
		"DB01"	=> "Failed to connect to the database"
	);
	
	static function getErrorMessage($errorId){
		if(isset(self::$errors[$errorId]))
			return self::$errors[$errorId];
		else
			return "Something went wrong";
	}
	
	static function registerLog($action, $message){
		
	}
}