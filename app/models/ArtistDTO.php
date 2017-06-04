<?php

class ArtistDTO{
	private $id;
	private $name;
	private $genreID;
	
	function __construct($id, $name, $genreID){
		$this->id = $id;
		$this->name = $name;
		$this->genreID = $genreID;
	}
	
	function getID(){
		return $this->id;
	}
	
	function getName() {
		return $this->name;
	}
	
	function getGenreID(){
		return $this->genreID;
	}
}