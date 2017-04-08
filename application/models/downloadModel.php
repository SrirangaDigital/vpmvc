<?php

class downloadModel extends Model {

	public function __construct() {

		parent::__construct();
	}
	
	public function generatePdf($data){
		
		$pages = $this->db->getPageRang($data);
		list($pageStart, $pageEnd) = split("-",$data['page']);
		
	}
}

?>
