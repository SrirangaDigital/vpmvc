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
	
	public function getAuthorID($table, $dbh, $authDetails){
		
		$authID = '';
		$sth = $dbh->prepare('SELECT * FROM ' . $table . ' WHERE authorname = :authname AND salutation = :salut');
		$sth->bindParam(':authname', $authDetails['authorname']);
		$sth->bindParam(':salut', $authDetails['salutation']);
		$sth->execute();
			
		if($sth->rowCount() == 0)
		{
			$authID = $this->insertData($table, $dbh, $authDetails);
		}
		else
		{
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
	
}

?>
