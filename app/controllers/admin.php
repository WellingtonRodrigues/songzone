<?php

class Admin extends Controller{
	function index(){
		if(isset($_POST["link"])){
			require_once '../app/models/VideoDAO.php';
			$dao = new VideoDAO();
				
			$link = $_POST["link"];
			$songID = $_POST["song"];
			$instrumentID = $_POST["instrument"];
				
			parse_str( parse_url( $link, PHP_URL_QUERY ), $varsArray );
			$providerVideoID = $varsArray["v"];
				
			$dao->addVideo($providerVideoID, $songID, $instrumentID);
		}
		
		require_once '../app/models/InstrumentDAO.php';
		require_once '../app/models/SongDAO.php';
		$insDAO = new InstrumentDAO();
		$songDAO = new SongDAO();
		
		$instruments = $insDAO->getInstruments();
		$songs = $songDAO->getSongs();
		
		$this->view("common/header");
		$this->view("admin/index", array("instruments" => $instruments, "songs" => $songs));
		$this->view("common/footer");
	}
}