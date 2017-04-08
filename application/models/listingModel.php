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
}

?>
