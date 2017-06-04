<?php

class GenreDAO{
	function getGenres(){
		require_once '../app/core/Database.php';
		require_once 'GenreDTO.php';
		
		$db = Database::getConnection();
		
		try {
			$query = $db->prepare("SELECT * FROM genre");
			$query->execute();
			$rows = $query->fetchAll(PDO::FETCH_ASSOC);
		
			$genres = array();
			foreach ($rows as $row){
				$id = $row["id"];
				$name = $row["name"];
		
				$genre = new GenderDTO($id, $name);
				array_push($genres, $genre);
			}
				
			return $genres;
				
		} catch(PDOException $ex) {
			//TODO: Add error to log
			//TODO: Inform error to front-end
		}
	}
}