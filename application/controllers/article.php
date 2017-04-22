<?php

class article extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function index() {

		$this->fulltext();
	}
	
	public function download($articleID) {
		
		// Flush files created more than 10 minutes ago
		exec('find ' . PHY_READWRITE_URL . ' -mmin +10 -type f -name "*.pdf" -exec rm {} \;');
	
		$dbh = $this->model->db->connect(DB_NAME);
		$data = $this->model->db->articleDetails($articleID, METADATA_TABLE_L2 , METADATA_TABLE_L3, $dbh);
		$path = $this->model->writePDF($data);
		$this->absoluteRedirect($path);
	}
}
?>
