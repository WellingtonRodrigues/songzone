<?php

class InstrumentDAO{
	function getInstruments(){
		require_once '../app/core/Database.php';
		require_once 'InstrumentDTO.php';
		
		$db = Database::getConnection();
		
		try {
			$query = $db->prepare("SELECT * FROM instrument");
			$query->execute();
			$rows = $query->fetchAll(PDO::FETCH_ASSOC);
		
			$instruments = array();
			foreach ($rows as $row){
				$id = $row["instrument_id"];
				$name = $row["instrument_name"];
		
				$instrument = new InstrumentDTO($id, $name);
				array_push($instruments, $instrument);
			}
				
			return $instruments;
				
		} catch(PDOException $ex) {
			return false;
		}
	}
}