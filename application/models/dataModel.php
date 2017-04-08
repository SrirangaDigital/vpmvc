<?php

class dataModel extends Model {

	public function __construct() {

		parent::__construct();
	}
	
	public function getXMLData($dbh) {
		
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
					$row['authid'] = 0;
					
					if($entry->allauthors->author != "")
						$row['authid'] = $this->db->authorID(METADATA_TABLE_L1, $dbh, $authDetails);
					
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
	
	public function getOcrData() {
		
		$data = array();
		$volumes = glob(PHY_TXT_URL . "*", GLOB_ONLYDIR);
		foreach ($volumes as $volume) {
			
			$issues = glob($volume . "/*", GLOB_ONLYDIR);
			foreach ($issues as $issue) {
				
				$files = glob($issue . "/*.txt");
				foreach($files as $file) {
					
					$row = array();
					$array = explode("/" , str_replace(PHY_TXT_URL, '', $file));
					$row['volume'] = $array[0];
					$row['issue'] = $array[1];
					$row['cur_page'] = str_replace(".txt", "", $array[2]);
					$row['text'] = NULL;
					array_push($data, $row);
				}
			}
		}
		return $data;
	}
}

?>
