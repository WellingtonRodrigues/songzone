<?php

class SongDTO{
	private $id;
	private $songName;
	private $artistName;
	
	function __construct($id, $songName, $artistName){
		$this->id = $id;
		$this->songName = $songName;
		$this->artistName = $artistName;
	}
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getSongName() {
		return $this->songName;
	}
	public function setSongName($songName) {
		$this->songName = $songName;
		return $this;
	}
	public function getArtistName() {
		return $this->artistName;
	}
	public function setArtistName($artistName) {
		$this->artistName = $artistName;
		return $this;
	}
}