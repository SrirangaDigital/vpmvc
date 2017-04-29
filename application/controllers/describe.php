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

	public function authorArticles($authID) {

		$data = $this->model->db->getAuthorArticleList($authID);
		($data) ? $this->view('describe/authorArticles', $data) : $this->view('error/index');
	}

	public function feature($feature) {

		$data = $this->model->db->getFeatureArticleList($feature);
		($data) ? $this->view('describe/featureArticles', $data) : $this->view('error/index');
	}

	public function year($volume, $year) {

		$data = $this->model->db->getYearDetails($volume, $year);
		($data) ? $this->view('describe/year', $data) : $this->view('error/index');
	}
}

?>
