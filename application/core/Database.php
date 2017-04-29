<?php

class Database extends PDO {

	public function __construct() {
	
	}

	public function connect($db) {

		$db = $this->prependDB($db);
		if(!(defined($db . '_USER'))) {
		    
		    return null;
		}

		try {
		    $dbh = new PDO('mysql:host=' . DB_HOST . ';dbname=' .  $db, constant($db . '_USER'), constant($db . '_PASSWORD'));
		    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		    $sth = $dbh->prepare(CHAR_ENCODING_SCHEMA);
			$sth->execute();

		    return $dbh;
		}
		catch(PDOException $e) {
		    // echo $e->getMessage();
		    return null;
	    }
	}

	public function createDB($db, $schema) {

		$db = $this->prependDB($db);
		//~ echo $db;
		try {
		    $dbh = new PDO('mysql:host=' . DB_HOST . ';', constant($db . '_USER'), constant($db . '_PASSWORD'));
		    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    
		    $schema = str_replace(':db', $db, $schema);

			$sth = $dbh->prepare($schema);
			$sth->execute();
		}
		catch(PDOException $e) {
		    echo $e->getMessage();
	    }
	}

	public function createTable($dbh, $schema) {
		$sth = $dbh->prepare($schema);
		$sth->execute();
	}

	public function dropTable($table, $dbh) {
	
		$sth = $dbh->prepare('DROP TABLE IF EXISTS '. $table);
		$sth->execute();
	}

	public function insertData($table, $dbh, $data) {

		// Take list of keys as in schema and data
	    $keys = implode(', ', array_keys($data));
	    
	    // form unnamed placeholders with count number of ? marks
	    $bindValues =  str_repeat('?, ', count($data) - 1) . ' ?';
	    $sth = $dbh->prepare('INSERT INTO ' . $table . ' (' . $keys .') VALUES (' . $bindValues . ')');
		$sth->execute(array_values($data));
		return $dbh->lastInsertId();
		
	}
	
	public function getVolumes() {
		
		$dbh = $this->connect(DB_NAME);
		$data = array();
		$sth = $dbh->prepare('SELECT distinct volume, year FROM ' . METADATA_TABLE_L2 . ' ORDER BY volume');
		$sth->execute();
	
		while($result = $sth->fetch(PDO::FETCH_OBJ)) {
			
			array_push($data, $result);
		}
		
		return $data;
	}
	
	public function getIssues($volume, $year){
		
		$dbh = $this->connect(DB_NAME);
		if(is_null($dbh))return null;
		
		$sth = $dbh->prepare('SELECT distinct issue, month, volume, year FROM ' . METADATA_TABLE_L2 . ' WHERE volume = ? AND year = ? ORDER BY issue');
		$sth->execute(array($volume, $year));
		$data = array();
		
		while($result = $sth->fetch(PDO::FETCH_OBJ)) {
			
			array_push($data, $result);
		}
		$dbh = null;
		return $data;
	}
	
	public function getTOC($volume, $issue, $year, $month, $table){
		
		$data = array();
		$dbh = $this->connect(DB_NAME);
		if(is_null($dbh))return null;
		
		$sth = $dbh->prepare('SELECT * FROM ' . $table . ' WHERE volume = ? and issue = ?');
		$sth->execute(array($volume, $issue));
		
		while($result = $sth->fetch(PDO::FETCH_OBJ)) {
			
			$result->authorDetails = $this->getAuthorID($dbh, $result->authid);
			array_push($data, $result);
		}
		
		return $data;
	}
	
	public function getAuthorID($dbh, $authid){
		
		$sth = $dbh->prepare('SELECT * FROM ' . METADATA_TABLE_L1 . ' WHERE authid = ?');
		$sth->execute(array($authid));
		return $sth->fetch(PDO::FETCH_ASSOC);
	}
	
	public function authorID($table, $dbh, $authDetails){
		
		$authID = '';
		$sth = $dbh->prepare('SELECT * FROM ' . $table . ' WHERE authorname = :authname AND salutation = :salut');
		$sth->bindParam(':authname', $authDetails['authorname']);
		$sth->bindParam(':salut', $authDetails['salutation']);
		$sth->execute();
			
		if($sth->rowCount() == 0){
			
			$authID = $this->insertData($table, $dbh, $authDetails);
		}
		
		else {
			
			$data = $sth->fetch(PDO::FETCH_ASSOC);
			$authID = $data['authid'];
		}
		
		return $authID;
	}
	
	public function executeQuery($dbh = null, $query = '') {

	    $sth = $dbh->prepare($query);
		$sth->execute();
	}

	public function prependDB($db) {
		
		return DB_PREFIX . strtoupper($db);
		return $db;
	}
	
