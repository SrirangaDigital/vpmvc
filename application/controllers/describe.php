<?php

class describe extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function index() {

	}

	public function issue($volume, $issue, $year, $month) {
		
		$data = $this->model->db->getTOC($volume, $issue, $year, $month, METADATA_TABLE_L2);
		
		($data) ? $this->view('describe/issue', $data) : $this->view('error/index');
	}
}

?>
