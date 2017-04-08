<?php


class download extends Controller {

	public function __construct() {
		
		parent::__construct();
	}
	
	public function article($articleID) {
		
		$dbh = $this->model->db->connect(DB_NAME);
		$data = $this->model->db->articleDetails($articleID, METADATA_TABLE_L2 , METADATA_TABLE_L3, $dbh);
		$data['pages'] = $this->model->db->getArticlePageList($data, METADATA_TABLE_L3, $dbh);
		$this->model->generatePdf();
	}
}

?>
