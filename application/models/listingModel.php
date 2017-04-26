<?php


class listingModel extends Model {

	public function __construct() {

		parent::__construct();
	}

	public function listVolumes() {
		
		return $this->db->getVolumes();
	}
	
	public function listIssue($volume, $year) {
		
		return $this->db->getIssues($volume, $year);
	}

	public function getArticles($character) {
		
		return $this->db->getArticleList($character);
	}

	public function getAuthors($character) {
		
		return $this->db->getAuthorsList($character);
	}

	public function getFeatures(){

		return $this->db->getFeaturesList();
	}
}

?>
