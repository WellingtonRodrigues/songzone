<?php

class VideoDTO{
	private $id;
	private $provider;
	private $providerVideoID;
	private $version;
	private $instrumentID;
	private $featured;
	private $artistName;
	private $songName;
	
	function __construct($id, $provider, $providerVideoID, $version, $instrumentID, $featured, $artistName, $songName){
		$this->id = $id;
		$this->name = $provider;
		$this->providerVideoID = $providerVideoID;
		$this->version = $version;
		$this->instrumentID = $instrumentID;
		$this->featured = $featured;
		$this->artistName = $artistName;
		$this->songName = $songName;
	}
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getProvider() {
		return $this->provider;
	}
	public function setProvider($provider) {
		$this->provider = $provider;
		return $this;
	}
	public function getProviderVideoID() {
		return $this->providerVideoID;
	}
	public function setProviderVideoID($providerVideoID) {
		$this->providerVideoID = $providerVideoID;
		return $this;
	}
	public function getVersion() {
		return $this->version;
	}
	public function setVersion($version) {
		$this->version = $version;
		return $this;
	}
	public function getInstrumentID() {
		return $this->instrumentID;
	}
	public function setInstrumentID($instrumentID) {
		$this->instrumentID = $instrumentID;
		return $this;
	}
	public function getFeatured() {
		return $this->featured;
	}
	public function setFeatured($featured) {
		$this->featured = $featured;
		return $this;
	}
	public function getArtistName() {
		return $this->artistName;
	}
	public function setArtistName($artistName) {
		$this->artistName = $artistName;
		return $this;
	}
	public function getSongName() {
		return $this->songName;
	}
	public function setSongName($songName) {
		$this->songName = $songName;
		return $this;
	}
}