<?php

class Home extends Controller{
	function index(){
		session_start();
		if(!isset($_SESSION["playlist"])) $_SESSION["playlist"] = array("videos" => array(), "nowPlaying" => 0);
		
		require_once '../app/models/VideoDAO.php';
		$videoDAO = new VideoDAO();
		
		$featuredVideos = $videoDAO->getFeaturedVideos();
		
		$this->view("common/header");
		$this->view("home/index", array("featuredVideos" => $featuredVideos));
		$this->view("common/footer");
	}
	
	function videos(){
		$category = $_POST["category"];
		$id = $_POST["id"];
		
		require_once '../app/models/VideoDAO.php';
		$videoDAO = new VideoDAO();
		
		$videos = $videoDAO->getVideos($id, $category);
		
		$this->view("home/videos", array("videos" => $videos));
	}
	
	function listArtists(){
		require_once '../app/models/ArtistDAO.php';
		
		$dao = new ArtistDAO();
		
		$artists = $dao->getArtists();
		
		foreach ($artists as $artist){
			echo $artist->getName() . "<br>";
		}
	}
	
	function getMusics($artistID = null){
		require_once '../app/models/MusicDAO.php';
		
		$dao = new MusicDAO();
		
		$musics = $dao->getMusicsbyArtist($artistID);
		
		foreach ($musics as $music){
			echo $music->getName() . "<br>";
		}
	}
	
	function getVideos(){
		require_once '../app/models/VideoDAO.php';
		
		$dao = new VideoDAO();
		
		$musicID = 8;
		$version = null;
		$instrumentID = 2;
		
		$videos = $dao->getVideos($musicID, $version, $instrumentID);
		
		foreach ($videos as $video){
			echo "ID : " . $video->getID() . "<br>";
			echo "Provider : " . $video->getProvider() . "<br>";
			echo "ProviderVideoID : " . $video->getProviderVideoID() . "<br>";
			echo "MusicID : " . $video->getMusicID() . "<br>";
			echo "Version : " . $video->getVersion() . "<br>";
			echo "InstrumentID : " . $video->getInstrumentID() . "<br><br>";
		}
	}
}