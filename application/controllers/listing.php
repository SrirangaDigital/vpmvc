<?php


class listing extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function index() {

	}
	
	public function volumes() {

		$data = $this->model->listVolumes();
		($data) ? $this->view('listing/volumes', $data) : $this->view('error/index');
	}
	
	public function issue($volume, $year) {

		$data = $this->model->listIssue($volume, $year);
		($data) ? $this->view('listing/issue', $data) : $this->view('error/index');
	}
	
	public function articles($character = '') {

		$data = $this->model->getArticles($character);
		($data) ? $this->view('listing/articles', $data) : $this->view('error/index');
	}
	
}

?>
