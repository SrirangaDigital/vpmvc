<?php

class data extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function insertDetails(){

		$this->model->db->createDB(DB_NAME, DB_SCHEMA);
		$dbh = $this->model->db->connect(DB_NAME);
		
		$this->model->db->dropTable(METADATA_TABLE_L1, $dbh);
		$this->model->db->createTable($dbh, METADATA_TABLE_L1_SCHEMA);
		$this->model->db->dropTable(METADATA_TABLE_L2, $dbh);
		$this->model->db->createTable($dbh, METADATA_TABLE_L2_SCHEMA);
		$this->model->db->dropTable(METADATA_TABLE_L3, $dbh);
		$this->model->db->createTable($dbh, METADATA_TABLE_L3_SCHEMA);
		
		$data = $this->model->getXMLData($dbh);
		
		foreach ($data as $row){
			
			$this->model->db->insertData(METADATA_TABLE_L2, $dbh, $row);
		}
		
		
		$data = array();
		$data = $this->model->getOcrData();
		
		foreach ($data as $row){
			
			$this->model->db->insertData(METADATA_TABLE_L3, $dbh, $row);
		}
		
		echo "Data Inserted<br/>";
	}
	
	public function getData(){
		
		$dbh = $this->model->db->connect(DB_NAME);
		$data = $this->model->db->getLatestIssueDetails(METADATA_TABLE_L2,$dbh);
		$this->view('flat/Home',$data);
	}
}

?>
