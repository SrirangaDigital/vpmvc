<?php

class dataModel extends Model {

	public function __construct() {

		parent::__construct();
	}
	
	public function getData($dbh) {
		
		$fileName = XML_SRC_URL . 'source.xml';
		
		if (!(file_exists(PHY_XML_SRC_URL . 'source.xml'))) {
			
			return False;
		}
		
		$xml = simplexml_load_file($fileName);
		$data = [];
		
		foreach ($xml->volume as $volume) {
			
			foreach ($volume->issue as $issue) {
						
				$authDetails = array();
				foreach ($issue->entry as $entry) {
					
					$row['theme'] = $issue['theme'];
					$row['title'] = $entry->title;
					$row['feature'] = $entry->feature;
					$row['text'] = $entry->text;
					
					$authDetails['authorname'] = $entry->allauthors->author;
					$authDetails['salutation'] = $entry->allauthors->author['salut'];
					
					if($entry->allauthors->author != ""){
						
						$row['authid'] = $this->db->getAuthorID(METADATA_TABLE_L1, $dbh, $authDetails);
					}
					else{
						
						$row['authid'] = 0;
					}
					
					$row['volume'] = $volume['vnum'];
					$row['year'] = $issue['year'];
					$row['month'] = $issue['month'];
					$row['issue'] = $issue['inum'];
					$row['page'] = $entry->page;
					
					array_push($data, $row);
					$row = [];
				}
			}
		}
		return $data;
	}
}

?>
