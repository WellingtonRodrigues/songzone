<?php

class VideoDAO{
	function getProviderVideoId($id){
		if(!$id) return false;
		
		require_once '../app/core/Database.php';
		
		$db = Database::getConnection();
		
		try {
				
			$query = "SELECT providerVideoID FROM `video` WHERE video_id = :id";
				
			$query = $db->prepare($query);
			$query->bindParam(":id", $id, PDO::PARAM_INT);
			$query->execute();
			
			return $query->fetchAll(PDO::FETCH_ASSOC)[0]["providerVideoID"];			
		
		} catch(PDOException $ex) {
			return false;
		}
		
	}
	
	function getVideos($id, $category){
		
		if(!$id) return false;
		
		require_once '../app/core/Database.php';
		require_once 'VideoDTO.php';
		
		$db = Database::getConnection();
		
		try {
			
			if($category == "a"){
				$query = "SELECT * FROM `video` INNER JOIN `song` ON video.song_id = song.song_id INNER JOIN `artist` ON artist.artist_id = song.artist_id WHERE artist.artist_id = :id LIMIT 6";
			}
			else{
				$query = "SELECT * FROM `video` INNER JOIN `song` ON video.song_id = song.song_id INNER JOIN `artist` ON artist.artist_id = song.artist_id WHERE song.song_id = :id LIMIT 6";
			}
			
			$query = $db->prepare($query);
			$query->bindParam(":id", $id, PDO::PARAM_INT);
			$query->execute();
			$rows = $query->fetchAll(PDO::FETCH_ASSOC);
			
			$videos = array();
			foreach ($rows as $row){
				$id = $row["video_id"];
				$provider = $row["provider"];
				$providerVideoID = $row["providerVideoID"];
				$version = $row["version"];
				$instrumentID = $row["instrument_id"];
				$featured = $row["featured"];
				$artistName = $row["artist_name"];
				$songName = $row["song_name"];
			
				$video = new VideoDTO($id, $provider, $providerVideoID, $version, $instrumentID, $featured, $artistName, $songName);
				array_push($videos, $video);
			}
			
			return $videos;
				
		
		} catch(PDOException $ex) {
			return false;
		}
	}
	
	function getFeaturedVideos(){
		require_once '../app/core/Database.php';
		require_once 'VideoDTO.php';
		
		$db = Database::getConnection();
		
		try {
			$query = $db->prepare("SELECT * FROM `video` INNER JOIN `song` ON video.song_id = song.song_id INNER JOIN `artist` ON artist.artist_id = song.artist_id WHERE featured = 1");
				
			$query->execute();
			$rows = $query->fetchAll(PDO::FETCH_ASSOC);
			
			if($query->rowCount() >= 9){
				$limit = 9;
			}
			else{
				$limit = $query->rowCount();
			}

			$indexes = array_rand($rows, $limit); // erro aqui
			
			$chosenRows = array();
			foreach ($indexes as $index){
				array_push($chosenRows, $rows[$index]);
			}

			$videos = array();
			foreach ($chosenRows as $row){
				$id = $row["video_id"];
				$provider = $row["provider"];
				$providerVideoID = $row["providerVideoID"];
				$version = $row["version"];
				$instrumentID = $row["instrument_id"];
				$featured = $row["featured"];
				$artistName = $row["artist_name"];
				$songName = $row["song_name"];
				
				$video = new VideoDTO($id, $provider, $providerVideoID, $version, $instrumentID, $featured, $artistName, $songName);
				array_push($videos, $video);
			}

			return $videos;
		
		} catch(PDOException $ex) {
			return false;
		}
	}
	
	function addVideo($providerVideoID, $songID, $instrumentID){
		require_once '../app/core/Database.php';
		
		$db = Database::getConnection();
		
		try {
			$query = $db->prepare("INSERT INTO `video` (`provider`, `providerVideoID`, `song_id`, `instrument_id`, `featured`) VALUES ('youtube', :providerVideoID, :songID, :instrumentID, 0)");
			$query->bindParam(":providerVideoID", $providerVideoID, PDO::PARAM_STR);
			$query->bindParam(":songID", $songID, PDO::PARAM_INT);
			$query->bindParam(":instrumentID", $instrumentID, PDO::PARAM_INT);
		
			if($query->execute())
				return true;
			return false;
		
		} catch(PDOException $ex) {
			return false;
		}
	}
}