	public function articleDetails($articleID, $articleTable, $testOcrTable, $dbh) {
		
		$sth = $dbh->prepare('SELECT * FROM ' . $articleTable . ' WHERE ID = :id');
		$sth->bindParam(':id', $articleID);
		$sth->execute();
		
		$row =  $sth->fetch(PDO::FETCH_ASSOC);
		$volume = $row['volume'];
		$issue = $row['issue'];
		
		list($pageStart , $pageEnd) = split("-",$row['page']);
		$sth = $dbh->prepare('SELECT cur_page FROM ' . $testOcrTable . ' WHERE volume = :vol AND issue = :inum AND cur_page BETWEEN :pageStart AND :pageEnd');
		$sth->bindParam(':vol', $volume);
		$sth->bindParam(':inum', $issue);
		$sth->bindParam(':pageStart', $pageStart);
		$sth->bindParam(':pageEnd', $pageEnd);
		$sth->execute();
		$page = array();
		
		while($column = $sth->fetch(PDO::FETCH_ASSOC))
		{
			array_push($page, $column['cur_page']);
		}
		$row['page'] = $page;
		return $row;
	}

	public function getArticleList($character){

		$dbh = $this->connect(DB_NAME);
		$sth = $dbh->prepare('SELECT * FROM ' . METADATA_TABLE_L2 . ' WHERE title LIKE \'' . $character .  '%\' ORDER BY title');
		$sth->execute();

		$data = array();

		while($result = $sth->fetch(PDO::FETCH_OBJ)) {
			
			$result->authorDetails = $this->getAuthorID($dbh, $result->authid);
			$result->character = $character;
			array_push($data, $result);
		}
		return $data;
	}

	public function getAuthorsList($character){

		$dbh = $this->connect(DB_NAME);
		$sth = $dbh->prepare('SELECT * FROM ' . METADATA_TABLE_L1 . ' WHERE authorname LIKE \'' . $character .  '%\' ORDER BY authorname');
		$sth->execute();

		$data = array();

		while($result = $sth->fetch(PDO::FETCH_OBJ)) {
			
			$result->character = $character;
			array_push($data, $result);
		}
		return $data;
	}

	public function getAuthorArticleList($authID){

		$dbh = $this->connect(DB_NAME);
		$sth = $dbh->prepare('SELECT * FROM ' . METADATA_TABLE_L2 . ' WHERE authid = ' . $authID . ' ORDER BY authid');
		$sth->execute();

		$data = array();

		while($result = $sth->fetch(PDO::FETCH_OBJ)){
			$result->authorDetails = $this->getAuthorID($dbh, $result->authid);
			array_push($data, $result);
		}

		return $data;
	}

	public function getFeaturesList(){

		$dbh = $this->connect(DB_NAME);
		$sth = $dbh->prepare('SELECT DISTINCT feature FROM ' . METADATA_TABLE_L2 . ' WHERE feature != "" ORDER BY feature');
		$sth->execute();

		$data = array();

		while($result = $sth->fetch(PDO::FETCH_OBJ)) 
			array_push($data, $result);

		return $data;
	}

	public function getFeatureArticleList($feature){

		$dbh = $this->connect(DB_NAME);
		$sth = $dbh->prepare('SELECT * FROM ' . METADATA_TABLE_L2 . ' WHERE feature = \'' . $feature . '\' ORDER BY title');
		$sth->execute();

		$data = array();

		while($result = $sth->fetch(PDO::FETCH_OBJ)) {
			$result->feature = $feature;

			array_push($data, $result);
		}


		return $data;
	}

	public function getFeatureDetailsForCurrentIssue($table,$dbh,$feature='') {
		
		$data = array();
		
		$sth = $dbh->prepare('SELECT DISTINCT volume, issue FROM ' . $table .' ORDER BY volume DESC, issue DESC LIMIT 1');
		$sth->execute();
		$data = $sth->fetch(PDO::FETCH_ASSOC);
		
		
		$sth = $dbh->prepare('SELECT * FROM ' . $table .' WHERE volume = ' . $data['volume'] . ' AND issue = ' . $data['issue'] . ' AND feature = \'' . $feature . '\'');
			$sth->execute();
		
		$details = [];
		$details = $sth->fetchAll(PDO::FETCH_ASSOC);
		return $details;
	}

	public function getYearDetails($volume, $year){

		$data = array();
		$dbh = $this->connect(DB_NAME);
		if(is_null($dbh))return null;
		
		$sth = $dbh->prepare('SELECT * FROM ' . METADATA_TABLE_L2 . ' WHERE volume = ? and year = ? ORDER BY issue ASC');
		$sth->execute(array($volume, $year));
		
		while($result = $sth->fetch(PDO::FETCH_OBJ)) {
			
			$result->authorDetails = $this->getAuthorID($dbh, $result->authid);
			array_push($data, $result);
		}
		
		return $data;
	}
}

?>
