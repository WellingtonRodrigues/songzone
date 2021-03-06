<?php

class Services extends Controller{
	function getArtists(){
		if(!isset($_POST["query"]) OR empty($_POST["query"])) return;
		
		require_once '../app/models/ArtistDAO.php';
		$dao = new ArtistDAO();
		
		$artists = $dao->getArtists($_POST["query"]);
		
		$r = array();
		foreach ($artists as $artist){
			array_push($r, array("id" => $artist->getID(), "name" => $artist->getName()));
		}
		
		echo json_encode($r);
	}
	
	function getSongs(){
		if(!isset($_POST["query"]) OR empty($_POST["query"])) return;
		
		require_once '../app/models/SongDAO.php';
		$dao = new SongDAO();
		
		$songs = $dao->getSongs($_POST["query"]);
		
		$r = array();
		foreach ($songs as $song){
			array_push($r, array("id" => $song->getId(), "name" => $song->getSongName() . " (" . $song->getArtistName() . ") "));
		}
		
		echo json_encode($r);
	}
	
	function getProviderId(){
		require_once '../app/models/VideoDAO.php';
		$dao = new VideoDAO();
		
		$id = $_POST["id"];
		
		$providerVideoID = $dao->getProviderVideoId($id);
		
		if($providerVideoID){
			header('Content-type: application/json');
			$resposta = array("status" => 'success', "providerVideoID" => $providerVideoID);
			echo json_encode($resposta);
			exit;
		}
		else{
			header('Content-type: application/json');
			$resposta = array("status" => 'error');
			echo json_encode($resposta);
			exit;
		}
	}
	
	function getPlaylist(){
		session_start();
		
		require_once '../app/models/VideoDAO.php';
		$dao = new VideoDAO();
		
		$playlist = array();
		foreach ($_SESSION["playlist"]["videos"] as $videoID){
			array_push($playlist, $dao->getVideo($videoID));
		}
		
		echo json_encode($playlist);
	}
	
	function addToPlaylist(){
		session_start();
		$videoID = $_POST["videoID"];
		//TODO: check videoID
		
		array_push($_SESSION["playlist"]["videos"], $videoID);
	}
	
	function updatePlaylist(){
		session_start();
		$videos = $_POST["videos"];
		
		//TODO: check videos
		
		$_SESSION["playlist"]["videos"] = $videos;
	}
}