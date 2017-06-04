<?php

class SongDAO{
	function getSongs($key = null){
		require_once '../app/core/Database.php';
		require_once 'SongDTO.php';
		
		$db = Database::getConnection();
		
		try {
			if(is_null($key)){
				$query = $db->prepare("SELECT * FROM song INNER JOIN artist ON song.artist_id = artist.artist_id");
			}
			else{
				$key = "%" . $key . "%";
				$query = $db->prepare("SELECT * FROM song INNER JOIN artist ON song.artist_id = artist.artist_id WHERE song_name LIKE :songName");
				$query->bindParam(":songName", $key);
			}

			$query->execute();
			$rows = $query->fetchAll(PDO::FETCH_ASSOC);
				
			$songs = array();
			foreach ($rows as $row){
				$id = $row["song_id"];
				$name = $row["song_name"];
				$artistName = $row["artist_name"];
		
				$song = new SongDTO($id, $name, $artistName);
				array_push($songs, $song);
			}
		
			return $songs;
		
		} catch(PDOException $ex) {
			return false;
		}
	}
	
	function getMusicsbyArtist($artistID = null){
		if(!is_null($artistID)){
			require_once '../app/core/Database.php';
			require_once 'SongDTO.php';
			
			$db = Database::getConnection();
			
			try{
				$query = $db->prepare("SELECT * FROM music WHERE artistID = :artistID");
				$query->bindParam(':artistID', $artistID, PDO::PARAM_INT);
				$query->execute();
				$rows = $query->fetchAll(PDO::FETCH_ASSOC);
			
				$musics = array();
				foreach ($rows as $row){
					$id = $row["id"];
					$name = $row["name"];
			
					$music = new SongDTO($id, $name, $artistID);
					array_push($musics, $music);
				}

				return $musics;			
			}
			catch(PDOException $ex) {
				//TODO: Add error to log
				//TODO: Inform error to front-end
			}
		}
		else{
			echo 'artist ID is null';
		}
	}
}