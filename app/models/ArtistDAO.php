<?php

class ArtistDAO{
	function getArtists($key){
		require_once '../app/core/Database.php';
		require_once 'ArtistDTO.php';
		
		$db = Database::getConnection();
		
		$key = "%" . $key . "%";
		try {
			$query = $db->prepare("SELECT * FROM artist WHERE artist_name LIKE :artistName");
			$query->bindParam(":artistName", $key);
			$query->execute();
			$rows = $query->fetchAll(PDO::FETCH_ASSOC);
			
			$artists = array();
			foreach ($rows as $row){
				$id = $row["artist_id"];
				$name = $row["artist_name"];
				$genreID = $row["genre_id"];
		
				$artist = new ArtistDTO($id, $name, $genreID);
				array_push($artists, $artist);
			}
				
			return $artists;
				
		} catch(PDOException $ex) {
			return false;
		}
	}
}