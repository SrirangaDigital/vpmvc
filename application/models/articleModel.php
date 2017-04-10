<?php

class articleModel extends Model {

	public function __construct() {

		parent::__construct();
	}
	
	public function writePDF($data){
		
		$resourceURL = '';
		foreach($data['page'] as $page){
			
			$resourceURL .= PHY_PDF_URL . $data['volume'] . "/" . $data['issue'] . "/" . $page . ".pdf ";
		}
		
		$downloadURL = PHY_READWRITE_URL . $data['volume'] . "_" . $data['issue'] . "_" . reset($data['page']) . "_" . end($data['page']) . ".pdf";
		exec("pdftk " . $resourceURL . " cat output " . $downloadURL);
		return str_replace(PHY_READWRITE_URL, READWRITE_URL , $downloadURL);
		
	}
}

?>
